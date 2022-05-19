<?php 
include 'config.php';
$nisr=$_GET['id'];

mysqli_query($GLOBALS["___mysqli_ston"], "delete from admin where id='$nisr'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
header("Location:admin");
 ?>