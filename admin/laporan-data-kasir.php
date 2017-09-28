<?php
include"config.php";
require("../assets/pdf/fpdf.php");

if ($_POST[id_kasir]=='Pilih ID'){
	echo "Pilih ID..";
}
else {
	$pdf = new FPDF();

	$pdf->SetMargins(3,3,3,3);
	$pdf->SetFont('Arial','B',14);
	$all = $pdf->openObject();

	$pdf->SetStrokeColor(0, 0, 0, 1);
	$pdf->addJpegFromFile('..images/adb-hp.png', 20, 800, 69);

	$pdf->addText(200, 820, 16, '<b>Profil Data Karyawan</b>');
	$pdf->addText(90, 800, 14, '<b>AdaBuku $amp; ADB</b>');
	$pdf->line(10, 795, 578, 795);
	$pdf->addText(50, 780, 8, '<b>ID :</b> ' . $_POST[id_kasir]);
	$pdf->line(10, 50, 578, 50);

	$pdf->closeObjet();
	$pdf->addObject($all, 'all');

	$sql = mysql_query("SELECT * FROM kasir WHERE id_kasir = '$_POST[id_kasir]'");
	$jml = mysql_num_rows($sql);
	$i = 1;
	while ($r = mysql_fetch_array($sql)){
		$data[$i]=array('<b>No</b>'=>$i,
			'<b>ID</b>'=>$r[id_kasir],
			'<b>Nama</b>'=>$r[nama],
			'<b>Alamat</b>'=>$r[alamat],
			'<b>Telepon</b>'=>$r[telpon],
			'photo/'=>$r[photo]);
		$i++;

	}
	$pdf->Table($data, '', '', '');

	$pdf->Stream();

}
?>