<?php
// 305/pizza/includes/function.php

function getToppings()
{
    $toppings = array('pepperoni', 'olives', 'sausage', 'artichokes', 'bacon', 'garlic');
    return $toppings;
}

function getSizes()
{
    $sizes = array('none'=>'-- Select a Size --', 'small'=>'Small',
        'med'=>'Medium', 'large'=>'Large', 'xl'=>"Extra Large");
    return $sizes;
}

function validName($name)
{
    return !empty($name);
}

function validEmail($email)
{
    /*
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else {
        return false;
    }
    */

    return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validMethod($method)
{
    /*
    if ($method == "pickup" || $method == "delivery")
        return true;
    else
        return false;
    */

    return $method == "pickup" || $method == "delivery";
}

function validSize($size)
{
    /*
    $validSizes = getSizes();
    if (array_key_exists($size, $validSizes) && $size != "none")
        return true;
    else
        return false;
    */

    return array_key_exists($size, getSizes()) && $size != "none";
}

function validToppings($userToppings)
{
    $availableToppings = getToppings();

    foreach($userToppings as $topping) {
        if (!in_array($topping, $availableToppings)) {
            return false;
        }
    }
    return true;
}

echo "I am in the functions file";
$test = "large";
if (validSize($test)) {
    echo "<p>$test is Good</p>";
}
else {
    echo "<p>$test is Bad</p>";
}