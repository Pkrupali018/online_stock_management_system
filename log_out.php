<?php
  session_start();
  include "dbcon.php";
  $name=$_SESSION['username'];
  $table_name="user_info";
  $sql = "DELETE FROM $table_name WHERE username = '$name'";
    if($stmt = mysqli_prepare($con, $sql)){
        if(mysqli_stmt_execute($stmt)){
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    $sql="SELECT * FROM `$name`";
    $stmt1=mysqli_query($con,$sql);
    $rows=mysqli_num_rows($stmt1);
    include "dbcon1.php";
    if($stmt1)
    while($rows--)
    {
        $row=mysqli_fetch_array($stmt1,MYSQLI_ASSOC);
        $raw=$row['product_name'];
        $query="DROP TABLE $raw";
        if($con1->query($query)) // mysqli
        {
            
        }
    }
    $query1="DROP TABLE $name";
    if($con->query($query1))
    {
        $message="You are logged out successfully.";
        echo $message;
        header('location:registration1.php');
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    