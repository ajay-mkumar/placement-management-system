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
  $cmp_id=$_POST["cmp_id"];
  $attended=$_POST["value"];
  $sql="SELECT * FROM  attended_students WHERE id='$id'";
  if(mysqli_query($conn,$sql)){
    $sql="UPDATE attended_students SET job_id='$job_id',cmp_id='cmp_id',attended='$attended' WHERE attended_id='$id'";
    if(mysqli_query($conn,$sql)){
    echo 1;
  }else{
    echo mysqli_error($conn);
  }

  }else{
     $sql="INSERT INTO attended_students(attended_id,job_id,cmp_id,attended) VALUES('$id','$job_id','$cmp_id','$attended')";
       if(mysqli_query($conn,$sql)){
    echo 1;
  }else{
    echo mysqli_error($conn);
  }


  }

 

	
}

?>
