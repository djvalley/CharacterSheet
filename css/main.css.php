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

.wrapper {
    width: 90%;
    margin: auto;
    text-align: center;
    min-height: 600px;
}

.container {
    padding: 2rem;
}


label, input {
    margin: 5px;
}

.account {
    width: 50%;
    margin: auto;
}

.account label {
    display: inline-block;
    text-align: right;
    width: 20%;
}

.account select {
    width: 173px;
}



<?php
include "nav.css.php";

?>