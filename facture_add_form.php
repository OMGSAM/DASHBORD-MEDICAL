<?php include 'server/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>FACTURE - Health Service System</title>
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
                                            <a href="appointment.php" class="text-primary">FACTURE</a> > <strong class="text-default">CREATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                   <form method="POST" action="go.php">
    <div class="row">
        <div class="col-md-6">
            <!-- ==================== Patient ==================== -->
            <div class="form-group">
                <label for="inputPatient">Nom du patient</label>
                <?php
                $query = "SELECT * FROM patient";
                $res = $conn->query($query);
                $patients = [];
                while ($row = $res->fetch_assoc()) {
                    $patients[] = $row;
                }
                ?>
                <select class="form-control" name="patient" id="inputPatient" required>
                    <option value="" disabled selected>-- Sélectionner un patient --</option>
                    <?php foreach ($patients as $p): ?>
                        <option value="<?= $p['nom']; ?>"><?= $p['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- ==================== Médecin ==================== -->
            <div class="form-group">
                <label for="inputDoctor">Médecin</label>
                <?php
                $query = "SELECT * FROM tbl_officials";
                $res = $conn->query($query);
                $doctors = [];
                while ($row = $res->fetch_assoc()) {
                    $doctors[] = $row;
                }
                ?>
                <select class="form-control" name="doctor" id="inputDoctor" required>
                    <option value="" disabled selected>-- Sélectionner un médecin --</option>
                    <?php foreach ($doctors as $d): ?>
                        <option value="<?= $d['name']; ?>"><?= $d['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- ==================== MEDICINE ==================== -->
 <!-- Médicaments (Ajout Dynamique) -->
<div class="form-group">
    <label>Médicaments</label>
    <div id="med-list">
        <div class="form-row align-items-center mb-2 med-item">
            <div class="col-md-8">
                <select class="form-control" name="medicaments[]">
                    <option value="" disabled selected>-- Sélectionner un médicament --</option>
                    <?php
                    $query = "SELECT * FROM tbl_medicine WHERE quantity > 0";
                    $res = $conn->query($query);
                    $medicaments = [];
                    while ($row = $res->fetch_assoc()) {
                        $medicaments[] = $row;
                    }
                    foreach ($medicaments as $med): ?>
                        <option value="<?= $med['id']; ?>"><?= $med['generic_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="number" class="form-control" name="quantites[]" placeholder="Quantité" min="1" max="<?=$med['quantity'] ?>">
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-secondary mt-2" onclick="addMedicament()">+ Ajouter Médicament</button>
</div>



			 <!-- ==================== Montant ==================== -->
            <div class="form-group">
                <label for="inputMontant">Frais Operation || Traitement</label>
                <input type="number" class="form-control" id="inputMontant" name="montant" required min="0" step="0.01">
            </div>

            <!-- ==================== Motif ==================== -->
            <div class="form-group">
                <label for="inputMotif">Motif</label>
                <textarea class="form-control" id="inputMotif" name="motif" rows="4" required></textarea>
                <small class="form-text text-muted">Ex : opération, médicaments, consultation...</small>
            </div>

            <!-- ==================== Submit ==================== -->
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary mt-2 mb-2">Créer la facture</button>
            </div>
        </div>

        <!-- ==================== Colonne droite (vide ou future extension) ==================== -->
        <div class="col-md-6">
            <!-- Ici vous pouvez ajouter : liste de médicaments dynamiques -->
        </div>
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
	<script>

        document.addEventListener('DOMContentLoaded', function () {
    const qtyInputs = document.querySelectorAll('input[name="quantites[]"]');

    qtyInputs.forEach(function (input) {
        input.addEventListener('input', function () {
            const max = parseInt(input.getAttribute('max'));
            const value = parseInt(input.value);

            if (value > max) {
                input.value = max;
                alert('La quantité ne peut pas dépasser le stock disponible (' + max + ').');
            }
        });
    });
});

		function addMedicament() {
  const div = document.createElement('div');
  div.classList.add('med-item');
  div.innerHTML = document.querySelector('.med-item').innerHTML;
  document.getElementById('med-list').appendChild(div);
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