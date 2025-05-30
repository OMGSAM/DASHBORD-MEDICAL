<?php include 'server/server.php' ?>
<?php
    $id = $_GET['id'];
    
    $query = "DELETE FROM facture  WHERE id= $id";
    $result = $conn->query($query);
    $_SESSION['message'] = 'Failed to remove facture !';
    $_SESSION['success'] = 'danger';
    if($result){
        $_SESSION['message'] = 'Successfully removed facture !';
        $_SESSION['success'] = 'success';
        header('location: facture.php');
    }
     
?>