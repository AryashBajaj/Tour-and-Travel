<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signin.css">
    <script src="https://kit.fontawesome.com/a2ef35e1b1.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

        <div class="formbox">
            <h1 id="title">Sign Up</h1>
            <form>
                <div class="input-group">
                    <div class="input-field" id="namefield">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name">
                    </div>
                    <div class="input-field "id="mailfield1">
                        <i class="fa-solid fa-envelope" ></i>
                        <input type="email"  placeholder="Email">
                    </div>
                        <div class="input-field "id="mailfield2">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" placeholder="Enter Your Email">
                        </div>
                    <div class="input-field "id="pw-1">
                        <i class="fa-solid fa-key"></i></i>
                        <input type="password" placeholder="Enter New Password">
                    </div>
                    <div class="input-field" id="pw-2">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id ="password" placeholder="Confirm Password">
                    </div>
                    <div class="input-field" id="pw-3">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password"  placeholder="Enter Your Password">
                    </div>
                    <p id="hide2">Lost Password?<a href="#">Click Here!</a></p>
                </div>
                <div class="buttonfield">
                    <button type="button" id ="signupbtn">Sign Up</button>
                    <button type="button"id="signinbtn" class="disable">Login</button>
                </div>
            </form>
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
        let password=document.getElementById("password")
        let pw1 =document.getElementById("pw-1")
        let pw2 =document.getElementById("pw-2")
        let pw3 =document.getElementById("pw-3")
        signinbtn.onclick=function(){
            mailfield1.style.maxHeight="0";
            mailfield2.style.maxHeight="65px";
            pw1.style.maxHeight="0px";
            pw2.style.maxHeight="0px";
            pw3.style.maxHeight="65px";
            namefield.style.maxHeight="0";
            title.innerHTML="Login";
            signupbtn.classList.add("disable");
            signinbtn.classList.remove("disable");
            document.getElementById("hide2").innerHTML="Lost Password? Click Here!"
            password.placeholder=" Confirm Password"
             }
        signupbtn.onclick=function(){
            mailfield1.style.maxHeight="65px";
            mailfield2.style.maxHeight="0px";
            pw1.style.maxHeight="65px";
            pw2.style.maxHeight="65px";
            pw3.style.maxHeight="0px";
            namefield.style.maxHeight="65px";
            title.innerHTML="Sign Up";
            signupbtn.classList.remove("disable");
            signinbtn.classList.add("disable");
            document.getElementById("hide2").innerHTML="Welcome Aboard!";
            
             }

    </script>
    
</body>
</html>