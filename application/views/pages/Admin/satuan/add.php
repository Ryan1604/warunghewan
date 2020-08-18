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
                    <form method="post" class="needs-validation" action="<?php echo site_url('admin/satuan/store') ?>" novalidate="">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Satuan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Nama Satuan <sup class="text-danger">*</sup></label>
                                            <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                                            <div class="invalid-feedback">
                                                Masukkan nama satuan terlebih dahulu
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