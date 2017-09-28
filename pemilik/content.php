<?php include"config.php"; ?>
	</div>
</section>
<!--END OF BANNER-->
	<section class="banner">
	<div class="banner-inner">
	<div id="slideshow">
	<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
<?PHP $result = mysql_query("SELECT * FROM buku order by buku.id_buku ASC")or die(mysqli_error());
while($row = mysql_fetch_assoc($result)) {
$images_slider = strip_tags($row['picture']);
$description_slider = strip_tags($row['judul']);

echo'<img src="../images/buku/'.$images_slider.'" data-thumb="../images/buku/'.$images_slider.'" alt="" title="'.$description_slider.'"/>';
}
?>
</div>
</div>
</div>


<script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="../js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
$(window).load(function() {
$('#slider').nivoSlider();
});
</script>
	</div>
</section>
<!--END OF BANNER-->
	<div class="penerbit"><center><h2>Partner Penerbit</h2></center></div>

	<section class="partner" id="bca">
		<td><i class="visa"></td></i>
		<img class="mc" src="../images/komik.png" />
	</section>

	<section class="partner" id="bitcoin">
		<td><i class="bitcoin"></i></td>
		<img class="bitcoin" src="../images/dolphin.png" />
	</section>

	<section class="partner" id="truemoney">
		<td><i class="bca"></i></td>
		<img src="../images/mizan.png" class="mc" />
	</section>

	<section class="partner" id="mega">
		<td><i class="mega"></i></td>
		<img src="../images/noura.png" class="wo" />
	</section>

	<section class="partner" id="visa">
		<td><i class="tm"></i></td>
		<img src="../images/lontar.png" class="cc" />
	</section>
	</td>
	</section>
	</div>
	<br />
	<br />
	<br />
	<br />
	<br /><br />
	<div class="pembayaran"><center><h2>Partner Pembayaran</h2></center></div>

	<section class="partner" id="visa">
		<td><i class="visa"></td></i>
		<img class="visa" src="../images/visa.png" />
	</section>

	<section class="partner" id="bitcoin">
		<td><i class="bitcoin"></i></td>
		<img class="bitcoin" src="../images/paypal.png" />
	</section>

	<section class="partner" id="bca">
		<td><i class="bca"></i></td>
		<img src="../images/mc.png" class="mc" />
	</section>

	<section class="partner" id="mega">
		<td><i class="mega"></i></td>
		<img src="../images/wo.png" class="wo" />
	</section>

	<section class="partner" id="truemoney">
		<td><i class="tm"></i></td>
		<img src="../images/ae.png" class="cc" />
	</section>
	</td>
	</section></br>
<!--END OF PARTNERSHIP-->
	<section class="kenapa">
		<center><h2 class="title1">Mengapa memilih AdaBuku?</h2></center>

		<div class="kolom" id="nyaman">
			<h3>Nyaman</h3>
			<p>Menggunakan flat desain, serta menggunakan fitur <i>Easy to ready</i></p>
		</div>

		<div class="kolom" id="lengkap">
			<h3>Lengkap</h3>
			<p>Mulai dari Buku Keagamaan, Cerpen, Novel, Biography, Komik, Education, Kamus, Tutorial, dsb.</p>
		</div>

		<div class="kolom" id="aman">
			<H3>Aman</H3>
			<p>Jaminan Pembayaran Online Aman & Mudah</p>
		</div>

		<div class="kolom" id="jam">
			<h3>Layanan</h3>
			<p>Dapat diakses 24 Jam</p>
		</div>
	</section>
<!--END OF CONTENT-->