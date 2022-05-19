<?php 
include 'config.php';
$nisr=$_POST['NISR'];
$nama=$_POST['NAME'];
$p_srg=$_POST['P_SRG'];
$p_atr=$_POST['P_ATR'];
$p_kes=$_POST['P_KES'];
$p_rmh=$_POST['P_RMH'];
$p_bon=$_POST['P_BON'];
$p_htg=$_POST['P_HTG'];
$p_zkt=$_POST['P_ZKT'];
$p_inf=$_POST['P_INF'];
$p_lin=$_POST['P_LIN'];

$id = substr($nisr,7,4) . substr($nisr,0,3) ;
				
mysqli_query($GLOBALS["___mysqli_ston"], "insert into potongan values('$nisr', '$nama', '$id', '$p_srg', '$p_atr', '$p_kes', '$p_rmh', '$p_bon', '$p_htg', '$p_zkt', '$p_inf', '$p_lin', '')");
header("location:potongan");
?>