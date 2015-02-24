<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

$db = loadDatabase();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

try
{
  $SQL = $db->prepare("SELECT race_id FROM race WHERE race_name = :race_name");
  $SQL->bindParam(':race_name' , $_SESSION['race'], PDO::PARAM_STR);  
  $SQL->execute();

  $results = $SQL->fetchAll(PDO::FETCH_ASSOC);

  foreach ($results as $row)
  {
    $_SESSION['race'] = $row['race_id'];
  }
}
catch (PDOException $e) 
{
 echo $e->getMessage();
}

try 
{
  $SQL = $db->prepare("UPDATE `character` SET str = :str, dex = :dex, con = :con, `int` = :int, wis = :wis, cha = :cha, alignment = :alignment, race_id = :race, time_stamp = NOW() WHERE player_name = :player_name AND character_name = :character_name");
  $SQL->bindParam(':player_name', $_SESSION['player_name'], PDO::PARAM_STR);
  $SQL->bindParam(':character_name', $_SESSION['character_name'], PDO::PARAM_STR);
  $SQL->bindParam(':alignment', $_SESSION['alignment'], PDO::PARAM_STR);
  $SQL->bindParam(':race', $_SESSION['race'], PDO::PARAM_INT);
  $SQL->bindParam(':str', $_SESSION['strstat'], PDO::PARAM_INT);
  $SQL->bindParam(':dex', $_SESSION['dexstat'], PDO::PARAM_INT);
  $SQL->bindParam(':con', $_SESSION['constat'], PDO::PARAM_INT);
  $SQL->bindParam(':int', $_SESSION['intstat'], PDO::PARAM_INT);
  $SQL->bindParam(':wis', $_SESSION['wisstat'], PDO::PARAM_INT);
  $SQL->bindParam(':cha', $_SESSION['chastat'], PDO::PARAM_INT);

  $SQL->execute();
}
catch (PDOException $e) 
{
 echo $e->getMessage();
}

if($SQL->rowCount() == 0)
{
  try
  {
    $SQL = $db->prepare("INSERT INTO `character` (player_name, character_name, alignment, race_id, str, dex, con, `int`, wis, cha, time_stamp)  VALUES (:player_name, :character_name, :alignment, :race, :str, :dex, :con, :int, :wis, :cha, NOW())");
    $SQL->bindParam(':player_name', $_SESSION['player_name'], PDO::PARAM_STR);
    $SQL->bindParam(':character_name', $_SESSION['character_name'], PDO::PARAM_STR);
    $SQL->bindParam(':alignment', $_SESSION['alignment'], PDO::PARAM_STR);
    $SQL->bindParam(':race', $_SESSION['race'], PDO::PARAM_INT);
    $SQL->bindParam(':str', $_SESSION['strstat'], PDO::PARAM_INT);
    $SQL->bindParam(':dex', $_SESSION['dexstat'], PDO::PARAM_INT);
    $SQL->bindParam(':con', $_SESSION['constat'], PDO::PARAM_INT);
    $SQL->bindParam(':int', $_SESSION['intstat'], PDO::PARAM_INT);
    $SQL->bindParam(':wis', $_SESSION['wisstat'], PDO::PARAM_INT);
    $SQL->bindParam(':cha', $_SESSION['chastat'], PDO::PARAM_INT);

    $SQL->execute();
  }
  catch (PDOException $e) 
  {
   echo $e->getMessage();
 }
}

$SQL = $db->prepare("SELECT character_id FROM `character` WHERE player_name = :player_name AND character_name = :character_name");
$SQL->bindParam(':player_name', $_SESSION['player_name'], PDO::PARAM_STR);
$SQL->bindParam(':character_name', $_SESSION['character_name'], PDO::PARAM_STR);

$SQL->execute();
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row)
{
  $_SESSION['character_id'] = $row['character_id'];
}

$SQL = $db->prepare("SELECT skill_id FROM skill WHERE character_id = " . $_SESSION['character_id']);
$SQL->execute();
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

if (count($results) != 0)
{
  foreach($results as $row)
  {
    $_SESSION['skill_id'] = $row['skill_id'];
  }
  try 
  {
    $SQL = $db->prepare("UPDATE skill SET acrobatics = " . $_SESSION['skill_acrobatics'] . ", animal_handling = " . $_SESSION['skill_animal_handling'] . ", arcana = " . $_SESSION['skill_arcana'] 
      . ", athletics = " . $_SESSION['skill_athletics'] . ", deception = " . $_SESSION['skill_deception'] . ", history = " . $_SESSION['skill_history'] . ", insight = " . $_SESSION['skill_insight'] 
      . ", intimidation = " . $_SESSION['skill_intimidation'] . ", investigation = " . $_SESSION['skill_investigation'] . ", medicine = " . $_SESSION['skill_medicine'] . ", nature = " . $_SESSION['skill_nature'] 
      . ", perception = " . $_SESSION['skill_perception'] . ", performance = " . $_SESSION['skill_performance'] . ", persuasion = " . $_SESSION['skill_persuasion'] . ", religion = " . $_SESSION['skill_religion'] 
      . ", sleight_of_hand = " . $_SESSION['skill_sleight_of_hand'] . ", stealth = " . $_SESSION['skill_stealth'] . ", survival = " . $_SESSION['skill_survival'] . " WHERE character_id = " . $_SESSION['character_id']);

    $SQL->execute();
  }
catch (PDOException $e) 
{
 echo $e->getMessage();
}
}
else
{
  try
  {
    $SQL = $db->prepare("INSERT INTO skill (character_id, acrobatics, animal_handling, arcana, athletics, deception,
     history, insight, intimidation, investigation, medicine, nature, perception, performance, persuasion, 
     religion, sleight_of_hand, stealth, survival)
    VALUES (" . $_SESSION['character_id'] . ", " . $_SESSION['skill_acrobatics'] . "," . $_SESSION['skill_animal_handling'] 
      . "," . $_SESSION['skill_arcana'] . "," . $_SESSION['skill_athletics'] 
      . "," . $_SESSION['skill_deception'] . "," . $_SESSION['skill_history'] 
      . "," . $_SESSION['skill_insight'] . "," . $_SESSION['skill_intimidation'] 
      . "," . $_SESSION['skill_investigation'] . "," . $_SESSION['skill_medicine'] 
      . "," . $_SESSION['skill_nature'] . "," . $_SESSION['skill_perception'] 
      . "," . $_SESSION['skill_performance'] . "," . $_SESSION['skill_persuasion'] 
      . "," . $_SESSION['skill_religion'] . "," . $_SESSION['skill_sleight_of_hand'] 
      . "," . $_SESSION['skill_stealth'] . "," . $_SESSION['skill_survival'] . ")");

    $SQL->execute();
    $_SESSION['skill_id'] = PDO::lastInsertId();
  }
catch (PDOException $e) 
{
 echo $e->getMessage();
}
}

/*try
{
  $SQL = $db->prepare("UPDATE `character` SET skill_id = :skill_id WHERE character_id = :character_id");
  $SQL->bindParam(':skill_id', $_SESSION['skill_id'], PDO::PARAM_STR);
  $SQL->bindParam(':character_id', $_SESSION['character_id'], PDO::PARAM_STR);

  $SQL->execute();
}
catch (PDOException $e) 
{
 echo $e->getMessage();
}

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
    
  }
}

$SQL = $db->prepare("INSERT INTO class (name, level) VALUES ()");
$SQL = $db->prepare("INSERT INTO character_class (character_id, class_id) VALUES (" . $_SESSION['character_id']) .  ")");
*/




header("Location: ../characterMenu.php"); 
?>