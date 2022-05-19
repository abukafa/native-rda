<?php
include 'header.php';
?>
<html>
<head>
</head>
<?php
$id=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['id']);
$abs=mysqli_query($GLOBALS["___mysqli_ston"], "select * from absensi where ID='$id'");
while($a=mysqli_fetch_array($abs)){
?>
<body>	
  <div class="container"> 
  <center><h2>Edit Data Absensi</h2></center>
  <center><a class="btn" href="absensi"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a></center>
  <br/>
  <div class="container-fluid">
	<form action="absensi_update.php" method="post">
        <div class="row">
			<div class="col-md-2 col-md-offset-4">
				<div class="form-group">
				<input name="ID" type="text" class="form-control" value="<?php echo $a['ID']; ?>" readonly="yes">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
				<input name="NISR" type="text" class="form-control" value="<?php echo $a['NISR']; ?>" readonly="yes">
				</div>
			</div>
		</div>
        <div class="row">
		<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<input name="ENAMA" type="text" class="form-control" value="<?php echo $a['NAMA']; ?>" readonly="yes">
		</div>
		<div class="form-group">
			<label>Bulan</label>
			<select name="EBULAN" type="text" class="form-control">
				<option value="<?php echo $a['BULAN']; ?>"><?php echo $a['BULAN']; ?></option>
				<?php
					$bulan=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
					$jlh_bln=count($bulan);
						for($i=date('Y')-1; $i<=date('Y')+1; $i++){
					for($c=0; $c<$jlh_bln; $c+=1){
						echo"<option value=$bulan[$c]-$i> $bulan[$c]-$i </option>";
						}
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Hari</label>
			<select name="EHARI" id="EHARI" type="text" class="form-control" onchange="hitung()">
				<option value="<?php echo $a['HARI']; ?>"><?php echo $a['HARI']; ?></option>
				<?php
				for($i=0; $i<=31; $i++){
				echo"<option value='$i'> $i </option>";
				}
				?>
			</select>
		</div>							
		</div>	
		</div>		
        <div class="row">
		<div class="col-md-3 col-md-offset-4">
		<div class="form-group">
			<label>Kehadiran</label>
			<select name="EHADIR" id="EHADIR" type="submit" class="form-control" onchange="hitung()">
				<option value="<?php echo $a['HADIR']; ?>"><?php echo $a['HADIR']; ?></option>
				<?php
				for($i=0; $i<=31; $i++){
				echo"<option value='$i'> $i </option>";
				}
				?>
			</select>
		</div>	
		</div>
		<div class="col-md-1">
		<div class="form-group">
			<label>%</label>
			<input name="EP_HDR" id="EP_HDR" class="form-control" value="<?php echo $a['P_HDR']; ?>" readonly>
		</div>	
		</div>
		</div>
        <div class="row">
		<div class="col-md-3 col-md-offset-4">
		<div class="form-group">
			<label>Terlambat</label>
			<select name="ELAMBAT" id="ELAMBAT" type="submit" class="form-control" onchange="hitung()">
				<option value="<?php echo $a['LAMBAT']; ?>"><?php echo $a['LAMBAT']; ?></option>
				<?php
				for($i=0; $i<=31; $i++){
				echo"<option value='$i'> $i </option>";
				}
				?>
			</select>
		</div>	
		</div>
		<div class="col-md-1">
		<div class="form-group">
			<label>%</label>
			<input name="EP_LBT" id="EP_LBT" class="form-control" value="<?php echo $a['P_LBT']; ?>" readonly>
		</div>	
		</div>
		</div>
        <div class="row">
		<div class="col-md-3 col-md-offset-4">
		<div class="form-group">
			<label>Lembur</label>
			<select name="ELEMBUR" id="ELEMBUR" type="submit" class="form-control" onchange="hitung()">
				<option value="<?php echo $a['LEMBUR']; ?>"><?php echo $a['LEMBUR']; ?></option>
				<?php
				for($i=0; $i<=31; $i++){
				echo"<option value='$i'> $i </option>";
				}
				?>
			</select>
		</div>	
		</div>
		<div class="col-md-1">
		<div class="form-group">
			<label>%</label>
			<input name="EP_LBR" id="EP_LBR" class="form-control" value="<?php echo $a['P_LBR']; ?>" readonly>
		</div>	
		</div>
		</div>
        <div class="row">
		<div class="col-md-3 col-md-offset-4">
		<div class="form-group">
			<label>Total</label>
			<input name="ETOTAL" id="ETOTAL" class="form-control" value="<?php echo $a['TOTAL']; ?>" readonly>
		</div>	
		</div>
		<div class="col-md-1">
		<div class="form-group">
			<label>%</label>
			<input name="EP_TTL" id="EP_TTL" class="form-control" value="<?php echo $a['TOTAL'] * 100 ; ?>" readonly>
		</div>	
		</div>
		</div>
			<script type="text/javascript">    
			function hitung(){  
				var hr = document.getElementById('EHARI').value  ;
				var dr = document.getElementById('EHADIR').value  ;
				var bt = document.getElementById('ELAMBAT').value ;
				var br = document.getElementById('ELEMBUR').value ;
				var hdr = dr / hr * 100 ;
				var lbt = bt / hr * 10 ;
				var lbr = br / hr * 100 ;
				var tot = dr / hr - (bt/100) + (br/hr) * 0.2 ;
				var ttl = tot * 100 ;
					document.getElementById('EP_HDR').value = hdr ;
					document.getElementById('EP_LBT').value = lbt ;
					document.getElementById('EP_LBR').value = lbr ;
					document.getElementById('ETOTAL').value = tot ;
					document.getElementById('EP_TTL').value = ttl ;
				};  
			</script>
        <div class="row">
		<div class="col-md-2 col-md-offset-4">
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-warning" value="Simpan">
			<input type="reset" class="btn btn-danger" value="reset">
		</div>										
		</div>	
		</div>		
	</form>
  </div>
</div>
</body>

<?php
}
?>

<!-- Footer Data -->	  
</br>
</br>
<footer class="footer">
	<center>
        <div class=" container-fluid ">
        <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed and Coded by Yayasan Bina Generasi Gemilang. <a href="#">RDA</a>
        </div>
        </div>
	</center>
</footer>
</html>