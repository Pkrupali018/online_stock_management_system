 <!DOCTYPE html>
 <html lang="en">
 <head>
     <?php
        include 'links.php';
     ?>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="style2.css">
 </head>
 <body>
 <?php
     include 'dbcon.php';
     session_start();
     $token=$_SESSION['token'];
     $name1=$_SESSION['username'];
     $email=$_SESSION['email'];
     if(isset($_POST['submit']))
     {
        if($token){
         $new_password=mysqli_real_escape_string($con,$_POST['password']);
         $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
         $pass=password_hash($new_password, PASSWORD_BCRYPT);
         $cpass=password_hash($cpassword, PASSWORD_BCRYPT);
         $emailquery="select * from user_info where email='$email' ";
         $query=mysqli_query($con,$emailquery);
         
             if($new_password===$cpassword)
             {
                $update_query="update user_info set password='$pass' , cpassword='$cpass' where token='$token'";
                 $iquery = mysqli_query($con,$update_query);
                 if($iquery)
                 {
                    $_SESSION['msg']="Your password has been updated";
                    // header('location:login.php');
                 }
                 else
                 {
                    $_SESSION['passmsg']="Something went wrong.";
                    // header('location:reset_password.php');
                 }
             }
             else
             {
                 $message="Enter same password.";
                 echo "<script type='text/javascript'>alert('$message');</script>";
             }
        }
        else
        {
            echo "No token found";
        }
     }
     ?>
      <div class="card bg-light">
      <artical class="card-body mx-auto" style="max-width:400px;">
      <h4 class="card-title mt-3 text-center">New password</h4>
      <p class="bg-success text-white"> <?php
      if(isset($_SESSION['msg'])){
         echo $_SESSION['msg']; 
      }
      else{
         echo $_SESSION['passmsg']=""; 
      }
       ?> 
       </p>
      <form method="POST" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group input-group">
      <div class="input-group-prepend">
      <span class="input-group-text"><i class="fa fa-key"></i></span>
      </div>
      <input type="password" name="password" id="password-field" class="form-control" placeholder="Enter your password" minlength="6" maxlength="10" required>
      </div>
      <div class="form-group input-group">
      <div class="input-group-prepend">
      <span class="input-group-text"><i class="fa fa-lock"></i></span>
      </div>
      <input type="password" name="cpassword" class="form-control" placeholder="Confirm password" required>
      </div>
      <!-- <input type="hidden" name="token" value="$_GET['token']"> -->
      <div class="form-group">
      <button type="submit" name="submit" class="btn btn-primary btn-block">Reset password</button>
      </div>
      <p class="text-center">Already have an account?<a href="login.php">Log in</a></p>
      </form>
      </artical>
      </div>
      </div>
      </div>
 </body>
 </html>
