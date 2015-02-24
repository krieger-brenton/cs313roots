<?php
function loadDatabase()
{
  $dbHost = "";
  $dbUser = "";
  $dbPassword = "";
  $dbName = "project";

  $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

  if ($openShiftVar === null || $openShiftVar == "")
  {
    require("setLocalDatabaseCredentials.php");
  }
  else 
  {
    $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
    $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
    $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
  }

  $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

  return $db;
}
?>