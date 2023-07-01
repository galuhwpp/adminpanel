<?php 
	require_once "../koneksi.php";
	require_once "../function.php";
	check_login();

	$param_id_user = $_GET['id'];

	$conn = open_connection();
	$query = "DELETE FROM users WHERE id = '$param_id_user' ";
	$hasil = mysqli_query($conn, $query);

	if ($hasil) {
		redirect('admin/admin_data.php');
	} else {
		echo "Gagal menghapus data $param_id_user : ". mysqli_error($conn);
	}

?>