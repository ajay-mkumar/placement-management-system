<?php

include('C:\xampp\htdocs\placement\config\db_config.php');
if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "delete"){
    delete();
  }
}

function delete(){
  global $conn;

  $id = $_POST["id"];

  

 

  mysqli_query($conn, "DELETE FROM placement_details WHERE id = $id");
  echo 1;
}
?>

		
