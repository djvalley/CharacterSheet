<?php

  require 'resources/tools.php';
  
  //Input Sanitization

  // CharacterID
  $characterId = sanitizeString(INPUT_POST, 'characterID');

  // characters DB items
  $playerName = sanitizeString(INPUT_POST, 'playerName');
  $class = sanitizeString(INPUT_POST, 'class');
  $level = sanitizeString(INPUT_POST, 'level');
  $race = sanitizeString(INPUT_POST, 'race');
  $background = sanitizeString(INPUT_POST, 'background');
  $expPoints = sanitizeString(INPUT_POST, 'xp');
  $alignment = sanitizeString(INPUT_POST, 'alignment');
  $inspiration = sanitizeString(INPUT_POST, 'inspiration');
  $proficiencyBonus = sanitizeString(INPUT_POST, 'proficiency');
  $passiveStat = sanitizeString(INPUT_POST, 'passiveStat');
  $passiveStatNum = sanitizeString(INPUT_POST, 'passiveStatNumber');

  // Life State DB
  $armorClass = sanitizeString(INPUT_POST, 'coreArmor');
  $initiative = sanitizeString(INPUT_POST, 'coreInit');
  $speed = sanitizeString(INPUT_POST, 'coreSpd');
  $hpMax = sanitizeString(INPUT_POST, 'coreHP');
  $hpCurrent = sanitizeString(INPUT_POST, 'coreCurrentHP');
  $hpTemp = sanitizeString(INPUT_POST, 'coreAdjHP');
  $hitDice = sanitizeString(INPUT_POST, 'rolledHit');
  $totalDice = sanitizeString(INPUT_POST, 'totalHit');
  $deathSaves = sanitizeString(INPUT_POST, 'deathSuccess');
  $deathFail = sanitizeString(INPUT_POST, 'deathFail');

  // Stats DB
  $baseStr = sanitizeString(INPUT_POST, 'baseStr');
  $baseDex = sanitizeString(INPUT_POST, 'baseDex');
  $baseCon = sanitizeString(INPUT_POST, 'baseCon');
  $baseInt = sanitizeString(INPUT_POST, 'baseInt');
  $baseWis = sanitizeString(INPUT_POST, 'baseWis');
  $baseChar = sanitizeString(INPUT_POST, 'baseChar');
  
  // Saving Throws DB
  $adjStr = sanitizeString(INPUT_POST, 'adjStr');
  $adjDex = sanitizeString(INPUT_POST, 'adjDex');
  $adjCon = sanitizeString(INPUT_POST, 'adjCon');
  $adjInt = sanitizeString(INPUT_POST, 'adjInt');
  $adjWis = sanitizeString(INPUT_POST, 'adjWis');
  $adjChar = sanitizeString(INPUT_POST, 'adjChar');
  

  // Skills DB
  $acrobatics = sanitizeString(INPUT_POST, 'skill1');
  $medicine = sanitizeString(INPUT_POST, 'skill10');
  $animalHandling = sanitizeString(INPUT_POST, 'skill2');
  $nature = sanitizeString(INPUT_POST, 'skill11');
  $arcana = sanitizeString(INPUT_POST, 'skill3');
  $perception = sanitizeString(INPUT_POST, 'perception');
  $athletics = sanitizeString(INPUT_POST, 'skill4');
  $performance = sanitizeString(INPUT_POST, 'skill12');
  $deception = sanitizeString(INPUT_POST, 'skill5');
  $persuasion = sanitizeString(INPUT_POST, 'skill13');
  $history = sanitizeString(INPUT_POST, 'skill6');
  $religion = sanitizeString(INPUT_POST, 'skill14');
  $insight = sanitizeString(INPUT_POST, 'skill7');
  $sleightOfHand = sanitizeString(INPUT_POST, 'skill15');
  $intimidation = sanitizeString(INPUT_POST, 'skill8');
  $stealth = sanitizeString(INPUT_POST, 'skill16');
  $investigation = sanitizeString(INPUT_POST, 'skill9');
  $survival = sanitizeString(INPUT_POST, 'skill17');
  
  // Traits DB
  $personalityTraits = sanitizeString(INPUT_POST, 'persTraits');
  $ideals = sanitizeString(INPUT_POST, 'persIdeals');
  $bonds = sanitizeString(INPUT_POST, 'persBonds');
  $flaws = sanitizeString(INPUT_POST, 'persFlaws');
  $proficiencies = sanitizeString(INPUT_POST, 'proficiencies');
  $languages = sanitizeString(INPUT_POST, 'languages');
  
  // Equipment DB
  $cp = sanitizeString(INPUT_POST, 'invCP');
  $sp = sanitizeString(INPUT_POST, 'invSP');
  $ep = sanitizeString(INPUT_POST, 'invEP');
  $gp = sanitizeString(INPUT_POST, 'invGP');
  $pp = sanitizeString(INPUT_POST, 'invPP');
  $longDesc = sanitizeString(INPUT_POST, 'EquipmentText');
  
  
