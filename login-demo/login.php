<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

/*
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";
*/

//Initialize variables
$validLogin = true;
$un = "";

//If the form has been submitted
if (!empty($_POST)) {
    //echo "The form has been submitted";

    //Get the form data
    $un = $_POST['username'];
    $pw = $_POST['password'];

    //If the login is valid
    require('login-creds.php');
    if ($un == $username && $pw == $password) {

        //Record the login in the session array
        $_SESSION['un'] = $un;
        //$_SESSION['soda'] = 'diet coke';
        //$_SESSION['fav-color'] = 'blue';

        //Go to the home page
        $page = isset($_SESSION['page']) ? $_SESSION['page'] : "index.php";
        header('location: '.$page);
    }

    //Invalid login -- set flag variable
    $validLogin = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <style>
        .err {
            color: darkred;
        }
    </style>
</head>
<body>
<div class="container">

    <h1>Login Page</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control"
                   id="username" name="username"
                   value="<?php echo $un; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>
        <?php
            if (!$validLogin) {
                echo '<p class="err">Login is incorrect</p>';
            }
        ?>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>