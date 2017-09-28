<?php 
include 'header-buku.php';
?>
<style type="text/css">
	body {
		background-color: #66cc99;
	}
</style>
<h2>Edit Buku</h2>
<?php
$query = mysql_query("SELECT * FROM buku WHERE id_buku='$_GET[id_buku]'");
$data = mysql_fetch_array($query);
?>			

	<div class="body-edit-user2">
	<form action="update-buku.php" method="post">
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="id_buku" value="<?php echo $data['id_buku'] ?>"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" class="form-control" name="judul" value="<?php echo $data['judul'] ?>"></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td><input type="text" class="form-control" name="penerbit" value="<?php echo $data['penerbit'] ?>"></td>
			</tr>
			<tr>
				<td>Penulis</td>
				<td><input type="text" class="form-control" name="penulis" value="<?php echo $data['penulis'] ?>"></td>
			</tr>
			<tr>
				<td>ISBN</td>
				<td><input type="text" class="form-control" name="noisbn" value="<?php echo $data['noisbn'] ?>"></td>
			</tr>
			<tr>
				<td>Harga Pokok</td>
				<td><input type="text" class="form-control" name="harga_pokok" value="<?php echo $data['harga_pokok'] ?>"></td>
			</tr>
			<tr>
				<td>PPN</td>
				<td><input type="text" class="form-control" name="ppn" value="<?php echo $data['ppn'] ?>"></td>
			</tr>
			<tr>
				<td>Diskon</td>
				<td><input type="text" class="form-control" name="diskon" value="<?php echo $data['diskon'] ?>"></td>
			</tr>
			<tr>
				<td>Harga Jual</td>
				<td><input type="text" class="form-control" name="harga_jual" value="<?php echo $data['harga_jual'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="button-default" value="Simpan">
				<a href="tampil-buku.php"><input type="submit" class="button-reset" value="Kembali"></a></td>
			</tr>
		</table>
	</form>
	</div>
	<br />
	<br />
<?php include 'footer.php'; ?>