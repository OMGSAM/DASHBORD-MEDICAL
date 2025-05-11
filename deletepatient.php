<?php include 'server/server.php' ?>
<?php
    $id = $_GET['id'];
    
    $query = "DELETE FROM patient  WHERE id= $id";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to remove patient !';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully removed patient !';
        $_SESSION['success'] = 'success';
        header('location: patient.php');
    }
     
?>