<?php 
include 'config.php';
				
mysqli_query($GLOBALS["___mysqli_ston"], "delete from absensi");
mysqli_query($GLOBALS["___mysqli_ston"], "update tunjangan set T_JAB='0', T_STT='0', T_ANK='0', T_RMH='0', T_PRG='0', T_SRG='0', T_ATR='0', T_KES='0', T_HRA='0', T_DKA='0', T_HAJ='0', T_BNS='0', T_SPC='0', T_EKS='0', ACC='' ");
mysqli_query($GLOBALS["___mysqli_ston"], "update potongan set P_SRG='0', P_ATR='0', P_KES='0', P_RMH='0', P_BON='0', P_HTG='0', P_ZKT='0', P_INF='0', P_LIN='0', ACC='' ");

header("location:remunerasi_reset.php");
?>