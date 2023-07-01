<?php 
	require_once "../koneksi.php";
	require_once "../function.php";
	check_login();

	$param_kode_layanan = $_GET['id'];

	$conn = open_connection();
	$query = "DELETE FROM dft_harga WHERE id = '$param_kode_layanan' ";
	$hasil = mysqli_query($conn, $query);

	if ($hasil) {
		redirect('layanan/admin_layanan.php');
	} else {
		echo "Gagal menghapus data $param_kode_layanan : ". mysqli_error($conn);
	}

?>