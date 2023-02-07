<?php

function tgl_ind($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

require 'koneksi.php';
require 'fpdf/fpdf.php';

$id = $_GET['id'];
$query = mysqli_query($kon, "SELECT * FROM pkl WHERE id=$id");
$data = mysqli_fetch_array($query);
$nama = $data['nama'];
$awalpkl = tgl_ind($data["awalpkl"]);
$akhirpkl = tgl_ind($data["akhirpkl"]);
$tgl_sertifikat = $awalpkl . ' sampai dengan ' . $akhirpkl;
$tgl_sekarang = tgl_ind(date("Y-m-d"));
$image = 'img/sertifikat.jpg';

// Set PDF
$pdf = new FPDF();
$pdf->AddPage('L', 'A4');
$pdf->SetTitle('Sertifikat PRAKERIN');
// Set Image
$pdf->Image($image, 0, 0, 297, 210);
// Set Name Sertifikat
$pdf->SetFont('arial', '', 25);
$pdf->SetY(80);
$pdf->MultiCell(0, 10, $nama, 0, 'C', 0);
// Set Tgl PKL
$pdf->SetFont('times', '', 22);
$pdf->SetY(106);
$pdf->MultiCell(0, 10, $tgl_sertifikat, 0, 'C', 0);
// Set Tgl 
$pdf->SetFont('times', '', 15);
$pdf->SetXY(25, 150);
$pdf->Cell(0, 10, "Sidoarjo, $tgl_sekarang", 0, 0);
// Output
$pdf->Output('I', 'Sertifikat ' . $nama . '.pdf', false);
