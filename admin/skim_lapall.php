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
$pdf->Cell(0,0.7,'S K I M   R E M U N E R A S I',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,0.7,'Update : ' . date('d M Y'),0,1,'C');

$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(1.5, 1.6, 'Grade', 1, 0, 'C');
$pdf->Cell(4, 1.6, 'Gol', 1, 0, 'C');
$pdf->Cell(5, 1.6, 'Sub Gol', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Fixed Benefit', 1, 0, 'C');
$pdf->Cell(10, 0.8, 'Tunjangan', 1, 0, 'C');
$pdf->Cell(1, 1.6, 'ACC', 1, 1, 'C');
$pdf->ln(-0.8);
$pdf->Cell(10.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(2, 0.8, 'Honor', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Makan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Transport', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jabatan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Status', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Anak', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Program', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Kesehatan', 1, 1, 'C');
$no=1;
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim");
while($lihat=mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(1.5, 0.7, $lihat['GRADE'],1,0, 'C');
	$pdf->Cell(4, 0.7, $lihat['GOL'],1,0, 'L');
	$pdf->Cell(5, 0.7, $lihat['SUB_GOL'],1,0, 'L');
	$pdf->Cell(2, 0.7, number_format($lihat['HONOR'],0,'.',','),1, 0, 'R');
	$pdf->Cell(2, 0.7, number_format($lihat['MAKAN'],0,'.',','),1,0, 'R');
	$pdf->Cell(2, 0.7, number_format($lihat['TRANSPORT'],0,'.',','),1,0, 'R');
	$pdf->Cell(2, 0.7, number_format($lihat['T_JAB'],0,'.',','),1,0, 'R');
	$pdf->Cell(2, 0.7, number_format($lihat['T_STT'],0,'.',','),1,0, 'R');
	$pdf->Cell(2, 0.7, number_format($lihat['T_ANK'],0,'.',','),1,0, 'R');
	$pdf->Cell(2, 0.7, number_format($lihat['T_PRG'],0,'.',','),1,0, 'R');
	$pdf->Cell(2, 0.7, number_format($lihat['T_KES'],0,'.',','),1,0, 'R');
	$pdf->Cell(1, 0.7, $lihat['ACC'],1,1, 'C');
	$no++;
}

$pdf->Output("Skim Remunerasi.pdf","I");

?>

