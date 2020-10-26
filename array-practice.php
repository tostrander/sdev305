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

echo "<ul>";
foreach($movies as $movie) {
    echo "<li>$movie</li>";
}
echo "</ul>";

echo "</pre>";