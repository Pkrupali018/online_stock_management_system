<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://fonts.googleapis.com/css?family=Alef' rel='stylesheet'>
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
        #contact
        {
            background-color:rgb(245, 232, 190);   
        } 
        * {
            font-family: 'Alef';
           
        }

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

        textarea:focus,
        input:focus {
            outline: none !important;
        }

        input:active {
            background-color: inherit;
        }

        #hr
        {
           width:25%;
           /* height:1px; */
           align-self: center;
           background-color: black;
        }
        .btn {
            background-color: black;
            color: white;
            /* width: 20%;
            height: 3%; */
        } 

        

        #i {
            margin-left: 35px;
            margin-top: -50%;
            color: black;
        }

        #i:hover {
            color: rgb(70, 68, 68);
        }

        .icon {
            display: flex;
            flex-direction: row;
            margin-left: 44%;
            position: relative;
            padding-bottom: 5%;
        }
        
        @media screen and (min-width:600px){

            .btn{
                /* background-color: black;color: white;
            width: 20%;
            height: 3%;margin-top:3%;" */
            background-color: black;
            color: white;
            padding-top:1%;
            padding-bottom:1%;
            height: 70%;
            margin-top:3%;
            /* margin-left:80%; */
            margin-bottom:5%;
            /* width:40%; */
            }
            .btn:hover {
            /* background-color: rgba(53, 50, 50, 0.294);
            color: black;
            cursor: pointer; */
            background-color: #999;
            color: black;
        }
        }

        @media screen and (max-width:600px) {
            .icon {
                margin-left: 18%;
            }

            textarea,
            input {
                font-size: medium;
                border-top: 0px;
                border-left: 50%;
                border-right: 5%;
                border-bottom: 2px;
                border-color: black;
                font-family: 'Alef';
                /* letter-spacing: 3px; */
                margin-top: 2%;
                background-color: inherit;
                width: 50%;
            }
            
            #hr{
                width:50%;
            }
            
            .btn {
                /* background-color: rgb(20, 17, 17);
                color: white;
                width: 100%;
                height: 3%; */
                background-color: black;
        color: white;
        border: 1px;
        /* margin-top:15%; */
        border-radius: 10px;
        margin-left:1%;
        width:45%;
        margin-top:5%;
        margin-bottom:5%;
        padding-top: 3%;
        padding-bottom: 3%;
        padding-left:10%;
        padding-right:10%;
            }
            .btn:hover {
            /* background-color: rgba(53, 50, 50, 0.294);
            color: black;
            cursor: pointer; */
            background-color: #999;
            color: black;
        }
            .icon{
                margin-left:5%;
            }
        }
    </style>
</head>

<body>
    <div id="contact">
        <br>
        <center>
            <h1 style="margin-top:2%;margin-bottom:5%;">Get in Touch</h1>
        </center>
        <center>
            <div class="form">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" placeholder="Enter your name" name="name" minlength="20"><br>
                    <hr id="hr" style="height:2px;">
                    <input type="email" placeholder="Enter E-mail" name="email" minlength="20"><br>
                    <hr id="hr" style="height:2.5px;">
                    <textarea rows="2" cols="20" placeholder="Enter Message" name="msg"></textarea><br>
                    <hr id="hr" style="height:2.2px;">
                    <input type="submit" name="submit" value="Send Message" class="btn" style=" background-color: black;
        color: white;"><br><br>
                </form>
            </div>
        </center>
        <div class="icon">
            <a href=""><i class="fab fa-linkedin fa-2x" id="i"></i></a>
            <a href=""><i class="fab fa-twitter fa-2x" id="i"></i></a>
            <a href="mailto:stkmnt2021@gmail.com"><i class="fas fa-envelope fa-2x" id="i"></i></a>
        </div>
    </div>
</body>

</html>
<?php
if(isset($_POST['submit']))
    {
        $email="stkmnt2021@gmail.com";
        $subject="comment"; 
            $body =$_POST['msg'];
            $sender_email = "From:tempproject2021@gmail.com";
            if (mail($email, $subject, $body, $sender_email)) {
                echo "<center>your mail has been sent suceesfully.</ceneter>";
            }
            
            else {
                echo "Email sending failed...";
            }
        }
    ?>