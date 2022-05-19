<?php 
include 'config.php';
$nisr=$_POST['NISR'];
$p_srg=$_POST['P_SRG'];
$p_atr=$_POST['P_ATR'];
$p_kes=$_POST['P_KES'];
$p_rmh=$_POST['P_RMH'];
$p_bon=$_POST['P_BON'];
$p_htg=$_POST['P_HTG'];
$p_zkt=$_POST['P_ZKT'];
$p_inf=$_POST['P_INF'];
$p_lin=$_POST['P_LIN'];

mysqli_query($GLOBALS["___mysqli_ston"], "update potongan set P_SRG='$p_srg', P_ATR='$p_atr', P_KES='$p_kes', P_RMH='$p_rmh', P_BON='$p_bon', P_HTG='$p_htg', P_ZKT='$p_zkt', P_INF='$p_inf', P_LIN='$p_lin', ACC='' where NISR='$nisr'");
header("location:potongan");
?>