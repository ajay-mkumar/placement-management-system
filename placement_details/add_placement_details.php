<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
include('C:\xampp\htdocs\placement\templates/header.php');
$count=$_SESSION['count'];
$company_name=$contact_person=$contact=$address=$remarks=$email=$job_title='';
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
	
		$applicable_departments='';
		$check=$_POST['applicable'];
		foreach($check as $ch){
			$applicable_departments.=$ch.',';
		}
        $date=$_POST['date'];

		$sql="INSERT INTO placement_details(company_name,contact_person,contact,address,remarks,applicable_departments,email,date) VALUES('$company_name','$contact_person','$contact','$address','$remarks','$applicable_departments','$email','$date')";

		if(mysqli_query($conn,$sql)){
			$message=urlencode("successfully added details");
			header("location:view_placement.php?Message=".$message);
		}else{
			echo "error:" .mysqli_error($conn);
		}

}
}
?>
<?php if($count==1): ?>

<?php include('header.php'); ?>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>A.V.C College Of Engineering</p>
                        <!-- <input type="submit" name="" value="Login"/><br/> -->
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="full_placement_details.php" role="tab" aria-controls="profile" aria-selected="false">view details</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <form method="POST" action="add_placement_details.php">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Add Company Details</h3>
                                <div class="row register-form">
                                    <div class="col-md-8">
                                    	
                                
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="name" placeholder="company name" value="<?php echo $company_name; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="contact_person" placeholder="contact person" value="<?php echo $contact_person; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="contact" placeholder="contact" value="<?php echo $contact; ?>"/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="email" placeholder="email" value="<?php echo $email; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="address" placeholder="address"  value="<?php echo $address; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="remarks" placeholder="remarks" value="<?php echo $remarks; ?>" />
                                        </div>
                                           <div class="form-group">
                                            <input type="date" class="form-control"  name="dat"  />
                                        </div>
                                        <div class="form-group">
                                            <div class="maxl">
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
	                                            <input type="checkbox" name="applicable[]" id="civil" value="CIVIL">
	                                        </div>
	                                    </div>
	                                    <input type="submit" class="btnRegister" name="submit"  value="add company"/>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
 <?php else: ?>
    <p>please login...</p>
<?php endif; ?>