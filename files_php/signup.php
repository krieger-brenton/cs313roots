<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  require "password.php";
  require "dbconnect.php";

  $user = $_POST['user'];
  $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

  $db = loadDatabase();

  $SQL = $db->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");

  $SQL->bindParam(':username', $user, PDO::PARAM_STR);
  $SQL->bindParam(':password', $password, PDO::PARAM_STR);
  $SQL->execute();

  header('location: signin.php');
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
    <nav><a href="index.php" class="navbutton">Home</a><a href="assignments.php" class="navbutton">Assignments</a><a href="characterMenu.php" class="navbutton">Character Maker</a></nav>
  </header>
</body>
<div class="master">
  <h1>Sign Up</h1>
  <div>
    <h2>New Adventurers</h2>
    <form action="<?PHP echo htmlspecialchars($_SERVER['PHP_SELF'])?>" onsubmit="return validatePassword()" method="POST">
      <input type='text' name="user" placeholder='User Name'> <br/>
      <input type='password' name="password" placeholder='Password'> <br/>
      <input type='password' name="passwordConfirm" placeholder='Confirm Password'> <br/>
      <input type='submit' value='Sign Me Up!'>
    </form>
    <a href="files_php/signin.php">Veterans click here to sign in.</a>
  </div>
</div>
</html>