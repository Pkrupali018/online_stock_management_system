<html>
   <head>
     <link rel="stylesheet" href="style.css">
     <style>
     #btn
     {
         width:100%;
         height:100%;
         margin-top:-2%;
         
     }
     a:hover
     {
        color:white;
         font-size:20px;
         text-decoration:none;
     }
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
            $username=$_SESSION['user'];
            $name=$_SESSION['name'];
            include 'main5.php';
            include 'dbcon.php';        
            if(isset($_POST['submit']))
            {
               $product_id=mysqli_real_escape_string($con,$_POST['product_id']);
               $product_name=mysqli_real_escape_string($con,$_POST['product_name']);
               $_SESSION['pname']=$product_name;
               $product_catagory=mysqli_real_escape_string($con,$_POST['product_catagory']);
               $price=mysqli_real_escape_string($con,$_POST['price']);
               $available_product=mysqli_real_escape_string($con,$_POST['available_product']);
               $required_product=mysqli_real_escape_string($con,$_POST['required_product']);
               $old=$_SESSION['pname'];
               include 'dbcon1.php';
               $rename="ALTER TABLE $old RENAME TO $product_name";
               $link=$con1->query($rename);
               $updatequery= "UPDATE `$username` SET `product_catagory`='$product_catagory',`price`='$price',`available_product`='$available_product',`required_product`='$required_product' WHERE `product_id`='$product_id'";
               $iquery = mysqli_query($con,$updatequery);
                  $message="Product is successfully updated.";
                  echo "<script type='text/javascript'>alert('$message');</script>";
                  error_reporting(E_ERROR | E_PARSE);
                // header("location:update_raw_material.php");
               }
               
    ?>
    <center>
    <div class="wrapper">
        <div class="title">
           Update Product
        </div>
        <?php
           
           $sql="SELECT * FROM $username WHERE product_name='$name'";
           if($result=mysqli_query($con,$sql))
           {  
               $row = mysqli_fetch_array($result,MYSQLI_ASSOC);  
               ?>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <div class="field">
                <tr><input type="text" name="product_catagory" value="<?php echo $row['product_catagory']; ?>" required>
                    <label for="product_catagory">Catagory of the product</label>
                </tr>
            </div>
            <div class="field">
                <tr>
                
                <input type="number" name="product_id" value="<?php echo $row['product_id']; ?>" >   
                <label for="product_id">Product ID</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="product_name" value="<?php echo $row['product_name']; $_SESSION['Last']=$row['product_name'];?>" >
                    <label for="product_name">Product name</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="price" value="<?php echo $row['price']; ?>" required>
                    <label for="price">Price Of the Product</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="available_product" value="<?php echo $row['available_product']; ?>" required>
                    <label for="available_product">Available Product</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="required_product" value="<?php echo $row['required_product']; ?>" required>
                    <label for="required_product">Minimum required Product</label>
                </tr>
            </div>
            <div class="field">
                <input type="submit" value="Update Product" name="submit">
            </div>
            <div class="field">
            <button id="btn"><a href="update_raw_material.php" style="color:white;">Update raw material</a></button>
            </div>
            <div class="field">
            <button id="btn"><a href="add_product_update.php" style="color:white;">Add raw material</a></button>
            </div>
            <div class="field">
                <input type="reset" value="Reset" name="reset"> 
            </div>
         </form>  <?php }  ?>
         </div>
         </center>
    </body>
</html>