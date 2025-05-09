<?php include 'model/fetch_brgy_info.php' ?>

<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header">
        
        <a href="dashboard.php" class="logo">
            <img src="assets/img/oo.png" style="width: 60px; height:60px;" alt="navbar brand" class="navbar-brand">
 <img 
  src="assets/img/kk.png" 
  style=" width:60px; height: 70px;color: red" 
  alt="navbar brand" 
  class="navbar-brand">

<span class="text-light ml-2  fw-bold" style="font-size:35px"></span>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu" ></i>
            </span>
        </button>   
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        <li class="nav-item" style="position: absolute; top: 10px; right: 20px; display: inline-block;">
            <a href="model/logout.php" style="text-align: center; display: inline-block;">
                <i class="bx bx-log-out-circle" style="color: #d3fc03; font-size: 52px;"></i>
                
            </a>
        </li>
    </nav>
    <!-- End Navbar -->
   
</div>
<style>
    nav .nav-item{
        right:0;
    }
    .navbar-header[data-background-color="blue2"]{
        background: lightseagreen !important;
    }

    .logo-header {
        background: #1c9790 !important;
    }
</style>