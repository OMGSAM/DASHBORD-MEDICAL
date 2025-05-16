<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM prescription ORDER BY id desc ";
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
	<title>Les Prescriptions -  Health Service System</title>
</head>
<style>
	body {
  font-family: 'DM Serif Display', serif;
}

</style>
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
											<h1 class="text-primary">PRESCRIPTIONS RECORD</h1>
										</div>
										
										<div class="card-tools">
											<a href="prescription_add_form.php" class="btn btn-primary mr-1">
												<i class="fa fa-plus mr-2"></i>
												PRESCRIPTIONS
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
													<th scope="col">Patient</th>
													<th scope="col">doctor</th>
                                                    <th scope="col">medication</th>
													<th scope="col">instructions</th>
                                                    <th scope="col">end_date</th>
													<th scope="col">dosage</th>
			
													 
													<?php if(isset($_SESSION['username']) && $_SESSION['role'] !='resident'): ?>
														<th scope="col">Action</th>
													<?php endif ?>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($appointment)) : ?>
													<?php foreach($appointment as $row) : ?>
														<tr>
															<td><?= ucwords($row['patient']) ?></td>
															<td><?= ucwords($row['doctor']) ?></td>
                                                            <td><?= ucwords($row['medication']) ?></td>
															<td>
																<?php if($row['doctor']==''): ?>
																	<span class="badge text-primary" style="width:90px;">Unassigned</span>
																<?php else:?>
																	<?= ucwords($row['instructions']) ?>
																<?php endif ?>
															</td>
															<td><?= ucwords($row['end_date']) ?></td>
<td>
    <span class="badge badge-warning" style="width:150px; font-size: 0.8rem; font-weight: bold; padding: 6px;">
        <?= ucwords($row['dosage']) ?>
    </span>
</td>
															 
															<?php if(isset($_SESSION['username']) && $_SESSION['role'] !='resident'): ?>
																<td>
																	<?php if($row['doctor'] !=''): ?>
																		  <div style="display: flex; align-items: center; gap: 10px;">

																		<a href="prescription_update_form.php?id=<?= $row['id'] ?>&tbl=tbl_appointment&page=appointment" class="btn btn-link">
																			<i class="fa fa-edit mr-2"  style="font-size: 30px; margin-right: 5px;"></i>
														
																		</a>
																		<a  style="text-decoration: none; color: gold;" href="prescriptionpdf.php?id_prescription=<?=$row['id']; ?>" title="Générer la presc PDF">
                        <i class="fa-solid fa-file-pdf invoice-icon"  style="font-size: 30px; margin-right: 5px;" ></i>
                    </a>
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
            var oTable = $('#appointment').DataTable({
				"order": [[ 4, "desc" ]]
            });
        });

		function Export(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export prescription to CSV?");
			var stmt = "SELECT * FROM prescription";
			var tblHeader = 'No, patient,doctor,medication ,dosage ,end_date,debut,instructions,created_at,updated_at ';
			var fileName = "prescription";
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