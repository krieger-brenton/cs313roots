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
    <div class="master"><?php $classes[0] = 'barbarian'; $classes[1] = 'bard'; $classes[2] = 'cleric'; $classes[3] = 'druid'; $classes[4] = 'fighter'; $classes[5] = 'monk'; $classes[6] = 'paladin'; $classes[7] = 'ranger'; $classes[8] = 'rogue'; $classes[9] = 'sorcerer'; $classes[10] = 'warlock'; $classes[11] = 'wizard';?>
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
      <div class="results">
        <textarea id="results" cols="20" rows="15"> </textarea>
      </div>
      <div class="characterSkills">
        <lable>Skill Checks</lable>
        <div class="col">
           
          <?php $line = "<input type='button' value='Acrobatics' onclick='statRolls("; if ($_SESSION['skill_acrobatics'] != 0) {$line .= $_SESSION['dex'] + $_SESSION['prof'];} else {$line .= $_SESSION['dex'];} $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Animal Handling' onclick='statRolls("; if ($_SESSION['skill_animal_handling'] != 0) $line .= $_SESSION['wis'] + $_SESSION['prof']; else $line .= $_SESSION['wis']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Arcana' onclick='statRolls("; if ($_SESSION['skill_arcana'] != 0) $line .= $_SESSION['int'] + $_SESSION['prof']; else $line .= $_SESSION['int']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Athletics' onclick='statRolls("; if ($_SESSION['skill_athletics'] != 0) $line .= $_SESSION['str'] + $_SESSION['prof']; else $line .= $_SESSION['str']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Deception' onclick='statRolls("; if ($_SESSION['skill_deception'] != 0) $line .= $_SESSION['cha'] + $_SESSION['prof']; else $line .= $_SESSION['cha']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='History' onclick='statRolls("; if ($_SESSION['skill_history'] != 0) $line .= $_SESSION['int'] + $_SESSION['prof']; else $line .= $_SESSION['int']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Insight' onclick='statRolls("; if ($_SESSION['skill_insight'] != 0) $line .= $_SESSION['wis'] + $_SESSION['prof']; else $line .= $_SESSION['wis']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Intimidation' onclick='statRolls("; if ($_SESSION['skill_intimidation'] != 0) $line .= $_SESSION['cha'] + $_SESSION['prof']; else $line .= $_SESSION['cha']; $line .= ")'> <BR />"; print $line; ?>          
          <?php $line = "<input type='button' value='Investigation' onclick='statRolls(";if ($_SESSION['skill_investigation'] != 0) {$line .= $_SESSION['int'] + $_SESSION['prof'];} else {$line .= $_SESSION['int'];} $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Medicine' onclick='statRolls("; if ($_SESSION['skill_medicine'] != 0) $line .= $_SESSION['wis'] + $_SESSION['prof']; else $line .= $_SESSION['wis']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Nature' onclick='statRolls("; if ($_SESSION['skill_nature'] != 0) $line .= $_SESSION['int'] + $_SESSION['prof']; else $line .= $_SESSION['int']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Perception' onclick='statRolls("; if ($_SESSION['skill_perception'] != 0) $line .= $_SESSION['wis'] + $_SESSION['prof']; else $line .= $_SESSION['wis']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Performance' onclick='statRolls("; if ($_SESSION['skill_performance'] != 0) $line .= $_SESSION['cha'] + $_SESSION['prof']; else $line .= $_SESSION['cha']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Persuasion' onclick='statRolls("; if ($_SESSION['skill_persuasion'] != 0) $line .= $_SESSION['cha'] + $_SESSION['prof']; else $line .= $_SESSION['cha']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Religion' onclick='statRolls("; if ($_SESSION['skill_religion'] != 0) $line .= $_SESSION['int'] + $_SESSION['prof']; else $line .= $_SESSION['int']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Sleight of Hand' onclick='statRolls("; if ($_SESSION['skill_sleight_of_hand'] != 0) $line .= $_SESSION['dex'] + $_SESSION['prof']; else $line .= $_SESSION['dex']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Stealth' onclick='statRolls("; if ($_SESSION['skill_stealth'] != 0) $line .= $_SESSION['dex'] + $_SESSION['prof']; else $line .= $_SESSION['dex']; $line .= ")'> <BR />"; print $line; ?>
          <?php $line = "<input type='button' value='Survival' onclick='statRolls("; if ($_SESSION['skill_survival'] != 0) $line .= $_SESSION['wis'] + $_SESSION['prof']; else $line .= $_SESSION['wis']; $line .= ")'> <BR />"; print $line; ?>
        </div>
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
             
            <?php if (!empty($props_one)) {foreach($props_one as $prop){ print $prop . '<BR />';} } ?>
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
             
            <?php if (!empty($props_two)) {foreach($props_two as $prop){ print $prop . '<BR />';} } ?>
          </div>
        </div>
      </div>
      <div onload="checkCharacterMod()" class="characterStats">
        <div class="characterStat">
          <label>Strength <span class="characterMod"><?php if (isset($_SESSION['str'])) { if ($_SESSION['str'] > 0) { print "Modifier: +" . $_SESSION['str']; } } ?></span><?php if (!isset($_SESSION['str'])){$_SESSION['str'] = 0;} print "           <input type='button' value='Check' onclick='statRolls(" . $_SESSION['str'] . ")'>"; ?> <span><?php if (!empty($_SESSION['strstat'])) print $_SESSION['strstat']; ?></span></label>
        </div>
        <div class="characterStat">
          <label>Dexterity <span class="characterMod"><?php if (isset($_SESSION['dex'])) { if ($_SESSION['dex'] > 0) { print "Modifier: +" . $_SESSION['dex']; } } ?></span><?php if (!isset($_SESSION['dex'])){$_SESSION['dex'] = 0;} print "           <input type='button' value='Check' onclick='statRolls(" . $_SESSION['dex'] . ")'>"; ?><span><?php print $_SESSION['dexstat']; ?></span></label>
        </div>
        <div class="characterStat">
          <label>Constitution<span class="characterMod"><?php if (isset($_SESSION['con'])) { if ($_SESSION['con'] > 0) { print "Modifier: +" . $_SESSION['con']; } } ?></span><?php if (!isset($_SESSION['con'])){$_SESSION['con'] = 0;} print "           <input type='button' value='Check' onclick='statRolls(" . $_SESSION['con'] . ")'>"; ?><span><?php print $_SESSION['constat']; ?></span></label>
        </div>
        <div class="characterStat">
          <label>Intelligence<span class="characterMod"><?php if (isset($_SESSION['int'])) { if ($_SESSION['int'] > 0) { print "Modifier: +" . $_SESSION['int']; } } ?></span><?php if (!isset($_SESSION['int'])){$_SESSION['int'] = 0;} print "           <input type='button' value='Check' onclick='statRolls(" . $_SESSION['int'] . ")'>"; ?><span><?php print $_SESSION['intstat']; ?></span></label>
        </div>
        <div class="characterStat">
          <label>Wisdom<span class="characterMod"><?php if (isset($_SESSION['wis'])) { if ($_SESSION['wis'] > 0) { print "Modifier: +" . $_SESSION['wis']; } } ?></span><?php if (!isset($_SESSION['wis'])){$_SESSION['wis'] = 0;} print "           <input type='button' value='Check' onclick='statRolls(" . $_SESSION['wis'] . ")'>"; ?><span><?php print $_SESSION['wisstat']; ?></span></label>
        </div>
        <div class="characterStat">
          <label>Charisma <span class="characterMod"><?php if (isset($_SESSION['cha'])) { if ($_SESSION['cha'] > 0) { print "Modifier: +" . $_SESSION['cha']; } } ?></span><?php if (!isset($_SESSION['cha'])){$_SESSION['cha'] = 0;} print "           <input type='button' value='Check' onclick='statRolls(" . $_SESSION['cha'] . ")'>"; ?><span><?php print $_SESSION['chastat']; ?></span></label>
        </div>
        <form action="files_php/characterSave.php">
          <input type="submit" value="Save Character">
        </form>
        <form action="files_php/characterDelete.php">
          <input type="submit" value="Delete Character">
        </form>
      </div>
    </div>
  </body>
</html>