<?php
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("includes/header.html");
?>

<div id="main" class="container">
<h1>Order Summary</h1>

<?php

//Connect to database
include ('includes/connect.php');
//echo "Connected successfully!";

$sql = "SELECT order_id, fname, lname, address, size, toppings, 
        method, price, comment, order_date
        FROM pizza
        ORDER BY order_date DESC";
$result = @mysqli_query($cnxn, $sql);
//var_dump($result);

foreach ($result as $row) {
    //var_dump($row);

    $order_id = $row['order_id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    echo "<p>$order_id - $lname, $fname</p>";
}

?>

</div>
</body>
</html>
