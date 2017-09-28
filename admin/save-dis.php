<?php
include"config.php";
$id_distributor = $_POST['id_distributor'];
$nama_distributor = $_POST['nama_distributor'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

$u=mysql_query("select * from distributor where id_distributor='$id_distributor'");


$us=mysql_fetch_array($u);

	mysql_query("update distributor set nama_distributor='$nama_distributor', alamat='$alamat', telepon='$telepon' where id_distributor='$id_distributor'");
	header("location:distributor.php");
?>