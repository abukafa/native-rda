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
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,0.7,'Rekap Tunjangan',0,1,'C');
$pdf->SetFont('Arial','B',10);
$prd = date('M-Y', strtotime(date('M-Y') . '- 1 month')) ;
$pdf->Cell(0,0.7,'Periode : ' . $prd ,0,1,'C');

$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(244,164,96);
$pdf->Cell(1, 1.6, 'No', 1, 0, 'C');
$pdf->Cell(4, 1.6, 'Nama', 1, 0, 'C');
$pdf->Cell(21, 0.8, 'Tunjangan', 1, 0, 'C');
$pdf->Cell(1.5, 1.6, 'TOTAL', 1, 1, 'C');
$pdf->ln(-0.8);
$pdf->Cell(1, 0.8, '', 0, 0, 'C');
$pdf->Cell(4, 0.8, '', 0, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Jabatan', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Status', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Anak', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Rumah', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Program', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Sehat', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Seragam', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Atribut', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'THR', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Haji', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Duka', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Bonus', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Special', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Eks', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, '', 0, 1, 'C');

$pdf->Cell(27.5, 0.1, '', 0, 1, 'C');

$no=1;
$santri=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where STATUS_RDA<>'SUSPEND' order by NAMA");
	while($s=mysqli_fetch_array($santri)){
$pdf->SetFont('Arial','',8);
$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
$pdf->Cell(4, 0.8, $s['NAMA'], 1, 0, 'L');
$nisr = $s['NISR'] ;
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tunjangan where NISR='$nisr'");
	while($t=mysqli_fetch_array($query)){
if($s['T_JAB']=="YA"){ $jab=1; }else{ $jab=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_JAB'],0,'.',','), 1, 0, 'R', $jab);
if($s['T_STT']=="YA"){ $stt=1; }else{ $stt=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_STT'],0,'.',','), 1, 0, 'R', $stt);
if($s['T_ANK']=="YA"){ $ank=1; }else{ $ank=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_ANK'],0,'.',','), 1, 0, 'R', $ank);
if($s['T_RMH']=="YA"){ $rmh=1; }else{ $rmh=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_RMH'],0,'.',','), 1, 0, 'R', $rmh);
if($s['T_PRG']=="YA"){ $prg=1; }else{ $prg=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_PRG'],0,'.',','), 1, 0, 'R', $prg);
if($s['T_KES']=="YA"){ $kes=1; }else{ $kes=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_KES'],0,'.',','), 1, 0, 'R', $kes);
if($s['T_SRG']=="YA"){ $srg=1; }else{ $srg=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_SRG'],0,'.',','), 1, 0, 'R', $srg);
if($s['T_ATR']=="YA"){ $atr=1; }else{ $atr=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_ATR'],0,'.',','), 1, 0, 'R', $atr);
if($s['T_HRA']=="YA"){ $hra=1; }else{ $hra=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_HRA'],0,'.',','), 1, 0, 'R', $hra);
if($s['T_HAJ']=="YA"){ $haj=1; }else{ $haj=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_HAJ'],0,'.',','), 1, 0, 'R', $haj);
if($s['T_DKA']=="YA"){ $dka=1; }else{ $dka=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_DKA'],0,'.',','), 1, 0, 'R', $dka);
if($s['T_BNS']=="YA"){ $bns=1; }else{ $bns=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_BNS'],0,'.',','), 1, 0, 'R', $bns);
if($s['T_SPC']=="YA"){ $spc=1; }else{ $spc=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_SPC'],0,'.',','), 1, 0, 'R', $spc);
if($s['T_EKS']=="YA"){ $eks=1; }else{ $eks=0; }
$pdf->Cell(1.5, 0.8, number_format($t['T_EKS'],0,'.',','), 1, 0, 'R', $eks);
$total = $t['T_JAB'] + $t['T_STT'] + $t['T_ANK'] + $t['T_RMH'] + $t['T_PRG'] + $t['T_KES'] + $t['T_SRG'] + $t['T_ATR'] + $t['T_HRA'] + $t['T_HAJ'] + $t['T_DKA'] + $t['T_BNS'] + $t['T_SPC'] + $t['T_EKS'] ;
$pdf->Cell(1.5, 0.8, number_format($total,0,'.',','), 1, 1, 'R');
$no++;
}
}
$pdf->Output("Skim Remunerasi.pdf","I");

?>

