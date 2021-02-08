<?php
/* student.php
   Reads from a database
*/

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to database - BAD SECURITY
$username = 'tostrand';
$password = '*******';
$hostname = 'localhost';
$database = 'tostrand_grc';
$cnxn = mysqli_connect($hostname, $username, $password, $database);
echo "Connected!";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GRC Students</title>
</head>
<body>
<h1>GRC Students</h1>

<?php
    //1. Define the query
    $sql = "SELECT * FROM student";

    //2. Send the query to the db
    $result = mysqli_query($cnxn, $sql);

    //3. Print the result
    //var_dump($result);
    foreach ($result as $row) {
        //var_dump($row);

        $sid = $row['sid'];
        $last = $row['last'];
        $first = $row['first'];

        echo "<p>$sid - $first $last</p>";
    }

?>
</body>
</html>











