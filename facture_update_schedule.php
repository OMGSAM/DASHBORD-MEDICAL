<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
     $date = date("Y-m-d");
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $montant = $_POST['montant'];
    $motif = $_POST['motif'];

    $query = "UPDATE facture
                SET patient='$patient',
                    doctor = '$doctor',
                    montant= '$montant',
                    date_facture= '$date'
              WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update Facture!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated Facture!';
        $_SESSION['success'] = 'success';
    }
    header('location: facture.php');
?>