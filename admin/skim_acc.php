<?php 
include 'config.php';
$grade=$_GET['grade'];
$skim=mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim where GRADE='$grade'");
	while($s=mysqli_fetch_array($skim)){
		if ($s['ACC']=="YA"){	
			mysqli_query($GLOBALS["___mysqli_ston"], "update skim set ACC='' where GRADE='$grade'");
		}else{
			mysqli_query($GLOBALS["___mysqli_ston"], "update skim set ACC='YA' where GRADE='$grade'");
		}
header("location:skim");
	}
?>