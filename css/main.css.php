<?php
    header("Content-type: text/css; charset: UTF-8");

$backgroundColor = 0;


$navBackgroundColor = 0;


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
    background-color: #AAAAAA;
    font-family: DickensScript, serif;
}

h1 {
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
}

<?php
include "nav.css.php";

?>