<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
include('C:\xampp\htdocs\placement\templates/header.php');
if(isset($_POST['submit'])){
	$details=$_POST['details'];

	$query="INSERT INTO scrolling_details(details) VALUES ('$details')";

	if(mysqli_query($conn,$query)){
		echo "uploaded";
	}else{
		echo "error:". mysqli_error($conn);
	}


}
?>
<?php include('header.php'); ?>
    <span><a href="placement_details.php" class="text-dark">Back</a></span>
    </div>

  </header>
<div class="background" style="background-image:url(images/avc.png)"  >
<div class="container register nav_space">
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
                                <!-- <a class="nav-link active" id="home-tab" data-toggle="tab" href="" role="tab" aria-controls="home" aria-selected="true">Home</a> -->
                            </li>
                            <li class="nav-item">
                                <!-- <a class="nav-link" id="profile-tab" data-toggle="tab" href="full_placement_details.php" role="tab" aria-controls="profile" aria-selected="false">view details</a> -->
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <form method="POST" action="scrolling_details.php">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Add Scrolling Details</h3>
                                <div class="row register-form">
                                    <div class="col-md-8">
                                    	
                                
                                        <div class="form-group">
                                            <textarea rows="10" cols="50" name="details">scrolling details...</textarea>
                                        </div>
                                        <button name="submit" class="btn btn-info">submit</button>
</div>
</div>
</div>


	
	
	
</form>