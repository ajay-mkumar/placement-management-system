<?php 
include('C:\xampp\htdocs\placement\config\db_config.php');

if(isset($_POST['submit'])){

  $yr=$_POST['accademic_year'];
  $query="SELECT * FROM student_details,attended_students WHERE attended_students.attended='Attended' AND student_details.id=attended_students.attended_id AND student_details.accademic_year='$yr'";

  $result=mysqli_query($conn,$query);
  $details=mysqli_fetch_all($result,MYSQLI_ASSOC);


}

?>
<?php include('C:\xampp\htdocs\placement\templates/header.php'); 
$count=$_SESSION['count'];?>
<?php if($count==1): 
?>
<?php
$sql="SELECT * FROM job_details,attended_students WHERE job_details.id=attended_students.job_id";  
$result=mysqli_query($conn,$sql);

$jobdetails=mysqli_fetch_all($result,MYSQLI_ASSOC); ?>

	<div class="position-absolute top-0 start-50 translate-middle-x">  
<form method="POST" action="full_student_details.php">

  
</div>
</form>
</div>
<div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Attended <b>Details</b></h2>
          </div>
          <div class="col-sm-6">
            <a href="add_placement_details.php" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Training</span></a>
                      
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover" id="myTable">
        <thead>
    <tr>
      <th>Name of the Student</th>
      <th>Register Number</th>
      <th>Department</th>
  
        <th>Year</th>
        <th>sem</th>
          <th>cgpa</th>
          <th>Attended company</th>
          <th>Resource person</th>
          <th>status</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($details as $detail): ?>
    <tr id="list">
      <tr>
              <td> <?php echo $detail['student_name'] ?></td>
        <td> <?php echo $detail['register_num']; ?></td>
        <td> <?php echo $detail['branch']; ?></td>
        <td> <?php echo $detail['accademic_year']; ?></td>
        <td> <?php echo $detail['year']; ?></td>
        <td> <?php echo $detail['sem']; ?></td>
        <td> <?php echo $detail['sslc_percent']; ?></td>
        <td> <?php echo $detail['hsc_percent']; ?></td>
        <td> <?php echo $detail['diploma']; ?></td>
        <td> <?php echo $detail['cgpa']; ?></td>
        <?php if ($detail['status']): ?>
      <td> <?php echo $detail['status'] ?></td>
      <?php else: ?>
            <td id="$detail['id']"><button class='bg-info' onclick="demo($detail['id'],'selected');">selected</button>
            <button class='bg-danger' onclick="demo($detail['id'],'not selected');">Not selected</button></td>
          <?php endif; ?>
      
          </tr>
    </tr>
  <?php endforeach; ?>
  <?php endif; ?>



</tbody>
</table>
</div>
</div>
</div>