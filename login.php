<?php
$error="";
require "./db_connect.php";
require "./Interface/account.php";
require "./Class/user.php";
require "./Logic/function.php";
require "Logic/main.logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Css/login.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div id="container">
        <h1>Login</h1>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div id="check-box">
            
            <input type="checkbox" id="checkbox">
            <label for="checkbox">Remeber Me</label>
        </div>
        <button type="submit" name="login">LOG IN</button>
        <p class="error"><?php echo $error;?></p>
        <hr>
        <div id="links">
            <a href="resetPassword.html">Forgot Password</a>
            <a href="register.php">New User? Register</a>
        </div>            
    </div>
    <div id="overlay">

    </div>
</form>
</body>
<script src="Js/common.js"></script>
</html>