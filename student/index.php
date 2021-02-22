<?php
/* student.php
   Reads from a database
*/

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to DB
require ($_SERVER['HOME'].'/connect.php');
$cnxn = connect();

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

<form method="get" action="student.php">
    <input type="text" name="search">
    <input type="submit" value="Search">
</form>
<a href="advisor.php">View Advisor List</a>

<?php
    //1. Define the base query
    $sql = "SELECT sid, first, last, advisor 
            FROM student ";

    //echo "<p>GET:</p>";
    //var_dump($_GET);

    if (isset($_GET['advisorid'])){
        $advisorId = $_GET['advisorid'];
        $sql .= " WHERE advisor = '$advisorId'";
    }
    else if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $sql .= " WHERE sid LIKE '$searchTerm'
                  OR first LIKE '%$searchTerm%'
                  OR last LIKE '%$searchTerm%'";
    }
    $sql .= " ORDER BY last, first";
    //echo "<p>$sql</p>";

    //2. Send the query to the db
    $result = mysqli_query($cnxn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<h2>No results found</h2>";
    }

    //3. Print the result
    //var_dump($result);
    foreach ($result as $row) {
        //var_dump($row);

        $sid = $row['sid'];
        $last = $row['last'];
        $first = $row['first'];
        $advisor = $row['advisor'];

        echo "<p>$sid - $first $last (Advisor: $advisor)</p>";
    }
?>
</body>
</html>











