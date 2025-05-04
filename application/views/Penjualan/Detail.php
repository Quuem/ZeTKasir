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
					Detail Penjualan
				</h2>
			</div>
		</div>
	</div>
</div>
<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">


			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title"><?= $Penjualan->NamaPelanggan ?></h3>
						<table class="table table-sm table-borderless">
							<thead>
								<tr>
									<th>Tanggal Penjualan</th>
									<th class="text-end">Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<?= $Penjualan->TanggalPenjualan ?>
									</td>
									<td class="w-1 fw-bold text-end"><?= $Penjualan->Status ?></td>
								</tr>
							</tbody>
						</table>
						<br class="mb-2">
						<form method="post"
							action="<?= base_url('Penjualan/CreateDetail/' . $Penjualan->PenjualanID) ?>">
							<div class="body">
								<div class="mb-3">
									<label class="form-label">Produk</label>
									<select name="ProdukID" class="form-control">
										<?php foreach ($Produk as $row) { ?>
											<option value="<?= $row->ProdukID ?>">
												<?= 'Produk : ' . $row->NamaProduk . ' | Jumlah : ' . $row->Stok . ' | Harga : Rp. ' . number_format($row->Harga) ?>
											</option>
										<?php }
										; ?>
									</select>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label">Jumlah</label>
											<input type="number" min="1" name="Jumlah" required
												placeholder="Jumlah Produk" class="form-control">
										</div>
									</div>
									<div class="col-lg-6">
										<label class="form-label">Tambah</label>
										<button class="btn btn-info">Tambah</button>
									</div>
								</div>
							</div>
						</form>
						<br>
						<div class="col-lg-6">
							<div class="mb-3">
								<label class="form-label">Total Harga</label>
								<input type="number" value="<?= $SubTotal->SubTotal ?>" readonly class="form-control">
							</div>
						</div>

						<?php if ($Detail) { ?>
							<div class="col-lg-6">
								<!-- <label class="form-label">Pembayaran</label> -->
								<button data-bs-target="#ModalBayar" data-bs-toggle="modal"
									class="btn btn-success">Bayar</button>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>


			<div class="modal modal-blur fade" id="ModalBayar" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Pembayaran</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="<?= base_url('Penjualan/Bayar/' . $Penjualan->PenjualanID) ?>" method="post"
							autocomplete="off">
							<div class="modal-body">
								<div class="mb-3">
									<label class="form-label">Total Harga</label>
									<input type="text" class="form-control" name="TotalHarga" readonly
										value="<?= $SubTotal->SubTotal ?>">
								</div>
								<div class="mb-3">
									<label class="form-label">Pembayaran</label>
									<input type="number" class="form-control" name="TotalPembayaran" required
										placeholder="Pembayaran" min="<?= $SubTotal->SubTotal ?>"
										value="<?= set_value('TotalPembayaran') ?>">
								</div>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal">
									Cancel
								</a>
								<button class="btn btn-primary btn-5 ms-auto" type="submit">
									<!-- Download SVG icon from http://tabler.io/icons/icon/plus -->
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
										fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
										stroke-linejoin="round" class="icon icon-2">
										<path d="M12 5l0 14" />
										<path d="M5 12l14 0" />
									</svg>
									Bayar
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>


			<div class="col-lg-8">
				<div class="card">
					<div class="table-responsive">
						<table class="table table-vcenter card-table">
							<thead>
								<tr>

									<th class="text-center">No</th>
									<th class="text-center">Nama Produk</th>
									<th class="text-center">Jumlah</th>
									<th class="text-center">Harga</th>
									<th class="text-center">Subtotal</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($Detail as $row) { ?>
									<tr>
										<td class="text-muted text-center"><?= $i ?></td>
										<td class="text-center"><?= $row->NamaProduk ?></td>
										<td class="text-secondary text-center ">
											<?= $row->JumlahProduk ?>
										</td>
										<td class="text-secondary text-center">
											Rp. <?= number_format($row->Harga) ?>
										</td>
										<td class="text-secondary text-center">
											Rp. <?= number_format($row->SubTotal) ?>
										</td>
										<td class="text-center ">
											<a href="<?= base_url('Penjualan/DeleteDetail/' . $row->DetailID) ?>"
												onclick="return confirm('Apakah Anda Ingin Mengapus Produk Dari List ?')"
												class="text-danger">Hapus</a>
										</td>
									</tr>
									<?php
									++$i;
								}
								; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>