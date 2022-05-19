<?php 
include 'config.php';
$nisr=$_GET['nisr'];
$tunjangan=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tunjangan where NISR='$nisr'");
	while($s=mysqli_fetch_array($tunjangan)){
		if ($s['ACC']=="YA"){	
			mysqli_query($GLOBALS["___mysqli_ston"], "update tunjangan set ACC='' where NISR='$nisr'");
		}else{
			mysqli_query($GLOBALS["___mysqli_ston"], "update tunjangan set ACC='YA' where NISR='$nisr'");
		}
header("location:tunjangan");
	}
?>