<?php 
include 'config.php';
$nisr=$_GET['nisr'];
$santri=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where NISR='$nisr'");
	while($s=mysqli_fetch_array($santri)){
		if ($s['ACC']=="YA"){	
			mysqli_query($GLOBALS["___mysqli_ston"], "update santri set ACC='' where NISR='$nisr'");
		}else{
			mysqli_query($GLOBALS["___mysqli_ston"], "update santri set ACC='YA' where NISR='$nisr'");
		}
header("location:santri");
	}
?>