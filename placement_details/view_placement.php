<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
 include('C:\xampp\htdocs\placement\templates/header.php'); 
$count=$_SESSION['count'];


$sql="SELECT * FROM placement_details";

$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);


mysqli_close($conn);
?>

<?php if($count==1): ?>
	<head>
<link rel="stylesheet" type="text/css" href="css/style.css">  
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<!-- <script src="//code.jquery.com/jquery-1.12.0.min.js"></script> -->
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
}
</style>
</head>


      
          <div class="background" style="background-image:url(images/avc.png)" >
         
   
  

        <div class="container-xl">
  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>placement <b>Details</b></h2>
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
           <h2>Today placements</h2>

        <thead>
  
    <tr>
				
			<th>Name of the company</th>
			<th>contact person</th>
			<th>Contact</th>
			<th>Address</th>
		    <th>remarks</th>
		    <th>Applicable Departments</th>
		    <th>email</th>
	        <th>modification</th>
	        <th>job details</th>
					</tr>
				</thead>
				<tbody><?php  $date=date("Y-m-d"); ?>

					<?php foreach($details as $detail):
          if($date==$detail['dat']): ?> 
      

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
					 <td>	 <!--  <form action="d.php" method="POST" >  
				 <input type="hidden" name="id" value="<?php// echo $detail['id']; ?>"> 
			<button type="submit" name="add" style="border: none"><i class="fa fa-plus" style="font-size: 20px;"></i></button> </form>-->
			<form action="job_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="add">add</button>
			</form>

			 <form action="view_details.php" method="POST"> 
				<input type="hidden" name="view_id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="view_details" style="border:  none;"><i class="fa fa-eye" style="font-size:20px"></i></button></form></td>
					</tr>

        <?php endif; ?>
<?php endforeach;?>
</tbody>
</table>
      <table class="table table-striped table-hover" id="myTable">
           <h2>Upcoming placements</h2>
        <thead>
  
    <tr>
        
      <th>Name of the company</th>
      <th>contact person</th>
      <th>Contact</th>
      <th>Address</th>
        <th>remarks</th>
        <th>Applicable Departments</th>
        <th>email</th>
          <th>modification</th>
          <th>job details</th>
          </tr>
        </thead>
        <tbody>
<?php foreach($details as $detail): ?>
<?php if($date<$detail['dat']): ?>
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
              <a class="delete" data-toggle="modal" onclick = "deletedata(<?php echo $detail['id']; ?>)"><i class="material-icons" style="color:red;" data-toggle="tooltip" title="Delete">delete</i></a>
            </td>
           <td>  <!--  <form action="d.php" method="POST" >  
         <input type="hidden" name="id" value="<?php// echo $detail['id']; ?>"> 
      <button type="submit" name="add" style="border: none"><i class="fa fa-plus" style="font-size: 20px;"></i></button> </form>-->
      <form action="job_details.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
        <button type="submit" name="add">add</button>
      </form>

       <form action="view_details.php" method="POST"> 
        <input type="hidden" name="view_id" value="<?php echo $detail['id']; ?>">
        <button type="submit" name="view_details" style="border:  none;"><i class="fa fa-eye" style="font-size:20px"></i></button></form></td>
          </tr>


<?php endif; ?>
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
                console.log(id);
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
      <!-- <script type="text/javascript"> 
      	function det(id){
      		$(document).ready(function(){
     		$.ajax({
     			url: 'view_details.php',
     			type: 'POST',
     			data: {
     				id: id,
     				action: "view"
     			}
     			success:function(response){
     				if(response==1){
     				window.location="view_details.php";
     			}
     			else{
     				alert('lnlm');
     			}
     			}
     		})
     	});
      	}
      </script>-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

      <?php else: ?>
      	<p>please login...</p>
      <?php endif; ?>



