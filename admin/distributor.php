<?php
include"config.php";
include"header-input&tampil.php";
?>
<?php
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from distributor");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<style type="text/css">
	body {
		background-color: #66cc99;
	}
</style>
<a style="margin-bottom:10px" href="laporan-dis.php" target="_blank"><input type="submit" class="clouds-flat-button" value="Cetak"></a>
</div>
<?php include"cari2.php"; ?>
<br />
<div class="jumlah-record">
<tbody>
	<table class="jumlah-record">
<tr>
	<td>Jumlah Record</td>
	<td><?php echo $jum; ?></td>
</tr>
<tr>
	<td>Jumlah Halaman</td>
	<td><?php echo $halaman; ?></td>
</tr>
</table>
</tbody>
</div>
<table class="flat-table">
<tbody>
	<tr>
		<th>No</th>
		<th>ID</th>
		<th>Nama Distributor</th>
		<th>Alamat</th>
		<th>Telepon</th>
		<th>Option</th>
	<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$dsb=mysql_query("select * from distributor where nama_distributor like '$cari' or id_distributor like '$cari'");
	}else{
		$dsb=mysql_query("select * from distributor limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($dsb)){

	?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['id_distributor'] ?></td>
            <td><?php echo $b['nama_distributor'] ?></td>
            <td><?php echo $b['alamat'] ?></td>
            <td><?php echo $b['telepon'] ?></td>
			<td><a href="edit-distributor.php?id_distributor=<?php echo $b['id_distributor']; ?>"><input type="submit" class="button-default-crud"  value="Edit" /></a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus-distributor.php?id_distributor=<?php echo $b['id_distributor']; ?>' }" class=""><input value="Hapus" type="submit" class="button-default-crud" /></a>
			</td>
		</tr>
		<?php
	}
	?>
		</tr>
		</tbody>
	</table>
	 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<ul class="paginate wrapper">
		<?php
		for ($i=1;$i<=$halaman;$i++) { 
			?>
			<li><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
			<?php
		}
		?>
	</ul>
<br />
<br />
<br />
<br />
&nbsp;
<?php include"footer.php"; ?>