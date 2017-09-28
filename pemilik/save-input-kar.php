<?php
include"config.php";
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telpon=$_POST['telpon'];
$status=$_POST['status'];
$username=$_POST['username'];
$password=(base64_encode($_POST['password']));
$photo=$_POST['photo'];
$akses=$_POST['akses'];

mysql_query("insert into kasir values('','$nama','$alamat','$telpon','$status','$username','$password','$photo','$akses')")or die(mysql_error());
header("location:karyawan.php");

?>