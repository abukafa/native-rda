<?php 
	include 'header.php';
?>

<!-- Data Title -->
<center>
	<h2>Edit Data Pengurus</h2>
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
				<?php
				$nisr=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['nisr']);
				$san=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where nisr='$nisr'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
				while($s=mysqli_fetch_array($san)){
				if(file_exists("../photo/" . $s['PANGGILAN'] . ".jpg")){ 
				?>
					<img class="img-responsive" src="../photo/<?php echo $s['PANGGILAN'] ?>.JPG">
				<?php }else{ ?>
					<img class="img-responsive" src="../img/no.png">
				<?php
				}
				?>						
			</a>
		</h1>
	</div>
</div>

<!-- Detail Data Santri -->
</br>
<div class="col-md-10">
	<form action="santri_update.php" method="post">
		<table class="table">
			<tr>
				<td style="font-weight: bold;"><span class="glyphicon glyphicon-play"></span> BIODATA</td>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>
				<td>Nomor Induk</td>
				<td><input type="text" class="form-control" name="nisr" value="<?php echo $s['NISR'] ?>" readonly=yes></td>
				<td>Nomor Absen</td>
				<td><input type="text" class="form-control" name="no_absen" value="<?php echo $s['NO_ABSEN'] ?>"></td>		
				<td>Nomor KTP</td>
				<td><input type="text" class="form-control" name="KTP" value="<?php echo $s['KTP'] ?>"></td>		
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $s['NAMA'] ?>"></td>
				<td>Panggilan</td>
				<td><input type="text" class="form-control" name="panggilan" value="<?php echo $s['PANGGILAN'] ?>"></td>
				<td>Gender</td>
				<td><?php if($s['GENDER']=='IKHWAN'){
						?><input type="radio" name="gender" value="IKHWAN" checked> IKHWAN<br/>
						<input type="radio" name="gender" value="AKHWAT"> AKHWAT<br/>
					<?php }else{
						?><input type="radio" name="gender" value="LIKHWAN" > IKHWAN<br/>
						<input type="radio" name="gender" value="AKHWAT" checked> AKHWAT<br/>
					<?php
					} 
					?></td>
			</tr>
			<tr>
				<td>Gol. Darah</td>
				<td><select name="gol_darah" type="text" class="form-control">
					<option value="<?php echo $s['GOL_DARAH'] ?>"><?php echo $s['GOL_DARAH'] ?></option>
					<option>A</option>		
					<option>B</option>		
					<option>O</option>		
					<option>AB</option>		
				</select></td>
				<td>Tempat Lahir</td>
				<td><input type="text" class="form-control" name="tmp_lahir" value="<?php echo $s['TMP_LAHIR'] ?>"></td>
				<td>Tanggal Lahir</td>
				<td><input type="text" class="form-control" name="tgl_lahir" value="<?php echo $s['TGL_LAHIR'] ?>" id="tgl_lahir" autocomplete="off"></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><select name="status" type="text" class="form-control">
					<option value="<?php echo $s['STATUS'] ?>"><?php echo $s['STATUS'] ?></option>
					<option>SINGLE</option>		
					<option>MENIKAH</option>		
					<option>DUDA</option>		
					<option>JANDA</option>		
				</select></td>
				<td>Jumlah Istri</td>
				<td><select name="jml_istri" type="text" class="form-control">
					<option value="<?php echo $s['JML_ISTRI'] ?>"><?php echo $s['JML_ISTRI'] ?></option>
					<option>1</option>		
					<option>2</option>		
					<option>3</option>		
					<option>4</option>		
				</select></td>
				<td>Pendidikan</td>
				<td><select name="pendidikan" type="text" class="form-control">
					<option value="<?php echo $s['PENDIDIKAN'] ?>"><?php echo $s['PENDIDIKAN'] ?></option>
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
				<td><input type="text" class="form-control" name="alamat" value="<?php echo $s['ALAMAT'] ?>"></td>
			
				<td>Kecamatan</td>
				<td><input type="text" class="form-control" name="kec" value="<?php echo $s['KEC'] ?>"></td>
			
				<td>Kabupaten</td>
				<td><input type="text" class="form-control" name="kab" value="<?php echo $s['KAB'] ?>"></td>
			</tr>
			<tr>
				<td>Kode Pos</td>
				<td><input type="text" class="form-control" name="pos" value="<?php echo $s['POS'] ?>"></td>
				<td>Asal</td>
				<td><input type="text" class="form-control" name="asal" value="<?php echo $s['ASAL'] ?>"></td>
				<td>No. Handphone</td>
				<td><input type="text" class="form-control" name="handphone" value="<?php echo $s['HANDPHONE'] ?>"></td>
			</tr>	
			<tr>	
				<td>Email</td>
				<td><input type="text" class="form-control" name="email" value="<?php echo $s['EMAIL'] ?>"></td>
				<td>Pasangan</td>
				<td><input type="text" class="form-control" name="pasangan" value="<?php echo $s['PASANGAN'] ?>"></td>
				<td>Jumlah Anak</td>
				<td><input type="text" class="form-control" name="jml_anak" value="<?php echo $s['JML_ANAK'] ?>" id="tgl_ayah" autocomplete="off"></td>
			</tr>	
			<tr>
				<td style="font-weight: bold;"><span class="glyphicon glyphicon-play"></span> HR. DATA</td>
				<td></td><td></td><td></td><td></td><td></td>
			</tr>
			<tr>	
				<td>Tahun Gabung</td>
				<td><select type="text" class="form-control" name="thn_gabung" id="thn_gabung" onchange="gabung()">
					<option value="<?php echo $s['THN_GABUNG'] ?>"><?php echo $s['THN_GABUNG'] ?></option>
					<?php
					for($i=2013; $i<=date('Y'); $i++){
					echo"<option value='$i'> $i </option>";
					}
					?>
				</select></td>
				<td>Laznah</td>
				<td><select name="laznah" type="text" class="form-control">
					<option value="<?php echo $s['LAZNAH'] ?>"><?php echo $s['LAZNAH'] ?></option>
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
					<option value="<?php echo $s['JABATAN'] ?>"><?php echo $s['JABATAN'] ?></option>
					<option>KETUA</option>
					<option>KOORDINATOR</option>
					<option>STAF</option>
				</select></td>
			</tr>	
			<tr>	
				<td>Grade</td>
                <td><select type="text" class="form-control" name="grade" id="grade" onchange="changeValue(this.value)">
					<option value="<?php echo $s['GRADE'] ?>"><?php echo $s['GRADE'] ?></option>
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
				<td><input type="text" class="form-control" name="golongan" id="golongan" value="<?php echo $s['GOLONGAN'] ?>" readonly=yes></td>
				<td>Sub Golongan</td>
				<td><input type="text" class="form-control" name="sub_golong" id="sub_golong" value="<?php echo $s['SUB_GOLONG'] ?>" readonly=yes></td>
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
				<td><select name="status_santri" type="text" class="form-control">
					<option value="<?php echo $s['STATUS_SANTRI'] ?>"><?php echo $s['STATUS_SANTRI'] ?></option>
					<option>AKTIF</option>
					<option>PASIF</option>
				</select></td>
				<td>Status RDA</td>
				<td><select name="status_rda" type="text" class="form-control">
					<option value="<?php echo $s['STATUS_RDA'] ?>"><?php echo $s['STATUS_RDA'] ?></option>
					<option>KHIDMAT</option>		
					<option>KARYA</option>	
					<option>SUSPEND</option>	
				</select></td>
				<td>Lama</td>
				<td><input type="text" class="form-control" name="lama" id="lama" value="<?php echo date('Y') - $s['THN_GABUNG'] + 1 ; ?>" readonly=yes></td>
				<script>    
					function gabung(){  
					var gab = document.getElementById('thn_gabung').value ;
					var lam = new Date().getFullYear() - gab + 1;
							document.getElementById('lama').value = lam ;
					};
				</script>
			</tr>	
			<tr>
				<td>Tunjangan</td>
				<td><?php if($s['T_JAB']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_jab" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_jab" value="YA"><?php } ?>
                Jabatan</td>
				<td><?php if($s['T_STT']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_stt" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_stt" value="YA"><?php } ?>
                Status</td>
				<td><?php if($s['T_ANK']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_ank" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_ank" value="YA"><?php } ?>
                Anak</td>
				<td><?php if($s['T_RMH']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_rmh" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_rmh" value="YA"><?php } ?>
                Rumah</td>
				<td><?php if($s['T_PRG']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_prg" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_prg" value="YA"><?php } ?>
                Program</td>
			</tr>
			<tr>
				<td></td>
				<td><?php if($s['T_SRG']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_srg" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_srg" value="YA"><?php } ?>
                Seragam</td>
				<td><?php if($s['T_ATR']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_atr" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_atr" value="YA"><?php } ?>
                Atribut</td>
				<td><?php if($s['T_KES']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_kes" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_kes" value="YA"><?php } ?>
                Kesehatan</td>
				<td><?php if($s['T_HRA']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_hra" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_hra" value="YA"><?php } ?>
                Hari Raya</td>
				<td><?php if($s['T_DKA']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_dka" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_dka" value="YA"><?php } ?>
                Duka</td>
			</tr>
			<tr>
				<td></td>
				<td><?php if($s['T_HAJ']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_haj" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_haj" value="YA"><?php } ?>
                Haji & Umroh</td>
				<td><?php if($s['T_BNS']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_bns" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_bns" value="YA"><?php } ?>
                Bonus</td>
				<td><?php if($s['T_SPC']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_spc" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_spc" value="YA"><?php } ?>
                Spesial</td>
				<td><?php if($s['T_EKS']=="YA"){ ?><input class="form-check-input" type="checkbox" name="t_eks" value="YA" checked>
					<?php }else{ ?><input class="form-check-input" type="checkbox" name="t_eks" value="YA"><?php } ?>
                Eksekutif</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
</div>

</br>
<div class="col-md-2">
	<div class="row">
	</div>
</div>
	<div class="col-md-10">
		<table class="table">
			<tr>
				<td style="font-weight: bold;"><span class="glyphicon glyphicon-play"></span> KOMPETENSI</td>
			</tr>
			<a class="btn btn-default pull-right" href="#" data-toggle="modal" data-target="#ModalEntri">New Entri <span class="glyphicon glyphicon-plus"></span></a>
			<tr class="success">
				<th>No</th>
				<th>Bentuk</th>
				<th>Nama</th>
				<th>Lokasi</th>
				<th>Tahun</th>
				<th></th>
			</tr>
			<?php 
			$no=1;
			$nisr=$s['NISR'];
			$komp=mysqli_query($GLOBALS["___mysqli_ston"], "select * from kompetensi where NISR='$nisr'");
			while($kmp=mysqli_fetch_array($komp)){
			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $kmp['BENTUK'] ?></td>
				<td><?php echo $kmp['KET'] ?></td>
				<td><?php echo $kmp['LOKASI'] ?></td>
				<td><?php echo $kmp['TAHUN'] ?></td>
				<td>
					<a onclick="if(confirm('Apakah anda yakin akan menghapus data ini ??')){ location.href='santri_kompdel.php?id=<?php echo $kmp['ID']; ?>' }" class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash"></span></a>
					<a href="#" data-toggle="modal" data-target="#ModalEdit<?php echo $kmp['ID'] ?>" class="btn btn-default pull-right"><span class="glyphicon glyphicon-edit"></span></a>
				</td>
				
<!-- Modal Edit Data-->
<div class="modal fade" id="ModalEdit<?php echo $kmp['ID'] ?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Entry</h4>
			</div>
			<?php
			$id=$kmp['ID'];
			$query_edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kompetensi WHERE ID='$id'");
			while ($row = mysqli_fetch_array($query_edit)) { 
			?>
			<div class="modal-body">
				<form role="form" action="santri_kompedt.php" method="post">
                <div class="row">
                <div class="col-md-4 pr-1">
					<div class="form-group">
						<label>NISR</label>
						<input name="ID" type="hidden" class="form-control" value="<?php echo $row['ID']; ?>" readonly>
						<input name="NISR" type="text" class="form-control" value="<?php echo $row['NISR']; ?>" readonly>
					</div>
				</div>
                <div class="col-md-8 pr-1">
					<div class="form-group">
						<label>Nama</label>
						<input name="NAMA" type="text" class="form-control" value="<?php echo $row['NAMA']; ?>" readonly>
					</div>	
				</div>
				</div>
					<div class="form-group">
						<label>Bentuk</label>
						<input name="BENTUK" type="text" class="form-control" value="<?php echo $row['BENTUK']; ?>">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input name="KET" type="text" class="form-control" value="<?php echo $row['KET']; ?>">
					</div>
					<div class="form-group">
						<label>Lokasi</label>
						<input name="LOKASI" type="text" class="form-control" value="<?php echo $row['LOKASI']; ?>">
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input name="TAHUN" type="text" class="form-control" value="<?php echo $row['TAHUN']; ?>">
					</div>
					<div class="modal-footer">  
						<button type="submit" class="btn btn-success">Update</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
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
				<form role="form" action="santri_komp.php" method="post">
                <div class="row">
                <div class="col-md-4 pr-1">
					<div class="form-group">
						<label>NISR</label>
						<input name="NISR" type="text" class="form-control" value="<?php echo $s['NISR']; ?>" readonly>
					</div>
				</div>
                <div class="col-md-8 pr-1">
					<div class="form-group">
						<label>Nama</label>
						<input name="NAMA" type="text" class="form-control" value="<?php echo $s['NAMA']; ?>" readonly>
					</div>	
				</div>
				</div>
					<div class="form-group">
						<label>Bentuk</label>
						<input name="BENTUK" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input name="KET" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Lokasi</label>
						<input name="LOKASI" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input name="TAHUN" type="text" class="form-control">
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
			<?php 
			}
			?>	  

<!-- Footer Data Santri -->	  
</br></br></br>
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