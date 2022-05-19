<?php 
include 'config.php';
$id=$_POST['ID'];
$bulan=$_POST['EBULAN'];
$hari=$_POST['EHARI'];
$hadir=$_POST['EHADIR'];
$p_hdr=number_format($_POST['EP_HDR'],0,'.',',');
$lambat=$_POST['ELAMBAT'];
$p_lbt=number_format($_POST['EP_LBT'],0,'.',',');
$lembur=$_POST['ELEMBUR'];
$p_lbr=number_format($_POST['EP_LBR'],0,'.',',');
$total=number_format($_POST['ETOTAL'],2,'.',',');

mysqli_query($GLOBALS["___mysqli_ston"], "update absensi set BULAN='$bulan', HARI='$hari', HADIR='$hadir', P_HDR='$p_hdr', LAMBAT='$lambat', P_LBT='$p_lbt', LEMBUR='$lembur', P_LBR='$p_lbr', TOTAL='$total', ACC='' where ID='$id'");
header("location:absensi");
?>