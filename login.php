<?php
// $error="";
// require "./db_connect.php";
// require "./Interface/account.php";
// require "./Class/user.php";
// require "./Logic/function.php";
// require "Logic/main.logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <form id="loginForm" name="loginForm" method="POST">
    <div id="container">
        <h1>Login</h1>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div id="check-box">
            
            <input type="checkbox" id="checkbox">
            <label for="checkbox">Remeber Me</label>
        </div>
        <button type="button" name="loginButton" id="loginButton" >LOG IN</button>
        <p class="error"></p>
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