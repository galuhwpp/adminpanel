<?php
    include_once "../function.php"; 
    include_once "../contents/headscript.php"; 
    include_once "../contents/navbar.php"; 
    ?>

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
   
    <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <br>
                    <img src="../assets/img/thankyou-payment.png" alt="" class="mt-5 mw-100">
                    <h1 class="my-4">Terima Kasih!</h1>
                    <h5>Telah melakukan pemesanan</h5>
                    <p class="text-secondary">pesanan anda akan segera diproses<br>dan diantarkan ke alamat anda.</p>
                    <br>
                </div>
            </div>
        </div>

    <div class="footer">
        <div class="no-gutters">
            <div class="col-auto mx-auto">
                <div class="row no-gutters justify-content-center">
                    <div class="col-auto">
                        <a href="form_order.php" class="btn btn-default shadow centerbutton">
                            <i class="material-icons">local_mall</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?php include_once "../contents/footer.php"; ?>
