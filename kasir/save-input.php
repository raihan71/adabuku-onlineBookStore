<?php
include"config.php";
$act = $_GET['act'];

if ($act == "tambah") {
	$tmp_file = $_FILES['picture']['tmp_name'];
	$size = $_FILES['picture']['size'];
	$file = $_FILES['picture']['name'];

	if (!empty($tmp_file)) {
		# code...

		if ($size < 300000) {
			if (move_uploaded_file($tmp_file, '../images/buku/' . $_FILES['picture']['name'])) {
				

				$q = mysql_query("insert into buku(judul,penerbit,penulis,noisbn,picture,date,harga_pokok,harga_jual,ppn,diskon,stok)
					values ('$_POST[judul]','$_POST[penerbit]','$_POST[penulis]','$_POST[noisbn]','$file','$_POST[date]','$_POST[harga_pokok]','$_POST[harga_jual]','$_POST[ppn]','$_POST[diskon]','$_POST[stok]')") or die(mysql_error());
				if ($q) {
                    header('location:index.php');
                } else {
                    echo 'gagal';
                }
			}
		} else {
            echo'Besar gambar max 800 Kb';
            header('location:index.php');
        }
    } else if (empty($tmp_file)) {
        $no_gbr = mysql_query("insert into buku(judul)
            values ('$_POST[judul]')") or die(mysql_error());
        if ($no_gbr) {
            header('location:index.php');
        }
    } else {
        echo"gagal upload";
	}
}