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
        <h1>Change Password</h1>
        <div>
            <label for="curr_password">Current Password</label>
            <input type="password" id="curr_password">
        </div>
        <div>
            <label for="new_password">New Password</label>
            <input type="password" id="new_password">
        </div>
        <div>
            <label for="conf_new_password">Confirm New Password</label>
            <input type="password" id="conf_new_password">
        </div>
        <p class="error"></p>
        <p class="success"></p>
        <button type="button" id="update" onclick=changePassword()>Update</button>
        <button type="button" id="back" onclick="backToHomePage()">Back</button>
                   
    </div>
    <div id="overlay">

    </div>
</body>
<script src="Js/common.js"></script>
</html>