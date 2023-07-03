<?php
require_once "../function.php";
require_once "../koneksi.php";
check_login();

$conn = open_connection();

$transaksiselesai = "SELECT * FROM pesananselesai ";
$data_transaksis = mysqli_query($conn, $transaksiselesai);
$jumlah_transaksis = mysqli_num_rows($data_transaksis);

$transaksi = "SELECT * FROM pesanan ";
$data_transaksi = mysqli_query($conn, $transaksi);
$jumlah_transaksi = mysqli_num_rows($data_transaksi);

$layanan = "SELECT * FROM dft_harga ";
$dataLayanan = mysqli_query($conn, $layanan);
$jumlahLayanan = mysqli_num_rows($dataLayanan);

$user = "SELECT * FROM users ";
$data_user = mysqli_query($conn, $user);
$jumlah_user = mysqli_num_rows($data_user);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once "../contents/headscript.php" ?>

</head>

<body>
    <?php include_once "../contents/navbar_admin.php"; ?>

    <div class="wrapper">
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-dark menu-btn"><img src="../assets/img/menu.png" alt=""><span class="new-notification"></span></button>
                </div>
                <div class="col-auto">
                    <div class="container py-4">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-warning">
            <div class="row">
                <div class="container">
                    <div class="row  py-2 ">

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4 py-4">
                    <div class="card border-left-primary shadow h-100 py-2 bg-success">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                                        Transaksi Berjalan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $jumlah_transaksi; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4 py-4">
                    <div class="card border-left-primary shadow h-100 py-2 bg-grass-green">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                                        Transaksi Selesai</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $jumlah_transaksis; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-4 py-4">
                    <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                                        Layanan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlahLayanan ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-archive fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4 py-4">
                    <div class="card border-left-primary shadow h-100 py-2 bg-danger">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">
                                        Admin</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $jumlah_user; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <?php include_once "../contents/footer.php" ?>
</body>

</html>