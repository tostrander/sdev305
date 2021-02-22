<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to DB
require (getenv("HOME").'/connect.php');
$cnxn = connect();