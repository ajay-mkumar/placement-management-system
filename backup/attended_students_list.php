<?php 
include('C:\xampp\htdocs\placement\config\db_config.php');
$sql="SELECT * FROM student_details,attended_students WHERE attended_students.attended='Attended' AND student_details.id=attended_students.attended_id";

$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);


?>
<?php

$sql="SELECT * FROM job_details,attended_students WHERE job_details.id=attended_students.job_id"; 
$result=mysqli_query($conn,$sql);

$jobdetails=mysqli_fetch_all($result,MYSQLI_ASSOC);?>
	<link rel="stylesheet" type="text/css" href="css/table.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</head>



<!-- <button onclick="sortTable(0)">Name</button> 
<button onclick="sortTable(1)">register number</button>
<button onclick="sortTable(2)">department</button>
<button onclick="sortTable(3)">accademic year</button>
<button onclick="sortTable(4)">year</button> -->
		

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
            <h2>Your <b>Details</b></h2>
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
		<tr >

			<td><?php echo $detail['student_name']; ?></td>
			<td><?php echo $detail['register_num']; ?></td>
			<td><?php echo $detail['branch']; ?></td>
			<td><?php echo $detail['year']; ?></td>
			<td><?php echo $detail['sem']; ?></td>
		    <td><?php echo $detail['cgpa']; ?></td>
        <?php foreach($jobdetails as $jobdetail): ?>
          <td><?php echo $jobdetail['job_des']; ?></td>
          <td><?php echo $jobdetail['contact_person']; ?></td>
        <?php endforeach; ?>
		 <?php if ($detail['status']): ?>
      <td><?php echo $detail['status']; ?></td>
      <?php else: ?>
            <td id="<?php echo $detail['id']; ?>"><button class="bg-info" onclick="demo(<?php echo $detail['id']; ?>,'selected');">selected</button>
            <button class="bg-danger" onclick="demo(<?php echo $detail['id']; ?>,'not selected');">Not selected</button></td>
          <?php endif; ?>
          </tr>
		
		
			<!-- <form action="update_student_details.php" method="POST"> 
				<input type="hidden" name="id" value="<?php //echo $detail['id']; ?>">
				<button type="submit" name="update" class="btn btn-info">update</button></form></td>-->
		
		</tr>
		<?php endforeach; ?>

</table>
</div><script type="text/javascript">
      function deletedata(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'delete_student.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id: id,
              action: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response == 1){
                alert("Data Deleted Successfully");
                document.getElementById(id).style.display = "none";
              }
              else if(response == 0){
                alert("Data Cannot Be Deleted");
              }
            }
          });
        });
      }
      </script>
</div>
      <script type="text/javascript">
      	function demo(id,value){
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
      			})
      		})
      	}
      </script>