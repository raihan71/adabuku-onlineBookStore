<?php include"config.php"; ?>
	</div>
</section>
<!--END OF BANNER-->
<style type="text/css">
	body {
		background-color: #66cc99;
	}
	
</style>
			<center><h2>BERANDA</h2></center>
			<section class="pilih" id="input">
			<td><i class="input"></i></td>
			<a href="#popup2"><img class="input" src="../images/input.png" onmouseover="this.src='../images/in-buku-hover.png'" onmouseout="this.src='../images/input.png'" data-dismiss="modal" aria-hidden="true" /></a>
			</section></div>

			<div id="popup2">
			<div class="window2">
				<a href="#" class="close-button" title="Close">X</a>
				
			<script><!-- 

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.harga_pokok.value;
two = document.autoSumForm.ppn.value; 
three = document.autoSumForm.diskon.value; 
document.autoSumForm.harga_jual.value = (one * 1) * (two) + (one * 1) - (three);}
function stopCalc(){
clearInterval(interval);}
</script>
				<form action="save-input.php?act=tambah" method="post" name="autoSumForm" enctype="multipart/form-data">
					<div class="form-group">
						<h1>Input Buku</h1>
						<input name="judul" type="text" title="Judul Buku" class="form-control" placeholder="Judul Buku..">
					</div>
					<div class="form-group">
						<input name="penerbit" type="text" title="Penerbit Buku" class="form-control" placeholder="Penerbit Buku..">
					</div>
					<div class="form-group">
						<input name="penulis" title="Penulis Buku" type="text" class="form-control" placeholder="Penulis Buku..">
					</div>
					<div class="form-group">
						<input name="noisbn" type="text" title="ISBN" class="form-control" placeholder="No ISBN">
					</div>
					<div class="form-group">
						<input name="picture" type="file" class="form-control">					
					</div>
					<div class="form-group">
						<input name="date" type="text" placeholder="Tahun Terbit: YYYY" class="form-control">
					</div>
					<div class="form-group">
						<input name="harga_pokok" title="Harga Pokok" type="text" onFocus="startCalc();" onBlur="stopCalc();" class="form-control" id="harga_pokok" placeholder="Harga Pokok Buku" />
					</div>
					<div class="form-group">
						<select name="ppn" id="ppn" onFocus="startCalc();" onBlur="stopCalc();" class="form-control">
							<option selected="selected">--</option>
								<option value="0.1">10%</option>
								<option value="0.4">40%</option>
						</select>
					</div>
					<div>
						<input name="diskon" class="form-control" title="Diskon Buku" placeholder="Diskon%" type="text" id="diskon" onFocus="startCalc();" onBlur="stopCalc();" />
					</div>
					<div>
						<input type="text" class="form-control" title="Harga Jual" placeholder="Harga Jual Buku" name="harga_jual" id="harga_jual" onchange='tryNumberFormat(this.form.thirdBox);' value="" readonly />
					</div>
					<div class="form-group">
						<input name="stok" title="Stok" type="text" class="form-control" placeholder="Stok Buku..">
					</div>	
				<div class="modal-footer">
					<a href="index.php"><button type="button" class="button-cancel" data-dismiss="modal">Batal</button></a>
					<input type="submit" class="button-default" value="Simpan">
					<input type="reset" class="button-reset" value="Reset">
				</div>
			</form>
		</div>
		</div>

<section class="pilih" id="lihat">
	<td><i class="lihat"></i></td>
	<a href="tampil-buku.php"><img class="tampil" src="../images/read.png" onmouseover="this.src='../images/read-hover.png'" onmouseout="this.src='../images/read.png'" /></a>
</section>
</div>

<section class="pilih" id="pasok">
	<td><i class="pasok"></i></td>
	<a href="#popup"><img src="../images/distributor.png" onmouseover="this.src='../images/in-dis-hover.png'" onmouseout="this.src='../images/distributor.png'" class="psok" />
</section>
	<div id="popup">
			<div class="window">
				<a href="#" class="close-button" title="Close">X</a>
				<form action="save-input-dis.php" method="post">
				<div class="form-group">
						<h1>Input Distributor</h1>
						<input name="nama_distributor" title="Nama" type="text" class="form-control" id="nama_distributor" placeholder="Nama.." autocomplete="off">
					</div>
				<div class="form-group">
						<input name="alamat" type="text" title="Alamat" class="form-control" autocomplete="off" id="alamat" placeholder="Alamat..">
					</div>
					<div class="form-group">
						<input name="telepon" title="Nomor Kontak" type="text" class="form-control" autocomplete="off" id="telepon" placeholder="Nomor Kontak..">
					</div>
				<div class="modal-footer">
					<a href="index.php"><button type="button" class="button-cancel" data-dismiss="modal">Batal</button></a>
					<input type="submit" class="button-default" value="Simpan">
					<input type="reset" value="Reset" class="button-reset">
				</div>
			</form>
			</div>
		</div>
	</a>
	</section>
<!--END OF CONTENT-->