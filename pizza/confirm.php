<?php
    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //If the form has not been submitted, redirect user to home page form
    //Must come BEFORE any HTML output
    if (empty($_POST)) {
        header('location: index.php');
    }

    //Connect to database, creates $cnxn
    //Require terminates script if file not found
    require('/home2/tostrand/connect.php');
    include('includes/header.html');
    require('includes/functions.php');
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

    /*
        // After header()
        echo "<pre>";
        // $_POST is an "autoglobal" array
        var_dump($_POST);
        echo "</pre>";
    */

        //Move form data into variables

        //Initialize variables
        $fname = "";
        $lname = "";
        $email = "";
        $method = "";
        $size = "";
        $comment = "";
        $toppings = "";

        //Validate the data
        $isValid = true;

        //first name
        if (!validName($_POST['fname'])) {
            echo "<p>First name is required</p>";
            $isValid = false;
        }
        else {
            $fname = $_POST['fname'];
        }

        //last name
        if (!validName($_POST['lname'])) {
            echo "<p>Last name is required</p>";
            $isValid = false;
        }
        else {
            $lname = $_POST['lname'];
        }

        //email is optional, but if provided must be valid
        if (!validEmail($_POST['email'])) {
            echo "<p>Email address is not valid</p>";
            $isValid = false;
        }
        else {
            $email = $_POST['email'];
        }

        //If no method is selected
        if (!isset($_POST['method'])) {
            echo "<p>Method must be selected</p>";
            $isValid = false;
        }
        //Method is selected, but contains a bad value
        else if (!validMethod($_POST['method'])) {
            echo "<p>You tried to spoof me!</p>";
            $isValid = false;
        }
        //Method is good
        else {
            $method = $_POST['method'];
        }


        //If no size is selected
        if (!isset($_POST['size'])) {
            echo "<p>Size must be selected</p>";
            $isValid = false;
        }
        //Size is selected, but contains a bad value
        else if (!validSize($_POST['size'])) {
            echo "<p>Select a valid size</p>";
            $isValid = false;
        }
        //Size is good
        else {
            $size = $_POST['size'];
        }

        //Toppings have been selected
        if (isset($_POST['toppings'])) {

            //Check for spoofing
            if (!validToppings($_POST['toppings'])) {
                echo "<p>You tried to spoof me!</p>";
                $isValid = false;
            }
            //Data is valid
            else {
                $toppings = implode(", ", $_POST['toppings']);
            }
        }

        //If the data is not valid, stop processing
        if (!$isValid) {
            return;
        }

        //empty is used for text boxes and text areas
        //isset is used for checkboxes, radio buttons, and drop downs
        $comment = $_POST['comment'];


        //Define constants
        define("TAX_RATE", 0.065);
        define("TOPPING_PRICE", 0.50);

        //Get the number of toppings
        $numToppings = sizeof($_POST['toppings']);

        //Calculate price of pizza
        //TODO: Replace with function and update size options
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


        //Write to database
        $sql = "INSERT INTO pizza (`fname`, `lname`, `address`, `size`, `toppings`, `method`, `price`, `comment`) 
            VALUES ('$fname', '$lname', '$email', '$size', '$toppings', '$method', '$price', '$comment')";
        echo "<p>$sql</p>";
        $success = mysqli_query($cnxn, $sql);

        if (!$success) {
            echo "<p>We're sorry... something went wrong. Please call us...</p>";
            return;
        }


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
            VALUES ('Duc', 'Tram', '123 Oak Lane', 'XL', 'pepperoni, sausage', 'delivery', '25.00', '');

         */

    ?>
</div>
</body>
</html>