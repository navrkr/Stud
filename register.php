<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

$username = "";
$email = ""; 
$std_name=""; 
$phnum=""; 
$std_gender=""; 
$std_aadhaar="";
$std_id=""; 
$std_branch = ""; 
$std_year = "";
$std_dob = "";

if (isset($_POST['submit'])) {
	$std_name = $_POST['std_name'];
   $std_gender = $_POST['std_gender'];
   $std_aadhaar = $_POST['std_aadhaar'];
   $std_id = $_POST['std_id'];
   $std_branch = $_POST['std_branch'];
   $std_year = $_POST['std_year'];
   $std_dob = $_POST['std_dob'];
	$email = $_POST['email'];
   $phnum = $_POST['phnum'];
   $username = $_POST['username'];  
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Enter Valid Email.')</script>";
         }
         else {
         $sql = "SELECT * FROM users WHERE email='$email' or username='$username' or std_aadhaar='$std_aadhaar' or std_id='$std_id' or phnum='$phnum' ";
         $result = mysqli_query($conn, $sql);
         if (!$result->num_rows > 0) {
            if(is_numeric($std_aadhaar) && strlen($std_aadhaar)==12) {
               if(is_numeric($std_id) && strlen($std_id)==12) {
                  if(is_numeric($std_year) && strlen($std_year)==4) {
                     if(is_numeric($phnum) && strlen($phnum)==10) {
                        $sql = "INSERT INTO users (username, email, password, std_name, phnum, std_gender, std_aadhaar, std_id, std_branch, std_year, std_dob)
                              VALUES ('$username', '$email', '$password', '$std_name', '$phnum', '$std_gender', '$std_aadhaar', '$std_id', '$std_branch', '$std_year', '$std_dob')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                           echo "<script>alert('Wow! User Registration Completed.')</script>";
                           $username = "";
                           $email = ""; 
                           $std_name=""; 
                           $phnum=""; 
                           $std_gender=""; 
                           $std_aadhaar="";
                           $std_id=""; 
                           $std_branch = ""; 
                           $std_year = "";
                           $std_dob = "";
                           $_POST['password'] = "";
                           $_POST['cpassword'] = "";                        
                        } else {
                           echo "<script>alert('Woops! Something Wrong Went.')</script>";
                        }
                     } else {
                        echo "<script>alert('Enter Valid Phone Number with 10 digits.')</script>";
                     }
                  } else {
                     echo "<script>alert('Enter Valid Year with 4 digits.')</script>";
                  }
               } else {
                  echo "<script>alert('Enter valid Student Id with 12 digits.')</script>";
               }
            } else {
               echo "<script>alert('Enter valid Aadhaar Number with 12 digits.')</script>";
            }
         } else {
            echo "<script>alert('Either of the Unique Data like email,username,aadhaar no,student id,ph number conflits with previos data, Please Contact Adminstrator.')</script>";
         }	
      }
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="Register Form">
    <meta name="author" content="Reserved by MrShree and Deepthi">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Register Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/birds.css" />
    <link rel="stylesheet" type="text/css" href="css/trees.css" />
    <link rel="stylesheet" type="text/css" href="css/grass.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
    
