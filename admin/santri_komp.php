<?php 
include 'config.php';
$nis=$_POST['NISR'];
$nam=$_POST['NAMA'];
$ben=$_POST['BENTUK'];
$ket=$_POST['KET'];
$lok=$_POST['LOKASI'];
$tah=$_POST['TAHUN'];

mysqli_query($GLOBALS["___mysqli_ston"], "insert into kompetensi values('', '$nis', '$nam', '$ben', '$ket', '$lok', '$tah')");
header("location:santri_edit?nisr=$nis");
?>