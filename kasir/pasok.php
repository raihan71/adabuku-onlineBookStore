<?php
include"config.php";
include"header-pasok.php";
?>
<style type="text/css">
	#tgl {
		bottom: 70%;
	}
	.body-edit-user2 {
		margin-top: 20px;
	}
</style>
<h2>Data Pasok Buku</h2>
<script type="text/javascript">
		$(document).ready(function(){
			$("#date").datepicker({dateFormat : 'yy/mm/dd'});

		});
	</script>
<div class="body-edit-user2">
	<form action="" method="get">
	<div id="tgl">
	<select type="submit" name="date" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php 
			$pil=mysql_query("select distinct date from pasok order by date desc");
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
if (isset($_GET['date'])){
	$date=mysql_real_escape_string($_GET['date']);
	$dt="laporan-data-pasok.php?date='$date'";
	?><a style="margin-bottom:10px" href="<?php echo $dt ?>" target="_blank"><input type="submit" class="clouds-flat-button" value="Cetak"></a><?php
}else{
	$dt="laporan-data-pasok.php";
}
?>
<br />
<?php 
if(isset($_GET['date'])){
	echo "<h4> Data Pasok Buku Tanggal  <a style='color:blue'> ". $_GET['date']."</a></h4>";
}
?>
<tbody>
<table class="flat-table">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>ID Distributor</th>
		<th>ID Buku</th>
		<th>Jumlah</th>
		<th>Opsi</th>
	</tr>
	<?php
	if(isset($_GET['date'])){
		$date=mysql_real_escape_string($_GET['date']);
		$psk=mysql_query("select * from pasok where date like '$date' order by date desc");
	}else{
		$psk=mysql_query("select * from pasok order by date desc");
	}
	$no=1;
	while ($b=mysql_fetch_array($psk)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['date'] ?></td>
			<td><?php echo $b['id_distributor'] ?></td>
			<td><?php echo $b['id_buku'] ?></td>
			<td><?php echo $b['jumlah'] ?></td>
			<td>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus-pasok.php?id_pasok=<?php echo $b['id_pasok']; ?>&jumlah=<?php echo $b['jumlah'] ?>&id_buku=<?php echo $b['id_buku']; ?>' }" class=""><input value="Hapus" type="submit" class="peter-river-flat-button" /></a>		
			</td>
		</tr>

		<?php
	}
	?>
	</table>
	</tbody>
	</div>
	<br />
	<br />
	<br />
	<br />
	&nbsp;

<?php include"footer.php"; ?>