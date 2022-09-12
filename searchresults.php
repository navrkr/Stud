<?php 

  session_start();

  include 'config.php';
  include 'functions.php';


  if(isset($_SESSION['username'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Search Result - Student Information System</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
    
</head>
<body>

  <?php include 'header.php'; ?>

  <section>

    <?php 

      if(isset($_GET['search'])) {

        $s = clean($_GET['searchbox']);

        $query = "SELECT username, std_name, std_id, std_branch, std_year , std_gender, std_dob
	FROM users WHERE username LIKE '".$s."%' OR std_name LIKE '".$s."%' OR std_branch LIKE '".$s."%' ORDER BY std_id DESC LIMIT 5";
    ?>

    <div class="container">
      <strong class="title">Search results for "<?php echo $s; ?>".</strong>
    <?php

        if($result = mysqli_query($conn, $query)) {

          if(mysqli_num_rows($result) == 0) {

            echo "<p>No results matches to your query.</p>";
            echo "</div>";

          } else {
            echo "</div>";
            echo "<ul class='profile-results'>";

            while($row = mysqli_fetch_assoc($result)) {

          ?>

              <li>
                <div class="result-box box-left">
                  <div class='info'><strong>Username:</strong> <span><?php echo $row['username']; ?></span></div>  
                  <div class='info'><strong>Student Id:</strong> <span><?php echo $row['std_id']; ?></span></div>        
                  <div class='info'><strong>Student Name:</strong> <span><?php echo $row['std_name']; ?></span></div>
                  <div class='info'><strong>Gender:</strong> <span><?php echo $row['std_gender']; ?></span></div>
                  <div class='info'><strong>Date Of Birth:</strong> <span><?php echo $row['std_dob']; ?></span></div>
                  <div class='info'><strong>Branch:</strong> <span><?php echo $row['std_branch']; ?></span></div>
                  <div class='info'><strong>Passing Year:</strong> <span><?php echo $row['std_year']; ?></span></div>
                </div>
              </li>

          <?php

            }

            echo "</ul>";

          }

        } else {
          die("Error with the query");
        }

      }

    ?>
  
    <div class="container">
      <a href="profile.php">Go back to My Profile</a>
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

  mysqli_close($conn);

?>