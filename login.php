<?php session_start();
if (isset($_SESSION['name'])) {
  header("location:index.php");
  exit;
} ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CSMon - Login</title>

  <link rel="shortcut icon" href="vendor/fontawesome-free/svgs/regular/laugh-wink.svg">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                  </div>
                  <form action="" method="POST" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="name" placeholder="Enter Your Name" autofocus required>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" required>
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="show-password-toggle" title="Show Password">
                            <i class="fas fa-eye"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <br>
                      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Masuk</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
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
  <!--Sweet Alert-->
  <script src="vendor/sweetalert/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function() {
      // Show/hide password on toggle button click
      $("#show-password-toggle").on("click", function() {
        var passwordField = $("#password");
        var passwordFieldType = passwordField.attr("type");
        var passwordToggleIcon = $(this).find("i");

        if (passwordFieldType === "password") {
          passwordField.attr("type", "text");
          passwordToggleIcon.removeClass("fa-eye").addClass("fa-eye-slash");
          $(this).attr("title", "Hide Password");
        } else {
          passwordField.attr("type", "password");
          passwordToggleIcon.removeClass("fa-eye-slash").addClass("fa-eye");
          $(this).attr("title", "Show Password");
        }
      });
    });
  </script>
</body>

</html>
<?php
include "koneksi.php";
if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $password = md5($_POST['password']);

  $query = mysqli_query($kon, "SELECT * FROM users WHERE name='$name' AND password='$password'");
  $cek = mysqli_num_rows($query);
  if ($cek > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['name'] = $name;
    echo "<script>
              Swal.fire({
              icon: 'success',
              title: 'login berhasil',
              showConfirmButton: false,
              timer: 2000
              }).then(function(){window.location.href = 'index.php'
              })
          </script>";
  } else {
    echo "<script>
              Swal.fire({
              icon: 'error',
              title: 'username / password salah',
              confirmButtonText: 'OK'
              });
          </script>";
  }
}
?>