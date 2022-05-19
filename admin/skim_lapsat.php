<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A5");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Image('../img/kop.jpg',1,0.6,13,2); 
$pdf->Line(1,2.7,20,2.7);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,2.8,20,2.8);   
$pdf->SetLineWidth(0);

$pdf->ln(2.5);
$grade=$_GET['grade'];
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim where grade='$grade'");
while($lihat=mysqli_fetch_array($query)){
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'S K I M    R E M U N E R A S I',0,1,'C');
$pdf->Cell(0,0.7,'G r a d e   ' . $lihat['GRADE'],0,1,'C');
$pdf->ln(0.5);

$no=1;
$pdf->SetFont('Arial','',10);
$pdf->Cell(6, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, ' Grade', 'L,T', 0, 'L');
$pdf->Cell(4, 0.8,":  " . $lihat['GRADE'],'T,R', 1, 'L');
$pdf->Cell(6, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, ' Golongan', 'L', 0, 'L');
$pdf->Cell(4, 0.8,":  " . $lihat['GOL'], 'R', 1,'L');
$pdf->Cell(6, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, ' Sub Golongan', 'L', 0, 'L');
$pdf->Cell(4, 0.8,":  " . $lihat['SUB_GOL'],'R', 1, 'L');
$pdf->Cell(6, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, ' Honor Pokok', 'L', 0, 'L');
$pdf->Cell(2, 0.8,":  " . number_format($lihat['HONOR'],0,'.',','),0, 0, '');
$pdf->Cell(2, 0.8, '', 'R', 1, 'C');
$pdf->Cell(6, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, ' Uang Makan', 'L', 0, 'L');
$pdf->Cell(2, 0.8,":  " . number_format($lihat['MAKAN'],0,'.',','), 0, 0,'L');
$pdf->Cell(2, 0.8, '', 'R', 1, 'C');
$pdf->Cell(6, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, ' Transport', 'L', 0, 'L');
$pdf->Cell(2, 0.8,":  " . number_format($lihat['TRANSPORT'],0,'.',','), 0, 0,'L');
$pdf->Cell(2, 0.8, '', 'R', 1, 'C');
$pdf->Cell(6, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, ' ACC', 'L,B', 0, 'L');
$pdf->Cell(4, 0.8,":  " . $lihat['ACC'], 'R,B', 1,'L');


$no++;


$pdf->Output("Skim Grade " . $lihat['GRADE'] . ".pdf","I");
}
?>

