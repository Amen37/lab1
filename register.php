
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="Css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form id="registerForm" method="POST" enctype="multipart/form-data">
    <div id="container">
        <h1>Create Account</h1>
        <div>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName">
        </div>
        <div>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="city">City</label>
            <input type="text" name="city">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="con_password">Confirm Password</label>
            <input type="password" name="con_password">
        </div>
        <p class="error"></p>
        <p class="success"></p>
        <input type="file" name="photo" id="photo">
        <button type="button" id="addPhoto" onclick="uploadPhoto()">Add Photo</button>
        <div class="row"> 
            <button type="button" id="registerButton" name="register" >Create Account</button>
            <button type="button" id="back" onclick="backToLogin()">Back</button>
        </div> 
       
    </div>
    <div id="overlay">

    </div>
</form>
</body>
<script src="Js/common.js"></script>
</html>