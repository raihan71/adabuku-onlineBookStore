<?php
include"config.php";
include"header-kar.php";
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
<?php
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from kasir");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div id="boxtime">
<embed src="../assets/clock/clock.swf" width="200" height="50" bgcolor="#fff" scale="noborder" quality="high" />
</div>
<h2>Data Pengguna</h2>
<div class="body-edit-user2">
<?php include"cari2.php"; ?>
<br />
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
<tr>
	<td><a href="#popup"><input type="submit" class="button-default" value="Tambah"></td>
	<div id="popup">
			<div class="window">
				<a href="#" class="close-button" title="Close">X</a>
				<form action="save-input-kar.php" method="post">
				<div class="form-group">
						<h1>Input Karyawan</h1>
						<input name="nama" title="Nama" type="text" class="form-control" id="nama" placeholder="Nama.." autocomplete="off">
					</div>
				<div class="form-group">
						<input name="alamat" title="Alamat" type="text" class="form-control" autocomplete="off" id="alamat" placeholder="Alamat..">
					</div>
					<div class="form-group">
						<input name="telpon" title="Telepon" type="text" class="form-control" autocomplete="off" id="telepon" placeholder="Nomor Kontak..">
					</div>
				<div class="form-group">
						<input name="username" title="Username" type="text" class="form-control" placeholder="Username.." autocomplete="off">
				</div>
				<div class="form-group">
						<input name="password" title="Password" type="password" class="form-control" placeholder="Password.." automcomplete="off">
				</div>
				<div class="form-group">
						<select name="akses" class="form-control">
							<option selected="selected">--Akses--</option>
							<option value="admin"> Admin </option>
							<option value="kasir"> Kasir </option>
							<option value="pemilik">Pemilik*</option>
						</select>
				</div>
				<div class="modal-footer">
					<a href="index.php"><button type="button" class="button-cancel" data-dismiss="modal">Batal</button></a>
					<input type="submit" class="button-default" value="Simpan">
					<input type="reset" value="Reset" class="button-reset">
				</div>
			</form>
			</div>
		</div>
</tr>
</table>
</tbody>
</div>
<table class="flat-table">
<tbody>
	<tr>
		<th>No</th>
		<th>Photo</th>
		<th>ID</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Telepon</th>
		<th>Username</th>
		<th>Akses</th>
		<th>Status</th>
		<th>Opsi</th>
	<?php
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$ksr=mysql_query("select * from kasir where nama like '$cari' or id_kasir like '$cari'");
	}else{
		$ksr=mysql_query("select * from kasir limit $start, $per_hal");
	}
	$no=1;
	while($k=mysql_fetch_array($ksr)){
		if ($k['status']=="1"){
			$online = "Online";
		$bg = "#66FF99";
	} else {
		$online = "---";
		$bg = "#FFFFFF";
	}

	?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php
            if ($k['photo'] != '') {
            ?>	<figure class="blur">
                <img src="<?php echo '../images/photo/' . $k['photo']; ?>"  alt="<?php echo $k['photo']; ?>" class="gambar-buku"></figure>
            <?php
            } else {
                echo "No Picture";
            }
            ?></td>
			<td><?php echo $k['id_kasir'] ?></td>
            <td><?php echo $k['nama'] ?></td>
            <td><?php echo $k['alamat'] ?></td>
            <td><?php echo $k['telpon'] ?></td>
            <td><?php echo $k['username'] ?></td>
            <td><?php echo $k['akses'] ?></td>
            	<?php 
			if($k['status'] == '0') { 
		echo ""; 
			} else {
				echo ""; 
		}
	
		?>
    <td nowrap style="font-weight:bold;" ><?php echo $online; ?></td>
    		<td><a onclick="if(confirm('Apakah anda yakin ingin menghapusnya ??')){ location.href='hapus.php?id_kasir=<?php echo $k['id_kasir']; ?>&nama=<?php echo $k['nama'] ?>&username=<?php echo $k['username']; ?>' }"><input value="Hapus" type="submit" class="peter-river-flat-button" /></a></td>
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