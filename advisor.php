<?php
/* advisor.php
   Display a list of advisors
*/

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to DB
require ('/home/tostrand/connect.php');
$cnxn = connect();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="get" action="student.php">
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>

<?php

    //Query the DB for advisors
    $sql = "SELECT advisor_id, advisor_first, advisor_last
            FROM advisor";

    $result = mysqli_query($cnxn, $sql);

    foreach ($result as $row) {

        //get the data
        $id = $row['advisor_id'];
        $first = $row['advisor_first'];
        $last = $row['advisor_last'];

        //display the advisors
        echo "<a href='student.php?advisorid=$id'>$first $last</a><br>";
    }

?>
</body>
</html>