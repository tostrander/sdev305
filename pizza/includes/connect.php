<?php
/* 305/pizza/includes/connect.php */

//Connect to database
$username = "tostrand_grcuser";
$password = "Grc2022!";
$hostname = "localhost";
$database = "tostrand_grc";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("<p>Oops! We weren't able to connect to the database.</p>");