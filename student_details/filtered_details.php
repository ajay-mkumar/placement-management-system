<?php
include('C:\xampp\htdocs\placement\config\db_config.php');

if(isset($_POST['filter'])){
	$student_name=mysqli_real_escape_string($conn,$_POST['student_name']);
	$department=mysqli_real_escape_string($conn,$_POST['department']);
	
    if(empty($student_name) and empty($department)){
    	$error=urlencode("Both fields are required");
    	header("location:full_student_details.php?Error=".$error);
    }
    else{
   	$sql="SELECT * FROM student_details WHERE student_name LIKE '$student_name%' AND branch LIKE '$department%'";

	$result=mysqli_query($conn,$sql);

	$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
}
}

?>

<?php include('C:\xampp\htdocs\placement\templates/header.php'); 
if($details): ?>
	<div class="container">
	<div class="tab">
	<table class="table table-bordered bg-warning">
		<tr>
			<th>Name of the Student</th>
			<th>Register Number</th>
			<th>Department</th>
			<th>Accademic Year</th>
		    <th>Year</th>
		    <th>sem</th>
		    <th>1oth percentage</th>
	        <th>12th percentage</th>
	        <th>diplpoma</th>
	        <th>cgpa</th>
		</tr>
		<?php foreach($details as $detail): ?>
		<tr>

			<td><?php echo $detail['student_name']; ?></td>
			<td><?php echo $detail['register_num']; ?></td>
			<td><?php echo $detail['branch']; ?></td>
			<td><?php echo $detail['accademic_year'];?></td>
			<td><?php echo $detail['year']; ?></td>
			<td><?php echo $detail['sem']; ?></td>
			<td><?php echo $detail['sslc_percent']; ?></td>
			<td><?php echo $detail['hsc_percent']; ?></td>
		    <td><?php echo $detail['diploma']; ?></td>
		    <td><?php echo $detail['cgpa']; ?></td>
			<td><form action="full_student_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="submit" class="btn btn-danger">delete</button></form>
			<form action="update_student_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="update" class="btn btn-info">update</button></form></td>
		
		</tr>
		<?php endforeach; ?>

</table>
</div>
</div>
<?php else: ?>
	<p>no record found</p>
<?php endif; ?>
