<?php include 'server/server.php' ?>
<?php 
	// announcement
// hi
//ok
//edit
	$getAnnouncement = "SELECT * FROM tbl_announcement WHERE status=1 ORDER BY id DESC";
    $announcement = $conn->query($getAnnouncement);
	
	// total residents
	$stmtResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident";
    $resResidentTotal 	= $conn->query($stmtResidentTotal);
	$totalResident = $resResidentTotal->fetch_assoc();

	// total female
	$stmtFemaleResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident WHERE gender='Female'";
    $resFemaleResidentTotal 	= $conn->query($stmtFemaleResidentTotal);
	$totalFemaleResident = $resFemaleResidentTotal->fetch_assoc();

	// total male
	$stmtMaleResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident WHERE gender='Male'";
    $resMaleResidentTotal 	= $conn->query($stmtMaleResidentTotal);
	$totalMaleResident = $resMaleResidentTotal->fetch_assoc();

	// total medicine available
	$stmtMedinceAvailableTotal 	= "SELECT SUM(quantity) AS med_count FROM tbl_medicine";
    $resMedicineAvailableTotal 	= $conn->query($stmtMedinceAvailableTotal);
	$totalMedicineAvailable = $resMedicineAvailableTotal->fetch_assoc();

	// total medical supply available
	$stmtMedicalSupplyAvailable 	= "SELECT SUM(quantity) AS supply_count FROM tbl_medical_supply";
    $resMedicalSupplyAvailable 	= $conn->query($stmtMedicalSupplyAvailable);
	$totalMedicalSupplyAvailable = $resMedicalSupplyAvailable->fetch_assoc();

	// total appointments today
	$date_today 			= date("Y-m-d");
	$stmtAppointmentsToday 	= "SELECT COUNT(*) AS total_appointment FROM tbl_appointment WHERE appointment_date = '$date_today'";
    $resAppointmentsToday 	= $conn->query($stmtAppointmentsToday);
	$totalAppointmentsToday = $resAppointmentsToday->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Dashboard - KATIM Health Service System</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

:root {
    --light: #f6f6f9;
    --primary: #1976D2;
    --light-primary: #CFE8FF;
    --grey: #eee;
    --dark-grey: #AAAAAA;
    --dark: #363949;
    --danger: #D32F2F;
	--light-danger: #FECDD3;
    --warning: #FBC02D;
    --light-warning: #FFF2C6;
    --success: #388E3C;
    --light-success: #BBF7D0;
}

.content main{
    width: 100%;
    padding: 2px 0px;
     
 padding-bottom: 80px;
}

.content main .header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    grid-gap: 16px;
    flex-wrap: wrap;
}

.content main .header .left h1{
    font-size: 36px;
    font-weight: 600;
    margin-bottom: 10px;
    color: var(--dark);
 font-family: 'Poppins', sans-serif;
}

.content main .header .left .breadcrumb{
    display: flex;
    align-items: center;
    grid-gap: 16px;
}

.content main .header .left .breadcrumb li{
    color: var(--dark);
}

.content main .header .left .breadcrumb li a{
    color: var(--dark-grey);
    pointer-events: none;
}

.content main .header .left .breadcrumb li a.active{
    color: var(--primary);
    pointer-events: none;
}

.content main .header .report{
    height: 36px;
    padding: 0 16px;
    border-radius: 36px;
    background: var(--primary);
    color: var(--light);
    display: flex;
    align-items: center;
    justify-content: center;
    grid-gap: 10px;
    font-weight: 500;
}

.content main .insights{
     
    
  display: flex; /* Utilise Flexbox */
    justify-content: space-between; /* Espacement égal entre les éléments */
    align-items: center; /* Centrer les éléments verticalement */
    list-style: none; /* Supprime les puces */
    padding: 0; /* Retire les marges internes */
    margin: 0; /* Retire les marges externes */
     }

.content main .insights li{
   flex: 1; /* Chaque élément prend une part égale de l'espace disponible */
    text-align: center; /* Centrer le contenu */
    padding: 10px; /* Espacement interne */
    border: 1px solid #ddd; /* Optionnel : une bordure pour les éléments */
    border-radius: 8px; /* Coins arrondis */
    background: var(--light);
    border-radius: 20px;
    display: flex;
    align-items: center;
    grid-gap: 29px;
    cursor: pointer;
margin: 5px; /* Espacement entre les éléments */
}

.content main .insights li .bx{
    width: 80px;
    height: 80px;
    border-radius: 10px;
    font-size: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
}
#q,#w{
    width: 80px;
    height: 80px;
    border-radius: 10px;
    font-size: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
}
 

