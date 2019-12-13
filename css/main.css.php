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

label, input {
    margin: 5px;
}

table.stats h3 {
    font-size: 1.5rem;
}

#greeting > img {
    display: inline-block;
    height: 75px;
    width: auto;
    float: left;
}

#greeting {
    height: 80px;
    width: fit-content;
    display: block;
    margin: auto;
    text-align: center;
}

#greeting > h1 {
    display: inline-block;
    height: 100%;
    margin: 0 15px;
    float: left;
}

#inventory {
    width: 95%;
    height: 100px;
}


.wrapper {
    width: 85%;
    margin: auto;
    min-height: 600px;
}

.container {
    padding: 1.5rem;
    width: 75%;
    margin: auto;
}

.wrapperGroups {
    box-shadow: 5px 3px 3px #444444;
    display: inline-block;

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

.error {
    text-align: center;
    color: red;

}

<?php
// The following code is used for styling the stat tables
?>
.stats {
    border-collapse: collapse;
    display: inline-block;
    vertical-align: top;
}

.stats, .stats td, .stats th {
    border: 1px solid #5b5b5b;
    padding: 5px;
}

.mainStats > table {
    height: 100%;
    margin: auto;
}

.mainStats {
    width: fit-content;
    margin: auto;
}


<?php
include "nav.css.php";

?>