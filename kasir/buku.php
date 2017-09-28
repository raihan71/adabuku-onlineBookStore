<?php include"config.php";
include"header-input&tampil.php"; ?>
<p>
<?php
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from buku");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<link rel="stylesheet" type="text/css" href="../css/image-hover.css">
<a style="margin-bottom:10px" href="laporan-data.php" target="_blank"><input type="submit" class="clouds-flat-button" value="Cetak"></a>
<h2>Buku</h2>
<div class="jumlah-record">
<tbody>
	<table class="jumlah-record">
<tr>
	<td>Jumlah Record</td>
	<td><?php echo $jum; ?></td>
</tr>
</tr>
</table>
</tbody>
</div>
<?php
$q=mysql_query("SELECT * FROM buku");
?>
<table class="flat-table">
<tbody>
	<tr>
<?php

	$jml_colom=7;

	$i = 0;

	while($data=mysql_fetch_object($q))
	{
		if ($i >= $jml_colom) 
		{
			echo "</tr><tr>";
			$i = 0;
		}

		$i++;
?>
<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$bku=mysql_query("select * from buku where judul like '$cari' or penulis like '$cari'");
	}else{
		$bku=mysql_query("select * from buku limit $start, $per_hal");
	}?>
	<td>
		<div><figure class="blur">
			<img class="gambar-buku" valign="top" src="../images/buku/<?php echo $data->picture; ?>"></figure>
		</div>
		<div>
			<?php echo $data->judul; ?>
		</div>
		<div>
			Stok : <?php echo $data->stok; ?>
		</div>
		<div>
			<input class="peter-river-flat-button" type="submit" value="Detail" onclick="window.open('detail-buku.php?id_buku=<?php echo $data->id_buku; ?>', 'winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=300,height=400');" />
		</div>
	</td>
<?php
}
?>
	</tr>
</tbody>
</table>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<br />
<br />
&nbsp;
<br />
<br />
<br />
<?php include"footer.php"; ?>