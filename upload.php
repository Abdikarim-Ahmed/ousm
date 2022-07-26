<?php 
include('includes/head.php'); 
if(!isset($_SESSION['currentFirstname'])){
	header("location:signin.php");
}
else
{

	$error=''; // Variable To Store Error Message
	include('includes/dbcon.php');

	//receive user details from the form
	if(isset($_POST['submit']))
	 {
	  $title= $_POST['title'];
	  $description= $_POST['description'];
	  $type= $_POST['type'];

	  $filename=$_FILES["material"]["name"];
	  $location = "materials/". $filename;
	  $uploader_id = $_SESSION['currentUploaderId'];

	   // insert  details into  table
	  if($type == "Note"){
	  	$insert=mysqli_query($myconn,"INSERT INTO note (title, filename, description, uploader_id)
	      VALUES('$title', '$filename', '$description', '$uploader_id') ");
	      if($insert && move_uploaded_file($_FILES['material']['tmp_name'], $location))
	      {
	          header("location:notes.php");
	      }
	      else{
		  	$error ="<p class='danger'>Uploading failed.</p>";
		  }
	  }
	  else if($type == "Exam"){
	  	$insert=mysqli_query($myconn,"INSERT INTO exam (title, filename, description, uploader_id)
	      VALUES('$title', '$filename', '$description', '$uploader_id') ");
	      if($insert && move_uploaded_file($_FILES['material']['tmp_name'], $location))
	      {
	          header("location:exams.php");
	      }
	      else{
		  	$error ="<p class='danger'>Uploading failed.</p>";
		  }
	  }
	  else if($type == "Cat"){
	  	$insert=mysqli_query($myconn,"INSERT INTO cat (title, filename, description, uploader_id)
	      VALUES('$title', '$filename', '$description', '$uploader_id') ");
	      if($insert && move_uploaded_file($_FILES['material']['tmp_name'], $location))
	      {
	          header("location:cats.php");
	      }
	      else{
		  	$error ="<p class='danger'>Uploading failed.</p>";
		  }
	  }
	  	      		
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<main>
			<section class="form">
				<div class="contents">
				<h2 class="heading">Upload Material</h2>
				<?php echo $error; ?><br>
				<form action="" method="post" class="submit-form" enctype="multipart/form-data">
					<label>Title</label><br><input type="text" name="title" required class="inputs"><br><br>
					<label>Description</label><br><textarea rows="10" cols="30" class="inputs" name="description"></textarea><br><br>
					<label>Material Type</label> <br>
					<select name="type" required class="inputs">
						<option value="">Choose Type</option>
						<option value="Note">Notes</option>
						<option value="Cat">Cats</option>
						<option value="Exam">Exam Past Paper </option> 
					</select>
					<br><br>
					<label>File</label>
					<input type="file" name="material"> <br><br>		
					<input type="submit" name="submit" value="Upload file" class="button">
				</form>
			</section>
		</main>
	</body>
	</html>

	<?php 
	include('includes/footer.php'); 
}
?>
