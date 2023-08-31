<?php include('C:\xampp\htdocs\placement\templates/header.php'); 
session_start();
$_SESSION['count']='1';
?>


<div class="position-absolute top-50 start-50 translate-middle">
	<div class="row gx-5">
		<div class="col">
			<ul class="list-group list-group-horizontal bg-secondary">
<li class="list-group-item"><a href="add_student_details.php" class="btn btn-success">Add a strudent detail</a></li>
 <li class="list-group-item"><a href="full_student_details.php" class="btn btn-info">View student details</a></li>
  <li class="list-group-item"><a href="attended_placements.php" class="btn btn-info">Attended placements</a></li>
</ul>
</div> 
</div>
</div>

