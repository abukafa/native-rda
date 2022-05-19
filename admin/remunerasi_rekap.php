<?php
session_start();
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
$pdf->Cell(0,0.7,'REKAP REMUNERASI',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,0.7,'Periode : ' . date('M-Y', strtotime(date('M-Y') . '- 1 month')),0,1,'C');

$pdf->ln(0.5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(9.5, 0.8, 'Identitas', 1, 0, 'C');
$pdf->Cell(1, 1.6, 'Abs', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Fix Benefit', 1, 0, 'C');
$pdf->Cell(7.5, 0.8, 'Tunjangan', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Potongan', 1, 0, 'C');
$pdf->Cell(2, 1.6, 'Total', 1, 0, 'C');
$pdf->Cell(0, 0.8, '', 0, 1, 'C');
$pdf->Cell(4, 0.8, 'Nama', 1, 0, 'C');
$pdf->Cell(0.75, 0.8, 'G', 1, 0, 'C');
$pdf->Cell(0.75, 0.8, 'Stt', 1, 0, 'C');
$pdf->Cell(1, 0.8, 'RDA', 1, 0, 'C');
$pdf->Cell(1, 0.8, 'Jab', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Laznah', 1, 0, 'C');
$pdf->Cell(1, 0.8, '', 0, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Honor', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Makan', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Trans', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Jabatan', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Status', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Anak', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Program', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'LAIN', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'Rumah', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'LAIN', 1, 0, 'C');
$pdf->Cell(2, 0.8, '', 0, 1, 'C');
$pdf->Cell(2, 0.1, '', 0, 1, 'C');
$no=1;
$thonor=0;
$tmakan=0;
$ttrans=0;
$tt_jab=0;
$tt_stt=0;
$tt_ank=0;
$tt_prg=0;
$ttlin=0;
$tp_rmh=0;
$tplin=0;
$tot=0;
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where STATUS_SANTRI='AKTIF' and STATUS_RDA<>'SUSPEND' order by LAZNAH, NAMA");
while($s=mysqli_fetch_array($query)){		
	$nisr = $s['NISR'] ;
	$grade = $s['GRADE'] ;
	$lama = date('Y') - $s['THN_GABUNG'] + 1 ;
	switch($lama){
		case 1:
			$loy = 0.5 ;
			break;
		case 2:
			$loy = 0.6 ;
			break;
		case 3:
			$loy = 0.8 ;
			break;
		case 4:
			$loy = 1.0 ;
			break;
		case 5:
			$loy = 1.1 ;
			break;
		case 6:
			$loy = 1.3 ;
			break;
		case 7:
			$loy = 1.5 ;
			break;
		case 8:
			$loy = 1.7 ;
			break;
		case 9:
			$loy = 1.9 ;
			break;
		case 10:
			$loy = 2.0 ;
			break;
		default:
			$loy = 2.1 ;
			break;
	}
$pdf->SetFont('Arial','',8);
$pdf->Cell(4, 0.7, $s['NAMA'],1,0, 'L');
$pdf->Cell(0.75, 0.7, $s['GRADE'],1,0, 'C');
$pdf->Cell(0.75, 0.7, substr($s['STATUS_SANTRI'],0,1),1,0, 'C');
$pdf->Cell(1, 0.7, substr($s['STATUS_RDA'],0,3),1,0, 'C');
$pdf->Cell(1, 0.7, substr($s['JABATAN'],0,4),1,0, 'C');
$pdf->Cell(2, 0.7, $s['LAZNAH'],1,0, 'L');
	$absensi=mysqli_query($GLOBALS["___mysqli_ston"], "select * from absensi where NISR='$nisr'");
	while($a=mysqli_fetch_array($absensi)){
		$abs = round($a['TOTAL'],2) ;
$pdf->Cell(1, 0.7, ($abs * 100) . '%',1,0, 'C');
	$skim=mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim where GRADE='$grade'");
	while($k=mysqli_fetch_array($skim)){
		if($s['STATUS_SANTRI']=="AKTIF" && $s['STATUS_RDA']=="KHIDMAT" && $lama >= 1){
			$honor = $k['HONOR'] * $loy ;
		}else{
			$honor = 0 ;
		}
		if($s['STATUS_SANTRI']=="AKTIF" && $lama >= 1 && $a['TOTAL'] >= 90){
			$makan = $k['MAKAN'] * 1 ;
			$trans = $k['TRANSPORT'] * 1 ;
		}else if($s['STATUS_SANTRI']=="AKTIF" && $lama >= 1 && $a['TOTAL'] < 90){
			$makan = $k['MAKAN'] * $abs ;
			$trans = $k['TRANSPORT'] * $abs ;
		}
	$pokok = $honor + $makan + $trans ;
$pdf->Cell(1.5, 0.7, number_format($honor,0,'.',','),1,0, 'R');
$pdf->Cell(1.5, 0.7, number_format($makan,0,'.',','),1,0, 'R');
$pdf->Cell(1.5, 0.7, number_format($trans,0,'.',','),1,0, 'R');
	$tunjangan=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tunjangan where NISR='$nisr'");
	while($t=mysqli_fetch_array($tunjangan)){
	$tlin = $t['T_RMH'] + $t['T_KES'] +	$t['T_SRG'] +	$t['T_ATR'] +	$t['T_HRA'] +	$t['T_HAJ'] +	$t['T_DKA'] +	$t['T_BNS'] +	$t['T_SPC'] +	$t['T_EKS'] ;
$pdf->Cell(1.5, 0.7, number_format($t['T_JAB'],0,'.',','),1,0, 'R');
$pdf->Cell(1.5, 0.7, number_format($t['T_STT'],0,'.',','),1,0, 'R');
$pdf->Cell(1.5, 0.7, number_format($t['T_ANK'],0,'.',','),1,0, 'R');
$pdf->Cell(1.5, 0.7, $t['T_PRG'],1,0, 'R');
$pdf->Cell(1.5, 0.7, number_format($tlin,0,'.',','),1,0, 'R');
	$potongan=mysqli_query($GLOBALS["___mysqli_ston"], "select * from potongan where NISR='$nisr'");
	while($p=mysqli_fetch_array($potongan)){
	$plin = $p['P_SRG'] +	$p['P_ATR'] +	$p['P_KES']  +	$p['P_BON'] +	$p['P_HTG'] +	$p['P_ZKT'] +	$p['P_INF'] +	$p['P_LIN'] ;
	$total = $pokok + ($tlin + $t['T_JAB'] + $t['T_STT'] + $t['T_ANK'] + $t['T_PRG']) - ($plin + $p['P_RMH']) ;
$pdf->Cell(1.5, 0.7, number_format($p['P_RMH'],0,'.',','),1,0, 'R');
$pdf->Cell(1.5, 0.7, number_format($plin,0,'.',','),1,0, 'R');
$pdf->Cell(2, 0.7, number_format($total,0,'.',','),1,1, 'R');		

$thonor+=$honor;
$tmakan+=$makan;
$ttrans+=$trans;
$tt_jab+=$t['T_JAB'];
$tt_stt+=$t['T_STT'];
$tt_ank+=$t['T_ANK'];
$tt_prg+=$t['T_PRG'];
$ttlin+=$tlin;
$tp_rmh+=$p['P_RMH'];
$tplin+=$plin;
$tot+=$total;		
$no++;
}
}
}
}
}
$pdf->ln(0.1);
$pdf->Cell(10.5, 0.8, 'TOTAL', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, number_format($thonor,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($tmakan,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($ttrans,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($tt_jab,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($tt_stt,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($tt_ank,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($tt_prg,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($ttlin,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($tp_rmh,0,'.',','), 1, 0, 'R');
$pdf->Cell(1.5, 0.8, number_format($tplin,0,'.',','), 1, 0, 'R');
$pdf->Cell(2, 0.8, number_format($tot,0,'.',','), 1, 1, 'R');

$pdf->ln(1.5);
$pdf->SetFont('Arial','',10);
$pdf->Cell(9.5, 0.5, '', 0, 0, 'C');
$pdf->Cell(8.5, 0.5, '', 0, 0, 'C');
$pdf->Cell(9.5, 0.5,"Tasikmalaya, ".date("d M Y"), 0, 1, 'C');
$pdf->Cell(9.5, 0.5,'Ketua Yayasan', 0, 0, 'C');
$pdf->Cell(8.5, 0.5, '', 0, 0, 'C');
$pdf->Cell(9.5, 0.5,'HRD - Remunerasi', 0, 1, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(9.5, 0.5,'Abu Fauzana', 0, 0, 'C');
$pdf->Cell(8.5, 0.5, '', 0, 0, 'C');

$uname = $_SESSION['uname'];
$admin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname'");
while($u=mysqli_fetch_array($admin)){
	
$pdf->Cell(9.5, 0.5, ucwords(strtolower($u['name'])) , 0, 1, 'C');
}

$pdf->Output("Skim Remunerasi.pdf","I");

?>

