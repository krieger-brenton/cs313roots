<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  require "password.php";
  require "dbconnect.php";

  $user = $_POST['user'];
  $password = $_POST['password'];
  //$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

  $db = loadDatabase();

  $SQL = $db->prepare("SELECT password FROM user WHERE username = :username");
  $SQL->bindParam(':username', $user, PDO::PARAM_STR);

  $result = $SQL->execute();

  if ($result)
  {
    $row = $SQL->fetch();
    $hashedPassword = $row['password'];
  }

  if (password_verify($password, $hashedPassword))
  {
        // password was correct, put the user on the session, and redirect to home
    $_SESSION['player_name'] = $user;
    header('location: ../characterMenu.php');
    die(); // we always include a die after redirects.
  }
      else
      {
        print "BaD STUFF";
      }
}
?>

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
</body>
<div class="master">
  <h1>Sign In</h1>
  <form action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <input type='text' name="user" placeholder='User Name'> <br/>
    <input type='password' name="password" placeholder='Password'> <br/>
    <input type='submit' value='Sign In!'>
  </form>
</div>
</html>