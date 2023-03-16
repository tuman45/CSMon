<?php
session_start();
if (isset($_SESSION['name'])) {

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


    // Query untuk mengambil nomor sertifikat terakhir
    $sql = mysqli_query($kon, "SELECT nomor_sertifikat FROM sertifikat ORDER BY nomor_sertifikat DESC LIMIT 1");
    $row = mysqli_fetch_assoc($sql);

    // Menambah nomor sertifikat terakhir dengan 1
    $nomor_baru = $row['nomor_sertifikat'] + 1;

    // Format Nomor
    $format = sprintf("%03d", $nomor_baru);

    // Query untuk menyimpan nomor sertifikat baru ke database
    $query = "INSERT INTO sertifikat (nomor_sertifikat) VALUES ($nomor_baru)";
    mysqli_query($kon, $query);

    // Get Id 
    $id = $_GET['id'];
    $query = mysqli_query($kon, "SELECT * FROM pkl WHERE id=$id");
    $data = mysqli_fetch_array($query);

    // data For Certificate
    $nama = $data['nama'];
    $awalpkl = tgl_ind($data["awalpkl"]);
    $akhirpkl = tgl_ind($data["akhirpkl"]);
    $tgl_sertifikat = $awalpkl . ' sampai dengan ' . $akhirpkl;
    $tgl_sekarang = tgl_ind(date("Y-m-d"));
    $image = 'img/sertifikat-FS.jpg';
    $ttd = 'img/ttd-stempel.png';

    // Set PDF
    $pdf = new FPDF();
    $pdf->AddPage('L', 'A4');
    $pdf->SetTitle('Sertifikat PRAKERIN');
    // Set Image
    $pdf->Image($image, 0, 0, 297, 210);
    // Set TTD
    $pdf->Image($ttd, 10, 157, 70, 30);
    // Set Format
    $pdf->SetFont('Times', '', 20);
    $pdf->SetXY(129, 42);
    $pdf->Cell(0, 10, $format . '/FS/Ser/' . date("m", strtotime($data["akhirpkl"])) . "/" . date("y", strtotime($data["akhirpkl"])), 0, 'C', 0);
    // Set Name Certificate
    $pdf->AddFont('Highlight', '', 'Highlight.php');
    $pdf->SetFont('Highlight', '', 60);
    $pdf->SetY(73);
    $pdf->MultiCell(0, 19, $nama, 0, 'C', 0);
    // Set Tgl PKL
    $pdf->AddFont('PublicSans-Regular', '', 'PublicSans-Regular.php');
    $pdf->SetFont('PublicSans-Regular', '', 21);
    $pdf->SetY(115);
    $pdf->MultiCell(0, 10, $tgl_sertifikat, 0, 'C', 0);
    // Set Predikat
    $pdf->SetFont('Times', 'B', 30);
    $pdf->SetY(136);
    $pdf->MultiCell(0, 10, "BAIK", 0, 'C', 0);
    // Set Tgl 
    $pdf->SetFont('Helvetica', '', 15);
    $pdf->SetXY(17, 150);
    $pdf->Cell(0, 10, "Sidoarjo, $tgl_sekarang", 0, 0);
    // Output
    $pdf->Output('D', 'Sertifikat ' . $nama . '.pdf', false);
} else {
    echo "<script language=\"javascript\">alert(\"Please login\");document.location.href='login.php';</script>";
}
