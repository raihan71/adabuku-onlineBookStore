<?php
include"config.php";
include"header-profil.php";
?>
<?php include"config.php"; ?>
<?php require_once('config.php'); ?>
<style type="text/css">
	body {
		background-color: #c75ff0;
	}
</style>
<div class="my-profil">
</div>

<div class="content">
	<div class="info-detail">
		<h3 class="info">Detail Profil</h3>
	<?php 
	$query = mysql_query("SELECT * FROM kasir WHERE id_kasir='$_GET[id]'");
	$data = mysql_fetch_array($query);
	?>
<div class="data-user">
<table class="flat-table">
	<tr>
		<th>ID</th>
		<td><?php echo $data['id_kasir']; ?></td>
		<td rowspan="9"><div class="id_kasir">
		<div class="col-xs-6 col-md-12">
					<a class="thumbnail">
						<img class="gambar-kasir" src="../images/photo/<?php echo $data['photo']; ?>">
					</a>
				</div>
				<?php 
			?>		
		</div></td>
	</tr>
	<tr>
		<th width="250">Username</th>
		<td width="500"><?php echo $data['username']; ?></td>
	</tr>
	<tr>
		<th>Nama</th>
		<td><?php echo $data['nama']; ?></td>
	</tr>
	<tr>
		<th>Alamat</th>
		<td><?php echo $data['alamat']; ?></td>
	</tr>
	<tr>
		<th>Telpon</th>
		<td><?php echo $data['telpon']; ?></td>
	</tr>
</table>
</div>
</div>
</div>
</div>

<?php//end 0f data;
	?>
<!--END OF CONTENT-->
<br />
&nbsp;<a href="index.php"><input type="submit" class="button-default" value="Kembali"></a>
<br />
<br />
<br />
&nbsp;
<?php include"footer.php"; ?> 