<?php
    $alamat_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $pecah_url = explode('/', $alamat_url);
    $halaman=$pecah_url[count($pecah_url)-1];
?>

<div class="sidebar">
    <div class="text-center">
        <div class="figure-menu shadow">
            <figure><img src="<?php echo BASE_URL; ?>assets/img/logo.png" alt=""></figure>
        </div>
        <h5 class="mb-1 ">SHOESIT</h5>
        <p class="text-mute small">Admin</p>
    </div>
    <br>
    <div class="row mx-0">
        <div class="col">
            <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
            <div class="list-group main-menu">
                <a href="<?php echo BASE_URL ?>admin/admin.php" class="list-group-item list-group-item-action <?= $halaman == 'admin.php' ? 'active' : '' ; ?>">Dashboard</a>
                <a href="<?php echo BASE_URL ?>order/order.php" class="list-group-item list-group-item-action <?= $halaman == 'order.php' ? 'active' : '' ; ?>">List Transaksi</a>
                <a href="<?php echo BASE_URL ?>layanan/admin_layanan.php" class="list-group-item list-group-item-action <?= $halaman == 'admin_layanan.php' ? 'active' : '' ; ?>">List Layanan</a>
                <a href="<?php echo BASE_URL ?>admin/admin_data.php" class="list-group-item list-group-item-action <?= $halaman == 'admin_data.php' ? 'active' : '' ; ?>">Admin</a>
                <a href="<?php echo BASE_URL ?>logout.php" class="list-group-item list-group-item-action mt-4 <?= $halaman == 'logout.php' ? 'active' : '' ; ?>">Logout</a>
            </div>
        </div>
    </div>
</div>