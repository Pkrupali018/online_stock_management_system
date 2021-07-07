<html>
   <head>
     <link rel="stylesheet" href="style.css">
     <style>
        @media screen and (max-width:600px)
        {
            form
            {
               width:80%;
            }
            .title
            {
               width:80%;
            }
        }
        </style>
        </head>
    <body>
       
       <?php
            session_start();
            include 'main5.php';
            include 'dbcon1.php';
            if(isset($_GET['name']))
            {
                $_SESSION['name']=$_GET['name'];
                // $_SESSION['user']=$username;
                // echo $_SESSION['user'];
                error_reporting(E_ERROR | E_PARSE);
                // header("location:update_raw.php");
            }
           $tname=$_SESSION['pname'];
            if(isset($_POST['submit']))
            {
               $id=mysqli_real_escape_string($con1,$_POST['id']);
               $rname=mysqli_real_escape_string($con1,$_POST['name']);
               $price=mysqli_real_escape_string($con1,$_POST['price']);
               $available_quantity=mysqli_real_escape_string($con1,$_POST['available_material']);
               $required_quantity=mysqli_real_escape_string($con1,$_POST['required_material']);
               $total_price=($price*$required_quantity);
               $updatequery="UPDATE `$tname` SET `rname`='$rname',`price`='$price',`available_quantity`='$available_quantity',`required_quantity`='$required_quantity',`total_price`='$total_price' WHERE `id`='$id'";
               $iquery = mysqli_query($con1,$updatequery);
                  $message="Quantity is successfully updated.";
                  echo "<script type='text/javascript'>alert('$message');</script>";
                  error_reporting(E_ERROR | E_PARSE);
                  header("location:update_raw_material.php");
               }
            
    ?>
    <center>
    <div class="wrapper">
        <div class="title">
           Update Raw Material
        </div>
        <?php
           $name=$_SESSION['name'];
           $sql="SELECT * FROM $tname WHERE rname='$name'";
           if($result=mysqli_query($con1,$sql))
           {  
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
               ?>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <div class="field">
                <tr><input type="number" name="id" value="<?php echo $row['id']; ?>" required>
                    <label for="id">Material ID</label>
                </tr>
            </div>
            <div class="field">
                <tr>
                
                <input type="text" name="name" value="<?php echo $row['rname']; ?>" >   
                <label for="name">Material Name</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="number" name="price" value="<?php echo $row['price']; ?>" required>
                    <label for="price">Price Of the Material</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="available_material" value="<?php echo $row['available_quantity']; ?>" required>
                    <label for="available_material">Available Material</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="required_material" value="<?php echo $row['required_quantity']; ?>" required>
                    <label for="required_material">Minimum required Material</label>
                </tr>
            </div>
            <div class="field">
                <input type="submit" value="Update raw material" name="submit">
            </div>
            
            <div class="field">
                <input type="reset" value="Reset" name="reset"> 
            </div>
         </form>  <?php }  ?>
         </div>
         </center>
    </body>
</html>