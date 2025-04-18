			<!-- Page header -->
			<div class="page-header d-print-none">
				<div class="container-xl">
					<div class="row g-2 align-items-center">
						<div class="col">
							<h2 class="page-title">
								Invoice
							</h2>
						</div>
						<!-- Page title actions -->
						<div class="col-auto ms-auto d-print-none">
							<button type="button" class="btn btn-primary" onclick="javascript:window.print();">
								<!-- Download SVG icon from http://tabler.io/icons/icon/printer -->
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round" class="icon icon-1">
									<path
										d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
									<path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
									<path
										d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
								</svg>
								Print Invoice
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Page body -->
			<div class="page-body">
				<div class="container-xl">
					<div class="card card-lg">
						<div class="card-body">
							<div class="row">
								<div class="col-6">
									<p class="h3">ZeT Kasir</p>
									<address>
										ZeTKasir@gamil.com
									</address>
								</div>
								<div class="col-6 text-end">
									<p class="h3"><?= $Penjualan->NamaPelanggan ? $Penjualan->NamaPelanggan : 'Pelanggan' ?></p>
									<address>
										<?= $Penjualan->Alamat ? $Penjualan->Alamat : 'Alamat Pelanggan' ?><br>
										<?= $Penjualan->NomorTelepon ? $Penjualan->NomorTelepon : 'Nomor Telepon' ?>
									</address>
								</div>
								<div class="col-12 my-5">
									<h1>Penjualan Tanggal : <?= $Penjualan->TanggalPenjualan ?></h1>
								</div>
							</div>
							<table class="table table-transparent table-responsive">
								<thead>
									<tr>
										<th class="text-center" style="width: 10%"></th>
										<th>Produk</th>
										<th class="text-center" style="width: 15%">Jumlah</th>
										<th class="text-end" style="width: 15%">Harga Produk</th>
										<th class="text-end" style="width: 15%">SubTotal</th>
									</tr>
								</thead>

                                <?php $i = 1; foreach($Detail as $Row){ ?>
								<tr>
									<td class="text-center"><?= $i ?></td>
									<td>
										<p class="strong mb-1"><?= $Row->NamaProduk ?></p>
									</td>
									<td class="text-center">
										<?= $Row->JumlahProduk ?>
									</td>
									<td class="text-end">Rp. <?= number_format($Row->Harga) ?></td>
									<td class="text-end">Rp. <?= number_format($Row->SubTotal) ?></td>
								</tr>
                                <?php $i++; } ?>
                                <tr>
                                    <td colspan="4" class="strong text-end">Total Pembayaran</td>
                                    <td class="text-end">Rp. <?= number_format($Penjualan->TotalHarga) ?></td>
                                </tr>
                                <tr>
									<td colspan="4" class="strong text-end">Total Harga</td>
									<td class="text-end">Rp. <?= number_format($SubTotal->SubTotal) ?></td>
								</tr>
								<tr>
									<td colspan="4" class="strong text-end">Kembalian</td>
									<td class="text-end">Rp. <?= number_format( $Penjualan->TotalPembayaran - $Penjualan->TotalHarga) ?></td>
								</tr>
							</table>
							<p class="text-secondary text-center mt-5">Thank you very much for doing business with us.
								We look forward to working with
								you again!</p>
						</div>
					</div>
				</div>
			</div>