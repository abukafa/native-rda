<?php
include 'header.php';
?>
<html>
<head>
</head>
<body>	
  <div class="container"> 
  <?php 
  if(isset($_GET['pesan'])){
	$pesan=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['pesan']);
	if($pesan=="oke"){
		echo "<center><div class='alert alert-success'>Password telah dirubah  !!     Terima kasih !! </div></center>";
	}else if($pesan=="tdksama"){
		echo "<center><div class='alert alert-warning'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div></center>";
	}else if($pesan=="gagal"){
		echo "<center><div class='alert alert-danger'>Password gagal di ganti !!     Periksa Kembali Password yang anda masukkan !!</div></center>";
	}
  }
  ?>
  <center><h2>Ganti Password</h2></center>
  <br/><br/>
  <br/>
  <div class="container-fluid">
	<form action="admin_pass_act.php" method="post">
		<div class="col-md-4 col-md-offset-4 kotak">
		<div class="form-group">
			<input name="user" type="text" class="form-control" value="<?php echo $_SESSION['uname']; ?>" readonly="yes">
		</div>
		<div class="form-group">
			<label>Password Lama</label>
			<input name="lama" type="password" class="form-control" placeholder="Password Lama ..">
		</div>
		<div class="form-group">
			<label>Password Baru</label>
			<input name="baru" type="password" class="form-control" placeholder="Password Baru ..">
		</div>
		<div class="form-group">
			<label>Ulangi Password</label>
			<input name="ulang" type="password" class="form-control" placeholder="Ulangi Password ..">
		</div>	
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Simpan">
			<input type="reset" class="btn btn-danger" value="reset">
		</div>										
		</div>		
	</form>
  </div>
</div>
</body>
</html>