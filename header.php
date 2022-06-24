
<!DOCTYPE html>
<html>
<head>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<style type="text/css">
.background
{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center center;
}
.nav_space{
position: relative;top: 130px;
}</style>
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>

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
            <li class="main_nav_item"><a href="scrolling_details.php">Scrolling details</a></li>
            <!-- <li class="main_nav_item"><a href="courses.html">courses</a></li> -->
             <li class="main_nav_item"><a href=""> Hello <?php echo $name; ?></a></li> 
          
            <li class="main_nav_item"><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="header_side d-flex flex-row justify-content-center align-items-center">
      <!-- <img src="images/phone-call.svg" alt=""> -->
      

    <!-- Hamburger 
    <div class="hamburger_container">
      <i class="fas fa-bars trans_200"></i>
    </div>-->

