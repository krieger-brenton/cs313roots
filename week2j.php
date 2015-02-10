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
    <div class="master">
      <!--<?php require $_SERVER['DOCUMENT_ROOT'] . '/files_php/week2.php'; ?>-->
      <form action="week2.php" method="GET">
        <select name="table">
          <option>Armor</option>
          <option>Class</option>
          <option>Race</option>
          <option>Property</option>
          <option>Weapon</option>
        </select>
        <input type="submit" value="Query Database">
      </form>
    </div>
  </body>
</html>