<?php include 'server/server.php' ?>
<?php
    // $image = $_FILES["fileToUpload"]["name"];
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $dosage = $_POST['dosage'];
     $medication = $_POST['medication'];
    $instructions = $_POST['instructions'];
    $end_date = $_POST['end_date'];
    $X = date("Y-m-d");
 
    
    $query = "INSERT INTO prescription (patient, doctor, dosage, medication, instructions,debut, end_date) 
                VALUES ('$patient','$doctor','$dosage','$medication','$instructions','$X','$end_date')";
    echo $query;
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add Presc!';
    $_SESSION['success'] = 'danger';
    // echo "Error: " . $conn->error; // Affiche le message d'erreur
    $_SESSION['message'] = 'Failed to add Presc: ' . $conn->error;
    if($result){
        $_SESSION['message'] = 'Successfully added Prescriptions!';
        $_SESSION['success'] = 'success';
    }
    header('location: prescription.php');
?>