<?php 
include 'config.php';
$grade=$_POST['grade'];
$gol=$_POST['gol'];
$sub_gol=$_POST['sub_gol'];
$honor=$_POST['honor'];
$makan=$_POST['makan'];
$transport=$_POST['transport'];
$jab=$_POST['T_JAB'];
$stt=$_POST['T_STT'];
$ank=$_POST['T_ANK'];
$prg=$_POST['T_PRG'];
$kes=$_POST['T_KES'];

mysqli_query($GLOBALS["___mysqli_ston"], "insert into skim values('$grade', '$gol', '$sub_gol', '$honor', '$makan', '$transport', '$jab', '$stt', '$ank', '$prg', '$kes', '')");
header("location:skim");
?>