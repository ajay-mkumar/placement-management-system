<?php 
include('C:\xampp\htdocs\placement\templates/header.php'); 

$count=$_SESSION['count'];
?>
<?php if($count==1): ?>
<head>
<link rel="stylesheet" type="text/css" href="templates/css/style.css">
<style type="text/css">
.column {
  float: left;
  width: 25%;
  padding: 5px;

}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}

	</style>
</head>

      <!-- Left links -->

    <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: black;"> 
 
  <div class="container">
  
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <div class="collapse navbar-collapse" id="navbarButtonsExample">
     
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
   
          <a class="nav-link text-white" href="#">Admin Homepage</a>
        </li>
      </ul></a>
      <div class="d-flex align-items-center">
        <button type="button" class="btn btn-link px-3 me-2">
          Hello <?php echo $name; ?>
        </button>
        <button type="button" class="btn btn-primary me-3">
         <a href="logout.php" class="text-white">logout</a>
        </button>
    </div>
</div>
</div>
</nav>
<div class="position-absolute top-50 start-50 translate-middle">
	<div class="row gx-5">
		<div class="col">
			<ul class="list-group list-group-horizontal">


 <ul>
<li><a href="training_details/training_details.php" class="img-thumbail">Training Details</a></li>
<a href="placement_details/placement_details.php" >Placement Details</a>
<a href="student_details/student_details.php" >Student Details</a>
<a href="">Scrolling Details</a>
https://www.coilk12.net/cms/lib/CA01001063/Centricity/Domain/45/student%20information.png \

<div>
<div style="position: relative;">
<div class="row" style="padding-top: 200px; ">
  <div class="column" >
<a href="training_details/training_details.php" ><img src="https://www.pngitem.com/pimgs/m/76-764163_training-icon-png-transparent-png.png"  style="width: 100%;"></a><p class="text-center">Training Details</p></div>
<div class="column">
<a href="placement_details/placement_details.php"><img src="https://www.vhv.rs/dpng/d/535-5350295_open-recruitment-flat-icon-png-transparent-png.png" style="width: 100%;"></a><p class="text-center">Placement Details</p></div>
<div class="column">
<a href="student_details/full_student_details.php"><img src="https://png.pngitem.com/pimgs/s/34-344076_person-icon-contact-person-icon-png-transparent-png.png" style="width: 100%;"></a><p class="text-center">Student Details</p></div>
<div class="column">
<a href="training_details/training_details.php"><img src="images\student_details.jpg" class="bg-success" style="width: 100%;"></a><p class="text-center">Scrolling Details</p></div></div></div>-->

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Homepage</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">

  <!-- Header -->

  <header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
      <!-- Logo -->
      <div class="logo_container">
        <div class="logo">
          <img src="images/logo.png" alt="">
          <span>A.V.C COLLEGE</span>
        </div>
      </div>

      <!-- Main Navigation -->
      <nav class="main_nav_container">
        <div class="main_nav">
          <ul class="main_nav_list">
           <li class="main_nav_item"><a href="admin_homepage.php">home</a></li>
            <li class="main_nav_item"><a href="placement_details/scrolling_details.php">Scrolling details</a></li>
            <!-- <li class="main_nav_item"><a href="courses.html">courses</a></li> -->
            <li class="main_nav_item"><a href=""> Hello <?php echo $name; ?></a></li>
            <li class="main_nav_item"><a href="contact.html">contact</a></li>
            <li class="main_nav_item"><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="header_side d-flex flex-row justify-content-center align-items-center">
      <img src="images/phone-call.svg" alt="">
      <span>222264</span>
    </div>

    <!-- Hamburger -->
    <div class="hamburger_container">
      <i class="fas fa-bars trans_200"></i>
    </div>

  </header>
  
  <!-- Menu -->
  <div class="menu_container menu_mm">

    <!-- Menu Close Button -->
    <div class="menu_close_container">
      <div class="menu_close"></div>
    </div>

    <!-- Menu Items -->
    <div class="menu_inner menu_mm">
      <div class="menu menu_mm">
        <ul class="menu_list menu_mm">
          <li class="menu_item menu_mm"><a href="#">Home</a></li>
          <li class="menu_item menu_mm"><a href="#">About us</a></li>
          <li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
          <li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
          <li class="menu_item menu_mm"><a href="news.html">News</a></li>
          <li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
        </ul>

        <!-- Menu Social -->
        
        <div class="menu_social_container menu_mm">
          <ul class="menu_social menu_mm">
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
          </ul>
        </div>

        <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
      </div>

    </div>

  </div>
  
  <!-- Home -->

  <div class="home">

    <!-- Hero Slider -->
    <div class="hero_slider_container">
      <div class="hero_slider owl-carousel">
        
        <!-- Hero Slide -->
        <div class="hero_slide">
          <div class="hero_slide_background" style="background-image:url(images/avc.png)" ></div>
          <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
            <div class="hero_slide_content text-center">
              <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">  </h1>
            </div>
          </div>
        </div>
        
        <!-- Hero Slide -->
        <div class="hero_slide">
          <div class="hero_slide_background" style="background-image:url(images/avc.png)"></div>
          <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
            <div class="hero_slide_content text-center">
              <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">  </h1>
            </div>
          </div>
        </div>
        
        <!-- Hero Slide -->
        <div class="hero_slide">
          <div class="hero_slide_background" style="background-image:url(images/avc.png)"></div>
          <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
            <div class="hero_slide_content text-center">
              <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"> </h1>
            </div>
          </div>
        </div>

      </div>

      <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
      <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
    </div>

  </div>

  <div class="hero_boxes">
    <div class="hero_boxes_inner">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
              <img src="images/earth-globe.svg" class="svg" alt="">
              <div class="hero_box_content">
                <h2 class="hero_box_title">Training Details</h2>
                <a href="training_details/training_details.php" class="hero_box_link">click here</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
              <img src="images/books.svg" class="svg" alt="">
              <div class="hero_box_content">
                <h2 class="hero_box_title">Placement Details</h2>
                <a href="placement_details/placement_details.php" class="hero_box_link">click here</a>
              </div>
            </div>
          </div>



          <div class="col-lg-4 hero_box_col">
            <div class="hero_box d-flex flex-row align-items-center justify-content-start">
              <img src="images/professor.svg" class="svg" alt="">
              <div class="hero_box_content">
                <h2 class="hero_box_title">Student Details</h2>
                <a href="student_details/full_student_details.php" class="hero_box_link">click here</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html>


<?php else: ?>
<p>please login...</p>
<?php endif; ?>