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
$pdf->Cell(19,0.7,"D A T A   A N G G O T A",0,10,'C');
$pdf->ln(0.3);

$no=1;
$nisr=$_GET['nisr'];
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where NISR='$nisr'");
while($lihat=mysqli_fetch_array($query)){

if(file_exists('../photo/'. $lihat['PANGGILAN'] . '.jpg')){
	$pdf->Image('../photo/'. $lihat['PANGGILAN'] . '.jpg',1.3,5,3,4.5);
 }else{
	$pdf->Image('../img/no.png',1.3,5,3,4.5);
}

$pdf->SetFont('Arial','',10);
$pdf->Cell(4, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, 'No. Induk', 0, 0, 'L');
$pdf->Cell(12, 0.8,": " . $lihat['NISR'],0, 1, 'L');
$pdf->Cell(4, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, 'No. KTP', 0, 0, 'L');
$pdf->Cell(12, 0.8,": " . $lihat['KTP'], 0, 1,'L');
$pdf->Cell(4, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Lengkap', 0, 0, 'L');
$pdf->Cell(12, 0.8,": " . $lihat['NAMA'],0, 1, 'L');
$pdf->Cell(4, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Panggilan', 0, 0, 'L');
$pdf->Cell(12, 0.8,": " . $lihat['PANGGILAN'],0, 1, 'L');
$pdf->Cell(4, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis Kelamin', 0, 0, 'L');
$pdf->Cell(12, 0.8,": " . $lihat['GENDER'], 0, 1,'L');
$pdf->Cell(4, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, 'Tempat Tgl Lahir', 0, 0, 'L');
$pdf->Cell(12, 0.8,": " . $lihat['TMP_LAHIR'] . ",  pada Tanggal " . $lihat['TGL_LAHIR'], 0, 1,'L');
$pdf->Cell(4, 0.8, '', 0, 0, 'C');
$pdf->Cell(3, 0.8, 'Status Keluarga', 0, 0, 'L');
$pdf->Cell(12, 0.8,": " . $lihat['STATUS'] . ",  Nama Pasangan : " . $lihat['PASANGAN'] . ",  Jumlah Anak : " . $lihat['JML_ANAK'], 0, 1,'L');
$pdf->ln(0.25);
$pdf->Cell(19, 1, 'ALAMAT LENGKAP', 1, 1, 'C');
$pdf->Cell(19, 0.8,$lihat['ALAMAT'], 0, 1,'C');
$pdf->Cell(19, 0.8,"Kec. " . $lihat['KEC'] . "  Kab. " . $lihat['KAB'] . "  Kode pos. " . $lihat['POS'], 0, 1,'C');
$pdf->ln(0.25);
$pdf->Cell(0.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Golongan Darah', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['GOL_DARAH'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'No. Handphone', 0, 0, 'L');
$pdf->Cell(6.5, 0.8,": " . $lihat['HANDPHONE'], 0, 1,'L');
$pdf->Cell(0.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Pendidikan Terakhir', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['PENDIDIKAN'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Alamat Email', 0, 0, 'L');
$pdf->Cell(6.5, 0.8,": " . $lihat['EMAIL'], 0, 1,'L');
$pdf->Cell(0.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Alamat Asal', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['ASAL'], 0, 1,'L');
$pdf->ln(0.25);
$pdf->Cell(19, 1, 'HR DATA', 1, 1, 'C');
$pdf->Cell(0.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tahun Gabung', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['THN_GABUNG'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Laznah', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['LAZNAH'], 0, 1,'L');
$pdf->Cell(0.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Grade', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['GRADE'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Jabatan', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['JABATAN'], 0, 1,'L');
$pdf->Cell(0.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Golongan', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['GOLONGAN'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Status Santri', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['STATUS_RDA'], 0, 1,'L');
$pdf->Cell(0.5, 0.8, '', 0, 0, 'C');
$pdf->Cell(3.5, 0.8, 'Sub Golongan', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['SUB_GOLONG'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Status RDA', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['STATUS_RDA'], 0, 1,'L');
$pdf->ln(0.25);
$pdf->Cell(0.5, 0.8, '', 'L,T', 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tunj Jabatan', 'T', 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_JAB'], 'T', 0,'L');
$pdf->Cell(3, 0.8, 'Tunj Kesehatan', 'T', 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_KES'], 'T,R', 1,'L');
$pdf->Cell(0.5, 0.8, '', 'L', 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tunj Status', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_STT'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Tunj Hari Raya', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_HAJ'], 'R', 1,'L');
$pdf->Cell(0.5, 0.8, '', 'L', 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tunj Anak', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_ANK'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Tunj Duka', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_DKA'], 'R', 1,'L');
$pdf->Cell(0.5, 0.8, '', 'L', 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tunj Rumah', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_RMH'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Tunj Haji Umroh', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_HAJ'], 'R', 1,'L');
$pdf->Cell(0.5, 0.8, '', 'L', 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tunj Program', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_PRG'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Tunj Bonus', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_BNS'], 'R', 1,'L');
$pdf->Cell(0.5, 0.8, '', 'L', 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tunj Seragam', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_SRG'], 0, 0,'L');
$pdf->Cell(3, 0.8, 'Tunj Spesial', 0, 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_SPC'], 'R', 1,'L');
$pdf->Cell(0.5, 0.8, '', 'L,B', 0, 'C');
$pdf->Cell(3.5, 0.8, 'Tunj Atribut', 'B', 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_ATR'], 'B', 0,'L');
$pdf->Cell(3, 0.8, 'Tunj Eksekutif', 'B', 0, 'L');
$pdf->Cell(6, 0.8,": " . $lihat['T_EKS'], 'B,R', 1,'L');

$pdf->ln(0.25);
$pdf->Cell(19, 1, 'KOMPETENSI', 1, 1, 'C');
$pdf->Cell(1, 1, 'No', 1, 0, 'C');
$pdf->Cell(6, 1, 'Bentuk', 1, 0, 'C');
$pdf->Cell(6, 1, 'Nama', 1, 0, 'C');
$pdf->Cell(4, 1, 'Lokasi', 1, 0, 'C');
$pdf->Cell(2, 1, 'Tahun', 1, 1, 'C');
$noo=1;
$komp=mysqli_query($GLOBALS["___mysqli_ston"], "select * from kompetensi where NISR='$nisr'");
while($k=mysqli_fetch_array($komp)){
$pdf->Cell(1, 0.8, $noo, 1, 0, 'C');
$pdf->Cell(6, 0.8, $k['BENTUK'], 1, 0, 'C');
$pdf->Cell(6, 0.8, $k['KET'], 1, 0, 'C');
$pdf->Cell(4, 0.8, $k['LOKASI'], 1, 0, 'C');
$pdf->Cell(2, 0.8, $k['TAHUN'], 1, 1, 'C');
$noo++;
}

$no++;
$pdf->Output($lihat['NAMA']. ".pdf","I");
}
?>

