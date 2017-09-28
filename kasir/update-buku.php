<?php
include"config.php";
$id_buku=$_POST['id_buku'];
$judul=$_POST['judul'];
$penulis=$_POST['penulis'];
$penerbit=$_POST['penerbit'];
$nama_distributor=$_POST['nama_distributor'];
$noisbn=$_POST['noisbn'];
$harga_pokok=$_POST['harga_pokok'];
$ppn=$_POST['ppn'];
$diskon=$_POST['diskon'];
$harga_jual=$_POST['harga_jual'];
$stok=$_POST['stok'];

mysql_query("update buku set judul='$judul', penulis='$penulis', penerbit='$penerbit', nama_distributor='$nama_distributor', noisbn='$noisbn', harga_pokok='$harga_pokok', ppn='$ppn', diskon='$diskon', harga_jual='$harga_jual', stok='$stok' where id_buku='$id_buku'") or die(mysql_error());
header("location:tampil-buku.php");

?>