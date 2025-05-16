 <?php 
if($_SESSION['role']!=='system-maintenance'){	 
header('Location: dashboard.php');
exit();  
}
 ?> 

<?php include 'server/server.php'  ?>
<?php
$patient = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>

 
 
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Patient - Health Service System</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">
							<?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>
<a href="patient.php" class="text-primary">Patient</a> 
    <strong class="text-default">
        <?= $patient > 0 ? 'EDIT' : 'CREATE'; ?>
    </strong>										</div>
									</div>
								</div>
								<div class="card-body">

 
 <?php
 if ($patient > 0) {
    $query = "SELECT * FROM patient WHERE id = ?";
    $stmt = $conn->prepare($query);
     $stmt->bind_param("i", $patient);  
     $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
}
?>

    <form action="patient_action.php" method="POST">
        <input type="hidden" name="id" value="<?= isset($patient) ? $row['id'] : ''; ?>">

        <div class="form-group">
        <label for="inputNom">Nom</label>
        <input type="text" class="form-control" id="inputNom" name="nom" required value="<?= isset($row) ? $row['nom'] : '' ; ?>">
        </div>

     
        <div class="form-group">
        <label for="inputSexe">Sexe</label>
        <select class="form-control" id="inputSexe" name="sexe" required>
            <option value="" disabled <?= !isset($patient) ? 'selected' : ''; ?>>Choisissez le sexe</option>
            <option value="Homme" <?= isset($row) && $row['sexe'] == 'Homme' ? 'selected' : ''; ?>>Homme</option>
            <option value="Femme" <?= isset($row) && $row['sexe'] == 'Femme' ? 'selected' : ''; ?>>Femme</option>
        </select>
        </div>

        <div class="form-group">
        <label for="inputMobile">Phone</label>
        <input type="text" class="form-control" id="inputMobile" name="telephone" required value="<?= isset($row) ? $row['telephone'] : ''; ?>">
        </div>


         <div class="form-group">
        <label for="inputMobile">Email</label>
        <input type="text" class="form-control" id="inputMobile" name="email" required value="<?= isset($row) ? $row['email'] : ''; ?>">
        </div>
    
        
    
                     <div class="form-group">
                               <label for="concern">Adresse</label>
                         <textarea class="form-control" id="concern" rows="4" name="adresse" required><?= isset($row) ? $row['adresse'] : ''; ?></textarea>                                            
                                                </div>

                    <button type="submit" class="btn btn-primary">
                       <?= $patient > 0 ? 'EDIT' : 'CREATE'; ?>
                     </button>
    </form>


								</div>
								<!-- end of medicine table -->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			
		</div>
	</div>
	
	<?php include 'templates/footer.php' ?>
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
	<style>
		.text-primary, .text-primary a{
			color: #1c9790 !important;
		}

		.btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:disabled{
			background: #1c9790 !important;
			border-color: #1c9790 !important;
		}

        .text-primary:hover, .text-primary a:hover{
			color: #1c9790 !important;
		}
	</style>
</body>
</html>