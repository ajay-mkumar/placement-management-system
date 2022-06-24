<?php 
include('C:\xampp\htdocs\placement\config\db_config.php');
 include('C:\xampp\htdocs\placement\templates/header.php'); 

$count=$_SESSION['count'];
if(isset($_POST['view_details'])){
	$_SESSION['id']=$_POST['view_id'];
	$id=$_SESSION['id'];
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
<span>222264</span>
    </div>

  </header>
<head>
	<style type="text/css">
.background
{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
}</style>
</head>

 <div class="background" style="background-image:url(images/avc.png)" >


<div class="container-xl nav_space">
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
			<th>Elgible candidates</th>
			<th>Modification</th>
		</tr>
		
	 <?php if(isset($_POST['view_details'])): ?> 
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
			<input type="hidden" name="cmp_id" value="<?php echo $detail['job_id']; ?>">
				<input type="hidden" name="cgpa" value="<?php echo $detail['cgpa']; ?>">
				<input type="hidden" name="skills" value="<?php echo $detail['skills']; ?>">
				 <button type="submit" name="submit" class="btn btn-success" >Elgible students</button></form> </td>
				 <td>
				<form action="update_job_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="update"  style="border: none;"><i class="material-icons" style="color:red;" data-toggle="tooltip" title="update">update</i></button> 
			</form>
			<form action="view_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>"> 
				<input type="hidden" name="job_id" value="<?php echo $detail['job_id']; ?>">
				<button type="submit" name="Delete"  style="border: none"><i class="material-icons" style="color:red;" data-toggle="tooltip" title="Delete">delete</i></button>
			</form></td>
		</tr>

	
	<?php endforeach; ?>
	<?php else: ?>
		<?php $id=$_SESSION['id'];
	$sql="SELECT * FROM job_details WHERE job_id='$id'";

	$result=mysqli_query($conn,$sql);

	GLOBAL  $detail;
	$detail=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result); ?>
			<?php foreach($detail as $details): ?>
		<tr>

			<td><?php echo $details['job_des']; ?></td>
			<td><?php echo $details['contact_person']; ?></td>
			<td><?php echo $details['cgpa']; ?></td>
			<td><?php echo $details['sslc_percent']; ?></td>
			<td><?php echo $details['hsc_percent']; ?></td>
			<td><?php echo $details['history_of_arear']; ?></td>
			<td><?php echo $details['no_of_arear']; ?></td>
			<td><?php echo $details['skills']; ?></td>

			<td><form action="eligible_details.php" method="POST">
			<input type="hidden" name="job_id" value="<?php echo $details['id']; ?>">
			<input type="hidden" name="cmp_id" value="<?php echo $details['job_id']; ?>">
				<input type="hidden" name="cgpa" value="<?php echo $details['cgpa']; ?>">
				<input type="hidden" name="skills" value="<?php echo $details['skills']; ?>">
				 <button type="submit" name="submit" class="btn btn-success" >Elgible students</button></form> </td>
				 <td>
				<form action="update_job_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $details['id']; ?>">
				<button type="submit" name="update"  style="border: none;"><i class="material-icons" style="color:red;" data-toggle="tooltip" title="update">update</i></button> 
			</form>
			<form action="view_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $details['id']; ?>"> 
				<input type="hidden" name="job_id" value="<?php echo $details['job_id']; ?>">
				<button type="submit" name="Delete"  style="border: none"><i class="material-icons" style="color:red;" data-toggle="tooltip" title="Delete">delete</i></button>
			</form></td>
		</tr>
		<?php endforeach; ?>

	</div>
<?php endif ?>


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href);
}
</script>
<?php else: ?>
	<p>please login...</p>
<?php endif; ?>
