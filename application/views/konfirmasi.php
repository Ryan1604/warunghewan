<!DOCTYPE html>
<html lang="en">

<head>
    <title>Warung Hewan</title>
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
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/style.css">
</head>

<body class="goto-here">
    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-12 order-md-last d-flex">
                    <div class="bg-white p-5 contact-form">
                        <div class="container">
                            <div class="row justify-content-center mb-3 pb-3">
                                <div class="col-md-12 heading-section text-center ftco-animate">
                                    <h3 class="mb-5">Konfirmasi Pembayaran</h3>
                                    <p class="text-left">Terimakasih sudah berbelanja di <b>Warung Hewan</b></p>
                                    <p class="text-left" style="margin-top: -20px;">Pesanan Anda dengan kode transaksi <b><?= $admin[0]->no_invoice ?></b> telah kami terima</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <p>Jumlah Bayar</p>
                                            <p>Rp. <?= rupiah($admin[0]->total) ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>Berita Transfer</p>
                                            <p><b><?= $admin[0]->no_invoice ?></b></p>
                                        </div>
                                    </div>
                                    <p class="text-left">Setiap pembayaran harus menyertakan Berita Transfer. Jika Anda melakukan pembayaran dengan Mesin ATM <b>harus menulis Berita transfer di Struk bukti transfer</b>. </p>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="<?= base_url('assets/frontend/images/ovo.png') ?>" alt="Ovo" width="150">
                                            <p class="mt-2">085290222345</p>
                                        </div>
                                        <div class="col-md-2 mr-2">
                                            <img src="<?= base_url('assets/frontend/images/gopay.jpg') ?>" alt="Ovo" width="150">
                                            <p class="mt-2">085290222345</p>
                                        </div>
                                        <div class="col-md-2 mt-3 mr-3">
                                            <img src="<?= base_url('assets/frontend/images/bri.png') ?>" alt="Ovo" width="150">
                                            <p class="mt-3">607601011458532</p>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <img src="<?= base_url('assets/frontend/images/bca.png') ?>" alt="Ovo" width="150">
                                            <p class="mt-3">1320252691</p>
                                        </div>
                                        <div class="col-md-2 mt-2 mr-2">
                                            <img src="<?= base_url('assets/frontend/images/dana.png') ?>" alt="Ovo" width="60">
                                            <p class="mt-3">085290222345</p>
                                        </div>
                                    </div>
                                    <p class="mt-4"><a href="https://wa.me/6285290222345?text=Hi Admin...%0a
                                    Saya ingin mengkonfirmasi pesanan saya...%0a
                                    No. Invoice : <?= $admin[0]->no_invoice ?> %0a
                                    Nama : <?= $admin[0]->name ?> %0a
                                    Total : Rp. <?= rupiah($admin[0]->total) ?> %0a
                                    Alamat : %0a
                                    Terimakasih... 
                                    " class="btn btn-primary py-3 px-4">Konfirmasi</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

</body>

</html>