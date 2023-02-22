<html lang="en">
<?php
include 'header.php';
?>

<!-- Data Title -->
<center>
	<h3>REMUNERASI - <?php echo date('M Y'); ?></h3>
	<h4>RUMAH DAKWAH ABU</h4>
	<h4>- RDA -</h4>
</center>

<div class="container-fluid">
	<!-- Filter Data Santri -->
	<?php
	$uname = $_SESSION['uname'];
	$admin = mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$uname'");
	while ($u = mysqli_fetch_array($admin)) {

		$s_acc = mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where ACC<>'YA'");
		$s_cek = mysqli_num_rows($s_acc);
		$a_acc = mysqli_query($GLOBALS["___mysqli_ston"], "select * from absensi where ACC<>'YA'");
		$a_cek = mysqli_num_rows($a_acc);
		$k_acc = mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim where ACC<>'YA'");
		$k_cek = mysqli_num_rows($k_acc);
		$t_acc = mysqli_query($GLOBALS["___mysqli_ston"], "select * from tunjangan where ACC<>'YA'");
		$t_cek = mysqli_num_rows($t_acc);
		$p_acc = mysqli_query($GLOBALS["___mysqli_ston"], "select * from potongan where ACC<>'YA'");
		$p_cek = mysqli_num_rows($p_acc);
		$blank = $s_cek + $a_cek + $k_cek + $t_cek + $p_cek;
		if ($blank == 0 and $u['akses'] == "user") {
	?>
			<a class="btn btn-default pull-right" id="derekap" href="remunerasi_derekap" target="_blank">Draft Rekap <span class="glyphicon glyphicon-print"></span></a>
		<?php
		} elseif ($blank == 0) {
		?>
			<div class="btn-group pull-right">
				<a class="btn btn-default" id="rekap" href="remunerasi_rekap" target="_blank">Rekap <span class="glyphicon glyphicon-print"></span></a>
				<a class="btn btn-default" name="slip" id="slip" href="remunerasi_slip" target="_blank">Slip <span class="glyphicon glyphicon-print"></span></a>
			</div>
		<?php
		} else {
			echo "<center><div class='alert alert-danger'>" . $blank . " Data Belum ACC !! Periksa di Draft.. Lakukan Akseptasi..</div></center>";
			echo "<a class='btn btn-default pull-right' href='remunerasi_draft' target='_blank'>Draft <span class='glyphicon glyphicon-print'></span></a>";
		}
		?>
		<form action="" method="get">
			<div class="input-group col-md-2">
				<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
				<input type="text" class="form-control" name="cari" id="cari" placeholder=".. search .." onchange="changeValue(this.value)">
			</div>
		</form>

		<!-- Detail Data Santri -->
		<table class="table table-striped table-hover">
			<tr class="info">
				<th>No</th>
				<th>NISR</th>
				<th>Nama</th>
				<th>Lanah</th>
				<th>Status</th>
				<th>RDA</th>
				<th>Lama</th>
				<th>Grade</th>
				<th>Absensi</th>
				<th>Honor</th>
				<th>Makan</th>
				<th>Transport</th>
				<th>Tunjangan</th>
				<th>Potongan</th>
				<th>Total</th>
			</tr>
			<?php
			if (isset($_GET['cari'])) {
				$search = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_GET['cari']);
				$santri = mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where STATUS_SANTRI='AKTIF' and STATUS_RDA<>'SUSPEND' and NAMA LIKE '%$search%' order by LAZNAH , NAMA");
			} else {
				$santri = mysqli_query($GLOBALS["___mysqli_ston"], "select * from santri where STATUS_SANTRI='AKTIF' and STATUS_RDA<>'SUSPEND' order by LAZNAH , NAMA");
			}
			$no = 1;
			while ($s = mysqli_fetch_array($santri)) {
				$nisr = $s['NISR'];
				$grade = $s['GRADE'];
				$lama = date('Y') - $s['THN_GABUNG'] + 1;
				switch ($lama) {
					case 1:
						$loy = 0.5;
						break;
					case 2:
						$loy = 0.6;
						break;
					case 3:
						$loy = 0.8;
						break;
					case 4:
						$loy = 1.0;
						break;
					case 5:
						$loy = 1.1;
						break;
					case 6:
						$loy = 1.3;
						break;
					case 7:
						$loy = 1.5;
						break;
					case 8:
						$loy = 1.7;
						break;
					case 9:
						$loy = 1.9;
						break;
					case 10:
						$loy = 2.0;
						break;
					default:
						$loy = 2.1;
						break;
				}
			?>
				<tr>
					<td><?php echo $no ?></td>
					<td><?php echo $s['NISR'] ?></td>
					<td><?php echo $s['NAMA'] ?></td>
					<td><?php echo $s['LAZNAH'] ?></td>
					<td><?php echo $s['STATUS_SANTRI'] ?></td>
					<td><?php echo $s['STATUS_RDA'] ?></td>
					<td align="center"><?php echo $lama ?></td>
					<td align="center"><?php echo $grade ?></td>

					<?php
					$absensi = mysqli_query($GLOBALS["___mysqli_ston"], "select * from absensi where NISR='$nisr'");
					while ($a = mysqli_fetch_array($absensi)) {
					?>
						<td align="center"><?php echo $a['HADIR'] ?></td>

						<?php
						$skim = mysqli_query($GLOBALS["___mysqli_ston"], "select * from skim where GRADE='$grade'");
						while ($k = mysqli_fetch_array($skim)) {
							if ($s['STATUS_SANTRI'] == "AKTIF" && $s['STATUS_RDA'] == "KHIDMAT" && $lama >= 1) {
								$honor = $k['HONOR'] * $loy;
							} else {
								$honor = 0;
							}
							if ($s['STATUS_SANTRI'] == "AKTIF" && $lama >= 1) {
								$makan = $k['MAKAN'] * 1;
								$trans = $k['TRANSPORT'] * 1;
							} else if ($s['STATUS_SANTRI'] == "AKTIF" && $lama >= 1) {
								$makan = $k['MAKAN'] * round($a['TOTAL']);
								$trans = $k['TRANSPORT'] * round($a['TOTAL']);
							} else {
								$makan = 0;
								$trans = 0;
							}
							$pokok = $honor + $makan + $trans;
						?>
							<td align="right"><?php echo $honor ?></td>
							<td align="right"><?php echo $makan ?></td>
							<td align="right"><?php echo $trans ?></td>

							<?php
							$tunjangan = mysqli_query($GLOBALS["___mysqli_ston"], "select * from tunjangan where NISR='$nisr'");
							while ($t = mysqli_fetch_array($tunjangan)) {
								$ttunj = $t['T_JAB'] +	$t['T_STT'] +	$t['T_ANK'] +	$t['T_RMH'] +	$t['T_PRG'] +	$t['T_KES'] +	$t['T_SRG'] +	$t['T_ATR'] +	$t['T_HRA'] +	$t['T_HAJ'] +	$t['T_DKA'] +	$t['T_BNS'] +	$t['T_SPC'] +	$t['T_EKS'];
							?>
								<td align="right"><?php echo $ttunj ?></td>

								<?php
								$potongan = mysqli_query($GLOBALS["___mysqli_ston"], "select * from potongan where NISR='$nisr'");
								while ($p = mysqli_fetch_array($potongan)) {
									$tpot = $p['P_SRG'] +	$p['P_ATR'] +	$p['P_KES'] +	$p['P_RMH'] +	$p['P_BON'] +	$p['P_HTG'] +	$p['P_ZKT'] +	$p['P_INF'] +	$p['P_LIN'];
									$total = $pokok + $ttunj - $tpot;
								?>
									<td align="right"><?php echo $tpot ?></td>
									<td align="right"><?php echo number_format($total, 0, '.', ',') ?></td>
			<?php
									$no++;
								}
							}
						}
					}
				}
			}
			?>
				</tr>
		</table>
</div>

<script type="text/javascript">
	document.getElementById('slip').disabled = true;
</script>

<!-- Footer Data Santri -->
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