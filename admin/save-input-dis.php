<?php
include"config.php";
$nama_distributor=$_POST['nama_distributor'];
$alamat=$_POST['alamat'];
$telepon=$_POST['telepon'];

mysql_query("insert into distributor values('','$nama_distributor','$alamat','$telepon')")or die(mysql_error());
header("location:distributor.php");

?>