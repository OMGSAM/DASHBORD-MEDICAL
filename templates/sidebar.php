<?php // function to get the current page name
function PageName() {
  return substr( $_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
}

$current_page = PageName();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href= https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/solid.min.css"/>

<link rel="stylesheet" href= https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/solid.min.js"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            
            <ul class="nav nav-primary">
                <!-- dashboard -->
                <li class="nav-item <?= $current_page=='dashboard.php' || $current_page=='dashboard_announcement_detail.php' ? 'active' : null ?>">
                    <a href="dashboard.php" >
                        <i style="color: #42f5da; font-size: 25px;" class='bx bxs-dashboard'></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- end of dashboard -->


                <!-- medical consumables -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i style="color: #42f5da; font-size: 25px;" class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MEDICAL CONSUMABLES</h4>
                </li>
                        <!-- medicine -->
                        <li class="nav-item <?= $current_page=='medicine.php' || $current_page=='medicine_add_form.php'  || $current_page=='medicine_update_form.php' ? 'active' : null ?>">
                            <a href="medicine.php" >
                                <i class="fas fa-pills" style="color: #42f5da; font-size: 25px;"></i>
                                <p>Medicine</p>
                            </a>
                        </li>
                        <!-- medical supplies -->
                        <li class="nav-item <?= $current_page=='supplies.php' || $current_page=='supplies_update_form.php' || $current_page=='supplies_add_form.php' ? 'active' : null ?>">
                            <a href="supplies.php" >
                                <i style="color: #42f5da; font-size: 25px;" class="fas fa-medkit"></i>
                                <p>Medical Supplies</p>
                            </a>
                        </li>

                        

                <!-- end of medical consumables -->

     <li class="nav-item <?= $current_page=='patient.php' || $current_page=='patientform.php'  ? 'active' : null ?>">
                            <a href="patient.php" >
                                
                               <i style="color: #42f5da; font-size: 25px;" class="fa-solid fa-bed"></i> <!-- Icone de médecin, utilisée comme icône de patient -->
                     

                                <p>Patients</p>
                            </a>
                        </li>
                
                
                <!-- appointments -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">APPOINTMENTS</h4>
                </li>
                        <!-- create appointment -->
                       
                     
                       
                        <li class="nav-item <?= $current_page=='appointment.php' || $current_page=='appointment_detail.php' || $current_page=='appointment_add_form.php' || $current_page=='appointment_update_form.php' ? 'active' : null ?>">
                            <a href="appointment.php" >
                               <i style="color: #42f5da; font-size: 25px;" class="fa-solid fa-calendar-check"></i>
                                <p>Appointment</p>
                            </a>
                        </li>
                        

                        <li class="nav-item <?= $current_page=='facture.php' || $current_page=='facture_detail.php' || $current_page=='facture_add_form.php' || $current_page=='facture_update_form.php' ? 'active' : null ?>">
                            <a href="facture.php" >
                               <!-- <i style="color: #42f5da; font-size: 25px;" class="fa-solid fa-calendar-check"></i> -->
                               <i style="color: #42f5da; font-size: 35px;" class='bx bx-dollar-circle'></i>
                               <p>Factures</p>
                            </a>
                        </li>

                                                <li class="nav-item <?= $current_page=='prescription.php' || $current_page=='prescription_detail.php' || $current_page=='prescription_add_form.php' || $current_page=='prescription_update_form.php' ? 'active' : null ?>">
                            <a href="prescription.php" >
<i style="color: #42f5da; font-size: 35px;" class='bx bx-file'></i>

                               <p>Prescriptions</p>
                            </a>
                        </li>



                <!-- our barangay -->
                <?php if(isset($_SESSION['username']) && $_SESSION['role']!='medical-admin'): ?>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Staff Médical</h4>
                </li>
                        <!-- barangay officials -->
                        <li class="nav-item <?= $current_page=='officials.php' ? 'active' : null ?>">
                            <a href="officials.php" >
                           <i class="fa-solid fa-user-doctor" style="color: #42f5da; font-size: 25px;"></i>
                                <p>Our Doctors</p>
                            </a>
                        </li>
                        <!-- barangay info -->
                        <li class="nav-item <?= $current_page=='nurse.php' ? 'active' : null ?>">
                             <a href="nurse.php" >
                      <i class="fa-solid fa-user-nurse" style="color: #42f5da; font-size: 25px;"></i>
                                <p>Nos infirmiers</p>
                            </a>
                        </li>
		 

                        <?php endif ?>
                <!-- end of barangay -->

  			<!-- zone-->
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Our location</h4>
                </li>
                        <!-- create appointment -->
                        <li class="nav-item <?= $current_page=='barangay-info.php' || $current_page=='appointment_detail.php' || $current_page=='appointment_add_form.php' || $current_page=='appointment_update_form.php' ? 'active' : null ?>">
                            <a href="barangay-info.php" >
                             <i style="color: #42f5da; font-size: 25px;" class="fa-solid fa-house-medical"></i>
                                <p>Notre Site</p>
 
                            </a>
                        </li>
               

                
                <!-- system maintenance -->
                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='system-maintenance'): ?>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    	</span>
                    <h4 class="text-section">SYSTEM MAINTENANCE</h4>
                </li>
                        <!-- manage announcement -->
                        <li class="nav-item <?= $current_page=='announcement.php' || $current_page=='announcement_detail.php' || $current_page=='announcement_update_form.php' || $current_page=='announcement_add_form.php' ? 'active' : null ?>">
                            <a href="announcement.php" >
                                <i style="color: #42f5da; font-size: 25px;" class="fas fa-podcast"></i>
                                <p>Announcement</p>
                            </a>
                        </li>
                        <!-- manage users -->
                        <li class="nav-item <?= $current_page=='manage-user.php' || $current_page=='manage_user_add_form.php' ? 'active': null ?>">
                            <a href="manage-user.php" >
                    <i class="fa-solid fa-lock" style="color: #42f5da; font-size: 25px;"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <!-- resident -->
                        <li class="nav-item <?= $current_page=='resident.php' || $current_page=='resident_add_form.php' || $current_page=='resident_update_form.php' ? 'active' : null ?>">
                            <a href="resident.php" >
                            <i style="color: #42f5da; font-size: 25px;" class="fa fa-users"></i>
                                <p>Residents</p>
                            </a>
                        </li>
                        <!-- manage backup -->
                        <li class="nav-item <?= $current_page=='manage_backup.php' ? 'active' : null ?>">
                            <a href="manage_backup.php" >
                                <i style="color: #42f5da; font-size: 25px;" class="fa fa-database"></i>
                                <p>Manage Backup</p>
                            </a>
                        </li>
                        <?php endif ?>
                <!-- end of system maintenance -->


                <!-- sign out -->
 
                <li class="nav-item " style="position: relative;top: 10px; display: inline-block;">
 
                    <a href="model/logout.php">
                        <i class="bx bx-log-out-circle" style="color: #d3fc03; font-size: 25px;"></i>

                        <p>Logged as <span class='text-primary'><?php echo $_SESSION['username']; ?></span></p>
                    </a>
                </li>
                <!-- end of sign out -->

            </ul>
        </div>
    </div>
</div>
<style>
    .sidebar.sidebar-style-2 .nav.nav-primary > .nav-item.active > a {
        background-color: lightseagreen !important;
    }
</style>