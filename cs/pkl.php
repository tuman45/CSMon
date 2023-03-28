<?php
session_start();
if (isset($_SESSION['name'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CSMon</title>

        <link rel="shortcut icon" href="../vendor/fontawesome-free/svgs/regular/laugh-wink.svg">

        <!-- Custom fonts for this template -->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include '../sidebar.php'; ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Topbar -->
                <?php include '../topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Main Content -->
                <div id="content">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa PKL</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class='table table-bordered' id='dataTable' width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Sekolah</th>
                                                <th>No HP</th>
                                                <th>Email</th>
                                                <th>Awal PKL</th>
                                                <th>Akhir PKL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "../koneksi.php";
                                            $sql = "SELECT * FROM pkl ORDER BY id DESC";

                                            $hasil = mysqli_query($kon, $sql);
                                            $no = 0;
                                            while ($data = mysqli_fetch_array($hasil)) {
                                                $id = $data["id"];
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $data["nama"]; ?></td>
                                                    <td><?php echo $data["sekolah"]; ?></td>
                                                    <td><?php echo $data["hp"]; ?></td>
                                                    <td><?php echo $data["email"]; ?></td>
                                                    <td><?php echo $data["awalpkl"]; ?></td>
                                                    <td><?php echo $data["akhirpkl"]; ?></td>
                                                <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include '../footer.php'; ?>
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
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>

        <!--Sweet Alert-->
        <script src="../vendor/sweetalert/sweetalert2.all.min.js"></script>
    </body>

    </html>
<?php
} else {
    echo "<script language=\"javascript\">alert(\"Please login\");document.location.href='../login.php';</script>";
}
?>