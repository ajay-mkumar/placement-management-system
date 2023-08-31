<?php 
include('C:\xampp\htdocs\placement\config\db_config.php');
 include('C:\xampp\htdocs\placement\templates/header.php'); 

$count=$_SESSION['count'];

if(isset('eligible')){
	

	$sql="SELECT * FROM job_details WHERE job_id='$id'";

	$result=mysqli_query($conn,$sql);

	GLOBAL  $details;
	$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);
}
	






?>
<?php if($count==1): ?>
<?php include('header.php'); 
?>




<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Job <b>Details</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="job_details.php" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Job</span></a>
											
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
			<td><form action="eligible_details.php" method="POST">
			<input type="hidden" name="job_id" value="<?php echo $detail['id']; ?>">
				<input type="hidden" name="cgpa" value="<?php echo $detail['cgpa']; ?>">
				<input type="hidden" name="skills" value="<?php echo $detail['skills']; ?>">
				<button type="submit" name="submit" class="btn btn-success" style="border: none"><i class="fa fa-filter" style="font-size: 24px;"></i></button></form>
				<form action="update_job_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="update" class="btn btn-success" style="border: none;"><i class="fa fa-edit" style="font-size: 24px;"></i></button>
			</form>
			<form action="view_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>"> 
				<input type="hidden" name="job_id" value="<?php echo $detail['job_id']; ?>">
				<button type="submit" name="Delete" class="btn btn-success" style="border: none"><i class="material-icons" style="font-size: 24px;">delete</i></button>
			</form></td>
		</tr>
	<?php endforeach; ?>
	</table>

</div>
</div>
<?php else: ?>
	<p>please login...</p>
<?php endif; ?>
