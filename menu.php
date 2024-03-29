<?php
// session_start();
require_once ('db.php');
?>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

       <form action="search.php" class="form-ground my-3" method="POST">
<div class="row">
<div class="col-6">
    <input type="text" placeholder="กรอกชื่อสินค้า" class="form-control"
    name="searchs" required>
</div>
<div class="col-6">
<input type="submit" value="ค้าหา" class="btn btn-warning">
</div>
</div>
</form>

        <div class="text-end">
        <?php

if(isset($_SESSION["login_name"])) {

        echo $_SESSION['login_name'];
        echo "<br>";
        echo "<a class='btn btn-outline-primary' href='logout.php'>Logout</a>";
        
    }
    else{
        
        echo "<a class='btn btn-outline-primary' href='login.php'>Login</a>";
        echo "<br>";
        echo "<a class='btn btn-primary' href='sigup.php'>Sign-up</a>";
        
    }
    ?>
        </div>
      </div>
    </div>
  </header>