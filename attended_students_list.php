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
include('header.php');

$count=$_SESSION['count'];?>
<?php if($count==1): 
?>
<?php
$sql="SELECT * FROM job_details,attended_students WHERE job_details.id=attended_students.job_id";  
$result=mysqli_query($conn,$sql);

$jobdetails=mysqli_fetch_all($result,MYSQLI_ASSOC); ?>
<?php 
$sql="SELECT * FROM placement_details,attended_students WHERE placement_details.id=attended_students.cmp_id";
$result=mysqli_query($conn,$sql);
$cmp_details=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<span><a href="accademic_year.php" class="text-dark">Back</a></span>
    </div>

  </header>
<!-- <head> 
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>-->
<div class="background" style="background-image:url(images/avc.png)"  >

<div class="container-xl nav_space">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Attended <b>Details</b></h2>
          </div>
          <div class="col-sm-6">
            <!-- <a href="add_placement_details.php" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Training</span></a> -->
                      
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
           <th>Attended company</th>
          <th>job descrption</th>
       
          <th>Resource person</th>
          <th>status</th>
          <th>result</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($details as $detail): ?>
    <tr id="list">
     
              <td> <?php echo $detail['student_name'] ?></td>
              
        <td> <?php echo $detail['register_num']; ?></td>
        <td> <?php echo $detail['branch']; ?></td>
      
        <td> <?php echo $detail['year']; ?></td>
        <td> <?php echo $detail['sem']; ?></td>
        <?php foreach($cmp_details as $cd): ?>
          <td><?php echo $cd['company_name']; ?></td>
        <?php endforeach; ?>
        <?php foreach($jobdetails as $jd): ?>
        <td> <?php echo $jd['job_des']; ?></td>
        <td> <?php echo $jd['contact_person']; ?></td>
        <?php endforeach; ?>
        
      <td id="<?php echo $detail['st_id']; ?>">
      <?php if ($detail['status']): ?>
       <?php echo $detail['status'] ?>
      <?php else: ?>
        Bending</td>
        <?php endif; ?>
            <td ><button class='btn btn-info'  onclick="demo(<?php echo $detail['st_id']; ?>,'selected');">selected</button>   <button class='btn btn-danger' onclick="demo(<?php echo $detail['st_id']; ?>,'not selected');">Not selected</button></td>
         
    
          </tr>
    </tr>
  <?php endforeach; ?>
  
<?php endif; ?>
 <script type="text/javascript">
        function demo(id,value){
         console.log(value);
          $(document).ready(function(){
            $.ajax({
              url: 'status.php',
              type:'POST',
              data:{
                id: id,
                value: value,
                action: "update"
              },
              success:function(response){
                if(response==1){
                  document.getElementById(id).innerHTML = value;

                
                }else{
                  alert("error");
                }
              }
            });
          });
        }
      </script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</tbody>
</table>
</div>
</div>
</div>