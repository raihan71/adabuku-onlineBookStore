<?php include"config.php";
include"header-penjualan.php";?>

<h2>Data Penjualan</h2>
 <section class="" id="">
	<td><i class="input"></i></td>
	<a href="#popup3"><input type="submit" class="button-default" value="Tambah" /></a>
</section></div>

<div id="popup3">
			<div class="window3">
				<a href="#" class="close-button" title="Close">X</a>
				<form action="save-input-penjualan.php" method="post">
					<div class="form-group">
						<h1>Input Penjualan</h1><script>
    $(document).ready(function(){
        $('#tanggal').Zebra_DatePicker({
            format: 'yy-m-d',
            months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            days : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu'],
            days_abbr : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu']
        });
    });
</script>
		<input type="text" name="date" id="tanggal" placeholder="Tanggal:YYYY/MM/DD/" class="form-control2">
					</div>
					<?php $result = mysql_query("select * from buku");
							$jsArray = "var JudulBuku = new Array();\n";
							?>
					<div class="form-group">
						<select name="id_buku" class="form-control" onchange="changeValue(this.value)">
							<option selected="selected">----ID----</option>
						<?php
							while ($row = mysql_fetch_array($result)) {
							echo '<option value="' . $row['id_buku'] . '">' . $row['id_buku'] . '</option>';
							$jsArray .= "JudulBuku['" . $row['id_buku'] . "'] = {satu:'" . addslashes($row['judul']) . "' , dua:'" . addslashes($row['harga_jual'])."'};\n";
							}
						?>
						</select>	
					</div>
					<div class="form-group">
						<input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Buku" readonly="readonly" autofocus="on" />
					</div>
					<?php 
	$query = mysql_query("SELECT * FROM kasir");
	$data = mysql_fetch_array($query);
	?>
					<div class="form-group">
						<input type"text" class="form-control" name="id_kasir" value="<?php echo $data['id_kasir']; ?>" readonly="readonly" autofocus="on" /></td>
					</div>
					<div class="form-group">
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah Buku terjual" />
					</div>
					<div class="form-group">
						<input name="harga_jual" type="text" id="harga_jual" class="form-control" placeholder="Harga Jual Buku" readonly="readonly" autofocus="on" />
					</div>
				<div class="modal-footer">
					<a href="index.php"><button type="button" class="button-cancel" data-dismiss="modal">Batal</button></a>
					<input type="submit" class="button-default" value="Simpan">
					<input type="reset" value="Reset" class="button-reset">
				</div>
			</form>
			<script type="text/javascript">
	<?php echo $jsArray; ?>
	function changeValue(id_buku){
	document.getElementById('judul').value = JudulBuku[id_buku].satu;
	document.getElementById('harga_jual').value = JudulBuku[id_buku].dua;
	};
</script>
		</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#date").datepicker({dateFormat : 'yy/mm/dd'});

		});
	</script>
<br />
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
if (isset($_GET['date'])){
	$date=mysql_real_escape_string($_GET['date']);
	$dt="laporan-data-penjualan.php?date='$date'";
	?><a style="margin-bottom:10px" href="<?php echo $dt ?>" target="_blank"><input type="submit" class="clouds-flat-button" value="Cetak"></a><?php
}else{
	$dt="laporan-data-penjualan.php";
}
?>
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
</table>
</tbody>
<br />
<br />
&nbsp;
<?php include"footer.php"; ?>