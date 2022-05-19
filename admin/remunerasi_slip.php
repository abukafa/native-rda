<?php
session_start();
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A5");

$santri=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where STATUS_SANTRI='AKTIF' and STATUS_RDA<>'SUSPEND' order by NAMA");
while($s=mysqli_fetch_array($santri)){	

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->Image('../img/kop.jpg',1,0.6,13,2); 
$pdf->Line(1,2.7,20,2.7);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,2.8,20,2.8);   
$pdf->SetLineWidth(0);

$pdf->ln(2);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'SLIP REMUNERASI',0,1,'C');
$pdf->ln(0.25);

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

$no=1;
$pdf->SetFont('Arial','',9);
$pdf->Cell(1.5, 0.5, 'Bulan', 0, 0, 'L');
$pdf->Cell(3, 0.5, ': ' . date('M-Y', strtotime(date('M-Y') . '- 1 month')), 0, 0, 'L');
$pdf->Cell(1.5, 0.5, 'Nama', 0, 0, 'L');
$pdf->Cell(9.5, 0.5, ': ' . $s['NAMA'], 0, 1, 'L');
$pdf->Cell(1.5, 0.5, 'Jabatan', 0, 0, 'L');
$pdf->Cell(3, 0.5, ': ' . $s['JABATAN'], 0, 0, 'L');
$pdf->Cell(1.5, 0.5, 'Laznah', 0, 0, 'L');
$pdf->Cell(3, 0.5, ': ' . $s['LAZNAH'], 0, 0, 'L');
$pdf->Cell(1.25, 0.5, 'Grade', 0, 0, 'L');
$pdf->Cell(2, 0.5, ': ' . $s['GRADE'], 0, 0, 'L');
$pdf->Cell(1.5, 0.5, 'Khidmat', 0, 0, 'L');
$pdf->Cell(2.5, 0.5, ': ' . $lama . ' Tahun', 0, 0, 'L');
$pdf->Cell(1.5, 0.5, 'Absensi', 0, 0, 'L');
	$absensi=mysqli_query($GLOBALS["___mysqli_ston"], "select * from absensi where NISR='$nisr'");
	while($a=mysqli_fetch_array($absensi)){
		$abs = round($a['TOTAL'],2) ;
$pdf->Cell(2, 0.5, ': ' . ($abs * 100) . ' %', 0, 1, 'L');
$pdf->Line(1,5,20,5);

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
	$tunjangan=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tunjangan where NISR='$nisr'");
	while($t=mysqli_fetch_array($tunjangan)){
	$potongan=mysqli_query($GLOBALS["___mysqli_ston"], "select * from potongan where NISR='$nisr'");
	while($p=mysqli_fetch_array($potongan)){
		
$pdf->ln(0.25);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(9.5, 0.75, 'PENDAPATAN', 1, 0, 'C');
$pdf->Cell(5, 0.75, 'POTONGAN', 1, 0, 'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(4.5, 0.75, date('d M Y'), 'T,R', 0, 'C');
$pdf->Cell(0, 0.75, '', 0, 1, 'C');

$pdf->Cell(2, 0.5, 'Honor Pokok', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($honor,0,'.',','), 0, 0, 'R');
$pdf->Cell(5, 0.5, '' , 'R', 0, 'C');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Seragam' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($p['P_SRG'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.25, 0.5, '', 0, 0, 'C');
$pdf->Cell(4.5, 3.5, '', 'L,R', 0, 'C');
$pdf->Cell(0, 0.5, '', 0, 1, 'C');
$pdf->Cell(2, 0.5, 'Uang Makan', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($makan,0,'.',','), 0, 0, 'R');
$pdf->Cell(5, 0.5, '' , 'R', 0, 'C');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Atribut' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($p['P_ATR'],0,'.',','), 0, 1, 'R');
$pdf->Cell(2, 0.5, 'Transport', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($trans,0,'.',','), 0, 0, 'R');
$pdf->Cell(5, 0.5, '' , 'R', 0, 'C');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Kesehatan' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($p['P_KES'],0,'.',','), 0, 1, 'R');
$pdf->Cell(2, 0.5, 'Tunjangan', 'L', 0, 'L');
$pdf->Cell(7.5, 0.5, '' , 'R', 0, 'C');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Rumah' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($p['P_RMH'],0,'.',','), 0, 1, 'R');
$pdf->Cell(2, 0.5, '- Jabatan', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_JAB'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.5, 0.5, '', 0, 0, 'L');
$pdf->Cell(2, 0.5, '- Atribut', 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_ATR'],0,'.',','), 'R', 0, 'R');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Kasbon' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($p['P_BON'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.25, 0.5, '', 0, 0, 'C');

$uname = $_SESSION['uname'];
$admin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname'");
while($u=mysqli_fetch_array($admin)){
$pdf->SetFont('Arial','B',9);
$pdf->Cell(4.5, 0.65, ucwords(strtolower($u['name'])), 0, 0, 'C');
$pdf->Cell(0, 0.5, '', 0, 1, 'C');
}

$pdf->SetFont('Arial','',9);
$pdf->Cell(2, 0.5, '- Status', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_STT'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.5, 0.5, '', 0, 0, 'L');
$pdf->Cell(2, 0.5, '- Hari Raya', 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_HRA'],0,'.',','), 'R', 0, 'R');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Hutang' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($p['P_HTG'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.25, 0.5, '', 0, 0, 'C');
$pdf->Cell(4.5, 0.5, 'HRD - Remunerasi', 0, 1, 'C');

$pdf->Cell(2, 0.5, '- Anak', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_ANK'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.5, 0.5, '', 0, 0, 'L');
$pdf->Cell(2, 0.5, '- Haji Umroh', 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_HAJ'],0,'.',','), 'R', 0, 'R');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Zakat' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');

$ttunj = $t['T_JAB'] +	$t['T_STT'] +	$t['T_ANK'] +	$t['T_RMH'] +	$t['T_PRG'] +	$t['T_KES'] +	$t['T_SRG'] +	$t['T_ATR'] +	$t['T_HRA'] +	$t['T_HAJ'] +	$t['T_DKA'] +	$t['T_BNS'] +	$t['T_SPC'] +	$t['T_EKS'] ;
$tot = $pokok + $ttunj ;
$zkt = round($tot * 0.025,-3) ;
$tpot = $p['P_SRG'] +	$p['P_ATR'] +	$p['P_KES'] +	$p['P_RMH'] +	$p['P_BON'] +	$p['P_HTG'] +	$p['P_ZKT'] +	$p['P_INF'] +	$p['P_LIN'] ;
$total = $tot - $tpot ;

$pdf->Cell(2, 0.5, number_format($p['P_ZKT'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.25, 0.5, '', 0, 0, 'C');
$pdf->Cell(4.5, 0.65, 'Mengetahui', 'T', 0, 'C');
$pdf->Cell(0, 0.5, '', 0, 1, 'C');

$pdf->Cell(2, 0.5, '- Rumah', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_RMH'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.5, 0.5, '', 0, 0, 'L');
$pdf->Cell(2, 0.5, '- Duka', 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_DKA'],0,'.',','), 'R', 0, 'R');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Infaq' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($p['P_INF'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.25, 0.5, '', 0, 0, 'C');
$pdf->Cell(4.5, 3.25, '', 'L,R,B', 0, 'C');
$pdf->Cell(0, 0.5, '', 0, 1, 'C');
$pdf->Cell(2, 0.5, '- Program', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_PRG'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.5, 0.5, '', 0, 0, 'L');
$pdf->Cell(2, 0.5, '- Bonus', 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_BNS'],0,'.',','), 'R', 0, 'R');
$pdf->Cell(0.25, 0.5, '' , 0, 0, 'C');
$pdf->Cell(2, 0.5, 'Lainnya' , 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($p['P_LIN'],0,'.',','), 0, 1, 'R');
$pdf->Cell(2, 0.5, '- Kesehatan', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_KES'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.5, 0.5, '', 0, 0, 'L');
$pdf->Cell(2, 0.5, '- Spesial', 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_SPC'],0,'.',','), 'R', 1, 'R');
$pdf->Cell(2, 0.5, '- Seragam', 'L', 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_SRG'],0,'.',','), 0, 0, 'R');
$pdf->Cell(0.5, 0.5, '', 0, 0, 'L');
$pdf->Cell(2, 0.5, '- Eksekutif', 0, 0, 'L');
$pdf->Cell(0.5, 0.5, ': ' , 0, 0, 'C');
$pdf->Cell(2, 0.5, number_format($t['T_EKS'],0,'.',','), 'R', 1, 'R');

$pdf->SetFont('Arial','B',9);
$pdf->Cell(9.5, 0.5, number_format(($pokok + $ttunj),0,'.',',') , 1, 0, 'C');
$pdf->Cell(5, 0.5, number_format($tpot,0,'.',','), 1, 0, 'C');
$pdf->Cell(4.5, 1, 'Fine Afriani', 0, 0, 'C');
$pdf->Cell(0, 0.5, '', 0, 1, 'C');
$pdf->Cell(9.5, 0.5, '', 0, 0, 'R');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(5, 0.75, 'TOTAL : ' . number_format($total,0,'.',','), 1, 0, 'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(4.5, 0.75, 'Bendahara Umum', 0, 1, 'C');

}
}
}
}
}

$pdf->Output("SLIP " . date('M-Y', strtotime(date('M-Y') . '- 1 month')) . ".pdf","I");
?>