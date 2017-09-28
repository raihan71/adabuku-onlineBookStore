<?php
include"config.php";
$act = $_GET['act'];

if ($act == "tambah") {
	$tmp_file = $_FILES['picture']['tmp_name'];
	$size = $_FILES['picture']['size'];
	$file = $_FILES['picture']['name'];

	if (!empty($tmp_file)) {
		# code...

		if ($size < 800000) {
			if (move_uploaded_file($tmp_file, '../images/buku/' . $_FILES['picture']['name'])) {
				

				$q = mysql_query("insert into buku(judul,penerbit,penulis,noisbn,picture,date,harga_pokok,ppn,diskon,harga_jual,stok)
					values ('$_POST[judul]','$_POST[penerbit]','$_POST[penulis]','$_POST[noisbn]','$file','$_POST[date]','$_POST[harga_pokok]','$_POST[ppn]','$_POST[diskon]','$_POST[harga_jual]','$_POST[stok]')") or die(mysql_error());
				if ($q) {
                    header('location:tampil-buku.php');
                } else {
                    echo 'gagal';
                }
			}
		} else {
            echo'Besar gambar max 100 Kb';
            header('location:index.php');
        }
    } else if (empty($tmp_file)) {
        $no_gbr = mysql_query("insert into buku(judul)
            values ('$_POST[judul]')") or die(mysql_error());
        if ($no_gbr) {
            header('location:tampil-buku.php');
        }
    } else {
        echo"gagal upload";
	}
}