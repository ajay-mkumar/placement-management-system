<?php
include('C:\xampp\htdocs\placement\config\db_config.php');
include('C:\xampp\htdocs\placement\templates/header.php');

$count=$_SESSION['count'];

$job_des=$contact_person=$cgpa=$skills=$sslc_percent=$hsc_percent=$no_of_arear=$history_of_arear='';
$errors=array('job_des'=>'','contact_person'=>'');



	$id=$_SESSION['add_id'];
	$job_des=mysqli_real_escape_string($conn,$_POST['job_des']);
	$contact_person=mysqli_real_escape_string($conn,$_POST['contact_person']);

	$cgpa=mysqli_real_escape_string($conn,$_POST['cgpa']);
	$sslc_percent=mysqli_real_escape_string($conn,$_POST['sslc_percent']);
	$hsc_percent=mysqli_real_escape_string($conn,$_POST['hsc_percent']);
	$no_of_arear=mysqli_real_escape_string($conn,$_POST['no_of_arear']);
	$history_of_arear=mysqli_real_escape_string($conn,$_POST['history_of_arear']);
	$skills=mysqli_real_escape_string($conn,$_POST['skills']);

	$sql="INSERT INTO job_details(job_id,job_des,contact_person,cgpa,sslc_percent,hsc_percent,no_of_arear,history_of_arear,skills) VALUES ('$id','$job_des','$contact_person','$cgpa','$sslc_percent','$hsc_percent','$no_of_arear','$history_of_arear','$skills')";

	if(mysqli_query($conn,$sql)){
		header("location:view_details.php");
	}else{
			echo "error:" .mysqli_error($conn);
		}



?>