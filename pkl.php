<?php
session_start();
if (isset($_SESSION['name'])) {
?>

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

        $nama = input($_POST["nama"]);
        $sekolah = input($_POST["sekolah"]);
        $hp = input($_POST["hp"]);
        $email = input($_POST["email"]);
        $awalpkl = input($_POST["awalpkl"]);
        $akhirpkl = input($_POST["akhirpkl"]);

        $sql = "insert into pkl (nama,sekolah,hp,email,awalpkl,akhirpkl) values ('$nama','$sekolah','$hp','$email','$awalpkl','$akhirpkl')";

        $create = mysqli_query($kon, $sql);

        if ($create) {
            echo
            "<meta http-equiv='refresh' content='1; url= pkl.php'/>";
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
    include 'koneksi.php';
    //cek apakah ada kiriman form dari method post
    if (isset($_POST['update'])) {

        $id = htmlspecialchars($_POST["id"]);
        $nama = input($_POST["nama"]);
        $sekolah = input($_POST["sekolah"]);
        $hp = input($_POST["hp"]);
        $email = input($_POST["email"]);
        $awalpkl = input($_POST["awalpkl"]);
        $akhirpkl = input($_POST["akhirpkl"]);

        $sql = "UPDATE pkl SET
        nama='$nama',
        sekolah='$sekolah',
        hp='$hp',
        email='$email',
        awalpkl='$awalpkl',
        akhirpkl='$akhirpkl'
        WHERE id=$id";
        $update = mysqli_query($kon, $sql);

        if ($update) {
            echo
            "<meta http-equiv='refresh' content='1; url= pkl.php'/>";
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
        $id = htmlspecialchars($_POST["id"]);

        $sql = "DELETE FROM pkl WHERE id='$id'";
        $delete = mysqli_query($kon, $sql);

        if ($delete > 0) {
            echo
            "<meta http-equiv='refresh' content='1; url= pkl.php'/>";
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
                   <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['name']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>    
                                Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
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
                                                    <label>Nama:</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Sekolah:</label>
                                                    <select class="form-select" name="sekolah" required>
                                                        <option selected>Silahkan Pilih</option>
                                                        <option value="SMK Yapalis">SMK Yapalis</option>
                                                        <option value="SMKN 1 Pungging">SMKN 1 Pungging</option>
                                                        <option value="SMK Wijaya Putra">SMK Wijaya Putra</option>
                                                        <option value="SMK Maarif NU Driyorejo">SMK Maarif NU Driyorejo</option>
                                                        <option value="SMKN 2 Surabaya">SMKN 2 Surabaya</option>
                                                        <option value="SMKN 1 Cerme">SMKN 1 Cerme</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>No HP:</label>
                                                    <input type="text" name="hp" class="form-control" placeholder="Masukkan No HP" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="text" name="email" class="form-control" placeholder="Masukkan Email" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Awal PKL:</label>
                                                    <input class="date form-control" type="date" name="awalpkl" placeholder="" required />
                                                </div>
                                                <div class="form-group">
                                                    <label>Akhir PKL:</label>
                                                    <input class="date form-control" type="date" name="akhirpkl" required />
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
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa PKL</h6>
                            </div>
                            <div class="card-body">
                                <?php echo @$alert; ?>
                                <div class="table-responsive">
                                    <!-- Button trigger modal create -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create"><i class="fas fa-plus-circle"></i>
                                        Tambah Baru
                                    </button>
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
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "koneksi.php";
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
                                                    <td>
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#update<?= $data['id']; ?>">Ubah</button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $data['id']; ?>">Hapus</button>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Sertifikat
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a href="sertifikat.php?id=<?= $data['id'] ?>" class="dropdown-item " target="_blank">Download PDF</a>
                                                                <!-- <a class="dropdown-item" href="#">Send Email</a> -->
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="update<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                                                    <div class="form-group">
                                                                        <label>Nama:</label>
                                                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo $data['nama']; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Sekolah:</label>
                                                                        <select class="form-select" name="sekolah" required>
                                                                            <option selected value="<?php echo $data['sekolah']; ?>"><?php echo $data['sekolah']; ?></option>
                                                                            <option value="SMK Yapalis">SMK Yapalis</option>
                                                                            <option value="SMKN 1 Pungging">SMKN 1 Pungging</option>
                                                                            <option value="SMK Wijaya Putra">SMK Wijaya Putra</option>
                                                                            <option value="SMK Maarif NU Driyorejo">SMK Maarif NU Driyorejo</option>
                                                                            <option value="SMKN 2 Surabaya">SMKN 2 Surabaya</option>
                                                                            <option value="SMKN 1 Cerme">SMKN 1 Cerme</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>No HP:</label>
                                                                        <input type="text" name="hp" class="form-control" placeholder="Masukkan No HP" value="<?php echo $data['hp']; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Email:</label>
                                                                        <input type="text" name="email" class="form-control" placeholder="Masukkan Email" value="<?php echo $data['email']; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Awal PKL:</label>
                                                                        <input class="date form-control" type="date" name="awalpkl" value="<?php echo $data['awalpkl']; ?>" required />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Akhir PKL:</label>
                                                                        <input class="date form-control" type="date" name="akhirpkl" value="<?php echo $data['akhirpkl']; ?>" required />
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
                                                <div class="modal fade" id="delete<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" /><strong>Apakah Anda Yakin Ingin Menghapus Data</strong>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; CV Future Solution 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

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

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    </body>

    </html>
<?php
} else {
    echo "<script language=\"javascript\">alert(\"Please login\");document.location.href='login.php';</script>";
}
?>
