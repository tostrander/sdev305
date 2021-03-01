<?php
    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Include files
    include('includes/head.html');
    include('includes/functions.php');

    // Connect to DB
    require ($_SERVER['HOME'].'/connect.php');
    $cnxn = connect();

    /*DROP TABLE pizza;

    CREATE TABLE pizza (
      order_id int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
      fname varchar(30) NOT NULL,
      lname varchar(30) NOT NULL,
      address varchar(100) DEFAULT NULL,
      size varchar(20) NOT NULL,
      toppings varchar(100) DEFAULT NULL,
      method varchar(20) NOT NULL,
      price decimal(6,2) DEFAULT NULL,
      order_date datetime NOT NULL DEFAULT current_timestamp()
    );

    INSERT INTO pizza (fname, lname, address, size, toppings, method, price) VALUES
    ('Joe', 'Shmo', '123 Elm', 'small', 'pepperoni', 'delivery', 15.00);
    */
?>
<body>
    <div class="container" id="main">

        <?php
            //Autoglobal array

            /*
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
            */

            /*["fname"]=>string(3) "Joe"
              ["lname"]=>string(3) "Shmo"
              ["address"]=>string(10) "123 Elm St"
              ["method"]=>string(8) "delivery"
              ["toppings"]=>
                  array(2) {
                    [0]=>string(7) "sausage"
                    [1]=>string(9) "pineapple"
                  }
              ["size"]=>string(6) "medium"
            */

            //Get form data & prevent SQL injection
            $fname = mysqli_real_escape_string($cnxn, $_POST['fname']);
            $lname = mysqli_real_escape_string($cnxn, $_POST['lname']);
            $address = mysqli_real_escape_string($cnxn, $_POST['address']);
            $method = mysqli_real_escape_string($cnxn, $_POST['method']);
            $toppings = array();
            if (!empty($_POST['toppings'])) {
                $toppings = $_POST['toppings'];
            }
            $size = mysqli_real_escape_string($cnxn, $_POST['size']);

            //Validate the data
            $isValid = true;
            if (!validName($fname)) {

                echo "<p>First name is required and must be at least two characters.</p>";
                $isValid = false;
            }
            if (!validName($lname)) {

                echo "<p>Last name is required and must be at least two characters.</p>";
                $isValid = false;
            }
            if (!validAddress($address)) {
                echo "<p>Address must contain at least ten characters.</p>";
                $isValid = false;
            }
            if (!validMethod($method)) {
                echo "<p>Go away, evildoer!</p>";
                return;
            }
            if (!validToppings($toppings)) {
                echo "<p>Go away, evildoer!</p>";
                return;
            }
            if (!validSize($size)) {
                echo "<p>Please select a valid size</p>";
                $isValid = false;
            }

            if (!$isValid) {
                echo "<p>Please click back to correct your errors.</p>";
                return;
            }

            //Calculate pizza cost
            $basePrice = getPrice($size);
            /*
            switch ($size) {
                case 'small':
                    $basePrice = 8.99;
                    break;
                case 'medium':
                    $basePrice = 12.99;
                    break;
                default:
                    $basePrice = 16.99;
            }
            */

            $subtotal = subtotal($basePrice, $toppings);
            $total = total($subtotal);
            $toppingString = implode(", ", $toppings) ;

            //Write to database
            $sql = "INSERT INTO pizza (fname, lname, address, size, toppings, method, price) 
                    VALUES ('$fname', '$lname', '$address', '$size', '$toppingString', '$method', $total)";
            //echo $sql;
            $success = mysqli_query($cnxn, $sql);
            if (!$success) {
                echo "<p>There was an error placing your order. Please call 911.</p>";
                return;
            }

            //Print summary
            thanks($fname);
            //thanks();

            //echo "<h3>Thank you for your order, {$_POST['fname']}!</h3>";
            //echo "<h3>Thank you for your order, ".$_POST['fname']."!</h3>";

            echo "<h4>Order Summary:</h4>";
            echo "<p>Name: $fname $lname</p>";
            if ($method == 'delivery') {
                echo "<p>Address: $address</p>";
            }
            echo "<p>Method: $method</p>";
            if (!empty($toppings)) {
                echo "<p>Toppings: $toppingString</p>";
            }
            echo "<p>Size: $size</p>";

            echo "<p>Subtotal: $$subtotal</p>";


            //Send email to Poppa
            $emailTo = 'tostrander@greenriver.edu';
            $emailFrom = 'Poppa\'s Pizza <poppaspizza@gmail.com>';
            $emailBody = "An order has been placed\r\n";
            $emailBody .= "Name: $fname $lname\r\n";
            $emailSubject = 'New Pizza Order';
            $headers = "From: $emailFrom\r\n";
            $success = mail($emailTo, $emailSubject, $emailBody, $headers);
            if ($success) {
                echo "<h3>Your order has been placed!</h3>";
            }
            else {
                echo "<h3>Oops... something went wrong</h3>";
            }

        ?>
    </div>
</body>
</html>