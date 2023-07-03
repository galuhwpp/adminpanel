<?php
require_once "../koneksi.php";
$conn = open_connection();

if (isset($_GET['order_id'])) {
  $order_id = $_GET['order_id'];

  // Mengambil data pesanan berdasarkan order_id
  $query_select = "SELECT * FROM pesanan WHERE order_id = $order_id";
  $result_select = mysqli_query($conn, $query_select);
  $data = mysqli_fetch_assoc($result_select);

  // Memasukkan data ke tabel database lain (contoh: tabel_history)
  $query_insert = "INSERT INTO pesananselesai (order_selesai, nama_selesai, email_selesai, nomor_selesai, alamat_selesai, layanan_selesai, harga_selesai) VALUES ('".$data['order_id']."', '".$data['nama']."', '".$data['email']."', '".$data['nomor']."', '".$data['alamat']."', '".$data['layanan_order']."', '".$data['harga_order']."')";
  mysqli_query($conn, $query_insert);

  // Menghapus data dari tabel pesanan
  $query_delete = "DELETE FROM pesanan WHERE order_id = $order_id";
  mysqli_query($conn, $query_delete);

  //alert berhasil
  echo "<script>alert('Pesanan Selesai');</script>";

  // Redirect ke halaman order.php setelah data berhasil dipindahkan dan dihapus
  header("Location: order.php");
  exit();
}
?>
