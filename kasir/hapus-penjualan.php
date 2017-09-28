<?php
include"config.php";
$id_penjualan=$_GET['id_penjualan'];
$jumlah=$_GET['id_penjualan'];
$judul=$_GET['judul'];
$id_buku=$_GET['id_buku'];
$id_kasir=$_GET['id_kasir'];

mysql_query("delete from penjualan where id_penjualan='$id_penjualan'");
header("location:penjualan.php");

?>