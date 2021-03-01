<?php

/* Pizza functions
 * 305/pizza/functions.php
 *
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//echo "<p>Including functions.php</p>";

//Not empty and 2-character minimum
function validName($name)
{
    //echo "<p>Inside validName()</p>";
    return !empty($name) && strlen($name) >= 2;
}

//If provided, 10 character minimum
function validAddress($address)
{
    if (empty($address)) {
        return true;
    }
    return strlen($address) >= 10;
}

function thanks($name="")
{
    echo "<h3>Thank you for your order";
    if (!empty($name)) {
        echo ", $name";
    }
    echo "!</h3>";
}

/* Calculate the base price of a pizza based on size */
function getPrice($size)
{
    $basePrice = 0.00;
    if ($size == 'small') {
        $basePrice = 8.99;
    }
    elseif ($size == 'medium') {
        $basePrice = 12.99;
    }
    else {
        $basePrice = 16.99;
    }
    return $basePrice;
}

//Calculate subtotal (base price + 1.50 per topping)
function subtotal($basePrice, $toppings)
{
    $subtotal = $basePrice;
    if (!empty($toppings)) {
        $subtotal += 1.50 * count($toppings);
    }
    return $subtotal;
}

//Add sales tax
function total($subtotal)
{
    define('SALES_TAX', 0.065);
    $tax = $subtotal * SALES_TAX;
    $total = $subtotal + $tax;
    return $total;
}