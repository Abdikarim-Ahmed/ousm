<?php 
include('includes/head.php');
$error=''; // Variable To Store Error Message
include('includes/dbcon.php');

//receive user details from the form
if(isset($_POST['submit']))
 {
  $firstname= $_POST['firstname'];
  $lastname= $_POST['lastname'];
  $email= $_POST['email'];
  $type= $_POST['type'];
  $uni= $_POST['uni'];
  $password= $_POST['password'];
  $cpassword= $_POST['cpassword'];
  $encrypt=base64_encode($password);

  $photo=$_FILES["photo"]["name"];

  $location = "photos/". $photo;
  
	$checkdetails=mysqli_query($myconn,"SELECT * FROM user WHERE email= '".$email."'");
	if(mysqli_num_rows($checkdetails) == 1)
	{
		$error ="<p class='danger'>Sorry, email already exists.</p>";	
	}
	else
	{
	 if($password !=$cpassword)
	  {
	      $error ="<p class='danger'>Passwords do not match. Try again.</p>";
	   }
	 else
	  {
	     // insert  details into  table
	      $insert=mysqli_query($myconn,"INSERT INTO user (firstname, lastname, email,password,type, uni, photo)
	      VALUES('$firstname', '$lastname', '$email', '$encrypt','$type','$uni','$photo') ");
	      if($insert && move_uploaded_file($_FILES['photo']['tmp_name'], $location))
	      {
	          header("location:signin.php");
	      }
	      else
	      {
	          $error ="<p class='danger'>Registration failed.</p>";
	      }
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
			<h2 class="heading">Sign Up</h2>
			<?php echo $error; ?><br>
			<form action="" method="post" class="submit-form" enctype="multipart/form-data">
				<label>Firstname</label><br><input type="text" name="firstname" required class="inputs"><br><br>
				<label>Lastname</label><br><input type="text" name="lastname" required class="inputs"><br><br>
				<label>Email Address</label><br><input type="email" name="email" required class="inputs"><br><br>
				<label>Password</label><br><input type="password" name="password" required class="inputs"><br><br>
				<label>Confirm Password</label><br><input type="password" name="cpassword" required class="inputs"><br><br>
				<label>User Type</label> <br>
				<select name="type" required class="inputs">
					<option value="">Choose Type</option>
					<option value="Student">Student</option>
					<option value="Lecturer">Lecturer</option> 
				</select>
				<br><br>	
				<label>College/University</label> <br> <input type="text" name="uni" required class="inputs"><br><br>
				<label>Your Photo</label>
				<input type="file" name="photo"> <br><br>		
				<input type="submit" name="submit" value="Sign Up" class="button">
			</form>
		</section>
	</main>
</body>
</html>

<?php include('includes/footer.php'); ?>