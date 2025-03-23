<!-- Main Sidebar Container -->
<?php $config = $this->Default_m->getWhere('tabel_config', ['id_config' => 1])->row(); ?>
<aside class="main-sidebar <?= $config->sidebar; ?> elevation-4">

	<!-- Brand Logo -->
	<a href="#" class="brand-link <?= $config->brandlogo; ?>">
		<img src="<?= base_url('assets/img/' . $config->logo); ?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
		<span class="brand-text <?= $config->brandcolor; ?>"><?= $config->brand; ?></span>
	</a>

	<?php $id_user = $this->session->userdata('id_user'); ?>
	<?php $data = $this->Default_m->getWhere('tabel_user', ['id_user' => $id_user])->row(); ?>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('assets/img/'); ?><?= !empty($data->foto) ? $data->foto : 'noprofil.png'; ?>" class="img-profil " alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= substr($data->nama_user, 0, 25); ?></a>
			</div>
		</div>

		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="navigasi" data-accordion="false">

				<!-- get user -->
				<?php
				$id_user = $this->session->userdata('id_user');
				$data = $this->Default_m->getWhere('tabel_user', ['id_user' => $id_user])->row();
				$id_profil = $data->id_profil;
				?>
				<!-- end get user -->

				<!-- get navigasi -->
				<?php
				$on = 'tabel_akses.id_navigasi = tabel_navigasi.id_navigasi';
				$where = ['tabel_akses.id_profil' => $id_profil];
				$navigasi = $this->Default_m->getWhereOrderTwoTableAsc('tabel_navigasi', 'tabel_akses', $on, $where, 'urutan')->result();
				?>
				<!-- end get navigasi -->

				<!-- get url -->
				<?php $url = $this->uri->segment(1); ?>
				<!-- end get url -->

				<?php $i = 1; ?>
				<?php foreach ($navigasi as $m) : ?>

					<?php if ($m->aktif == 'Yes') : ?>

						<?php if ($m->dropdown == 0) : ?>

							<?php $row = $this->Default_m->getWhere('tabel_navigasi', ['dropdown' => $m->id_navigasi])->num_rows(); ?>

							<?php if ($row == 0) : ?>

								<?php if ($m->heading) : ?>
									<li class="nav-header pt-2 text-primary"><?= $m->heading; ?></li>
								<?php endif ?>

								<li class="nav-item">
									<a href="<?= base_url($m->url); ?>" class="nav-link <?= $url == $m->url ? 'active' : ''; ?>">
										<i class="nav-icon <?= $m->icon; ?>"></i>
										<p><?= $m->navigasi; ?></p>
									</a>
								</li>

							<?php else : ?>

								<!-- get subnavigasi -->
								<?php
								$on = 'tabel_akses.id_navigasi = tabel_navigasi.id_navigasi';
								$where = ['tabel_akses.id_profil' => $id_profil, 'dropdown' => $m->id_navigasi];
								$down = $this->Default_m->getWhereOrderTwoTableAsc('tabel_navigasi', 'tabel_akses', $on, $where, 'urutan')->result();

								$cariUrl = $this->uri->segment(1);
								$num = $this->Default_m->getWhere('tabel_navigasi', ['dropdown' => $m->id_navigasi, 'url' => $cariUrl])->num_rows();
								?>

								<?php if ($m->heading) : ?>
									<li class="nav-header pt-2 text-primary"><?= $m->heading; ?></li>
								<?php endif ?>

								<li class="nav-item has-treeview">
									<a href="#" class="nav-link <?= $num > 0 ? 'active' : ''; ?>">
										<i class="nav-icon <?= $m->icon; ?>"></i>
										<p><?= $m->navigasi; ?><i class="fas fa-angle-left right"></i></p>
									</a>
									<ul class="nav nav-treeview">
										<?php foreach ($down as $s) : ?>
											<?php if ($s->aktif == 'Yes') : ?>
												<li class="nav-item">
													<a href="<?= base_url($s->url); ?>" class="nav-link <?= $url == $s->url ? 'active' : ''; ?>">
														<i class="<?= $s->icon; ?> nav-icon"></i>
														<p><?= $s->navigasi; ?></p>
													</a>
												</li>
											<?php endif; ?>
										<?php endforeach; ?>

									</ul>
								</li>

							<?php endif; ?>

						<?php endif; ?>

					<?php endif; ?>

					<?php $i++; ?>

				<?php endforeach; ?>

			</ul>
		</nav>

	</div>
	<!-- /.sidebar -->
</aside>