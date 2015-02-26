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
  </body>
  <div class="master">
    <div>
      <h1>About Me </h1>
      <p>
        My name is Brenton Krieger, I am a student at Brigham Young University - Idaho. This is my third year studying Computer Science here in Rexburg, ID.
        If you care to know more about me, I can be found in a few places on the internet:
        
      </p>
      <div class="indexheader">
        <div class="button"><a href="https://www.facebook.com/brenton.krieger.5" target="_blank">FaceBook</a></div>
        <div class="button"><a href="https://github.com/krieger-brenton" target="_blank">Github</a></div>
        <div class="button"><a href="https://www.linkedin.com/in/brentonkrieger/" target="_blank">Linkedin</a></div>
      </div>
    </div>
    <div class="img"><img src="images/img003.jpg" alt="Brenton in Regensburg" width="384">
      <p>I served a mission in the Frankfurt, Germany mission. My last area was Regensburg, it was pretty, here is a picture of it.</p>
    </div>
    <div class="img"><img src="images/img000.jpg" alt="Brenton and Alyse Krieger" width="256">
      <p>Even though I'm studying Computer Science, I managed to find a wife. This is a picture of us.    </p>
    </div>
    <div class="img">
      <p>
        Some of my hobbies are playing all games Blizzard Entertainment touches. I normally spend my time playing World of Warcraft and Heros of the Storm. 
        I also play games like Dungeons and Dragons (4th &amp 5th edition), and other assorted board, card, and table top games
        
      </p><img src="images/img001.jpg" alt="Frost covered trees" style="width:512px;height:256px">
      <p>I love the hoar frost in Rexburg, it's like walking to school in Crystal Song.</p><img src="images/img002.jpg" alt="Crystal Song Forest" style="width:512px;height:256px">
    </div>
  </div>
</html>