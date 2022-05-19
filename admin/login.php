<?php 
session_start();
include 'config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=md5($pass);
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname' and pass='$pass'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
if(mysqli_num_rows($query)==1){
	$_SESSION['uname']=$uname;
	header("location:home");
}else{
	header("location:../index?pesan=gagal")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	// mysql_error();
}
// echo $pas;
 ?>