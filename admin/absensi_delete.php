<?php 
include 'config.php';
$id=$_GET['id'];

mysqli_query($GLOBALS["___mysqli_ston"], "delete from absensi where ID='$id'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
header("Location:absensi");
 ?>