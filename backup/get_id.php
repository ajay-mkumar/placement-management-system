<?php
include('C:\xampp\htdocs\placement\config\db_config.php');




$job_des=$contact_person=$cgpa=$skills=$sslc_percent=$hsc_percent=$no_of_arear=$history_of_arear='';
$errors=array('job_des'=>'','contact_person'=>'');


if(isset($_POST["action"])){

	if($_POST["action"]=="job"){
		read();
		
	}
}
		
function read(){
		$id=$_POST["id"];
		$_SESSION['add_id']=$id;
		header("location:job_details.php");
		echo 1;
}

?>