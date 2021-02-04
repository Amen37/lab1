<?php



class User implements Account
{
protected $userId;
protected $fName;
protected $lName;
protected $email;
protected $city;
protected $password;
protected $imagePath;
protected $conn;

public function __construct($userId=false,$pdo=false){
   if($userId!=false && $pdo!=false){
       $sql="SELECT * FROM user WHERE user_id=?";
       $stmt=$pdo->prepare($sql);
       $stmt->execute([$userId]);
       $row=$stmt->fetch();
       if($row!=null){
           $this->id=$userId;
           $this->fName=$row['firstName'];
           $this->lName=$row['lastName'];
           $this->email=$row['email'];
           $this->city=$row['city'];
           $this->imagePath=$row['image'];
           $this->password=$row['password'];
       }
       $stmt=null;
   }
 }
public function getFName(){
    return $this->fName;
}
public function getLName(){
    return $this->lName;
}
public function getEmail(){
    return $this->email;
}
public function getCity(){
    return $this->city;
}
public function getPassword(){
    return $this->password;
}
public function getImagePath(){
    return $this->imagePath;
}
public function setFName($fName){
    $this->fName=$fName;
}
public function setLName($lName){
    $this->lName=$lName;
}
public function setEmail($email){
    $this->email=$email;
}
public function setCity($city){
    $this->city=$city;
}
public function setPassword($password){
    $this->password=$password;
}
public function setImagePath($imagePath){
   $this->imagePath=$imagePath;
}
  
public function register ($pdo){
    $sql="INSERT INTO user (firstName,lastName,email,city,image,password) VALUES (:firstName,:lastName,:email,:city,:image,:password)";
    $pass=password_hash($this->password,PASSWORD_DEFAULT);
    try {
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':firstName',$this->fName);
    $stmt->bindParam(':lastName',$this->lName);
    $stmt->bindParam(':email',$this->email);
    $stmt->bindParam(':city',$this->city);
    $stmt->bindParam(':image',$this->imagePath);
    $stmt->bindParam(':password',$pass);
    $stmt->execute();
    $stmt=null;    
    } catch (PDOException $e) {
        echo $e->getMessage();
    }    
}
public function login($pdo){
    $sql="SELECT user_id,password FROM user WHERE email=?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$this->email]);
    $row=$stmt->fetch();
    if($row==null){
        return false;
    }else{
        if (password_verify($this->password,$row['password']))  {
        session_start();
        $_SESSION['userId']=$row['user_id'];
        $this->id=$_SESSION['userId'];
        $stmt=null; 
        return true;    
        
        }else {
            return false;
        }   
    }
}
public function changePassword($pdo){
    global $currentPassword;
    global $newPassword;
    $hashedNewPassword=password_hash($newPassword,PASSWORD_DEFAULT);
    if(password_verify($currentPassword,$this->password)){
        $sql="UPDATE user SET password=?";
        try {
            $stmt=$pdo->prepare($sql);
            $stmt->execute([$hashedNewPassword]);
            $this->password=$hashedNewPassword;
            $stmt=null;
            echo "success";
        } catch (PDOException $e) {
            echo $e->getMessage();
            
        }
    }else{
        echo "fail";
    }       
    
}
public function logout ($pdo){
    session_unset();
    session_destroy();
}

public function uploadImage($file,$id)
{
$target_dir = "../Image/";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
    }
    $target_file = $target_dir."profilePhoto".$id.".".$imageFileType;
    move_uploaded_file($file["tmp_name"], $target_file);
    $savedTarget="Image/"."profilePhoto".$id.".".$imageFileType;
    return $savedTarget;
}
 
}

// $this->fName=$fName;
// $this->lName=$lName;
// $this->email=$email;
// $this->city=$city;
// $this->password=$password;
// $this->image=$image;
// Check if image file is a actual image or fake image
// $check = getimagesize($file["tmp_name"]);
//   if($check === false) {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   } 

// Check file size
// if ($file > 500000) {
//   $uploadOk = 0;
// }


?>