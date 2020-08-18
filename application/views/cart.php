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
                            if (($this->session->userdata('role') == '1')) { ?>
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

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Quantity</th>
                                    <th>SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cart as $data) : ?>
                                    <tr class="text-center">
                                        <input type="hidden" class="id_cart" value="<?= $data->id_cart ?>">
                                        <input type="hidden" class="id_produk" value="<?= $data->id_produk ?>">
                                        <td class="product-remove"><a href="javascript:void(0)" id="delete_cart" data-id="<?= $data->id_produk ?>"><span class="ion-ios-close"></span></a></td>

                                        <td class="image-prod">
                                            <div class="img" style="background-image:url('<?= base_url('assets/img/produk/') . $data->img ?>')"></div>
                                        </td>

                                        <td class=" product-name">
                                            <h3><?= $data->nama_produk ?></h3>
                                        </td>

                                        <td class="price">Rp. <?= rupiah($data->harga) . '/' . $data->nama_satuan ?></td>

                                        <td class="quantity">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a class="btn btn-link px-4 py-3" style="box-shadow:0px 0.5px 2px #111;" id="minus" data-min="<?= $data->min_order ?>" data-harga="<?= $data->harga ?>">-</a>
                                                </div>
                                                <div class="col-md-4 mt-3">
                                                    <small></small>
                                                    <span id="qty" class="qty" data-qty="<?= $data->qty ?>"><?= $data->qty ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <a class="btn btn-link py-3 px-4" style="box-shadow:0px 0.5px 2px #111;" id="plus" data-harga="<?= $data->harga ?>">+</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="total" data-subtotal="<?= $data->subtotal ?>">Rp. <?= rupiah($data->subtotal) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <p class="text-right"><a href="javascript:void(0)" id="update_cart" data-id="[]" class="btn btn-primary py-3 px-4">Edit Keranjang</a></p>
            <div class="row justify-content-start">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Total Bayar</h3>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="final_total">Rp. <?= rupiah($total[0]->total) ?></span>
                        </p>
                    </div>
                    <p><a href="javascript:void(0)" id="checkout" class="btn btn-primary py-3 px-4" data-id="[]" data-total="<?= $total[0]->total ?>">Bayar</a></p>
                </div>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function number_format(number, decimals, dec_point, thousands_sep) {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        $(document).ready(function() {

            let id_produk = [];
            $('.id_produk').each(function() {
                id_produk.push($(this).val());
            })
            var join = id_produk.join(',');
            if (join.length > 0) {
                $('#update_cart').removeClass('disabled');
                $('#checkout').removeClass('disabled');
            } else {
                $('#update_cart').addClass('disabled');
                $('#checkout').addClass('disabled');
            }

            $('body').on('click', '#minus', function() {
                let min = $(this).data('min');
                let harga = $(this).data('harga');
                let qty = parseInt($(this).parents('.quantity').find('#qty').html());
                let newqty = qty;
                let subtotal = 0;

                if (qty > min) {
                    newqty--;
                    subtotal = harga * newqty;
                } else {
                    return false;
                }


                $(this).parents('.quantity').find('#qty').html(newqty);
                $(this).parents('tr').find('.total').html('Rp. ' + number_format(subtotal, 0, ',', '.'));
                $(this).parents('tr').find('.total').attr('data-subtotal', subtotal);
                $(this).parents('.quantity').find('#qty').attr('data-qty', newqty);

            });

            $('body').on('click', '#plus', function() {
                let harga = $(this).data('harga');
                let qty = parseInt($(this).parents('.quantity').find('#qty').html());
                let newqty = qty;
                let subtotal = 0;

                newqty++;
                subtotal = harga * newqty;

                $(this).parents('.quantity').find('#qty').html(newqty);
                $(this).parents('tr').find('.total').html('Rp. ' + number_format(subtotal, 0, ',', '.'));
                $(this).parents('tr').find('.total').attr('data-subtotal', subtotal);
                $(this).parents('.quantity').find('#qty').attr('data-qty', newqty);

            });


            $('body').on('click', '#delete_cart', function() {
                swal({
                        title: "Apakah anda yakin ingin menghapus dari cart?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            let id = $(this).data('id');
                            $.get('<?= base_url('delete_cart/') ?>' + id, function(data) {
                                let j = JSON.parse(data);
                                if (j.status == 'sukses') {
                                    swal("Produk berhasil dihapus dari cart", {
                                        icon: "success",
                                    });

                                    $('#delete_cart').parents('tr').remove();

                                    $('#cart_count').html('<span class="icon-shopping_cart"></span>[' + j.data + ']');

                                    let id_produk = [];
                                    $('.id_produk').each(function() {
                                        id_produk.push($(this).val());
                                    })
                                    var join = id_produk.join(',');
                                    if (join.length > 0) {
                                        $('#update_cart').removeClass('disabled');
                                        $('#checkout').removeClass('disabled');
                                    } else {
                                        $('#update_cart').addClass('disabled');
                                        $('#checkout').addClass('disabled');
                                    }
                                }
                            })
                        } else {
                            swal("Produk ini tidak terhapus dari cart");
                        }
                    });
            })

            $('body').on('click', '#update_cart', function() {
                swal({
                        title: "Apakah anda yakin ingin mengedit cart?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            let id_cart = [];
                            $('.id_cart').each(function() {
                                id_cart.push($(this).val());
                            })
                            var join = id_cart.join(',');

                            let subtotal = [];
                            $('.total').each(function() {
                                subtotal.push($(this).attr('data-subtotal'));
                            })
                            var join2 = subtotal.join(',');

                            let qty = [];
                            $('.qty').each(function() {
                                qty.push($(this).attr('data-qty'));
                            })
                            var join3 = qty.join(',');

                            $.ajax({
                                type: "POST",
                                url: '<?= base_url('update_cart') ?>',
                                data: {
                                    id_cart: join,
                                    subtotal: join2,
                                    qty: join3
                                },
                                success: function(data) {
                                    let j = JSON.parse(data);
                                    if (j.status == 'sukses') {
                                        swal("Cart berhasil di update", {
                                            icon: "success",
                                        });
                                    }
                                    $('#final_total').html('Rp. ' + number_format(j.total[0].total, 0, ',', '.'));
                                }
                            });
                        } else {
                            swal("Anda membatalkan update cart");
                        }
                    });
            })

            $('body').on('click', '#checkout', function() {
                let total = $(this).attr('data-total');
                let id_produk = [];
                $('.id_produk').each(function() {
                    id_produk.push($(this).val());
                })
                var join = id_produk.join(',');

                let subtotal = [];
                $('.total').each(function() {
                    subtotal.push($(this).attr('data-subtotal'));
                })
                var join2 = subtotal.join(',');

                let qty = [];
                $('.qty').each(function() {
                    qty.push($(this).attr('data-qty'));
                })
                var join3 = qty.join(',');
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('checkout') ?>',
                    data: {
                        id_produk: join,
                        subtotal: join2,
                        qty: join3,
                        total: total
                    },
                    success: function(data) {
                        let j = JSON.parse(data);
                        console.log(j);
                        if (j.status == 'sukses') {
                            window.location.href = "<?= 'konfirmasi' ?>";
                        }
                    }
                });
            })
        });
    </script>

</body>

</html>