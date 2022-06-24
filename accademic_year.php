<?php include('C:\xampp\htdocs\placement\templates/header.php'); ?>


<?php include('header.php'); ?>
<span><a href="placement_details.php" class="text-dark">Back</a></span>
    </div>

  </header>
<div class="background" style="background-image:url(images/avc.png)"  >
  
  
    <div class="position-absolute top-50 start-50 translate-middle">
<form method="POST" action="attended_students_list.php">
  <h4 class="text-dark bg-white display-5">select accademic year</h4>
  <div class="dropdown">
   
  <select name="accademic_year" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><option value="2020-2021">2020-2021</option></li>
<li><option value="2021-2022">2021-2022</option></li>
<li><option value="2022-2023">2022-2023</option></li>
<li><option value="2023-2024">2023-2024</option></li>
<li><option value="2024-2025">2024-2025</option></li>
</select>
</ul>
</div>
<button type="submit" class="btn btn-success" name="submit">submit</button>
</form>
