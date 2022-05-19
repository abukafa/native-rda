<?php 
include 'config.php';
$grade=$_POST['grade'];
$honor=$_POST['honor'];
$makan=$_POST['makan'];
$transport=$_POST['transport'];
$jab=$_POST['T_JAB'];
$stt=$_POST['T_STT'];
$ank=$_POST['T_ANK'];
$prg=$_POST['T_PRG'];
$kes=$_POST['T_KES'];

mysqli_query($GLOBALS["___mysqli_ston"], "update skim set HONOR='$honor', MAKAN='$makan', TRANSPORT='$transport', T_JAB='$jab', T_STT='$stt', T_ANK='$ank', T_PRG='$prg', T_KES='$kes', ACC='' where GRADE='$grade'");
header("location:skim");
?>