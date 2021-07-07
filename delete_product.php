<?php
session_start();
$table_name=$_SESSION['username'];
if(isset($_POST["pname"]) && !empty($_POST["pname"])){
    require_once "dbcon.php";
    $pname=$_POST["pname"];
    echo $table_name.$pname;
    $sql = "DELETE FROM $table_name WHERE product_name = '$pname'";
    if($stmt = mysqli_prepare($con, $sql)){
        if(mysqli_stmt_execute($stmt)){
            $message="Your data is deleted successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    include 'dbcon1.php';
    $tn=$_SESSION['pname'];
    $table="DROP TABLE $tn";
    if($con1->query($table)===false)
    {
        echo "table";
    }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Record</title>
</head>
<body>
	<div>
		<h1>Delete Record</h1>
	</div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div>
			<input type="hidden" name="pname" value="<?php echo trim($_SESSION["pname"]); ?>"/>
			<p>Are you sure you want to delete this record?</p><br>
			<p>
				<input type="submit" value="Yes">
                <h2>If you want to delete any raw material or don't want to delete any product</h2>
				<a href="delete.php">Click Here</a>
			</p>
		</div>
	</form>
</body>
</html>

