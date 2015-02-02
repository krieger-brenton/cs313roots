<?php
session_start();
session_unset();

if (!empty($_GET['player_name']))
  $_SESSION['player_name'] = $_GET['player_name'];

if (!empty($_GET['player_name']))
  $_SESSION['character_name'] = $_GET['character_name'];

if (!empty($_GET['alignment']))
  $_SESSION['alignment'] = $_GET['alignment'];

// core stats
if (!empty($_GET['str']))
  $_SESSION['str'] = $_GET['str'];

if (!empty($_GET['dex']))
  $_SESSION['dex'] = $_GET['dex'];

if (!empty($_GET['con']))
  $_SESSION['con'] = $_GET['con'];

if (!empty($_GET['int']))
  $_SESSION['int'] = $_GET['int'];

if (!empty($_GET['wis']))
  $_SESSION['wis'] = $_GET['wis'];

if (!empty($_GET['cha']))
  $_SESSION['cha'] = $_GET['cha'];

if (!empty($_GET['race']))
  $_SESSION['race'] = $_GET['race'];

// class and level
$classes[0] = 'barbarian';
$classes[1] = 'bard';
$classes[2] = 'cleric';
$classes[3] = 'druid';
$classes[4] = 'fighter';
$classes[5] = 'monk';
$classes[6] = 'paladin';
$classes[7] = 'ranger';
$classes[8] = 'rogue';
$classes[9] = 'sorcerer';
$classes[10] = 'warlock';
$classes[11] = 'wizard';

if (!empty($_GET[$classes[0]]))
  $_SESSION[$classes[0]] = $_GET[$classes[0]];
if (!empty($_GET[$classes[1]]))
  $_SESSION[$classes[1]] = $_GET[$classes[1]];
if (!empty($_GET[$classes[2]]))
  $_SESSION[$classes[2]] = $_GET[$classes[2]];
if (!empty($_GET[$classes[3]]))
  $_SESSION[$classes[3]] = $_GET[$classes[3]];
if (!empty($_GET[$classes[4]]))
  $_SESSION[$classes[4]] = $_GET[$classes[4]];
if (!empty($_GET[$classes[5]]))
  $_SESSION[$classes[5]] = $_GET[$classes[5]];
if (!empty($_GET[$classes[6]]))
  $_SESSION[$classes[6]] = $_GET[$classes[6]];
if (!empty($_GET[$classes[7]]))
  $_SESSION[$classes[7]] = $_GET[$classes[7]];
if (!empty($_GET[$classes[8]]))
  $_SESSION[$classes[8]] = $_GET[$classes[8]];
if (!empty($_GET[$classes[9]]))
  $_SESSION[$classes[9]] = $_GET[$classes[9]];
if (!empty($_GET[$classes[10]]))
  $_SESSION[$classes[10]] = $_GET[$classes[10]];
if (!empty($_GET[$classes[11]]))
  $_SESSION[$classes[11]] = $_GET[$classes[11]];

//need some skills
if (!empty($_GET['weapon_one']))
  $_SESSION['weapon_one'] = $_GET['weapon_one'];

if (!empty($_GET['weapon_two']))
  $_SESSION['weapon_two'] = $_GET['weapon_two'];

if (!empty($_GET['armor']))
  $_SESSION['armor'] = $_GET['armor'];

if (!empty($_GET['shield']))
  $_SESSION['shield'] = $_GET['shield'];

$user = "root";
$password ="";
$database = "project";
$server = "127.0.0.1";
$db_name = "project";

$conn = new mysqli($server, $user, $password, $db_name);
if($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}

$SQL = "SELECT * FROM race WHERE name='" . $_SESSION['race'] . "'";
$results = $conn->query($SQL);

if($results->num_rows > 0)
{
  while($db_field = $results->fetch_assoc())
  {
    $_SESSION['size'] = $db_field['size'];
    $_SESSION['speed'] = $db_field['speed']; 
  }
}
else
{
  print "Didn't find anything <BR />";
}

$_SESSION['hit_die'] = ""; 
$_SESSION['level'] = 0;
$first = true;

for($i = 0; $i < 12; $i++)
{
  if(isset($_SESSION[$classes[$i]]))
  {
    $SQL = "SELECT * FROM class_info WHERE name='" . $classes[$i] . "'";
    $results = $conn->query($SQL);

    while ($db_field = $results->fetch_assoc())
    {
      if($first)
      {
        $_SESSION['hit_die'] .= $_SESSION[$classes[$i]] . $db_field['hit_die'];
        $first = false;
      }
      else
      {
        $_SESSION['hit_die'] .=  " + " . $_SESSION[$classes[$i]] . $db_field['hit_die'];
      }

    }

    $_SESSION['level'] += $_SESSION[$classes[$i]];
  }
}


$conn->close();

print "Player Name: " . $_SESSION['player_name'] . '<BR />';
print "Character name: " . $_SESSION['character_name'] . '<BR />';
print "Race: " . $_SESSION['race'] . '<BR />';
print "Size: " . $_SESSION['size'] . '<BR />';
print "Speed: " . $_SESSION['speed'] . 'ft<BR />';
print "Level: " . $_SESSION['level'] . '<BR />';
print "Hit Dice: " . $_SESSION['hit_die'] . '<BR />';

?>