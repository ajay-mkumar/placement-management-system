<?php 
include("config/db_config.php");
$errors=array('username'=>'','password'=>'','error'=>'');
session_start();
if(isset($_POST['student_login'])){

 	if(empty($_POST['username'])){
			$errors['username'] = 'An username is required';
		} 
	else{
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		}
    if (empty($_POST['password'])) {
    	$errors['password']="password is required";
    }
    else{
 	    $password=mysqli_real_escape_string($conn,$_POST['password']);
 	}

 	if(array_filter($errors)){

 	}
 	else{	
    $_SESSION['name']= $_POST['username'];
       

 	$sql="SELECT * FROM student_login WHERE username='$username'";

 	$result=mysqli_query($conn,$sql);
 	$count  = mysqli_num_rows($result);
 	$_SESSION['count']=$count;
 	
 	if($count>0){
 		$row = mysqli_fetch_array($result);
         $encrypted_password= $row["password"];
         $id=$row["id"];
         $_SESSION['id']=$id;
         $verify=password_verify($password, $encrypted_password);
         
         

 	          if($verify)  
                     {  
 		              header('location:student_homepage.php');
					   
 		          }else{
 	                
 		             $errors='invalid password';
 		
 	}

}else{
	$errors['error']="user doesn't exist";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body>
	
	<div class="limiter" id="lim">
		<!-- <div class="container-login100" > -->
			<div class="wrap-login100" style = "position:relative; left:450px; top:60px">
				<form class="login100-form validate-form" action="student_login.php" method="POST">
					
					

					<span class="login100-form-title p-b-34 p-t-27">
					
						Student Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="student_login">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php echo $errors['username']; ?>

	<?php echo $errors['password']; ?>
	<?php echo $errors['error']; ?>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>