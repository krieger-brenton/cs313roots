<?php 

  $dbHost = 'localhost';
  $dbName = 'class_assignments';
  $dbUser = 'root';
  $dbPassword = '';

  $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

if ($_POST['newTopicCK'] == true)
{
  print "New topic" . "<BR />";
}

$topics = $_POST['topics'];

foreach ($topics as $topic)
{
  print $topic;
}






?>