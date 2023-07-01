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
        <p class="text-mute small">ADMIN PANEL</p>
    </div>
    <br>
    <div class="row mx-0">
        <div class="col">
            <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
            <div class="list-group main-menu">
                <a href="<?php echo BASE_URL ?>home.php" class="list-group-item list-group-item-action <?= $halaman == 'home.php' ? 'active' : '' ; ?>">Home</a>
                <a href="<?php echo BASE_URL ?>products.php" class="list-group-item list-group-item-action <?= $halaman == 'products.php' ? 'active' : '' ; ?>">All Products</a>
                <a href="<?php echo BASE_URL ?>aboutus.php" class="list-group-item list-group-item-action <?= $halaman == 'aboutus.php' ? 'active' : '' ; ?>">About Us</a>
                <a href="contactus.php" class="list-group-item list-group-item-action <?= $halaman == 'contactus.php' ? 'active' : '' ; ?>">Contact Us</a>
                <a href="<?php echo BASE_URL ?>login.php" class="list-group-item list-group-item-action mt-4 <?= $halaman == 'login.php' ? 'active' : '' ; ?>">Login Admin</a>
            </div>
        </div>
    </div>
</div>