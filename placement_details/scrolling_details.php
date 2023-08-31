<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
if(isset($_POST['submit'])){
	$details=$_POST['details'];

	$query="INSERT INTO scrolling_details(details) VALUES ('$details')";

	if(mysqli_query($conn,$query)){
		echo "uploaded";
	}else{
		echo "error:". mysqli_error($conn);
	}


}
?>
<form method="POST" action="scrolling_details.php">
	<textarea rows="10" cols="10" name="details">scrolling details...</textarea>
	<button name="submit">submit</button>
	
</form>