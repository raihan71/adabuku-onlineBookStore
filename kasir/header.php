<?php
session_start();
if (!isset($_SESSION['username'])){
	header("location:../index.php?pesan=gagal");
}

include "config.php";
?>
<!DOCTYPE HTML>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADB: AdaBuku</title>
		<link rel="stylesheet" type="text/css" href="../css/default.css /">
		<link rel="stylesheet" type="text/css" href="../style/input-pop.css">
		<link rel="stylesheet" type="text/css" href="../style/button.css">
		<link rel="stylesheet" type="text/css" href="../css/popup.css">
		<link href="css/login.css" rel="stylesheet">
		<link href="css/login.min.css" rel="stylesheet">
		<link href="css/site.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style/prime.css" />
	<link rel="shortcut icon" type="../images/png" href="" />
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/nivo-slider.css" type="text/css" media="screen" />
	<script src="../js/jquery.min.js"></script>
	<script src="../js/zebra_datepicker.js"></script>
	<link rel="stylesheet" href="../css/default.css" />
	<script type="text/javascript" src=""></script>
</head>
<body>
	<header>
		<div id="header-inner">
			<a href="" id="logo">
				<p class="adb">AdaBuku</p>
			</a>
			<nav>
				<a href="" id="menu-icon"></a>
			<ul>
				<li><a href="index.php" class="current">Beranda</a></li>
				<li><img src="../images/record.png" class="shop">
				<ul class="submenu">
					<li><a href="buku.php">Buku</a></li>
					<li><a href="pasok.php">Pasok</a></li>
					<li><a href="penjualan.php">Penjualan</a></li>
				</li></ul>
				<li><a href="#popup2" id="pesan">Pesan</a></li>
				<div id="popup2">
			<div class="window2">
				<a href="#" class="close-button" title="Close">X</a>
				<p>Selamat Datang Kasir <?php echo $_SESSION['username']; ?></p>
				<p>Semoga Lancar <img src="../images/smile.png" class="smile"></p>
<?php
$periksa=mysql_query("select * from buku where stok <=3");
while($q=mysql_fetch_array($periksa)){
	if ($q['stok']<=3) {
		?>
		<script>
			$(document).ready(function(){
				$('#pesan').css("color","red");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['judul']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
}
?>
			</div>
		</div>
				<li><center><img src="../images/avatar.png" class="shop" /></center>
				<ul class="submenu">
					<li><a href="profil.php?detail=&id=<?php echo $_SESSION['id_kasir'];?>"><?php echo $_SESSION['nama'];?></a></li>
					<li><a href="setting.php?edit=&id=<?php echo $_SESSION['id_kasir'];?>">Setting</a></li>
					<li><a href="../exit.php">Logout</a></li>
			</li></ul>
			</nav>
		</div>
</header>
<!--END OF HEADER-->