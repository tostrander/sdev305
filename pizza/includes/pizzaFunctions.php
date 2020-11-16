<?php

//echo "<p>pizzaFunctions.php is loaded</p>";

function validName($name)
{
    return !empty($name); // && ctype_alpha($name);
}