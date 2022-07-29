<?php
	session_start();
	if (!isset($_SESSION['login'])) {
    echo "
	    <script>
	      alert('Anda harus login terlebih dahulu');
	      document.location.href = '../login.php';
	    </script>
		";
	}
	include '../config.php';

	$db = dbConnect();

	$sesi = $_SESSION['nisn'];
	$selectPendaftar = "SELECT * FROM pendaftar WHERE nisn = '$sesi'";
	$executePendaftar = $db->query($selectPendaftar);
	$assoc = $executePendaftar->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<title></title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 pb-3">
	  <div class="container">
	    <a class="navbar-brand" href="#">
	      <h1>
	        <b>Pensmas</b>
	      </h1>
	    </a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href=""><h5>Home</h5></a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="logout.php"><h5>Logout</h5></a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>


	<div class="container">
		
		<div class="mt-5 mb-3">
			<h5>
				<i>
					Halo, <?= $assoc['nama_lengkap']?>
				</i>
			</h5>
		</div>


		<div class="mt-5 mb-5">
			<table class="table">
				<thead>
					<tr>
						<th>Data</th>
						<th>Action</th>
					</tr>	
				</thead>

				<tr>
					<th>Biodata dan Nilai</th>
					<td><a href="biodata.php" class="btn btn-primary">Isi Biodata dan Nilai</a></td>
				</tr>


				<tr>
					<th>Cek Bukti Pendaftaran</th>
					<td><a href="view.php" class="btn btn-primary">Cek Bukti Pendaftaran</a></td>
				</tr>

			</table>			
		</div>

	</div>



<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>