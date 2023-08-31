<?php 
include('C:\xampp\htdocs\placement\config\db_config.php');
 include('C:\xampp\htdocs\placement\templates/header.php'); 

$count=$_SESSION['count'];

function read($cgpa,$primary_skills,$secondary_skills){
	global $conn;
	

	$sql="SELECT * FROM job_details WHERE cgpa<='$cgpa' AND skills LIKE '%$primary_skills%' OR skills LIKE '%$secondary_skills%'";

	$result=mysqli_query($conn,$sql);

	GLOBAL  $details;
	$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);
}
	

$id=$_SESSION['id'];
$sql="SELECT * FROM student_details,student_login WHERE st_id='$id'";
$result=mysqli_query($conn,$sql);

$students=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($students as $student){
	$cgpa=$student['cgpa'];
	$primary_skills=$student['primary_skills'];
	$secondary_skills=$student['secondary_skills'];
}
echo $cgpa;
read($cgpa,$primary_skills,$secondary_skills);




?>
<?php if($count==1): 
	include('header.php'); ?>





<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Job <b>Details</b></h2>
					</div>
					<div class="col-sm-6">
						<!-- <a href="job_details.php" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span></span></a> -->
											
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
			<th>job des</th>
			<th>contact person</th>
			<th>cgpa</th>
			<th>sslc pecentage</th>
			<th>hsc percentage</th>
			<th>history of arears</th>
			<th>No of arears</th>
			<th>skills</th>
		</tr>
		<?php foreach($details as $detail): ?>
		<tr>

			<td><?php echo $detail['job_des']; ?></td>
			<td><?php echo $detail['contact_person']; ?></td>
			<td><?php echo $detail['cgpa']; ?></td>
			<td><?php echo $detail['sslc_percent']; ?></td>
			<td><?php echo $detail['hsc_percent']; ?></td>
			<td><?php echo $detail['history_of_arear']; ?></td>
			<td><?php echo $detail['no_of_arear']; ?></td>
			<td><?php echo $detail['skills']; ?></td>
			<td>
				

			</td>
		</tr>
	<?php endforeach; ?>
	</table>

</div>
</div>
<?php else: ?>
	<p>please login...</p>
<?php endif; ?>
