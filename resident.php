<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tblresident ORDER BY id DESC";
    $result = $conn->query($query);

    $resident = array();
	while($row = $result->fetch_assoc()){
		$resident[] = $row; 
	}

    $query1 = "SELECT * FROM tblpurok ORDER BY `name`";
    $result1 = $conn->query($query1);

    $purok = array();
	while($row = $result1->fetch_assoc()){
		$purok[] = $row; 
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Resident -  Health Service System</title>
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
											<h1>RESIDENTS</h1>
										</div>

                                        <div class="card-tools">
											<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
												<a href="resident_add_form.php" class="btn btn-primary mr-1">
													<i class="fa fa-plus mr-2"></i>
													Resident
												</a>
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
										<table id="tblResident" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Resident Name</th>
													<th scope="col">Email</th>
													<th scope="col">Age</th>
													<th scope="col">Speciality</th>
                                                    <th scope="col">Mobile</th>
													<!-- <th scope="col">Mission</th> -->
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($resident)): ?>
													<?php $no=1; foreach($resident as $row): 
														
														 
														?>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar avatar-sm">
																	 
					<?php 
					$images = [
        "assets/img/masili.jpg",
        "assets/img/osos.png",
        "assets/img/qoq.png",
		"assets/img/oka.jpg","assets/img/oo.png"
    ];

				 $imgIndex = $row['id'] % count($images); // 0, 1, 2, 0, 1, 2, ...
                        $img = $images[$imgIndex];
					?>								
																	<span class="avatar-title rounded-circle border border-white" style="background-color: lightseagreen; width: 40px; height: 40px; display: inline-flex; align-items: center; justify-content: center; overflow: hidden;">
   <img src="<?=$img ?>" alt="imaage" style="width: 100%; height: 100%; object-fit: cover;">
</span>

                                                                     
 																</div>
                                                                <?= ucwords(strtoupper($row['lastname'].''.$row['firstname'].' '.$row['middlename'])) ?>
                                                            </td>
                                                            <td><?= $row['email'] ?></td>
                                                            <td><?= $row['age'] ?></td>
                                                            <td><?= $row['departement'] ?></td>
                                                            <td><?= $row['mobile'] ?></td>
                                                            
                                                            <td>
																<a href="resident_update_form.php?id=<?= $row['id'] ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Update">
																	<i class="fa fa-edit mr-2"></i>
																</a>
															</td>
                                                        </tr>
													<?php $no++; endforeach ?>
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
            $('#tblResident').DataTable();
        });

        function Export(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export resident to CSV?");
			var stmt = "SELECT lastname,firstname,middlename,birthdate,age,civilstatus, gender,voterstatus FROM tblresident";
			var tblHeader = 'Last name,First name,Middle name,Birthdate,Age, Civil Status,Gender,Voter Status';
			var fileName = "resident";
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