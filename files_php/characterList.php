<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php';
$_SESSION['player_name'] = "Brent";

ini_set('display_errors', '1');
error_reporting(E_ALL);

$db = loadDatabase();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

print "<form action='characterLoad.php' method='POST'>";

try
{
  $SQL = $db->prepare("SELECT character_name FROM `character` WHERE player_name = :player_name");
  $SQL->bindParam(':player_name', $_SESSION['player_name'], PDO::PARAM_INT);

  $SQL->execute();
  $results = $SQL->fetchAll(PDO::FETCH_ASSOC);

  foreach($results as $row)
  {
    if (isset($row['character_name']) && !empty($row['character_name']))
    {
      print "<input type='submit' name='character_name' value = '" . $row['character_name'] . "'/>";
    } 
  }
}
catch (PDOException $e) 
{
  echo $e->getMessage();
}

print "</form>";
?>