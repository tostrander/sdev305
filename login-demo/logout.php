<?php
    session_start();
    session_regenerate_id();
    session_destroy();
    $_SESSION = array();
    header('location: login.php');