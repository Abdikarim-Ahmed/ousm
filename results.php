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
		<section class="section"> 			
			<div>
				<section class="notes-sec">
					<h1>Searched Results</h1>
					<?php 
					$search= $_REQUEST['search'];
					$retrieve=mysqli_query($myconn,"SELECT * from note, cat, exam, user where note.title LIKE '{$search}' + cat.title LIKE '{$search}' + exam.title LIKE '{$search}' ");
						if(mysqli_num_rows($retrieve) == 0)
						{
							echo "<h4>No result found!</h4>";
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
										echo "<p class='filename'><a href='examdownload.php?filename=$filename'>".$row['filename']."</a></p>";
									echo "</div>";
								echo "</div>";
							}
						}						  				      
      
					?>					
				</section>
			</div>			
		</section> 

	</main>
</body>
</html>

<?php include('includes/footer.php'); ?>