<?php
// memanggil library FPDF
require '../lib/fpdf.php';
include '../db/koneksi.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Image('../assets/image/logo.png',30,5, 25,25);
$pdf->Cell(190,7,'UNIVERSITAS ISLAM KALIMANTAN',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'LAPORAN DATA ANGGOTA',0,1,'C');
$pdf->Line(10,32,200,32);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,10,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6, 'NO', 1,0);
$pdf->Cell(20,6,'NPM',1,0);
$pdf->Cell(55,6,'NAMA MAHASISWA',1,0);
$pdf->Cell(55,6,'TTL',1,0);
$pdf->Cell(10,6,'JK',1,0);
$pdf->Cell(40,6,'PRODI',1,1);

$pdf->SetFont('Arial','',10);

$anggota = mysqli_query($link, "SELECT * FROM tb_anggota");
$no=1;
while ($row = mysqli_fetch_array($anggota)){
		$pdf->Cell(10,6, $no.'.', 1,0);
    $pdf->Cell(20,6,$row['npm'],1,0);
    $pdf->Cell(55,6,$row['nama'],1,0);
    $pdf->Cell(55,6,$row['tempat_lahir'].", ". date('d F Y', strtotime($row['tgl_lahir'])),1,0);
    $pdf->Cell(10,6,$row['jk'],1,0);
    $pdf->Cell(40,6,$row['prodi'],1,1);
    $no++;
}

$pdf->Output();
?>