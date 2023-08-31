<?php  
session_start();
$name=$_SESSION['name'];
$count=$_SESSION['count'];
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<link rel="stylesheet" type="text/css" href="css/table.css"> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style type="text/css">
  .img{
    position: relative;
    right:300px;
    top: 110px;
    
    width: 100%;
  }
  }
</style>
</head>
<body >
  <?php if($count==1): ?>
  <!-- <nav class="navbar navbar-inverse hidden-sm hidden-xs" style="background-color: blue;margin-top: -5px; "> 
            <div class="container-fluid">
                <div class="navbar-header hidden-sm hidden-xs">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
           </button>
          <a class="navbar-brand" href="#"><img src="http://avccengg.net/images/header2_1.png" style="margin-top:-17px;width: 1374px;margin-left:-21px;"></a>
        </div>-->
                    <!-- <ul class="nav navbar-nav menu-bar" style="margin-top:49px;margin-left:-18px;color:white;font-size:14px;background-color:#032757;width:105%;">  -->
               
                    </ul>
                
                    
            </div>
        </nav>   

<?php endif ?>


