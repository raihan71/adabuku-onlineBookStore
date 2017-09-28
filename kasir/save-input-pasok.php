<?php

include"config.php";
$date=$_POST['date'];
$jumlah=$_POST['jumlah'];
$id_distributor=$_POST['id_distributor'];
$id_buku=$_POST['id_buku'];

$dt=mysql_query("select * from buku where id_buku='$id_buku'");
$data=mysql_fetch_array($dt);
$sisa=$data['stok']+$jumlah;
mysql_query("update buku set stok='$sisa' where id_buku='$id_buku'");

mysql_query("insert into pasok values('','$date','$id_distributor','$id_buku','$jumlah')")or die(mysql_error());
header("location:buku.php");

?>