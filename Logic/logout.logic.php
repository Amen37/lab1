<?php
session_start();
require "../db_connect.php";
require "../Interface/account.php";
require "../Class/user.php";
if (isset($_POST['type'])) {
    $user= new User();
    $dbConnect= new DBconnect();
    $pdo= $dbConnect->getConnection();
    $user->logout($pdo);
    $dbConnect->closeConnection();
    echo "logout";
}
if(isset($_POST['curr'])&&isset($_POST['new'])&&isset($_POST['conf'])){
    $currentPassword=$_POST['curr'];
    $newPassword=$_POST['new'];
    $confPassword=$_POST['conf'];
    $dbConnect= new DBconnect();
    $pdo= $dbConnect->getConnection();
    $user= new User($_SESSION['userId'],$pdo);  
    $user->changePassword($pdo,$currentPassword,$newPassword);
}
?>