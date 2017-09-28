<?php
include"config.php";
$id_pasok=$_GET['id_pasok'];
$date=$_GET['date'];
$id_distributor=$_GET['id_distributor'];
$id_buku=$_GET['id_buku'];
$jumlah=$_GET['jumlah'];

mysql_query("delete from pasok where id_pasok='$id_pasok'");
header("location:pasok.php");
?>