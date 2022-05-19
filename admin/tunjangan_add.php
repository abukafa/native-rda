<?php 
include 'config.php';
$nisr=$_POST['NISR'];
$nama=$_POST['NAME'];
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

$id = substr($nisr,7,4) . substr($nisr,0,3) ;
				
mysqli_query($GLOBALS["___mysqli_ston"], "insert into tunjangan values('$nisr', '$nama', '$id', '$t_jab', '$t_stt', '$t_ank', '$t_rmh', '$t_prg', '$t_srg', '$t_atr', '$t_kes', '$t_hra', '$t_dka', '$t_haj', '$t_bns', '$t_spc', '$t_eks', '')");
mysqli_query($GLOBALS["___mysqli_ston"], "update potongan set P_SRG='$t_srg', P_ATR='$t_atr', P_KES='$t_kes', P_RMH='$t_rmh' where NISR='$nisr'");
header("location:tunjangan");
?>