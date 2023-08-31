<?php
 include('C:\xampp\htdocs\placement\templates/header.php');
include('C:\xampp\htdocs\placement\config\db_config.php');
$program_name=$resorce_person=$contact=$date=$address='';
$errors=array('program_name'=>'','resource_person'=>'','contact'=>'');
if(isset($_POST['add'])){

	if(empty($_POST['name'])){
		$errors['program_name']="program name is required";
	}
	if(empty($_POST['resource_person'])){
		$errors['resource_person']="Resource Person name is required";
	}
	
	if(empty($_POST['contact'])){
		$errors['contact']="contact is required";
	}

    if(array_filter($errors)){

    }else{
	    $program_name=mysqli_real_escape_string($conn,$_POST['name']);
	    $resource_person=mysqli_real_escape_string($conn,$_POST['resource_person']);
	    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
	    $date=mysqli_real_escape_string($conn,$_POST['date']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		$applicable_departments='';
		$check=$_POST['applicable'];
		foreach($check as $ch){
			$applicable_departments.=$ch.',';
		}
		$training_for=mysqli_real_escape_string($conn,$_POST['training_for']);

		echo $program_name;

		$sql="INSERT INTO training_details(program_name,resource_person,date_of,contact,address,applicable_departments,training_for) VALUES('$program_name','$resource_person','$date','$contact','$address','$applicable_departments','$training_for')";

		if(mysqli_query($conn,$sql)){
			
			header('location:full_training_details.php');
		}else{
			echo "error:" .mysqli_error($conn);
		}

}
}




?>
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
                            <form method="POST" action="add_training_details1.php">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Add Company Details</h3>
                                <div class="row register-form">
                                    <div class="col-md-8">
                                    	
                                
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="name" placeholder="training name" value="<?php echo $program_name; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="resource_person" placeholder="resource person" value="<?php echo $resorce_person; ?>" />
                                        </div>

                                         <div class="form-group">
                                            <input type="date" name="date" class="form-control" placeholder="date" value="<?php echo $date; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="contact" placeholder="contact" value="<?php echo $contact; ?>"/>
                                        </div>
                                         
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="address" placeholder="address"  value="<?php echo $address; ?>" />
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
                                        <div class="form-group">
                                         <div class="maxl">

                                                <label class="radio inline"> 
                                                    <input type="radio" name="training_for" value="interview">
                                                    <span> Interview </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="training_for" value="generak">
                                                    <span>Training </span> 
                                                </label>
                                            </div>
                                        </div>
	                                    <input type="submit" class="btnRegister" name="add"  value="add training"/>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>














	
	
	
	
	
	
	
	
	
	