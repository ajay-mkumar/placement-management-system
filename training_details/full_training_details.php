<?php
include('C:\xampp\htdocs\placement\config\db_config.php');



$sql="SELECT * FROM training_details";

$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

if(isset($_POST['submit'])){
	$id=$_POST['id'];

	$sql="DELETE FROM training_details WHERE id='$id'";

	if(mysqli_query($conn,$sql)){
		$message="deleted successfully";
		header('location:full_training_details.php?Msg='.$message);
	}
else{
	echo "error:". mysqli_error($conns);
}
}
mysqli_close($conn);


?>

<?php include('C:\xampp\htdocs\placement\templates\header.php'); ?>


<?php
include('C:\xampp\htdocs\placement\config\sorting.php'); ?>
<head>
  <link rel="stylesheet" type="text/css" href="css/table.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
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



<div class="background" style="background-image:url(avc.png)" >
<div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Training <b>Details</b></h2>
          </div>
          <div class="col-sm-6">
            <div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sort
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" onclick="sortTable(0)">Name</a>
    <a class="dropdown-item" onclick="sortTable(1)">resource person</a>
    <a class="dropdown-item" onclick="sortTable(2)">Date</a>
  </div>
</div>
            
            <!-- <a href="add_training_details1.php" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New Training</span></a> -->
                     <a href="add_training_details1.php" class="btn btn-success"> add new trainings </a> 
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover" id="myTable">
        <thead>
	
		<tr>


	<th>Name of the program: </th>
	<tH>Resource person: </th>
	<th>Date: </th>
	<th>Contact: </th>
	<th>Address: </th>
	<th>Applicable Departments: </th>
	<th>Training for: </th>
  <th>modification</th>

</tr>
</thead>
<tbody>
<?php foreach($details as $detail): ?>
<tr id="<?php echo $detail['id']; ?>">
	<td><?php echo $detail['program_name']; ?></td>
	<td><?php echo $detail['resource_person']; ?></td>
	<td><?php echo $detail['date_of']; ?></td>
	<td><?php echo $detail['contact']; ?></td>
	<td><?php echo $detail['address']; ?></td>
	<td><?php echo $detail['applicable_departments']; ?></td>
	<td><?php echo $detail['training_for']; ?></td>
  <td>
    <form method="POST" action="update_training_details.php">
           <input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
              <button class="edit"  name="update" style="border: none;color: yellow;"><i class="material-icons" style="border: none; background: none;" data-toggle="tooltip" title="Edit"></i></button>
              </form>
              <a class="delete" data-toggle="modal" onclick = "deletedata(<?php echo $detail['id']; ?>)"><i class="material-icons" style="color:red;" data-toggle="tooltip" title="Delete">delete</i></a>
            </td>


<!-- <form action="update_training_details.php" method="POST"> 
	<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
	<input type="submit" name="update" value="update" class="btn btn-info"></td>
</form>-->
</tr>

<?php endforeach; ?>
</div>
<script type="text/javascript">
      function deletedata(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'function.php',
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

