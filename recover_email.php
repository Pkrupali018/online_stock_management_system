<?php
  session_start();
?>
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
    if(isset($_POST['submit']))
    {
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $emailquery="select * from user_info where email='$email' ";
        $query=mysqli_query($con,$emailquery);
        $emailcount=mysqli_num_rows($query);
        if($emailcount)
        {
            $userdata=mysqli_fetch_array($query);
            $_SESSION['username']=$userdata['username'];
            $username=$_SESSION['username'];
            $subject = "Password reset";
            $_SESSION['email']=$userdata['email'];
            $email=$_SESSION['email'];
            $_SESSION['token']=$userdata['token'];
            $token=$_SESSION['token'];
            $body = "Hi, $username.Click here to reset your password http://localhost/PROJECT_PHP/reset_password.php?token=$token";
            $sender_email = "From: stkmnt2021@gmail.com";
            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['msg']="Check your mail to reset your password";
                // echo $_SESSION['msg'];
                //header('location:login.php');
            }
            
            else {
                echo "Email sending failed...";
            }
        }
        else
        {
            $message="No email found.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    ?>
     <div class="card bg-light">
     <artical class="card-body mx-auto" style="max-width:400px;">
     <h4 class="card-title mt-3 text-center">Reset Password</h4>
     <p class="text-center">Please write email properly</p>
     <?php if(isset($_SESSION['msg']))
     {
         ?>
        <p class="bg-success text-white"><?php echo $_SESSION['msg'] ?></p>
        <?php
     }
     ?>
     <form method="POST" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>">
     <div class="form-group input-group">
     <div class="input-group-prepend">
     <span class="input-group-text"><i class="fa fa-envelope"></i></span>
     </div>
     <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
     </div>
     <div class="form-group">
     <button type="submit" name="submit" class="btn btn-primary btn-block">Send Mail</button>
     </div>
     <p class="text-center">Already have an account?<a href="login.php">Log in</a></p>
     </form>
     </artical>
     </div>
     </div>
     </div>
</body>
</html>