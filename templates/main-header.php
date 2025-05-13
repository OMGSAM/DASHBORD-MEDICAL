 

<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header d-flex align-items-center justify-content-between">
        <a href="dashboard.php" class="logo d-flex align-items-center">
    <img src="assets/img/kk.png" style="width: 50px; height: 50px;" alt="Logo" class="mr-2">
 </a>

        <button class="navbar-toggler sidenav-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon-menu"></i>
        </button>
    </div>
    <!-- End Logo Header -->
    <!-- End Logo Header -->

    <!-- Navbar Header -->
   <nav class="navbar navbar-header navbar-expand-lg"  >
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Search Input -->
     <div class="search-bar" style="display: flex; align-items: center; border: 1px solid #ddd; padding: 8px 12px; border-radius: 8px; width: 300px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); background-color: #fafafa;">
    <input type="text" class="form-control" placeholder="Rechercher..." style="flex: 1; border: none; outline: none; background-color: transparent; padding-right: 8px; font-size: 14px;">
    <i class='bx bx-search-alt' style="font-size: 20px; color: #666;"></i>
</div>


        <!-- User Profile Dropdown & Logout -->
        <div class="d-flex align-items-center" style="gap: 20px; position: absolute; right: 20px; top: 10px;">

            <!-- User Image -->
            <div class="dropdown">
                <a href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/img/masili.jpg" alt="User" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="profile.php">Profil</a></li>
                    <li><a class="dropdown-item" href="model/logout.php">Log out </a></li>
                </ul>
            </div>

            <!-- Logout Button -->
            <a href="model/logout.php" class="text-center" style="display: inline-block;">
                <!-- <i class="bx bx-log-out-circle" style="color: black; font-size: 36px;"></i> -->
                  <i  style="  font-size: 36px;"  class="fas fa-sign-out-alt"></i>

            </a>
        </div>
    </div>
</nav>


    <!-- End Navbar -->
   
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<style>
    
     .navbar .dropdown-toggle::after {
        display: none;
    }

    .navbar .search-bar input {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 5px 15px;
        width: 250px;
    }

    nav .nav-item{
        right:0;
    }
     .navbar-header{
        background:black;
    }

    .logo-header {
        background:black;
    }
    .main-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.1); /* Très léger */
}

</style>