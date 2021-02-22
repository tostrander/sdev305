<?php
/* advisor.php
   Display a list of advisors
*/

require ('includes/php-setup.php');

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

<form method="get" action="index.php">
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>

<?php

    //var_dump($_SERVER);
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
        echo "<a href='index.php?advisorid=$id'>$first $last</a><br>";
    }

?>
</body>
</html>