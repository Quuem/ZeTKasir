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
                    Penjualan
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
                        Create New Penjualan
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
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pilih Pelanggan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Nama Pelanggan</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Action</th>
                                                <th class="w-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($Pelanggan as $Row) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><?= $Row->NamaPelanggan ?></td>
                                                    <td class="text-secondary">
                                                        <?= $Row->Alamat ?>
                                                    </td>
                                                    <td class="text-secondary">
                                                        <?= $Row->NomorTelepon ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('Penjualan/Create/' . $Row->PelangganID) ?>"
                                                            class="text-success">Pilih</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer ">
                                <a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal">
                                    Cancel
                                </a>
                            </div>
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
                        <table class="table table-vcenter  card-table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th class="w-1">No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>TotalHarga</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                <?php
                                $i = 1;
                                foreach ($Penjualan as $Row) {
                                    ?>
                                    <tr class="text-center">
                                        <td class="text-muted"><?= $i ?></td>
                                        <td class="Nama-Pelanggan">
                                            <?= $Row->NamaPelanggan ? $Row->NamaPelanggan : 'Pelanggan' ?>
                                        </td>
                                        <td class="text-secondary Tanggal-Penjualan">
                                            <?= $Row->TanggalPenjualan ?>
                                        </td>
                                        <td class="text-secondary">
                                            Rp. <?= number_format($Row->TotalHarga) ?>
                                        </td>
                                        <td class="text-secondary">
                                            <?= $Row->Status ?>
                                        </td>
                                        <?php if ($Row->Status == 'Selesai') { ?>
                                            <td>
                                                <a href="<?= base_url('Penjualan/Struk/' . $Row->PenjualanID) ?>"
                                                    class="text-success">Struk</a>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <a href="<?= base_url('Penjualan/Detail/' . $Row->PenjualanID) ?>">Detail</a>
                                                <a href="<?= base_url('Penjualan/Delete/' . $Row->PenjualanID) ?>"
                                                    class="text-danger"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Produk')">Hapus</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
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