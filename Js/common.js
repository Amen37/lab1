$(document).ready(function () 
{
    
 $("#loginButton").click(function(e){
     console.log("called");
   
    $(".error,.success").text("");
    let form=$("#loginForm")[0];
    let formData= new FormData(form);
    formData.append("type","login");
    if(formData.get("email")!="" && formData.get("password")!=""){
        $.ajax({
            url: 'Logic/main.logic.php',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data){
                if (data=="valid") {
                     $(location).attr('href',"homepage.php");
                } else {
                    console.log("heyyy");
                    $(".error").text(data);
                }
            },
            error: function (e) {
                alert(e.responseText);
                console.log("ERROR : ", e);
            }
          });        
    }else{
        $(".error").text("All fields are required");
    } 
 }); 

 $("#registerButton").click(function(){
    $(".error").text("");
    $(".success").text("");
    
    let form=$("#registerForm")[0];
    let formData= new FormData(form);
    formData.append("type","register");
    let formEmpty= false;
    for(var value of formData.entries()){
        formEmpty= (value[1]==""||value["name"]=="")? true:false;
    }
    if(!formEmpty){
        $.ajax({
            url: 'Logic/main.logic.php',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data){
                if (data=="success") {
                    $(".success").text("Account Created Successfully");
                } else {
                    $(".error").text(data);
                }
            },
            error: function (e) {
                alert(e.responseText);
                console.log("ERROR : ", e);
            }
          });        
    }else{
        $(".error").text("All fields are required");
    } 
 }); 

 $("#update").click(function(){
    $(".error,.success").text("");
    let form=$("#changePasswordForm")[0];
    let formData= new FormData(form);
    formData.append("type","changePassword");
    let formEmpty= false;
    for(var value of formData.entries()){
        formEmpty= (value[1]==""||value["name"]=="")? true:false;
    }
    if(!formEmpty){
        if(formData.get("new_password")==formData.get("conf_new_password")){
        $.ajax({
            url: 'Logic/main.logic.php',
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data){
                if (data=="success") {
                    $(".success").text("Password successfully changed");
                } else {
                    $(".error").text(data);
                }
            },
            error: function (e) {
                alert(e.responseText);
                console.log("ERROR : ", e);
            }
          });
        }else{
            $(".error").text("Password Mistmatch");
        }        
    }else{
        $(".error").text("All fields are required");
    } 
 }); 

    $("#logout").click(function(){
        let message="logout";
        $.ajax({
            url:"Logic/main.logic.php",
            data: {"type":message},
            type: 'POST',
            success: function(data){
                if (data=="true") {
                    $(location).attr('href',"homepage.php");
                } else {
                    console.log("error");
                    console.log(data);
                }
            },
            error: function (e) {
                alert(e.responseText);
                console.log("ERROR : ", e);
            }

        });
    });
    $("#orderButton").click(function(){
        alert("Order successfully received!");
        alert("This feature is coming soon! Kindly bear with us.")
    })
 
});


function backToLogin(){
    window.location.href="login.php";
}
function uploadPhoto(){
    document.getElementById('photo').click();
}
function backToHomePage(){
    window.location.href="homepage.php";
}
function updatePassword(){
    window.location.href="changePassword.php";
}
function orderFood() {
    $(location).attr('href',"order.php");
}
// function logout(){
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//       if (this.readyState == 4 && this.status == 200) {
//         if (this.responseText=="logout") {
//             window.location.href="login.php";
//         }
//       }
//     };
//     xhttp.open("POST", "Logic/logout.logic.php", true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.send("type=logout");
// }

// function login(){
//     let form= document.getElementById('loginForm');
//     let formData= new FormData(form);
//     formData.append("type","login");
//     if(formData.get("email")!="" && formData.get("password")!=""){
//         let xhttp= new XMLHttpRequest();
//         xhttp.onreadystatechange= function(){
//             if(this.readyState==4 && this.status == 200 ){
//                 if (this.responseText=="valid") {
//                    window.location.href="homepage.php";
//                 }else{
//                     // alert(this.responseText);
//                     document.querySelector(".error").innerHTML=this.responseText;
//                 }  
//             }
//         }
//     xhttp.open("POST","Logic/main.logic.php",true);
//     xhttp.send(formData);
//     }else{
//         document.querySelector(".error").innerHTML="All fields are required";
//     }
    
// }
// function createAccount(){
//     console.log("called");
//     let form= document.getElementById('registerForm');
//     let formData= new FormData(form);
//     let formEmpty= false;
//     for(var value of formData.entries()){
//         formEmpty= (value[1]==""||value["name"]=="")? true:false;
//     }
//     formData.append("type","register");
//     if(!formEmpty){
//         let xhttp= new XMLHttpRequest();
//         xhttp.onreadystatechange= function(){
//             if(this.readyState==4 && this.status == 200 ){
//                 if (this.responseText=="success") {
//                     document.querySelector(".success").innerHTML="Account Created Successfully";
//                 }else{
//                     document.querySelector(".error").innerHTML=this.responseText;
//                 }  
//             }
//         }
//     xhttp.open("POST","Logic/main.logic.php",true);
//     xhttp.send(formData);
//     }else{
//         document.querySelector(".error").innerHTML="All fields are required";
//     }
// }
function changePassword(){
    // let currentPassword=document.getElementById("curr_password").value;
    // let newPassword=document.getElementById("new_password").value;
    // let confPassword=document.getElementById("conf_new_password").value;
    let form= document.getElementById("changePasswordForm");
    let formData= new FormData(form);
    let formEmpty= false;
    console.log("Data: "+ formData.get("curr_password"));
    for(var value of formData.entries()){
        formEmpty= (value[1]=="")? true:false;
    }
    document.querySelector(".success").innerHTML=document.querySelector(".error").innerHTML="";
    if (formEmpty) {
        document.querySelector(".error").innerHTML="All fields are required";
    } else {    
        if(formData.get("new_password")!=formData.get("conf_new_password")){
            document.querySelector(".error").innerHTML="Password mismatch";
        }else{
        formData.append("type","changePassword");   
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText=="success") {
                document.querySelector(".success").innerHTML="Password successfully changed";
            }else {
                document.querySelector(".error").innerHTML=this.responseText;
            }
        }
        };
        xhttp.open("POST", "Logic/main.logic.php", true);
        xhttp.send(formData);
        }
    }
}