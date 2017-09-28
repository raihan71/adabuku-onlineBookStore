<?php
include"config.php";
$id_distributor=$_GET['id_distributor'];
$nama_distributor=$_GET['nama_distributor'];
$alamat=$_GET['alamat'];
$telepon=$_GET['telepon'];

mysql_query("delete from distributor where id_distributor='$id_distributor'");
header("location:distributor.php");
?>