try {
  
  $pdo->beginTransaction();
  
  $characterQuery = "UPDATE characters SET playerName=?, class=?, level=?, race=?, background=?,
                     expPoints=?, alignment=?, inspiration=?, proficiencyBonus=?, passiveStat=?, passiveStatNum=?
                     WHERE characterID = $characterId";
  $lifeQuery = "UPDATE lifeState SET armorClass=?, initiative=?, speed=?, hpMax=?, hpCurrent=?, hpTemp=?, hitDice=?, deathSaves=?, totalDice=?, deathFail=?
                WHERE characterID = $characterId";
  $statsQuery = "UPDATE stats SET strength=?, dexterity=?, constitution=?, intelligence=?, wisdom=?, charisma=?,
                 adjStr=?, adjDex=?, adjCon=?, adjInt=?, adjWis=?, adjChar=?
                 WHERE characterID = $characterId";
  $skillsQuery = "UPDATE skills SET acrobatics=?, animalHandling=?, arcana=?, athletics=?, deception=?, history=?, insight=?, intimidation=?,
                  investigation=?, medicine=?, nature=?, perception=?, performance=?, persuasion=?, religion=?, sleightOfHand=?, stealth=?, survival=?
                  WHERE characterID = $characterId";
  $traitsQuery = "UPDATE traits SET personalityTraits=?, ideals=?, bonds=?, flaws=?, proficiencies=?, languages=?
                  WHERE characterID = $characterId";
  $equipmentQuery = "UPDATE equipment SET CP=?, SP=?, EP=?, GP=?, PP=?, longDesc=?
                     WHERE characterID = $characterId";
  
  $stmt = $pdo->prepare($characterQuery);
  $stmt->execute([$playerName, $class, $level, $race, $background, $expPoints, $alignment, $inspiration, $proficiencyBonus, $passiveStat, $passiveStatNum]);
  
  $stmt = $pdo->prepare($lifeQuery);
  $stmt->execute([$armorClass, $initiative, $speed, $hpMax, $hpCurrent, $hpTemp, $hitDice, $deathSaves, $totalDice, $deathFail]);
  
  
  $stmt = $pdo->prepare($statsQuery);
  $stmt->execute([$baseStr, $baseDex, $baseCon, $baseInt, $baseWis, $baseChar, $adjStr, $adjDex, $adjCon, $adjInt, $adjWis, $adjChar]);
  
  $stmt = $pdo->prepare($skillsQuery);
  $stmt->execute([$acrobatics, $animalHandling, $arcana, $athletics, $deception, $history, $insight, $intimidation, $investigation, $medicine, $nature, $perception, $performance, $persuasion, $religion, $sleightOfHand, $stealth, $survival]);
  
  $stmt = $pdo->prepare($traitsQuery);
  $stmt->execute([$personalityTraits, $ideals, $bonds, $flaws, $proficiencies, $languages]);
  
  $stmt = $pdo->prepare($equipmentQuery);
  $stmt->execute([$cp, $sp, $ep, $gp, $pp, $longDesc]);
  
  $pdo->commit();
  
} catch (PDOException $e) {
  
  $pdo->rollBack();
  echo "Failed: " . $e->getMessage();
  
}

header("Location: https://itcapstone.djvalley.com/characters.php?charID=$characterId");