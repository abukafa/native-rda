<?php 
include 'config.php';
$grade=$_GET['grade'];

mysqli_query($GLOBALS["___mysqli_ston"], "delete from skim where grade='$grade'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
header("Location:skim");
 ?>