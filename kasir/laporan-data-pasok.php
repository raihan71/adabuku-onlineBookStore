<?php

include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../images/adb-hp.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'AdaBuku : Book Store',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. HALTE MALEBER',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.AdaBuku.com | email : AdaBuku@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Pasok Buku',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak hari ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(6,0.7,"Laporan Pasok Buku ".$_GET['date'],0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'ID Distributor', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'ID Buku', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jumlah', 1, 0, 'C');

$no=1;
$date=$_GET['date'];
$query=mysql_query("select * from pasok where date=" . $date);
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 2, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['id_distributor'],2, 0, 'C');
	$pdf->Cell(6, 0.8, $lihat['id_buku'],2, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['jumlah'], 2, 0,'C');	

	$no++;
}

$pdf->Output("laporan_pasok.pdf","I");

?>