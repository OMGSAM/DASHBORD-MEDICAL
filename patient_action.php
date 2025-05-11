<?php include 'server/server.php'  ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nom = $_POST['nom'];
     $email = $_POST['email'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
     $adresse = $_POST['adresse'];
    if ($id > 0) {
          
$query = "UPDATE patient
                SET nom='$nom',
                    adresse = '$adresse',
                    telephone= '$telephone',
                    email = '$email',
                    sexe= '$sexe'
              WHERE id='$id'";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to update patient!';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully updated patient!';
        $_SESSION['success'] = 'success';
           header('location: patient.php');
            exit();
    }
 
    } else {


 $query = "INSERT INTO patient (email,nom,telephone,adresse,sexe) 
                VALUES ('$email','$nom','$telephone','$adresse','$sexe')";
    
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to add patient !';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully added patient!';
        $_SESSION['success'] = 'success';
        header('Location: patient.php');
        exit();
    }


      
    }
}
?>
