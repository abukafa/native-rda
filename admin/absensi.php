<html lang="en">
<?php
include 'header.php';
?>

<!-- Data Title -->
<center>
	<h2>Data Absensi</h2>
	<h4>RUMAH DAKWAH ABU</h4>
	<h4>- RDA -</h4>
</center>

<?php
$uname = $_SESSION['uname'];
$admin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname'");
while ($u = mysqli_fetch_array($admin)) {
?>

	<!-- Filter Data Santri -->
	<div class="container-fluid">
		<div class="btn-group pull-right">
			<a class="btn btn-default" href="#" data-toggle="modal" data-target="#ModalEntri">New Entri <span class="glyphicon glyphicon-plus"></span></a>
			<a style="margin-bottom:10px" href="absensi_lapall" target="_blank" class="btn btn-default">Rekap <span class="glyphicon glyphicon-print"></span></a>
		</div>

		<form action="" method="get">
			<div class="input-group col-md-2">
				<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
				<input type="text" class="form-control" name="cari" id="cari" placeholder=".. search .." onchange="changeValue(this.value)">
			</div>
		</form>

		<!-- Detail Data Santri -->
		<table class="table table-striped table-hover">
			<tr class="active">
				<th>No</th>
				<th>NISR</th>
				<th>Nama</th>
				<th>Laznah</th>
				<th>Bulan</th>
				<th>Hari</th>
				<th>Hadir</th>
				<th></th>
				<th>Lambat</th>
				<th></th>
				<th>Lembur</th>
				<th></th>
				<th>Total</th>
				<th>
					<center>Acc</center>
				</th>
				<th></th>
			</tr>
			<?php
			if (isset($_GET['cari'])) {
				$search = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['cari']);
				$absensi = mysqli_query($GLOBALS["___mysqli_ston"], "select absensi.*, santri.LAZNAH, santri.STATUS_RDA from absensi left join santri on absensi.NISR=santri.NISR where absensi.NAMA LIKE '%$search%' order by absensi.NAMA");
			} else {
				$absensi = mysqli_query($GLOBALS["___mysqli_ston"], "select absensi.*, santri.LAZNAH, santri.STATUS_RDA from absensi left join santri on absensi.NISR=santri.NISR order by santri.LAZNAH, absensi.NAMA");
			}
			$no = 1;
			while ($p = mysqli_fetch_array($absensi)) {
			?>

				<tr style="<?= ($p['STATUS_RDA'] == 'SUSPEND' || $p['LAZNAH'] == '') ? 'color: red' : '' ?>">
					<td><?php echo $no ?></td>
					<td><?php echo $p['NISR'] ?></td>
					<td><?php echo $p['NAMA'] ?></td>
					<td><?php echo $p['LAZNAH'] ?></td>
					<td><?php echo $p['BULAN'] ?></td>
					<td align="Right"><?php echo $p['HARI'] ?></td>
					<td align="Right"><?php echo $p['HADIR'] ?></td>
					<td align="Right"><?php echo number_format($p['P_HDR'], 0, '.', ',') . ' %' ?></td>
					<td align="Right"><?php echo $p['LAMBAT'] ?></td>
					<td align="Right"><?php echo number_format($p['P_LBT'], 0, '.', ',') . ' %' ?></td>
					<td align="Right"><?php echo $p['LEMBUR'] ?></td>
					<td align="Right"><?php echo number_format($p['P_LBR'], 0, '.', ',') . ' %' ?></td>
					<td align="Right"><?php echo number_format($p['TOTAL'], 2, '.', ',') ?></td>
					<?php
					if ($u['akses'] == "manager" or $u['akses'] == "supervisor") {
					?>
						<td align="center">
							<?php if ($p['ACC'] == "YA") { ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='absensi_acc?nisr=<?php echo $p['NISR']; ?>'" checked>
							<?php } else { ?><input class="form-check-input" type="checkbox" name="acc" onclick="window.location.href='absensi_acc?nisr=<?php echo $p['NISR']; ?>'"><?php } ?></td>
					<?php
					} else {
					?>
						<td align="center">
							<?php if ($p['ACC'] == "YA") { ?><input class="form-check-input" type="checkbox" name="acc" checked disabled>
							<?php } else { ?><input class="form-check-input" type="checkbox" name="acc" disabled><?php } ?></td>
					<?php
					}
					?>
					<td>
						<?php
						if ($u['akses'] == "manager" or $u['akses'] == "supervisor") {
						?>
							<a onclick="if(confirm('Apakah anda yakin akan menghapus data Absensi dengan ID : <?php echo $p['ID']; ?> ??')){ location.href='absensi_delete?id=<?php echo $p['ID']; ?>' }" class="btn btn-default pull-right"><span class="glyphicon glyphicon-trash"></span></a>
						<?php
						}
						?>
						<a href="absensi_edit?id=<?php echo $p['ID']; ?>" class="btn btn-default pull-right"><span class="glyphicon glyphicon-edit"></span></a>

					</td>
				</tr>
		<?php
				$no++;
			}
		}
		?>
		</table>

		<!-- Modal Entri Data-->
		<div class="modal fade" id="ModalEntri" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Data Entry</h4>
					</div>
					<div class="modal-body">
						<form role="form" action="absensi_add" method="post">
							<div class="row">
								<div class="col-md-4 pr-1">
									<div class="form-group">
										<label>NISR</label>
										<select name="NISR" id="NISR" type="text" class="form-control" onchange="changeValue(this.value)">
											<option>.. pilih ..</option>
											<?php
											$brg = mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri order by NAMA");
											$brg = mysqli_query($GLOBALS["___mysqli_ston"], "select santri.* from santri left join absensi on santri.NISR=absensi.NISR where absensi.NISR is NULL order by NAMA");
											$jsArray = "var sant = new Array();\n";
											while ($b = mysqli_fetch_array($brg)) {
												echo '<option value="' . $b['NISR'] . '">' . $b['NISR'] . " - " . $b['NAMA'] . '</option>';
												$jsArray .= "sant['" . $b['NISR'] . "'] = {NAMA:'" . addslashes($b['NAMA']) . "'};\n";
											}
											?>
										</select></td>
									</div>
								</div>
								<div class="col-md-8 pr-1">
									<div class="form-group">
										<label>Nama</label>
										<input name="NAMA" id="NAMA" type="text" class="form-control" readonly="yes">
									</div>
									<script type="text/javascript">
										<?php echo $jsArray; ?>

										function changeValue(NISR) {
											document.getElementById('NAMA').value = sant[NISR].NAMA;
										};
									</script>
									<div class="form-group">
										<label>Bulan</label>
										<select name="BULAN" type="text" class="form-control">
											<?php $prd = date('M-Y', strtotime(date('M-Y') . '- 1 month')); ?>
											<option value="<?php echo $prd; ?>"><?php echo $prd; ?></option>
											<?php
											$bulan = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
											$jlh_bln = count($bulan);
											for ($i = date('Y') - 1; $i <= date('Y') + 1; $i++) {
												for ($c = 0; $c < $jlh_bln; $c += 1) {
													echo "<option value=$bulan[$c]-$i> $bulan[$c]-$i </option>";
												}
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Hari Kerja</label>
										<select name="HARI" id="HARI" type="text" class="form-control" onchange="hadirin()">
											<option value="25">25</option>
											<?php
											for ($i = 0; $i <= 31; $i++) {
												echo "<option value='$i'> $i </option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 pl-1">
									<div class="form-group">
										<label>Kehadiran</label>
										<select name="HADIR" id="HADIR" type="submit" class="form-control" onchange="hadirin()">
											<option value="-">.. pilih ..</option>
											<?php
											for ($i = 0; $i <= 31; $i++) {
												echo "<option value='$i'> $i </option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-2 px-1">
									<div class="form-group">
										<label>%</label>
										<input name="P_HDR" id="P_HDR" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 pl-1">
									<div class="form-group">
										<label>Terlambat</label>
										<select name="LAMBAT" id="LAMBAT" type="text" class="form-control" onchange="hadirin()">
											<option value="-">.. pilih ..</option>
											<?php
											for ($i = 0; $i <= 31; $i++) {
												echo "<option value='$i'> $i </option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-2 px-1">
									<div class="form-group">
										<label>%</label>
										<input name="P_LBT" id="P_LBT" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 pl-1">
									<div class="form-group">
										<label>Lembur</label>
										<select name="LEMBUR" id="LEMBUR" type="text" class="form-control" onchange="hadirin()">
											<option value="-">.. pilih ..</option>
											<?php
											for ($i = 0; $i <= 31; $i++) {
												echo "<option value='$i'> $i </option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-2 px-1">
									<div class="form-group">
										<label>%</label>
										<input name="P_LBR" id="P_LBR" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10 pl-1">
									<div class="form-group">
										<label>Total</label>
										<input name="TOTAL" id="TOTAL" type="text" class="form-control" readonly>
									</div>
								</div>
								<div class="col-md-2 px-1">
									<div class="form-group">
										<label>%</label>
										<input name="P_TTL" id="P_TTL" type="text" class="form-control" readonly>
									</div>
								</div>
							</div>
							<script type="text/javascript">
								function hadirin() {
									var hr = document.getElementById('HARI').value;
									var dr = document.getElementById('HADIR').value;
									var bt = document.getElementById('LAMBAT').value;
									var br = document.getElementById('LEMBUR').value;
									var hdr = dr / hr * 100;
									var lbt = bt / hr * 10;
									var lbr = br / hr * 100;
									var tot = dr / hr - (bt / 100) + (br / hr) * 0.2;
									var ttl = tot * 100;
									document.getElementById('P_HDR').value = hdr;
									document.getElementById('P_LBT').value = lbt;
									document.getElementById('P_LBR').value = lbr;
									document.getElementById('TOTAL').value = tot;
									document.getElementById('P_TTL').value = ttl;
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

		<!-- Import data -->
		<form class="form-horizontal" action="absensi_import" method="post" name="upload_excel" enctype="multipart/form-data">
			<table class="table">
				<td>
					<div class="form-group">
						<label class="col-md-9 control-label" for="filebutton"></label>
						<div class="col-md-1.2">
							<input type="file" name="file" id="file" accept=".csv" class="input-large">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-9 control-label" for="singlebutton">Upload CSV file</label>
						<div class="col-md-1.2">
							<button type="submit" id="submit" name="Import-absensi" class="btn btn-warning button-loading" data-loading-text="Loading..."><span class='glyphicon glyphicon-upload'></span> Import</button>
						</div>
					</div>
				</td>
			</table>
		</form>
	</div>

	<!-- Footer Data -->
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