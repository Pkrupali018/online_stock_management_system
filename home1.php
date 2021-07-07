<?php
session_start();
 include 'main5.php';
 include 'links.php';
 ?>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Amethysta' rel='stylesheet'>
    <style>
    h2 {
    font-family: 'Amethysta';
    font-size: 22px;
    }
      .main
      {
         display:flex;
         flex-direction:row;
         margin-left:3%;
         margin-top:2%;
      }
      .main1
      {
         font-size:large;
         margin-left:2%;
         margin-top:1%;
      }
      @media screen and (max-width: 600px)
      {
        h2
        {
            width:100%;
        }
      }
    </style>
    
    <!-- <link rel="stylesheet" href="notifications.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
   <div class="main">
      <div class="cal"><i class="far fa-calendar-alt fa-5x center"></i></div>
   <div class="main1"> <?php
    echo "Today is " . date("d/m/Y") . "<br>";
    echo "It's a " . date("l"); ?></div><hr>
   </div>
    <h2>
        <b><center>You must order these products as soon as possible.</b></center>
    </h2>
    
    <h3>
        <hr>
        <div style="overflow-x:auto;">
        <center><table border='2' class='table table-striped' style="width:80%;">
            <tr style="background:#999;">
                <th scope='col'>Product name</th>
                <th scope='col'>Product catagory</th>
                <th scope='col'>Available product</th>
                <th scope='col'>Required product</th>
            </tr>
            <?php

  require_once "dbcon.php";
  include "dbcon1.php";
  $table_name=$_SESSION['username'];
  $sql="SELECT * FROM $table_name";
  if($result=mysqli_query($con,$sql))
  {
     $num_rows=mysqli_num_rows($result);
     if($num_rows==0)
     {
         echo "<center><h3>NO RECORDS ARE FOUND.</h3></center>";
     }
     else{
     while($num_rows--)
     {
         $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
         if($row['available_product'] < $row['required_product'])
         {  ?>
            <tr scope='row'>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['product_catagory']; ?></td>
                <td><?php echo $row['available_product']; ?></td>
                <td><?php echo $row['required_product']; ?></td>
            </tr>
            <?php 
         }
     }
    }
    ?>
        </table></center></div><hr>
        <h2>
           <b> <center>You must order these raw-material as soon as possible.</b>
        </h2>
        </center>
        <h3>
            <hr>
            <div style="overflow-x:auto;">
            <center><table border='2' class='table table-striped' style="width:80%;">
                <tr style="background:#999;">
                    <th scope='col'>Product name</th>
                    <th scope='col'>Raw material name</th>
                    <th scope='col'>Available quantity</th>
                    <th scope='col'>Required quantity</th>
                </tr>
                <?php
  }
  if($result=mysqli_query($con,$sql))
  {
     $num_rows=mysqli_num_rows($result);
     while($num_rows--)
     {
         $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
         $tn=$row['product_name'];
         $sql1="SELECT * FROM $tn";
         if($result1=mysqli_query($con1,$sql1))
         {
            $row1num=mysqli_num_rows($result1);
            if($row1num==0)
     {
         echo "<center><h3>NO RECORDS ARE FOUND.</h3></center>";
     }
     else{
            while($row1num--)
            {
              $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
              if($row1['available_quantity'] < $row1['required_quantity'])
              {  ?>
                <tr scope='row'>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row1['rname']; ?></td>
                    <td><?php echo $row1['available_quantity']; ?></td>
                    <td><?php echo $row1['required_quantity']; ?></td>
                </tr>
                <?php 
               }
            }
        }
         }
      }
  } 

  ?>
        </h3>
        </table></center></div>
</body>

</html>