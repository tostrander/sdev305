<?php
    include("includes/header.html");
    include("includes/functions.php");

    //Initialize variables
    $fname = "";
    $lname = "";
    $address = "";
    $method = "";
    $size = "";
    $selectedToppings = array();


    //Create a flag variable
    $edit = isset($_GET['id']);

    //If this is an edit
    if ($edit) {

        //Set a boolean flag variable
        $edit = true;

        //Get the ID
        $order_id = $_GET['id'];

        //Connect to database
        include ('/home2/tostrand/connect.php');

        //Get pizza order from database
        $sql = "SELECT fname, lname, address, size, toppings, 
            method, comment, order_date
            FROM pizza
            WHERE order_id = $order_id";
        $result = @mysqli_query($cnxn, $sql);
        //var_dump($result);
        $row = mysqli_fetch_array($result);

        //Assign values to variables
        $fname = $row['fname'];
        $lname = $row['lname'];
        $selectedToppings = explode(", ", $row['toppings']);
        $size = $row['size'];
        $method = $row['method'];
        $address = $row['address'];
        $comment = $row['comment'];
        $date = date('m-d-y g:ia', strtotime($row['order_date']));
    }
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
        //If this is an edit, display order number and order date
        //at the top of the form
        if ($edit) {
            echo "<h2>Order $order $order_id</h2>";
            echo "<h3>$date</h3>";
        }

    ?>

    <!-- action: where the data will go
         method: how it will get there (get or post)
    -->
    <form id="pizza-form" action="confirm.php" method="post">

        <!-- Contact Info -->
        <fieldset class="form-group">
            <legend class="col-sm-2 pt-0">Contact Info</legend>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo $fname ?>" class="form-control" placeholder="Enter first name">
                <span class="err" id="err-fname">Please enter first name</span>
            </div>

            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo $lname ?>" class="form-control" placeholder="Enter last name">
                <span class="err" id="err-lname">Please enter last name</span>
            </div>

            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" id="email" name="email" value="<?php echo $address ?>" class="form-control" placeholder="Enter email">
            </div>
        </fieldset>

        <!-- Pickup or Delivery -->
        <fieldset class="form-group">
            <legend class="col-sm-2 pt-0">Select Pickup or Delivery</legend>
            <div class="form-check">
                <label class="form-check-label" for="pickup">
                    <input type="radio" class="form-check-input" id="pickup" name="method" value="pickup"
                        <?php if ($method == 'pickup') echo ' checked="checked"' ?>
                    >Pickup
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="delivery">
                    <input type="radio" class="form-check-input" id="delivery" name="method" value="delivery"
                        <?php if ($method == 'delivery') echo ' checked="checked"' ?>
                    >Delivery
                </label>
            </div>
            <span class="err" id="err-method">Please select pickup or delivery</span>
        </fieldset>

        <!-- Toppings -->
        <fieldset class="form-group">
            <legend class="col-sm-2 pt-0">Select Toppings</legend>

        <?php

            $toppings = getToppings();
            foreach ($toppings as $topping) {
                echo "<div class='form-check'>
                        <label class='form-check-label'>
                            <input type='checkbox' class='form-check-input' 
                                   value='$topping' name='toppings[]'";

                if (in_array($topping, $selectedToppings)) {
                    echo ' checked="checked"';
                }

                echo ">".ucfirst($topping).
                        "</label>
                      </div>";
            }

        ?>

            <span class="err" id="err-toppings">Please select at least one topping</span>
        </fieldset>

        <!-- Pizza Size Select List -->
        <fieldset class="form-group">
            <legend class="col-sm-2 pt-0">Pizza Size</legend>
            <div class="form-group">
                <select class="form-control" id="size" name="size">

                    <?php
                        $sizes = getSizes();
                        foreach ($sizes as $key=>$desc) {
                            echo "<option value='$key'";

                            if ($size == $key) echo ' selected="selected"';

                            echo ">$desc</option>";
                        }

                    ?>

                </select>
                <span class="err" id="err-size">Please select a size</span>
            </div>
        </fieldset>

        <!-- Comment field -->
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"><?php echo $comment ?></textarea>
        </div>

        <!-- Email Sign-up -->
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" checked="checked" name="discount"> Sign me up for discounts!
            </label>
        </div>

        <!-- Order Button -->
        <?php

            //I added name and value properties to the button so that when I get to
            //confirm.php I can determine whether this is a new order (INSERT) or
            //an edit (UPDATE). I will need to write my SQL accordingly.
            $buttonText = $edit ? "Save Changes" : "Place Order";
            $buttonValue = $edit ? "save" : "edit";
            echo "<button type='submit' class='btn btn-primary' name='button' value='$buttonValue'>$buttonText</button>";

        ?>

    </form>
</div>

<!--<script src="scripts/pizza.js"></script>-->
<?php
    include('includes/footer.html');
?>