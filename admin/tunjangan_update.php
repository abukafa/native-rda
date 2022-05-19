<?php 
include 'config.php';
$nisr=$_POST['NISR'];
$t_jab=$_POST['T_JAB'];
$t_stt=$_POST['T_STT'];
$t_ank=$_POST['T_ANK'];
$t_rmh=$_POST['T_RMH'];
$t_prg=$_POST['T_PRG'];
$t_srg=$_POST['T_SRG'];
$t_atr=$_POST['T_ATR'];
$t_kes=$_POST['T_KES'];
$t_hra=$_POST['T_HRA'];
$t_dka=$_POST['T_DKA'];
$t_haj=$_POST['T_HAJ'];
$t_bns=$_POST['T_BNS'];
$t_spc=$_POST['T_SPC'];
$t_eks=$_POST['T_EKS'];

mysqli_query($GLOBALS["___mysqli_ston"], "update tunjangan set T_JAB='$t_jab', T_STT='$t_stt', T_ANK='$t_ank', T_RMH='$t_rmh', T_PRG='$t_prg', T_SRG='$t_srg', T_ATR='$t_atr', T_KES='$t_kes', T_HRA='$t_hra', T_DKA='$t_dka', T_HAJ='$t_haj', T_BNS='$t_bns', T_SPC='$t_spc', T_EKS='$t_eks', ACC='' where NISR='$nisr'");
mysqli_query($GLOBALS["___mysqli_ston"], "update potongan set  P_SRG='$t_srg', P_ATR='$t_atr', P_KES='$t_kes', P_RMH='$t_rmh' where NISR='$nisr'");
header("location:tunjangan");
?>