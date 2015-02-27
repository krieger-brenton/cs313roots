<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php';
$_SESSION['player_name'] = "Brent";

$db = loadDatabase();

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
  echo "Error!";
  //echo $e->getMessage();
}

print "</form>";
print "<a href='../characterMenu.php'>Go back to Menu</a>"
?>