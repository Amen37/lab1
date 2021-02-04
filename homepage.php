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
    <link rel="stylesheet" href="Css/homepage.css">
</head>
<body>
    <div id="container">
        <h1>Profile</h1>
        
            <img src="<?php echo $user->getImagePath()?>" alt="Profile">
        
        <div>
            <p>First Name</p>
            <p><?php echo $user->getFName()?></p>
        </div>
        <div>
            <p>Last Name</p>
            <p><?php echo $user->getLName();?></p>
        </div>
        <div>
            <p>Email</p>
            <p><?php echo $user->getEmail();?></p>
        </div>
        <div>
            <p>City</p>
            <p><?php echo $user->getCity();?></p>
        </div>
        <button type="submit" id="changePassword" onclick="updatePassword()"  >Change Password</button>
        <button type="submit" id="logout" onclick="logout()"  >Logout</button>
    </div>
    <div id="overlay">

    </div>
</body>
<script src="Js/common.js"></script>
</html>