<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="<?= base_url('assets/frontend/') ?>images/logosaya.jpg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="<?= base_url('register') ?>">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="name">Full Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="<?= set_value('name') ?>" autofocus>
                                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password1" class="d-block">Password</label>
                                        <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        <a href="<?= base_url('login') ?>">Lupa Password?</a><br>
                        Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk disini</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/js'); ?>