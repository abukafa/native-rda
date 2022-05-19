<?php 
include 'config.php';
$id=$_GET['id'];

mysqli_query($GLOBALS["___mysqli_ston"], "delete from kompetensi where id='$id'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$prev = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])){
	$prev = $_SERVER['HTTP_REFERER'];
}
 ?>