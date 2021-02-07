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
    <!-- <link rel="stylesheet" href="Css/trackOrder.css"> -->
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Css/homePage.css">      
    <link rel="stylesheet" href="Css/trackOrder.css"> 
    <script src="https://kit.fontawesome.com/37280917ff.js" crossorigin="anonymous"></script>
    
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
        <button type="submit" id="logout"   >Logout</button>
    </div>
    <div id="overlay">

    </div>
    <!-- Button to Open the Modal -->
    <div id="nav">
    <button type="button" id="chechOrder" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Track your order </button> 
    <button type="button" class="btn btn-primary btn-lg" onclick="orderFood()"> Order Food </button> 
    </div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title mx-auto">Order Status<br>AWB Number-5335T5S</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> <!-- Modal body -->
            <div class="modal-body">
                <div class="progress-track">
                    <ul id="progressbar">
                        <li class="step0 active " id="step1">Order placed</li>
                        <li class="step0 active text-center" id="step2">In Transit</li>
                        <li class="step0 active text-right" id="step3"><span id="three">Out for Delivery</span></li>
                        <li class="step0 text-right" id="step4">Delivered</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="details d-table">
                            <div class="d-table-row">
                                <div class="d-table-cell"> Shipped with </div>
                                <div class="d-table-cell"> UPS Expedited </div>
                            </div>
                            <div class="d-table-row">
                                <div class="d-table-cell"> Estimated Delivery </div>
                                <div class="d-table-cell"> 02/12/2017 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-table-row"> <a href=#><i class="fa fa-phone" aria-hidden="true"></i></a> </div>
                        <div class="d-table-row"> <a href=#><i class="fa fa-envelope" aria-hidden="true"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="Js/common.js"></script>
</html>