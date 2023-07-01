<?php
    include_once('function.php');
	include_once('contents/headscript.php');
?>

<a href="home.php" class="btn btn-lg btn-default button-rounded-54 shadow text-white float-bottom-right"><i class="material-icons">arrow_forward</i></a>
    <!-- Swiper -->
    <div class="swiper-container introduction vh-100">
        <div class="swiper-wrapper">
            <div class="swiper-slide overflow-hidden bg-orange text-dark">
                <div class="row no-gutters h-100">
                    <!-- <img src="assets/img/sekolah.png" style="position:absolute;width: 100%;"> -->
                    <div class="col px-3 pt-5">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <h1 class="text-uppercase">SHOESIT <br> Panel Admin</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide overflow-hidden bg-success text-orange">
                <div class="row no-gutters h-100">
                    <!-- <img src="assets/img/index.png" alt="" class="pinapple right-image align-self-center"> -->
                    <div class="col align-self-center px-3">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <h1 class="text-uppercase">Berfokus kepada pelayanan pelanggan yang mengutamakan kualitas.</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>


<?php
	include_once('contents/footer.php');
?>

<script>
        $(window).on('load', function() {
            var swiper = new Swiper('.introduction', {
                autoplay: {
                    delay: 2000,
                },
                pagination: {
                    el: '.swiper-pagination',
                },
            });

            /* notification view and hide */
            setTimeout(function() {
                $('.notification').addClass('active');
                 setTimeout(function() {
                     $('.notification').removeClass('active');
                 }, 3500);
            }, 500);
            $('.closenotification').on('click', function(){
                $(this).closest('.notification').removeClass('active')
            });
        });

    </script>