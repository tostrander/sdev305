<?php
/* confirmation.php
 * Gets data from pizza/index.html
 * 10/26/2020
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Set the time zone
date_default_timezone_set('America/Los_Angeles');

//Include header file
include ('includes/head.html');
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

        //Get data from POST array
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $size = $_POST['size'];
        $toppings = implode(", ", $_POST['toppings']);
        $method = $_POST['method'];
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

    <pre>
    <?php
        var_dump($_POST);
    ?>
    </pre>
</div>
</body>
</html>