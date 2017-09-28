<?php
include"config.php";
include"header-setting.php";
?>
<?php include"config.php"; ?>
<?php require_once('config.php'); ?>
<style type="text/css">
	body {
		background-color: #66cc99;
	}
</style>
<div class="alert alert-info">Setelah melakukan update diharap untuk merefresh dengan cara logout terlebih dahulu
	</div>
<section class="content">
	<div class="edit-user">
		<h2>Edit Admin</h2>
<?php
$query = mysql_query("SELECT * FROM kasir WHERE id_kasir='$_GET[id]'");
$data = mysql_fetch_array($query);
?>

	<div class="body-edit-user">
<form class="form-style" action="update-kasir.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
<div class="form-group">
	<label class="edit-data">ID Admin</label>
	<input name="id_kasir" type="text" id="id_kasir" class="form-control" value="<?php echo $data['id_kasir'];?>" readonly="readonly" autofocus="on" />
</div>

<div class="form-group">
<label class="edit-data">Username</label>
	<input name="username" type="text" id="username" class="form-control" value="<?php echo $data['username'];?>" required />
</div>

<div class="form-group">
<label class="edit-data">Password</label>
	<input name="password" type="text" id="password" class="form-control" value="<?php echo $data['password'];?>" required />
</div>

<div class="form-group">
<label class="edit-data">Nama</label>
	<input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama'];?>" required />
</div>

<div class="form-group">
<label class="edit-data">Alamat</label>
	<input name="alamat" type="text" id="alamat" class="form-control" value="<?php echo $data['alamat'];?>" required />
</div>

<div class="form-group">
<label class="edit-data">Telpon</label>
	<input name="telpon" type="text" id="telpon" class="form-control" value="<?php echo $data['telpon'];?>" required />
</div>

<div class="form-group">
<label class="edit-data">Gambar</label>
	 <input name="photo" type="file" class="form-control">
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
<br />
<br />
&nbsp;
<?php include"footer.php"; ?>