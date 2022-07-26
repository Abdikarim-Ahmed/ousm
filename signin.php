<?php 
include('includes/head.php');

$error=''; // Variable To Store Error Message
include('includes/dbcon.php');

//receive user details from the form
if(isset($_POST['submit']))
{ 
  	$email= $_POST['email']; 
 	$password= $_POST['password']; 
	$encrypt=base64_encode($password);

	$checkdetails=mysqli_query($myconn,"SELECT * FROM user WHERE email= '".$email."' AND password='$encrypt' ");
	if(mysqli_num_rows($checkdetails) == 1)
	{
	  $row=mysqli_fetch_array($checkdetails);
      $firstname=$row['firstname'];
      $id=$row['id'];
      
      $_SESSION['currentFirstname']= $firstname;
      $_SESSION['currentUploaderId']= $id;
	  header("location:index.php");	
	}
	else
	{
	    $error ="<p class='danger'>Either email or password is incorrect.</p>";
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
			<h2 class="heading">Sign In</h2>
			<?php echo $error; ?><br>
			<form action="" method="post" class="submit-form">
				<label>Email Address</label><br><input type="email" name="email" required class="inputs"><br><br>
				<label>Password</label><br><input type="password" name="password" required class="inputs"><br><br>		
				<input type="submit" name="submit" value="Sign In" class="button">
			</form>
		</section>
	</main>
</body>
</html>

<?php include('includes/footer.php'); ?>