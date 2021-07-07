<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Website</title>
	<style>
	 table
	 {
		 font-size:20px;
	 }
	 </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
include 'dbcon1.php';

$table_name=$_SESSION['pname'];
?>

            
<div id="sdk">
<?php
include 'main5.php';
?>
<div style="margin-top:2%;">
<?php
$_SESSION['tn']=$table_name;
$sql = "SELECT * FROM $table_name";
if($result = mysqli_query($con1, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<div style='overflow-x:auto;'><table border='2' class='table table-striped'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th scope='col'>Id</th>";
					echo "<th scope='col'>Raw material name</th>";
					echo "<th scope='col'>Price</th>";
                    echo "<th scope='col'>Available Quantity</th>";
                    echo "<th scope='col'>Required Quantity</th>";
					echo "<th scope='col'>Total Price</th>";
                    echo "<th scope='col'>Operation</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr scope='row'>";
				    echo "<td >" . $row['id'] . "</td>";
					echo "<td >" . $row['rname'] . "</td>";
					echo "<td>" . $row['price'] . "</td>";
					echo "<td>" . $row['available_quantity'] . "</td>";
					echo "<td>" . $row['required_quantity'] . "</td>";
                    echo "<td>" . $row['total_price'] . "</td>";
					$_SESSION['id']=$row['id'];
					echo "<td>";
						echo "<a href='delete1.php?raw_name=" . $row['rname']. "'>Delete raw material</a>";
						echo "&nbsp;";
					echo "</td>";
				echo "</tr>";
			}
			echo "</tbody>";                            
		echo "</table></div>";
		mysqli_free_result($result);
	} else{
		echo "<p><em>No records were found.</em></p>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con1);
}

?>
</div>
</body>
</html>
<?php
if(isset($_GET['raw_name']))
{
	$table_name=$_SESSION['tn'];
	require_once "dbcon1.php";
    $sql = "DELETE FROM $table_name WHERE rname = ?";
    if($stmt = mysqli_prepare($con1, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_name);
        $param_name= trim($_GET['raw_name']);
        if(mysqli_stmt_execute($stmt)){
            $message="Your raw-material is deleted successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";
			error_reporting(E_ERROR | E_PARSE);
			header("location:manage.php");
        } 
		else{
			echo "Oops! Something went wrong. Please try again later.";
        }
    }
} else{
    if(empty(trim($_SESSION["id"]))){
        exit();
    }
}
?>