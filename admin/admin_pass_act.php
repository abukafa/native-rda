<?php 
include 'config.php';
$user=$_POST['user'];
$lama=($_POST['lama']);
$baru=$_POST['baru'];
$ulang=$_POST['ulang'];

$cek=mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$user' and pass='$lama'");
if(mysqli_num_rows($cek)==1){
	if($baru==$ulang){
		$b =($baru);
		mysqli_query($GLOBALS["___mysqli_ston"], "update admin set pass='$b' where uname='$user'");
		header("location:admin_pass?pesan=oke");
	}else{
		header("location:admin_pass?pesan=tdksama");
	}
}else{
	header("location:admin_pass?pesan=gagal");
}

 ?>