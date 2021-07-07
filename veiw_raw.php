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
            
           $tname=$_GET['rawname'];
    ?>
    <center>
    <div class="wrapper">
        <div class="title">
           Veiw Raw Material
        </div>
        <?php
           $pro_name=$_SESSION['name'];
           $sql="SELECT * FROM $pro_name WHERE rname='$tname'";
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
         </form>  <?php }  ?>
         </div>
         </center>
    </body>
</html>