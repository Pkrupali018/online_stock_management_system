<?php

//logout.php

include('dbcon.php');


//Destroy entire session data.
session_destroy();
$message="You are logged out successfully.";
        echo "<script type='text/javascript'>alert('$message');</script>";
//redirect page to index.php
header('location:login.php');

?>