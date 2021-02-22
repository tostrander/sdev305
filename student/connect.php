<?php

/* This file should be moved to your home directory on the
 * server and then deleted from your local directory
 * 
 */

// Connect to DB
function connect()
{
    $username = 'tostrand_grcuser'; //Insert your database username here
    $password = '***********'; //Insert your password here
    $hostname = 'localhost';
    $database = 'tostrand_grc';  //Insert your database name here
    $cnxn = @mysqli_connect($hostname, $username, $password, $database)
    or die("Error connecting to database");
    return $cnxn;
}