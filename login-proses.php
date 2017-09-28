<?php 
session_start();
include 'kasir/config.php';
$username=$_POST['username'];
$password=(base64_encode($_POST['password']));

$query=mysql_query("select * from kasir where username='$username' and password='$password'") or die(mysql_error());
$row=mysql_fetch_array($query);

if(mysql_num_rows($query)==1){
	$_SESSION['id_kasir'] = $row['id_kasir'];
	$_SESSION['nama'] = $row['nama'];
	$_SESSION['username'] = $username;
	$_SESSION['alamat'] = $row['alamat'];
	$_SESSION['telpon'] = $row['telpon'];
	$_SESSION['photo'] = $row['photo'];
	$_SESSION['akses'] = $row['akses'];
	$_SESSION['status'] = $row['status'];
if($row['akses']=="pemilik"){
	header("location:pemilik/");
}if ($row['akses']=="admin"){
	header("location:admin/");
}else if ($row['akses']=="kasir"){
	header("location:kasir/");
}

}else{
	header("location:index.php?pesan=gagal")or die(mysql_error());
	// mysql_error();
}
// echo $pas;
 ?>