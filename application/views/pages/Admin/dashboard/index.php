<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-primary">
							<i class="fas fa-users"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Jumlah Customer</h4>
							</div>
							<div class="card-body">
								<?= $cust ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-danger">
							<i class="fas fa-list"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Jumlah Produk</h4>
							</div>
							<div class="card-body">
								<?= $produk ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-warning">
							<i class="fas fa-shopping-cart"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Jumlah Transaksi</h4>
							</div>
							<div class="card-body">
								<?= $admin ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>