<?php
include"config.php";

$id_kasir=$_GET['id_kasir'];
$username=$_GET['username'];
$password=$_GET['password'];
$alamat=$_GET['alamat'];
$telpon=$_GET['telpon'];
$status=$_GET['status'];
$photo=$_GET['photo'];
$nama=$_GET['nama'];
$akses=$_GET['akses'];

mysql_query("delete from kasir where id_kasir='$id_kasir'")or die(mysql_error());
header("location:karyawan.php");

?>