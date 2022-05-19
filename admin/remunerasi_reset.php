<html lang="en">
<?php 
	include 'header.php';
?>

<!-- Data Title -->
<center>
	<h3>RESET REMUNERASI</h3>
	<h4>RUMAH DAKWAH ABU</h4>
	<h4>- RDA -</h4>
	</br>
	</br>
	<h3>WARNING !!</h3>
	<h4>Sebelum Melakukan Reset Data</h4>
	<h3>Pastikan Remunerasi <?php echo date('M Y'); ?> telah Selesai</h3>
	<h4>Proses Reset ini akan menghapus data ABSENSI</h4>
	<h4>dan Mereset Semua TUNJANGAN & POTONGAN menjadi 0</h4>
	</br>
	<a onclick="if(confirm('Apakah anda yakin akan me-RESET & menghapus data ??')){ location.href='remunerasi_resetact.php' }" class="btn btn-danger">RESET <span class="glyphicon glyphicon-refresh"></span></a>
	</br>
	</br>
	<?php
	$absen = mysqli_query($GLOBALS["___mysqli_ston"], "select count(*)as rcd from absensi");
	while($a=mysqli_fetch_array($absen)){
	$tunjangan=mysqli_query($GLOBALS["___mysqli_ston"], "select sum(T_JAB) as jab, sum(T_STT) as stt, sum(T_ANK) as ank, sum(T_RMH) as rmh, sum(T_PRG) as prg, sum(T_KES) as kes, sum(T_SRG) as srg, sum(T_ATR) as atr, sum(T_HRA) as hra, sum(T_HAJ) as haj, sum(T_DKA) as dka, sum(T_BNS) as bns, sum(T_SPC) as spc, sum(T_EKS) as eks from tunjangan");
	while($t=mysqli_fetch_array($tunjangan)){
	$ttunj = $t['jab'] + $t['stt'] +	$t['ank'] +	$t['rmh'] +	$t['prg'] +	$t['kes'] +	$t['srg'] +	$t['atr'] +	$t['hra'] +	$t['haj'] +	$t['dka'] +	$t['bns'] +	$t['spc'] +	$t['eks'] ;
	$potongan=mysqli_query($GLOBALS["___mysqli_ston"], "select sum(P_SRG) as psrg, sum(P_ATR) as patr, sum(P_KES) as pkes, sum(P_RMH) as prmh, sum(P_BON) as pbon, sum(P_HTG) phtg, sum(P_ZKT) as pzkt, sum(P_INF) as pinf, sum(P_LIN) as plin  from potongan");
	while($p=mysqli_fetch_array($potongan)){
	$tpot = $p['psrg'] +	$p['patr'] +	$p['pkes'] +	$p['prmh'] +	$p['pbon'] +	$p['phtg'] +	$p['pzkt'] +	$p['pinf'] +	$p['plin'] ;
	?>
	<h4>Data Absensi : <?php echo $a['rcd']; ?></h4>
	<h4>Total Tunjangan : <?php echo number_format($ttunj,0,'.',','); ?></h4>
	<h4>Total Potongan : <?php echo number_format($tpot,0,'.',','); ?></h4>
	<?php
	}
	}
	}
	?>
</center>



</html>