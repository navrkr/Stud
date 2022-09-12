<?php 


	include 'config.php';
	include 'functions.php';

	$s = clean($_GET['s']);

	$query = "SELECT username, std_name, std_id, std_branch, std_year
	FROM users WHERE username LIKE '".$s."%' OR std_name LIKE '".$s."%' OR std_branch LIKE '".$s."%' ORDER BY std_id DESC LIMIT 5";

	if($result = mysqli_query($conn, $query)) {

		if(mysqli_num_rows($result) == 0) {
			echo "<ul><li class='none'>No results to display</li></ul>";
		} else {

			echo "<ul>";

			while($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo "<span class='name'>".$row['username']."</span>";

				echo "<div class='details'>";

				echo "<span><strong>Name: </strong>".$row['std_name']."</span>";
				echo "<span><strong>Student Id: </strong>".$row['std_id']."</span>";
				echo "<span><strong>Branch: </strong>".$row['std_branch']."</span>";
				echo "<span><strong>Yr Passing: </strong>".$row['std_year']."</span>";

				echo "</div></li>";

			}

			echo "</ul>";

		}

	} else {
		die("Error with the query");
	}

	mysqli_close($conn);

?>
