<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "admin_csmon");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch payments data from the database
$sql = "SELECT pelanggan.* , DATE_FORMAT(pembayaran.tgl_bayar, '%m-%Y') AS month FROM pelanggan JOIN pembayaran ON pelanggan.id_pelanggan = pembayaran.id_pelanggan WHERE pelanggan.id_pelanggan = '1' ORDER BY tgl_bayar ASC";
$result = mysqli_query($conn, $sql);
$payments = array();
while ($row = mysqli_fetch_assoc($result)) {
    $payments[] = $row["month"];
    $username = $row["username"];
    $tgl_bayar = $row["month"];
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <h3><?php echo $username; ?></h3>
    <?php for ($year = date('Y'); $year >= date('Y') - 2; $year--) { ?>
        <div class="container">
            <table class=" table table-bordered table-responsive">
                <tr>
                    <?php $month_names = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    foreach ($month_names as $month_name) {
                        echo '<th>' . $month_name . " | " . $year . '</th>';
                    } ?>
                </tr>
                <tr>
                    <?php for ($month = 1; $month <= 12; $month++) {
                        $date = str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . $year;
                        $status = in_array($date, $payments) ? "Sudah" : "-";
                        echo '<td>' . $status . '</td>';
                    }
                    ?>
                </tr>
            <?php } ?>
            </table>
        </div>
</body>

</html>