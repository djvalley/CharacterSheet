<?php

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

  // Statpoints DB
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