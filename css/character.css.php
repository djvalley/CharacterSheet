<?php

?>
/* general formatting */

.sheetSection {
    border-style: solid;
    border-width: 1.75px 1.75px 1.75px 1.75px;
    border-color: black;
    padding: 2% 0 2% 0;
    margin-top: 2%;
    text-align: center;
}

#mainContent {
    width: 95%;
    margin-left: 2.5%;
}

/* basic info */
#basicInfoBanner {
    width: 92%;
    float: left;
    margin-left: 3%;
    margin-top: 1%;
    padding: 0 0 2% 0
}

#basicLeft {
    width: 30%;
    float: left;
    position: relative;
}

#basicLeft h1 {
    margin-top: 12%;
    margin-bottom: 2%;
}

#basicLeft h3 {
    margin-top: 0;
    margin-bottom: 2%;
}

#editBtn {
    position: absolute;
    top: 2px;
    left: 2px;
}

#basicSection1 {
    width: 33%;
    float: left;
    padding: 0 0 0 0;
}

#basicSection1 h4 {
    margin-bottom: 2%;
}

#basicSection1 input {
    width: 70%;
}

#basicSection2 {
    width: 33%;
    float: left;
    padding: 0 0 0 0;
}

#basicSection2 h4 {
    margin-bottom: 2%;
}

#basicSection2 input {
    width: 70%;
}

#basicSection3 {
    width: 33%;
    float: left;
    padding: 0 0 0 0;
}

#basicSection3 h4 {
    margin-bottom: 2%;
}

#basicSection3 input {
    width: 70%;
}

#basicRight {
    width: 70%;
    float: left;
}

/* left column */
#sheetLeft {
    width: 33%;
    float: left;
    height: 1600px;
}

/* core stats (left)*/
#baseStatsDiv {
    float: left;
    width: 38.5%;
    margin-left: 2%;
}

.basicStat {
    width: 90%;
    margin-left: 5%;
}

.basicStat h4 {
    margin-top: 3%;
    margin-bottom: 0;
}

.baseStatsText {
    margin-top: 3%;
    width: 90%;
}

/* passives (left) */
#PassiveDiv {
    width: 38.5%;
    float: left;
    padding-bottom: 4%;
    padding-top: 1%;
    margin-top: 4%;
    margin-left: 2%;
}

#PassiveDiv h4 {
    width: 80%;
    margin-left: 10%;
    text-align: center;
}

#PassiveDiv input {
    width: 80%;
    margin-left: 5%;
}

/*first row right  */
.bonusDiv {
    width: 56%;
    float: right;
    padding-top: 0;
    padding-bottom: 4%;
    margin-bottom: 2%;
}

#proficiencyDiv {
    margin-top: 0;
}

.bonusDiv h4 {
    margin-bottom: 0;
}

.bonusDiv input {
    width: 75%;
    margin-top: 3%;
}

/* stats (right) */
#statsDiv {
    width: 56%;
    float: right;
    padding-top: 5%;
    margin-bottom: 1%;
}

/* having isues aligning center on screen size change */
#adjustedStats {
    width: 90%;
    margin-left: 10%;
}

#statsDiv h3 {
    width: 60%;
    margin-left: 15%;
}

#adjustedStats h4 {
    width: 20%;
    margin-top: 5%;
    margin-bottom: 5%;
}

.adjStatsText {
    width: 80%;
}

/* skills (full) */
#skillsDiv {
    width: 98%;
    float: left;
    padding-bottom: 0;
    margin-left: 2%;
}

#skillsDiv h3 {
    width: 50%;
    margin-left: 25%;
}

#skillsTable1 {
    width: 45%;
    float: left;
    padding-left: 1%;
}

#skillsTable2 {
    width: 45%;
    float: right;
    padding-right: 3%;
}

#skillsTable1 table, #skillsTable2 table {
    border-collapse: collapse;
}

.skillStat {
    width: 60%;
    margin-left: 20%;
}

