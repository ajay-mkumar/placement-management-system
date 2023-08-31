<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
$company_name=$contact_person=$Contact=$address=$remarks=$email=$job_title='';
$errors=array('company_name'=>'','contact_person'=>'','contact'=>'');
if(isset($_POST['submit'])){

	if(empty($_POST['name'])){
		$errors['company_name']="company name is required";
	}
	if(empty($_POST['contact_person'])){
		$errors['contact_person']="contact Person name is required";
	}
	
	if(empty($_POST['contact'])){
		$errors['contact']="contact is required";
	}

    if(array_filter($errors)){

    }else{
	    $company_name=mysqli_real_escape_string($conn,$_POST['name']);
	    $contact_person=mysqli_real_escape_string($conn,$_POST['contact_person']);
	    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		$remarks=mysqli_real_escape_string($conn,$_POST['remarks']);
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$job_title=mysqli_real_escape_string($conn,$_POST['job_title']);
		$applicable_departments='';
		$check=$_POST['applicable'];
		foreach($check as $ch){
			$applicable_departments.=$ch.',';
		}

		$sql="INSERT INTO placement_details(company_name,contact_person,contact,address,remarks,applicable_departments,email,job_title) VALUES('$company_name','$contact_person','$contact','$address','$remarks','$applicable_departments','$email','$job_title')";

		if(mysqli_query($conn,$sql)){
			$message=urlencode("successfully added details");
			header("location:full_placement_details.php?Message=".$message);
		}else{
			echo "error:" .mysqli_error($conn);
		}

}
}
?>
<?php include('C:\xampp\htdocs\placement\templates/header.php'); ?>
<div style="padding-top: 100px; padding-right: 300px; padding-left: 300px; width: 100%;">
<form method="POST" class="bg-secondary" action="add_placement_details.php" >
	<div class="row g-3">
	<div class="row g-3 ">
		<div class="col-sm-2">
		<label for="name" class="text-white">Name of the company:</label>
		</div>
			<div class="col-md-4">
			<input type="text" class="form-control"  name="name" id="name" value="<?php echo $company_name; ?>">
			<p><?php echo $errors['company_name']; ?></p>
		</div>
		<div class="col-sm-2">
			<label for="contact_person" class="text-white">contact Person:</label>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="contact_person" id="contact_person" value="<?php echo $contact_person; ?>">
			<p><?php echo $errors['contact_person']; ?></p>
		</div>
</div>
	
	<div class="row g-3">
		<div class="col-sm-2">
			<label for="contact" class="text-white">Contact:</label>
		</div>
		<div class="col-md-4">
			<input type="tel" class="form-control" name="contact" id="contact" value="<?php echo $contact_person; ?>">
			<p><?php echo $errors['contact']; ?></p>
		
	</div>
	<div class="col-sm-2">
			<label for="email" class="text-white">Email:</label>
		</div>
		<div class="col-md-4">
			<input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
		</div>
	</div>
	<div class="row g-3">
		<div class="col-sm-2">
			<label for="address" class="text-white">Address of the company:</label>
		</div>
		<div class="col-md-4">
	        <textarea id="address" class="form-control" name="address" rows="3" cols="90"><?php echo $address; ?></textarea>
	    </div>
		<div class="col-sm-2">
	       <label for="remarks" class="text-white">Remarks:</label>
     </div>
     <div class="col-md-4">
			<textarea id="remarks" class="form-control" name="remarks" rows="3" cols="50"><?php echo $remarks; ?></textarea>
		</div>
	</div>
	
	<div class="row g-3">
		<div class="col-sm-2">
			<label for="job_title" class="text-white">Job Title:</label>
		</div>
		<div class="col-md-4">
			<input type="text" class="form-control" name="job_title" id="job_title" value="<?php echo $job_title; ?>">
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
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
	<button type="submit" name="submit" class="btn btn-info align-middle text-center">Add placement</button>
        </div>
 
    </div>
</div>

</form>

</body>
</html>