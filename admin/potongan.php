<html lang="en">
<?php 
	include 'header.php';
?>

<!-- Data Title -->
<center>
	<h2>Data Potongan</h2>
	<h4>RUMAH DAKWAH ABU</h4>
	<h4>- RDA -</h4>
</center>

<!-- Filter Data Santri -->
<div class="container-fluid">
<div class="btn-group pull-right">
	<a class="btn btn-default" href="#" data-toggle="modal" data-target="#ModalEntri">New Entri <span class="glyphicon glyphicon-plus"></span></a>
	<a style="margin-bottom:10px" href="potongan_lapall" target="_blank" class="btn btn-default">Rekap <span class="glyphicon glyphicon-print"></span></a>
</div>

<form action="" method="get">
	<div class="input-group col-md-2">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" name="cari" id="cari" placeholder=".. search .." onchange="changeValue(this.value)">
	</div>
</form>

<!-- Detail Data Santri -->
<table class="table table-striped table-hover">
    <tr class="danger">
        <th>No</th>
        <th>NISR</th>
        <th>Nama</th>
        <th>Laznah</th>
        <th>Grade</th>
        <th>Lama</th>
        <th><center>Pot. Seragam</center></th>
        <th><center>Pot. Atribut</center></th>
        <th><center>Pot. Kesehatan</center></th>
        <th><center>Pot. Rumah</center></th>
        <th><center>Lainnya</center></th>
        <th><center>Acc</center></th>
        <th></th>
    </tr>
	<?php 
	if(isset($_GET['cari'])){
		$search = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['cari']);
		$potongan=mysqli_query($GLOBALS["___mysqli_ston"], "select potongan.*, santri.LAZNAH, santri.STATUS_RDA, santri.GRADE, santri.THN_GABUNG from potongan left join santri on potongan.NISR=santri.NISR where potongan.NAMA LIKE '%$search%' order by potongan.NAMA");
	}else{
		$potongan=mysqli_query($GLOBALS["___mysqli_ston"], "select potongan.*, santri.LAZNAH, santri.STATUS_RDA, santri.GRADE, santri.THN_GABUNG from potongan left join santri on potongan.NISR=santri.NISR order by santri.LAZNAH, potongan.NAMA");
	}
		$no=1;
		while($p=mysqli_fetch_array($potongan)){
			$lama = date('Y') - $p['THN_GABUNG'] + 1;
			$lain = $p['P_BON'] + $p['P_HTG'] + $p['P_ZKT'] + $p['P_INF'] + $p['P_LIN'] ;
		?>
     
	<tr style="<?= ($p['STATUS_RDA']=='SUSPEND' || $p['LAZNAH']=='') ? 'color: red' : '' ?>">
        <td><?php echo $no ?></td>
        <td><?php echo $p['NISR'] ?></td>
        <td><?php echo $p['NAMA'] ?></td>
        <td><?php echo $p['LAZNAH'] ?></td>
        <td align="right"><?php echo $p['GRADE'] ?></td>
        <td align="right"><?php echo $lama ?></td>
        <td align="right"><?php echo number_format($p['P_SRG'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($p['P_ATR'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($p['P_KES'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($p['P_RMH'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($lain, 0,'',',') ?></td>
			<?php
			$uname = $_SESSION['uname'];
			$admin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname'");
			while($u=mysqli_fetch_array($admin)){
			if ($u['akses']=="manager" OR $u['akses']=="supervisor"){
			?>
        <td align="center">
			<?php if($p['ACC']=="YA"){ ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='potongan_acc?nisr=<?php echo $p['NISR']; ?>'" checked>
			<?php }else{ ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='potongan_acc?nisr=<?php echo $p['NISR']; ?>'"><?php } ?></td>
			<?php
			}else{
			?>
			<td align="center">
			<?php if($p['ACC']=="YA"){ ?><input class="form-check-input" type="checkbox" name="acc" checked disabled>
			<?php }else{ ?><input class="form-check-input" type="checkbox" name="acc" disabled><?php } ?></td>
			<?php
			}
			?>
		<td>
			<?php
			if ($u['akses']=="manager" OR $u['akses']=="supervisor"){
			?>
			<a onclick="if(confirm('Apakah anda yakin akan menghapus data Potongan dengan NISR : <?php echo $p['NISR']; ?> ??')){ location.href='potongan_delete?nisr=<?php echo $p['NISR']; ?>' }" class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash"></span></a>
			<?php
			}
		
			}
			?>
			<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#ModalEdit<?php echo $p['ID']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
		</td>
		
<!-- Modal Edit Data-->
<div class="modal fade" id="ModalEdit<?php echo $p['ID']; ?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Entry</h4>
			</div>
			<?php
			$nisr=$p['NISR'];
			$query_edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM potongan WHERE NISR='$nisr'");
			while ($row = mysqli_fetch_array($query_edit)) {  
			?>
			<div class="modal-body">
				<form role="form" action="potongan_update" method="post">
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
					$tunjangan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tunjangan WHERE NISR='$nisr'");
					while ($t = mysqli_fetch_array($tunjangan)) {  
					?>
					<div class="form-group">
						<label>Pot. Seragam</label>
						<input name="P_SRG" type="text" class="form-control" value="<?php if($t['T_SRG']>0){ echo $t['T_SRG'] . "\" readonly" ; }else{ echo "0\" "; } ?>>
					</div>
					<div class="form-group">
						<label>Pot. Atribut</label> 
						<input name="P_ATR" type="text" class="form-control" value="<?php if($t['T_ATR']>0){ echo $t['T_ATR'] . "\" readonly" ; }else{ echo "0\" "; } ?>>
					</div>
					<div class="form-group">
						<label>Pot. Kesehatan</label>   
						<input name="P_KES" type="text" class="form-control" value="<?php if($t['T_KES']>0){ echo $t['T_KES'] . "\" readonly" ; }else{ echo "0\" "; } ?>>
					</div>
					<div class="form-group">
						<label>Pot. Rumah</label>
						<input name="P_RMH" type="text" class="form-control" value="<?php if($t['T_RMH']>0){ echo $t['T_RMH'] . "\" readonly" ; }else{ echo "0\" "; } ?>>
					</div>
					<div class="form-group">
						<label>Pot. Kasbon</label> 
						<input name="P_BON" type="text" class="form-control" value="<?php echo $row['P_BON']; ?>">
					</div>
					<div class="form-group">
						<label>Pot. Hutang</label>   
						<input name="P_HTG" type="text" class="form-control" value="<?php echo $row['P_HTG']; ?>">
					</div>
					<div class="form-group">
						<label>Pot. Zakat</label>
				<?php
				$santri=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where NISR='$nisr'");
				while($s=mysqli_fetch_array($santri)){
					$lama = date('Y') - $s['THN_GABUNG'] + 1 ;
					switch($lama){
					case 1:
						$loy = 0.5 ;
						break;
					case 2:
						$loy = 0.6 ;
						break;
					case 3:
						$loy = 0.8 ;
						break;
					case 4:
						$loy = 1.0 ;
						break;
					case 5:
						$loy = 1.1 ;
						break;
					case 6:
						$loy = 1.3 ;
						break;
					case 7:
						$loy = 1.5 ;
						break;
					case 8:
						$loy = 1.7 ;
						break;
					case 9:
						$loy = 1.9 ;
						break;
					case 10:
						$loy = 2.0 ;
						break;
					default:
						$loy = 2.1 ;
						break;
					}
					$absensi=mysqli_query($GLOBALS["___mysqli_ston"], "select * from absensi where NISR='$nisr'");
					while($a=mysqli_fetch_array($absensi)){
						$abs = round($a['TOTAL'],2) ;
					$grade=$s['GRADE'];
					$skim=mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim where GRADE='$grade'");
					while($k=mysqli_fetch_array($skim)){
						if($s['STATUS_SANTRI']=="AKTIF" && $s['STATUS_RDA']=="KHIDMAT" && $lama >= 1){
							$honor = $k['HONOR'] * $loy ;
						}else{
							$honor = 0 ;
						}
						if($s['STATUS_SANTRI']=="AKTIF" && $lama >= 1 && $a['TOTAL'] >= 90){
							$makan = $k['MAKAN'] * 1 ;
							$trans = $k['TRANSPORT'] * 1 ;
						}else if($s['STATUS_SANTRI']=="AKTIF" && $lama >= 1 && $a['TOTAL'] < 90){
							$makan = $k['MAKAN'] * $abs ;
							$trans = $k['TRANSPORT'] * $abs ;
						}
					$pokok = $honor + $makan + $trans ;
					$ttunj = $t['T_JAB'] +	$t['T_STT'] +	$t['T_ANK'] +	$t['T_RMH'] +	$t['T_PRG'] +	$t['T_KES'] +	$t['T_SRG'] +	$t['T_ATR'] +	$t['T_HRA'] +	$t['T_HAJ'] +	$t['T_DKA'] +	$t['T_BNS'] +	$t['T_SPC'] +	$t['T_EKS'] ;
					$tot = $pokok + $ttunj ;
					$zkt = round($tot * 0.025,-3) ;
				?>
						<input name="P_ZKT" type="text" class="form-control" value="<?php echo $zkt; ?>">
				<?php
				}
					}
					}
				?>
					</div>
					<div class="form-group">
						<label>Pot. Infaq</label> 
						<input name="P_INF" type="text" class="form-control" value="<?php echo $row['P_INF']; ?>">
					</div>
					<div class="form-group">
						<label>Pot. Lainnya</label>   
						<input name="P_LIN" type="text" class="form-control" value="<?php echo $row['P_LIN']; ?>">
					</div>
					<div class="modal-footer">  
						<button type="submit" class="btn btn-success">Update</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
					<?php
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

			<?php
			$no++;
			}
			?>
	
</tr>
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
				<form role="form" action="potongan_add" method="post">
                  <div class="row">
                  <div class="col-md-3 pr-1">
					<div class="form-group">
						<label>NISR</label>
						<select name="NISR" id="NISR" type="text" class="form-control" onchange="changeValue(this.value)">
							<option>.. pilih ..</option>
							<?php 
							$brg=mysqli_query($GLOBALS["___mysqli_ston"], "select santri.* from santri left join potongan on santri.NISR=potongan.NISR where potongan.NISR is NULL order by NAMA");
							$jsArray = "var tunj = new Array();\n";        
							while($b=mysqli_fetch_array($brg)){
							echo '<option value="' . $b['NISR'] . '">' . $b['NISR'] ." - ". $b['NAMA'] . '</option>';
							$jsArray .= "tunj['" . $b['NISR'] . "'] = {NAMA:'".addslashes($b['NAMA']) . "',T_SRG:'".addslashes($b['T_SRG']) . "',T_ATR:'".addslashes($b['T_ATR']) . "',T_KES:'".addslashes($b['T_KES']) . "',T_RMH:'".addslashes($b['T_RMH']) . "'};\n";
							}
							?>
						</select></td>
					</div>
					</div>
                    <div class="col-md-9 pr-1">
					<div class="form-group">
						<label>Nama</label>
						<input name="NAME" id="NAME" type="text" class="form-control" readonly="yes">
					</div>
					</div>
				</div>
					<div class="form-group">
						<label>Pot. Seragam</label>
						<input name="P_SRG" id="P_SRG" type="text" class="form-control" value="0" readonly="yes">
					</div>
					<div class="form-group">
						<label>Pot. Atribut</label> 
						<input name="P_ATR" id="P_ATR" type="text" class="form-control" value="0" readonly="yes">
					</div>
					<div class="form-group">
						<label>Pot. Kesehatan</label>   
						<input name="P_KES" id="P_KES" type="text" class="form-control" value="0" readonly="yes">
					</div>
					<div class="form-group">
						<label>Pot. Rumah</label>
						<input name="P_RMH" id="P_RMH" type="text" class="form-control" value="0" readonly="yes">
					</div>
					<div class="form-group">
						<label>Pot. Kasbon</label> 
						<input name="P_BON" type="text" class="form-control" value="0">
					</div>
					<div class="form-group">
						<label>Pot. Hutang</label>   
						<input name="P_HTG" type="text" class="form-control" value="0">
					</div>
					<div class="form-group">
						<label>Pot. Zakat</label>
						<input name="P_ZKT" type="text" class="form-control" value="0">
					</div>
					<div class="form-group">
						<label>Pot. Infaq</label> 
						<input name="P_INF" type="text" class="form-control" value="0">
					</div>
					<div class="form-group">
						<label>Pot. Lainnya</label>   
						<input name="P_LIN" type="text" class="form-control" value="0">
					</div>
					<script type="text/javascript">    
					<?php echo $jsArray; ?>  
					function changeValue(NISR){  
						console.log(tunj[NISR].T_SRG)
						document.getElementById('NAME').value = tunj[NISR].NAMA
						document.getElementById('P_SRG').value = tunj[NISR].T_SRG
						document.getElementById('P_ATR').value = tunj[NISR].T_ATR
						document.getElementById('P_KES').value = tunj[NISR].T_KES
						document.getElementById('P_RMH').value = tunj[NISR].T_RMH
					};  
					</script>
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