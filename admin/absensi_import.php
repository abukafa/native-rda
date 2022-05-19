<?php
function getdb(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "rda";
try {
    $conn = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e){
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

// -------------------------------------------------------------------------- Table Absensi
if(isset($_POST["Import-absensi"])){
	$con = getdb(); 
	$filename=$_FILES["file"]["tmp_name"];		
	if($_FILES["file"]["size"] > 0){
		$file = fopen($filename, "r");
		while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){
			$sql = "INSERT into absensi (ID, NISR, NAMA, BULAN, HARI, HADIR, P_HDR, LAMBAT, P_LBT, LEMBUR, P_LBR, TOTAL, ACC) 
			values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."'	,'".$getData[6]."'	,'".$getData[7]."'	,'".$getData[8]."'	,'".$getData[9]."'	,'".$getData[10]."'	,'".$getData[11]."'	,'".$getData[12]."')";
			$result = mysqli_query($con, $sql);
		}
		fclose($file);	
	}
header("location:absensi");
}

?>