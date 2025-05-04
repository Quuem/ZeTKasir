<!-- Page header -->
<div class="page-header d-print-none">
	<div class="container-xl">

		<?php if ($this->session->flashdata('success')) { ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<div class="d-flex">
					<div>
						<!-- Download SVG icon from http://tabler.io/icons/icon/check -->
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="icon alert-icon icon-2">
							<path d="M5 12l5 5l10 -10" />
						</svg>
					</div>
					<div>
						<?= $this->session->flashdata('success');
						?>
					</div>
				</div>
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
			</div>
		<?php } ?>

		<?php if ($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="d-flex">
					<div>
						<!-- Download SVG icon from http://tabler.io/icons/icon/alert-circle -->
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="icon alert-icon icon-2">
							<path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
							<path d="M12 8v4" />
							<path d="M12 16h.01" />
						</svg>
					</div>
					<div>
						<?= $this->session->flashdata('error'); ?>
					</div>
				</div>
				<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
			</div>
		<?php } ?>

		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					Overview
				</div>
				<h2 class="page-title">
					Pelanggan
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					<a href="#" class="btn btn-primary btn-5 d-none d-sm-inline-block" data-bs-toggle="modal"
						data-bs-target="#ModalCreate">
						<!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="icon icon-2">
							<path d="M12 5l0 14" />
							<path d="M5 12l14 0" />
						</svg>
						Create New Pelanggan
					</a>
					<a href="#" class="btn btn-primary btn-6 d-sm-none btn-icon" data-bs-toggle="modal"
						data-bs-target="#ModalCreate" aria-label="Create new report">
						<!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="icon icon-2">
							<path d="M12 5l0 14" />
							<path d="M5 12l14 0" />
						</svg>
					</a>
				</div>


				<div class="modal modal-blur fade" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Create Pelanggan</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<form action="<?= base_url('Pelanggan/Create') ?>" method="post" autocomplete="off">
								<div class="modal-body">
									<div class="mb-3">
										<label class="form-label">Nama Pelanggan</label>
										<input type="text" class="form-control" name="NamaPelanggan"
											value="<?= set_value('NamaPelanggan') ?>" placeholder="Nama Pelanggan">
										<?= form_error('NamaPelanggan', '<small class="text-danger">', '</small>') ?>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="mb-3">
												<label class="form-label">Alamat Pelanggan</label>
												<input type="text" class="form-control" name="Alamat"
													placeholder="Alamat Pelanggan" value="<?= set_value('Alamat') ?>">
												<?= form_error('Alamat', '<small class="text-danger">', '</small>') ?>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="mb-3">
												<label class="form-label">Nomor Telepon</label>
												<input type="tel" placeholder="Nomor Telepon" name="NomorTelepon"
													value="<?= set_value('NomorTelepon') ?>" class="form-control">
												<?= form_error('NomorTelepon', '<small class="text-danger">', '</small>') ?>

											</div>
										</div>

									</div>
								</div>
								<div class="modal-footer ">
									<a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal">
										Cancel
									</a>
									<button class="btn btn-primary" type="submit">
										<!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
											stroke-linecap="round" stroke-linejoin="round" class="icon icon-2">
											<path d="M12 5l0 14" />
											<path d="M5 12l14 0" />
										</svg>
										Create New Pelanggan
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			<div class="col-12">
				<div id="table-default" class="table-responsive">
					<div class="mb-3 w-25">
						<input class="search form-control" placeholder="Search..." />
					</div>
					<div class="card">
						<table class="table table-vcenter card-table table-striped">
							<thead>
								<tr class="text-center">
									<th class="w-1">No</th>
									<th>Nama Pelanggan</th>
									<th>Alamat</th>
									<th>Nomor Telepon</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody class="table-tbody">
								<?php
								$i = 1;
								foreach ($Pelanggan as $Row) {
									?>
									<tr class="text-center">
										<td class="text-muted"><?= $i ?></td>
										<td class="Nama-Pelanggan"><?= $Row->NamaPelanggan ?></td>
										<td class="text-secondary Alamat-Pelanggan">
											<?= $Row->Alamat ?>
										</td>
										<td class="text-secondary Nomor-Telepon">
											<?= $Row->NomorTelepon ?>
										</td>
										<td>
											<a href="#" data-bs-target="#Modal<?= $Row->PelangganID ?>"
												data-bs-toggle="modal">Edit</a>
											<a href="<?= base_url('Pelanggan/Delete/' . $Row->PelangganID) ?>"
												class="text-danger"
												onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Pelanggan')">Hapus</a>
										</td>
									</tr>



									<div class="modal modal-blur fade" id="Modal<?= $Row->PelangganID ?>" tabindex="-1"
										role="dialog" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Edit Pelanggan</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<form action="<?= base_url('Pelanggan/Edit/' . $Row->PelangganID) ?>"
													method="post" autocomplete="off">
													<div class="modal-body">
														<div class="mb-3">
															<label class="form-label">Nama Pelanggan</label>
															<input type="text" class="form-control" name="NamaPelanggan"
																value="<?= $Row->NamaPelanggan ?>"
																placeholder="Nama Pelanggan">
															<?= form_error('NamaPelanggan', '<small class="text-danger">', '</small>') ?>
														</div>
														<div class="row">
															<div class="col-lg-6">
																<div class="mb-3">
																	<label class="form-label">Alamat Pelanggan</label>
																	<input type="text" class="form-control" name="Alamat"
																		placeholder="Alamat Pelanggan"
																		value="<?= $Row->Alamat ?>">
																	<?= form_error('Alamat', '<small class="text-danger">', '</small>') ?>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="mb-3">
																	<label class="form-label">Nomor Telepon</label>
																	<input type="tel" placeholder="Nomor Telepon"
																		name="NomorTelepon"
																		value="<?= $Row->NomorTelepon ?>"
																		class="form-control">
																	<?= form_error('NomorTelepon', '<small class="text-danger">', '</small>') ?>

																</div>
															</div>

														</div>
													</div>
													<div class="modal-footer ">
														<a href="#" class="btn btn-link link-secondary btn-3"
															data-bs-dismiss="modal">
															Cancel
														</a>
														<button class="btn btn-primary" type="submit">
															<!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
																viewBox="0 0 24 24" fill="none" stroke="currentColor"
																stroke-width="2" stroke-linecap="round"
																stroke-linejoin="round" class="icon icon-2">
																<path d="M12 5l0 14" />
																<path d="M5 12l14 0" />
															</svg>
															Edit Pelanggan
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<?php
									++$i;
								}
								?>
							</tbody>
						</table>
						<ul class="pagination"></ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>