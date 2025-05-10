<?php
 

include 'server/server.php' ?>

<?php
require('fpdf/fpdf.php');

 if (!isset($_GET['id_facture'])) {
    die("ID de facture non spécifié.");
}

$id_facture = intval($_GET['id_facture']);
$query = "SELECT * FROM facture WHERE id = $id_facture";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    die("Facture introuvable.");
}

$facture = $result->fetch_assoc();

$colorPrimary = [0, 102, 204];
$colorSecondary = [230, 230, 230];
define('COLOR_PRIMARY', [0, 102, 204]);
define('COLOR_SECONDARY', [230, 230, 230]);

class PDF extends FPDF {
    protected $primaryColor;
    protected $secondaryColor;

    function __construct($primaryColor, $secondaryColor) {
        parent::__construct();
        $this->primaryColor = $primaryColor;
        $this->secondaryColor = $secondaryColor;
    }

    function Header() {
        // Logo
        if (file_exists('kk.png')) {
            $this->Image('kk.png', 10, 10, 30);
        }

        // Nom de l'entreprise
        $this->SetFont('Arial', 'B', 14);
        $this->SetTextColor($this->primaryColor[0], $this->primaryColor[1], $this->primaryColor[2]);
        $this->Cell(0, 10, 'Katim Health Care', 0, 1, 'R');

        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 5, 'Adresse : GUELIZ , MARAKECH, MAROC', 0, 1, 'R');
        $this->Cell(0, 5, 'Telephone : +06 61 64 64 74 ', 0, 1, 'R');
        $this->Cell(0, 5, 'Email : contact@katimhealthcare.com', 0, 1, 'R');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 10, 'Merci de votre confiance.', 0, 1, 'C');
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF($colorPrimary, $colorSecondary);
$pdf->AddPage();


// Titre de la facture
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor($colorPrimary[0], $colorPrimary[1], $colorPrimary[2]);
$pdf->Cell(0, 10, 'Facture - #' . $id_facture, 0, 1, 'C');
$pdf->Ln(10);

// Informations Patient et Facture
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor($colorSecondary[0], $colorSecondary[1], $colorSecondary[2]);
$pdf->Cell(100, 10, 'Patient : ' . $facture['patient'], 0, 0, 'L', true);
$pdf->Cell(0, 10, 'Date : ' . $facture['date_facture'], 0, 1, 'R', true);

$pdf->Cell(100, 10, 'Docteur : ' . $facture['doctor'], 0, 1, 'L', true);
$pdf->Ln(10);

// Détails de la facture
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor($colorPrimary[0], $colorPrimary[1], $colorPrimary[2]);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(100, 10, 'Motif', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Montant', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100, 10, $facture['motif'], 1, 0, 'L', true);
$pdf->Cell(50, 10, number_format($facture['montant'], 2) . ' DH', 1, 1, 'C', true);

$pdf->Ln(10);

// Total
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor($colorSecondary[0], $colorSecondary[1], $colorSecondary[2]);
$pdf->Cell(100, 10, 'Total :', 0, 0, 'R', true);
$pdf->SetTextColor($colorPrimary[0], $colorPrimary[1], $colorPrimary[2]);
$pdf->Cell(50, 10, number_format($facture['montant'], 2) . ' DH', 0, 1, 'C', true);

// Affichage du PDF
$pdf->Output('I', 'Facture-' . $id_facture . '.pdf');

  