<?php
include"config.php";
require("../assets/pdf/fpdf.php");

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../images/adb-hp.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'AdaBuku',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0038XXXXXXX',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. HALTE MALEBER',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.adabuku.com email : adabuku@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Buku",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Judul Buku', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Penerbit', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Penulis', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'ISBN', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Harga Jual', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Stok', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("select * from buku");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['judul'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['penerbit'], 1, 0,'C');
	$pdf->Cell(4, 0.8, $lihat['penulis'],1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $lihat['noisbn'], 1, 0,'C');
	$pdf->Cell(4.5, 0.8, "Rp. ".number_format($lihat['harga_jual'])." ,-", 1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['stok'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan-data-buku.pdf","I");