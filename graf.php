<?php
// Connexion à la base
include 'server/server.php';

// Récupérer les revenus groupés par jour
$query = "
    SELECT DATE(date_facture) AS date, SUM(montant) AS total 
    FROM facture 
    GROUP BY DATE(date_facture) 
    ORDER BY DATE(date_facture) ASC
";

$result = $conn->query($query);

// Stocker les dates et les montants dans des tableaux
$dates = [];
$revenus = [];

while ($row = $result->fetch_assoc()) {
    $dates[] = $row['date'];
    $revenus[] = (float)$row['total'];
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Évolution des Revenus</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
 
    </style>
</head>
<body>

<div style="width:100%; margin:auto;">
    <center><h3>Évolution des revenus (par jour)</h3></center> 
    <canvas id="revenueChart"></canvas>
</div>

<script>
const ctx = document.getElementById('revenueChart').getContext('2d');

const revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($dates) ?>,
        datasets: [{
            label: 'Montant total (MAD)',
            data: <?= json_encode($revenus) ?>,
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.3,
            fill: true,
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Date'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Revenus en MAD'
                },
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
