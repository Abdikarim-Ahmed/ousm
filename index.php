<?php 
include('includes/head.php'); 
include('includes/dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<main>
		<section class="section section1">
			<img src="images/showcase.jpg">
			<div>
				<h1>You need study materials? We've got your back! </h1>
				<p>
					Take advantage of these invaluable materials consisting of past examination papers, cats and class notes uploaded by fellow learners.
				</p>
			</div>			
		</section>
		<section class="section section2">
			<div>
				<p>Search here for the document you are looking for</p>
				<form action="results.php" method="post">
					<input type="text" name="search" placeholder="Search this website">
				</form>
			</div>
		</section>
		<section class="section section3"> 
			<h1>Recent Materials</h1>
			<div>
				<section class="sec">
					<h3>Notes</h3>
					<?php 
					$retrieve=mysqli_query($myconn,"SELECT note.*,lastname,photo,uni FROM note inner join user on note.uploader_id=user.id order by id desc");
						if(mysqli_num_rows($retrieve) == 0)
						{
							echo "<h4>No records found!</h4>";
						}
						else{
							while($row=mysqli_fetch_array($retrieve)){
								echo "<div>";
									$photo = "photos/".$row['photo'];
									echo "<img src='$photo'>";
									echo "<div>";						
										echo "<div>";						
											echo "<p class='u_lastname'>By ".$row['lastname']."</p>";
											echo "<p class='school'>".$row['uni']."</p>";
										echo "</div>";
										$filename = "materials/".$row['filename'];
										echo "<p class='filename'><a href='catdownload.php?filename=$filename'>".$row['filename']."</a></p>";
									echo "</div>";
								echo "</div>";
							}
						}						  				      
      
					?>		
					<a href="notes.php">See more</a>
				</section>
				<section class="sec">
					<h3>Cats</h3>
					<?php 
					$retrieve=mysqli_query($myconn,"SELECT cat.*,lastname,photo,uni FROM cat inner join user on cat.uploader_id=user.id order by id desc");
						if(mysqli_num_rows($retrieve) == 0)
						{
							echo "<h4>No records found!</h4>";
						}
						else{
							while($row=mysqli_fetch_array($retrieve)){
								echo "<div>";
									$photo = "photos/".$row['photo'];
									echo "<img src='$photo'>";
									echo "<div>";						
										echo "<div>";						
											echo "<p class='u_lastname'>By ".$row['lastname']."</p>";
											echo "<p class='school'>".$row['uni']."</p>";
										echo "</div>";
										$filename = "materials/".$row['filename'];
										echo "<p class='filename'><a href='catdownload.php?filename=$filename'>".$row['filename']."</a></p>";
									echo "</div>";
								echo "</div>";
							}
						}						  				      
      
					?>	
					<a href="cats.php">See more</a>
				</section>
				<section class="sec">
					<h3>Exam Past Papers</h3>					
					<?php 
					$retrieve=mysqli_query($myconn,"SELECT exam.*,lastname,photo,uni FROM exam inner join user on exam.uploader_id=user.id order by id desc");
						if(mysqli_num_rows($retrieve) == 0)
						{
							echo "<h4>No records found!</h4>";
						}
						else{
							while($row=mysqli_fetch_array($retrieve)){
								echo "<div>";
									$photo = "photos/".$row['photo'];
									echo "<img src='$photo'>";
									echo "<div>";						
										echo "<div>";						
											echo "<p class='u_lastname'>By ".$row['lastname']."</p>";
											echo "<p class='school'>".$row['uni']."</p>";
										echo "</div>";
										$filename = "materials/".$row['filename'];
										echo "<p class='filename'><a href='catdownload.php?filename=$filename'>".$row['filename']."</a></p>";
									echo "</div>";
								echo "</div>";
							}
						}						  				      
      
					?>	
					<a href="exams.php">See more</a>
				</section>
			</div>			
		</section>
		<section class="section section4" id="about">
			<div>
				<h1>About Us</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</section>
		<section class="section section5">
			<div>
				<div>
					<span>400</span>
					<span>Past papers</span>
				</div>
				<div>
					<span>290</span>
					<span>Cats</span>
				</div>
				<div>
					<span>378</span>
					<span>Notes</span>
				</div>
			</div>
		</section>

	</main>
</body>
</html>

<?php include('includes/footer.php'); ?>