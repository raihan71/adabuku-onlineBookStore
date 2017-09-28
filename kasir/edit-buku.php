<?php
include"config.php";
include"header-input&tampil.php";
?>
<link rel="stylesheet" type="text/css" href="../style/input-edit.css">
<h3>Edit Data</h3>
<a class="" href="tampil-buku.php">Kembali</a>
<?php
$id_buku=mysql_real_escape_string($_GET['id_buku']);
$det=mysql_query("select * from buku where id_buku='$id_buku'") or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>
	<form action="update-buku.php" method="post">
		<table class="flat-table">
			<tbody>
				<tr>
					<td>ID Buku</td>
					<td><input type="text" class="input" name="id_buku" disabled readonly="readonly" value="<?php echo $d['id_buku'] ?>"></td>
				</tr>
				<tr>
					<td>Judul Buku</td>
					<td><input type="text" class="input" name="judul" value="<?php echo $d['judul'] ?>"></td>
				</tr>
				<tr>
					<td>Penulis</td>
					<td><input class="input" type="text" name="penulis" value="<?php echo $d['penulis'] ?>"></td>
				</tr>
				<tr>
					<td>Penerbit</td>
					<td><input  class="input" type="text" name="penerbit" value="<?php echo $d['penerbit'] ?>"></td>
				</tr>
				<tr>
					<td>Distributor</td>
					<td><input type="text" class="input" name="nama_distributor" value="<?php echo $d['nama_distributor'] ?>" ></td>
				</tr>
				<tr>
					<td>ISBN</td>
					<td><input class="input" type="text" name="noisbn" value="<?php echo $d['noisbn'] ?>"></td>
				</tr>
				<tr>
					<td>Harga Pokok</td>
					<td><input class="input" type="text" name="harga_pokok" value="<?php echo $d['harga_pokok'] ?>"></td>
				</tr>
				<tr>
					<td>PPN</td>
					<td><input class="input" type="text" name="ppn" value="<?php echo $d['ppn'] ?>"></td>
				</tr>
				<tr>
					<td>Diskon</td>
					<td><input class="input" type="text" name="diskon" value="<?php echo $d['diskon'] ?>"></td>
				</tr>
				<tr>
					<td>Harga Jual</td>
					<td><input class="input" type="text" name="harga_jual" value="<?php echo $d['harga_jual'] ?>"></td>
				</tr>
				<tr>
					<td>Stok</td>
					<td><input class="input" type="text" name="stok" value="<?php echo $d['stok'] ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="button" value="Simpan"></td>
				</tr>
			</tbody>
		</table>
		</form>
		<?php
}
?>
<?php include"footer.php"; ?>