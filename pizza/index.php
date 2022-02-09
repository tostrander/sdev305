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

    <!-- action: where the data will go
         method: how it will get there (get or post)
    -->
    <form id="pizza-form" action="confirm.php" method="post">

        <!-- Contact Info -->
        <fieldset class="form-group">
            <legend class="col-sm-2 pt-0">Contact Info</legend>
            <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter first name">
                <span class="err" id="err-fname">Please enter first name</span>
            </div>

            <div class="form-group">
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter last name">
                <span class="err" id="err-lname">Please enter last name</span>
            </div>

            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
            </div>
        </fieldset>

        <!-- Pickup or Delivery -->
        <fieldset class="form-group">
            <legend class="col-sm-2 pt-0">Select Pickup or Delivery</legend>
            <div class="form-check">
                <label class="form-check-label" for="pickup">
                    <input type="radio" class="form-check-input" id="pickup" name="method" value="pickup" >Pickup
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label" for="delivery">
                    <input type="radio" class="form-check-input" id="delivery" name="method" value="delivery">Delivery
                </label>
            </div>
            <span class="err" id="err-method">Please select pickup or delivery</span>
        </fieldset>

        <!-- Toppings -->
        <fieldset class="form-group">
            <legend class="col-sm-2 pt-0">Select Toppings</legend>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="cheese" name="toppings[]">Cheese
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="pepperoni" name="toppings[]">Pepperoni
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="italian-sausage" name="toppings[]">Italian Sausage
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="greek-olives" name="toppings[]">Greek Olives
                </label>
            </div>
            <span class="err" id="err-toppings">Please select at least one topping</span>
        </fieldset>

        <!-- Pizza Size Select List -->
        <fieldset class="form-group">
            <legend class="col-sm-2 pt-0">Pizza Size</legend>
            <div class="form-group">
                <select class="form-control" id="size" name="size">
                    <option value="none">-- Select a Size --</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
                <span class="err" id="err-size">Please select a size</span>
            </div>
        </fieldset>

        <!-- Comment field -->
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
        </div>

        <!-- Email Sign-up -->
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" checked="checked" name="discount"> Sign me up for discounts!
            </label>
        </div>

        <!-- Order Button -->
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/pizza.js"></script>

</body>
</html>