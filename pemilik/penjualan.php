<?php
include"config.php";
include"header-penjualan.php";
?>
<style type="text/css">
	body {
		background-color: #c75ff0;
	}
	.input-seacrh {
		position: absolute;
		margin: 0;
		padding: 0;
		margin-bottom: 50px;
	}

	.body-edit-user2, h3 {
		margin: 0;
		padding: 0;
		margin-top: 30px;
		margin-left: 20px;
		text-align: left;
	}
</style>
<div id="boxtime">
<embed src="../assets/clock/clock.swf" width="200" height="50" bgcolor="#fff" scale="noborder" quality="high" />
</div>
<h2>Data Penjualan</h2>
<div class="body-edit-user2">
	<script type="text/javascript">
		$(document).ready(function(){
			$("#date").datepicker({dateFormat : 'yy/mm/dd'});

		});
	</script>
	<form action="" method="get">
<div id="tanggal-pilih">
	<select type="submit" name="date" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php 
			$pil=mysql_query("select distinct date from penjualan order by date desc");
			while($p=mysql_fetch_array($pil)){
				?>
				<option><?php echo $p['date'] ?></option>
				<?php
			}
			?>			
		</select>
	</div>

</form>
<br />
<?php 
if(isset($_GET['date'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['date']."</a></h4>";
}
?>
<tbody>
<table class="flat-table">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>ID Buku</th>
		<th>Judul Buku</th>
		<th>ID Kasir</th>
		<th>Jumlah</th>
		<th>Harga Jual</th>
		<th>Total</th>
		<th>Opsi</th>
	</tr>
	<?php
	if(isset($_GET['date'])){
		$date=mysql_real_escape_string($_GET['date']);
		$bku=mysql_query("select * from penjualan where date like '$date' order by date desc");
	}else{
		$bku=mysql_query("select * from penjualan order by date desc");
	}
	$no=1;
	while ($b=mysql_fetch_array($bku)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['date'] ?></td>
			<td><?php echo $b['id_buku'] ?></td>
			<td><?php echo $b['judul'] ?></td>
			<td><?php echo $b['id_kasir'] ?></td>
			<td><?php echo $b['jumlah'] ?></td>
			<td>Rp.<?php echo number_format($b['harga_jual']) ?>,-</td>
			<td>Rp.<?php echo number_format($b['total']) ?>,-</td>
			<td>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus-penjualan.php?id_penjualan=<?php echo $b['id_penjualan']; ?>&jumlah=<?php echo $b['jumlah'] ?>&judul=<?php echo $b['judul']; ?>' }" class=""><input value="Hapus" type="submit" class="peter-river-flat-button" /></a>		
			</td>
		</tr>

		<?php
	}
	?>
	<tr>
		<td colspan="8">Total Pemasukan</td>
		<?php
		if (isset($_GET['date'])) {
			$date=mysql_real_escape_string($_GET['date']);
			$x=mysql_query("select sum(total) as total_jual from penjualan where date='$date'");
			$xx=mysql_fetch_array($x);
			echo "<td><b> Rp.". number_format($xx['total_jual']).",-</b></td>";
		}else{

		}

		?>
	</tr>
	<tr>
		<td colspan="8">Total Laba</td>
		<?php
		if (isset($_GET['date'])){
			$date=mysql_real_escape_string($_GET['date']);
			$x=mysql_query("select sum(laba) as total_jual from penjualan where date='$date'");
			$xx=mysql_fetch_array($x);
			echo "<td><b> Rp.". number_format($xx['total_jual']).",-</b></td>";
		}else{

		}

		?>
	</tr>
	</div>
</table>
</tbody>
<br />
<br />
<br />
<br />
&nbsp;
<?php include"footer.php"; ?>