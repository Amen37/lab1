function backToLogin(){
    window.location.href="login.php";
}
function uploadPhoto(){
    document.getElementById('photo').click();
}
function backToHomePage(){
    window.location.href="homepage.php";
}
function logout(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText=="logout") {
            window.location.href="login.php";
        }
      }
    };
    xhttp.open("POST", "Logic/logout.logic.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("type=logout");
}
function updatePassword(){
    window.location.href="changePassword.php";
}
function changePassword(){
    let currentPassword=document.getElementById("curr_password").value;
    let newPassword=document.getElementById("new_password").value;
    let confPassword=document.getElementById("conf_new_password").value;
    document.querySelector(".success").innerHTML=document.querySelector(".error").innerHTML="";
    console.log(currentPassword);
    if(newPassword!=confPassword){
        document.querySelector(".error").innerHTML="Password mismatch";
    }else{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText=="success") {
            document.querySelector(".success").innerHTML="Password successfully changed";
        }else if (this.responseText=="fail") {
            document.querySelector(".error").innerHTML="Incorrect Password";
        }
      }
    };
    xhttp.open("POST", "Logic/logout.logic.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data="curr="+currentPassword+"&new="+newPassword+"&conf="+confPassword;
    xhttp.send(data);
    }
    
}