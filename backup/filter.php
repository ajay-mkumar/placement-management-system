<?php
session_start();
include('C:\xampp\htdocs\placement\config\db_config.php');
if(isset($_POST['ASC']))
{
    $asc_query = "SELECT * FROM student_details ORDER BY student_name ASC";
    $result=mysqli_query($conn,$asc_query);

	$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

	mysqli_free_result($result);

}

// Descending Order
elseif (isset ($_POST['DESC'])) 
    {
          $desc_query = "SELECT * FROM student_details ORDER BY student_name DESC";
         $result=mysqli_query($conn,$desc_query);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

    }elseif (isset ($_POST['asc_year'])) 
    {
          $asc_query = "SELECT * FROM student_details ORDER BY year ASC";
         $result=mysqli_query($conn,$asc_query);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
}elseif (isset ($_POST['dsc_year'])) 
    {
         $desc_query = "SELECT * FROM student_details ORDER BY year DESC";
         $result=mysqli_query($conn,$desc_query);

         $details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
}elseif (isset ($_POST['asc_cgpa'])) 
    {
          $asc_query = "SELECT * FROM student_details ORDER BY cgpa ASC";
          $result=mysqli_query($conn,$asc_query);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
}elseif (isset ($_POST['dsc_cgpa'])) 
    {
          $desc_query = "SELECT * FROM student_details ORDER BY cgpa DESC";
         $result=mysqli_query($conn,$desc_query);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
}elseif (isset ($_POST['asc_ay'])) 
    {
          $asc_query = "SELECT * FROM student_details ORDER BY accademic_year ASC";
         $result=mysqli_query($conn,$asc_query);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
}elseif (isset ($_POST['dsc_ay'])) 
    {
          $desc_query = "SELECT * FROM student_details ORDER BY accademic_year DESC";
         $result=mysqli_query($conn,$desc_query);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);
}
else{

$sql="SELECT * FROM student_details";
$result=mysqli_query($conn,$sql);

$details=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);


if(isset($_POST['submit'])){
	$id=$_POST['id'];

	$sql="DELETE FROM student_details WHERE id='$id'";

	if(mysqli_query($conn,$sql)){
		$message="deleted successfully";
		header('location:full_student_details.php?Msg='.$message);
	}
else{
	echo "error:". mysqli_error($conns);
}
}
mysqli_close($conn);
$_SESSION['c']='0';
}
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- 
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   Template Main CSS File -->
  <link href="assets/css/design.css" rel="stylesheet">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>


</head>
<body>
	<header id="header">
    <div class="d-flex flex-column">

      <!-- <div class="profile"> -->

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="training_details/training_details.php" class="nav-link scrollto active"><span> Training Details</a></span></a></li>
          <li><a href="placement_details/placement_details.php" class="nav-link scrollto"> <span>Placement Details</a></span></a></li>
          <li><a href="student_details/student_details.php" class="nav-link scrollto"><span>Student Details</a></span></a></li>
          <li><a href="" class="nav-link scrollto"> <span>Scrolling Details</span></a></li>
          <li><a href="logout.php" class="nav-link scrollto"><span>logout</span></a></li>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header>


<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
        <h4>Bootstrap Snipp for Datatable</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                  
                   <th>Name of the Student</th>
			<th>Register Number</th>
			<th>Department</th>
			<th>Accademic Year</th>
		    <th>Year</th>
		    <th>sem</th>
		    <th>1oth percentage</th>
	        <th>12th percentage</th>
	        <th>diplpoma</th>
                   </thead>
    <tbody>
    
    <tr>
    	<?php foreach($details as $detail): ?>
   <td><?php echo $detail['student_name']; ?></td>
			<td><?php echo $detail['register_num']; ?></td>
			<td><?php echo $detail['branch']; ?></td>
			<td><?php echo $detail['accademic_year'];?></td>
			<td><?php echo $detail['year']; ?></td>
			<td><?php echo $detail['sem']; ?></td>
			<td><?php echo $detail['sslc_percent']; ?></td>
			<td><?php echo $detail['hsc_percent']; ?></td>
		    <td><?php echo $detail['diploma']; ?></td>
		    <td><?php echo $detail['cgpa']; ?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
               
                    <?php endforeach; ?>