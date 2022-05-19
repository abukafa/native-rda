<?php 
include 'config.php';
$nisr=$_GET['nisr'];
$potongan=mysqli_query($GLOBALS["___mysqli_ston"], "select * from potongan where NISR='$nisr'");
	while($s=mysqli_fetch_array($potongan)){
		if ($s['ACC']=="YA"){	
			mysqli_query($GLOBALS["___mysqli_ston"], "update potongan set ACC='' where NISR='$nisr'");
		}else{
			mysqli_query($GLOBALS["___mysqli_ston"], "update potongan set ACC='YA' where NISR='$nisr'");
		}
header("location:potongan");
	}
?>