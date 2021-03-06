<?php
require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php';

session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/files_php/unset.php';

if (!empty($_GET['character_name']))
  $_SESSION['character_name'] = ucwords($_GET['character_name']);
else
  $_SESSION['character_name'] = "";

if (!empty($_GET['race']))
  $_SESSION['race'] = ucwords($_GET['race']);

if (!empty($_GET['alignment']))
  $_SESSION['alignment'] = ucwords($_GET['alignment']);

// core stats
$stats[0] = 'str';
$stats[1] = 'dex';
$stats[2] = 'con';
$stats[3] = 'int';
$stats[4] = 'wis';
$stats[5] = 'cha';

foreach($stats as $stat)
{
  if (!empty($_GET[$stat]))
  {
    $_SESSION[$stat] = floor(($_GET[$stat] - 10) / 2);
    $_SESSION[$stat . "stat"] = $_GET[$stat];
  }
  else
  {
    $_SESSION[$stat] = 0;
    $_SESSION[$stat . "stat"] = 10;
  }
}

// class and level
$classes[0] = 'barbarian';
$classes[1] = 'bard';
$classes[2] = 'cleric';
$classes[3] = 'druid';
$classes[4] = 'fighter';
$classes[5] = 'monk';
$classes[6] = 'paladin';
$classes[7] = 'ranger';
$classes[8] = 'rogue';
$classes[9] = 'sorcerer';
$classes[10] = 'warlock';
$classes[11] = 'wizard';

for($i = 0; $i < 12; $i++)
{
  if (!empty($_GET[$classes[$i]]))
  {
    $_SESSION[$classes[$i]] = $_GET[$classes[$i]];
  }
}

$skills[0] = "skill_acrobatics";
$skills[1] = "skill_animal_handling";
$skills[2] = "skill_arcana";
$skills[3] = "skill_athletics";
$skills[4] = "skill_deception";
$skills[5] = "skill_history";
$skills[6] = "skill_insight";
$skills[7] = "skill_intimidation";
$skills[8] = "skill_investigation";
$skills[9] = "skill_medicine";
$skills[10] = "skill_nature";
$skills[11] = "skill_perception";
$skills[12] = "skill_performance";
$skills[13] = "skill_persuasion";
$skills[14] = "skill_religion";
$skills[15] = "skill_sleight_of_hand";
$skills[16] = "skill_stealth";
$skills[17] = "skill_survival";

foreach ($skills as $skill)
{
  if (isset($_GET[$skill]))
  {
    $_SESSION[$skill] = true;
  }
  else
  {
    $_SESSION[$skill] = 0; 
  }
}

if (!empty($_GET['weapon_one']))
  $_SESSION['weapon_one'] = $_GET['weapon_one'];

if (!empty($_GET['weapon_two']))
  $_SESSION['weapon_two'] = $_GET['weapon_two'];

if (!empty($_GET['armor']))
  $_SESSION['armor'] = $_GET['armor'];
else
  $_SESSION['armor'] = "unarmored";


$db = loadDatabase();
$SQL = $db->query("SELECT size, speed FROM race WHERE race_name='" . $_SESSION['race'] . "'");
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row)
{
  $_SESSION['size'] = ucwords($row['size']);
  $_SESSION['speed'] = ucwords($row['speed']);
}


$_SESSION['hit_die'] = ""; 
$_SESSION['level'] = 0;
$first = true;

for($i = 0; $i < 12; $i++)
{
  if(isset($_SESSION[$classes[$i]]))
  {
    $SQL = $db->query("SELECT hit_die FROM class_info WHERE class_name='" . $classes[$i] . "'");
    $results = $SQL->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row)
    {
      if($first)
      {
        $_SESSION['hit_die'] .= $_SESSION[$classes[$i]] . $row['hit_die'];
        $first = false;
      }
      else
      {
        $_SESSION['hit_die'] .=  " + " . $_SESSION[$classes[$i]] . $row['hit_die'];
      }

    }

    $_SESSION['level'] += $_SESSION[$classes[$i]];
  }
}
if ($_SESSION['level'] === 0)
  $_SESSION['level'] = 1;
$_SESSION['prof'] = (ceil(($_SESSION['level']/4)) + 1);

if(isset($_SESSION['armor']))
{
  $SQL = $db->prepare("SELECT type, ac, str, stealth FROM armor WHERE armor_name= :name");
  $SQL->bindParam(':name', $_SESSION['armor'], PDO::PARAM_STR);
  $SQL->execute();

  $results = $SQL->fetchAll(PDO::FETCH_ASSOC);

  foreach($results as $row)
  {
    $_SESSION['ac'] = $row['ac'];
  }
}
else
  $_SESSION['ac'] = 10;

if (isset($_GET['shield']))
  $_SESSION['shield'] = true;
else
  $_SESSION['shield'] = false;

if($_SESSION['shield'] == true)
  $_SESSION['ac'] += 2;

if (!empty($_GET['weapon_one']))
{
  $SQL = $db->query("SELECT weapon_name, damage, damage_type, property_name, content FROM weapon w JOIN weapon_property wp ON (w.weapon_id = wp.weapon_id) JOIN property p ON (p.property_id = wp.property_id) WHERE weapon_name = '" . $_SESSION['weapon_one'] . "'");
  $results = $SQL->fetchAll(PDO::FETCH_ASSOC);

  foreach($results as $row)
  {
    $_SESSION['weapon_one_name'] = $row['weapon_name'];
    $_SESSION['weapon_one_damage'] = $row['damage'];
    $_SESSION['weapon_one_damage_type'] = $row['damage_type'];
    $props_one[] = ucwords($row['property_name']) . ': ' . $row['content'];
  }
}

if (!empty($_GET['weapon_two']))
{
  $SQL = $db->query("SELECT weapon_name, damage, damage_type, property_name, content FROM weapon w JOIN weapon_property wp ON (w.weapon_id = wp.weapon_id) JOIN property p ON (p.property_id = wp.property_id) WHERE weapon_name = '" . $_SESSION['weapon_two'] . "'");
  $results = $SQL->fetchAll(PDO::FETCH_ASSOC);

 foreach($results as $row)
  {
    $_SESSION['weapon_two_name'] = $row['weapon_name'];
    $_SESSION['weapon_two_damage'] = $row['damage'];
    $_SESSION['weapon_two_damage_type'] = $row['damage_type'];
    $props_two[] = ucwords($row['property_name']) . ': ' . $row['content'];
  }
}

header("Location: ../characterDisplay.php");
die();
?>
