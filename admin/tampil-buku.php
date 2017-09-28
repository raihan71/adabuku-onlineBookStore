<?php include"config.php";
include"header-buku.php";
?>

<?php
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from buku");
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
<a style="margin-bottom:10px" href="laporan-data.php" target="_blank"><input type="submit" class="clouds-flat-button" value="Cetak"></a>
</div>
<?php include"cari.php"; ?>
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
		<th>Gambar</th>
		<th>Judul Buku</th>
		<th>Penerbit</th>
		<th>Penulis</th>
		<th>ISBN</th>
		<th>Harga Jual</th>
		<th>Stok</th>
		<th>Option</th>
	<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$bku=mysql_query("select * from buku where judul like '$cari' or penulis like '$cari' or penerbit like '$cari'");
	}else{
		$bku=mysql_query("select * from buku limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($bku)){

	?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php
            if ($b['picture'] != '') {
            ?>	<figure class="blur">
                <img src="<?php echo '../images/buku/' . $b['picture']; ?>"  alt="<?php echo $b['picture']; ?>" class="gambar-buku">
            <?php
            } else {
                echo "No";
            }
            ?></td></figure>
            <td><?php echo $b['judul'] ?></td>
            <td><?php echo $b['penerbit'] ?></td>
            <td><?php echo $b['penulis'] ?></td>
            <td><?php echo $b['noisbn'] ?></td>
            <td>Rp.<?php echo number_format($b['harga_jual']) ?></td>
            <td><?php echo $b['stok'] ?></td>
			<td>
				<input class="button-default-crud" type="submit" value="Detail" onclick="window.open('detail-buku.php?id_buku=<?php echo $b['id_buku']; ?>', 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=300,height=400');" />
				<a href="edit-buku.php?id_buku=<?php echo $b['id_buku']; ?>"><input type="submit" class="button-default-crud"  value="Edit" /></a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id_buku=<?php echo $b['id_buku']; ?>' }"><input value="Hapus" type="submit" class="button-default-crud" /></a>
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