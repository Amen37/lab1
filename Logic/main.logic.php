<?php

require "../db_connect.php";
require "../Interface/account.php";
require "../Class/user.php";
require "../Logic/function.php";

if(isset($_POST['type'])){
    $type=$_POST['type'];
    switch ($type) {
        case 'login':
            $email=$_POST['email'];
            $password=$_POST['password'];
            $user= new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $dbConnect= new DBconnect();
            $pdo= $dbConnect->getConnection();
            if($user->login($pdo)){
                echo "valid";
            }else{
                echo"Invalid Credential";
            }
            $dbConnect->closeConnection();
            break;
        case 'register':
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
                    if (checkEmailExists($pdo,$email)) {
                        echo "This email already exists";
                    }else {
                        $user= new User();
                        $user->setFName($fName);
                        $user->setLName($lName);
                        $user->setEmail($email);
                        $user->setCity($city);
                        $user->setPassword($password);
                        $user->setImagePath($user->uploadImage($photo,getPossibleNextId($pdo)));
                        $user->register($pdo);
                        echo "success";
                    }
                }else{
                    echo "Password mismatch";
                }
            }else {
                echo "All fields are required";
            }
            $dbConnect->closeConnection();
            break;
        case 'logout':
            session_start();
            $user= new User();
            $dbConnect= new DBconnect();
            $pdo= $dbConnect->getConnection();
            $user->logout($pdo);
            $dbConnect->closeConnection();
            echo "true";
            break;
        case 'changePassword':
            session_start();
            $currentPassword=$_POST['curr_password'];
            $newPassword=$_POST['new_password'];
            $confPassword=$_POST['conf_new_password'];
            $dbConnect= new DBconnect();
            $pdo= $dbConnect->getConnection();
            $user= new User($_SESSION['userId'],$pdo);  
            $user->changePassword($pdo);
            break;
        default:
            echo "Not executed";
            break;
    }
}else {
    echo "badddd";
}

?>