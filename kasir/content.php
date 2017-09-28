<?php include"config.php"; ?>
	</div>
</section>
<!--END OF BANNER-->

	<div class="row">
<div id="isi"><h2>BERANDA</h2></div>
<section class="pilih" id="input">
	<td><i class="input"></i></td>
	<a href="#popup3"><img class="input" src="../images/penjualan.png" onmouseover="this.src='../images/in-pen-hover.png'" onmouseout="this.src='../images/penjualan.png'" data-dismiss="modal" aria-hidden="true" /></a>
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
						<select name="id_buku" onchange="changeValue(this.value)" class="form-control">
							<option selected="selected" title="ID Buku">----ID----</option>
						<?php
							while ($row = mysql_fetch_array($result)) {
							echo '<option value="' . $row['id_buku'] . '">' . $row['id_buku'] . '</option>';
							$jsArray .= "JudulBuku['" . $row['id_buku'] . "'] = {satu:'" . addslashes($row['judul']) . "' , dua:'" . addslashes($row['harga_jual'])."'};\n";
							}
						?>
						</select>	
					</div>
					<div class="form-group">
						<input type="text" title="Judul Buku" name="judul" class="form-control" id="judul" placeholder="Judul Buku" readonly="readonly" autofocus="on" />
					</div>
					<?php 
	$query = mysql_query("SELECT * FROM kasir");
	$data = mysql_fetch_array($query);
	?>
					<div class="form-group">
						<input type"text" title="ID Kasir Anda" id="id_kasir" name="id_kasir" class="form-control" value="<?php echo $data['id_kasir']; ?>" readonly="readonly" autofocus="on" /></td>
					</div>
					<div class="form-group">
						<input name="jumlah" title="Jumlah Terjual" id="jumlah" type="text" class="form-control" placeholder="Jumlah Buku terjual" />
					</div>
					<div class="form-group">
						<input name="harga_jual" title="Harga" id="harga_jual" type="text" id="harga_jual" class="form-control" placeholder="Harga Jual Buku" readonly="readonly" autofocus="on" />
					</div>
				<div class="modal-footer">
					<a href="index.php"><button type="button" class="button-cancel" data-dismiss="modal">Batal</button></a>
					<input type="submit" class="button-default" value="Simpan">
					<input type="reset" value="Reset" class="button-reset">
				</div>
			</form>
		</div>
		</div>
	<script type="text/javascript">
	<?php echo $jsArray; ?>
	function changeValue(id_buku){
	document.getElementById('judul').value = JudulBuku[id_buku].satu;
	document.getElementById('harga_jual').value = JudulBuku[id_buku].dua;
	};
</script>

<section class="pilih" id="lihat">
	<td><i class="lihat"></i></td>
	<a href="buku.php"><img class="tampil" src="../images/read.png" onmouseover="this.src='../images/read-hover.png'" onmouseout="this.src='../images/read.png'" /></a>
</section>
</div>

<section class="pilih" id="pasok">
	<td><i class="pasok"></i></td>
	<a href="#popup1"><img src="../images/pasok.png" onmouseover="this.src='../images/in-pasok-hover.png'" onmouseout="this.src='../images/pasok.png'" class="psok" />
</section>
	<div id="popup1">
			<div class="window1">
				<a href="#" class="close-button" title="Close">X</a>
				<form action="save-input-pasok.php" method="post">
					<div class="form-group">
						<h1>Input Pasok</h1>
						<script>

    $(document).ready(function(){
        $('#date').Zebra_DatePicker({
            format: 'yy-m-d',
            months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            days : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu'],
            days_abbr : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu']
        });
    });
</script>

		<input type="text" name="date" id="date" placeholder="Tanggal:YYYY/MM/DD/" class="form-control2">
					</div>

				<div class="form-group">
						<select class="form-control" name="id_distributor"  onchange="changeValue(this.value)">
								<option selected="selected">--ID Distributor--</option>
								<?php 
								$dsb=mysql_query("select * from distributor");
								while($d=mysql_fetch_array($dsb)){
									?>	
									<option value="<?php echo $d['id_distributor']; ?>"><?php echo $d['id_distributor'] ?></option>
									<?php 
								}
								?>
							</select>
					</div>
					<div class="form-group">
						<select name="id_buku" class="form-control" id="id_buku" onchange="changeValue(this.value)">
							<option selected="selected">--ID Buku--</option>
						<?php
						$bku=mysql_query("select * from buku");
						while($b=mysql_fetch_array($bku)){
							?>
							<option value="<?php echo $b['id_buku']; ?>"><?php echo $b['id_buku'] ?></option>
							<?php
						}
					?>
						</select>
					</div>
					<div class="form-group">
						<input name="jumlah" type="text" id="jumlah" class="form-control" placeholder="Jumlah Stok Buku Masuk" />
					</div>
				<div class="modal-footer">
					<a href="index.php"><button type="button" class="button-cancel" data-dismiss="modal">Batal</button></a>
					<input type="submit" class="button-default" value="Simpan">
					<input type="reset" value="Reset" class="button-reset">
				</div>
			</form>
			</div>
		</div>
<!--END OF CONTENT-->