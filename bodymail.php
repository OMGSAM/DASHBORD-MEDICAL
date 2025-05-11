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
            <img src='https://example.com/logo.png' alt='KATIM HEALTH CARE'>
            <h1>Facture Médicale</h1>
        </div>

        <!-- Body -->
        <div class='body'>
            <p>Bonjour <strong>$patient</strong>,</p>
            <p>Veuillez trouver ci-dessous les détails de votre facture du <strong>$date</strong> :</p>

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
            <p>KATIM HEALTH CARE | Tél: +212 600 000 000 | Email: info@katimhealthcare.com</p>
        </div>

    </div>
</div>

</body>
</html>
";
