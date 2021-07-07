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
            include 'dbcon.php';
            
           $username=$_SESSION['user'];
           $name=$_GET['product_name'];
           $_SESSION['prname']=$name;
            // if(isset($_POST['submit']))
            // {
            //     echo $_SESSION['prname'];
            //     $_SESSION['pname']=$_SESSION['prname'];
            //     // header("location:veiw_raw_material.php");
            // }
    ?>
    <center>
    <div class="wrapper">
        <div class="title">
           Veiw Product
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
                <tr><input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" >
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
            </div>
            <div class="field">
                <!-- <input type="submit" value="Veiw raw material" name="submit"> -->
                <a href="veiw_raw_material.php?pname=<?php echo $name?>">Veiw raw material</a>
            </div>
         </form>  <?php }  ?>
         </div>
         </center>
    </body>
</html>