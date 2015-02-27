<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php';

$db = loadDatabase();

try
{
  $SQL = $db->prepare("DELETE FROM skill WHERE character_id = :character_id");
  $SQL->bindParam(':character_id' , $_SESSION['character_id'], PDO::PARAM_STR);  
  $SQL->execute();
}
catch (PDOException $e) 
{
  echo "Error!";
  //echo $e->getMessage();
}

try
{
  $SQL = $db->prepare("DELETE FROM class WHERE character_id = :character_id");
  $SQL->bindParam(':character_id' , $_SESSION['character_id'], PDO::PARAM_STR);  
  $SQL->execute();
}
catch (PDOException $e) 
{
  echo "Error!";
  //echo $e->getMessage();
} 

try
{
  $SQL = $db->prepare("DELETE FROM `character` WHERE character_id = :character_id");
  $SQL->bindParam(':character_id' , $_SESSION['character_id'], PDO::PARAM_STR);  
  $SQL->execute();
}
catch (PDOException $e) 
{
  echo "Error!";
  //echo $e->getMessage();
} 

$player_name = $_SESSION['player_name'];
session_unset();
$_SESSION = $player_name;

header("Location: ../characterMenu.php");
die();
?>