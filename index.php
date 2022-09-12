<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: profile.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: profile.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="description" content="Student Login">
    <meta name="author" content="Reserved by MrShree and Deepthi">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/birds.css">
    <link rel="stylesheet" type="text/css" href="css/trees.css">
    <link rel="stylesheet" type="text/css" href="css/grass.css">
    
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
    <div class="login-div">
    <div class="logo">
        <img src="AKNU_Logo.png" width="100" height="100">
    </div>
    <div class="title">STUDENT LOGIN</div>
    <div class="sub-title">Please Login</div>
    <div class="fields">
    <form action="" method="POST" class="login-email">
			<div class="username">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="username">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
    </div>
    
    <button name="submit" class="signin-button">Login</button>
    <br>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a></p>
		</form>

    <script src="js/vanilla-tilt.min.js"></script>
    <script>
    
    VanillaTilt.init(document.querySelectorAll(".login-div"), {
		max: 9,
		speed: 400
	});

    </script>
    <script src="js/parallax.js"></script>

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