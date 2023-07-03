<?php 
require_once "../koneksi.php";
require_once "../function.php";
check_login();
$list_layanan = get_data_pesanan();

$param_kode_layanan = $_GET['order_id'] ?? '';

$conn = open_connection();

$data_lama = array();
if (!empty($param_kode_layanan)) {
    $query = "SELECT * FROM pesanan WHERE order_id = '$param_kode_layanan' ";
    $hasil = mysqli_query($conn, $query);
    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $data_lama = mysqli_fetch_assoc($hasil);
    }
}


$kode       = $_POST['order_id'] ?? $data_lama['order_id'] ?? '';
$nama       = $_POST['nama'] ?? $data_lama['nama'] ?? '';
$email    = $_POST['email'] ?? $data_lama['email'] ?? '';
$nomor        = $_POST['nomor'] ?? $data_lama['nomor'] ?? '';
$alamat      = $_POST['alamat'] ?? $data_lama['alamat'] ?? '';
$layanan_order      = $_POST['layanan_order'] ?? $data_lama['layanan_order'] ?? '';
$harga_order      = $_POST['harga_order'] ?? $data_lama['harga_order'] ?? '';


$isError = FALSE;
$error = '';
if (isset($_POST['submit'])) {

    //validasi data
    if (empty($kode)) {
        $isError = TRUE;
        $error = 'Kode harap diisi!!';
    }
    if (empty($nama)) {
        $isError = TRUE;
        $error = 'Nama harap diisi!!';
    }

    //simpan data ke database
    if (!$isError) {
        $conn = open_connection();
        $query = "UPDATE pesanan SET 
                    order_id ='$kode',
                    nama = '$nama',
                    email = '$email',
                    nomor = '$nomor',
                    alamat = '$alamat',
                    layanan_order = '$layanan_order',
                    harga_order = '$harga_order'
                
                WHERE 
                    order_id = '$data_lama[order_id]' ";
        $hasil = mysqli_query($conn, $query);
        if ($hasil) {
            redirect('order/order.php');
        } else {
            $isError = TRUE;
            $error = "Gagal menyimpan ke database : " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "../contents/headscript.php"; ?>
</head>

<body>
    <?php include_once "../contents/navbar_admin.php"; ?>

    <div class="wrapper">
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-dark menu-btn"><img src="../assets/img/menu.png" alt=""><span class="new-notification"></span></button>
                </div>
                <!-- <div class="col text-center"><img src="assets/img/logo.png" alt="" class="header-logo"></div> -->
                <div class="col-auto">
                </div>
            </div>
        </div>
        <div class="container-fluid bg-warning text-orange">
            <div class="row">
                <div class="container">
                    <div class="row  py-4 ">

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <center>
                <h3 class="mb-3 my-3">Update Data Layanan SHOESIT</h3>
            </center>
            <br />

            <br />

            <?php if ($isError) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="order">Order ID</label>
                    <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Masukan Kode software" value="<?= $kode ?>">
                </div>


                <div class="form-group">
                    <label for="nama_cust">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama nama" value="<?= $nama ?>">
                </div>

                <div class="form-group">
                    <label for="email_cust">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukan keterangan" value="<?= $email ?>">
                </div>

                <div class="form-group">
                    <label for="nocust">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukan nomor" value="<?= $nomor ?>">
                </div>

                <div class="form-group">
                    <label for="alamatcust">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Harga jual" value="<?= $alamat ?>">
                </div>

                <div class="form-group">
                    <label for="layanan">Layanan</label>
                    <input type="text" class="form-control" id="layanan_order" name="layanan_order" placeholder="Masukan Harga jual" value="<?= $layanan_order ?>">
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga_order" name="harga_order" placeholder="Masukan Harga jual" value="<?= $harga_order ?>">
                </div>

                <button type="submit" class="btn btn-info" name="submit">Submit</button>
            </form>

        </div>
    </div>

    <?php include_once "../contents/footer.php" ?>
</body>

</html>
