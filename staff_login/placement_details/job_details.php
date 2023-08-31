<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
include('C:\xampp\htdocs\placement\templates/header.php');

$count=$_SESSION['count'];


$job_des=$contact_person=$cgpa=$skills=$sslc_percent=$hsc_percent=$no_of_arear=$history_of_arear='';
$errors=array('job_des'=>'','contact_person'=>'');

if(isset($_POST['add'])){
    $id=$_POST['id'];
    $_SESSION['add_id']=$id;
    
}


if(isset($_POST['add_details'])){
    $id=$_SESSION['add_id'];
    $job_des=mysqli_real_escape_string($conn,$_POST['job_des']);
    $contact_person=mysqli_real_escape_string($conn,$_POST['contact_person']);

    $cgpa=mysqli_real_escape_string($conn,$_POST['cgpa']);
    $sslc_percent=mysqli_real_escape_string($conn,$_POST['sslc_percent']);
    $hsc_percent=mysqli_real_escape_string($conn,$_POST['hsc_percent']);
    $no_of_arear=mysqli_real_escape_string($conn,$_POST['no_of_arear']);
    $history_of_arear=mysqli_real_escape_string($conn,$_POST['history_of_arear']);
    $skills=mysqli_real_escape_string($conn,$_POST['skills']);

    $sql="INSERT INTO job_details(job_id,job_des,contact_person,cgpa,hsc_percent,sslc_percent,no_of_arear,history_of_arear,skills) VALUES ('$id','$job_des','$contact_person','$cgpa','$hsc_percent','$sslc_percent','$no_of_arear','$history_of_arear','$skills')";

    if(mysqli_query($conn,$sql)){
        header("location:view_details.php");
    }else{
            echo "error:" .mysqli_error($conn);
        }
}


?>


<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>A.V.C College Of Engineering</p>
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="view_details.php" role="tab" aria-controls="profile" aria-selected="false">view details</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <form method="POST"  action="insert_job.php" id="myform">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Add Job Details</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    	
                                
                                        <div class="form-group">

	
	        <input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="text" class="form-control"  name="job_des"  value="<?php echo $job_des; ?>" placeholder="job descrption">
			 <p><?php echo $errors['job_des']; ?></p> 
		</div>
		<div class="form-group">
			
			<input type="text" class="form-control" name="contact_person"  value="<?php echo $contact_person; ?>" placeholder="contact person">
			 <p><?php echo $errors['contact_person']; ?></p>
		</div>

			<div class="form-group">
				 <p>Eligiblity criteria</p> 
			<input type="text" class="form-control"  name="cgpa"  value="<?php echo $cgpa; ?>" placeholder="cgpa">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="sslc_percent"  value="<?php echo $sslc_percent; ?>" placeholder="10th percentage">
</div>
<div class="form-group">
			<input type="text" class="form-control" name="hsc_percent"  value="<?php echo $hsc_percent; ?>" placeholder="12th percentage">
</div>
</div>
        <div class="col-md-6">
<div class="form-group">
			<input type="text" class="form-control" name="no_of_arear"  value="<?php echo $no_of_arear; ?>" placeholder="No of Arears">
</div>
<div class="form-group">
			<input type="text" class="form-control" name="history_of_arear"  value="<?php echo $history_of_arear; ?>" placeholder="History of Arears">
</div>

		<div class="form-group">
			<input type="text" class="form-control" name="skills"  value="<?php echo $skills; ?>" placeholder="skills">
</div>
	
		
		
        <input type="submit" class="btnRegister" name="add_details" id="insert"  value="Add details"/>
                                         </div>

<script type="text/javascript">
	$('#myform').submit(function(){
 return false;
});
 
$('#insert').click(function(){
 $.post( 
 $('#myform').attr('action'),
 $('#myform :input').serializeArray(),
 success:function(result){
 	if(result==1){
 window.location='view_details.php';
}
 }
 );
});
</script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>