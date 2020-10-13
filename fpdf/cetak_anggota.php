<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->Image('at.png',18,3,38,38);
$pdf->SetFont('Times','B',18);
// mencetak string 
$pdf->Cell(0,5,'LAPORAN DATA BUKU PERPUSTAKAAN','0','1','C');
$pdf->SetFont('Times','B',16);
$pdf->Cell(0,7,'SMA MUHAMMADIYAH PK KARTASURA','0','1','C',false);
$pdf->SetFont('Times','i',14);
$pdf->Cell(0,4,'Alamat :  Jl. Slamet Riyadi No.80, Dusun II, Kartasura, Sukoharjo','0','1','C',false);
$pdf->Cell(0,7,'Kabupaten Sukoharjo, Jawa Tengah 57167','0','1','C',false);
$pdf->Ln(8);
$pdf->Cell(280,0.6,'','0','1','C',true);
$pdf->Ln(5);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Times','B',14);
// $pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(30,6,'NIS',1,0);
$pdf->Cell(30,6,'KELAS',1,0);
$pdf->Cell(100,6,'NAMA SISWA',1,0);
$pdf->Cell(110,6,'ALAMAT',1,1);

$pdf->SetFont('Times','',12);

require "../koneksi/koneksi1.php";
$anggota = mysqli_query($koneksi, "select * from anggota");
while ($row = mysqli_fetch_array($anggota)){
    $pdf->Cell(30,6,$row['nis'],1,0);
    $pdf->Cell(30,6,$row['kelas'],1,0);
    $pdf->Cell(100,6,$row['nama'],1,0);
    $pdf->Cell(110,6,$row['alamat'],1,1); 
}
$pdf->SetFont('Times','B',12);
$pdf->Cell( 0, 40, 'Mengetahui,               ', 0, 0, 'R' );
 $pdf->Cell( 0, 85, 'Kepala Perpustakaan', 0, 0, 'R' );

$pdf->Output();
?>