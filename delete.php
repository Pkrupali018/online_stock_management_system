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
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;
}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #f44336;
}

/* Add padding and center-align text to the container */
.container {
  padding: 40px;
  text-align: center;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 80%; /* Full width */
  height: 80%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<?php
include 'dbcon.php';
include 'main1.php';
session_start();
$table_name=$_SESSION['username'];
if(isset($_GET['product_name']))
{
    // $_SESSION['pname']=$_GET['product_name'];
    // header("location:delete_product.php");
	
}
$sql = "SELECT * FROM $table_name";
if($result = mysqli_query($con, $sql)){
	if(mysqli_num_rows($result) > 0){
		echo "<table border='2' class='table table-striped'>";
			echo "<thead>";
				echo "<tr>";
					echo "<th scope='col'>Id</th>";
					echo "<th scope='col'>Product Name</th>";
					echo "<th scope='col'>Product Category</th>";
                    echo "<th scope='col'>Price</th>";
                    echo "<th scope='col'>Available Quantity</th>";
                    echo "<th scope='col'>Required Quantity</th>";
                    echo "<th scope='col'>Operation on product</th>";
                    echo "<th scope='col'>Operation on raw material</th>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr scope='row'>";
				    echo "<td >" . $row['product_id'] . "</td>";
					echo "<td >" . $row['product_name'] . "</td>";
					echo "<td>" . $row['product_catagory'] . "</td>";
					echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['available_product'] . "</td>";
                    echo "<td>" . $row['required_product'] . "</td>";
					echo "<td>";?>
						<button onclick="document.getElementById('id01').style.display='block'"><a href="delete.php?product_name='<?php $row['product_name']?>'">Delete Product</a></button>
						<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <center><h1>Delete Product</h1>
      <p>Are you sure you want to delete your Product?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button></center>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
			<?php
			echo "</td>";
				    echo "<td>";
                    echo "<a href='delete1.php?pname=".$row['product_name']."'>Want to Delete any raw material?</a>";
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
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
mysqli_close($con);
?>
</body>
</html>