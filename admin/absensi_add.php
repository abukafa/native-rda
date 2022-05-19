<?php 
include 'config.php';
$id=$_POST['ID'];
$nisr=$_POST['NISR'];
$nama=$_POST['NAMA'];
$bulan=$_POST['BULAN'];
$hari=$_POST['HARI'];
$hadir=$_POST['HADIR'];
$p_hdr=$_POST['P_HDR'];
$lambat=$_POST['LAMBAT'];
$p_lbt=$_POST['P_LBT'];
$lembur=$_POST['LEMBUR'];
$p_lbr=$_POST['P_LBR'];
$total=$_POST['TOTAL'];


mysqli_query($GLOBALS["___mysqli_ston"], "insert into absensi values('', '$nisr', '$nama', '$bulan', '$hari', '$hadir', '$p_hdr', '$lambat', '$p_lbt', '$lembur', '$p_lbr', '$total', '')");
header("location:absensi");
?>