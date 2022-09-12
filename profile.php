<?php 

session_start();

include 'config.php';
include 'functions.php';

if (isset($_SESSION['username'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Profile - Student Information System</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    
</head>
<body>

  <?php include 'header.php'; ?>

  <section>

    <div class="container">
      <strong class="title">My Profile</strong>
    </div>
    
    
    <div class="profile-box box-left">

      <?php

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }


        $query = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
        $query_date = "SELECT DATE_FORMAT(std_dob, '%m/%d/%Y') FROM users WHERE username = '".$_SESSION['username']."'";
        $result1 = mysqli_query($conn, $query_date);

          $row1 = mysqli_fetch_row($result1);
        ;

        if($result = mysqli_query($conn, $query)) {

          $row = mysqli_fetch_assoc($result);

          echo "<div class='info'><strong>Student Id:</strong> <span>".$row['std_id']."</span></div>";
          echo "<div class='info'><strong>Student Name:</strong> <span>".$row['std_name']."</span></div>";
          echo "<div class='info'><strong>Gender:</strong> <span>".$row['std_gender']."</span></div>";
          echo "<div class='info'><strong>Date Of Birth:</strong> <span>".$row1[0]."</span></div>";
          echo "<div class='info'><strong>Aadhaar Number:</strong> <span>".$row['std_aadhaar']."</span></div>";
          echo "<div class='info'><strong>Branch:</strong> <span>".$row['std_branch']."</span></div>";
          echo "<div class='info'><strong>Passing Year:</strong> <span>".$row['std_year']."</span></div>";
          echo "<div class='info'><strong>Email Id:</strong> <span>".$row['email']."</span></div>";
          echo "<div class='info'><strong>Ph Number:</strong> <span>".$row['phnum']."</span></div>";

        } else {

          die("Error with the query in the database");

        }

      ?>  

      <div class="options">
        <a class="btn btn-primary" href="editprofile.php">Edit Profile</a>
        <a class="btn btn-success" href="changepassword.php">Change Password</a>
      </div>

    </div>

  </section>

	<script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

<?php


  } else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($conn);

?>