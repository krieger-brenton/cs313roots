<?php

require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbConnect.php';

session_start();
session_unset();

if (!empty($_GET['player_name']))
  $_SESSION['player_name'] = $_GET['player_name'];
else
  $_SESSION['player_name'] = "";

if (!empty($_GET['character_name']))
  $_SESSION['character_name'] = $_GET['character_name'];
else
  $_SESSION['character_name'] = "";

if (!empty($_GET['alignment']))
  $_SESSION['alignment'] = $_GET['alignment'];

// core stats
if (!empty($_GET['str']))
  $_SESSION['str'] = floor(($_GET['str'] - 10) / 2);

if (!empty($_GET['dex']))
  $_SESSION['dex'] = floor(($_GET['dex'] - 10) / 2);

if (!empty($_GET['con']))
  $_SESSION['con'] = floor(($_GET['con'] - 10) / 2);

if (!empty($_GET['int']))
  $_SESSION['int'] = floor(($_GET['int'] - 10) / 2);

if (!empty($_GET['wis']))
  $_SESSION['wis'] = floor(($_GET['wis'] - 10) / 2);

if (!empty($_GET['cha']))
  $_SESSION['cha'] = floor(($_GET['cha'] - 10) / 2);

if (!empty($_GET['race']))
  $_SESSION['race'] = $_GET['race'];

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

//need some skills


if (!empty($_GET['weapon_one']))
  $_SESSION['weapon_one'] = $_GET['weapon_one'];

if (!empty($_GET['weapon_two']))
  $_SESSION['weapon_two'] = $_GET['weapon_two'];

if (!empty($_GET['armor']))
  $_SESSION['armor'] = $_GET['armor'];

if (!empty($_GET['shield']))
  $_SESSION['shield'] = $_GET['shield'];

if(!empty($_GET['shield']) && $_GET['shield'] == true)
  $_SESSION['ac'] += 2;

$db = loadDatabase();
$SQL = $db->query("SELECT size,speed FROM race WHERE name='" . $_SESSION['race'] . "'");
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row)
{
  $_SESSION['size'] = $row['size'];
  $_SESSION['speed'] = $row['speed'];
}


$_SESSION['hit_die'] = ""; 
$_SESSION['level'] = 0;
$first = true;

for($i = 0; $i < 12; $i++)
{
  if(isset($_SESSION[$classes[$i]]))
  {
    $SQL = $db->query("SELECT hit_die FROM class_info WHERE name='" . $classes[$i] . "'");
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

if(isset($_SESSION['armor']))
{
  $SQL = $db->prepare("SELECT type, ac, str, stealth FROM armor WHERE name= :name");
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

if (!isset($_GET['weapon_one']))
{
  $SQL = $db->query("SELECT weapon_name, property_name, content FROM weapon w JOIN weapon_property wp ON (w.weapon_id = wp.weapon_id) JOIN property p ON (p.property_id = wp.property_id) WHERE weapon_name = '" . $_SESSION['weapon_one'] . "'");
  $results = $SQL->fetchAll(PDO::FETCH_ASSOC);


  $first = true;
  foreach($results as $row)
  {
    if ($first)
    {
      print "<label>" . $row['weapon_name'] . "</label>";
      print "<div>";
      $first = false;
    }
    print $row['property_name'] . ": " . $row['content'] . "<BR />";  
  }
  print "</div>";
}
if (!isset($_GET['weapon_two']))
{
  $SQL = $db->query("SELECT weapon_name, property_name, content FROM weapon w JOIN weapon_property wp ON (w.weapon_id = wp.weapon_id) JOIN property p ON (p.property_id = wp.property_id) WHERE weapon_name = '" . $_SESSION['weapon_two'] . "'");
  $results = $SQL->fetchAll(PDO::FETCH_ASSOC);


  $first = true;
  foreach($results as $row)
  {
    if ($first)
    {
      print "<label>" . $row['weapon_name'] . "</label>";
      print "<div>";
      $first = false;
    }
    print $row['property_name'] . ": " . $row['content'] . "<BR />";  
  }
  print "</div>";
}

$conn = null;



$_SESSION['prof'] = (ceil(($_SESSION['level']/4)) + 1);

print "Player Name: " . $_SESSION['player_name'] . '<BR />';
print "Character name: " . $_SESSION['character_name'] . '<BR />';
print "Race: " . $_SESSION['race'] . '<BR />';
print "Size: " . $_SESSION['size'] . '<BR />';
print "Speed: " . $_SESSION['speed'] . 'ft<BR />';
print "Level: " . $_SESSION['level'] . '<BR />';
print "Profficency Bonus: +" . $_SESSION['prof'] . '<BR />';
print "Hit Dice: " . $_SESSION['hit_die'] . '<BR />';
print "Armor: " . $_SESSION['ac'] . '<BR />';
print "Stat, Strength: " . $_GET['str'] . ", Modifier: +" . $_SESSION['str'] . "<BR />";
print "Stat, Dexterity: " . $_GET['dex'] . ", Modifier: +" . $_SESSION['dex'] . "<BR />";
print "Stat, Constitution: " . $_GET['con'] . ", Modifier: +" . $_SESSION['con'] . "<BR />";
print "Stat, Intelligence: " . $_GET['int'] . ", Modifier: +" . $_SESSION['int'] . "<BR />";
print "Stat, Wisdom: " . $_GET['wis'] . ", Modifier: +" . $_SESSION['wis'] . "<BR />";
print "Stat, Charisma: " . $_GET['cha'] . ", Modifier: +" . $_SESSION['cha'] . "<BR />"; 
?>