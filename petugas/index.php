<?php
    session_start();
	if (!isset($_SESSION['petugas'])) {
    	echo "
			<script>
			alert('Anda harus login terlebih dahulu');
			document.location.href = '../login.php';
			</script>
		";
	}
?>