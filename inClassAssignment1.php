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
      <nav><a href="index.php" class="navbutton">Home</a><a href="assignments.php" class="navbutton">Assignments</a><a href="characterMenu.php" class="navbutton">Character Maker</a><a href="../files_php/signOut.php" class="navbutton"><?php session_start(); if(isset($_SESSION['player_name'])) print ucwords($_SESSION['player_name']); else print "Sign Out";?></a></nav>
    </header>
    <div class="master"><?php require $_SERVER['DOCUMENT_ROOT'] . '/files_php/dbconnect.php'; ?>
      <form action="../files_php/classAssignment1_2.php" method="POST"><span>Book: </span>
        <input type="text" placeholder="Mormon" name="book"><br><span>Chapter: </span>
        <input type="text" placeholder="2" name="chapter"><br><span>Verse: </span>
        <input type="text" placeholder="10-12" name="verse"><br><?php require $_SERVER['DOCUMENT_ROOT'] . '/files_php/classAssignment1_1.php'; ?> 
        <input type="checkbox" name="newTopicCK">
        <input type="text" placeholder="Virtue" name="newTopic">
        <input type="submit" name="GOOOO!!!!">
      </form>
    </div>
  </body>
</html>