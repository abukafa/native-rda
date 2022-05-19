<?php 
include 'config.php';
$nisr=$_GET['nisr'];

mysqli_query($GLOBALS["___mysqli_ston"], "delete from tunjangan where NISR='$nisr'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
header("Location:tunjangan");
 ?>