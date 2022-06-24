<?php 
include('C:\xampp\htdocs\placement\config\db_config.php');
 include('C:\xampp\htdocs\placement\templates/header.php');
$count=$_SESSION['count'];
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $sql="SELECT * FROM job_details WHERE id='$id'";

    $result=mysqli_query($conn,$sql);

    $details=mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);

    
}
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $job_des=$_POST['job_des'];
    $contact_person=$_POST['contact_person'];
    $cgpa=$_POST['cgpa'];
    $skills=$_POST['skills'];
    $sslc_percent=$_POST['sslc_percent'];
    $hsc_percent=$_POST['hsc_percent'];
    $sql="UPDATE job_details SET job_des='$job_des',contact_person='$contact_person',cgpa='$cgpa',sslc_percent='$sslc_percent',hsc_percent='$hsc_percent',skills='$skills' WHERE id='$id'";

    if(mysqli_query($conn,$sql)){
        $i=urlencode('$id');
        header('location:view_details.php?Id='.$i);
    }
    mysqli_close($conn);
}

?>
<?php if($count==1): 
    include('header.php');?>
    <span>222264</span>
    </div>

  </header>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="background" style="background-image:url(images/avc.png)">
<div class="container register nav_space">
  
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png." alt=""/>
                        <h3>Welcome</h3>
                        <p>A.V.C College Of Engineering</p>
                        
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
                            <form method="POST" action="update_job_details.php">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">update job Details</h3>
                                <div class="row register-form">
                                    <div class="col-md-8">
                                    	<?php foreach($details as $detail): ?>
                                        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>" >
                                        <div class="form-group">
                                            <input type="text" class="form-control"  name="job_des" placeholder="job_des" value="<?php echo $detail['job_des']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="job descrption"/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="contact_person" placeholder="contact person" value="<?php echo $detail['contact_person']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="contact_person"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="cgpa" placeholder="qualification" value="<?php echo $detail['cgpa']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="qualification"/>
                                        </div>
                                         <div class="form-group">
                                            <input type="text" class="form-control"  name="skills" placeholder="skills"  value="<?php echo $detail['skills']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="skills" />
                                        </div>
                                          <div class="form-group">
                                            <input type="text" class="form-control"  name="sslc_percent" placeholder="sslc percent"  value="<?php echo $detail['sslc_percent']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="sslc_percent" />
                                        </div>
                                          <div class="form-group">
                                            <input type="text" class="form-control"  name="hsc_percent" placeholder="hsc percent"  value="<?php echo $detail['hsc_percent']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="hsc_percent" />
                                        </div>
                                         <input type="submit" class="btnRegister" name="submit"  value="update details"/>
                                     </div>
                                 </div>
                             <?php endforeach; ?>
                             </div>
                         </form>
                     </div>
                     <?php else: ?>
    <p>please login...</p>
<?php endif; ?>