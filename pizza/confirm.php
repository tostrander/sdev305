<?php
    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include('includes/head.html');
    include('includes/functions.php');
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

            //Get form data
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $address = $_POST['address'];
            $method = $_POST['method'];
            $toppings = array();
            if (!empty($_POST['toppings'])) {
                $toppings = $_POST['toppings'];
            }
            $size = $_POST['size'];

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
                echo "<p>Toppings: " . implode(", ", $toppings) . "</p>";
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