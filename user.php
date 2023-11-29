<?php
session_start();
if ($_SESSION["logged"] !== true) {
    echo "<script>
        location.replace('login.php');
    </script>";
}
$conn = mysqli_connect("localhost", "root", "", "dbwproj");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="signin.css">
    <script src="https://kit.fontawesome.com/a2ef35e1b1.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

        <div class="formbox">
            <h1 id="title">Your Profile</h1>
                <div class="input-group">

                    <div class="input-field" id="namefield">
                        <i class="fa-solid fa-user"></i><br>
                        <!-- <input type="text" placeholder="Name" value=<?php echo $_SESSION["name"]?>> -->
                        <p class="det"><?php echo $_SESSION["name"]?></p>
                    </div>

                    <div class="input-field " id="mailfield1">
                        <i class="fa-solid fa-envelope" ></i>
                        <p class="det"><?php echo $_SESSION["email"]?></p>
                    </div>
                    
                    <p id="hide2">Happy to have you here!</p>


                    <form action="updated.php" method="POST" name="updatedet">

                        <div class="input-field "id="name1">
                            <i class="fa-solid fa-key"></i></i>
                            <input type="name" name="nm1" placeholder="Enter New Name">
                        </div>

                        <div class="input-field "id="mailfield2">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" name="em1" placeholder="Enter New Email ">
                        </div>

                        <button type="submit" name="upd" id="upd">Submit</button>
                    </form>


                </div>

                <div class="buttonfield">
                    <button type="button" id ="signupbtn">View Profile</button>
                    <button type="button"id="signinbtn" class="disable">Edit Profile</button>
                </div>

        </div>
    </div>
    
    <script>
        let signinbtn=document.getElementById("signinbtn")
        let signupbtn=document.getElementById("signupbtn")
        let mailfield1=document.getElementById("mailfield1")
        let mailfield2=document.getElementById("mailfield2")
        let namefield=document.getElementById("namefield")
        let title=document.getElementById("title")
        let hide2=document.getElementById("hide2")
        // let password=document.getElementById("password")
        let pw1 =document.getElementById("name1")
        let bt =document.getElementById("upd")
        // let pw3 =document.getElementById("pw-3")
        window.onload = function(){
            mailfield1.style.maxHeight="65px";
            mailfield2.style.maxHeight="0px";
            name1.style.maxHeight="0px";
            bt.style.maxHeight="0px";
            bt.innerHTML="";
            // pw3.style.maxHeight="0px";
            namefield.style.maxHeight="65px";
            title.innerHTML="Your Profile";
            signupbtn.classList.remove("disable");
            signinbtn.classList.add("disable");
            document.getElementById("hide2").innerHTML="Happy to have you here!";
            
             }
        signinbtn.onclick=function(){
            mailfield1.style.maxHeight="0";
            mailfield2.style.maxHeight="65px";
            name1.style.maxHeight="65px";
            bt.style.maxHeight="65px";
            bt.innerHTML="Submit";
            // pw3.style.maxHeight="65px";
            namefield.style.maxHeight="0";
            title.innerHTML="Edit";
            signupbtn.classList.add("disable");
            signinbtn.classList.remove("disable");
            document.getElementById("hide2").innerHTML="";
            password.placeholder=" Confirm Password"
             }
        signupbtn.onclick=function(){
            mailfield1.style.maxHeight="65px";
            mailfield2.style.maxHeight="0px";
            name1.style.maxHeight="0px";
            bt.style.maxHeight="0px";
            bt.innerHTML="";
            // pw3.style.maxHeight="0px";
            namefield.style.maxHeight="65px";
            title.innerHTML="Your Profile";
            signupbtn.classList.remove("disable");
            signinbtn.classList.add("disable");
            document.getElementById("hide2").innerHTML="Happy to have you here!";
        }     
    </script>
</body>
</html>