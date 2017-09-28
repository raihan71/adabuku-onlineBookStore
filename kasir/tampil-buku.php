<?php include"config.php";
include"header-input&tampil.php";
?>
<div id="tampil">
	<div class="table-tampil">
<?php
$periksa=mysql_query("select * from buku where stok <=3");
while($q=mysql_fetch_array($periksa)){
	if ($q['stok']<=3) {
		?>
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['judul']."</a> yang tersisa sudah kurang dari 3 . silahkan pesan lagi !!</div>";	
	}
}
?>
<?php
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from buku");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<a style="margin-bottom:10px" href="laporan-data.php" target="_blank"><input type="submit" class="clouds-flat-button" value="Cetak"></a>
</div>
<form action="cari-action.php" method="get">
		<div class="input-seacrh search-group">
		<input type="text" class="form-control" placeholder="Search.." aria-describedby="basic-addon1" name="cari">
		<input type="button" class="button-default" value="Cari">
</div>
</form>
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
		$bku=mysql_query("select * from buku where judul like '$cari' or penulis like '$cari'");
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
            ?>
                <img src="<?php echo '../images/buku/' . $b['picture']; ?>"  alt="<?php echo $b['picture']; ?>" class="gambar-buku">
            <?php
            } else {
                echo "No";
            }
            ?></td>
            <td><?php echo $b['judul'] ?></td>
            <td><?php echo $b['penerbit'] ?></td>
            <td><?php echo $b['penulis'] ?></td>
            <td><?php echo $b['noisbn'] ?></td>
            <td>Rp.<?php echo number_format($b['harga_jual']) ?></td>
            <td><?php echo $b['stok'] ?></td>
			<td>	<a href="detail-buku.php?id_buku=<?php echo $b['id_buku']; ?>"><input type="submit" value="Detail" class="peter-river-flat-button" /></a>
					<a href="edit-buku.php?id_buku=<?php echo $b['id_buku']; ?>"><input type="submit" class="peter-river-flat-button"  value="Edit" /></a>
					<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?id=<?php echo $b['id_buku']; ?>' }" class=""><input value="Hapus" type="submit" class="peter-river-flat-button" /></a>
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
<?php include"footer.php"; ?>