<?php 
	include 'header.php';
?>

<!-- Data Title -->
<center>
	<h2>Input Data Pengurus</h2>
	<h4>RUMAH DAKWAH ABU</h4>
	<h4>- RDA -</h4>
</center>

<!-- Sidebar Data Edit Santri -->
<a class="btn pull-right" href="santri"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
</br>
<div class="col-md-2">
	<div class="row">
		<h1 class="animated flipInX"><div class="col-xs-6 col-md-12">
			<a class="thumbnail">			
				<img class="img-responsive" src="../img/no.png">
			</a>
		</h1>
	</div>
</div>

<!-- Detail Data Santri -->
</br>
<div class="col-md-10">
	<form action="santri_add.php" method="post">
		<table class="table">
			<tr>
				<td style="font-weight: bold;"><span class="glyphicon glyphicon-play"></span> BIODATA</td>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td>Nomor Induk</td>
				<?php
				$thn = date('Y');
				$record=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT MAX(SUBSTR(NISR,1,3)) as max from santri where SUBSTR(NISR,8,4)='$thn'");
				// $record=mysql_query("SELECT COUNT(*) from santri where SUBSTR(NISR,8,4)='$thn'");
				// $jum=mysql_result($record, 0)+1;
				// $no = sprintf('%03d', $jum) ;
				while($r=mysqli_fetch_array($record)){
					$no = sprintf('%03d', $r['max']+1) ;
					$auto = $no . "." . date('m') . "." . $thn ;
				}
				?>
				<td><input type="text" class="form-control" name="nisr" value="<?php echo $auto ?>" readonly=yes></td>
				<td>Nomor Absen</td>
				<td><input type="text" class="form-control" name="no_absen"></td>		
				<td>Nomor KTP</td>
				<td><input type="text" class="form-control" name="ktp"></td>		
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama"></td>
				<td>Panggilan</td>
				<td><input type="text" class="form-control" name="panggilan"></td>
				<td>Gender</td>
				<td><input type="radio" name="gender" value="IKHWAN"> IKHWAN<br/>
					<input type="radio" name="gender" value="AKHWAT"> AKHWAT<br/>
				</td>
			</tr>
			<tr>
				<td>Gol. Darah</td>
				<td><select name="gol_darah" type="text" class="form-control">
					<option value="-">.. pilih ..</option>
					<option>A</option>		
					<option>B</option>		
					<option>O</option>		
					<option>AB</option>		
				</select></td>
				<td>Tempat Lahir</td>
				<td><input type="text" class="form-control" name="tmp_lahir"></td>
				<td>Tanggal Lahir</td>
				<td><input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" autocomplete="off"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status" type="text" class="form-control">
					<option value="-">.. pilih ..</option>
					<option>SINGLE</option>		
					<option>MENIKAH</option>		
					<option>DUDA</option>		
					<option>JANDA</option>		
				</select></td>
				<td>Jumlah Istri</td>
				<td><select name="jml_istri" type="text" class="form-control">
					<option value="-">.. pilih ..</option>
					<option>1</option>		
					<option>2</option>		
					<option>3</option>		
					<option>4</option>		
				</select></td>
				<td>Pendidikan</td>
				<td><select name="pendidikan" type="text" class="form-control">
					<option value="-">.. pilih ..</option>
					<option>SD</option>		
					<option>SMP</option>		
					<option>SMA</option>		
					<option>S1</option>		
					<option>S2</option>		
					<option>S3</option>		
				</select></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="alamat"></td>
			
				<td>Kecamatan</td>
				<td><input type="text" class="form-control" name="kec"></td>
			
				<td>Kabupaten</td>
				<td><input type="text" class="form-control" name="kab"></td>
			</tr>
			<tr>
				<td>Kode Pos</td>
				<td><input type="text" class="form-control" name="pos"></td>
				<td>Asal</td>
				<td><input type="text" class="form-control" name="asal"></td>
				<td>No. Handphone</td>
				<td><input type="text" class="form-control" name="handphone"></td>
			</tr>	
			<tr>	
				<td>Email</td>
				<td><input type="text" class="form-control" name="email"></td>
				<td>Pasangan</td>
				<td><input type="text" class="form-control" name="pasangan"></td>
				<td>Jumlah Anak</td>
				<td><input type="text" class="form-control" name="jml_anak" id="tgl_ayah" autocomplete="off"></td>
			</tr>	
			<tr>
				<td style="font-weight: bold;"><span class="glyphicon glyphicon-play"></span> HR. DATA</td>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>	
				<td>Tahun Gabung</td>
				<td><select type="text" class="form-control" name="thn_gabung" id="thn_gabung" onchange="gabung()">
					<option value="-">.. pilih ..</option>
					<?php
					for($i=2013; $i<=date('Y'); $i++){
					echo"<option value='$i'> $i </option>";
					}
					?>
				</select></td>
				<td>Laznah</td>
				<td><select name="laznah" type="text" class="form-control">
					<option value="-">.. pilih ..</option>
					<option>TRIGER P</option>		
					<option>TRIGER Q</option>		
					<option>TRIGER R</option>		
					<option>MPZ</option>		
					<option>AHE</option>		
					<option>AL-IFFAH</option>		
					<option>DIREKTORAT</option>		
					<option>CORPORATE</option>			
					<option>PIMPINAN</option>
				</select></td>
				<td>Jabatan</td>
				<td><select type="text" class="form-control" name="jabatan">
					<option value="-">.. pilih ..</option>
					<option>KETUA</option>
					<option>KOORDINATOR</option>
					<option>STAF</option>
				</select></td>
			</tr>	
			<tr>	
				<td>Grade</td>
                <td><select type="text" class="form-control" name="grade" id="grade" onchange="changeValue(this.value)">
					<option value="-">.. pilih ..</option>
					<option>0</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>
				</select></td>
				<td>Golongan</td>
				<td><input type="text" class="form-control" name="golongan" id="golongan" readonly=yes></td>
				<td>Sub Golongan</td>
				<td><input type="text" class="form-control" name="sub_golong" id="sub_golong" readonly=yes></td>
			</tr>	
				<script>    
					function changeValue(grade){  
					var mygrade = document.getElementById('grade').value;
						if (mygrade==0){
							document.getElementById('golongan').value = "TRAINEE";
							document.getElementById('sub_golong').value = "TRAINEE";
						}else if (mygrade==1){
							document.getElementById('golongan').value = "STAF";
							document.getElementById('sub_golong').value = "STAF PERCOBAAN";
						}else if (mygrade==2){
							document.getElementById('golongan').value = "STAF";
							document.getElementById('sub_golong').value = "STAF JUNIOR";
						}else if (mygrade==3){
							document.getElementById('golongan').value = "STAF";
							document.getElementById('sub_golong').value = "STAF SENIOR";
						}else if (mygrade==4){
							document.getElementById('golongan').value = "KEPALA BAGIAN";
							document.getElementById('sub_golong').value = "ASISTEN MANAGER JUNIOR";
						}else if (mygrade==5){
							document.getElementById('golongan').value = "KEPALA BAGIAN";
							document.getElementById('sub_golong').value = "ASISTEN MANAGER SENIOR";
						}else if (mygrade==6){
							document.getElementById('golongan').value = "KEPALA DIVISI";
							document.getElementById('sub_golong').value = "MANAGER JUNIOR";
						}else if (mygrade==7){
							document.getElementById('golongan').value = "KEPALA DIVISI";
							document.getElementById('sub_golong').value = "MANAGER SENIOR";
						}else if (mygrade==8){
							document.getElementById('golongan').value = "KEPALA DEPARTEMEN";
							document.getElementById('sub_golong').value = "GENERAL MANAGER MUDA";
						}else if (mygrade==9){
							document.getElementById('golongan').value = "KEPALA DEPARTEMEN";
							document.getElementById('sub_golong').value = "GENERAL MANAGER MADYA";
						}else if (mygrade==10){
							document.getElementById('golongan').value = "KEPALA DEPARTEMEN";
							document.getElementById('sub_golong').value = "GENERAL MANAGER UTAMA";
						}else if (mygrade==11){
							document.getElementById('golongan').value = "PIMPINAN";
							document.getElementById('sub_golong').value = "PIMPINAN MUDA";
						}else if (mygrade==12){
							document.getElementById('golongan').value = "PIMPINAN";
							document.getElementById('sub_golong').value = "PIMPINAN MADYA";
						}else if (mygrade==13){
							document.getElementById('golongan').value = "PIMPINAN";
							document.getElementById('sub_golong').value = "PIMPINAN UTAMA";
						}
					};  
				</script>
			<tr>		
				<td>Status Santri</td>
				<td><select type="text" class="form-control" name="status_santri">
					<option value="-">.. pilih ..</option>
					<option>AKTIF</option>
					<option>PASIF</option>
				</select></td>
				<td>Status RDA</td>
				<td><select name="status_rda" type="text" class="form-control">
					<option value="-">.. pilih ..</option>
					<option>KHIDMAT</option>		
					<option>KARYA</option>	
				</select></td>
				<td>Lama</td>
				<td><input type="text" class="form-control" name="lama" id="lama" value="0" readonly=yes></td>
				<script>    
					function gabung(){  
					var gab = document.getElementById('thn_gabung').value ;
					var lam = new Date().getFullYear() - gab + 1 ;
							document.getElementById('lama').value = lam ;
					};
				</script>
			</tr>	
			<tr>
				<td>Tunjangan</td>
				<td><input class="form-check-input" type="checkbox" name="t_jab" value="YA"> Jabatan</td>
				<td><input class="form-check-input" type="checkbox" name="t_stt" value="YA"> Status</td>
				<td><input class="form-check-input" type="checkbox" name="t_ank" value="YA"> Anak</td>
				<td><input class="form-check-input" type="checkbox" name="t_rmh" value="YA"> Rumah</td>
				<td><input class="form-check-input" type="checkbox" name="t_prg" value="YA"> Program</td>
			</tr>
			<tr>
				<td></td>
				<td><input class="form-check-input" type="checkbox" name="t_srg" value="YA"> Seragam</td>
				<td><input class="form-check-input" type="checkbox" name="t_atr" value="YA"> Atribut</td>
				<td><input class="form-check-input" type="checkbox" name="t_kes" value="YA"> Kesehatan</td>
				<td><input class="form-check-input" type="checkbox" name="t_hra" value="YA"> Hari Raya</td>
				<td><input class="form-check-input" type="checkbox" name="t_dka" value="YA"> Duka</td>
			</tr>
			<tr>
				<td></td>
				<td><input class="form-check-input" type="checkbox" name="t_haj" value="YA"> Haji & Umroh</td>
				<td><input class="form-check-input" type="checkbox" name="t_bns" value="YA"> Bonus</td>
				<td><input class="form-check-input" type="checkbox" name="t_spc" value="YA"> Spesial</td>
				<td><input class="form-check-input" type="checkbox" name="t_eks" value="YA"> Eksekutif</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
</div>

<!-- Footer Data Santri -->	  
</br>
<footer class="footer">
	<center>
        <div class=" container-fluid ">
        <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed and Coded by Yayasan Bina Generasi Gemilang. <a href="https://www.creative-tim.com" target="_blank">RDA</a>
        </div>
        </div>
	</center>
</footer>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#tgl_lahir").datepicker({dateFormat : 'd/m/yy'});							
		});
	</script>