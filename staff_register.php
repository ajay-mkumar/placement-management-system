<?php
include("config/db_config.php");
if(isset($_POST['submit'])){
	//$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
	//$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	//$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$confirmpassword=$_POST['confirmpassword'];
	$department=mysqli_real_escape_string($conn,$_POST['department']);

   if($password!=$confirmpassword){
   	 echo "password doesn't match";
 }
 else{
	$password=password_hash($password, PASSWORD_DEFAULT);

	//$sql="INSERT INTO admin(firstname,lastname,username,email,password) VALUES('$firstname','$lastname',
	 //'$username','$email','$password')";
	$sql="INSERT INTO staff_login(username,password,department) VALUES('$username','$password','$department')";

	if(mysqli_query($conn,$sql)){
		
 		echo "success";
 	}else{
 		echo "fail to add user";
 	}
 }


 }

?>
<!DOCTYPE html>
<html>
<body>
	<form method="POST" action="staff_register.php">
		<!-- <label for="firstname">First Name</label> 
		<input type="text" name="firstname" id="firstname"><br>
		<label for="lastname">Last Name</label>
		<input type="text" name="lastname" id="lastname"><br>-->
		<label for="username">Username</label>
		<input type="text" name="username" id="username"><br>
		<!-- <label for="email">Email</label>
		<input type="email" name="email" id="email"><br>--> 
		<label for="password">Password</label>
		<input type="password" name="password" id="password"><br>
		<label for="confirmpassword">Confirm Password</label>
		<input type="password" name="confirmpassword" id="confirmpassword"><br>
		<label for="department">department</label>
		<input type="text" name="department" id="department">
		<input type="submit" name="submit" value="register">

	</form>

</body>
</html>