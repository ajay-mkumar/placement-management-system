<?php
/*include('C:\xampp\htdocs\placement\config\db_config.php');
$errors=array('program_name'=>'','resource_person'=>'','contact'=>'');
if(isset($_POST['submit'])){

	if(empty($_POST['name'])){
		$errors['program_name']="program name is required";
	}
	if(empty($_POST['Resource_person'])){
		$errors['resource_person']="Resource Person name is required";
	}
	
	if(empty($_POST['contact'])){
		$errors['contact']="contact is required";
	}

    if(array_filter($errors)){

    }else{
    	$id=$_POST['id'];
	    $program_name=mysqli_real_escape_string($conn,$_POST['name']);
	    $resource_person=mysqli_real_escape_string($conn,$_POST['resource_person']);
	    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
	    $date=mysqli_real_escape_string($conn,$_POST['date']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		$applicable_departments='';
		$check=$_POST['applicable'];
		foreach($check as $ch){
			$applicable_departments.=$ch.',';
		}
		$training_for=mysqli_real_escape_string($conn,$_POST['training_for']);

		$sql="UPDATE training_details SET program_name='$program_name',resouce_person='$resource_person',date_of='$date',contact='$contact',address='$address',applicable_departments='$applicable_departments',training_for='$training_for' WHERE id='$id'";

		if(mysqli_query($conn,$sql)){
			header('location:full_training_details.php');
		}else{
			echo "error:" .mysqli_error($conn);
		}
			}
}*/
include('C:\xampp\htdocs\placement\config\db_config.php');
$errors=array('program_name'=>'','resource_person'=>'','contact'=>'');
if(isset($_POST['submit'])){
	if(empty($_POST['name'])){
		$errors['program_name']="program name is required";
	}
	if(empty($_POST['resource_person'])){
		$errors['resource_person']="Resource Person name is required";
	}
	
	if(empty($_POST['contact'])){
		$errors['contact']="contact is required";
	}

    if(array_filter($errors)){
    	foreach($errors as $err){
    	    echo $err;
    	}

    }else{

	$id=$_POST['id'];
	    $program_name=mysqli_real_escape_string($conn,$_POST['name']);
	    $resource_person=mysqli_real_escape_string($conn,$_POST['resource_person']);
	    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
	    $date=mysqli_real_escape_string($conn,$_POST['date']);
		$address=mysqli_real_escape_string($conn,$_POST['address']);
		$applicable_departments='';
		$check=$_POST['applicable'];
		foreach($check as $ch){
			$applicable_departments.=$ch.',';
		}
		$training_for=mysqli_real_escape_string($conn,$_POST['training_for']);

		$sql="UPDATE training_details SET program_name='$program_name',resouce_person='$resource_person',date_of='$date',contact='$contact',address='$address',applicable_departments='$applicable_departments',training_for='$training_for' WHERE id='$id'";

		if(mysqli_query($conn,$sql)){
			header('location:full_training_details.php');
		}else{
			echo "error:" .mysqli_error($conn);
		}
	

}
}
