<?php include 'server/server.php' ?>
<?php
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $montant = $_POST['montant'];
     $motif = $_POST['motif'];
    $create_date = date("Y-m-d");

    $query = "INSERT INTO facture (patient,montant,doctor,motif,date_facture) 
                VALUES ('$patient','$montant','$doctor','$motif','$create_date')";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add Facture!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added Facture!';
        $_SESSION['success'] = 'success';
    }
    header('location: facture.php');
?>