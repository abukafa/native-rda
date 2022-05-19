<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Image('../img/kop.jpg',1,0.6,13,2); 
$pdf->Line(1,2.7,28.5,2.7);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,2.8,28.5,2.8);   
$pdf->SetLineWidth(0);

$pdf->ln(2.2);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'D A T A    A N G G O T A',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,0.7,'Update : ' . date('d M Y'),0,1,'C');

$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0.75, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'NISR', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(0.75, 0.8, 'G', 1, 0, 'C');
$pdf->Cell(6.5, 0.8, 'Alamat', 1, 0, 'C');
$pdf->Cell(0.75, 0.8, 'G', 1, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Gol', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Sub Gol', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Jabatan', 1, 0, 'C');
$pdf->Cell(2.1, 0.8, 'Laznah', 1, 0, 'C');
$pdf->Cell(1.15, 0.8, 'Status', 1, 1, 'C');
$no=1;
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri order by NISR");
while($lihat=mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(0.75, 0.7, $no,1,0, 'C');
	$pdf->Cell(2, 0.7, $lihat['NISR'],1,0, 'C');
	$pdf->Cell(4, 0.7, $lihat['NAMA'],1,0, 'L');
	$pdf->Cell(0.75, 0.7, substr($lihat['GENDER'],0,1),1, 0, 'C');
	$pdf->Cell(6.5, 0.7, substr($lihat['ALAMAT'],0,37). " -",1,0, 'L');
	$pdf->Cell(0.75, 0.7, $lihat['GRADE'],1, 0, 'C');
	$pdf->Cell(3.5, 0.7, $lihat['GOLONGAN'], 1, 0,'L');
	$pdf->Cell(4.5, 0.7, $lihat['SUB_GOLONG'], 1, 0,'L');
	$pdf->Cell(1.5, 0.7, substr($lihat['JABATAN'],0,5), 1, 0,'L');
	$pdf->Cell(2.1, 0.7, $lihat['LAZNAH'], 1, 0,'L');
	$pdf->Cell(1.15, 0.7, $lihat['STATUS_SANTRI'], 1, 1,'L');
	$no++;
}

$pdf->Output("data santri.pdf","I");

?>

