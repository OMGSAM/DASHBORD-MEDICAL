<?php
include 'server/server.php';
require('fpdf/fpdf.php');

if (!isset($_GET['id_prescription'])) {
    die("ID de prescription non spécifié.");
}

$id_prescription = intval($_GET['id_prescription']);
$query = "SELECT * FROM prescription WHERE id = $id_prescription";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    die("Prescription introuvable.");
}

$prescription = $result->fetch_assoc();

$colorPrimary = [0, 102, 204];
$colorSecondary = [230, 230, 230];

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
        $this->Cell(0, 5, 'Adresse : GUELIZ, MARAKECH, MAROC', 0, 1, 'R');
        $this->Cell(0, 5, 'Telephone : +06 61 64 64 74', 0, 1, 'R');
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

// Titre de la prescription
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor($colorPrimary[0], $colorPrimary[1], $colorPrimary[2]);
$pdf->Cell(0, 10, 'Prescription - #' . $id_prescription, 0, 1, 'C');
$pdf->Ln(10);

// Informations Patient et Médecin
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor($colorSecondary[0], $colorSecondary[1], $colorSecondary[2]);
$pdf->Cell(100, 10, 'Patient : ' . $prescription['patient'], 0, 0, 'L', true);
$pdf->Cell(0, 10, 'Date-Fin-prescription : ' . $prescription['end_date'], 0, 1, 'R', true);

$pdf->Cell(100, 10, 'Docteur : ' . $prescription['doctor'], 0, 1, 'L', true);
$pdf->Ln(10);

// Détails de la prescription
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor($colorPrimary[0], $colorPrimary[1], $colorPrimary[2]);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(60, 10, 'Medicament', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Dosage', 1, 0, 'C', true);
$pdf->Cell(80, 10, 'Instructions', 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(60, 10, $prescription['medication'], 1, 0, 'L', true);
$pdf->Cell(40, 10, $prescription['dosage'], 1, 0, 'L', true);
$pdf->Cell(80, 10, $prescription['instructions'], 1, 0, 'C', true);

$pdf->Ln(10);

// Fin de la prescription
$pdf->SetFont('Arial', 'I', 10);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(0, 10, 'Fin de la prescription', 0, 1, 'C');

// Affichage du PDF
$pdf->Output('I', 'Prescription-' . $id_prescription . '.pdf');

