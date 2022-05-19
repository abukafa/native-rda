<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Image('../img/kop.jpg',1,0.6,13,2); 
$pdf->Line(1,2.7,20,2.7);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,2.8,20,2.8);   
$pdf->SetLineWidth(0);

$pdf->ln(2.2);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'REKAP ABSENSI',0,1,'C');
$pdf->SetFont('Arial','B',12);
$bul = date('M-Y', strtotime(date('M-Y') . '- 1 month')) ;
$pdf->Cell(0,0.7,'Bulan : ' . $bul,0,1,'C');

$pdf->SetFont('Arial','B',8);
$query_avg=mysqli_query($GLOBALS["___mysqli_ston"], "select AVG(HARI) as avg_hari from absensi where BULAN ='$bul'");
while($l=mysqli_fetch_array($query_avg)){
$pdf->Cell(0, 0.8,'Hari Kerja : ' . $l['avg_hari'], 0, 1, 'R');
}
$pdf->ln(0.25);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'NISR', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Hadir', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Lambat', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Lembur', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'Total', 1, 0, 'C');
$pdf->Cell(1, 0.8, 'ACC', 1, 1, 'C');
$no=1;
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from absensi where BULAN ='$bul' order by NAMA");
while($lihat=mysqli_fetch_array($query)){
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(1, 0.7, $no,1,0, 'C');
	$pdf->Cell(2, 0.7, $lihat['NISR'],1,0, 'C');
	$pdf->Cell(5, 0.7, $lihat['NAMA'],1,0, 'L');
	$pdf->Cell(1.25, 0.7, $lihat['HADIR'],1,0, 'C');
	$pdf->Cell(1.25, 0.7, number_format($lihat['P_HDR'],0,'.',',')." %",1,0, 'R');
	$pdf->Cell(1.25, 0.7, $lihat['LAMBAT'],1,0, 'C');
	$pdf->Cell(1.25, 0.7, number_format($lihat['P_LBT'],0,'.',',')." %",1,0, 'R');
	$pdf->Cell(1.25, 0.7, $lihat['LEMBUR'],1,0, 'C');
	$pdf->Cell(1.25, 0.7, number_format($lihat['P_LBR'],0,'.',',')." %",1,0, 'R');
	$pdf->Cell(1.25, 0.7, number_format($lihat['TOTAL'],2,'.',','),1,0, 'C');
	$ptotal = $lihat['TOTAL'] * 100 ;
	$pdf->Cell(1.25, 0.7, number_format($ptotal,0,'.',',')." %",1,0, 'R');
	$pdf->Cell(1, 0.7, $lihat['ACC'],1,1, 'C');
	$no++;
}

$pdf->Output("Rekap Absensi.pdf","I");

?>

