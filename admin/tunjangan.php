<html lang="en">
<?php 
	include 'header.php';
?>

<!-- Data Title -->
<center>
	<h2>Data Tunjangan</h2>
	<h4>RUMAH DAKWAH ABU</h4>
	<h4>- RDA -</h4>
</center>

<?php
$uname = $_SESSION['uname'];
$admin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname'");
	while($u=mysqli_fetch_array($admin)){
?>

<!-- Filter Data Santri -->
<div class="container-fluid">
<div class="btn-group pull-right">
	<a class="btn btn-default" href="#" data-toggle="modal" data-target="#ModalEntri">New Entri <span class="glyphicon glyphicon-plus"></span></a>
	<a style="margin-bottom:10px" href="tunjangan_lapall" target="_blank" class="btn btn-default">Rekap <span class="glyphicon glyphicon-print"></span></a>
</div>
<form action="" method="get">
	<div class="input-group col-md-2">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" name="cari" id="cari" placeholder=".. search .." onchange="changeValue(this.value)">
	</div>
</form>

<!-- Detail Data Santri -->
<table class="table table-striped table-hover">
    <tr class="warning">
        <th>No</th>
        <th>NISR</th>
        <th>Nama</th>
        <th>Laznah</th>
        <th>Grade</th>
        <th>Lama</th>
        <th><center>T. Program</center></th>
        <th><center>T. Jabatan</center></th>
        <th><center>T. Status</center></th>
        <th><center>T. Anak</center></th>
        <th><center>T. Rumah</center></th>
        <th><center>Lainnya</center></th>
        <th><center>Acc</center></th>
        <th></th>
    </tr>
	
	<?php 
	if(isset($_GET['cari'])){
		$search = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['cari']);
		$tunjangan=mysqli_query($GLOBALS["___mysqli_ston"], "select tunjangan.*, santri.LAZNAH, santri.STATUS_RDA, santri.GRADE, santri.THN_GABUNG from tunjangan left join santri on tunjangan.NISR=santri.NISR where tunjangan.NAMA LIKE '%$search%' order by NAMA");
	}else{
		$tunjangan=mysqli_query($GLOBALS["___mysqli_ston"], "select tunjangan.*, santri.LAZNAH, santri.STATUS_RDA, santri.GRADE, santri.THN_GABUNG from tunjangan left join santri on tunjangan.NISR=santri.NISR order by santri.LAZNAH, tunjangan.NAMA");
	}
		$no=1;
		while($t=mysqli_fetch_array($tunjangan)){
			$lama = date('Y') - $t['THN_GABUNG'] + 1;
			$lain = $t['T_KES'] + $t['T_SRG'] + $t['T_ATR'] + $t['T_HRA'] + $t['T_HAJ'] + $t['T_DKA'] + $t['T_BNS'] + $t['T_SPC'] + $t['T_EKS'] ;
	?>
     
	<tr style="<?= ($t['STATUS_RDA']=='SUSPEND' || $t['LAZNAH']=='') ? 'color: red' : '' ?>">
        <td><?php echo $no ?></td>
        <td><?php echo $t['NISR'] ?></td>
        <td><?php echo $t['NAMA'] ?></td>
        <td><?php echo $t['LAZNAH'] ?></td>
        <td align="right"><?php echo $t['GRADE'] ?></td>
        <td align="right"><?php echo $lama ?></td>
        <td align="right"><?php echo number_format($t['T_PRG'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($t['T_JAB'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($t['T_STT'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($t['T_ANK'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($t['T_RMH'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($lain, 0,'',',') ?></td>
			<?php
			if ($u['akses']=="manager" OR $u['akses']=="supervisor"){
			?>
			<td align="center">
			<?php if($t['ACC']=="YA"){ ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='tunjangan_acc?nisr=<?php echo $t['NISR']; ?>'" checked>
			<?php }else{ ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='tunjangan_acc?nisr=<?php echo $t['NISR']; ?>'"><?php } ?></td>
			<?php
			}else{
			?>
			<td align="center">
			<?php if($t['ACC']=="YA"){ ?><input class="form-check-input" type="checkbox" name="acc" checked disabled>
			<?php }else{ ?><input class="form-check-input" type="checkbox" name="acc" disabled><?php } ?></td>
			<?php
			}
			?>
		<td>
			<?php
			if ($u['akses']=="manager" OR $u['akses']=="supervisor"){
			?>
			<a onclick="if(confirm('Apakah anda yakin akan menghapus data Tunjangan dengan NISR : <?php echo $t['NISR']; ?> ??')){ location.href='tunjangan_delete?nisr=<?php echo $t['NISR']; ?>' }" class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash"></span></a>
			<?php
			}
			?>
			<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#ModalEdit<?php echo $t['ID']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
			
		</td>
		
<!-- Modal Edit Data-->
<div class="modal fade" id="ModalEdit<?php echo $t['ID']; ?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Entry</h4>
			</div>
			<?php
			$nisr=$t['NISR'];
			$query_edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tunjangan WHERE NISR='$nisr'");
			while ($row = mysqli_fetch_array($query_edit)) {  
			?>
			<div class="modal-body">
				<form role="form" action="tunjangan_update" method="post">
					<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
					<input type="hidden" name="NISR" value="<?php echo $row['NISR']; ?>">
                <div class="row">
                <div class="col-md-3 pr-1">
					<div class="form-group">
						<label>NISR</label>
						<input name="NISR" id="NISR" type="text" class="form-control" value="<?php echo $row['NISR']; ?>" readonly>
					</div>
				</div>
                <div class="col-md-9 pr-1">
					<div class="form-group">
						<label>Nama</label>
						<input name="NAMA" id="NAMA" type="text" class="form-control" value="<?php echo $row['NAMA']; ?>" readonly>
					</div>	
				</div>
				</div>
					<?php
					$santri = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM santri WHERE NISR='$nisr'");
					while ($s = mysqli_fetch_array($santri)) {  
					$grade = $s['GRADE'];
					$skim = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM skim WHERE GRADE='$grade'");
					while ($k = mysqli_fetch_array($skim)) { 
					?>
					<div class="form-group">
						<label>Tunjangan Jabatan *</label>
						<input name="T_JAB" type="text" class="form-control" value="<?php if($s['T_JAB']<>"YA"){ echo "0\" readonly" ; }else{ echo $k['T_JAB'] . "\" readonly" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Status *</label> 
						<input name="T_STT" type="text" class="form-control" value="<?php if($s['T_STT']<>"YA"){ echo "0\" readonly" ; }else{ echo $k['T_STT'] . "\" readonly" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Anak *</label>   
						<input name="T_ANK" type="text" class="form-control" value="<?php if($s['T_ANK']<>"YA"){ echo "0\" readonly" ; }else{ echo $k['T_ANK'] * $s['JML_ANAK'] . "\" readonly" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Rumah</label>
						<input name="T_RMH" type="text" class="form-control" value="<?php if($s['T_RMH']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_RMH'] . "\"" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Program *</label> 
						<input name="T_PRG" type="text" class="form-control" value="<?php if($s['T_PRG']<>"YA"){ echo "0\" readonly" ; }else{ echo $k['T_PRG'] . "\" readonly" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Kesehatan *</label>   
						<input name="T_KES" type="text" class="form-control" value="<?php if($s['T_KES']<>"YA"){ echo "0\" readonly" ; }else{ echo $k['T_KES'] . "\" readonly" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Seragam</label>
						<input name="T_SRG" type="text" class="form-control" value="<?php if($s['T_SRG']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_SRG'] . "\"" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Atribut</label> 
						<input name="T_ATR" type="text" class="form-control" value="<?php if($s['T_ATR']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_ATR'] . "\"" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Hari Raya</label>   
						<input name="T_HRA" type="text" class="form-control" value="<?php if($s['T_HRA']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_HRA'] . "\"" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Haji & Umroh</label>
						<input name="T_HAJ" type="text" class="form-control" value="<?php if($s['T_HAJ']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_HAJ'] . "\"" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Duka / Musibah</label> 
						<input name="T_DKA" type="text" class="form-control" value="<?php if($s['T_DKA']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_DKA'] . "\"" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Bonus</label>   
						<input name="T_BNS" type="text" class="form-control" value="<?php if($s['T_BNS']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_BNS'] . "\"" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Spesial</label> 
						<input name="T_SPC" type="text" class="form-control" value="<?php if($s['T_SPC']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_SPC'] . "\"" ; } ?>>
					</div>
					<div class="form-group">
						<label>Tunjangan Eksekutif</label>   
						<input name="T_EKS" type="text" class="form-control" value="<?php if($s['T_EKS']<>"YA"){ echo "0\" readonly" ; }else{ echo $row['T_EKS'] . "\"" ; } ?>>
					</div>
					<div class="modal-footer">  
						<button type="submit" class="btn btn-success">Update</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					<?php
					}
					}
					?>
				</form>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>		

	</tr>
	<?php 
	$no++;
		}
	}
	?>
</table>
</div>

<!-- Modal Entri Data-->
<div class="modal fade" id="ModalEntri" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Data Entry</h4>
			</div>
			<div class="modal-body">
				<form role="form" action="tunjangan_add" method="post">
                <div class="row">
                <div class="col-md-3 pr-1">
					<div class="form-group">
						<label>NISR</label>
						<select name="NISR" id="NISR" type="text" class="form-control" onchange="changeValue(this.value)">
							<option value="0">.. pilih ..</option>
							<?php 
							$brg=mysqli_query($GLOBALS["___mysqli_ston"], "select santri.* from santri left join tunjangan on santri.NISR=tunjangan.NISR where tunjangan.NISR is NULL order by NAMA");
							$jsArray = "var sant = new Array();\n";        
							while($b=mysqli_fetch_array($brg)){
							echo '<option value="' . $b['NISR'] . '">' . $b['NISR'] ." - ". $b['NAMA'] . '</option>';
							$jsArray .= "sant['" . $b['NISR'] . "'] = {NAMA:'" . addslashes($b['NAMA']) . "',T_JAB:'".addslashes($b['T_JAB']) . "',T_STT:'".addslashes($b['T_STT']) . "',T_ANK:'".addslashes($b['T_ANK']) . "',T_RMH:'".addslashes($b['T_RMH']) . "',T_PRG:'".addslashes($b['T_PRG']) . "',T_SRG:'".addslashes($b['T_SRG']) . "',T_ATR:'".addslashes($b['T_ATR']) . "',T_KES:'".addslashes($b['T_KES']) . "',T_HRA:'".addslashes($b['T_HRA']) . "',T_DKA:'".addslashes($b['T_DKA']) . "',T_HAJ:'".addslashes($b['T_HAJ']) . "',T_BNS:'".addslashes($b['T_BNS']) . "',T_SPC:'".addslashes($b['T_SPC']) . "',T_EKS:'".addslashes($b['T_EKS']) . "'};\n";
							}
							?>
						</select></td>
					</div>
				</div>
                <div class="col-md-9 pr-1">
					<div class="form-group">
						<label>Nama</label>
						<input name="NAME" id="NAME" type="text" class="form-control" readonly>
					</div>	
				</div>
				</div>
					<script type="text/javascript">    
					<?php echo $jsArray; ?>  
					function changeValue(NISR){  
						document.getElementById('NAME').value = sant[NISR].NAMA;
						if (sant[NISR].T_JAB=="YA"){
						document.getElementById('T_JAB').readOnly = false;
						}else{
						document.getElementById('T_JAB').readOnly = true;
						};	
						if (sant[NISR].T_STT=="YA"){
						document.getElementById('T_STT').readOnly = false;
						}else{
						document.getElementById('T_STT').readOnly = true;
						};	
						if (sant[NISR].T_ANK=="YA"){
						document.getElementById('T_ANK').readOnly = false;
						}else{
						document.getElementById('T_ANK').readOnly = true;
						};	
						if (sant[NISR].T_RMH=="YA"){
						document.getElementById('T_RMH').readOnly = false;
						}else{
						document.getElementById('T_RMH').readOnly = true;
						};	
						if (sant[NISR].T_PRG=="YA"){
						document.getElementById('T_PRG').readOnly = false;
						}else{
						document.getElementById('T_PRG').readOnly = true;
						};	
						if (sant[NISR].T_SRG=="YA"){
						document.getElementById('T_SRG').readOnly = false;
						}else{
						document.getElementById('T_SRG').readOnly = true;
						};	
						if (sant[NISR].T_ATR=="YA"){
						document.getElementById('T_ATR').readOnly = false;
						}else{
						document.getElementById('T_ATR').readOnly = true;
						};	
						if (sant[NISR].T_KES=="YA"){
						document.getElementById('T_KES').readOnly = false;
						}else{
						document.getElementById('T_KES').readOnly = true;
						};	
						if (sant[NISR].T_HRA=="YA"){
						document.getElementById('T_HRA').readOnly = false;
						}else{
						document.getElementById('T_HRA').readOnly = true;
						};	
						if (sant[NISR].T_DKA=="YA"){
						document.getElementById('T_DKA').readOnly = false;
						}else{
						document.getElementById('T_DKA').readOnly = true;
						};
						if (sant[NISR].T_HAJ=="YA"){
						document.getElementById('T_HAJ').readOnly = false;
						}else{
						document.getElementById('T_HAJ').readOnly = true;
						};	
						if (sant[NISR].T_BNS=="YA"){
						document.getElementById('T_BNS').readOnly = false;
						}else{
						document.getElementById('T_BNS').readOnly = true;
						};	
						if (sant[NISR].T_SPC=="YA"){
						document.getElementById('T_SPC').readOnly = false;
						}else{
						document.getElementById('T_SPC').readOnly = true;
						};	
						if (sant[NISR].T_EKS=="YA"){
						document.getElementById('T_EKS').readOnly = false;
						}else{
						document.getElementById('T_EKS').readOnly = true;
						};
					};  
					</script>
					<div class="form-group">
						<label>Tunjangan Jabatan</label>
						<input name="T_JAB" id="T_JAB" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Status</label> 
						<input name="T_STT" id="T_STT" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Anak</label>   
						<input name="T_ANK" id="T_ANK" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Rumah</label>
						<input name="T_RMH" id="T_RMH" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Program</label> 
						<input name="T_PRG" id="T_PRG" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Kesehatan</label>   
						<input name="T_KES" id="T_KES" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Seragam</label>
						<input name="T_SRG" id="T_SRG" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Atribut</label> 
						<input name="T_ATR" id="T_ATR" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Hari Raya</label>   
						<input name="T_HRA" id="T_HRA" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Haji & Umroh</label>
						<input name="T_HAJ" id="T_HAJ" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Duka / Musibah</label> 
						<input name="T_DKA" id="T_DKA" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Bonus</label>   
						<input name="T_BNS" id="T_BNS" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Spesial</label> 
						<input name="T_SPC" id="T_SPC" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="form-group">
						<label>Tunjangan Eksekutif</label>   
						<input name="T_EKS" id="T_EKS" type="text" class="form-control" value="0" readonly>
					</div>
					<div class="modal-footer">  
						<button type="submit" class="btn btn-success">Add</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>		

<!-- Footer Data Santri -->	  
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