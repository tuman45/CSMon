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
$image = 'img/sertifikat.jpg';

$pdf = new FPDF();
$pdf->AddPage('L', 'A4');
$pdf->SetTitle('Sertifikat PRAKERIN');
$pdf->Image($image, 0, 0, 297, 210);
$pdf->SetFont('arial', '', 25);
$pdf->SetY(80);
$pdf->MultiCell(0, 10, $nama, 0, 'C', 0);
$pdf->SetFont('times', '', 22);
$pdf->SetY(106);
$pdf->MultiCell(0, 10, $tgl_sertifikat, 0, 'C', 0);
$pdf->Output('', $nama . ' Sertifikat.pdf', false);
