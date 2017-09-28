<?php
include"config.php";
$id_buku=$_GET['id_buku'];
$judul=$_GET['judul'];
$penerbit=$_GET['penerbit'];
$penulis=$_GET['penulis'];
$noisbn=$_GET['noisbn'];
$harga_jual=$_GET['harga_jual'];
$picture=$_GET['picture'];
$stok=$_GET['stok'];

mysql_query("delete from buku where id_buku='$id_buku'");
header("location:tampil-buku.php");
?>