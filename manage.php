<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(isset($_GET['name']))
{
	$table_name=$_SESSION['username'];
	$_SESSION['name']=$_GET['name'];
	$_SESSION['user']=$table_name;
	header("location:update_product.php");
}
include 'dbcon.php';
include 'main5.php';
$table_name=$_SESSION['username'];
if(isset($_GET['prname']))
{
  $table_name=$_SESSION['username'];
  $pname=$_GET['prname'];
  $_SESSION['pname']=$pname;
  $sql = "DELETE FROM $table_name WHERE product_name = '$pname'";
  if($stmt = mysqli_prepare($con, $sql)){
      if(mysqli_stmt_execute($stmt)){
          $message="Your product is deleted successfully.";
          echo "<script type='text/javascript'>alert('$message');</script>";
		  include 'dbcon1.php';
          $tn=$_SESSION['pname'];
         $table="DROP TABLE $tn";
        if($con1->query($table)===false)
         {
           echo "table";
        }
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
  }
}
if(isset($_GET['pname']))
{
    $_SESSION['pname']=$_GET['pname'];
    header("location:delete1.php");
}
?>
<head>
    <meta charset="UTF-8">
    <title>Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}

.box {
    margin-top:2%;
    display: flex;
    flex-direction: row;
	margin-left:20%;
}
.s1
{
	margin-right:20%;
}
form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
@media only screen and (max-width:600px)
{
   .box
   {
	   display:flex;
	   flex-direction:column;
	   
   }
   .s1
   {
	   margin-bottom:5%;
	   width:80%;
   }
   .s2
   {
	width:80%;
   }
}
</style>

<body>
   
    <div class="box">
        <div class="s1"><form class="example" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" placeholder="Search by product name" name="searchn">
            <button type="submit" name="submitn"><i class="fa fa-search"></i></button>
        </form></div>
        <div class="s2"><form class="example" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" placeholder="Search by catagory" name="searchc">
            <button type="submit" name="submitc"><i class="fa fa-search"></i></button>
        </form></div>
    </div>
    <br><br>
    <?php

$table_name=$_SESSION['username'];
$sql = "SELECT * FROM $table_name";

?>
    <?php
if($result = mysqli_query($con, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<center><div style='overflow-x:auto;'><table border='2' class='table table-striped' style='font-size:large; width:80%;'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th scope='col'>Id</th>";
					echo "<th scope='col'>Product Name</th>";
					echo "<th scope='col'>Product Catagory</th>";
					echo "<th scope='col' colspan='4' style='text-align:center;'>Action</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			if(isset($_POST["submitn"]))
            {
				while($row = mysqli_fetch_array($result))
				{
                    $name=$row['product_name'];
					if($row['product_name']==$_POST['searchn'])
					{
						echo "<tr scope='row'>";
				        echo "<td >" . $row['product_id'] . "</td>";
					    echo "<td >" . $row['product_name'] . "</td>";
					    echo "<td >" . $row['product_catagory'] . "</td>";
					    echo "<td>";
						echo "<a href='manage.php?name=$name'>Update Product</a>";
					echo "</td>";
                    echo "<td>";
                    echo "<a href='veiw.php?product_name=$name'>Veiw Product</a>";
                    echo "</td>";
                    echo "<td>";
						echo "<a href='delete.php?product_name=" . $row['product_name']. "'>Delete Product</a>";
					echo "</td>";
					echo "<td>";
						echo "<a href='delete.php?product_name=" . $row['product_name']. "'>Delete Raw Material</a>";
					echo "</td>";
                        echo "</tr>";
					}
				}
			}
			else if(isset($_POST["submitc"]))
            {
				while($row = mysqli_fetch_array($result))
				{
					if($row['product_catagory']==$_POST['searchc'])
					{
                        $name=$row['product_name'];
						echo "<tr scope='row'>";
				        echo "<td >" . $row['product_id'] . "</td>";
					    echo "<td >" . $row['product_name'] . "</td>";
					    echo "<td >" . $row['product_catagory'] . "</td>";
						echo "<td>";
						echo "<a href='manage.php?name=$name'>Update Product</a>";
					echo "</td>";
                    echo "<td>";
                    echo "<a href='veiw.php?product_name=$name'>Veiw Product</a>";
                    echo "</td>";
                    echo "<td>";
						echo "<a href='manage.php?product_name=" . $row['product_name']. "'>Delete Product</a>";
					echo "</td>";
					echo "<td>";
						echo "<a href='delete.php?product_name=" . $row['product_name']. "'>Delete Raw Material</a>";
					echo "</td>";
                        echo "</tr>";
					}
				}
			}
			else{
			while($row = mysqli_fetch_array($result)){
                $name=$row['product_name'];
				echo "<tr scope='row'>";
				    echo "<td >" . $row['product_id'] . "</td>";
					echo "<td >" . $row['product_name'] . "</td>";
					echo "<td >" . $row['product_catagory'] . "</td>";
					echo "<td><a href='manage.php?name=$name'>Update Product</a>";
					echo "</td>";
                    echo "<td>";
                    echo "<a href='veiw.php?product_name=$name'>Veiw Product</a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='manage.php?prname=".$row['product_name']."'>Delete Product</a>";
                    echo "</td>";
			echo "</td>";
				    echo "<td>";
                    echo "<a href='manage.php?pname=".$row['product_name']."'>Want to Delete any raw material?</a>";
                    echo "</td>";
                echo "</tr>";
			}
		}
			echo "</tbody>";                            
		echo "</table></center></div>";
		mysqli_free_result($result);
	} else{
		echo "<p><em>No records were found.</em></p>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);
?>
</body>

</html>