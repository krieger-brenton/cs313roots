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
      <div class="questionsheader">Questions:
        <div class="answervalues">
          <div>Super Disagree</div>
          <div>Disagree</div>
          <div>I Don't Care</div>
          <div>Agree</div>
          <div>Super Agree</div>
        </div>
      </div>
      <div class="questions">
        <div class="question">D&amp;D Fifth edition is better than Fourth edition.</div>
        <div class="question">World of Warcraft is for cool kids.</div>
        <div class="question">My wife should get a pixie cut.</div>
        <div class="question">Brother Burton is the best teacher.</div>
        <div class="question">I miss Jolley's mustache.</div>
      </div>
      <div class="answers">
        <form action="php/vote.php" method="POST">
          <div class="answer">
            <input type="radio" name="q1" value="-2">
            <input type="radio" name="q1" value="-1">
            <input type="radio" name="q1" value="0">
            <input type="radio" name="q1" value="1">
            <input type="radio" name="q1" value="2">
          </div>
          <div class="answer">
            <input type="radio" name="q2" value="-2">
            <input type="radio" name="q2" value="-1">
            <input type="radio" name="q2" value="0">
            <input type="radio" name="q2" value="1">
            <input type="radio" name="q2" value="2">
          </div>
          <div class="answer">
            <input type="radio" name="q3" value="-2">
            <input type="radio" name="q3" value="-1">
            <input type="radio" name="q3" value="0">
            <input type="radio" name="q3" value="1">
            <input type="radio" name="q3" value="2">
          </div>
          <div class="answer">
            <input type="radio" name="q4" value="-2">
            <input type="radio" name="q4" value="-1">
            <input type="radio" name="q4" value="0">
            <input type="radio" name="q4" value="1">
            <input type="radio" name="q4" value="2">
          </div>
          <div class="answer">
            <input type="radio" name="q5" value="-2">
            <input type="radio" name="q5" value="-1">
            <input type="radio" name="q5" value="0">
            <input type="radio" name="q5" value="1">
            <input type="radio" name="q5" value="2">
          </div>
          <input type="submit"><a href="php/results.php">See Results</a>
        </form>
      </div>
    </div>
  </body>
</html>