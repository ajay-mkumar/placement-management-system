<?php
$conn=mysqli_connect('localhost','ajay','0911ajay','placement_details');

if (!$conn){
	echo "error:" . mysqli_connect_error();
}

?>