.content main .insights li:nth-child(1) .fa-bed{
     background: var(--light-primary);
    color: var(--primary);
}

.content main .insights li:nth-child(2) .bx{
    background: var(--light-warning);
    color: var(--warning);
}

.content main .insights li:nth-child(3) .fa-stethoscope{
    background: var(--light-success);
    color: var(--success);
}

.content main .insights li:nth-child(4) .bx{
    background: var(--light-danger);
    color: var(--danger);
}

.content main .insights li .info h3{
    font-size: 24px;
    font-weight: 600;
    color: var(--dark);
}

.content main .insights li .info p{
    color: var(--dark);
}

.content main .bottom-data{
    display: flex;
    flex-wrap: wrap;
    grid-gap: 24px;
    margin-top: 24px;
    width: 100%;
    color: var(--dark);
}

.content main .bottom-data>div{
    border-radius: 20px;
    background: var(--light);
    padding: 24px;
    overflow-x: auto;
}

.content main .bottom-data .header{
    display: flex;
    align-items: center;
    grid-gap: 16px;
    margin-bottom: 24px;
}

.content main .bottom-data .header h3{
    margin-right: auto;
    font-size: 24px;
    font-weight: 600;
}

.content main .bottom-data .header .bx {
    cursor: pointer;
}

.content main .bottom-data .orders{
    flex-grow: 1;
    flex-basis: 500px;
}

.content main .bottom-data .orders table{
    width: 100%;
    border-collapse: collapse;
}

.content main .bottom-data .orders table th{
    padding-bottom: 12px;
    font-size: 13px;
    text-align: left;
    border-bottom: 1px solid var(--grey);
}

.content main .bottom-data .orders table td{
    padding: 16px 0;
}

.content main .bottom-data .orders table tr td:first-child{
    display: flex;
    align-items: center;
    grid-gap: 12px;
    padding-left: 6px;
}

.content main .bottom-data .orders table td img{
    width: 36px;
    height: 36px;
    border-radius: 50%;
    object-fit: cover;
}

.content main .bottom-data .orders table tbody tr{
    cursor: pointer;
    transition: all 0.3s ease;
}

.content main .bottom-data .orders table tbody tr:hover{
    background: var(--grey);
}

.content main .bottom-data .orders table tr td .status{
    font-size: 10px;
    padding: 6px 16px;
    color: var(--light);
    border-radius: 20px;
    font-weight: 700;
}

.content main .bottom-data .orders table tr td .status.completed{
    background: var(--success);
}

.content main .bottom-data .orders table tr td .status.process{
    background: var(--primary);
}

.content main .bottom-data .orders table tr td .status.pending{
    background: var(--warning);
}

.content main .bottom-data .reminders{
    flex-grow: 1;
    flex-basis: 300px;
}

.content main .bottom-data .reminders .task-list{
    width: 100%;
}

