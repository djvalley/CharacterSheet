<?php
    header("Content-type: text/css; charset: UTF-8");

$lightGreyBackgroundColor = '#AAAAAA';

$navBackgroundColor = '#000000';
$navHoverColor = '#CCCCCC';


?>

@font-face {
    font-family: "DickensScript";
    src: url("../fonts/DickensScript.TTF");
}

@font-face {
    font-family: 'morpheusregular';
    src: url('../fonts/morpheusregular-webfont.woff2') format('woff2'),
    url('../fonts/morpheusregular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}


@font-face {
    font-family: 'nosferaturegular';
    src: url('../fonts/nosteraturegular-webfont.woff2') format('woff2'),
    url('../fonts/nosteraturegular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}


@font-face {
    font-family: 'qtwestendregular';
    src: url('../fonts/westendregular-webfont.woff2') format('woff2'),
    url('../fonts/westendregular-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
}

body {
    background-color: <?= $lightGreyBackgroundColor ?>;
    font-family: DickensScript, serif;
}

h1 {
    background-color: <?= $lightGreyBackgroundColor ?>;
    font-family: morpheusregular, serif;
}

h2, h3, h4 {
    font-family: qtwestendregular, serif;
}

h1 {
    font-size: 3em;
    letter-spacing: .5rem;
    text-align: center;
    display: block;
}

div.container > h2 {
    font-size: 2rem;
    letter-spacing: 4px;
    display: block;
    background-color: #5b5b5b;
    color: <?= $navHoverColor ?>;
    padding: 1rem;
    border-radius: 5px;
    text-align: center;
}

div.container > p {
    text-align: center;
}

.wrapper {
    width: 75%;
    margin: auto;
    min-height: 600px;
}

.container {
    padding: 1.5rem;
    width: 75%;
    margin: auto;
}


label, input {
    margin: 5px;
}

.account {
    width: 75%;
    margin: auto;
    text-align: left;
}

.account > form {
    text-align: center;
    display: table;
    width: 65%;
    margin: auto;
}

.account > row {
    display: table-row;
    float: left;
}

.account label, .account input {
    display: table-cell;
}

.account label {
    width: 125px;
    text-align: right;
}

.account select {
    display: table-cell;
    width: 173px;
    margin: 5px;
}




<?php
include "nav.css.php";

?>