<?php 
include 'config.php';
$nisr=$_GET['nisr'];

mysqli_query($GLOBALS["___mysqli_ston"], "delete from potongan where NISR='$nisr'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
header("Location:potongan");
 ?>