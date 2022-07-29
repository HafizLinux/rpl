<?php

	
	function dbConnect(){
		$connection = mysqli_connect("localhost", "root", "","db_rpl");

		if (!$connection) {
			die('Gagal :: Koneksi Error!!!');
		}
		return $connection;
	}


	function register($no_pendaftaran, $nisn, $email, $namaLengkap, $password){
		$db = dbConnect();

		$sqlCheckNisn = "SELECT * FROM pendaftar WHERE nisn = '$nisn'";
		$executeCheckNisn = $db->query($sqlCheckNisn);

		if (!mysqli_num_rows($executeCheckNisn) < 0) {
			echo "
				<script>
					alert('NISN anda Telah Terdaftar');
					document.location.href = 'index.php';
				</script>
			";
		}else{
			$sqlRegister = "INSERT INTO pendaftar (nisn, no_pendaftar, nama_lengkap, email, password) VALUES 
						('$nisn', '$no_pendaftaran', '$namaLengkap', '$email', '$password');";
			$executeRegister = $db->query($sqlRegister);
			$nilai = "nl-".uniqid();

			if ($executeRegister) {
				$sqlInsertNilai = "INSERT INTO nilai (id_nilai,nisn) VALUES ('$nilai','$nisn')";
				$executeInsertNilai = $db->query($sqlInsertNilai);

				$sqlInsertSkhun = "INSERT INTO skhun (nisn) VALUES ('$nisn')";
				$executeInsertSkhun = $db->query($sqlInsertSkhun);

				echo "
					<script>
						alert('Sukses Terdaftar, silahkan login dan lengkapi data!!!');
						document.location.href = 'index.php';
					</script>
				";
			}else{
				echo "
					<script>
						alert('Gagal Terdaftar, silahkan register ulang');
						document.location.href = 'index.php';
					</script>
				";
			}
		}



		


	}


	function updatePendaftar($nisn, $namaLengkap, $ttl, $jk, $agama, $alamat, $noTelp, $asalSekolah, $namaOrtu, $matematika, $ipa, $bindo, $binggris, $picture, $no_skhun){
		$db = dbConnect();
		$sqlUpdatePendaftar = "	
					UPDATE pendaftar SET 
						nama_lengkap = '$namaLengkap', 
						ttl = '$ttl', 
						jenis_kelamin = '$jk', 
						agama = '$agama', 
						alamat = '$alamat', 
						no_telp = '$noTelp', 
						asal_sekolah = '$asalSekolah', 
						nama_orangtua = '$namaOrtu' 
					WHERE nisn = '$nisn';
					";
		$executeUpdatePendaftar = $db->query($sqlUpdatePendaftar);

		$sqlUpdateNilai = "
						UPDATE nilai SET
							matematika = '$matematika',
							IPA = '$ipa',
							b_inggris = '$binggris',
							b_indonesia = '$bindo'
						WHERE nisn = '$nisn';
						";
		$executeUpdateNilai = $db->query($sqlUpdateNilai);

		$sqlUpdateSkhun = "
						UPDATE skhun SET
							no_skhun = '$no_skhun',
							foto_skhun = '$picture'
						WHERE nisn = '$nisn';
						";
		$executeUpdateSkhun = $db->query($sqlUpdateSkhun);



		if ($executeUpdatePendaftar) {
				echo "
					<script>
						alert('Data Sukses diupdate');
						document.location.href = 'index.php';
					</script>
				";
			}else{
				echo "
					<script>
						alert('Data Gagal diupdate');
						document.location.href = 'index.php';
					</script>
				";
			}

	}




?>