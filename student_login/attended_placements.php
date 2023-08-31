<?php 
include('C:\xampp\htdocs\placement\config\db_config.php');
$sql="SELECT * FROM job_details,student_details,attended_students WHERE attended_students.attended='Attended' AND student_details.id=attended_students.attended_id AND job_details.id=attended_students.job_id";

$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);


?>
<?php include('C:\xampp\htdocs\placement\templates/header.php');  ?>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Attended <b>Placements</b></h2>
					</div>
					<div class="col-sm-6">
					
											
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
			<th>skills</th>
			<th>company</th>
			<th>status</th>

		</tr>
	<?php
		foreach($details as $detail):
	$id=$detail['job_id'];
   
    $sql="SELECT * FROM job_details WHERE id='$id'";

    $result=mysqli_query($conn,$sql);

	$students=mysqli_fetch_all($result,MYSQLI_ASSOC);

    foreach($students as $detail): ?>
		<tr>

			<td><?php echo $detail['job_des']; ?></td>
			<td><?php echo $detail['contact_person']; ?></td>
			<td><?php echo $detail['cgpa']; ?></td>
			<td><?php echo $detail['sslc_percent']; ?></td>
			<td><?php echo $detail['hsc_percent']; ?></td>
			
			<td><?php echo $detail['skills']; ?></td>
			<?php $sql="SELECT company_name FROM placement_details,attended_students WHERE placement_details.id=attended_students.job_id"; 
			$result=mysqli_query($conn,$sql);
			$det=mysqli_fetch_array($result);?>
			<td><?php echo $det['company_name']; ?></td>
			<?php $sql="SELECT status FROM student_details,attended_students WHERE student_details.id=attended_students.attended_id"; 
			$result=mysqli_query($conn,$sql);
			$de=mysqli_fetch_array($result);?>
			<?php if ($de['status']=='selected'): ?>
			<td class="bg-info"><?php echo $de['status']; ?></td>
			<?php elseif ($de['status']=='not selected'): ?>
			<td class="bg-danger"><?php echo $de['status']; ?></td>
			<?php else: ?>
			<td class="bg-warning"><?php echo $de['status']; ?></td>
		<?php endif; ?>
		
		</tr>
	<?php endforeach; ?>
	<?php endforeach; ?>
	</table>

</div>
</div>