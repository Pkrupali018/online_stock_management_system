<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
	  table
	  {
		  font-size:20px;
          margin-top:3%;
	  }
    
	</style>
</head>
<body>
<?php
session_start();
include 'dbcon1.php';
include 'main5.php';

$table_name=$_GET['pname'];

$sql = "SELECT * FROM $table_name";
if($result = mysqli_query($con1, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<table border='2' class='table table-striped'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th scope='col'>Id</th>";
					echo "<th scope='col'>Product Name</th>";
					echo "<th scope='col'>Action</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while($row = mysqli_fetch_array($result)){
				$name=$row['rname'];
				echo "<tr scope='row'>";
				    echo "<td >" . $row['id'] . "</td>";
					echo "<td >" . $row['rname'] . "</td>";
					 $_SESSION['name']=$table_name;
					echo "<td>";
						echo "<a href='veiw_raw.php?rawname=$name'>Veiw</a>";
					echo "</td>";
                echo "</tr>";
			}
			echo "</tbody>";                            
		echo "</table>";
		mysqli_free_result($result);
	} else{
		echo "<p><em>No records were found.</em></p>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con1);
}
mysqli_close($con1);
?>
</body>
</html>