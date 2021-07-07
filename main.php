<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>WEBSITE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="home.php"><h4><span class="glyphicon glyphicon-home"></span>Home</h4></a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li><a href="contact_us.php"><h4><span class="glyphicon glyphicon-phone">ContactUs</h4></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="registration1.php"><h4><span class="glyphicon glyphicon-user"></span> Sign Up</h4></a></li>
      <li><a href="login.php"><h4><span class="glyphicon glyphicon-log-in"></span> Login</h4></a></li>
    </ul>
  </div>
</nav>
</body>
</html> -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
 -->
 <link rel="stylesheet" href="
  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css" />
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.heading
{
  font-family:Arial, Helvetica, sans-serif;
  text-align:center;
  font-size:xx-large;
  font-weight:bolder;
  background:rgba(189, 189, 190,0.1);
  letter-spacing:2px;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}
.topnav a {
  float: left;
  font-family: Arial, Helvetica, sans-serif;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
  letter-spacing:3px;
  margin-left:10%;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
.topnav .icon {
  display: none;
}
#img
{
  width:4%;
  margin-right:2%;
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .heading
  {
    font-size:20px;
  }
  #img
  {
    width:10%;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>
<center><div class="heading">
  <img src="inv.png" id="img">Stock Management System
</div></center>
<div class="topnav" id="myTopnav">
  <a href="temp.php"><i class="fa fa-fw fa-home"></i>Home</a>
  <a href="#about"><i class="fa fa-fw fa-user"></i>About Us</a>
  <a href="#contact"><i class="fa fa-fw fa-envelope"></i>Contact</a>
  <a href="login.php"><i class="fas fa-sign-in-alt"></i> Log In</a>
  <a href="log_out.php" ><i class="fas fa-sign-out-alt"></i> Log Out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>