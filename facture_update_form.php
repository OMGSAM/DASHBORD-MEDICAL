<?php include 'server/server.php' ?>
<?php 
     $id = $_GET["id"];
	$query = "SELECT * FROM facture where  id ='$id' ";
    $result = $conn->query($query);

    $appointment = array();
	while($row = $result->fetch_assoc()){
		$appointment[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>UPDATE FACTURE - Health Service System</title>
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
                                            <a href="facture.php" class="text-primary">FACTURE</a> > <strong class="text-default">Update</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                       <?php foreach($appointment as $row)  ?>
                                   <form method="POST" action="facture_update_schedule.php">
    <div class="row">
        <div class="col-md-6">
            
            <div class="form-group">
                <label for="inputPatient">Patient Name</label>
                <input type="text" class="form-control"   name="patient" value="<?php echo $row['patient']; ?>" required>
              
            </div>

            <div class="form-group">
                <label for="inputMontant">Montant</label>
                <input type="number" class="form-control"  name="montant" value="<?php echo $row['montant']; ?>" required>
            </div>

            <div class="form-group">
                <label for="inputDoctor">Doctor</label>
                <input type="text" class="form-control"   name="doctor" value="<?php echo $row['doctor']; ?>" required>
            </div>

            <div class="form-group">
                <label for="inputMotif">Motif</label>
                <textarea class="form-control" id="inputMotif" rows="4" name="motif" required><?php echo $row['motif']; ?></textarea>
                <small class="form-text text-muted">Operation, médicament, etc...</small>
            </div>

            

            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-2 mb-2 mr-1">Edit</button>
            </div>
        </div>
        <input type="hidden" value="<?php echo $id ?>" name="id">
    </div>
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