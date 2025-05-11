<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM patient ORDER BY id desc ";
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
	<title>Les Patients -  Health Service System</title>
	    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<!-- action alert -->
							<?php if(isset($_SESSION['message'])): ?>
								<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
									<?php echo $_SESSION['message']; ?>
								</div>
							<?php unset($_SESSION['message']); ?>
							<?php endif ?>
							<!-- end of action alert -->
							<?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title text-primary">
											<h1>PATIENTS RECORD</h1>
										</div>
										
										<div class="card-tools">
											<a href="patientform.php" class="btn btn-primary mr-1">
												<i class="fa fa-plus mr-2"></i>
												Patients
											</a>
											<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
												<button onclick="Export()" class="btn btn-default btn-default">
													<i class="fa fa-download mr-2"></i>
													Export to CSV
												</button>
											<?php endif?>
										</div>
										
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="appointment" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Nom</th>
													<th scope="col">email</th>
													<th scope="col">phone</th>
                                                    <th scope="col">adresse</th>
													<th scope="col">sexe</th>
			
													 
													<?php if(isset($_SESSION['username']) && $_SESSION['role'] !='resident'): ?>
														<th scope="col">Action</th>
													<?php endif ?>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($appointment)): ?>
													<?php foreach($appointment as $row): ?>
														<tr>
															<td><?= ucwords($row['nom']) ?></td>
															<td><?= ucwords($row['email']) ?></td>
															<td>
																<?php if($row['nom']==''): ?>
																	<span class="badge text-primary" style="width:90px;">Unassigned</span>
																<?php else:?>
																	<?= ucwords($row['telephone']) ?>
																<?php endif ?>
															</td>
															<td><?= ucwords($row['adresse']) ?></td>
<td>
  <span class="badge badge-warning" style="width:150px; font-size: 1rem; font-weight: bold; padding: 6px; background-color: #42f5da; !important; color: black !important;">
    <?= ($row['sexe']) ?>
</span>



</td>
															 
															<?php if(isset($_SESSION['username']) && $_SESSION['role'] !='resident'): ?>
																<td>
																	<?php if($row['nom'] !=''): ?>
																		<!-- Update Button -->
  <div style="display: flex; align-items: center; gap: 10px;">

    <!-- Update Button -->
    <a href="patientform.php?id=<?= $row['id'] ?>" class="btn btn-link" style="text-decoration: none; color:yellowgreen;">
        <i class="fa fa-edit" style="font-size: 30px; margin-right: 5px;"></i>  
    </a>

    <!-- Generate PDF -->
   
<a href="deletepatient.php?id=<?= $row['id']; ?>" title="Supprimer la facture" style="text-decoration: none; color: red;">
    <i class="fa-solid fa-trash" style="font-size: 30px;"></i>
</a>

    <!-- Inform Patient -->
	  
 

</div>




																	<?php else: ?>
																		<a href="appointment_detail.php?id=<?= $row['id'] ?>&tbl=tbl_appointment&page=appointment" class="btn btn-link">
																			<i class="fa fa-file-medical-alt mr-2"></i>Details
																		</a>
																	<?php endif ?>
																</td>
															<?php endif ?>
														</tr>
													<?php endforeach ?>
												<?php endif ?>
											</tbody>
										</table>
									</div>
								</div>
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
    <script>
 

        $(document).ready(function() {
            var oTable = $('#facture').DataTable({
				"order": [[ 4, "desc" ]]
            });
        });

		function Export(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export facture to CSV?");
			var stmt = "SELECT * FROM facture";
			var tblHeader = 'id,patient,doctor,montant,date_facture, motif';
			var fileName = "facture";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}
    </script>
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