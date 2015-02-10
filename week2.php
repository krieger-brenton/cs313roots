<?php ini_set('display_errors',1)?><!DOCTYPE html>
<html>
  <head>
    <title>Brenton Krieger</title>
    <script>document.write("<base href='http://" + document.location.host + "' />");</script>
    <link rel="stylesheet" href="css/main.css">
    <script src="/js/all.js"></script>
  </head>
  <body>
    <header>
      <nav><a href="index.php" class="navbutton">Home</a><a href="assignments.php" class="navbutton">Assignments</a><a href="character.php" class="navbutton">Character Maker</a></nav>
    </header>
    <div class="master"><?php require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php'; session_start(); $db = loadDatabase(); if ($_GET['table'] == 'Armor') { $SQL = $db->query("SELECT armor_name, type, ac, str, stealth FROM armor"); $results = $SQL->fetchAll(PDO::FETCH_ASSOC); print "<div>"; foreach($results as $row) { $line = "Armor Name: " . $row['armor_name'] . "  Type: " . $row['type'] . "  Armor Class: " . $row['ac']; if (isset($row['str'])) $line .= "  Required Strength: " . $row['str']; $line .= "  Stealth Check: " . $row['stealth']; $line .= "<BR />"; print $line; } print "</div>"; } if ($_GET['table'] == 'Class') { $SQL = $db->query("SELECT class_name, save1, save2, hit_die FROM class_info"); $results = $SQL->fetchAll(PDO::FETCH_ASSOC); print "<div>"; foreach($results as $row) { $line = "Class Name: " . $row['class_name'] . " First Save: " . $row['save1'] . " Second save: " . $row['save2'] . " Hit die: 1" . $row['hit_die'] . "<BR />"; print $line; } print "</div>"; } if ($_GET['table'] == 'Property') { $SQL = $db->query("SELECT property_name, content FROM property"); $results = $SQL->fetchAll(PDO::FETCH_ASSOC); print "<div>"; foreach($results as $row) { $line = "Property Name: " . $row['property_name'] . ": " . $row['content'] . "<BR />"; print $line; } print "</div>"; } if ($_GET['table'] == 'Race') { $SQL = $db->query("SELECT race_name, size, speed FROM race"); $results = $SQL->fetchAll(PDO::FETCH_ASSOC); print "<div>"; foreach($results as $row) { $line = "Race: " . $row['race_name'] . " Size: " . $row['size'] . " Speed: " . $row['speed'] . "ft."  . "<BR />"; print $line; } print "</div>"; } if ($_GET['table'] == 'Weapon') { $SQL = $db->query("SELECT weapon_name, damage, damage_type FROM weapon"); $results = $SQL->fetchAll(PDO::FETCH_ASSOC); print "<div>"; foreach($results as $row) { $line = "Name: " . $row['weapon_name'] . " Damage: " . $row['damage'] . " Damage Type: " . $row['damage_type'] . "<BR />"; print $line; } print "</div>"; } ?></div>
  </body>
</html>