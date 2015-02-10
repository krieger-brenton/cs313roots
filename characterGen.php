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
    <div class="master"><?php require $_SERVER['DOCUMENT_ROOT'] . '/files_php/characterGen.php';?>
      <div class="characterInfo">
        <div class="playerName"><span><?php print "Player Name: " . $_SESSION['player_name']; ?></span></div>
        <div class="characterName"><span><?php print "Character Name: " . $_SESSION['character_name']; ?></span></div>
        <div class="characterAlignment"><span><?php print "Alignment: " . $_SESSION['alignment']; ?></span></div>
        <div class="characterRace"><span><?php print "Race: " . $_SESSION['race']; ?></span></div>
        <div class="characterClass"> <span><?php print "Class: "; $first = true; foreach($classes as $class){ if(!empty($_SESSION[$class])){ if(!$first) { print ' / '; } print ucwords($class) . ' ' . $_SESSION[$class]; $first = false; } } ?></span></div>
        <div class="characterLevel"><span><?php print "Level: " . $_SESSION['level']; ?></span></div>
        <div class="characterSpeed"><span><?php print "Speed: " . $_SESSION['speed'] . " ft"; ?></span></div>
        <div class="characterSize"><span><?php print "Size: " . $_SESSION['size']; ?></span></div>
      </div>
      <div class="characterCombatInfo">
        <div class="characterAC"><span><?php if (isset($_SESSION['ac'])) { print "Armor Class: " . $_SESSION['ac']; } ?></span></div>
        <div class="characterShield"><span><?php if (isset($_SESSION['shield'])) { print "Shield Equiped: "; if ($_SESSION['shield']) print "Yes"; else print "No"; } ?></span></div>
        <div class="characterHitDice"><span><?php if (isset($_SESSION['hit_die'])) { print "Hit Dice: " . $_SESSION['hit_die']; } ?></span></div>
        <div class="characterProffBonus"><span><?php if (isset($_SESSION['prof'])) { print "Profficiency Bonus: " . $_SESSION['prof']; } ?></span></div>
        <div class="weapon">
          <div class="weaponInfo">
            <?php if (isset($_SESSION['weapon_one_name'])) { print "Weapon Name: " . ucwords($_SESSION['weapon_one_name']); } ?>
            <?php if (isset($_SESSION['weapon_one_damage'])) { print "Damage: " . ucwords($_SESSION['weapon_one_damage']); } ?>
            <?php if (isset($_SESSION['weapon_one_damage_type'])) { print "Damage Type: " . ucwords($_SESSION['weapon_one_damage_type']); } ?>
          </div>
          <button class="weaponAttack">not ready yet</button><br><br><br>
          <div class="weaponContent">
             
            <?php if (!empty($prop)) {foreach($props_one as $prop){ print $prop . '<BR />';} } ?>
          </div>
        </div>
        <div class="weapon">
          <div class="weaponInfo">
            <?php if (isset($_SESSION['weapon_two_name'])) { print "Weapon Name: " . ucwords($_SESSION['weapon_two_name']); } ?>
            <?php if (isset($_SESSION['weapon_two_damage'])) { print "Damage: " . ucwords($_SESSION['weapon_two_damage']); } ?>
            <?php if (isset($_SESSION['weapon_two_damage_type'])) { print "Damage Type: " . ucwords($_SESSION['weapon_two_damage_type']); } ?>
          </div>
          <button class="weaponAttack">not ready yet</button><br><br><br>
          <div class="weaponContent">
             
            <?php if (!empty($prop)) {foreach($props_one as $prop){ print $prop . '<BR />';} } ?>
          </div>
        </div>
      </div>
      <div onload="checkCharacterMod()" class="characterStats">
        <div class="characterStat">
          <label>Strength <span class="characterMod"><?php if (isset($_SESSION['str'])) { if ($_SESSION['str'] > 0) { print "Modifier: +" . $_SESSION['str']; } } ?></span>
            <input type="button" value="not ready"><span><?php if (!empty($_GET['str'])) print $_GET['str']; ?></span>
          </label>
        </div>
        <div class="characterStat">
          <label>Dexterity <span class="characterMod"><?php if (isset($_SESSION['dex'])) { if ($_SESSION['dex'] > 0) { print "Modifier: +" . $_SESSION['dex']; } } ?></span>
            <input type="button" value="not ready"><span><?php if (!empty($_GET['dex'])) print $_GET['dex']; ?></span>
          </label>
        </div>
        <div class="characterStat">
          <label>Constitution<span class="characterMod"><?php if (isset($_SESSION['con'])) { if ($_SESSION['con'] > 0) { print "Modifier: +" . $_SESSION['con']; } } ?></span>
            <input type="button" value="not ready"><span><?php if (!empty($_GET['con'])) print $_GET['con']; ?></span>
          </label>
        </div>
        <div class="characterStat">
          <label>Intelligence<span class="characterMod"><?php if (isset($_SESSION['int'])) { if ($_SESSION['int'] > 0) { print "Modifier: +" . $_SESSION['int']; } } ?></span>
            <input type="button" value="not ready"><span><?php if (!empty($_GET['int'])) print $_GET['int']; ?></span>
          </label>
        </div>
        <div class="characterStat">
          <label>Wisdom<span class="characterMod"><?php if (isset($_SESSION['wis'])) { if ($_SESSION['wis'] > 0) { print "Modifier: +" . $_SESSION['wis']; } } ?></span>
            <input type="button" value="not ready"><span><?php if (!empty($_GET['wis'])) print $_GET['wis']; ?></span>
          </label>
        </div>
        <div class="characterStat">
          <label>Charisma <span class="characterMod"><?php if (isset($_SESSION['cha'])) { if ($_SESSION['cha'] > 0) { print "Modifier: +" . $_SESSION['cha']; } } ?></span>
            <input type="button" value="not ready"><span><?php if (!empty($_GET['cha'])) print $_GET['cha']; ?></span>
          </label>
        </div>
      </div>
    </div>
  </body>
</html>