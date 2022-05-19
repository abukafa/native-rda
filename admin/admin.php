<html lang="en">
<?php 
	include 'header.php';
?>

<!-- Data Title -->
<center><h2>Data Admin</h2></center>

<?php
$uname = $_SESSION['uname'];
$admin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname'");
while($u=mysqli_fetch_array($admin)){
if ($u['akses']=="manager"){
?>
<center><a class="btn btn-default" href="#" data-toggle="modal" data-target="#ModalEntri">New Entri <span class="glyphicon glyphicon-plus"></span></a></center>
<?php
}
?>

<br/>
<div class="container">
<table class="table table-striped table-hover">
	<head>
    <tr>
        <th>NISR</th>
        <th>Username</th>
        <th>Name</th>
        <th>Jabatan</th>
        <th>Laznah</th>
        <th>Akses</th>
        <th></th>
    </tr>
	<?php 
	$admin=mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin order by id");
	$no=1;
	while($a=mysqli_fetch_array($admin)){
	?>
     
	</head>
	<tbody> 
	<tr>
        <td><?php echo $a['id'] ?></td>
        <td><?php echo $a['uname'] ?></td>
        <td><?php echo $a['name'] ?></td>
        <td><?php echo $a['jabatan'] ?></td>
        <td><?php echo $a['laznah'] ?></td>
        <td><?php echo $a['akses'] ?></td>
		<td>
        <?php
		if ($u['akses']=="manager"){
		?>
		<a onclick="if(confirm('Apakah anda yakin akan menghapus data user : <?php echo $a['uname']; ?> ??')){ location.href='admin_delete.php?id=<?php echo $a['id']; ?>' }" class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash"></span></a>
		<?php 
		}
		?>
		</td>
	</tr>
	<?php 
	}
}
?>
	</tbody> 
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
				<form role="form" action="admin_add.php" method="post">
                  <div class="row">
                  <div class="col-md-4 pr-1">
					<div class="form-group">
						<label>NISR</label>
						<select name="nisr" id="nisr" type="text" class="form-control" onchange="changeValue(this.value)">
							<option value="0">.. pilih ..</option>
							<?php 
							$brg=mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri order by NAMA");
							$jsArray = "var sant = new Array();\n";        
							while($b=mysqli_fetch_array($brg)){
							echo '<option value="' . $b['NISR'] . '">' . $b['NISR'] ." - ". $b['NAMA'] . '</option>';
							$jsArray .= "sant['" . $b['NISR'] . "'] = {NAMA:'" . addslashes($b['NAMA']) . "',JAB:'".addslashes($b['JABATAN']) . "',LAZ:'".addslashes($b['LAZNAH']) . "'};\n";
							}
							?>
						</select></td>
					</div>
					</div>
                    <div class="col-md-8 pr-1">
					<div class="form-group">
						<label>Nama</label>
						<input name="nama" id="nama" type="text" class="form-control" readonly="yes">
					</div>	
					</div>
                    <div class="col-md-4 pr-1">
					</div>
                    <div class="col-md-8 pr-1">
					<div class="form-group">
						<input name="jab" id="jab" type="text" class="form-control" readonly="yes">
					</div>	
                    <div class="col-md-4 pr-1">
					</div>
                    <div class="col-md-13 pr-1">
					<div class="form-group">
						<input name="laz" id="laz" type="text" class="form-control" readonly="yes">
					</div>	
					</div>
					<script type="text/javascript">    
					<?php echo $jsArray; ?>  
					function changeValue(NISR){  
						document.getElementById('nama').value = sant[NISR].NAMA;
						document.getElementById('jab').value = sant[NISR].JAB;
						document.getElementById('laz').value = sant[NISR].LAZ;
					};  
					</script>
				</div>
				</div>
					<div class="form-group">
						<label>Username</label>
						<input name="uname" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Default Password</label> 
						<input name="pass" type="text" class="form-control" value="rda123">
					</div>
					<div class="form-group">
						<label>Akses</label>   
						<select name="akses" type="text" class="form-control">
							<option value="-">.. pilih ..</option>
							<option value="user">USER</option>
							<option value="supervisor">SUPERVISOR</option>
							<option value="manager">MANAGER</option>
						</select>
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