.skillText {
    width: 90%;
    margin-left: 5%;
    margin-bottom: 5%;
}

/* language (full) */
#LanguageDiv {
    width: 98%;
    float: left;
    margin-left: 2%;
}

#LanguageDiv h3 {
    margin-top: 2%;
    margin-bottom: 2%;
    width: 80%;
    margin-left: 8%;
    text-align: center;
}

.passivesText {
    height: 150px;
    width: 90%;
    resize: none;
    margin-bottom: 2%;
}


/* center column */
#sheetCenter {
    float: left;
    width: 33%;
    height: 1600px;
}

/* core stats */
/* Row 1 */
.coreStatRowOne {
    width: 30%;
    float: left;
    margin-left: 2.5%;
}

.coreStatRowOne h3 {
    margin-top: 0;
}

.coreStatRowOne input {
    width: 90%;
    margin-bottom: 0;
}

/* row 2 */
.coreStatRowTwo {
    width: 90%;
    margin-left: 6%;
    float: left;
    padding-top: 0;
}

#floatLeft {
    width: 45%;
    float: left;
}

#floatLeft input {
    width: 80%;
}

#floatRight {
    width: 45%;
    float: right;
}

#floatRight input {
    width: 80%;
}

/* row 3 */
.coreStatRowThree {
    width: 100%;
    float: left;
}

.coreStatsEdit3 {
    width: 60%;
    margin-top: 2%;
    margin-bottom: 0;
}

#hitDice {
    width: 40%;
    margin-top: 9%;
    margin-left: 7%;
    float: left;
    padding-top: 0;
}

#hitDice h3 {
    margin-bottom: 0;
}

#deathSaves {
    width: 40%;
    margin-left: 5%;
    padding-bottom: 3%;
    float: left;
    padding-top: 0;
}

#deathSaves h3 {
    margin-bottom: 0;
}

#attacksTable {
    float: left;
    width: 92.5%;
    margin-left: 3.5%;
    margin-bottom: 1%;
}

#attacksTable tr input {
    width: 90%;

}

#attacksTable h3 {
    margin-top: 0;
}

#attackNotes {
    float: left;
    width: 92.5%;
    margin-left: 3.5%;
    margin-top: 0;
}

#attackNotes h3 {
    width: 60%;
    margin-left: 20%;
    margin-bottom: 3%;
    margin-top: 0;
}

#attackNotes textarea {
    width: 90%;
    height: 150px;
    margin-bottom: 2%;
    resize: none;
}

/* Attacks and spellcasting */
/* Equipment */
#equipmentTable {
    width: 20%;
    float: left;
    margin-left: 3%;
    margin-top: 12%;
    padding: 2% 2% 2% 2%;
}

#equipmentTable > table, #equipmentTable > table td {
    border: 1px solid black;
    border-collapse: collapse;
}

.InventoryTableText {
    width: 80%;
    margin: 0;
}

#equipmentOverview {
    float: right;
    width: 68%;
    margin-right: 2%;
}

#equipmentOverview h3 {
    width: 60%;
    margin-left: 20%;
    margin-top: 0;
}

#EquipmentText {
    height: 400px;
    width: 90%;
    resize: none;
    /* margin-left: 4%; */
    /* margin-bottom: 2%; */
}

/* right column */
#sheetRight {
    float: left;
    width: 33%;
    height: 1600px;
}

/* personality group */
.personalitySub {
    width: 93%;
    margin-left: 2%;
    padding-top: 0;
}

.personalitySub h3 {
    margin-top: 2%;
    margin-bottom: 2%;
}

.personalityText {
    height: 160px;
    width: 90%;
    resize: none;
}

/* features and traits */
#featuresDiv {
    width: 93%;
    margin-left: 2%;
    padding-top: 0;
}

#featuresDiv h3 {
    margin-top: 2%;
    margin-bottom: 2%;
}

#featuresDetailed {
    resize: none;
    height: 360px;
    width: 85%;
}

