<?php
  require_once "dbcon.php";
?>
<html>

<head>
  <link href='https://fonts.googleapis.com/css?family=Alegreya SC' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/81ac83e5bf.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="style_ratings.css"> -->
  <style>
    .ratings {
      position: relative;
      transform: rotateY(180deg) translate(50%, 0%);
      display: flex;
      width: 100px;
      height: 100px;
      left: 110%;

    }

    .ratings label {
      display: block;
      cursor: pointer;
      width: 50px;
      /* background: #ccc; */
    }

    .ratings label:before {
      content: '\f005';
      font-family: fontAwesome;
      position: relative;
      display: block;
      font-size: 50px;
      color: rgb(243, 234, 234);
      border-width: 5%;
      /* margin: 15px; */
      text-shadow: 0 5px 2px rgb(0, 0, 0);
      margin-left:1%;
      margin-top:60%;
    }

    .ratings label:after {
      content: '\f005';
      font-family: fontAwesome;
      position: absolute;
      display: block;
      font-size: 50px;
      color: yellow;
      /* margin: 15px; */
      margin-left:1%;
      margin-top:30%;
      top: 0;
      opacity: 0;
      transition: 0.5s;
      text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    }

    .ratings label:hover:after,
    .ratings label:hover~label:after,
    .ratings input:checked~label:after {
      opacity: 1;
    }

    button {
      background-color: rgb(15, 15, 15);
      color: white;
      border: 1px;
    }

    .main {
      display: flex;
      flex-direction: row;
      background-size: contain;
      width: 100%;
      /* opacity: 0.1; */
    }

    /* i {
      padding: 25px;
      color: Black;
      width: 45px;
      text-align: center;
      height: fit-content;
      margin-right: 3%;
    } */

    /* div {
      height: 40%;
    } */

    /* .submit_r {
      height:200000px;
      width: 20%;
      margin-left: 87%;
      font-size: larger;
      background-color: rgb(15, 15, 15);
      color: white;
      border: 1px;
      margin-top:15%;
      border-radius: 10px;
      height: 40%;
      padding-left: 5px;
      padding-right: 5px;
    } */

    .submit_r:hover {
      background-color: #999;
      color: black;
    }

    .form_ {
      width: 50%;
      margin-right: 100px;
      background-size: cover;
      z-index: 1;
      /* margin-top: 10%; */
    }

    .other_comments {
      /* color:blanchedalmond; */
      font-size: large;
      z-index: 2;
    }

    .o_comment {
      background-color: beige;
      width: 500px;
      text-align: center;
    }

    #c_star {
      color: rgb(155, 155, 10);
      text-shadow: 2px;
      padding-left: 0%;
    }

    #star1 {
      margin-left: 400px;
    }
    .main{
      background-color:rgb(172, 238, 167);
    }

    @media screen and (min-width:600px){
        .submit_r{
          background-color: black;
          color: white;
            padding-top:1%;
            padding-bottom:1%;
            height: 70%;
            margin-top:3%;
            margin-left:80%;
            margin-bottom:5%;
            width:40%;
        }
       
    }

    @media screen and (max-width:600px) {

      .ratings {
        left: 120%;
      }

      .submit_r {
        /* width: 100px;
        font-size: xx-large; */
        /* margin-left: 87%; */
        /* font-size: larger; */
        background-color: black;
        color: white;
        border: 1px;
        /* margin-top:15%; */
        border-radius: 10px;
        margin-left:50%;
        width:100%;
        margin-top:5%;
        margin-bottom:5%;
        padding-top: 3%;
        padding-bottom: 3%;
      }
      .ratings label:before {
        margin-left:-100%;
      }
      .ratings label:after {
        margin-left:-50%;
      }
    }
  </style>
</head>

<body>
  <div class="main">
    <div class="form_">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="ratings">
          <input type="radio" name="star" id="star1" value="5" style="display : none;" required><label
            for="star1"></label>&nbsp&nbsp
          <input type="radio" name="star" id="star2" value="4" style="display : none;"><label
            for="star2"></label>&nbsp&nbsp
          <input type="radio" name="star" id="star3" value="3" style="display : none;"><label
            for="star3"></label>&nbsp&nbsp
          <input type="radio" name="star" id="star4" value="2" style="display : none;"><label
            for="star4"></label>&nbsp&nbsp
          <input type="radio" name="star" id="star5" value="1" style="display : none;"><label for="star5"></label>
        </div>
        <div>
          <input type="submit" class="submit_r" name="submit_r" value="Give Ratings">
        </div>
      </form>
    </div>
    <?php
        if(isset($_POST['submit_r']))
        {
          $rating=$_POST['star'];
          $sql="INSERT INTO `ratings`(`ratings`) VALUES ('$rating')";
          mysqli_query($con,$sql);
        }
      ?>

</body>
</div>

</html>