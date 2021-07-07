<html>
   <head>
     <link rel="stylesheet" href="style.css">
     <style>
     
     </style>
   </head>
    <body>
       
       <?php
            include 'main5.php';
            include 'dbcon.php';
            include 'dbcon1.php';
            if(isset($_POST['submit']))
            {
               session_start();
               $username=$_SESSION['username'];
               $product_id=mysqli_real_escape_string($con,$_POST['product_id']);
               $product_name=mysqli_real_escape_string($con,$_POST['product_name']);
               $_SESSION['pname']=$product_name;
               $product_catagory=mysqli_real_escape_string($con,$_POST['product_catagory']);
               $price=mysqli_real_escape_string($con,$_POST['price']);
               $available_product=mysqli_real_escape_string($con,$_POST['available_product']);
               $required_product=mysqli_real_escape_string($con,$_POST['required_product']);
               $insertquery= "INSERT INTO `$username`(`product_id`, `product_name`, `product_catagory`, `price`, `available_product`, `required_product`) VALUES ('$product_id','$product_name','$product_catagory','$price','$available_product','$required_product')";
               $iquery = $con->query($insertquery);
              
                $table="CREATE TABLE $product_name (
                    id INT NOT NULL PRIMARY KEY,
                    rname VARCHAR(70) NOT NULL,
                    price INT NOT NULL,
                    available_quantity INT NOT NULL,
                    required_quantity INT NOT NULL,
                    total_price INT NOT NULL 
                )";
                if($con1->query($table)===true)
                {
                    echo "table";
                }
                  $message="Product is successfully inserted.";
                  echo "<script type='text/javascript'>alert('$message');</script>";
                  header("location:add_raw_material.php");
               }
    ?>
    <center>
    <div class="wrapper">
        <div class="title">
           Add Product
        </div>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
         <div class="field">
                <tr><input type="text" name="product_catagory" required>
                    <label for="product_catagory">Catagory of the product</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="number" name="product_id" min="1" required>
                    <label for="product_id">Id Of the Product</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="product_name" required>
                    <label for="product_name">Name Of the Product</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="price" required>
                    <label for="price">Price Of the Product</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="available_product" required>
                    <label for="available_product">Available Product</label>
                </tr>
            </div>
            <div class="field">
                <tr><input type="text" name="required_product" required>
                    <label for="required_product">Minimum required Product</label>
                </tr>
            </div>
            <div class="field">
                <!-- <tr><button class="btn btn-primary btn-lg"><a href="add_raw_matireal.php" style="text-decoration:none;color:white;">&nbsp;&nbsp;Add raw material&nbsp;&nbsp;</a></button>
                </tr> -->
                <input type="submit" value="Add raw material" name="submit">
            </div>
            <!-- <div class="field">
                <input type="submit" value="Submit" name="submit">
            </div> -->
            <div class="field">
                <input type="reset" value="Reset" name="reset"> 
            </div>
         </form>
         </div>
         </center>
    </body>
</html>