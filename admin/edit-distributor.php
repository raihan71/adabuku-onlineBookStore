<?php
include"config.php";
include"header-input&tampil.php";
?>
<style type="text/css">
	body {
		background-color: #66cc99;
	}
</style>
<section class="content">
	<div class="edit-user">
		<h2>Edit Distributor</h2>
<?php
$query = mysql_query("SELECT * FROM distributor WHERE id_distributor='$_GET[id_distributor]'");
$data = mysql_fetch_array($query);

?>
	<div class="body-edit-user">
<form class="form-style" action="save-dis.php" method="POST">
<div class="form-group">
<label class="edit-data">ID Distibutor</label>
	<input name="id_distributor" type="text" class="form-control" value="<?php echo $data['id_distributor'];?>" required readonly="readonly" />
</div>
<div class="form-group">
<label class="edit-data">Nama</label>
	<input name="nama_distributor" type="text" id="nama_distributor" class="form-control" value="<?php echo $data['nama_distributor'];?>" required />
</div>
<div class="form-group">
<label class="edit-data">Alamat</label>
	<input name="alamat" type="text" id="alamat" class="form-control" value="<?php echo $data['alamat'];?>" required />
</div>
<div class="form-group">
<label class="edit-data">Telepon</label>
	<input name="telepon" type="text" id="telepon" class="form-control" value="<?php echo $data['telepon'];?>" required />
</div>
<div class="form-group">
<label class="edit-data">
	<input type="submit" class="button-default" name="button" value="Simpan" />
</label>
<label>
	<a href="index.php"><button type="submit" class="button-cancel" name="button">Batal</button></a>
</label>
</div>
</form>
</section>
<?php include"footer.php"; ?>