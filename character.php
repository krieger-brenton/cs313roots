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
    <div class="master">
      <form action="characterGen.php" id="character_form">
        <div class="playerholder">
          <div class="characterheading">Player</div>
          <label>Character Name</label>
          <input type="text" name="character_name" class="playertext">
          <label>Alignment</label>
          <select name="alignment" class="playertext">
            <option value="Lawful Good">Lawful Good</option>
            <option value="Neutral Good">Neutral Good</option>
            <option value="Chaotic Good">Chaotic Good</option>
            <option value="Lawful Neutral">Lawful Neutral</option>
            <option value="Neutral">Neutral</option>
            <option value="Chaotic Neutral">Chaotic Neutral</option>
            <option value="Lawful Evil">Lawful Evil</option>
            <option value="Neutral Evil">Neutral Evil</option>
            <option value="Chaotic Evil">Chaotic Evil</option>
          </select>
          <div class="statholder">
            <div class="characterheading">Core Attributes</div>
            <label>Strength</label>
            <input type="text" name="str" class="stattext">
            <label>Dexterity</label>
            <input type="text" name="dex" class="stattext">
            <label>Constitution</label>
            <input type="text" name="con" class="stattext">
            <label>Intelligence</label>
            <input type="text" name="int" class="stattext">
            <label>Wisdom</label>
            <input type="text" name="wis" class="stattext">
            <label>Charisma</label>
            <input type="text" name="cha" class="stattext">
          </div>
        </div>
        <div class="classholder">
          <div class="raceholder">
            <div class="characterheading">Race</div>
            <select name="race">
              <option value="dwarf">Dwarf</option>
              <option value="elf">Elf</option>
              <option value="halfling">Halfling</option>
              <option value="human">Human</option>
              <option value="dragonborn">Dragonborn</option>
              <option value="gnome">Gnome</option>
              <option value="half-elf">Half-elf</option>
              <option value="half-orc">Half-orc</option>
              <option value="tiefling">Tiefling</option>
            </select>
          </div>
          <div class="characterheading">Class</div>
          <div class="characterheading">Level</div>
          <label>Barbarian</label>
          <input type="text" name="barbarian" class="classtext">
          <label>Bard</label>
          <input type="text" name="bard" class="classtext">
          <label>Cleric</label>
          <input type="text" name="cleric" class="classtext">
          <label>Druid</label>
          <input type="text" name="druid" class="classtext">
          <label>Fighter</label>
          <input type="text" name="fighter" class="classtext">
          <label>Monk</label>
          <input type="text" name="monk" class="classtext">
          <label>Paladin</label>
          <input type="text" name="paladin" class="classtext">
          <label>Ranger</label>
          <input type="text" name="ranger" class="classtext">
          <label>Rogue</label>
          <input type="text" name="rogue" class="classtext">
          <label>Sorcerer</label>
          <input type="text" name="sorcerer" class="classtext">
          <label>Warlock</label>
          <input type="text" name="warlock" class="classtext">
          <label>Wizard</label>
          <input type="text" name="wizard" class="classtext">
        </div>
        <div class="skillholder">
          <div class="characterheading">Skills</div>
          <div class="col">
            <label>Acrobatics</label>
            <input type="checkbox" value="acrobatics" name="skill_acrobatics" class="box">
            <label>Animal Handling</label>
            <input type="checkbox" value="animal_handling" name="skill_animal_handling" class="box">
            <label>Arcana</label>
            <input type="checkbox" value="arcana" name="skill_arcana" class="box">
            <label>Athletics</label>
            <input type="checkbox" value="athletics" name="skill_athletics" class="box">
            <label>Deception</label>
            <input type="checkbox" value="deception" name="skill_deception" class="box">
            <label>History</label>
            <input type="checkbox" value="history" name="skill_history" class="box">
            <label>Insight</label>
            <input type="checkbox" value="insight" name="skill_insight" class="box">
            <label>Intimidation</label>
            <input type="checkbox" value="intimidation" name="skill_intimidation" class="box">
            <label>Investigation</label>
            <input type="checkbox" value="investigation" name="skill_investigation" class="box">
          </div>
          <div class="col">
            <label>Medicine</label>
            <input type="checkbox" value="medicine" name="skill_medicine" class="box">
            <label>Nature</label>
            <input type="checkbox" value="nature" name="skill_nature" class="box">
            <label>Perception</label>
            <input type="checkbox" value="perception" name="skill_perception" class="box">
            <label>Performance</label>
            <input type="checkbox" value="performance" name="skill_performance" class="box">
            <label>Persuasion</label>
            <input type="checkbox" value="persuasion" name="skill_persuasion" class="box">
            <label>Religion</label>
            <input type="checkbox" value="religion" name="skill_religion" class="box">
            <label>Sleight of Hand</label>
            <input type="checkbox" value="sleight_of_hand" name="skill_sleight_of_hand" class="box">
            <label>Stealth</label>
            <input type="checkbox" value="stealth" name="skill_stealth" class="box">
            <label>Survival</label>
            <input type="checkbox" value="survival" name="skill_survival" class="box">
          </div>
        </div>
        <div class="equipmentholder">
          <div class="characterheading">Equipment</div>
          <label>Weapon</label>
          <select name="weapon_one">
            <option value="">Unarmed</option>
            <option value="club">Club</option>
            <option value="dagger">Dagger</option>
            <option value="greatclub">Greatclub</option>
            <option value="handaxe">Handaxe</option>
            <option value="javelin">Javelin</option>
            <option value="light hammer">Light Hammer</option>
            <option value="mace">Mace</option>
            <option value="quarterstaff">Quarterstaff</option>
            <option value="sickle">Sickle</option>
            <option value="spear">Spear</option>
            <option value="unarmed strike ">Unarmed Strike </option>
            <option value="crossbow, light">Crossbow, Light</option>
            <option value="dart">Dart</option>
            <option value="shortbow">Shortbow</option>
            <option value="sling">Sling</option>
            <option value="battleaxe">Battleaxe</option>
            <option value="flail">Flail</option>
            <option value="glaive">Glaive</option>
            <option value="greataxe">Greataxe</option>
            <option value="greatsword">Greatsword</option>
            <option value="halberd">Halberd</option>
            <option value="lance">Lance</option>
            <option value="longsword">Longsword</option>
            <option value="maul">Maul</option>
            <option value="morningstar">Morningstar</option>
            <option value="pike">Pike</option>
            <option value="rapier">Rapier</option>
            <option value="scimitar">Scimitar</option>
            <option value="shortsword">Shortsword</option>
            <option value="trident">Trident</option>
            <option value="war pick ">War Pick </option>
            <option value="warhammer">Warhammer</option>
            <option value="whip">Whip</option>
            <option value="blowgun">Blowgun</option>
            <option value="crossbow, hand">Crossbow, Hand</option>
            <option value="crossbow, heavy">Crossbow, Heavy</option>
            <option value="longbow">Longbow</option>
            <option value="net">Net</option>
          </select>
          <label>Weapon</label>
          <select name="weapon_two">
            <option value="">Unarmed</option>
            <option value="club">Club</option>
            <option value="dagger">Dagger</option>
            <option value="greatclub">Greatclub</option>
            <option value="handaxe">Handaxe</option>
            <option value="javelin">Javelin</option>
            <option value="light hammer">Light Hammer</option>
            <option value="mace">Mace</option>
            <option value="quarterstaff">Quarterstaff</option>
            <option value="sickle">Sickle</option>
            <option value="spear">Spear</option>
            <option value="unarmed strike ">Unarmed Strike </option>
            <option value="crossbow, light">Crossbow, Light</option>
            <option value="dart">Dart</option>
            <option value="shortbow">Shortbow</option>
            <option value="sling">Sling</option>
            <option value="battleaxe">Battleaxe</option>
            <option value="flail">Flail</option>
            <option value="glaive">Glaive</option>
            <option value="greataxe">Greataxe</option>
            <option value="greatsword">Greatsword</option>
            <option value="halberd">Halberd</option>
            <option value="lance">Lance</option>
            <option value="longsword">Longsword</option>
            <option value="maul">Maul</option>
            <option value="morningstar">Morningstar</option>
            <option value="pike">Pike</option>
            <option value="rapier">Rapier</option>
            <option value="scimitar">Scimitar</option>
            <option value="shortsword">Shortsword</option>
            <option value="trident">Trident</option>
            <option value="war pick ">War Pick </option>
            <option value="warhammer">Warhammer</option>
            <option value="whip">Whip</option>
            <option value="blowgun">Blowgun</option>
            <option value="crossbow, hand">Crossbow, Hand</option>
            <option value="crossbow, heavy">Crossbow, Heavy</option>
            <option value="longbow">Longbow</option>
            <option value="net">Net</option>
          </select>
          <label>Armor</label>
          <select name="armor">
            <option value="">Unarmored</option>
            <option value="padded">Padded</option>
            <option value="leather">Leather</option>
            <option value="studded">Studded</option>
            <option value="hide">Hide</option>
            <option value="chain shirt">Chain Shirt</option>
            <option value="scale mail">Scale Mail</option>
            <option value="breastplate">Breastplate</option>
            <option value="half plate">Half Plate</option>
            <option value="ring mail,">Ring Mail</option>
            <option value="chain mail">Chain Mail</option>
            <option value="splint">Splint</option>
            <option value="plate">Plate</option>
          </select>
          <label>Shield</label>
          <input type="checkbox" name="shield">
        </div>
        <input type="submit" id="button" value="Make Character">
      </form>
    </div>
  </body>
</html>