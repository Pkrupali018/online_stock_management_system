<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="
  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="
  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       textarea,
        input {
            font-size: x-large;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            border-bottom: 2px;
            border-color: black;
            font-family: 'Alef';
            letter-spacing: 3px;
            margin-top: 2%;
            background-color: inherit;
            width: 25%;
        }
        /* .img{
          margin-top:-45%;
        } */

        .card0,
        .card1,
        .card2 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            /* margin-top: 15%; */
            /* margin-bottom: 15%; */
            width: 33%;
            align-content: center;
            display: flex;
            flex-direction: column;
            align-content: center;
        }

        .card0 {
            margin-left: 10%;
            background-color: white;
        }

        .card1 {
            margin-left: 5%;
            margin-right: 5%;
            background-color: white;
        }

        .card2 {
            margin-right: 10%;
            background-color: white;
        }
        .upper i
        {
            color:black;
        }
        .card0:hover,
        .card1:hover,
        .card2:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .btn {
            background-color: black;
            color: white;
            width: 20%;
            height: 3%;
        }

        .btn:hover {
            background-color: rgba(53, 50, 50, 0.294);
            color: black;
            cursor: pointer;
        }

        .upper {
            flex-direction: row;
            display: flex;
            justify-content: space-around;
            align-content: center;
            padding-bottom:15%;
            background-color:rgb(231, 235, 248);
        }
        #vid {
position: float;
border: 3px solid black;
box-sizing: border-box;
}
        @media screen and (max-width: 600px) {

            .upper {
                display: block;
                flex-direction: column;
                align-content: center;
                margin-left: 5%;
                margin-right: 5%;
                /* padding-top: 5%; */
                padding-bottom: 5%;
            }

            .card0,
            .card1,
            .card2 {
                margin-left: 5%;
                width: 80vw;
                margin-top: 50%;
                /* margin-bottom: 15%; */
            }

            .btn {
                background-color: rgb(20, 17, 17);
                color: white;
                width: 50%;
                height: 3%;
            }

            /* .img{
              margin-top:-20%;
            } */
        }
    </style>
</head>

<body>
    
    <?php include "main.php"; ?>
    <div id="ab" style="background-color:rgb(231, 235, 248);">
    <center>
    <video width="70%" controls id="vid" style="margin-top:3%;border:3px solid #ECECE;box-sizing : border-box;">
  <source src="project.mp4" type="video/mp4">
</video>
        <h1 style="padding-top:5%;" id="about">About Us</h1>
    </center>
    <div class="upper" style="margin-top:10%;">
        <div class="card0" style="padding:5% 2%;">
            <center>
                <img src="Inventory-Management.png" alt="loading..." style="width:70%;margin-top:-45%;">
                <h2 style="margin-top: 20%;font-size: 25px;margin-bottom:5%;">Diya Thakor<br><br>Web Developer</h2>
                <a href="mailto:diyathakor2003@gmail.com" style="margin-right:6%"><i class="fa fa-envelope fa-2x"
                        ></i></a>
                <a href="https://www.linkedin.com/in/diya-thakor-b2700420a/" target="_blank" style="margin-right:6%"><i
                        class="fab fa-linkedin fa-2x"></i>
                    </i></a>
            </center>
        </div>
        <div class="card1" style="padding:5% 2%;">
            <center>
                <img src="Inventory-Management.png" alt="loading..." style="width:70%;margin-top:-45%">
                <h2 style="margin-top: 20%; font-size: 25px;margin-bottom:5%;">Shruti Patel<br><br>Web Developer</h2>
                <a href="mailto:shruti29032003@gmail.com"><i class="fa fa-envelope fa-2x"
                        style="margin-right:6%;"></i></a> 
                <a href="https://www.linkedin.com/in/shruti-patel-27a706209"
                    target="_blank" style="margin-right:6%"><i class="fab fa-linkedin fa-2x"></i></a </center>
        </div>
        <div class="card2" style="padding:5% 2%;">
            <center>
                <img src="Inventory-Management.png" alt="loading..." style="width:70%;margin-top:-45%">
                <h2 style="margin-top: 20%;font-size: 25px;margin-bottom:5%;">Krupali Pipaliya<br><br>Web Developer</h2>
                <a href="mailto:pkrupali018@gmail.com">
                <i class="fa fa-envelope fa-2x" style="margin-right:6%;"></i></a>
                <a href="https://www.linkedin.com/in/krupali-patel-7a1304205" target="_blank" style="margin-right:6%"><i
                        class="fab fa-linkedin fa-2x"></i></a>
            </center>
        </div>
    </div>
    </div>
    <div id="contact">
        <?php 
       include 'temp1.php'
      ?>
      </div>
      <?php
        include 'ratings.php'
      ?>
    </div>
</body>

</html>