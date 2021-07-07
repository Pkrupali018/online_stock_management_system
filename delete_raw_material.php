<?php
session_start();
$table_name=$_SESSION['tn'];
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])){
    require_once "dbcon1.php";
    $sql = "DELETE FROM $table_name WHERE id = ?";
    if($stmt = mysqli_prepare($con1, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_SESSION["id"]);
        if(mysqli_stmt_execute($stmt)){
            $message="Your data is deleted successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con1);
} else{
    if(empty(trim($_SESSION["id"]))){
        exit();
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
			<input type="hidden" name="id" value="<?php echo trim($_SESSION["id"]); ?>"/>
			<p>Are you sure you want to delete this record?</p><br>
			<p>
				<input type="submit" value="Yes">
				<a href="delete1.php">No</a>
			</p>
		</div>
	</form>
</body>
</html>

