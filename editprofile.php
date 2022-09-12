<?php 

  session_start();

  include 'config.php';
  include 'functions.php';

  if(isset($_POST['update'])) {
    $std_name = $_POST['std_name'];
    $std_gender = $_POST['std_gender'];
    $std_aadhaar = $_POST['std_aadhaar'];
    $std_id = $_POST['std_id'];
    $std_branch = $_POST['std_branch'];
    $std_year = $_POST['std_year'];
    $std_dob = $_POST['std_dob'];
	  $email = $_POST['email'];
    $phnum = $_POST['phnum'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Enter Valid Email.')</script>";
   }
   else{
    $query = "UPDATE users SET email='$email', std_name='$std_name', phnum='$phnum', std_gender='$std_gender', std_aadhaar='$std_aadhaar', std_id='$std_id', std_branch='$std_branch', std_year='$std_year', std_dob='$std_dob' WHERE username='".$_SESSION['username']."'";

    if($result = mysqli_query($conn, $query)) {

        $_SESSION['prompt'] = "Profile Updated";
        header("location:profile.php");
        exit;

    } else {

        die("Unique Data Conflit");

    }
    
}}

if (isset($_SESSION['username'])) {
    $qry = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
    $result1 = mysqli_query($conn, $qry);
    $data = mysqli_fetch_array($result1);
    extract($data);

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Edit Profile - Student Information System</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">

</head>
<body>

  <?php include 'header.php'; ?>

  <section>
    
    <div class="container">
      <strong class="title">Edit Profile</strong>
    </div>
    

    <div class="edit-form box-left clearfix">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <div class="form-group">
          <label>User Name:</label>
          
          <?php 
            $query = "SELECT username FROM users WHERE username = '".$_SESSION['username']."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($result);

            echo "<p>".$row[0]."</p>";
          ?>

        </div>

        <div class="form-group">
          <label for="username">Student Name</label>
          <input type="text" class="form-control" name="std_name" value="<?php echo $std_name ?>" placeholder="Student Name" required>
        </div>

        <div class="form-group">
          <label for="std_gender">Gender</label>

          <select class="form-control" name="std_gender">
              <option value="Male" <?php echo $std_gender == 'Male' ? "selected": ""; ?>>Male</option>
              <option value="Female" <?php echo $std_gender == 'Female' ? "selected": ""; ?>>Female</option>
              <option value="Other" <?php echo $std_gender == 'Other' ? "selected": ""; ?>>Other</option>
            </select>

        </div>

        <div class="form-group">
          <label for="std_dob">Date Of Birth</label>
          <input type="date" class="form-control" name="std_dob" value="<?php echo $std_dob ?>" placeholder="Student Date Of Birth" required>
        </div>

        <div class="form-group">
          <label for="std_aadhaar">Student Aadhaar</label>
          <input type="text" class="form-control" name="std_aadhaar" minlength="12" maxlength="12" value="<?php echo $std_aadhaar ?>" placeholder="Student Aadhaar" required>
        </div>

        <div class="form-group">
          <label for="std_id">Student Id</label>
          <input type="text" class="form-control" name="std_id" minlength="12" maxlength="12" value="<?php echo $std_id ?>" placeholder="Student Id" required>
        </div>

        <div class="form-group">
          <label for="std_branch">Branch</label>

          <select class="form-control" name="std_branch">
              <option value="Cse" <?php echo $std_branch == 'Cse' ? "selected": ""; ?>>Cse</option>
              <option value="It" <?php echo $std_branch == 'It' ? "selected": ""; ?>>It</option>
              <option value="Ece" <?php echo $std_branch == 'Ece' ? "selected": ""; ?>>Ece</option>
              <option value="Eie" <?php echo $std_branch == 'Eie' ? "selected": ""; ?>>Eit</option>
              <option value="Mech" <?php echo $std_branch == 'Mech' ? "selected": ""; ?>>Mech</option>
              <option value="Civil" <?php echo $std_branch == 'Civil' ? "selected": ""; ?>>Civil</option>
            </select>

        </div>

        <div class="form-group">
          <label for="std_year">Year Of Passing</label>
          <input type="text" class="form-control" name="std_year" minlength="4" maxlength="4" value="<?php echo $std_year ?>" placeholder="Year Of Passing" required>
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" name="email" value="<?php echo $email ?>" placeholder="Email Address" required>
        </div>

        <div class="form-group">
          <label for="phnum">Phone Number</label>
          <input type="text" class="form-control" name="phnum" pattern="^[6-9][0-9]{9}$" minlength="10" maxlength="10" value="<?php echo $phnum ?>" placeholder="Phone Number" required>
        </div>
        
        <div class="form-footer">
          <a href="profile.php">Go back</a>
          <input class="btn btn-primary" type="submit" name="update" value="Update Profile">
        </div>
        

      </form>
    </div>

  </section>


	<script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

<?php 

  } else {
    header("location:profile.php");
  }

  mysqli_close($conn);

?>