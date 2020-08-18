<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?php echo base_url(); ?>">Warung Hewan</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?php echo base_url(); ?>">WH</a>
		</div>
		<?php if ($this->session->userdata('role') === '1') {  ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
						<i class="fas fa-fire"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<li class="menu-header">Data Master</li>
				<li class="<?= $this->uri->segment(2) == 'customer' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/customer') ?>">
						<i class="fas fa-user"></i>
						<span>Data Customer</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'category' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/category') ?>">
						<i class="fas fa-list-alt"></i>
						<span>Data Kategori</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'satuan' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/satuan') ?>">
						<i class="fas fa-list-alt"></i>
						<span>Data Satuan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'produk' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/produk') ?>">
						<i class="fas fa-file"></i>
						<span>Data Produk</span>
					</a>
				</li>

				<li class="menu-header">Transaksi</li>
				<li class="<?= $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/transaksi') ?>">
						<i class="fas fa-user"></i>
						<span>Transaksi</span>
					</a>
				</li>

				<li class="menu-header">Laporan</li>
				<li class="<?= $this->uri->segment(2) == 'laporan' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/laporan') ?>">
						<i class="fas fa-user"></i>
						<span>Laporan</span>
					</a>
				</li>

				<li class="menu-header">Setting</li>
				<li class="<?= $this->uri->segment(2) == 'logout'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('logout') ?>">
						<i class="fas fa-sign-out-alt"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		<?php } elseif ($this->session->userdata('role') === '2') { ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('user/transaksi') ?>">
						<i class="fas fa-list"></i>
						<span>Pesanan Saya</span>
					</a>
				</li>
				<li class="menu-header">Setting</li>
				<li class="<?= $this->uri->segment(2) == 'logout'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('logout') ?>">
						<i class="fas fa-sign-out-alt"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		<?php } ?>
	</aside>
</div>