<body>

    <div class="noSelect">
        

            <div id="scene" class="scene">
                <!-- particles.js container -->
                <div id="particles-js"></div>
                <div data-depth="0.05"><img src="layers/clouds.png" class="layerElement" id="clouds"></div>

                <div data-depth="0.15"><img src="layers/mountains.svg" class="layerElement" id="mountains"></div>
                <div data-depth="0.15"><img src="layers/mountain_middle.svg" class="layerElement" id="mountainMiddle">
                </div>
                <div data-depth="0.2"><img src="layers/hills1.svg" class="layerElement" id="hills1"></div>

                <!-- Leaf Trees in Background-->
                <div data-depth="0.25"><img src="layers/trees/main2.png" class="layerElement tree1a" id="trees1a"></div>
                <div data-depth="0.25"><img src="layers/trees/main2_flip.png" class="layerElement tree1b" id="trees1b">
                </div>
                <div data-depth="0.25"><img src="layers/trees/main2.png" class="layerElement tree1b" id="trees1c"></div>
                <div data-depth="0.25"><img src="layers/trees/main2_flip.png" class="layerElement tree1a" id="trees1d">
                </div>


                <div data-depth="0.3"><img src="layers/hills2.svg" class="layerElement" id="hills2"></div>

                <!-- Back Hill Trees-->
                <div data-depth="0.35"><img src="layers/trees/main.png" class="layerElement tree2a" id="trees2a"></div>
                <div data-depth="0.4"><img src="layers/trees/main_flip2.png" class="layerElement tree2b" id="trees2b">
                </div>
                <div data-depth="0.45"><img src="layers/trees/main_flip.png" class="layerElement tree2c" id="trees2c">
                </div>

                <div data-depth="0.35"><img src="layers/trees/main.png" class="layerElement tree2a" id="trees2h"></div>
                <div data-depth="0.4"><img src="layers/trees/main.png" class="layerElement tree2b" id="trees2i"></div>

                <div data-depth="0.35"><img src="layers/trees/main.png" class="layerElement tree2c" id="trees2j"></div>
                <div data-depth="0.4"><img src="layers/trees/main.png" class="layerElement tree2a" id="trees2k"></div>

                <div data-depth="0.35"><img src="layers/trees/main.png" class="layerElement tree2b" id="trees2l"></div>
                <div data-depth="0.4"><img src="layers/trees/main.png" class="layerElement tree2c" id="trees2m"></div>

                <div data-depth="0.4"><img src="layers/trees/main.png" class="layerElement tree2b" id="trees2n"></div>
                <div data-depth="0.45"><img src="layers/trees/main.png" class="layerElement tree2c" id="trees2o"></div>

                <!-- Middle Hill Center-->
                <div data-depth="0.5"><img src="layers/hills3.svg" class="layerElement" id="hills3"></div>
                <div data-depth="0.5" id="block2"></div>

                <div data-depth="0.55"><img src="layers/trees/main.png" class="layerElement tree2b" id="trees2d"></div>
                <div data-depth="0.55"><img src="layers/trees/main.png" class="layerElement tree2b" id="trees2g"></div>

                <div data-depth="0.55"><img src="layers/trees/main_flip.png" class="layerElement tree2c" id="trees2e">
                </div>
                <div data-depth="0.55"><img src="layers/trees/main_flip2.png" class="layerElement tree2c" id="trees2f">
                </div>

                <!-- Bird-->
                <div data-depth="0.55" class="bird-container bird-container--one">
                    <div class="bird bird--one" id="smallBird"></div>
                </div>


                <!-- Left Hill-->

                <div data-depth="0.8"><img src="layers/trees/main.png" class="layerElement tree3a" id="trees3a"></div>
                <div data-depth="0.8"><img src="layers/trees/main_flip.png" class="layerElement tree3b" id="trees3b">
                </div>
                <div data-depth="0.85"><img src="layers/trees/small2.png" class="layerElement tree3b" id="trees3d">
                </div>
                <div data-depth="0.86"><img src="layers/trees/small2.png" class="layerElement tree3b" id="trees3f">
                </div>
                <div data-depth="0.825"><img src="layers/trees/main_flip2.png" class="layerElement tree3a" id="trees3c">
                </div>
                <div data-depth="0.85"><img src="layers/trees/small2.png" class="layerElement tree4b" id="trees3e">
                </div>

                <!-- Right Hill-->
                <div data-depth="0.75"><img src="layers/hero_hill.svg" class="layerElement" id="heroHill"></div>
                <div data-depth="0.76"><img src="layers/trees/hero_trunk.png" class="layerElement" id="treesHeroTrunk">
                </div>
                <div data-depth="0.77"><img src="layers/trees/hero.png" class="layerElement treeHero" id="treesHero">
                </div>

                <div data-depth="0.8"><img src="layers/trees/dead.svg" class="layerElement" id="treesDead2"></div>

                <div data-depth="0.8"><img src="layers/trees/main.png" class="layerElement tree4a" id="trees4a"></div>
                <div data-depth="0.825"><img src="layers/trees/main_flip2.png" class="layerElement tree4b" id="trees4b">
                </div>
                <div data-depth="0.835"><img src="layers/trees/small1.png" class="layerElement tree4b" id="trees4d">
                </div>
                <div data-depth="0.85"><img src="layers/trees/main_flip.png" class="layerElement tree4c" id="trees4c">
                </div>
                <div data-depth="0.85"><img src="layers/trees/lone1.png" class="layerElement tree4a" id="trees4e"></div>

                <div data-depth="0.85" id="block"></div>

                <div data-depth="0.9">
                    <img src="layers/trees/grass.png" class="layerElement grassClosePlane" id="grass4a">
                </div>
                <div data-depth="0.9">
                    <img src="layers/trees/grass.png" class="layerElement grassClosePlane" id="grass4b">
                </div>
                <div data-depth="0.9">
                    <img src="layers/trees/grass.png" class="layerElement grassClosePlane" id="grass4c">
                </div>
                <div data-depth="0.9">
                    <img src="layers/trees/grass.png" class="layerElement grassClosePlane" id="grass4d">
                </div>

            </div>

        </div>
    </div>
    <div class="container">
    <header>STUDENT REGISTRATION</header>
    <div class="progress-bar">
            <div class="step">
               <p>
                  Personal Details
               </p>
               <div class="bullet">
                  <span>1</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Admission Details
               </p>
               <div class="bullet">
                  <span>2</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Contact Details
               </p>
               <div class="bullet">
                  <span>3</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Account Credentials
               </p>
               <div class="bullet">
                  <span>4</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
         </div>
         <div class="form-outer">
            <form class="myform" action="" method="POST">
               <div class="page slide-page">
                  <div class="field">
                     <div class="label">
                        Name*
                     </div>
                     <input id="1" type="text" name="std_name" value="<?php echo $std_name; ?>" required>
                  </div>
                  <div class="field">
                     <div class="label">
                        Gender*
                     </div>
                     <select name="std_gender" value="<?php echo $std_gender; ?>" >
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                     </select>
                  </div>                
                  <div class="field">
                     <div class="label">
                        Date of Birth*
                     </div>
                     <input id="2" name="std_dob" type="date" value="<?php echo $std_dob; ?>" required>
                  </div>
                  <div class="field">
                     <div class="label">
                        Aadhaar Number*
                     </div>
                     <input id="3" type="text" name="std_aadhaar" minlength="12" maxlength="12" value="<?php echo $std_aadhaar; ?>" required>
                  </div>
                  <div class="field">
                     <button name="next" class="firstNext next" >Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="field">
                     <div class="label">
                        Student Id*
                     </div>
                     <input id="4" type="text" name="std_id" minlength="12" maxlength="12" value="<?php echo $std_id; ?>" required>
                  </div>
                  <div class="field">
                     <div class="label">
                        Branch*
                     </div>
                     <select name="std_branch" value="<?php echo $std_branch; ?>" >
                        <option>Cse</option>
                        <option>It</option>
                        <option>Ece</option>
                        <option>Eie</option>
                        <option>Mech</option>
                        <option>Civil</option>
                     </select>
                  </div>                
                  <div class="field">
                     <div class="label">
                        Year Of Passing*
                     </div>
                     <input id="5" type="text" name="std_year" value="<?php echo $std_year; ?>" required>
                  </div>
                  <div class="field btns">
                     <button class="prev-1 prev">Previous</button>
                     <button name="next1" class="next-1 next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="field">
                     <div class="label">
                        Email Address*
                     </div>
                     <input id="6" type="email" name="email" value="<?php echo $email; ?>" required>
                  </div>
                  <div class="field">
                     <div class="label">
                        Phone Number without country code*
                     </div>
                     <input id="7" type="text" name="phnum" pattern="^[6-9][0-9]{9}$" minlength="10" maxlength="10" value="<?php echo $phnum; ?>" required>
                  </div>
                  <div class="field btns">
                     <button class="prev-2 prev">Previous</button>
                     <button name="next2" class="next-2 next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="field">
                     <div class="label">
                        Username*
                     </div>
                     <input type="text" name="username" value="<?php echo $username;?>" required>
                  </div>
                  <div class="field">
                     <div class="label">
                        Password*
                     </div>
                     <input type="password" name="password" required>
                  </div>
                  <div class="field">
                     <div class="label">
                        Confirm Password*
                     </div>
                     <input type="password" name="cpassword" required>
                  </div>
                  <div class="field btns">
                     <button class="prev-3 prev">Previous</button>
                     <button name=submit class="submit">Submit</button>
                  </div>
               </div>
            </form>
            <p class="login-register-text">Have an account? <a href="index.php">Login Here</a></p>
         </div>
    

    <script src="js/vanilla-tilt.min.js"></script>
    <script>
    
    VanillaTilt.init(document.querySelectorAll(".login-div"), {
		max: 9,
		speed: 400
	});

    </script>
    <script src="js/parallax.js"></script>
    <script src="js/app.js"></script>
    <script src="js/particles.js"></script>
    <script src="js/particles_config.js"></script>

    <script>

        var scene = document.getElementById('scene');
        var parallax = new Parallax(scene, {
        });

        var backgroundColor1 = "#f8c0c3";
        var backgroundColor2 = "#fcd7cf";
        var backgroundColor3 = "#fef0e3";

        function livelyPropertyListener(name, val) {
            switch (name) {
                case "color":
                    //todo: implement
                    break;
                case "backgroundGradient1":
                    backgroundColor1 = val;
                    document.body.style.backgroundColor = val;
                    refreshBackground();
                    break;
                case "backgroundGradient2":
                    backgroundColor2 = val;
                    refreshBackground();
                    break;
                case "backgroundGradient3":
                    backgroundColor3 = val;
                    refreshBackground();
                    break;
                case "clouds":
                    document.getElementById('clouds').style.display = val ? "block" : "none";
                    break;
                case "bird":
                    document.getElementById('smallBird').style.display = val ? "block" : "none";
                    break;
                case "particles":
                    document.getElementById('particles-js').style.display = val ? "block" : "none";
                    break;
            }
        }

        function refreshBackground() {
            document.body.style.backgroundImage = "linear-gradient(to top, " + backgroundColor3 + ",  " + backgroundColor3 + " 55%,  " + backgroundColor2 + " 75%,  " + backgroundColor1 + ")";
        }

    </script>

</body>

</html>