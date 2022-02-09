<?php
    include("includes/header.html");
?>

<div id="main" class="container">
    <div class="jumbotron">
        <h1 class="display-4">Poppa's Pizza</h1>
        <p class="lead">The best pizza GRC students have ever tasted!</p>
        <hr class="my-4">
        <p>Blah blah blah...</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Contact Us</a>
    </div>

    <?php

        //Turn on error reporting
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

    /*
        echo "<pre>";
        // $_POST is an "autoglobal" array
        var_dump($_POST);
        echo "</pre>";
    */

        //Move form data into variables
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $method = $_POST['method'];
        $size = $_POST['size'];
        $comment = $_POST['comment'];
        $toppings = implode(", ", $_POST['toppings']);

        //Define constants
        define("TAX_RATE", 0.065);
        define("TOPPING_PRICE", 0.50);

        //Get the number of toppings
        $numToppings = sizeof($_POST['toppings']);

        //Calculate price of pizza
        $price = 0.0;
        if ($size == "small") {
            $price = 10.00;
        }
        elseif ($size == "medium") {
            $price = 15.00;
        }
        else {
            $price = 20.00;
        }

        //Add cost of toppings
        //$price = $price + ($numToppings * TOPPING_PRICE);
        $price += $numToppings * TOPPING_PRICE;

        //Add sales tax
        $price += $price * TAX_RATE;

        //Format price
        $price = number_format($price, 2);

        //Display an Order Summary
        //echo "<h1>Thank you for your order, $fname!</h1>";
        //echo '<h1>Thank you for your order, '.$fname.'!</h1>';

        thanks($fname);
        thanks();
        echo '<h3>Order Summary</h3>';

        //echo "<p>" . $fname . " " . $lname . "</p>";
        echo "<p>Name: $fname $lname</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Method: $method</p>";
        echo "<p>Size: $size</p>";
        echo "<p>Comment: $comment</p>";
        echo "<p>Toppings: $toppings</p>";
        echo "<p>Total Cost: $$price</p>";

        function thanks($name = "")
        {
            $msg = "<h1>Thank you for your order";
            if ($name != "") {
                $msg .= ", $name";
            }
            $msg .= "!</h1>";
            echo $msg;

            /* Redundant version of the same logic
            if ($name == "") {
                echo "<h1>Thank you for your order!</h1>";
            }
            else {
                echo "<h1>Thank you for your order, $name!</h1>";
            }
            */

            //echo "<h1>Thank you for your order, $name!</h1>";
        }

        include("includes/sendEmail.php");





        /*
         * CREATE TABLE pizza (
            order_id int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            fname VARCHAR(30) NOT NULL,
            lname VARCHAR(30) NOT NULL,
            address VARCHAR(50),
            size VARCHAR(10) NOT NULL,
            toppings VARCHAR(50),
            method VARCHAR(10) NOT NULL,
            price DECIMAL(6, 2) NOT NULL, #Up to 9999.99
            comment TEXT,
            order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
        );

            INSERT INTO pizza (`fname`, `lname`, `address`, `size`, `toppings`, `method`, `price`, `comment`)
            VALUES ('Gavin', 'Sherman', NULL, 'small', 'pepperoni, sausage', 'pickup', 9.95, NULL);

         */

    ?>
</div>
</body>
</html>