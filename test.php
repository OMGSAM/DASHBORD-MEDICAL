<?php include 'server/server.php' ?>
<?php
  	$id = $conn->real_escape_string($_GET['id']);
	$query = "SELECT * FROM facture  WHERE id = '$id'";
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
// Inclure PHPMailer et les classes nécessaires
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//$mail = new PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

   

// $mail = new PHPMailer(true);

try {
  

    $mail->isSMTP();                                            // Utiliser SMTP
    $mail->Host = 'smtp.gmail.com';                             // Serveur SMTP
    $mail->SMTPAuth = true;                                       // Authentification SMTP
    $mail->Username = 'pezaw50@gmail.com';                   // Votre email
    $mail->Password = 'mgzi jeyf rucg comn';                      // Votre mot de passe
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           // Sécuriser la connexion
    $mail->Port = 587;                                            // Port SMTP

    // Destinataire
    $mail->setFrom('pezaw50@gmail.com', 'KATIM-HEALTH-CARE');
    $mail->addAddress($email, 'USER'); // Ajouter un destinataire
     
    $mail->isHTML(true);                                          // Format HTML
    $mail->Subject = 'Notification Medical '; 
     $mail->addEmbeddedImage('kk.png', 'logoimg');  // 'logoimg' is the CID (Content ID)
    
    $mail->Body = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    
    <style>
        .email-container {
            width: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .email-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header img {
            width: 120px;
        }
        .header h1 {
            margin: 10px 0;
            font-size: 24px;
            color: #0077b5;
        }
        .body {
            padding: 20px 0;
        }
        .body table {
            width: 100%;
            border-collapse: collapse;
        }
        .body table th,
        .body table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            font-size: 14px;
            color: #888888;
        }
    </style>
</head>
<body>

<div class='email-container'>
    <div class='email-content'>

        <!-- Header -->
        <div class='header'>

        <img src='cid:logoimg' alt='Logo' style='width: 100px;'>

            <h1>Facture Medicale</h1>
        </div>

        <!-- Body -->
        <div class='body'>
            <p>Bonjour <strong>$patient</strong>,</p>
            <p>Veuillez trouver ci-dessous les dDtails de votre facture du <strong>$date</strong> :</p>

            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Docteur</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Motif</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$patient</td>
                        <td>$doctor</td>
                        <td>$date</td>
                        <td>$total DH</td>
                        <td>$motif</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class='footer'>
            <p>Merci pour votre confiance.</p>
            <p>KATIM HEALTH CARE | TEl: +212 600 762 846 | Email: contact@katimhealthcare.com</p>
        </div>

    </div>
</div>

</body>
</html>
";


    // Sujet de l'email
// $mail->Body = "
//     <h2>Bonjour, $patient</h2>
//     <p>Voici les détails de votre facture du <strong>$date</strong> :</p>

//     <table border='1' cellspacing='0' cellpadding='5' style='width: 100%; border-collapse: collapse;'>
//         <thead>
//             <tr>
//                 <th>patient</th>
//                 <th>doctor</th>
//                 <th>motif</th>
//                 <th>date facture</th>
//                 <th>Total</th>
//             </tr>
//         </thead>
//         <tbody>
// ";

 

//     $mail->Body .= "
//         <tr>
//             <td>$patient</td>
//             <td>$doctor</td>
//              <td>$motif</td>
//             <td>$date</td>
//             <td>$total €</td>
//         </tr>
//     ";


// $mail->Body .= "
//         </tbody>
//     </table>

//     <p style='font-size: 16px; font-weight: bold;'>Montant Total : $total DH</p>

//     <p>Merci de votre confiance.</p>
// ";

   $mail->AltBody = 'Ceci est le corps de lemail en texte brut.'; // Texte brut pour les clients email qui ne supportent pas HTML

   
    $mail->send();
   
if ($mail->send()) {
  echo 'Email Sent successfully !  ' ;
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
     echo 'Erreur: ' . $mail->ErrorInfo; // Afficher les erreurs de PHPMailer
    echo "
    <script>
    
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            confirmButtonText: 'OK'
            text: '" . addslashes($mail->ErrorInfo) . "'
             
            
        });
    </script>
    ";
}

} catch (Exception $e) {
     
       echo 'Erreur: ' . $mail->ErrorInfo; // Afficher les erreurs de PHPMailer

}


 
