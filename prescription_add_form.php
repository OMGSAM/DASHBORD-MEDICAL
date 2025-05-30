<?php include 'server/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>PRESCRIPTION - Health Service System</title>
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
                                            <a href="prescription.php" class="text-primary">PRESCRIPTION</a> > <strong class="text-default">CREATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <form method="POST" action="prescription_add_record.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                 
                                                <div class="form-group">
                                                    <label for="inputResidentName">Patient Name</label>
                                                    <!-- <input type="text" class="form-control" id="inputResidentName" name="patient" required> -->
                                                    <!-- <small class="form-text text-muted">ex: DELA CRUZ, JUAN V.</small> -->
													 <?php
												$query="SELECT * from patient" ;
												$res=$conn->query($query);
												$row1=[];
												while($row=$res->fetch_assoc()){
													$row1[]=$row;
												}
												?>
											 		<select class="form-control" name="patient"  required>
														 <?php foreach ($row1 as $row): ?> 
												      <option value="<?= $row['nom'];?>">
           									 <?=  $row['nom']; ?>
														 </option>
    									<?php endforeach; ?>
												</select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputResidentName">Doctor Name</label>
                                                    <input type="text" class="form-control" id="inputResidentName" name="doctor" required>
                                                    <!-- <small class="form-text text-muted">ex: DELA CRUZ, JUAN V.</small> -->
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputAge">Medication</label>
                                                    <input type="text" class="form-control" id="inputAge" name="medication" required>
                                                </div>
												<div class="form-group">
                                                    <label for="inputMobile">Dosage</label>
                                                    <input type="text" class="form-control" id="inputMobile" name="dosage" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="concern">Instructions</label>
                                                    <textarea class="form-control" id="concern" rows="4" name="instructions" required></textarea>
                                                    <small class="form-text text-muted">Operation  , médicament ect ...</small>
                                                </div>
                                               
                                                

                                                <div class="form-group ">
    <label for="end_date">Date de fin</label>
    <input type="date" class="form-control" name="end_date" >
</div>

 
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mt-2 mb-2 mr-1">Create</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
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