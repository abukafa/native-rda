<?php 
include 'config.php';
$id=$_POST['ID'];
$nis=$_POST['NISR'];
$nam=$_POST['NAMA'];
$ben=$_POST['BENTUK'];
$ket=$_POST['KET'];
$lok=$_POST['LOKASI'];
$tah=$_POST['TAHUN'];

mysqli_query($GLOBALS["___mysqli_ston"], "update kompetensi set BENTUK='$ben', KET='$ket', LOKASI='$lok', TAHUN='$tah' where ID='$id'");
header("location:santri_edit?nisr=$nis");
?>