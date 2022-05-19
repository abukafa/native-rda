<html lang="en">
<?php 
	include 'header.php';
?>


<!-- Data Title -->
<center>
	<h2>Database Pengurus</h2>
	<h4>RUMAH DAKWAH ABU</h4>
	<h4>- RDA -</h4>
</center>

<?php
$uname = $_SESSION['uname'];
$admin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname'");
while($u=mysqli_fetch_array($admin)){
?>

<div class="container-fluid">
<!-- Filter Data Santri -->
<div class="btn-group pull-right">
	<a class="btn btn-default" href="santri_new">New Entri <span class="glyphicon glyphicon-plus"></span></a>
	<a style="margin-bottom:10px" href="santri_lapall" target="_blank" class="btn btn-default">Rekap <span class="glyphicon glyphicon-print"></span></a>
</div>

<form action="" method="get">
	<div class="input-group col-md-2">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" name="cari" id="cari" placeholder=".. search .." onchange="changeValue(this.value)">
	</div>
</form>

<!-- Detail Data Santri -->
<table class="table table-striped table-hover">
    <tr class="success">
        <th>No</th>
        <th>NIP</th>
        <th>Nama</th>
        <th>Gabung</th>
        <th>Grade</th>
        <th>Sub. Golongan</th>
        <th>Jabatan</th>
        <th>Laznah</th>
        <th>Status</th>
        <th>Acc</th>
        <th></th>
    </tr>
	<?php 
		$no=1;
	if(isset($_GET['cari'])){
		$search = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['cari']);
		$santri=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where NISR LIKE '%$search%' OR NAMA LIKE '%$search%' order by LAZNAH , NAMA");
	}else{
		$santri=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri order by LAZNAH , NAMA");
	}
		while($s=mysqli_fetch_array($santri)){
	?>
     
	<tr>
        <td><?php echo $no ?></td>
        <td><?php echo $s['NISR'] ?></td>
        <td><?php echo $s['NAMA'] ?></td>
        <td><?php echo $s['THN_GABUNG'] ?></td>
        <td><?php echo $s['GRADE'] ?></td>
        <td><?php echo $s['SUB_GOLONG'] ?></td>
        <td><?php echo $s['JABATAN'] ?></td>
        <td><?php echo $s['LAZNAH'] ?></td>
        <td><?php echo $s['STATUS_RDA'] ?></td>
			<?php
			if ($u['akses']=="supervisor" OR $u['akses']=="manager"){
			?>
			<td align="center">
			<?php if($s['ACC']=="YA"){ ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='santri_acc?nisr=<?php echo $s['NISR']; ?>'" checked>
			<?php }else{ ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='santri_acc?nisr=<?php echo $s['NISR']; ?>'"><?php } ?></td>
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
			<a style="margin-bottom:10px" href="santri_lapsat?nisr=<?php echo $s['NISR'] ?>" target="_blank" class="btn btn-default pull-right"><span class="glyphicon glyphicon-print"></span></a>
			<?php
			if ($u['akses']=="supervisor" OR $u['akses']=="manager"){
			?>
			<a onclick="if(confirm('Apakah anda yakin akan menghapus data dengan NISR : <?php echo $s['NISR']; ?> ??')){ location.href='santri_delete?nisr=<?php echo $s['NISR']; ?>' }" class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash"></span></a>
			<a href="santri_edit?nisr=<?php echo $s['NISR'] ?>" class="btn btn-default pull-right"><span class="glyphicon glyphicon-edit"></span></a>
			<?php
			}
			?>
		</td>
		<?php
		$no++;
		?>
    </tr>
	<?php 
		}
	}
	?>
</table>

</div>

<!-- Export data -->
<form class="form-horizontal" action="function" method="post" name="upload_excel" enctype="multipart/form-data">
	<table class="table">
		<td><div class="form-group">
				<label class="col-md-9 control-label" >Download CSV file</label>
			<div class="col-md-1.2">
				<button type="submit" id="submit" name="Export-santri" class="btn btn-success button-loading" data-loading-text="Loading..."><span class='glyphicon glyphicon-download'></span>  Export</button>
			</div>
		</td>
	</table>
</form>	  

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

</html>