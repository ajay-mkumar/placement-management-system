<?php
 include('C:\xampp\htdocs\placement\templates/header.php');
include('C:\xampp\htdocs\placement\config\db_config.php');

$department=$_SESSION['department'];


#$sql="SELECT * FROM student_details WHERE branch='$department'";

$sql="SELECT * FROM student_details WHERE branch LIKE '%$department%'";
$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);



mysqli_close($conn);

?>

<?php
 
include('C:\xampp\htdocs\placement\config\sorting.php');
?>
<head>
	<link rel="stylesheet" type="text/css" href="css/table.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>



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
          
            <h2>Student <b>Details</b></h2>
          </div>
          <div class="col-sm-6">
              <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Sort
          </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" onclick="sortTable(0)">Name</a>
    <a class="dropdown-item" onclick="sortTable(1)">register number</a>
    <a class="dropdown-item" onclick="sortTable(2)">department</a>
    <a class="dropdown-item" onclick="sortTable(3)">accademic year</a>
    <a class="dropdown-item" onclick="sortTable(4)">year</a>
  </div>
</div>
            <a href="add_placement_details.php" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Student</span></a>
                      
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover" id="myTable">
        <thead>
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
	</thead>
	<tbody>
		<?php foreach($details as $detail): ?>
		<tr id="<?php echo $detail['id']; ?>">

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
		      <td>
              <!-- <a href="update_student_details.php" class="edit" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Edit"></i></a> -->
              <form method="POST" action="update.php">
                <input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
                <button type="submit" name="update"><i class="material-icons" data-toggle="tooltip" title="Edit"></i></button>
              </form>
              <a class="delete" data-toggle="modal" onclick = "deletedata(<?php echo $detail['id']; ?>);"><i class="material-icons" style="color:red;" data-toggle="tooltip" title="Delete">delete</i></a>
            </td>
		
		
			<!-- <form action="update_student_details.php" method="POST"> 
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="update" class="btn btn-info">update</button></form></td>-->
		
		</tr>
		<?php endforeach; ?>

</table>
</div>
<script type="text/javascript">
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
