<?php include 'server/server.php' ?>
<?php
    $id = $_POST['id'];
     $date = date("Y-m-d");
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $dosage = $_POST['dosage'];
     $end_date = $_POST['end_date'];
     $medication = $_POST['medication'];
    $instructions = $_POST['instructions'];

    $query = "UPDATE prescription
                SET patient ='$patient',
                    doctor = '$doctor',
                    dosage = '$dosage',
                    medication = '$medication' ,
                    instructions = '$instructions',
                    end_date = '$end_date'
              WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update Facture!';
    $_SESSION['success'] = 'danger';
     $_SESSION['message'] = 'Failed to add Presc: ' . $conn->error;
 
    if($result){
        $_SESSION['message'] = 'Successfully updated Facture!';
        $_SESSION['success'] = 'success';
    }
    header('location: prescription.php');
?>