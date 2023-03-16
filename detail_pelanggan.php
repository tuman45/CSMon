<?php
session_start();
if (isset($_SESSION['name'])) {

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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CSMon</title>

        <link rel="shortcut icon" href="vendor/fontawesome-free/svgs/regular/laugh-wink.svg">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'sidebar.php'; ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Topbar -->
                <?php include 'topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <h3><?php echo $username; ?></h3>
                        <?php for ($tahun = date('Y'); $tahun >= date('Y') - 2; $tahun--) { ?>
                            <div class="container">
                                <table class=" table table-bordered">
                                    <tr>
                                        <?php $nama_bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                        foreach ($nama_bulan as $nama_bulan) {
                                            echo '<th>' . $nama_bulan . " | " . $tahun . '</th>';
                                        } ?>
                                    </tr>
                                    <tr>
                                        <?php for ($bulan = 1; $bulan <= 12; $bulan++) {
                                            $date = str_pad($bulan, 2, '0', STR_PAD_LEFT) . '-' . $tahun;
                                            $status = in_array($date, $pembayaran) ? '<p class="text-success"><strong>SUDAH</strong></p>' : '<p class="text-danger"><strong>BELUM</strong></p>';
                                            echo '<td>' . $status . '</td>';
                                        }
                                        ?>
                                    </tr>
                                <?php } ?>
                                </table>
                            </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include 'footer.php'; ?>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

    </body>

    </html>
<?php
} else {
    echo "<script language=\"javascript\">alert(\"Please login\");document.location.href='login.php';</script>";
}
?>