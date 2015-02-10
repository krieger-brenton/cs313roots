<?php
require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php';

session_start();

$db = loadDatabase();
$SQL = $db->query("SELECT armor_name, type, ac, str, stealth FROM armor");
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

print "<div>";
  foreach($results as $row)
  {
    $line = "Armor Name: " . $row['armor_name'] . "  Type: " . $row['type'] . "  Armor Class: " . $row['ac'];
    if (isset($row['str']))
      $line .= "  Required Strength: " . $row['str'];

    $line .= "  Stealth Check: " . $row['stealth'];

    $line .= "<BR />";
    print $line;
  }
print "</div>";

?>