<?php
//dbcreds.php

//Connect to database
$database = "tostrand_grc";
$username = "tostrand_grcuser";
$password = "grcUser!";
$hostname = "localhost";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("There was a problem.");
//var_dump($cnxn);