<?php

?>


/* Navbar container */
.navbar {
    overflow: hidden;
    background-color: #AAAAAA;
    font-family: morpheusregular, serif;
    font-weight: bold;
    letter-spacing: 2px;
    margin: auto;
    width: fit-content;
}

/* Links inside the navbar */
.navbar a {
    float: left;
    font-size: 16px;
    color: #000000;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    border: solid 1px #000000;
}

/* The dropdown container */
.dropdown {
    float: left;
    overflow: hidden;
    border: none;
}

/* Dropdown button */
.dropdown .dropbtn {
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 2px;
    border: none;
    outline: none;
    color: white;
    padding: 0;
    background-color: inherit;
    font-family: inherit; /* Important for vertical align on mobile phones */
    margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: #CCCCCC;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #AAAAAA;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    float: none;
    color: #000000;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content:hover {
    background-color: rgba(18, 23, 28, 1);
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}
