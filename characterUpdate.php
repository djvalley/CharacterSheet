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


  $deathSaves = sanitizeString(INPUT_POST, 'characterID');