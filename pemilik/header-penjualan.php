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
<title>Pemilik: AdaBuku</title>
		<link rel="stylesheet" type="text/css" href="../style/input-pop.css">
		<link rel="stylesheet" type="text/css" href="../style/table.css">
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
				<li><a href="index.php">Beranda</a></li>
				<li><img src="../images/record.png" class="shop">
				<ul class="submenu">
					<li><a href="tampil-buku.php">Buku</a></li>
					<li><a href="distributor.php">Distributor</a></li>
					<li><a href="pasok.php">Pasok</a></li>
					<li><a href="penjualan.php" class="current">Penjualan</a></li>
					<li><a href="karyawan.php">Pengguna</a></li>
				</li></ul>
				<li><a href="#popup4" id="pesan">Pesan</a></li>
				<div id="popup4">
			<div class="window4">
				<a href="#" class="close-button" title="Close">X</a>
				<p>Selamat Datang Bos <?php echo $_SESSION['nama']; ?></p>
				<p>Semoga Laris <img src="../images/smile.png" class="smile"></p>
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