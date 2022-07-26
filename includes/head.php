<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online University Study Materials</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<div class="banner">
		<img src="images/logo.png" class="logo">
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#about">About us</a></li>
				<li><a href="cats.php">Cats</a></li>
				<li><a href="exams.php">Past exam papers</a></li>
				<li><a href="notes.php">Notes</a></li>
				<li><a href="upload.php">upload material</a></li>
				<?php
				if(isset($_SESSION['currentFirstname'])){
					echo "<li><a href='#' style='color:#1991a1;'>".$_SESSION['currentFirstname']."</a></li>";
					echo "<li><a href='signout.php'>Sign Out</a></li>";
				}
				else{
					echo "<li><a href='signin.php'>Sign in</a></li>";
					echo "<li><a href='signup.php'>Sign Up</a></li>";
				}
				?>			
			</ul>
		</nav>
	</div>
</body>
</html>