<?php
include"config.php";
?>
<style type="text/css">
	body {
		background-color: #f39b13;
		color: #F5F5F5;
	}
</style>
<link rel="stylesheet" type="text/css" href="../style/input-pop.css">
<link rel="stylesheet" type="text/css" href="../style/table.css">
<link rel="stylesheet" type="text/css" href="../style/button.css">
<center><h3>Detail Buku</h3></center>
<?php
$id_bku=mysql_real_escape_string($_GET['id_buku']);

$det=mysql_query("select * from buku where id_buku='$id_bku'")or die(mysql_error());
while ($d=mysql_fetch_array($det)) {
	?>
	<center><table class="flat-table"></center>
		<tr>
			<th>ID Buku</th>
			<td><?php echo $d['id_buku'] ?></td>
		</tr>
		<tr>	
			<th>Judul</th>
			<td><?php echo $d['judul'] ?></td>
		</tr>
		<tr>
			<th>Gambar</th>
			<td><?php
            if ($d['picture'] != '') {
            ?>
                <img src="<?php echo '../images/buku/' . $d['picture']; ?>"  alt="<?php echo $d['picture']; ?>" class="gambar-buku">
            <?php
            } else {
                echo "No";
            }
            ?></td>
		</tr>
		<tr>
			<th>Penulis</th>
			<td><?php echo $d['penulis'] ?></td>
		</tr>
		<tr>
			<th>Penerbit</th>
			<td><?php echo $d['penerbit'] ?></td>
		</tr>
		<tr>
			<th>ISBN</th>
			<td><?php echo $d['noisbn'] ?></td>
		</tr>
		<tr>
			<th>Tahun</th>
			<td><?php echo $d['date'] ?></td>
		</tr>
		<tr>
			<th>Harga Pokok</th>
			<td>Rp.<?php echo number_format($d['harga_pokok']) ?>,-</td>
		</tr>
		<tr>
			<th>PPN</th>
			<td><?php echo $d['ppn'] ?></td>
		</tr>
		<tr>
			<th>Diskon</th>
			<td><?php echo $d['diskon'] ?></td>
		</tr>
		<tr>
			<th>Harga Jual</th>
			<td>Rp.<?php echo number_format($d['harga_jual']) ?>,-</td>
		</tr>
		<tr>
			<th>Stok</th>
			<td><?php echo $d['stok'] ?></td>
		</tr>
	</table>
<br />
<br />
	<?php
}
?>
<?php include"footer.php"; ?>