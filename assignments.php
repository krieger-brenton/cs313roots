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
      <nav><a href="index.php" class="navbutton">Home</a><a href="assignments.php" class="navbutton">Assignments</a><a href="characterMenu.php" class="navbutton">Character Maker</a><a href="../files_php/signOut.php" class="navbutton"><?php session_start(); if(isset($_SESSION['player_name'])) print "Sign Out";?></a></nav>
    </header>
    <div class="master"><a href="survey.html">Week 2, Survey</a><br><a href="week2j.php">Week 4, Database Display</a><br><a href="inClassAssignment1.php">Week 5, Scripture Database</a><br></div>
  </body>
</html>