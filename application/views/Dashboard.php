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
                    Dashboard
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Pelanggan</div>
                        </div>
                        <div class="h1 mb-3"><?= $Pelanggan ?></div>
                        <div class="d-flex mb-2">
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="icon ms-1 icon-2">
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Produk</div>

                        </div>
                        <div class="h1 mb-3"><?= $Produk ?></div>
                        <div class="d-flex mb-2">
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    <!-- Download SVG icon from http://tabler.io/icons/icon/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="icon ms-1 icon-2">
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Penjualan</div>

                        </div>
                        <div class="h1 mb-3"><?= $Penjualan ?></div>
                        <div class="d-flex mb-2">
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">

                                    <!-- Download SVG icon from http://tabler.io/icons/icon/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="icon ms-1 icon-2">
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Pendapatan</div>
                        </div>
                        <div class="h1 mb-3"><?= $Pendapatan->TotalHarga ? $Pendapatan->TotalHarga : '0' ?></div>
                        <div class="d-flex mb-2">
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">

                                    <!-- Download SVG icon from http://tabler.io/icons/icon/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="icon ms-1 icon-2">
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>