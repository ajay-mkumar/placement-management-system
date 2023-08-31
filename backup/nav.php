
 <nav class="navbar navbar-expand-lg navbar-light" style="background-color: black;">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <button onclick="<?php echo $_SERVER[HTTP_REFERER]; ?>">Back </button>
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