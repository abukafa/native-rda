<?php 
include 'config.php';
$nisr=$_POST['nisr'];
$nama=$_POST['nama'];
$jab=$_POST['jab'];
$laz=$_POST['laz'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$akses=$_POST['akses'];

mysqli_query($GLOBALS["___mysqli_ston"], "insert into admin values('$nisr', '$uname', '$pass', '$nama', '$jab', '$laz', '$akses')");
header("location:admin");
?>