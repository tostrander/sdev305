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
include ('/home2/tostrand/connect.php');
//echo "Connected successfully!";

$sql = "SELECT order_id, fname, lname, address, size, toppings, 
        method, price, comment, order_date
        FROM pizza
        ORDER BY lname";
$result = @mysqli_query($cnxn, $sql);
//var_dump($result);

echo "<table id='orders' class='display'>
        <thead>
            <tr>
                <th>OrderID</th>
                <th>Customer</th>
                <th>Method</th>
                <th>Size</th>
                <th>Toppings</th>
            </tr>
        </thead>
        <tbody>";

foreach ($result as $row) {
    //var_dump($row);

    $order_id = $row['order_id'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $address = $row['address'];
    $size = $row['size'];
    $toppings = $row['toppings'];
    $method = $row['method'];
    //echo "<p>$order_id - $lname, $fname</p>";

    echo "<tr>
            <td>$order_id <a href='view.php?id=$order_id'>view</a>
                &nbsp;|&nbsp;<a href='index.php?id=$order_id'>edit</a>
            </td>
            <td>$lname, $fname</td>
            <td>$method</td>
            <td>$size</td>
            <td>$toppings</td>
          </tr>";
}

echo "</tbody></table>";

?>

</div>

<?php
    include('includes/footer.html');
?>
