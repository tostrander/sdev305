<?php
/* confirmation.php
 * Gets data from pizza/index.html
 * 10/26/2020
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Redirect if form has not been submitted
if (empty($_POST)) {
    header("location: index.php");
}

//Print the POST array
echo "<pre>";
var_dump($_POST);
echo "</pre>";

//Include files
include ('includes/head.html');
require ($_SERVER['HOME'].'/dbcreds.php');
require ('includes/pizzaFunctions.php');
?>

<body>

<div class="container" id="main">

    <!-- Jumbotron header -->
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Poppa's Pizza</h1>
        <p class="lead">Serving the Green River community since 1970!</p>
    </div>

    <h1>Thank you for your order!</h1>

    <h2>Order Summary</h2>

    <?php

        //Data validation will go here
        $isValid = true;

        //Check first name
        if (validName($_POST['fname'])) {
            $fname = $_POST['fname'];
        }
        else {
            echo "<p>Invalid first name</p>";
            $isValid = false;
        }

        //Check last name
        if (validName($_POST['lname'])) {
            $lname = $_POST['lname'];
        }
        else {
            echo "<p>Invalid last name</p>";
            $isValid = false;
        }

        //Check method
        $method = "";
        if (isset($_POST['method']) AND validMethod($_POST['method'])) {
            $method = $_POST['method'];
        }
        else {
            echo "<p>Please select pickup or delivery</p>";
            $isValid = false;
        }

        // Validate address
        $address = "";
        if ($method == 'delivery') {
            if (!empty($_POST['address'])) {
                $address = $_POST['address'];
            }
            else {
                echo "<p>Please enter an address for delivery</p>";
                $isValid = false;
            }
        }

        // Validate toppings
        $toppings = "";
        if (isset($_POST['toppings'])) {
            $toppings = $_POST['toppings'];
            if (!validToppings($toppings)) {
                echo "<p>Go away, evildoer!</p>";
                return; //We've been spoofed; stop processing
            }
            $toppings = implode(", ", $toppings);
        }

        $size = $_POST['size'];



        if (!$isValid) {
            return;
        }

        $fromName = $fname . " " . $lname;
        $fromEmail = "tostrander@greenriver.edu";

        //Calculate pizza price
        $toppingCount = count($_POST['toppings']);
        define('TAX_RATE', 0.1);
        if ($size == 'small') {
            $price = 10.0;
        }
        elseif ($size == 'medium') {
            $price = 15.0;
        }
        elseif ($size == 'large') {
            $price = 20.0;
        }
        else {
            $price = 25.0;
        }

        //Add 50 cents per topping to the price
        $price += $toppingCount * 1.5;

        //Add sales tax to the price
        $price += $price * TAX_RATE;

        //Format the price (number_format)
        $price = number_format($price, 2);

        //Prevent sql injection
        $fname = mysqli_real_escape_string($cnxn, $fname);
        $lname = mysqli_real_escape_string($cnxn, $lname);
        $address = mysqli_real_escape_string($cnxn, $address);
        $size = mysqli_real_escape_string($cnxn, $size);
        $toppings = mysqli_real_escape_string($cnxn, $toppings);
        $method = mysqli_real_escape_string($cnxn, $method);
        $price = mysqli_real_escape_string($cnxn, $price);

        //Save order to database
        $sql = "INSERT INTO pizza(fname, lname, address, 
        size, toppings, method, price) VALUES
        ('$fname', '$lname', '$address', '$size', '$toppings', '$method', '$price')";
        $success = mysqli_query($cnxn, $sql);
        echo $sql;
        if (!$success) {
            echo "<p>Sorry... something went wrong.</p>";
            return;
        }

        //Print order summary
        echo "<p>Name: $fname $lname</p>";
        echo "<p>Address: $address</p>";
        echo "<p>Size: $size</p>";
        echo "<p>Toppings: $toppings</p>";
        echo "<p>Method: $method</p>";
        echo "<p>Price: $$price</p>";

        //Send email
        $to = "tostrander@greenriver.edu";
        $subject = "Pizza Order Placed";
        $message = "Order from $fname $lname\r\n";
        $message .= "Address: $address\r\n";
        $message .= "Toppings: $toppings";
        $message .= "Method: $method";
        $message .= "Total Price: $price";
        $headers = "Name: $fromName <$fromEmail>";

        $success = mail($to, $subject, $message, $headers);

        //Check success
        if ($success) {
            echo "<p>Your order has been placed.</p>";
        } else {
            echo "<p>Sorry... there was a problem.</p>";
        }

        //Shortcut
        echo $success ? "<p>Your order has been placed.</p>" :
             "<p>Sorry... there was a problem.</p>";
    ?>

</div>
</body>
</html>