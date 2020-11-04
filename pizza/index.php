<?php
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

    <!-- Order form -->
    <form id="pizzaform" method="post" action="confirmation.php">

        <!-- Contact info -->
        <fieldset class="form-group border p-2">
            <legend>Contact Info</legend>

            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname">
                <span class="d-none text-danger" id="err-fname">Please enter a first name</span>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname">
                <span class="d-none text-danger" id="err-lname">Please enter a last name</span>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
            </div>
        </fieldset>

        <!-- Pickup or Delivery -->
        <fieldset class="form-group border p-2">
            <legend>Pickup or Delivery</legend>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="method"
                       id="pickup" value="pickup" >
                <label class="form-check-label" for="pickup">
                    Pickup
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="method"
                       id="delivery" value="delivery" >
                <label class="form-check-label" for="delivery">
                    Delivery
                </label>
            </div>
            <span class="d-none text-danger" id="err-method">Please choose pickup or delivery</span>
        </fieldset>

        <!-- Toppings -->
        <fieldset class="form-group border p-2">
            <legend>Select Toppings</legend>

            <div class='form-check'>
                <input class='form-check-input'
                       type='checkbox' name='toppings[]'
                       id='olives' value='olives' >
                <label class='form-check-label'
                       for='olives'>Olives</label>
            </div>
            <div class='form-check'>
                <input class='form-check-input'
                       type='checkbox' name='toppings[]'
                       id='mushrooms' value='mushrooms' >
                <label class='form-check-label'
                       for='mushrooms'>Mushrooms</label>
            </div>
            <div class='form-check'>
                <input class='form-check-input'
                       type='checkbox' name='toppings[]'
                       id='pepperoni' value='pepperoni' >
                <label class='form-check-label'
                       for='pepperoni'>Pepperoni</label>
            </div>
            <div class='form-check'>
                <input class='form-check-input'
                       type='checkbox' name='toppings[]'
                       id='sausage' value='sausage' >
                <label class='form-check-label'
                       for='sausage'>Sausage</label>
            </div>
        </fieldset>

        <!-- Pizza size -->
        <fieldset class="form-group border p-2">
            <legend>Pizza Size</legend>

            <select class="form-control" id="size" name="size" >
                <option value='none'>Select a Size</option>
                <option value='small'>Small (8")</option>
                <option value='medium'>Medium (12")</option>
                <option value='large'>Large (16")</option>
                <option value='xlarge'>Extra Large (24")</option>
            </select>
            <span class="d-none text-danger" id="err-size">Please select a size</span>

        </fieldset>

        <!-- Agreement -->
        <div class="checkbox">
            <label><input type="checkbox" id="terms" name="terms">I agree to the terms</label>
        </div>

        <!-- Order button -->
        <input type="submit" value="Submit your Order">

    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="scripts/pizza.js"></script>
</body>
</html>