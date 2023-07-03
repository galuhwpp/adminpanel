<?php
	session_start();

	define('BASE_URL', 'http://localhost/shoesadmin/');

	function redirect($file_url){
		$url = BASE_URL . $file_url;
		header("location: $url");
	}

	function check_login(){
		if(!isset($_SESSION['username'])){
			redirect("admin.php");
		}
	}


	function get_data_layanan(){
		require_once "koneksi.php";
		$conn = open_connection();
		$query = "SELECT * FROM dft_harga";
		$hasil = mysqli_query($conn, $query);

		$list = array();
		while ($row = mysqli_fetch_assoc($hasil)) {
			$list[ $row['kodel']] = $row['layanan'];
		}
		return $list;
	}

	function get_data_user(){
		require_once "koneksi.php";
		$conn = open_connection();
		$query = "SELECT * FROM users";
		$hasil = mysqli_query($conn, $query);

		$list = array();
		while ($row = mysqli_fetch_assoc($hasil)) {
			$list[ $row['id']] = $row['username'];
		}
		return $list;
	}

	function get_data_pesanan(){
		require_once "koneksi.php";
		$conn = open_connection();
		$query = "SELECT * FROM pesanan";
		$hasil = mysqli_query($conn, $query);

		$list = array();
		while ($row = mysqli_fetch_assoc($hasil)) {
			$list[ $row['order_id']] = $row['nama'];
		}
		return $list;
	}

	function get_data_pesananselesai(){
		require_once "koneksi.php";
		$conn = open_connection();
		$query = "SELECT * FROM pesananselesai";
		$hasil = mysqli_query($conn, $query);

		$list = array();
		while ($row = mysqli_fetch_assoc($hasil)) {
			$list[ $row['order_selesai']] = $row['nama_selesai'];
		}
		return $list;
	}
?>