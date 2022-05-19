<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	include 'config.php';
	if(!isset($_SESSION['uname'])){
		header("location:../");
		exit;
	}
	?>
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<title>RDA</title>
	<link rel="stylesheet" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href='../img/BGG.png' rel='shortcut icon'>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand"> Sistem Informasi Managemen</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<!-- <li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li> -->
					<?php 
			$use=$_SESSION['uname'];
			$nm=mysqli_query($GLOBALS["___mysqli_ston"], "select * from admin where uname='$use'");
			while($name=mysqli_fetch_array($nm)){
				?>
					<li class="nav-item"><a class="nav-link" href="home">Home</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="santri">Database</a>
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
            Remunerasi
          </a>
          <ul class="dropdown-menu">
			<?php
			if ($name['akses']=="supervisor" OR $name['akses']=="manager"){
			?>
            <li><a class="dropdown-item" href="skim">Skim</a></li>
			<?php
			}
			?>
            <li><a class="dropdown-item" href="absensi">Absensi</a></li>
            <li><a class="dropdown-item" href="tunjangan">Tunjangan</a></li>
            <li><a class="dropdown-item" href="potongan">Potongan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="remunerasi">Proses</a></li>
			<?php
			if ($name['akses']=="supervisor" OR $name['akses']=="manager"){
			?>
            <li><a class="dropdown-item" href="remunerasi_reset">Reset</a></li>
			<?php
			}
			?>
          </ul>
        </li>
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
            User <?php echo ucfirst($name['akses']) ?> <span class="glyphicon glyphicon-user"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="admin">Admin</a></li>
            <li><a class="dropdown-item" href="admin_pass">Password</a></li>
            <li><a class="dropdown-item" href="logout">Logout</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" role="button" href="#" data-toggle="modal" data-target="#modaluser"><?php echo $name['name']  ?></a></li>
          </ul>
        </li>
				</ul>
			</div>
		</div>
	</div>
	<br><br><br>
	
	
	<!-- modal input -->
	<div id="modaluser" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">User Information</h4>
				</div>
				<div class="modal-body" >
				<a class="thumbnail">			
				<?php
					if(file_exists("foto/" . $name['uname'] . ".jpg")){ 
					?>
						<img class="img-responsive" src="foto/<?php echo $name['uname'] ?>.jpg">
					<?php }else{ ?>
						<img class="img-responsive" src="../img/no.png">
				<?php
				}
				?></a>
				<div  align="center">
					<h3><?php echo $name['name']; ?></h3>
					<h4>as <?php echo $name['akses']; ?></h4>
				</div>	
				<?php 
				}
				?>
				</div>
			</div>
		</div>
	</div>



		
