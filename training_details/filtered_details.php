<?php
include('C:\xampp\htdocs\placement\config\db_config.php');

if(isset($_POST['filter'])){
	$program_name=mysqli_real_escape_string($conn,$_POST['program_name']);
	$resource_person=mysqli_real_escape_string($conn,$_POST['resource_person']);
	
    if(empty($program_name) and empty($resouce_person)){
    	$error=urlencode("Both fields are required");
    	header("location:full_training_details.php?Error=".$error);
    }
    else{
   	$sql="SELECT * FROM training_details WHERE program_name LIKE '$program_name%' AND resouce_person LIKE '$resource_person%'";

	$result=mysqli_query($conn,$sql);

	$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
}
}

?>

<?php include('C:\xampp\htdocs\placement\templates/header.php'); ?>

<?php if($details): ?>
<div class="container">
	<div class="tab">
	<table class="table table-bordered bg-warning">
		<tr>


	<td>Name of the program: </td>
	<td>Resource person: </td>
	<td>Date: </td>
	<td>Contact: </td>
	<td>Address: </td>
	<td>Applicable Departments: </td>
	<td>Training for: </td>

</tr>
<?php foreach($details as $detail): ?>
<tr>
	<td><?php echo $detail['program_name']; ?></td>
	<td><?php echo $detail['resouce_person']; ?></td>
	<td><?php echo $detail['date_of']; ?></td>
	<td><?php echo $detail['contact']; ?></td>
	<td><?php echo $detail['address']; ?></td>
	<td><?php echo $detail['applicable_departments']; ?></td>
	<td><?php echo $detail['training_for']; ?></td>

<td><form action="full_training_details.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
	<input type="submit" name="submit" value="delete" class="btn btn-danger">
</form>
<form action="update_training_details.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
	<input type="submit" name="update" value="update" class="btn btn-info"></td>
</form>
</tr>

<?php endforeach; ?>

<?php else: ?>
	<p>no such record found</p>
<?php endif ?>

