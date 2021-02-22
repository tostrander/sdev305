<?php

    //Make sure the user is coming from the form
    if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {

        //Send user to form page
        header("location: new-student.php");
    }

    require ('includes/php-setup.php');


    /*
        echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
    ?*

    /*
     * array(6) {
          ["sid"]=>
          string(5) "32423"
          ["lastName"]=>
          string(4) "Shmo"
          ["firstName"]=>
          string(6) "Bernie"
          ["birthdate"]=>
          string(10) "1900-02-03"
          ["gpa"]=>
          string(3) "3.5"
          ["advisor"]=>
          string(1) "1"
        }
     */

    $sid = $_POST['sid'];
    $last = $_POST['lastName'];
    $first = $_POST['firstName'];
    $birthdate = $_POST['birthdate'];
    $gpa = $_POST['gpa'];
    $advisor = $_POST['advisor'];

    //VALIDATE DATA BEFORE INSERTING INTO DATABASE


    $sql = "INSERT INTO student VALUES ('$sid', '$last', '$first', '$birthdate', '$gpa', '$advisor')";
    echo $sql;

    $success = mysqli_query($cnxn, $sql);

    if ($success) {
        echo "<h3>New student added!</h3>";
    } else {
        echo "Something went wrong";
    }

