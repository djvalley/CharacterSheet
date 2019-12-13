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
  $expPoints = sanitizeString(INPUT_POST, 'experience');
  $alignment = sanitizeString(INPUT_POST, 'alignment');
  $inspiration = sanitizeString(INPUT_POST, 'inspiration');
  $proficiencyBonus = sanitizeString(INPUT_POST, 'proficiencyBonus');
  $passiveStat = sanitizeString(INPUT_POST, 'passiveStat');
  $passiveStatNum = sanitizeString(INPUT_POST, 'passiveStatNumber');

  // Life State DB
  $armorClass = sanitizeString(INPUT_POST, 'armorClass');
  $initiative = sanitizeString(INPUT_POST, 'initiative');
  $speed = sanitizeString(INPUT_POST, 'speed');
  $hpMax = sanitizeString(INPUT_POST, 'maxHP');
  $hpCurrent = sanitizeString(INPUT_POST, 'currentHP');
  $hpTemp = sanitizeString(INPUT_POST, 'tempHP');
  $hitDice = sanitizeString(INPUT_POST, 'hitDice');
  $deathSaves = sanitizeString(INPUT_POST, 'deathSaves');

  // Stats DB
  $strength = sanitizeString(INPUT_POST, 'strength');
  $dexterity = sanitizeString(INPUT_POST, 'dexterity');
  $constitution = sanitizeString(INPUT_POST, 'constitution');
  $intelligence = sanitizeString(INPUT_POST, 'intelligence');
  $wisdom = sanitizeString(INPUT_POST, 'wisdom');
  $charisma = sanitizeString(INPUT_POST, 'charisma');

  // Skills DB
  $acrobatics = sanitizeString(INPUT_POST, 'acrobatics');
  $medicine = sanitizeString(INPUT_POST, 'medicine');
  $animalHandling = sanitizeString(INPUT_POST, 'animalHandling');
  $nature = sanitizeString(INPUT_POST, 'nature');
  $arcana = sanitizeString(INPUT_POST, 'arcana');
  $perception = sanitizeString(INPUT_POST, 'perception');
  $athletics = sanitizeString(INPUT_POST, 'athletics');
  $performance = sanitizeString(INPUT_POST, 'performance');
  $deception = sanitizeString(INPUT_POST, 'deception');
  $persuasion = sanitizeString(INPUT_POST, 'persuasion');
  $history = sanitizeString(INPUT_POST, 'history');
  $religion = sanitizeString(INPUT_POST, 'religion');
  $insight = sanitizeString(INPUT_POST, 'insight');
  $sleightOfHand = sanitizeString(INPUT_POST, 'sleightOfHand');
  $intimidation = sanitizeString(INPUT_POST, 'intimidation');
  $stealth = sanitizeString(INPUT_POST, 'stealth');
  $investigation = sanitizeString(INPUT_POST, 'investigation');
  $survival = sanitizeString(INPUT_POST, 'survival');
  
  // Traits DB
  $personalityTraits = sanitizeString(INPUT_POST, 'personalityTraits');
  $ideals = sanitizeString(INPUT_POST, 'ideals');
  $bonds = sanitizeString(INPUT_POST, 'bonds');
  $flaws = sanitizeString(INPUT_POST, 'flaws');
  $proficiencies = sanitizeString(INPUT_POST, 'proficiencies');
  $languages = sanitizeString(INPUT_POST, 'languages');
  
  // Equipment DB
  $cp = sanitizeString(INPUT_POST, 'CP');
  $sp = sanitizeString(INPUT_POST, 'SP');
  $ep = sanitizeString(INPUT_POST, 'EP');
  $gp = sanitizeString(INPUT_POST, 'GP');
  $pp = sanitizeString(INPUT_POST, 'PP');
  $longDesc = sanitizeString(INPUT_POST, 'inventory');
  
  
try {
  
  $pdo->beginTransaction();
  
  $characterQuery = "UPDATE characters SET playerName=?, class=?, level=?, race=?, background=?,
                     expPoints=?, alignment=?, inspiration=?, proficiencyBonus=?, passiveStat=?, passiveStatNum=?
                     WHERE characterID = $characterId";
  $lifeQuery = "UPDATE lifeState SET armorClass=?, initiative=?, speed=?, hpMax=?, hpCurrent=?, hpTemp=?, hitDice=?, deathSaves=?
                WHERE characterID = $characterId";
  $statsQuery = "UPDATE stats SET strength=?, dexterity=?, constitution=?, intelligence=?, wisdom=?, charisma=?
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
  $stmt->execute([$armorClass, $initiative, $speed, $hpMax, $hpCurrent, $hpTemp, $hitDice, $deathSaves]);
  
  $stmt = $pdo->prepare($statsQuery);
  $stmt->execute([$strength, $dexterity, $constitution, $intelligence, $wisdom, $charisma]);
  
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