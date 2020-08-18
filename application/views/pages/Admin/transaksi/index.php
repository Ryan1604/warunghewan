<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Transaksi</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Transaksi</div>
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
											<th>No Invoice</th>
											<th>Status</th>
											<th>Total</th>
											<th>Tanggal</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($admin as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->no_invoice ?></td>
												<td><?php if ($data->status == 0) { ?>
														<div class="badges">
															<span class="badge badge-danger">Transaksi Gagal</span>
														</div>
													<?php } elseif ($data->status == 1) { ?>
														<div class="badges">
															<span class="badge badge-info">Menunggu Pembayaran</span>
														</div>
													<?php } elseif ($data->status == 2) { ?>
														<div class="badges">
															<span class="badge badge-success">Transaksi Sukses</span>
														</div>
													<?php } ?>
												</td>
												<td>Rp. <?= rupiah($data->total) ?></td>
												<td><?= $data->tanggal ?></td>
												<td>
													<?php if ($data->status != 2 and $data->status != 0) { ?>
														<a href="<?php echo base_url('admin/transaksi/gagal/') . $data->id_transaksi ?>" class="btn btn-danger" title=""><i class="fa fa-times"></i> </a>
													<?php }  ?>

													<a href="<?php echo base_url('admin/transaksi/detail/') . $data->id_transaksi ?>" class="btn btn-info" title="Detail"><i class="fa fa-eye"></i> </a>
													<?php if ($data->status != 2 and $data->status != 0) { ?>
														<a href="<?php echo base_url('admin/transaksi/confirm/') . $data->id_transaksi ?>" class="btn btn-success" title="Konfirmasi"><i class="fa fa-check"></i> </a>
													<?php }  ?>
												</td>
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