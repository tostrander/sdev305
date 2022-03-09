<?php
    include("includes/header.html");
    include("includes/functions.php");

    //https://tostrander.greenriverdev.com/305/pizza/view.php?id=14
    $order_id = $_GET['id'];
?>

<div id="main" class="container">
    <div class="jumbotron">
        <h1 class="display-4">Poppa's Pizza</h1>
        <p class="lead">The best pizza GRC students have ever tasted!</p>
        <hr class="my-4">
        <h2>Viewing Order <?php echo $order_id ?></h2>
    </div>

<?php

    //Connect to database
    include ('/home2/tostrand/connect.php');
    //echo "Connected successfully!";

    $sql = "SELECT order_id, fname, lname, address, size, toppings, 
            method, price, comment, order_date
            FROM pizza
            WHERE order_id = $order_id";
    $result = @mysqli_query($cnxn, $sql);
    //var_dump($result);

    $row = mysqli_fetch_array($result);
    //echo "<pre>";
    //var_dump($row);
    //echo "</pre>";

    //Get data from row
    $fname = $row['fname'];
    $lname = $row['lname'];
    $toppings = $row['toppings'];
    $date = date('m-d-y g:ia', strtotime($row['order_date']));

    echo "<p>Name: $fname $lname</p>";
    echo "<p>Toppings: $toppings</p>";
    echo "<p>Date: $date</p>";

    include('includes/footer.html');
?>