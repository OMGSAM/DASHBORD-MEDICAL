<?php include 'server/server.php'; ?>
<?php 
if (!isset($_GET['id'])) {
    header('Location: facture.php');
    exit();
} 

$id = $conn->real_escape_string($_GET['id']);
$query = "SELECT * FROM facture WHERE id = '$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$patient = $row['patient'];
$doctor = $row['doctor'];
$email = $row['email'];
$date = $row['date_facture'];
$total = number_format($row['montant'], 2);
$motif = $row['motif']; 
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
 
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$response = ['success' => false, 'message' => ''];


try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pezaw50@gmail.com';
    $mail->Password = 'mgzi jeyf rucg comn';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('pezaw50@gmail.com', 'Katim-Health-Care');
    $mail->addAddress($email, 'USER');

    $mail->isHTML(true);
    $mail->Subject = 'Facture Medical';
    $mail->addEmbeddedImage('kk.png', 'logoimg');

    $mail->Body = "
    <html>
    <body>
    <div style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
        <div style='background-color: #ffffff; padding: 20px; border-radius: 8px;'>
            <div style='text-align: center; padding-bottom: 20px;'>
                <img src='cid:logoimg' alt='Logo' style='width: 100px;'>
                <h1>Facture Medicale</h1>
            </div>

            <p>Bonjour <strong>$patient</strong>,</p>
            <p>Voici les details de votre facture du <strong>$date</strong> :</p>

            <table style='width: 100%; border-collapse: collapse;'>
                <tr>
                    <th style='text-align: left;'>Patient</th>
                    <td>$patient</td>
                </tr>
                <tr>
                    <th style='text-align: left;'>Docteur</th>
                    <td>$doctor</td>
                </tr>
                <tr>
                    <th style='text-align: left;'>Date</th>
                    <td>$date</td>
                </tr>
                <tr>
                    <th style='text-align: left;'>Montant</th>
                    <td>$total DH</td>
                </tr>
                <tr>
                    <th style='text-align: left;'>Motif</th>
                    <td>$motif</td>
                </tr>
            </table>

            <p>Merci pour votre confiance.</p>
            <p>KATIM HEALTH CARE | Tel: +212 600 762 846 | Email: contact@katimhealthcare.com</p>
        </div>
    </div>
    </body>
    </html>";

    $mail->AltBody = 'Ceci est le corps ';

    if ($mail->send()) {
        echo 'Le mail a été envoyé avec succès ' ;  
        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: 'Le mail a été envoyé avec succès !',
                confirmButtonText: 'OK'
            });
        </script>
        ";
    } else {
     
         echo 'NOP : ' . $mail->ErrorInfo; // Afficher les erreurs de PHPMailer
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'Erreur lors de envoi de email : " . addslashes($mail->ErrorInfo) . "',
                confirmButtonText: 'OK'
            });
        </script>
        ";
    }

} catch (Exception $e) {
     
        echo 'Erreur: ' . $mail->ErrorInfo; // Afficher les erreurs de PHPMailer
    // echo "
    // <script>
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Erreur',
    //         text: 'Erreur lors de l\'envoi de l\'email : " . addslashes($e->getMessage()) . "',
    //         confirmButtonText: 'OK'
    //     }).then(() => {
    //         window.location.href = 'facture.php';
    //     });
    // </script>
    // ";
}

 
