<html lang="en">
<?php 
	include 'header.php';
?>

<!-- Data Title -->
<center>
	<h2>Skim Remunerasi</h2>
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
	<?php
	if ($u['akses']=="manager"){
	?>
	<a class="btn btn-default" href="#" data-toggle="modal" data-target="#ModalEntri">New Entri <span class="glyphicon glyphicon-plus"></span></a>
	<?php
	}
	?>
	<a style="margin-bottom:10px" href="skim_lapall" target="_blank" class="btn btn-default">Rekap <span class="glyphicon glyphicon-print"></span></a>
</div>

<form action="" method="get">
	<div class="input-group col-md-2">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" name="cari" id="cari" placeholder=".. search .." onchange="changeValue(this.value)">
	</div>
</form>

<!-- Detail Data Santri -->
<table class="table table-striped table-hover">
    <tr class="info">
        <th>Grade</th>
        <th>Golongan</th>
        <th>Sub. Golongan</th>
        <th><center>Honor</center></th>
        <th><center>Makan</center></th>
        <th><center>Transport</center></th>
        <th><center>Tunjangan</center></th>
        <th><center>Acc</center></th>
        <th></th>
    </tr>
	<?php 
	if(isset($_GET['cari'])){
		$search = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['cari']);
		$skim=mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim where GRADE LIKE '%$search%' order by GRADE");
	}else{
		$skim=mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim order by GRADE");
	}
		$no=1;
		while($s=mysqli_fetch_array($skim)){
			$tunj = $s['T_JAB'] + $s['T_STT'] + $s['T_ANK'] + $s['T_PRG'] + $s['T_KES']
	?>
     
	<tr>
        <td align="center"><?php echo $s['GRADE'] ?></td>
        <td><?php echo $s['GOL'] ?></td>
        <td><?php echo $s['SUB_GOL'] ?></td>
        <td align="right"><?php echo number_format($s['HONOR'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($s['MAKAN'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($s['TRANSPORT'], 0,'',',') ?></td>
        <td align="right"><?php echo number_format($tunj, 0,'',',') ?></td>
		<?php
		if ($u['akses']=="manager"){
		?>
        <td align="center">
			<?php if($s['ACC']=="YA"){ ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='skim_acc?grade=<?php echo $s['GRADE']; ?>'" checked>
			<?php }else{ ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='skim_acc?grade=<?php echo $s['GRADE']; ?>'"><?php } ?></td>
		<?php
		}else{
		?>
        <td align="center">
			<?php if($s['ACC']=="YA"){ ?><input class="form-check-input" type="checkbox" name="acc" checked disabled>
			<?php }else{ ?><input class="form-check-input" type="checkbox" name="acc" disabled><?php } ?></td>
		<?php
		}
		?>
		<td>
			<a style="margin-bottom:10px" href="skim_lapsat?grade=<?php echo $s['GRADE'] ?>" target="_blank" class="btn btn-default pull-right"><span class="glyphicon glyphicon-print"></span></a>
			<?php
			if ($u['akses']=="manager"){
			?>
			<a onclick="if(confirm('Apakah anda yakin akan menghapus data dengan Grade : <?php echo $s['GRADE']; ?> ??')){ location.href='skim_delete?grade=<?php echo $s['GRADE']; ?>' }" class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash"></span></a>
			<a href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#ModalEdit<?php echo $s['GRADE']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
		<?php
			}
		?>
		</td>
		
<!-- Modal Edit Data-->
<div class="modal fade" id="ModalEdit<?php echo $s['GRADE']; ?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Data Entry</h4>
			</div>
			<?php
			$grade=$s['GRADE'];
			$query_edit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM skim WHERE GRADE='$grade'");
			while ($row = mysqli_fetch_array($query_edit)) {  
			?>
			<div class="modal-body">
				<form role="form" action="skim_update" method="post">
					<input type="hidden" name="grade" value="<?php echo $row['GRADE']; ?>">
					<div class="form-group">
						<label>GRADE <?php echo $row['GRADE']; ?> -- <?php echo $row['GOL']; ?> -- <?php echo $row['SUB_GOL']; ?></label> 
					</div>
					<div class="form-group">
						<label>Honor</label>
						<input name="honor" type="text" class="form-control" value="<?php echo $row['HONOR']; ?>">
					</div>
					<div class="form-group">
						<label>Makan</label> 
						<input name="makan" type="text" class="form-control" value="<?php echo $row['MAKAN']; ?>">
					</div>
					<div class="form-group">
						<label>Transport</label>   
						<input name="transport" type="text" class="form-control" value="<?php echo $row['TRANSPORT']; ?>">
					</div>
					<div class="form-group">
						<label>T. Jabatan</label>   
						<input name="T_JAB" type="text" class="form-control" value="<?php echo $row['T_JAB']; ?>">
					</div>
					<div class="form-group">
						<label>T. Status</label>   
						<input name="T_STT" type="text" class="form-control" value="<?php echo $row['T_STT']; ?>">
					</div>
					<div class="form-group">
						<label>T. Anak</label>   
						<input name="T_ANK" type="text" class="form-control" value="<?php echo $row['T_ANK']; ?>">
					</div>
					<div class="form-group">
						<label>T. Program</label>   
						<input name="T_PRG" type="text" class="form-control" value="<?php echo $row['T_PRG']; ?>">
					</div>
					<div class="form-group">
						<label>T. Kesehatan</label>   
						<input name="T_KES" type="text" class="form-control" value="<?php echo $row['T_KES']; ?>">
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
				<form role="form" action="skim_add" method="post">
                  <div class="row">
                  <div class="col-md-3 pr-1">
					<div class="form-group">
						<label>Grade</label>
						<select name="grade" id="grade" type="text" class="form-control" onchange="changeValue(this.value)">
							<option>.. pilih ..</option>
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
					</div>
					</div>
                    <div class="col-md-4 pr-1">
					<div class="form-group">
						<label>Golongan</label>
						<input name="gol" id="golongan" type="text" class="form-control" readonly="yes">
					</div>
					</div>
                    <div class="col-md-5 pr-1">
					<div class="form-group">
						<label>Sub Golongan</label>
						<input name="sub_gol" id="sub_golong" type="text" class="form-control" readonly="yes">
					</div>	
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
				</div>
				</div>
					<div class="form-group">
						<label>Honor</label>
						<input name="honor" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Makan</label> 
						<input name="makan" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Transport</label>   
						<input name="transport" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>T. Jabatan</label>   
						<input name="T_JAB" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>T. Status</label>   
						<input name="T_STT" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>T. Anak</label>   
						<input name="T_ANK" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>T. Program</label>   
						<input name="T_PRG" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>T. Kesehatan</label>   
						<input name="T_KES" type="text" class="form-control">
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