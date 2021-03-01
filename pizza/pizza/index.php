<?php
    include('includes/head.html');
?>

<body>

<div class="container" id="main">

    <!-- Jumbotron Header -->
    <div class="jumbotron">
        <h1 class="display-4">Poppa's Pizza</h1>
        <p class="lead">Making great pizza since 1950!</p>
    </div>

    <!-- Pizza Order Form -->
    <form action="confirm.php" method="post" id="pizzaform">

        <!-- Contact Information -->
        <fieldset class="form-group border p-2">
            <legend>Contact Info</legend>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname"
                       placeholder="Enter first name" name="fname">
                <span class="err" id="err-fname">
                    Please enter a first name
                </span>
            </div>
            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" class="form-control" id="lname"
                       placeholder="Enter last name" name="lname">
                <span class="err" id="err-lname">
                    Please enter a last name
                </span>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" rows="5" id="address"
                name="address"></textarea>
                <span class="err" id="err-address">
                    Please enter an address
                </span>
            </div>
        </fieldset>

        <!-- Pickup or Delivery -->
        <fieldset class="form-group border p-2">
            <legend>Pickup or Delivery</legend>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input"
                           name="method" value="pickup" checked="checked">Pickup
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input"
                           name="method" value="delivery">Delivery
                </label>
            </div>
            <span class="err" id="err-method">
                    Please select Pickup or Delivery
            </span>
        </fieldset>

        <!-- Toppings -->
        <fieldset class="form-group border p-2">
            <legend>Select Toppings</legend>
            <div class="form-check">
                <label class="form-check-label" >
                <input class="form-check-input" type="checkbox"
                       value="pepperoni" name="toppings[]">Pepperoni
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" >
                    <input class="form-check-input" type="checkbox"
                           value="sausage" name="toppings[]">Sausage
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" >
                    <input class="form-check-input" type="checkbox"
                           value="pineapple" name="toppings[]">Pineapple
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" >
                    <input class="form-check-input" type="checkbox"
                           value="canadian-bacon" name="toppings[]">Canadian Bacon
                </label>
            </div>
        </fieldset>

        <!-- Pizza Size -->
        <fieldset class="form-group border p-2">
            <legend>Select a Size</legend>
            <div class="form-group">
                <select id="size" class="form-control" name="size">
                    <option value="none">Select a Size</option>
                    <option value="small">Small (8")</option>
                    <option value="medium">Medium (12")</option>
                    <option value="large">Large (14")</option>
                </select>
                <span class="err" id="err-size">
                    Please select a size
                </span>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary btn-default">Submit</button>
    </form>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="pizza.js"></script>

</body>
</html>