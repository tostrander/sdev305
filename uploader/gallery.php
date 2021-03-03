<?php
/* 305/uploader/gallery.php
*/

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Gallery</title>
    <style>
        img {
            width: 150px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        //Get the image paths from the database
        require ($_SERVER['HOME'].'/connect.php');
        $cnxn = connect();

        $sql = "SELECT * FROM uploads";
        $result = mysqli_query($cnxn, $sql);

        foreach($result as $row) {
            $path = $row['image_name'];
            echo "<img src='$path' alt='Some Image'>";
        }
    ?>
</body>
</html>
