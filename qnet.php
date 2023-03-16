<?php
session_start();
if (isset($_SESSION['name'])) {

    // create
    include 'koneksi.php';
    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['tambah'])) {

        $username = input($_POST["username"]);
        $password = input($_POST["password"]);
        $no_wa = input($_POST["no-wa"]);
        $alamat = input($_POST["alamat"]);
        $id_paket = $_POST["id_paket"];
        $ip = input($_POST["ip"]);

        $sql = "INSERT INTO pelanggan (username, password, no_wa, alamat, id_paket, ip) VALUES ('$username', '$password', '$no_wa', '$alamat', '$id_paket', '$ip')";

        $create = mysqli_query($kon, $sql);

        if ($create) {
            echo
            "<meta http-equiv='refresh' content='1; url= qnet.php'/>";
            $alert =
                "<div class='alert alert-success'>
            <strong>Data Berhasil Ditambah</strong>
            </div>";
        } else {
            $alert =
                "<div class='alert alert-danger'>Data Gagal Ditambah.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
</button>
</div>";
        }
    }

    // Update
    //cek apakah ada kiriman form dari method post
    if (isset($_POST['update'])) {

        $id_pelanggan = htmlspecialchars($_POST["id_pelanggan"]);
        $username = input($_POST["username"]);
        $password = input($_POST["password"]);
        $no_wa = input($_POST["no-wa"]);
        $alamat = input($_POST["alamat"]);
        $id_paket = input($_POST["id_paket"]);
        $ip = input($_POST["ip"]);

        $sql = "UPDATE pelanggan SET
        username='$username',
        password='$password',
        no_wa='$no_wa',
        alamat='$alamat',
        id_paket='$id_paket',
        ip='$ip'
        WHERE id_pelanggan=$id_pelanggan";
        $update = mysqli_query($kon, $sql);

        if ($update) {
            echo
            "<meta http-equiv='refresh' content='1; url= qnet.php'/>";
            $alert =
                "<div class='alert alert-success'>
            <strong>Data Berhasil Diubah</strong>
            </div>";
        } else {
            $alert = "<div class='alert alert-danger'>Data Gagal Diubah.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
</button>
</div>";
        }
    }

    //Delete 
    if (isset($_POST['delete'])) {
        $id_pelanggan = htmlspecialchars($_POST["id_pelanggan"]);

        $sql = "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
        $delete = mysqli_query($kon, $sql);

        if ($delete > 0) {
            echo
            "<meta http-equiv='refresh' content='1; url= qnet.php'/>";
            $alert =
                "<div class='alert alert-success'>
            <strong>Data Berhasil Dihapus</strong>
            </div>";
        } else {
            $alert =
                "<div class='alert alert-danger'>Data Gagal Dihapus.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
        }
    }
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
                        <!-- Modal create -->
                        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Masukkan Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">

                                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                                <div class="form-group">
                                                    <label>Username:</label>
                                                    <input type="text" name="username" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Pasword :</label>
                                                    <input type="password" name="password" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>No. Yang Bisa Dihubungi :</label>
                                                    <input type="number" name="no-wa" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat :</label>
                                                    <input type="text" name="alamat" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Paket:</label>
                                                    <select class="form-control" name="id_paket" id="id_paket" required>
                                                        <option selected>Silahkan Pilih</option>
                                                        <?php
                                                        $query_paket = mysqli_query($kon, "SELECT * FROM paket");
                                                        while ($paket = mysqli_fetch_array($query_paket)) { ?>
                                                            <option value="<?= $paket['id_paket'] ?>"><?php echo $paket['paket'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>IP :</label>
                                                    <input type="text" name="ip" class="form-control" required />
                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" name="tambah" class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- End Modal Create -->

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Pelanggan QNET</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i>
                                        Tambah Baru
                                    </button>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>No. Yang Bisa Dihubungi</th>
                                                <th>Alamat</th>
                                                <th>Paket</th>
                                                <th>IP</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $sql = "SELECT * FROM pelanggan JOIN paket ON pelanggan.id_paket = paket.id_paket";
                                                $no = 0;
                                                $hasil = mysqli_query($kon, $sql);
                                                while ($row = mysqli_fetch_array($hasil)) {
                                                    $no++ ?>
                                                    <td><?php echo $no ?></td>
                                                    <td><a class="text-reset text-decoration-none" href="detail_pelanggan.php?id_pelanggan=<?php echo $row["id_pelanggan"] ?>"><?php echo $row["username"] ?></a></td>
                                                    <td><?php echo $row["password"] ?></td>
                                                    <td><?php echo $row["no_wa"] ?></td>
                                                    <td><?php echo $row["alamat"] ?></td>
                                                    <td><?php echo $row["paket"] ?></td>
                                                    <td><?php echo $row["ip"] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update<?= $row['id_pelanggan']; ?>"><i class="fa fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $row['id_pelanggan']; ?>"><i class="fa fa-trash-alt"></i></button>
                                                    </td>
                                                    <!-- Modal Edit -->
                                                    <div class="modal fade" id="update<?= $row['id_pelanggan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                                                        <input type="hidden" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>" />
                                                                        <div class="form-group">
                                                                            <label>Nama:</label>
                                                                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo $row['username']; ?>" required />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Password:</label>
                                                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" value="<?php echo $row['password']; ?>" required />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>No. Yang Bisa Dihubungi :</label>
                                                                            <input type="number" name="no-wa" class="form-control" value="<?php echo $row['no_wa'] ?>" required />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Alamat:</label>
                                                                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?php echo $row['alamat']; ?>" required />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Paket:</label>
                                                                            <select class="custom-select" name="id_paket" id="paket" required>
                                                                                <option value="<?php echo $row['id_paket'] ?>" selected><?php echo $row['paket'] ?></option>
                                                                                <option>Silahkan Pilih</option>
                                                                                <?php
                                                                                $query_paket = mysqli_query($kon, "SELECT * FROM paket");
                                                                                while ($paket = mysqli_fetch_array($query_paket)) { ?>
                                                                                    <option value="<?= $paket['id_paket'] ?>"><?php echo $paket['paket'] ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>IP:</label>
                                                                            <input type="text" name="ip" class="form-control" placeholder="Masukkan IP" value="<?php echo $row['ip']; ?>" required />
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                            <button type="submit" name="update" class="btn btn-primary">Ubah</button>
                                                                        </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Modal Edit -->
                                                    <!-- Modal Delete -->
                                                    <div class="modal fade" id="delete<?= $row['id_pelanggan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                                                        <input type="hidden" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>" /><strong>Apakah Anda Yakin Ingin Menghapus Data</strong>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                                                </div>
                                                                <!-- End Modal Delete -->
                                            </tr>
                                        <?php } ?>
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