<?php

include('C:\xampp\htdocs\placement\config\db_config.php');
if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "update"){
    atn();
  }
}

function atn(){
  global $conn;
  $id=$_POST['id'];
  $job_id=$_POST["job_id"];
  $attended=$_POST["value"];
  

  $sql="INSERT INTO attended_students(attended_id,job_id,attended) VALUES('$id','$job_id','$attended')";

	if(mysqli_query($conn,$sql)){
		echo 1;
	}else{
    echo mysqli_error($conn);
  }
}

?>
