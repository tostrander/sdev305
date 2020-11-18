<?php

//echo "<p>pizzaFunctions.php is loaded</p>";

//Validate name
function validName($name)
{
    return !empty($name); // && ctype_alpha($name);
}

//Validate method
function validMethod($method)
{
    return $method == "pickup" OR $method == "delivery";
}

//Validate toppings:  accepts an array of toppings
function validToppings($selectedToppings)
{
    $validToppings = array("olives", "mushrooms", "pepperoni", "sausage");

    //Check each topping and return false if it's not valid
    foreach($selectedToppings as $selectedTopping) {
        if (!in_array($selectedTopping, $validToppings)) {
            return false;
        }
    }

    //All toppings are valid
    return true;
}