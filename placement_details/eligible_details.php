<?php 
include('C:\xampp\htdocs\placement\templates/header.php'); 
include('C:\xampp\htdocs\placement\config\db_config.php');



$count=$_SESSION['count'];

if(isset($_POST['submit'])){
   $job_id=$_POST['job_id'];

	$qualification=$_POST['cgpa'];
	$skills=$_POST['skills'];
	$skills=explode(',', $skills);

	

	$sql="SELECT * FROM student_details WHERE cgpa >='$qualification'";
	$join="AND";

	foreach ($skills as $skill) {
		$s=$skill;
		$sql=$sql." " . $join." " . "primary_skills"." "."LIKE"." "."'%$s%'"." "."OR";
		$sql=$sql." "."secondary_skills"." "."LIKE"." "."'%$s%'";
		$join="OR";

	}
	
   

	$result=mysqli_query($conn,$sql);
	$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

	

	mysqli_free_result($result);

	
}
if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "elgible"){
 
    update();
   
  
  }
}


function attend_stu($id){
	include('C:\xampp\htdocs\placement\config\db_config.php');
	
	$sql="SELECT * FROM attended_students WHERE attended_id='$id'";

	$result=mysqli_query($conn,$sql);

	GLOBAL $attend;
	$attend=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);

}

?>
<?php if($count==1): ?>
<head><script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
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
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Elgible <b>Details</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="job_details.php" class="btn btn-success" data-toggle="modal"> <span></span></a>
											
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
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
			
				<?php attend_stu($detail['id']); ?>
				<td  id="<?php echo $detail['id']; ?>" >
					
				        <?php if($attend): ?> 
						<?php foreach($attend as $att): ?>

				    	<?php if($att['attended']=='Attended' or $att['attended']=='Not Attended'): ?>
						<p ><?php echo $att['attended']; ?></p>
						<?php else: ?>
						 <button type="button"  name="button" onclick = "demo(<?php echo $detail['id']; ?>,<?php echo $job_id; ?>,'Attended');">Attended</button>
						 

					
					<?php endif ?>
				<?php endforeach; ?> 
				<?php else: ?> 

					<button type="button"  name="button"  onclick = "demo(<?php echo $detail['id']; ?>,<?php echo $job_id; ?>,'Attended');">Attended</button>
					
				<?php endif; ?>
						 
		
				
				</td>
				
		</tr>
		<?php endforeach; ?>

</table>

</div>

      <script type="text/javascript">
      	function demo(id,job_id,value){
      		$(document).ready(function(){
      			$.ajax({
      				url: 'attended_students.php',
      				type:'POST',
      				data:{
      					id: id,
      					job_id: job_id,
      					value: value,
  
      					action: "update"
      				},
      				success:function(response){
      					if(response==1){
      						document.getElementById(id).innerHTML = "Attended";
      						
      					}else{
      						alert("error");
      					}
      				}
      			})
      		})
      	}
      </script>
 
    
</div>
<?php else: ?>
	<p>please login...</p>
<?php endif; ?>

