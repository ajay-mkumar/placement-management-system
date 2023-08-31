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
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<table>
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
			<td><button onclick="deletedata(<?php echo $detail['id']; ?>)">delete</button></td>
			<td><button onclick="sendid(<?php echo $detail['id']; ?>)">add</button></td>
		</tr>
	</tbody>
	</table>
	<?php endforeach ?>
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

           

            
            
           
            
          });
        });
    
      }
      </script>
	<?php endif ?>