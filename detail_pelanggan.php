<?php
include 'koneksi.php';

$id = $_GET["id_pelanggan"];

// Fetch detail payment data from the database
$sql = "SELECT pelanggan.* , DATE_FORMAT(pembayaran.tgl_bayar, '%m-%Y') AS bulan FROM pelanggan JOIN pembayaran ON pelanggan.id_pelanggan = pembayaran.id_pelanggan WHERE pelanggan.id_pelanggan = $id ORDER BY tgl_bayar ASC";
$hasil = mysqli_query($kon, $sql);
$pembayaran = array();
while ($row = mysqli_fetch_assoc($hasil)) {
    $pembayaran[] = $row["bulan"];
    $username = $row["username"];
    $tgl_bayar = $row["bulan"];
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h3><?php echo $username; ?></h3>
    <?php for ($tahun = date('Y'); $tahun >= date('Y') - 2; $tahun--) { ?>
        <div class="container">
            <table class=" table table-bordered table-responsive">
                <tr>
                    <?php $nama_bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    foreach ($nama_bulan as $nama_bulan) {
                        echo '<th>' . $nama_bulan . " | " . $tahun . '</th>';
                    } ?>
                </tr>
                <tr>
                    <?php for ($bulan = 1; $bulan <= 12; $bulan++) {
                        $date = str_pad($bulan, 2, '0', STR_PAD_LEFT) . '-' . $tahun;
                        $status = in_array($date, $pembayaran) ? "Sudah" : "-";
                        echo '<td>' . $status . '</td>';
                    }
                    ?>
                </tr>
            <?php } ?>
            </table>
        </div>
</body>

</html>