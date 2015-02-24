<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php';
session_start();
session_unset();
$_SESSION['player_name'] = "Brent";
$_SESSION['character_name'] = $_POST['character_name'];


$db = loadDatabase();

$SQL = $db->prepare("SELECT str, dex, con, `int`, wis, cha, alignment, race_id, character_id FROM `character` WHERE player_name= :playerName AND character_name= :characterName");
$SQL->bindParam(':playerName', $_SESSION['player_name'], PDO::PARAM_STR);
$SQL->bindParam(':characterName', $_SESSION['character_name'], PDO::PARAM_STR);
$SQL->execute();
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row)
{
  $_SESSION['strstat'] = $row['str'];
  $_SESSION['dexstat'] = $row['dex'];
  $_SESSION['constat'] = $row['con'];
  $_SESSION['intstat'] = $row['int'];
  $_SESSION['wisstat'] = $row['wis'];
  $_SESSION['chastat'] = $row['cha'];
  $_SESSION['alignment'] = $row['alignment'];
  $_SESSION['race'] = $row['race_id'];
  $_SESSION['character_id'] = $row['character_id'];
}

$_SESSION['str'] = floor(($_SESSION['strstat'] - 10) / 2);
$_SESSION['dex'] = floor(($_SESSION['dexstat'] - 10) / 2);
$_SESSION['con'] = floor(($_SESSION['constat'] - 10) / 2);
$_SESSION['int'] = floor(($_SESSION['intstat'] - 10) / 2);
$_SESSION['wis'] = floor(($_SESSION['wisstat'] - 10) / 2);
$_SESSION['cha'] = floor(($_SESSION['chastat'] - 10) / 2);

$SQL = $db->prepare("SELECT race_name, size, speed FROM race WHERE race_id = :race_id");
$SQL->bindParam(':race_id', $_SESSION['race'], PDO::PARAM_INT);
$SQL->execute();
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row)
{
  $_SESSION['race'] = ucwords($row['race_name']);
  $_SESSION['speed'] = ucwords($row['speed']);
  $_SESSION['size'] = ucwords($row['size']);
}

$SQL = $db->prepare("SELECT acrobatics, animal_handling, arcana, athletics, deception,
     history, insight, intimidation, investigation, medicine, nature, perception, performance, persuasion, 
     religion, sleight_of_hand, stealth, survival FROM skill WHERE character_id = :character_id");
$SQL->bindParam(':character_id', $_SESSION['character_id'], PDO::PARAM_INT);
$SQL->execute();
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row)
{
$_SESSION['skill_acrobatics'] = $row["acrobatics"];
$_SESSION['skill_animal_handling'] = $row["animal_handling"];
$_SESSION['skill_arcana'] = $row["arcana"];
$_SESSION['skill_athletics'] = $row["athletics"];
$_SESSION['skill_deception'] = $row["deception"];
$_SESSION['skill_history'] = $row["history"];
$_SESSION['skill_insight'] = $row["insight"];
$_SESSION['skill_intimidation'] = $row["intimidation"];
$_SESSION['skill_investigation'] = $row["investigation"];
$_SESSION['skill_medicine'] = $row["medicine"];
$_SESSION['skill_nature'] = $row["nature"];
$_SESSION['skill_perception'] = $row["perception"];
$_SESSION['skill_performance'] = $row["performance"];
$_SESSION['skill_persuasion'] = $row["persuasion"];
$_SESSION['skill_religion'] = $row["religion"];
$_SESSION['skill_sleight_of_hand'] = $row["sleight_of_hand"];
$_SESSION['skill_stealth'] = $row["stealth"];
$_SESSION['skill_survival'] = $row["survival"];
}

/* this will get replaced when I get the level many to many tables working*/
  $_SESSION['hit_die'] = '?';
  $_SESSION['level'] = '?';
  $_SESSION['prof'] = 2;
/**/

header("Location: ../characterDisplay.php");
?>