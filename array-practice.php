<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<pre>";

echo "Indexed arrays:<br>";

$movies = array("Back to the Future", "Brave Heart", "Tron Legacy", "The Bodyguard");
$movies[] = "Wonder Woman";
var_dump($movies);

$shows[] = "Scrubs";
$shows[] = "The Boys";
$shows[] = "Mr. Robot";
var_dump($shows);

$bands = array();
$bands[] = "U2";

echo "<ul>";
foreach($movies as $movie) {
    echo "<li>$movie</li>";
}
echo "</ul>";

echo "<ol>";
foreach($shows as $show) {
    echo "<li>$show</li>";
}
echo "</ol>";


echo "Associative arrays:<br>";

$classes = array("SDEV 305"=>"Web Dev",
                "SDEV 301"=>"Systems",
                "SDEV 378"=>"Career Prep");
var_dump($classes);
echo "<p>{$classes['SDEV 305']}</p>";

echo "<ul>";
foreach($classes as $courseNum=>$courseTitle) {
    echo "<li>$courseNum -> $courseTitle</li>";
}
echo "</ul>";

$colors = array("Aaron"=>"green", "Joseph"=>"olive");
$colors['Sarah'] = 'blue';
$colors['Kim'] = 'pink';
$colors['Alisa'] = 'mint green';

var_dump($colors);

foreach ($colors as $person=>$color) {
    echo "<p>$person likes $color</p>";
}

var_dump($_SERVER);


echo "</pre>";