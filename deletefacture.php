<?php
include 'server/server.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Supprimer d'abord les médicaments liés à la facture
    $stmt1 = $conn->prepare("DELETE FROM facture_medicaments WHERE facture_id = ?");
    $stmt1->bind_param("i", $id);
    $result1 = $stmt1->execute();

    // Ensuite supprimer la facture elle-même
    $stmt2 = $conn->prepare("DELETE FROM facture WHERE id = ?");
    $stmt2->bind_param("i", $id);
    $result2 = $stmt2->execute();

    if ($result1 && $result2) {
        $_SESSION['message'] = ' Facture supprimée avec succès.';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['message'] = ' Échec de la suppression de la facture.';
        $_SESSION['success'] = 'danger';
    }

    header('Location: facture.php');
    exit();
} else {
    $_SESSION['message'] = ' ID de facture invalide.';
    $_SESSION['success'] = 'danger';
    header('Location: facture.php');
    exit();
}
?>
