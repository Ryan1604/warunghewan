<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Customer</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Customer</div>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="example">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>Nama</th>
											<th>Email</th>
											<th>Password</th>
											<th>Foto</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($admin as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->name ?></td>
												<td><?= $data->email ?></td>
												<td>*****</td>
												<td><img src="<?= base_url('assets/img/avatar/') . $data->img ?>" alt="<?= $data->name ?>" width="50"></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>