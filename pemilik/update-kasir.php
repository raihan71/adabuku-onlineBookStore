<?php
include"config.php";
$id_kasir = $_POST['id_kasir'];
$username = $_POST['username'];
$password = (base64_encode($_POST['password']));
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$photo = $_FILES['photo']['name'];

$query = mysql_query("UPDATE kasir SET username='$username', password='$password', nama='$nama', alamat='$alamat', telpon='$telpon' WHERE id_kasir='$id_kasir'") or die(mysql_error());
if ($query){
	header('location:index.php');
}

$u=mysql_query("select * from kasir where id_kasir='$id_kasir'");


$us=mysql_fetch_array($u);
if(file_exists("../images/photo/".$us['photo'])){
	unlink("../images/photo/".$us['photo']);
	move_uploaded_file($_FILES['photo']['tmp_name'], "../images/photo/".$_FILES['photo']['name']);
	mysql_query("update kasir set username='$username', password='$password', alamat='$alamat', telpon='$telpon', photo='$photo' where id_kasir='$id_kasir'");
	header("location:index.php");
}else{
	move_uploaded_file($_FILES['photo']['tmp_name'], "../images/photo/".$_FILES['photo']['name']);
	mysql_query("update kasir set photo='$photo' where id_kasir='$id_kasir'");
	header("location:index.php");
	}
?>