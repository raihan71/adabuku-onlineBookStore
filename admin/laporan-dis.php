<?php
include"config.php";
require("../assets/pdf/fpdf.php");

$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',14);
$pdf->Image('../images/dis-add.jpg',1,1,2,2);
$query=mysql_query("select * from distributor");
while($lihat=mysql_fetch_array($query)){
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5, $lihat['id_distributor'] ,0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5, $lihat['nama_distributor'] ,0,'L');    
$pdf->SetFont('Times','B',14);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5, $lihat['alamat'],0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5, $lihat['telepon'] ,0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
}

$pdf->Output("laporan-data-distributor.pdf","I");