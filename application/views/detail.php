<!DOCTYPE html>
<html lang="en">

<head>
    <title>Warung Hewan - <?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/animate.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/aos.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/iziToast.min.css">
</head>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md-4 pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+62852 9022 2345</span>
                        </div>
                        <div class="col-md-4 pr-4 d-flex topper align-items-center">
                            <div class=" icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-facebook"></span></div>
                            <span class="text">Hesanu Hesanu</span>
                        </div>
                        <?php if ($this->session->userdata('logged_in') == FALSE) { ?>
                            <div class="col-md-4 pr-4 d-flex topper align-items-center">
                                <div class="col-md-8 topper" style="text-align:right">
                                    <a href="<?= base_url('login') ?>" class="text">Login</a>
                                </div>
                                <div class="col-md-4 topper" style="margin-right: 20px">
                                    <a href="#" class=" text">Register</a>
                                </div>
                            </div>
                            <?php } else {
                            if (($this->session->userdata('role') == 1)) { ?>
                                <div class="col-md-4 pr-4 d-flex topper align-items-center">
                                    <div class="col-md-8 topper" style="text-align:right">
                                        <a href="<?= base_url('login') ?>" class="text">Login</a>
                                    </div>
                                    <div class="col-md-4 topper" style="margin-right: 20px">
                                        <a href="#" class=" text">Register</a>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">Warung Hewan</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item cta cta-colored"><a href="<?= base_url('cart') ?>" id="cart_count" class="nav-link"><span class="icon-shopping_cart"></span>[<?= $count ?>]</a></li>
                    <?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('role') === '2') { ?>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img alt="image" src="<?php echo base_url('assets/img/avatar/') . $admin['img'] ?>" class="rounded-circle justify-content-center align-items-center" width="25"> <?= $this->session->userdata('name') ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="<?= base_url('user/transaksi') ?>">Dashboard</a>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="ftco-section">
        <div class="container">
            <?php
            foreach ($produk as $data) :
            ?>
                <div class="row">
                    <div class="col-lg-6 mb-5 ftco-animate">
                        <a href="<?= base_url('assets/img/produk/') . $data->img ?>" class="image-popup"><img src="<?= base_url('assets/img/produk/') . $data->img ?>" class="img-fluid" alt="Colorlib Template"></a>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h3><?= $data->nama_produk ?></h3>
                        <div class="rating d-flex">
                            <p class="text-left mr-4">
                                <span class="mr-2"><?= $data->name_category ?></span>
                            </p>
                            <p class="text-left mr-4">
                                <span class="mr-2">Min. Order <?= $data->min_order . ' ' . $data->nama_satuan ?></span>
                            </p>
                        </div>
                        <p class="price"><span>Rp. <?= rupiah($data->harga) ?></span></p>
                        <p class="text-justify"><?= $data->desc ?>
                        </p>
                        <div class="row mt-4">
                        </div>
                        <p><a href="javascript:void(0)" id="add_cart" data-id="<?= $data->id_produk ?>" class="btn btn-black py-3 px-5">Add to Cart</a></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="ftco-section">
        <?php
        if (count($produk_lainya) > 0) { ?>
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Produk lainnya</h2>
                        <p>Ini adalah produk pilihan dari kami</p>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <p>Tidak ada Produk yang berhubungan dengan Produk ini</p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <?php
                foreach ($produk_lainya as $data) : ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="<?= base_url('produk/') . $data->id_produk ?>" class="img-prod"><img class="img-fluid" src="<?= base_url('assets/img/produk/') . $data->img ?>" alt="Colorlib Template">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="<?= base_url('produk/') . $data->id_produk ?>"><?= $data->nama_produk ?></a></h3>
                                <span class="subheading">Min. Order <?= $data->min_order . ' ' . $data->nama_satuan ?></span>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span>Rp. <?= rupiah($data->harga) ?></span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="<?= base_url('produk/') . $data->id_produk ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-search"></i></span>
                                        </a>
                                        <a href="javascript:void(0)" class="buy-now d-flex justify-content-center align-items-center mx-1" id="add_cart" data-id="<?= $data->id_produk ?>">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Warung Hewan</h2>
                        <p>Ini adalah Deskripsi Toko</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Kontak</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li style="margin-bottom: 15px;"><span class="icon icon-map-marker"></span><span class="text">Desa Demangharjo RT/RW 05/04, Kec. Warureja, Kab. Tegal</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62852 9022 2345</span></a></li>
                                <li><a href="#"><span class="icon icon-facebook"></span><span class="text">Hesanu Hesanu</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Metode Pembayaran</h2>
                        <div class="block-23 mb-6">
                            <ul>
                                <li><span class="text">Dana : 085290222345</span></li>
                                <li><span class="text">OVO : 085290222345</span></a></li>
                                <li><span class="text">Gopay : 085290222345</span></a></li>
                                <li><span class="text">BRI : 607601011458532</span></a></li>
                                <li><span class="text">BCA : 1320252691</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Warung Hewan.
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


    <script src="<?= base_url('assets/frontend/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.stellar.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/aos.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.animateNumber.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/bootstrap-datepicker.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/scrollax.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/main.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>js/iziToast.min.js"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '#add_cart', function() {
                let id = $(this).data('id');
                $.get('<?= base_url('add_cart/') ?>' + id, function(data) {
                    let j = JSON.parse(data);
                    if (j.status == 'gagal') {
                        iziToast.warning({
                            message: 'Produk ini sudah ditambahkan ke cart',
                            position: 'topRight',
                        });
                    }
                    if (j.status == 'sukses') {
                        iziToast.success({
                            message: 'Berhasil ditambahkan ke cart',
                            position: 'topRight',
                        });

                        $('#cart_count').html('<span class="icon-shopping_cart"></span>[' + j.data + ']');
                    }

                    if (j.status == 'belum') {
                        iziToast.warning({
                            message: 'Silahkan login terlebih dahulu',
                            position: 'topRight',
                        });
                    }

                    if (j.status == 'beda') {
                        iziToast.warning({
                            message: 'Silahkan login sebagai customer',
                            position: 'topRight',
                        });
                    }
                });
            })
        });
    </script>

</body>

</html>