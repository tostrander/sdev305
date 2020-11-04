<?php

/*
 * Tina Ostrander
 * orders.php
 * Display an order summary
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to database
$database = "tostrand_grc";
$username = "tostrand_grcuser";
$password = "grcUser!";
$hostname = "localhost";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
    or die("There was a problem.");
//var_dump($cnxn);

//Include header file
include ('includes/head.html');

?>

<body>

<div class="container" id="main">
    <h1>Order Summary</h1>
    <table id="order-table" class="display" style="width:100%">
        <thead>
            <tr>
                <td>OrderID</td>
                <td>Name</td>
                <td>Price</td>
                <td>Method</td>
                <td>Timestamp</td>
            </tr>
        </thead>
        <tbody>


    <?php
        $sql = "SELECT * FROM pizza";
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            //var_dump($row);
            $order_id = $row['order_id'];
            $fullname = $row['fname'] . " " . $row['lname'];
            $price = $row['price'];
            $method = $row['method'];
            $order_date = date("M d, Y g:i a", strtotime($row['order_date']) );

            echo "<tr>";
            echo "<td>$order_id</td>";
            echo "<td>$fullname</td>";
            echo "<td>$price</td>";
            echo "<td>$method</td>";
            echo "<td>$order_date</td>";
            echo "</tr>";
        }

    ?>
        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="scripts/pizza.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
    $('#order-table').DataTable();
</script>

</body>
</html>