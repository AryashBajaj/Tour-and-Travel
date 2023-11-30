<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iternary Page-2</title>
    <style>
        img{
             height:396px;
             width:100%;
        }
        *{
           margin:0px;
           padding: 0;
           box-sizing: border-box;
        }
        .main{
              display: flex;
              justify-content: center;
              align-items: center;
              border:2px black solid;
              height:450px;
              margin:40px;
        }
        .box{
            border:1px black solid;
            width: 40%;
            background-color:rgb(220, 196, 196);
            height:400px;
            margin:10px;
            padding:10px;
            
        }
        .heading{
            margin: 20px;

        }
    </style>
</head>
<body><div class="main">
    <div id="content" class="box">
        <div class="heading"><h1>About IternaryMadeEasy</h1></div>
    
        <div class="text">
            Where do you want to go? That's the first question we ask our clients when they contact us, and we are always curious about the answer. No matter what travel destination you choose, our team will get you there. Offering the best rates in the market, we will take care of accommodation, transportation, travel insurance and all the extras, so you can focus on having fun. Have you started your packing list yet?</div>
    </div>
    <div id="image" class="box"><img src="dswimg.jpg"> </div>
    </div>
</body>
</html>