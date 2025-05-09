<?php include 'server/server.php' ?>
<?php
    // $image = $_FILES["fileToUpload"]["name"];
    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $montant = $_POST['montant'];
     $motif = $_POST['motif'];
    // $target_dir = "assets/img/";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // $uploadOk = 1;
    $create_date = date("Y-m-d");
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    
    $query = "INSERT INTO facture (patient,montant,doctor,motif,date_facture) 
                VALUES ('$patient','$montant','$doctor','$motif','$create_date')";
    echo $query;
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add Facture!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added Facture!';
        $_SESSION['success'] = 'success';
    }
    header('location: facture.php');
?>