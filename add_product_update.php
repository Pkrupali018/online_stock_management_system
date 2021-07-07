<html>
   <head>
     <link rel="stylesheet" href="style.css">
     <style>
        .btn
        {
            height:50px;
            
            width:100%;
            color: #fff;
  border: none;
  padding-left: 0;
  margin-top: -10px;
  font-size: 25px;
  font-weight: 500;
  cursor: pointer;
  background-color: rgb(26, 26, 24) ;
        }
        a
        {
            font-size: 25px;
        }
        a:hover
        {
            text-decoration:none;
            color:white;
           
        }
     </style>
</head>
    <body>
       
       <?php
       session_start();
            include 'main5.php';
            include 'dbcon1.php';
            if(isset($_POST['button1']) || isset($_POST['button2']))
            {
               
               $table_name=$_SESSION['name'];
               $id=mysqli_real_escape_string($con1,$_POST['id']);
               $rname=mysqli_real_escape_string($con1,$_POST['rname']);
               $price=mysqli_real_escape_string($con1,$_POST['price']);
               $available_quantity=mysqli_real_escape_string($con1,$_POST['available_quantity']);
               $required_quantity=mysqli_real_escape_string($con1,$_POST['required_quantity']);
               $total_price=($price*$required_quantity);
               
               $insertquery= "INSERT INTO `$table_name`(`id`, `rname`, `price`, `available_quantity`, `required_quantity`,`total_price`) VALUES ('$id','$rname','$price','$available_quantity','$required_quantity','$total_price')";
               $iquery = mysqli_query($con1,$insertquery);
               if($iquery)
               {
                  $message="raw material is successfully inserted.";
                  echo "<script type='text/javascript'>alert('$message');</script>";
                  if(isset($_POST['button1']))
                  {
                    error_reporting(E_ERROR | E_PARSE);
                      header("location:add_raw_material.php");
                  }
                  else if(isset($_POST['button2']))
                  {
                    error_reporting(E_ERROR | E_PARSE);  
                    header("location:manage.php");
                  }
               }
               else
               {
                  echo "Sorry!something went wrong.No connection";
               }
            }
    ?>
    <center>
    <div class="wrapper">
        <div class="title">
           Add raw material
        </div>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <div class="field">
                <tr><input type="text" name="id" required>
                    <label for="id">Id of raw material</label>
                </tr>
            </div>
         <div class="field">
                <tr><input type="text" name="rname" required>
                    <label for="rname">Name of raw material</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="price" required>
                    <label for="price">Price of raw material per quantity</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="available quantity" required>
                    <label for="available quantity">Available quantity of raw material</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="required quantity" required>
                    <label for="required quantity">Required quantity of raw material</label>
                </tr>
            </div>
            <div class="field">
                <input type="submit" value="Add another raw material" name="button1"> 
            </div>
            <div class="field">
                <input type="submit" value="Done" name="button2"> 
            </div>
            <div class="field">
                <input type="reset" value="Reset" name="reset"> 
            </div>
         </form>
         </div>
         </center>
    </body>
</html>