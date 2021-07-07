<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <?php
       include 'links.php';
       include 'dbcon.php';
      //  include 'main.php';
       if(isset($_POST['submit']))
       {
          $_SESSION['username'] =$_POST['username'];
          $username=$_SESSION['username'];
          $password=$_POST['password'];
          $username_search="select * from user_info where username='$username'";
          $query=mysqli_query($con,$username_search);
          $username_count=mysqli_num_rows($query);
          if($username_count)
          {
              $username_password=mysqli_fetch_assoc($query);
              $db_password=$username_password['password'];
              $password_decode=password_verify($password,$db_password);
              if($password_decode)
              {
                $message="Log in successfully.";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("location:home1.php?");
              }
              else
              {
                $message="Password is incorrect.";
                echo "<script type='text/javascript'>alert('$message');</script>";
              }
          }
          else
          {
              $message="Invalid username.";
              echo "<script type='text/javascript'>alert('$message');</script>";
          }
       }
       
    ?>
    
</head>
<body>
     <div class="card bg-light">
     <artical class="card-body mx-auto" style="max-width:400px;">
     <h4 class="card-title mt-3 text-center">Enter in  Account</h4>
     <p class="text-center">Get started with your free account</p>
     <p> 
     <a href="" class="btn btn-block btn-gmail"><i class="fab fa-google"></i></i>
     Login via Gmail</a>
     </p>
     <p class="divider-text">
     <span class="bg-light">OR</span>
     </p>
     <form class="login_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
     <div class="form-group input-group">
     <div class="input-group-prepend">
     <span class="input-group-text"><i class="fa fa-user"></i></span>
     </div>
     <input type="text" name="username" class="form-control" placeholder="Enter your full name" required>
     </div>
     <div class="form-group input-group">
     <div class="input-group-prepend">
     <span class="input-group-text"><i class="fa fa-lock"></i></span>
     </div>
     <input type="password" name="password" id="password-field" class="form-control" placeholder="Enter your password"  required>
     </div>
     <div class="form-group">
     <button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
     </div>
     <p class="text-center"><a href="temp.php">Go to Home</a></p>
     <p class="text-center">Forgot password?<a href="recover_email.php">Click Here</a></p>
     <p class="text-center">Don't have an account?<a href="registration1.php">Sign Up</a></p>
     </form>
     </artical>
     </div>
     </div>
     </div>
</body>
</html>