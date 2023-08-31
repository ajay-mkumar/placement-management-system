<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
$errors=array('program_name'=>'','resource_person'=>'','contact'=>'');
if(isset($_POST['submit'])){
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
        foreach($errors as $err){
            echo $err;
        }

    }else{

    $id=$_POST['id'];
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

        $sql="UPDATE training_details SET program_name='$program_name',resouce_person='$resource_person',date_of='$date',contact='$contact',address='$address',applicable_departments='$applicable_departments',training_for='$training_for' WHERE id='$id'";

        if(mysqli_query($conn,$sql)){
            header('location:full_training_details.php');
        }else{
            echo "error:" .mysqli_error($conn);
        }
    

}
}

if(isset($_POST['update'])){
	$id=$_POST['id'];
	$sql="SELECT * FROM training_details WHERE id='$id'";

	$result=mysqli_query($conn,$sql);

	$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);

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
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="full_training_details.php" role="tab" aria-controls="profile" aria-selected="false">view details</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <form method="POST" action="update_training_details.php">
                            	<?php foreach($details as $detail): ?>
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Update Company Details</h3>
                                <div class="row register-form">
                                    <div class="col-md-8">
                                    	
                               
                                	<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="name" placeholder="training name" value="<?php echo $detail['program_name']; ?>" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="resource_person" placeholder="resource person" value="<?php echo $detail['resouce_person']; ?>" />
                                        </div>

                                         <div class="form-group">
                                            <input type="date" name="date" class="form-control" placeholder="date" value="<?php echo $detail['date_of']; ?>" />
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="contact" placeholder="contact" value="<?php echo $detail['contact']; ?>"/>
                                        </div>
                                         
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="address" placeholder="address"  value="<?php echo $detail['address']; ?>" />
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
	                                    <input type="submit" class="btnRegister" name="submit"  value="update training"/>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>


<?php endforeach; ?>










