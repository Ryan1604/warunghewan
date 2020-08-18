<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Data</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <form method="post" class="needs-validation" action="<?php echo site_url('admin/produk/store') ?>" novalidate="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Produk</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Nama <sup class="text-danger">*</sup></label>
                                            <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                                            <div class="invalid-feedback">
                                                Masukkan nama produk terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control selectric" id="category" name="category">
                                                <option disabled selected>-- Pilih Kategori --</option>
                                                <?php
                                                foreach ($category as $data) : ?>
                                                    <option value="<?= $data->id_category ?>"><?= $data->name_category ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select class="form-control selectric" id="satuan" name="satuan">
                                                <option disabled selected>-- Pilih Satuan --</option>
                                                <?php
                                                foreach ($satuan as $data) : ?>
                                                    <option value="<?= $data->id_satuan ?>"><?= $data->nama_satuan ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input id="harga" type="number" name="harga" tabindex="1" class="form-control currency" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="min">Min.Order <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <input id="min" type="number" name="min" tabindex="1" class="form-control currency" required>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="satuanText">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Deskripsi <sup class="text-danger">*</sup></label>
                                            <textarea name="desc" id="desc" class="form-control" required></textarea>
                                            <div class="invalid-feedback">
                                                Masukkan deskripsi terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="img">Foto Produk <sup class="text-danger">*</sup></label>
                                            <input id="img" type="file" class="form-control" name="img" tabindex="1" required>
                                            <div class="invalid-feedback">
                                                Masukkan foto produk terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Add Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>