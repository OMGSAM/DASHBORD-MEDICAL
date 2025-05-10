<?php
$to = "mohamed@gmail.com";
$subject = "ZAHYA";
$message = " BJR";
$headers = "From: pezaw50@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email envoyé avec succès to ", $to ;
} else {
    echo "Échec de l'envoi.";
}
