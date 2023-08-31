<?php
include('C:\xampp\htdocs\placement\templates/header.php');
include('C:\xampp\htdocs\placement\config\db_config.php');
$count=$_SESSION['count'];
$errors=array('company_name'=>'','contact_person'=>'','contact'=>'');
$company_name=$contact_person=$contact=$address=$remarks=$email=$job_title=$applicable_departments='';

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

    	$id=$_POST['id'];
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

		$sql="UPDATE placement_details SET company_name='$company_name',contact_person='$contact_person',contact='$contact',address='$address',remarks='$remarks',applicable_departments='$applicable_departments',email='$email',job_title='$job_title' WHERE id='$id'";

		if(mysqli_query($conn,$sql)){
			header('location:full_placement_details.php');
		}else{
			echo "error:" .mysqli_error($conn);
		}
			}

}

if(isset($_POST['update'])){
	$id=$_POST['id'];
	$sql="SELECT * FROM placement_details WHERE id='$id'";

	$result=mysqli_query($conn,$sql);

	$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);

}


?>
<?php if($count==1): ?>

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
                            <form method="POST" action="update_placement_details.php">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Add Company Details</h3>
                                <div class="row register-form">
                                    <div class="col-md-8">
                                    	<?php foreach ($details as $detail): ?>
                                    		
                                           <input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
                                        <div class="form-group">

                                            <input type="text" class="form-control"  name="name" placeholder="company name" value="<?php echo $detail['company_name']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="company name"/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="contact_person" placeholder="contact person" value="<?php echo $detail['contact_person']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="contact person"/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="contact" placeholder="contact" value="<?php echo $detail['contact']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="contact"/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="email" placeholder="email" value="<?php echo $detail['email']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="email"/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="address" placeholder="address"  value="<?php echo $detail['address']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="address"/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="remarks" placeholder="remarks" value="<?php echo $detail['remarks']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="remarks"/>
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
                                     <?php endforeach; ?>
                                     </div>
                                 </div>
                             </form>
                         </div>
 <?php else: ?>
    <p>please login...</p>
<?php endif; ?>