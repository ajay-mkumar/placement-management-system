<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
$errors=array('program_name'=>'','resource_person'=>'','contact'=>'');
if(isset($_POST['submit'])){

	if(empty($_POST['name'])){
		$errors['program_name']="program name is required";
	}
	if(empty($_POST['Resource_person'])){
		$errors['resource_person']="Resource Person name is required";
	}
	
	if(empty($_POST['contact'])){
		$errors['contact']="contact is required";
	}

    if(array_filter($errors)){

    }else{
	    $program_name=mysqli_real_escape_string($conn,$_POST['name']);
	    $resource_person=mysqli_real_escape_string($conn,$_POST['Resource_person']);
	    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
	    $date=mysqli_real_escape_string($conn,$_POST['date']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		$applicable_departments='';
		$check=$_POST['applicable'];
		foreach($check as $ch){
			$applicable_departments.=$ch.',';
		}
		$training_for=mysqli_real_escape_string($conn,$_POST['training_for']);

		$sql="INSERT INTO training_details(program_name,resouce_person,date_of,contact,address,applicable_departments,training_for) VALUES('$program_name','$resource_person','$date','$contact','$address','$applicable_departments','$training_for')";

		if(mysqli_query($conn,$sql)){
			$message= urlencode("successfull added details");
			header('location:full_training_details.php?Message='.$message);
		}else{
			echo "error:" .mysqli_error($conn);
		}

}
}




?>

<?php include('C:\xampp\htdocs\placement\templates/header.php'); ?>
<div style="padding-top: 100px; padding-right: 300px; padding-left: 300px; " >
<form method="POST" action="add_training_details.php">
	<div class="row g-3 bg-secondary">
		<div class="row g-3">
		<div class="col-sm-2">
	<label for="name" class="text-white">Name of the Program:</label>
	</div>
		<div class="col-md-4">
	<input type="text" name="name" id="name" class="form-control"><br>
	<p><?php echo $errors['program_name']; ?></p>
	</div>
	<div class="col-sm-2">
	<label for="Resource_person" class="text-white">Resource Person:</label>
	</div>
		<div class="col-md-4">
	<input type="text" name="Resource_person" id="Resource_person" class="form-control"><br>
	<p><?php echo $errors['resource_person']; ?></p>
</div>
</div>



	<div class="row g-3">
		<div class="row g-3 ">
			<div class="col-sm-2">
		    <label for="date" class="text-white">Date:</label>
	    </div>
		<div class="col-md-4">
	<input type="date" name="date" id="date" class="form-control"><br>

    </div>
		<div class="col-sm-2">
	<label for="contact" class="text-white">contact</label>
	</div>
		<div class="col-md-4">
	<input type="tel" name="contact" id="contact" class="form-control"><br>
	
	</div>	
</div>



	<div class="row g-3">
		<div class="col-sm-2">
	<label for="address" class="text-white">Address:</label>
	</div>
		<div class="col-md-4">
	<textarea id="address" name="address" rows="4" cols="50" class="form-control"></textarea><br>
</div>

<div class="col-sm-2">
	<label class="text-white">Applicable Departments:</label>
</div>
<div class="col-md-4">
	<label for="it">IT</label>
	<input type="checkbox" name="applicable[]" id="it" value="IT">
	<label for="cse">CSE</label>
	<input type="checkbox" name="applicable[]" id="cse" value="CSE">
	<label for="eee">EEE</label>
	<input type="checkbox" name="applicable[]" id="eee" value="EEE">
	<label for="ece">ECE</label>
	<input type="checkbox" name="applicable[]" id="ece" value="ECE">
	<label for="ice">ICE</label>
	<input type="checkbox" name="applicable[]" id="ice" value="ICE">
	<label for="mech">MECH</label>
	<input type="checkbox" name="applicable[]" id="mech" value="MECH">
	<label for="civil">CIVIL</label>
	<input type="checkbox" name="applicable[]" id="civil" value="CIVIL"><br>
	     </div>
	</div>


<div class="row g-3">
		<div class="col-sm-2">
	<label for="10th" class="text-white">training for:</label>
</div>
	<div class="col-md-4">
	<input type="radio" name="training_for" id="interview" value="interview">
	<label for="interview">Interview</label>
	<input type="radio" name="training_for" id="genral" value="genral">
	<label for="genral">Genral</label></div>
	<div class="col-sm-2">
	<button type="submit" name="submit" class="btn btn-primary">Add details</button>
</div>
	
</div>
</div>
</form>
</div>















	
	
	
	
	
	
	
	
	
	