<?php 
include 'config.php';
$nisr=$_POST['nisr'];
$no_absen=$_POST['no_absen'];
$ktp=$_POST['ktp'];
$gender=$_POST['gender'];
$nama=$_POST['nama'];
$panggilan=$_POST['panggilan'];
$tmp_lahir=$_POST['tmp_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$gol_darah=$_POST['gol_darah'];
$status=$_POST['status'];
$jml_istri=$_POST['jml_istri'];
$pendidikan=$_POST['pendidikan'];
$alamat=$_POST['alamat'];
$kec=$_POST['kec'];
$kab=$_POST['kab'];
$pos=$_POST['pos'];
$asal=$_POST['asal'];
$handphone=$_POST['handphone'];
$email=$_POST['email'];
$pasangan=$_POST['pasangan'];
$jml_anak=$_POST['jml_anak'];
$thn_gabung=$_POST['thn_gabung'];
$laznah=$_POST['laznah'];
$status_rda=$_POST['status_rda'];
$grade=$_POST['grade'];
$golongan=$_POST['golongan'];
$sub_golong=$_POST['sub_golong'];
$jabatan=$_POST['jabatan'];
$status_santri=$_POST['status_santri'];
$t_jab=$_POST['t_jab'];
$t_stt=$_POST['t_stt'];
$t_ank=$_POST['t_ank'];
$t_rmh=$_POST['t_rmh'];
$t_prg=$_POST['t_prg'];
$t_srg=$_POST['t_srg'];
$t_atr=$_POST['t_atr'];
$t_kes=$_POST['t_kes'];
$t_hra=$_POST['t_hra'];
$t_dka=$_POST['t_dka'];
$t_haj=$_POST['t_haj'];
$t_bns=$_POST['t_bns'];
$t_spc=$_POST['t_spc'];
$t_eks=$_POST['t_eks'];

$id = substr($nisr,7,4) . substr($nisr,0,3) ;

$skim = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM skim WHERE GRADE='$grade'");
while ($k = mysqli_fetch_array($skim)) { 
$jab=$k['T_JAB'];
$stt=$k['T_STT'];
$ank=$k['T_ANK'];
$prg=$k['T_PRG'];
$kes=$k['T_KES'];

mysqli_query($GLOBALS["___mysqli_ston"], "insert into santri values('$nisr','$no_absen','$ktp','$gender','$nama','$panggilan','$tmp_lahir','$tgl_lahir', '$gol_darah', '$status', '$jml_istri', '$pendidikan', '$alamat', '$kec', '$kab', '$pos', '$asal', '$handphone', '$email', '$pasangan', '$jml_anak', '$thn_gabung', '$laznah', '$status_rda', '$grade', '$golongan', '$sub_golong', '$jabatan', '$status_santri', '$t_jab', '$t_stt', '$t_ank', '$t_rmh', '$t_prg', '$t_srg', '$t_atr', '$t_kes', '$t_hra', '$t_dka', '$t_haj', '$t_bns', '$t_spc', '$t_eks', '')");
mysqli_query($GLOBALS["___mysqli_ston"], "insert into tunjangan values('$nisr', '$nama', '$id', '$jab', '$stt', '$ank', '0', '$prg', '$kes', '0', '0', '0', '0', '0', '0', '0', '0', '')");
mysqli_query($GLOBALS["___mysqli_ston"], "insert into potongan values('$nisr', '$nama', '$id', '0', '0', '$kes', '0', '0', '0', '0', '0', '0', '')");

}
header("location:santri");
?>