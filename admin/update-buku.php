<?php
include"config.php";
$id_buku = $_POST['id_buku'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$penulis = $_POST['penulis'];
$noisbn = $_POST['noisbn'];
$harga_pokok = $_POST['harga_pokok'];
$ppn = $_POST['ppn'];
$diskon = $_POST['diskon'];
$harga_jual = $_POST['harga_jual'];

$u=mysql_query("select * from buku where id_buku='$id_buku'");


$us=mysql_fetch_array($u);

	mysql_query("update buku set judul='$judul', penerbit='$penerbit', penulis='$penulis', noisbn='$noisbn', harga_pokok='$harga_pokok', ppn='$ppn', diskon='$diskon', harga_jual='$harga_jual' where id_buku='$id_buku'");
	header("location:tampil-buku.php");
?>