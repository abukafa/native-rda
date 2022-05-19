<?php 
include 'config.php';
$nisr=$_GET['nisr'];
$absensi=mysqli_query($GLOBALS["___mysqli_ston"], "select * from absensi where NISR='$nisr'");
	while($s=mysqli_fetch_array($absensi)){
		if ($s['ACC']=="YA"){	
			mysqli_query($GLOBALS["___mysqli_ston"], "update absensi set ACC='' where NISR='$nisr'");
		}else{
			mysqli_query($GLOBALS["___mysqli_ston"], "update absensi set ACC='YA' where NISR='$nisr'");
		}
header("location:absensi");
	}
?>