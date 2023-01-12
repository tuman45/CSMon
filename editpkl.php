<?php 
session_start();
IF(ISSET($_SESSION['name'])){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>CSMon - Tambah PKL</title>
	
	<!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

</head>
<body>
	<div class="container">
		<?php
		include "koneksi.php";

		function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	if (isset($_GET['id'])) {
		$id=input($_GET["id"]);
		$sql="select * from pkl where id=$id";
		$hasil=mysqli_query($kon,$sql);
		$data = mysqli_fetch_assoc($hasil);
	}
	
	//cek apakah ada kiriman form dari method post
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$id=htmlspecialchars($_POST["id"]);
		$nama=input($_POST["nama"]);
		$sekolah=input($_POST["sekolah"]);
		$hp=input($_POST["hp"]);
		$email=input($_POST["email"]);
		$awalpkl=input($_POST["awalpkl"]);
		$akhirpkl=input($_POST["akhirpkl"]);
		
		$sql="update pkl set
			nama='$nama',
			sekolah='$sekolah',
			hp='$hp',
			email='$email',
			awalpkl='$awalpkl',
			akhirpkl='$akhirpkl'
			where id=$id";
		
		
		$hasil=mysqli_query($kon,$sql);
		
		if ($hasil) {
			echo"
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = 'pkl.php';
        </script>
        ";
		}
		else {
			echo"
		<script>
            alert('Data Gagal Diubah');
            document.location.href = 'editpkl.php';
        </script>
        ";
		}
	}
	?>
	
	<h2>Ubah Data</h2>
	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="form-group">
			<label>Nama:</label>
			<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Masukkan Nama" required />
		</div>
		<div class="form-group">
			<label>Sekolah:</label>
			<select class="form-select"  name="sekolah" required />
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
			<input type="text" name="hp" class="form-control" value="<?php echo $data['hp']; ?>" placeholder="Masukkan No HP" required />
		</div>
		<div class="form-group">
			<label>Email:</label>
			<input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" placeholder="Masukkan Email" required />
		</div>
		<div class="form-group">
			<label>Awal PKL:</label>
			<input class="date form-control" type="text" name="awalpkl" value="<?php echo $data['awalpkl']; ?>" required />
		</div>
		<div class="form-group">
			<label>Akhir PKL:</label>
			<input class="date form-control" type="text" name="akhirpkl" value="<?php echo $data['akhirpkl']; ?>" required />
		</div>
		<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
	<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- Page Script -->
    <script src="js/script.js"></script>
    
	</body>
		
</html>
<?php 
}else{
    echo "<script language=\"javascript\">alert(\"Please login\");document.location.href='login.php';</script>";    
}
?>
