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

// -------------------------------------------------------------------------- Table Santri
if(isset($_POST["Import-santri"])){
	$con = getdb(); 
	$filename=$_FILES["file"]["tmp_name"];		
	if($_FILES["file"]["size"] > 0){
		$file = fopen($filename, "r");
		while (($getData = fgetcsv($file, 10000, ",")) !== FALSE){
			$sql = "INSERT into santri ('NISR', 'NO_ABSEN', 'KTP', 'GENDER', 'NAMA', 'PANGGILAN', 'TMP_LAHIR', 'TGL_LAHIR', 'GOL_DARAH', 'STATUS', 'JML_ISTRI', 'PENDIDIKAN', 'ALAMAT', 'KEC', 'KAB', 'POS', 'ASAL', 'HANDPHONE', 'EMAIL', 'PASANGAN', 'JML_ANAK', 'THN_GABUNG', 'LAZNAH', 'STATUS_RDA', 'GRADE', 'GOLONGAN', 'SUB_GOLONG', 'JABATAN', 'STATUS_SANTRI', 'T_JAB', 'T_STT', 'T_ANK', 'T_RMH', 'T_PRG', 'T_KES', 'T_SRG', 'T_ATR', 'T_HRA', 'T_HAJ', 'T_DKA', 'T_BNS', 'T_SPC', 'T_EKS', 'ACC') 
			values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."'	,'".$getData[6]."'	,'".$getData[7]."'	,'".$getData[8]."'	,'".$getData[9]."'	,'".$getData[10]."'	,'".$getData[11]."'	,'".$getData[12]."'	,'".$getData[13]."'	,'".$getData[14]."'	,'".$getData[15]."'	,'".$getData[16]."'	,'".$getData[17]."'	,'".$getData[18]."'	,'".$getData[19]."'	,'".$getData[20]."'	,'".$getData[21]."'	,'".$getData[22]."'	,'".$getData[23]."'	,'".$getData[24]."'	,'".$getData[25]."'	,'".$getData[26]."'	,'".$getData[27]."'	,'".$getData[28]."'	,'".$getData[29]."'	,'".$getData[30]."'	,'".$getData[31]."'	,'".$getData[32]."'	,'".$getData[33]."'	,'".$getData[34]."'	,'".$getData[35]."'	,'".$getData[36]."'	,'".$getData[37]."'	,'".$getData[38]."'	,'".$getData[39]."'	,'".$getData[40]."'	,'".$getData[41]."'	,'".$getData[42]."'	,'".$getData[43]."')";
			$result = mysqli_query($con, $sql);
			if(!isset($result)){
				echo "<script type=\"text/javascript\">
					alert(\"Invalid File : Please Upload CSV File.\");
					window.location = \"santri.php\"
					</script>";		
				}else{
				echo"<script type=\"text/javascript\">
					alert(\"CSV File has been successfully send to Import .\");
					window.location = \"santri.php\"
					</script>";
			}
		}
		fclose($file);	
	}
}
 if(isset($_POST["Export-santri"])){
	$con = getdb(); 
	header('Content-Type: text/csv; charset=utf-8');  
	header('Content-Disposition: attachment; filename=santri.csv');  
	$output = fopen("php://output", "w");  
	fputcsv($output, array('NISR', 'NO_ABSEN', 'KTP', 'GENDER', 'NAMA', 'PANGGILAN', 'TMP_LAHIR', 'TGL_LAHIR', 'GOL_DARAH', 'STATUS', 'JML_ISTRI', 'PENDIDIKAN', 'ALAMAT', 'KEC', 'KAB', 'POS', 'ASAL', 'HANDPHONE', 'EMAIL', 'PASANGAN', 'JML_ANAK', 'THN_GABUNG', 'LAZNAH', 'STATUS_RDA', 'GRADE', 'GOLONGAN', 'SUB_GOLONG', 'JABATAN', 'STATUS_SANTRI', 'T_JAB', 'T_STT', 'T_ANK', 'T_RMH', 'T_PRG', 'T_KES', 'T_SRG', 'T_ATR', 'T_HRA', 'T_HAJ', 'T_DKA', 'T_BNS', 'T_SPC', 'T_EKS', 'ACC')); 
	$query = "SELECT * from santri ORDER BY LAZNAH , NAMA";  
	$result = mysqli_query($con, $query);  
	while($row = mysqli_fetch_assoc($result)){  
		fputcsv($output, $row);  
		}  
	fclose($output);  
}

// -------------------------------------------------------------------------- Table Remunerasi

 if(isset($_POST["Export-remun"])){
	$con = getdb(); 
	header('Content-Type: text/csv; charset=utf-8');  
	header('Content-Disposition: attachment; filename=remunerasi.csv');  
	$output = fopen("php://output", "w");  
	fputcsv($output, array('NISR', 'NAMA', 'GRADE', 'STATUS_SANTRI', 'STATUS_RDA', 'JABATAN', 'LAZNAH')); 
	$query = "SELECT NISR, NAMA, GRADE, STATUS_SANTRI, STATUS_RDA, JABATAN, LAZNAH from santri ORDER BY LAZNAH , NAMA";  
	$result = mysqli_query($con, $query);  
	while($row = mysqli_fetch_assoc($result)){  
		fputcsv($output, $row);  
		}  
	fclose($output);  
}
?>