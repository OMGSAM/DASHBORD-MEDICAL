<?php include 'server/server.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $motif = $_POST['motif'];
    $supplement = floatval($_POST['montant']); // montant saisi
    $create_date = date('Y-m-d H:i:s');

    $med_ids = $_POST['medicaments'] ?? [];
    $quantites = $_POST['quantites'] ?? [];

    $total_meds = 0;

    // 1. Calculer le total des médicaments
    foreach ($med_ids as $index => $med_id) {
        $qte = (int)$quantites[$index];

        $stmt = $conn->prepare("SELECT prix FROM tbl_medicine WHERE id = ?");
        $stmt->bind_param("i", $med_id);
        $stmt->execute();
        $stmt->bind_result($prix);
        $stmt->fetch();
        $stmt->close();

        $total_meds += $prix * $qte;
    }

    // 2. Total = médicaments + supplément
    $montant_total = $total_meds + $supplement;

    // 3. Insérer dans la table facture
    $query = "INSERT INTO facture (patient, montant, doctor, motif, date_facture) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdsss", $patient, $montant_total, $doctor, $motif, $create_date);

    if ($stmt->execute()) {
        $facture_id = $stmt->insert_id;

        // 4. Insérer les médicaments liés à la facture
        foreach ($med_ids as $index => $med_id) {
            $qte = (int)$quantites[$index];

            $stmt = $conn->prepare("SELECT prix FROM tbl_medicine WHERE id = ?");
            $stmt->bind_param("i", $med_id);
            $stmt->execute();
            $stmt->bind_result($prix);
            $stmt->fetch();
            $stmt->close();

            $stmt = $conn->prepare("INSERT INTO facture_medicaments (facture_id, medicament_id, quantite, prix_unitaire) 
                                    VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid", $facture_id, $med_id, $qte, $prix);
            $stmt->execute();
        }
          $_SESSION['message'] = 'Successfully added Facture!';
           $_SESSION['success'] = 'success';
         header('location: facture.php');
        
    } else {
        echo "❌ Erreur : " . $stmt->error;
    }
}
?>
