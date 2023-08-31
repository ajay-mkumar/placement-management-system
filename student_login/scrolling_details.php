<?php
include('C:\xampp\htdocs\placement\templates/header.php'); 
include('C:\xampp\htdocs\placement\config\db_config.php');


$id=$_SESSION['id'];
$sql="SELECT * FROM scrolling_details";
$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);



mysqli_close($conn);
?>
<?php foreach($details as $detail): ?>

<h2><?php echo $detail['details']; ?> </h2>
<?php endforeach; ?>