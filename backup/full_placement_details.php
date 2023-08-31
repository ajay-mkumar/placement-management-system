<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
$count=$_SESSION['count'];

$sql="SELECT * FROM placement_details";

$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);


mysqli_close($conn);
?>

<?php include('C:\xampp\htdocs\placement\templates/header.php'); 
if(isset($_GET['Message'])): ?>
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <?php echo $_GET['Message']; ?>
  </div>
</div>
<?php endif; ?>

<?php if(isset($_GET['Msg'])): ?>
	<div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <?php echo $_GET['Msg']; ?>
  </div>
</div>
<?php endif; ?>

<?php if(isset($_GET['Error'])): ?>
	<div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    <?php echo $_GET['Error']; ?>
  </div>
</div>
<?php endif; ?>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

		
<button onclick="sortTable(0)">Name</button>

<div class="container">
	<div class="tab">
	<table class="table table-bordered bg-warning" id="myTable">
		<tr>
			<th >Name of the company</th>
			<th>contact person</th>
			<th>Contact</th>
			<th>Address</th>
		    <th>remarks</th>
		    <th>Applicable Departments</th>
		    <th>email</th>
	        <th>job title</th>
	        <th>modification</th>
		</tr>
		<?php foreach($details as $detail): ?>
		<tr id="<?php echo $detail['id']; ?>">

			<td><?php echo $detail['company_name']; ?></td>
			<td><?php echo $detail['contact_person']; ?></td>
			<td><?php echo $detail['contact']; ?></td>
			<td><?php echo $detail['address']; ?></td>
			<td><?php echo $detail['remarks']; ?></td>
			<td><?php echo $detail['applicable_departments']; ?></td>
			<td><?php echo $detail['email']; ?></td>
			 <td>
				  <button type="button" name="button" onclick = "deletedata(<?php echo $detail['id']; ?>);">Delete</button>
			<form action="update_placement_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="update" class="btn btn-info">update</button>
				
            </form></td>
            <td><form action="job_details.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
				<button type="submit" name="add" class="btn btn-info">add details</button></form>
				<form action="view_details.php" method="POST">
				<input type="hidden" name="view_id" value="<?php echo $detail['id']; ?>">
         
				<button type="submit" name="view_details" class="btn btn-info">view details</button></form></td>

		</tr>
		<?php endforeach; ?>
	</table>

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
