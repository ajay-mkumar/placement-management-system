<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
 include('C:\xampp\htdocs\placement\templates/header.php'); 
$count=$_SESSION['count'];
$department=$_SESSION['department'];

#$sql="SELECT * FROM placement_details WHERE applicable_departments IN ('$department,')";
$sql="SELECT * FROM placement_details WHERE applicable_departments LIKE '%$department%'";
$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);


mysqli_close($conn);
?>

<?php if($count==1): ?>
	<head>
 <!-- 	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
<link rel="stylesheet" type="text/css" href="css/style.css">  
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</head>

<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>-->
  
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Placement <b>Details</b></h2>
					</div>
					<div class="col-sm-6">
						    <!-- <div class="col-sm-6"> -->
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
						<a href="add_placement_details.php" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New placement</span></a>
											
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover"  id="myTable">
				<thead>
					<tr>
				
			<th >Name of the company</th>
			<th>contact person</th>
			<th>Contact</th>
			<th>Address</th>
		    <th>remarks</th>
		    <th>Applicable Departments</th>
		    <th>email</th>
	        <th>modification</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($details as $detail): ?> 
					<tr id="<?php echo $detail['id']; ?>">
		
						
			<td><?php echo $detail['company_name']; ?></td>
			<td><?php echo $detail['contact_person']; ?></td>
			<td><?php echo $detail['contact']; ?></td>
			<td><?php echo $detail['address']; ?></td>
			<td><?php echo $detail['remarks']; ?></td>
			<td><?php echo $detail['applicable_departments']; ?></td>
			<td><?php echo $detail['email']; ?></td>
						<td class="text-center">
							
							<form action="update_placement_details.php" method="POST">
							<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
							<button type="submit" name="update" style="border: none"><i class="material-icons" data-toggle="tooltip" title="Edit"></i></button></form>
							<button class="delete" data-toggle="modal" style="border: none" onclick = "deletedata(<?php echo $detail['id']; ?>);"><i class="material-icons" style="color:red;" data-toggle="tooltip" title="Delete">delete</i></button>
						</td>
					 <td>	  <form action="job_details.php" method="POST" id="form"> 
				<!-- <input type="hidden" name="id" value="<?php //echo $detail['id']; ?>"> -->
			<input type="hidden" name="jobb_id" value="<?php echo $detail['id']; ?>">

			<button type="submit" name="add" style="border: none"><i class="fa fa-plus" style="font-size: 20px;"></i></button> </form>
			

				<form action="view_details.php" method="POST">
				<input type="hidden" name="view_id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="view_details" style="border:  none;"><i class="fa fa-eye" style="font-size:20px"></i></button></form></td>
					</tr>
					<?php endforeach; ?>
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
    <script type="text/javascript">
      function sendid(id){
      	
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'get_id.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              id: id,
              action: "job"
            },
            success:function(response){
          
                //window.location='job_details.php';
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


      <?php else: ?>
      	<p>please login...</p>
      <?php endif; ?>