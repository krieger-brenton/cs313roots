<?php
 session_start();

$user = "root";
$password ="";
$database = "project";
$server = "127.0.0.1";

 $db_handle = mysql_connect($server, $user, $password);
 $db_found = mysql_select_db($database, $db_handle);

 if ($db_found)
 {
  print "We did it already $db_handle";

  $SQL = "SELECT * FROM class_info WHERE name='cleric'";
  $results = mysql_query($SQL);

  while ($db_field = mysql_fetch_assoc($results))
  {
    print $db_field['name'] . "<BR/>";
    print $db_field['save1'] . "<BR/>";
    print $db_field['save2'] . "<BR/>";
    print $db_field['hit_die'] . "<BR/>";
  }

  mysql_close($db_handle);



/*SELECT * FROM [table name] WHERE [field name] = "whatever";

$SQL = "SELECT * FROM tb_address_book";
$result = mysql_query($SQL);

while ( $db_field = mysql_fetch_assoc($result) ) {

print $db_field['ID'] . "<BR>";
print $db_field['First_Name'] . "<BR>";
print $db_field['Surname'] . "<BR>";
print $db_field['Address'] . "<BR>";
*/



 }
else
  print "it doesn't work";



?>