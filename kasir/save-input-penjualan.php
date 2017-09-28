<?php

include"config.php";
$date=$_POST['date'];
$judul=$_POST['judul'];
$harga_jual=$_POST['harga_jual'];
$jumlah=$_POST['jumlah'];
$id_kasir=$_POST['id_kasir'];
$id_buku=$_POST['id_buku'];


$dt=mysql_query("select * from buku where id_buku='$id_buku' and judul='$judul'");
$data=mysql_fetch_array($dt);
$sisa=$data['stok']-$jumlah;
mysql_query("update buku set stok='$sisa' where id_buku='$id_buku' and judul='$judul'");

$harga_pokok=$data['harga_pokok'];
$laba=$harga_jual-$harga_pokok;
$labaa=$laba*$jumlah;
$total=$harga_jual*$jumlah;
mysql_query("insert into penjualan values('','$date','$judul','$id_buku','$id_kasir','$jumlah','$harga_jual','$total','$labaa')")or die(mysql_error());
header("location:penjualan.php");

?>