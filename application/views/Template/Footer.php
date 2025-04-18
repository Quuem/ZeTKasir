<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">

            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; 2025
                        <a href="." class="link-secondary">Rakyat Masa Depan</a>.
                        All rights reserved.
                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Libs JS -->
<script src="<?= base_url('assets') ?>/dist/libs/apexcharts/dist/apexcharts.min.js?1738096685" defer></script>
<script src="<?= base_url('assets') ?>/dist/libs/jsvectormap/dist/jsvectormap.min.js?1738096685" defer></script>
<script src="<?= base_url('assets') ?>/dist/libs/jsvectormap/dist/maps/world.js?1738096685" defer></script>
<script src="<?= base_url('assets') ?>/dist/libs/jsvectormap/dist/maps/world-merc.js?1738096685" defer></script>
<script src="<?= base_url('assets') ?>/dist/libs/list.js/dist/list.min.js?1692870487" defer></script>
<!-- Tabler Core -->

<script src="<?= base_url('assets') ?>/dist/js/tabler.min.js?1738096685" defer></script>
<script src="<?= base_url('assets') ?>/dist/js/demo.min.js?1738096685" defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const list = new List('table-default', {
            listClass: 'table-tbody',
            valueNames: ['Nama-Produk', 'Nama-User', 'Username', 'Nama-Pelanggan', 'Alamat-Pelanggan', 'Nomor-Telepon', 'Tanggal-Penjualan'],
            page: 10,

            pagination: true
        });
    })
</script>

</body>

</html>