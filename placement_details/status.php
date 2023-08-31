<?php

include('C:\xampp\htdocs\placement\config\db_config.php');
if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "update"){
    update();
  }
}

function update(){
  global $conn;
  $id=$_POST['id'];
  $status=$_POST["value"];
  

  $sql="UPDATE student_details SET status='$status' WHERE id='$id'";

	if(mysqli_query($conn,$sql)){
		echo 1;
	}else{
    echo mysqli_error($conn);
  }
}

?>
