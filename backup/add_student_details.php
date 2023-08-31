<?php
include('C:\xampp\htdocs\placement\config\db_config.php');


$errors=array('student_name'=>'','reg_num'=>'','10th'=>'','12th'=>'','year'=>'');
if(isset($_POST['submit'])){

	if(empty($_POST['name'])){
		$errors['student_name']="student name is required";
	}
	if(empty($_POST['reg_no'])){
		$errors['reg_num']="Register number is required";
	}
	
	if(empty($_POST['10th'])){
		$errors['10th']="10th percentage is required";
	}
	if(empty($_POST['12th'])){
		$errors['12th']="12th percentage is required";
	}



    if(array_filter($errors)){

    }else{
    	$accademic_year=mysqli_real_escape_string($conn,$_POST['accademic-year']);
    	
    
	    $register_num=mysqli_real_escape_string($conn,$_POST['reg_no']);
	    $student_name=mysqli_real_escape_string($conn,$_POST['name']);
	    $sem=mysqli_real_escape_string($conn,$_POST['sem']);
	    $year=mysqli_real_escape_string($conn,$_POST['year']);
		$branch=mysqli_real_escape_string($conn,$_POST['branch']);
		$sslc_percent=mysqli_real_escape_string($conn,$_POST['10th']);
		$hsc_percent=mysqli_real_escape_string($conn,$_POST['12th']);
		$diploma=mysqli_real_escape_string($conn,$_POST['diploma']);
		$CGPA=mysqli_real_escape_string($conn,$_POST['cgpa']);
		$skills=mysqli_real_escape_string($conn,$_POST['skills']);

	

		$sql="INSERT INTO student_details(register_num,student_name,accademic_year,year,branch,sem,sslc_percent,hsc_percent,diploma,cgpa,skills) VALUES('$register_num','$student_name','$accademic_year','$year','$branch','$sem','$sslc_percent','$hsc_percent','$diploma','$CGPA','$skills')";

		if(mysqli_query($conn,$sql)){
			$message=urlencode("successfully added details");
			
			header('location: full_student_details.php?Message='.$message,true,303);
			exit;
			
		}else{
			echo "error:" .mysqli_error($conn);
		}

}
}







?>
<?php include('C:\xampp\htdocs\placement\templates/header.php'); ?>

<div >

	<form action="add_student_details.php" class="bg-secondary" method="POST">
		<div class="row ">
		<div class="row g-3 ">
			<div class="col-sm-2">
		    <label for="datepicker" class="text-white">Year:</label>
	    </div>
		<div class="col-md-4">
			<select name="accademic-year" id="datepicker">
				<option value="2018-2019">2018-2019</option>
				<option value="2019-2020">2019-2020</option>
				<option value="2020-2021">2020-2021</option>
				<option value="2021-2022">2021-2022</option>
				<option value="2022-2023">2022-2023</option>
				<option value="2023-2024">2023-2024</option>
				<option value="2024-2025">2024-2025</option>
				<option value="2025-2026">2025-2026</option>
			</select>

    <p><?php echo $errors['year']; ?></p>
    </div>
		<div class="col-sm-2">
	<label for="reg_no" class="text-white">Reg no:</label><br>
	</div>
		<div class="col-md-4">
	<input type="number" name="reg_no" class="form-control" id="reg_no">
	<p><?php echo $errors['reg_num']; ?></p>
	</div>	
</div>

	<div class="row g-3">
		<div class="col-sm-2">
	<label for="name" class="text-white">Name of the student:</label>
	</div>
		<div class="col-md-4">
	<input type="text" name="name" class="form-control" id="name"><br>
	<p><?php echo $errors['student_name']; ?></p>
	</div>
	<div class="col-sm-2">
	<label for="sem" class="text-white">Sem:</label>
	</div>
		<div class="col-md-4">
	<input type="text" name="sem" class="form-control" id="sem"><br>
</div>
</div>

	<div class="row g-3">
		<div class="col-sm-2">
	<label for="year" class="text-white">Year:</label>
	</div>
		<div class="col-md-4">
	<input type="text" name="year" class="form-control" id="year"><br>
</div>
<div class="col-sm-2">
	<label for="branch" class="text-white">Branch:</label>
</div>
<div class="col-md-4">
	<input type="text" name="branch" class="form-control" id="branch"><br>
</div>
</div>

<div class="row g-3">
		<div class="col-sm-2">
	<label for="10th" class="text-white">10th mark(%):</label>
</div>
	<div class="col-md-4">
	<input type="text" name="10th" class="form-control" id="10th"><br>
	<p><?php echo $errors['10th']; ?></p>
</div>
	<div class="col-sm-2">
	<label for="12th" class="text-white">12th mark(%):</label>
</div>
	<div class="col-md-4">
	<input type="text" name="12th" class="form-control" id="12th"><br>
	<p><?php echo $errors['12th']; ?></p>
</div>
</div>

<div class="row g-3">
		<div class="col-sm-2">
	<label for="diploma" class="text-white">Diploma(%):</label>
</div>
	<div class="col-md-4">
	<input type="text" name="diploma" class="form-control" id="diploma"><br>
</div>
<div class="col-sm-2">
	<label for="cgpa" class="text-white">CGPA:</label>
</div> 
	<div class="col-md-4">
	<input type="number" name="cgpa" class="form-control" id="cgpa"><br>
</div> 
</div>
<div class="row g-3">
		<div class="col-sm-2">
	<label for="skills" class="text-white">Skills:</label>
</div>
	<div class="col-md-4">
	<input type="text" name="skills" class="form-control" id="skills"><br>
</div>
		<div class="row g-3">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
	   <button type="submit" name="submit" class="btn btn-primary">Add student</button>
	</div>
</div>
</div>
</form>
</div>