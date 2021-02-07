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
    <title>Order</title>
    <link rel="stylesheet" href="Css/order.css">
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/37280917ff.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="nav">
    <button type="button" class="btn btn-primary btn-lg" onclick="backToHomePage()"> Home Page </button> 
    <button type="button" class="btn btn-primary btn-lg" onclick="orderFood()"> Order Food </button> 
    </div>
    <form id="orderForm" name="orderForm" method="POST">
    <div id="container">
        <h1>Order</h1>
        <div>
            <label for="item">Food Item</label>
            <input type="text" name="item" id="item" required>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" required>
        </div>
        <button type="button" class="btn btn-primary " name="orderButton" id="orderButton" >Order</button>
        <p class="error"></p>
        <hr>
                
    </div>
   
</form>

</body>
<script src="Js/common.js"></script>
</html>