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
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,0.7,'Rekap Potongan',0,1,'C');
$pdf->SetFont('Arial','B',10);
$prd = date('M-Y', strtotime(date('M-Y') . '- 1 month')) ;
$pdf->Cell(0,0.7,'Periode : ' . $prd ,0,1,'C');

$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(244,164,96);
$pdf->Cell(0.75, 1.6, 'No', 1, 0, 'C');
$pdf->Cell(3.25, 1.6, 'Nama', 1, 0, 'C');
$pdf->Cell(13.5, 0.8, 'Potongan', 1, 0, 'C');
$pdf->Cell(1.5, 1.6, 'TOTAL', 1, 1, 'C');
$pdf->ln(-0.8);
$pdf->Cell(0.75, 0.8, '', 0, 0, 'C');
$pdf->Cell(3.25, 0.8, '', 0, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Seragam', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Atribut', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Sehat', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Rumah', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Kasbon', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Hutang', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Zakat', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Infaq', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Lain-lain', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, '', 0, 1, 'C');

$pdf->Cell(27.5, 0.1, '', 0, 1, 'C');

$no=1;
$santri=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri WHERE STATUS_RDA<>'SUSPEND' order by NAMA");
	while($s=mysqli_fetch_array($santri)){
$pdf->SetFont('Arial','',8);
$pdf->Cell(0.75, 0.8, $no, 1, 0, 'C');
$pdf->Cell(3.25, 0.8, substr($s['NAMA'],0,17), 1, 0, 'L');
$nisr = $s['NISR'] ;
$potongan=mysqli_query($GLOBALS["___mysqli_ston"], "select * from potongan where NISR='$nisr'");
	while($p=mysqli_fetch_array($potongan)){
$tunjangan=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tunjangan where NISR='$nisr'");
	while($t=mysqli_fetch_array($tunjangan)){
if($t['T_SRG']>0){ $srg=1; }else{ $srg=0; }
$pdf->Cell(1.5, 0.8, number_format($p['P_SRG'],0,'.',','), 1, 0, 'R', $srg);
if($t['T_ATR']>0){ $atr=1; }else{ $atr=0; }
$pdf->Cell(1.5, 0.8, number_format($p['P_ATR'],0,'.',','), 1, 0, 'R', $atr);
if($t['T_KES']>0){ $kes=1; }else{ $kes=0; }
$pdf->Cell(1.5, 0.8, number_format($p['P_KES'],0,'.',','), 1, 0, 'R', $kes);
if($t['T_RMH']>0){ $rmh=1; }else{ $rmh=0; }
$pdf->Cell(1.5, 0.8, number_format($p['P_RMH'],0,'.',','), 1, 0, 'R', $rmh);
$pdf->Cell(1.5, 0.8, number_format($p['P_BON'],0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($p['P_HTG'],0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($p['P_ZKT'],0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($p['P_INF'],0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($p['P_LIN'],0,'.',','), 1, 0, 'R');
$total = $p['P_SRG'] + $p['P_ATR'] + $p['P_KES'] + $p['P_RMH'] + $p['P_BON'] + $p['P_HTG'] + $p['P_ZKT'] + $p['P_INF'] + $p['P_LIN'] ;
$pdf->Cell(1.5, 0.8, number_format($total,0,'.',','), 1, 1, 'R');
$no++;
}
}
}
$pdf->Output("Skim Remunerasi.pdf","I");

?>

