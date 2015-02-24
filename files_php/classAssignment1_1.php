<?php

$dbHost = 'localhost';
$dbName = 'class_assignments';
$dbUser = 'root';
$dbPassword = '';

$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

$SQL = $db->query("SELECT topic_id, topic FROM topics");
$results = $SQL->fetchAll(PDO::FETCH_ASSOC);

print "<div>";
foreach ($results as $row)
{
  print "<input type='checkbox' name='topics[]''> <span>" . $row['topic'] . "</span> <br/>";
}
print "</div>";



?>