<?php
session_start();
require "./db_connect.php";
require "./Interface/account.php";
require "./Class/user.php";
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
}
$dbConnect= new DBconnect();
$pdo=$dbConnect->getConnection();
$user= new User($_SESSION['userId'],$pdo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="Css/resetPassword.css">
</head>
<body>

    <div id="container">
        <h1>Reset Password</h1>
        <div>
            <label for="new_password">New Password</label>
            <input type="password" id="new_password">
        </div>
        <div>
            <label for="conf_new_password">Confirm New Password</label>
            <input type="password" id="conf_new_password">
        </div>
        <button type="submit" id="reset">Reset</button>
        <button type="button" id="back" onclick="backToLogin()">Back</button>
                   
    </div>
    <div id="overlay">

    </div>
</body>
<script src="Js/common.js"></script>
</html>