.content main .bottom-data .reminders .task-list li{
    width: 100%;
    margin-bottom: 16px;
    background: var(--grey);
    padding: 14px 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.content main .bottom-data .reminders .task-list li .task-title{
    display: flex;
    align-items: center;
}

.content main .bottom-data .reminders .task-list li .task-title p{
    margin-left: 6px;
}

.content main .bottom-data .reminders .task-list li .bx{
  cursor: pointer;  
}

.content main .bottom-data .reminders .task-list li.completed{
    border-left: 10px solid var(--success);
}

.content main .bottom-data .reminders .task-list li.not-completed{
    border-left: 10px solid var(--danger);
}

.content main .bottom-data .reminders .task-list li:last-child{
   margin-bottom: 0;
}

@media screen and (max-width: 768px) {
    .sidebar{
        width: 200px;
    }

    .content{
        width: calc(100% - 60px);
        left: 170px;
    }

}

@media screen and (max-width: 576px) {
    
    .content nav form .form-input input{
        display: none;
    }

    .content nav form .form-input button{
        width: auto;
        height: auto;
        background: transparent;
        color: var(--dark);
        border-radius: none;
    }

    .content nav form.show .form-input input{
        display: block;
        width: 100%;
    }

    .content nav form.show .form-input button{
        width: 36px;
        height: 100%;
        color: var(--light);
        background: var(--danger);
        border-radius: 0 36px 36px 0;
    }

    .content nav form.show~.notif, .content nav form.show~.profile{
        display: none;
    }

    .content main .insights {
        grid-template-columns: 1fr;
    }

    .content main .bottom-data .header{
        min-width: 340px;
    }

    .content main .bottom-data .orders table{
        min-width: 340px;
    }

    .content main .bottom-data .reminders .task-list{
        min-width: 340px;
    }

}

 

 
</style>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>
		
		<div class="main-panel">
			<div class="content">
				<div class="page-inner mt--2">
					
					<!-- login alert -->
					<?php if(isset($_SESSION['message'])): ?>
						<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
							<?php echo $_SESSION['message']; ?>
						</div>
					<?php unset($_SESSION['message']); ?>
					<?php endif ?>
					<!-- end of login alert -->
					
					   <main>
            <div class="header">
                <div class="left">
                    <h1 style="color: #42f5da" >Analytics</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Les Derniers Chiffres
                            </a></li>
                        
                       
                    </ul>
                </div>
                <a href="model/logout.php" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>LOG OUT</span>
                </a>
            </div>


            <!-- Insights -->
             <?php 
             
$x = "SELECT SUM(montant) AS tot FROM facture";
$b = $conn->query($x);
$a = $b->fetch_assoc();
    

?>
             <?php 
             
             $stmtMedinceAvailableTotal 	= "SELECT count(*) as ok FROM tbl_appointment";
    $resMedicineAvailableTotal 	= $conn->query($stmtMedinceAvailableTotal);
	$v = $resMedicineAvailableTotal->fetch_assoc();
    

?>
            <ul class="insights">
                <li>
                   <i class="fa-solid fa-bed" id="w"></i>
                    <span class="info">
                        <h3>
                         333
                            
                        </h3>
                        <p>Patients </p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Site Visit</p>
                    </span>
                </li>
                <li><i class="fa-solid fa-stethoscope" id="q"></i>
                    <span class="info">
                        <h3>
                           341
                        </h3>
                        <p>Fournitures Médicals</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <div style="display: flex; align-items: center; gap: 5px;">
    <h3><?= (int) ($a['tot'] ?? 0); ?></h3>
    <h3>DH</h3>
</div>

   

                        <p>Les revenus</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->



            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Dernieres Consultations</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th> Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <img src="assets/img/z.jpg">

                                    <p>IMRANE</p>
                                </td>
                                <td>20-02-2025</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>
                                <img src="assets/img/z.jpg">

                                    <p>MARWANE</p>
                                </td>
                                <td>20-03-2025</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/img/z.jpg">
                                    <p>MORAD</p>
                                </td>
                                <td>20-03-2025</td>
                                <td><span class="status process">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>



                </div>

                <!-- Reminders -->
                <div class="reminders">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>LES ANNONCES</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-plus'></i>
                    </div>
                    <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>CONGRES INTERNATIONAL VIH</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-check-circle'></i>
                                <p>DON DU SANG</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <div class="task-title">
                                <i class='bx bx-x-circle'></i>
                                <p>DERMATOLOGY FORUM</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>

                <!-- End of Reminders-->

            </div>

        </main>

					<!-- announcement -->
					<?php if(isset($_SESSION['username']) && ($_SESSION['role'] =='resident' || $_SESSION['role'] =='medical-admin')):?>
						<div class="row">
						<?php include 'templates/loading_screen.php' ?>
                        <div class="col-md-12 mt-0">
                            <?php foreach($announcement as $row): ?>
                                <div class="card" style="margin-bottom: 15px !important;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img
                                                    src="assets/img/<?= ucwords($row['image']) ?>"
                                                    alt="announcement-image"
                                                    style="height:200px; width:100%"
                                                />
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body pt-0">
                                                    <h5 class="card-title text-primary">
                                                        <?= ucwords($row['title']) ?>
                                                    </h5>
                                                    <span class="text-<?= $row['category'] =='ANNOUNCEMENT'?'success':'warning' ?>"><?= ucwords($row['category']) ?></span>
                                                    
                                                    <p class="card-text">
													<?= ucwords(substr($row['description'],0,200).'..') ?>
                                                    </p>
                                                    <p class="card-text">
                                                        <small class="text-muted">
															<strong>Date Posted: </strong>
															<span class="text-primary">
																<?= ucwords($row['create_date']) ?>
															</span>
														</small><br>
														<a href="dashboard_announcement_detail.php?id=<?= $row['id'] ?>&tbl=tbl_announcement&page=announcement" class="btn btn-sm btn-primary mt-2">
															Read more
															<i class="fas fa-solid fa-angle-right ml-2"></i>
														</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
						</div>
					<?php endif ?>
					<!-- end of announcement -->


				</div>
			</div>
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
		</div>
		
	</div>
	 
</body>
</html>