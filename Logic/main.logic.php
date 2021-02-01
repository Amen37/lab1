<?php

if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $user= new User();
    $user->setEmail($email);
    $user->setPassword($password);
    $dbConnect= new DBconnect();
    $pdo= $dbConnect->getConnection();
    if($user->login($pdo)){
        header("Location: ./homepage.php");
    }else{
        $error="Invalid Credential";
    }
    $dbConnect->closeConnection();
}
if(isset($_POST['register'])){
    
    // echo "<script>alert('called');</script>";
    $photo=$_FILES["photo"];
    $fName=$_POST['firstName'];
    $lName=$_POST['lastName'];
    $city=$_POST['city'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $conPassword=$_POST['con_password'];
   
    $dbConnect= new DBconnect();
    $pdo= $dbConnect->getConnection();
    if(!empty($fName)&&!empty($lName)&&!empty($city)&&!empty($email)&&!empty($password)&&!empty($conPassword)){
        if ($conPassword==$password) {
            $user= new User();
            $user->setFName($fName);
            $user->setLName($lName);
            $user->setEmail($email);
            $user->setCity($city);
            $user->setPassword($password);
            $user->setImagePath($user->uploadImage($photo,getPossibleNextId($pdo)));
            $user->register($pdo);
            $success="Account Created Successfully";
        }else{
            $error="Password mismatch";
        }
    }else {
        $error="All fields are required";
    }
    $dbConnect->closeConnection();
}
if (isset($_POST['type'])) {
    echo "heyy";
    $user= new User();
    $dbConnect= new DBconnect();
    $pdo= $dbConnect->getConnection();
    $user->logout($pdo);
    $dbConnect->closeConnection();
    echo true;
}
?>