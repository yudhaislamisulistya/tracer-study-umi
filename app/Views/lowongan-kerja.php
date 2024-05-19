<?php

?>
<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">
                    Lowongan Pekerjaan
                </h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url('lowongan-kerja') ?>" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="form-group">
                        <label>Urutkan Berdasarkan:</label>
                        <div class="d-flex flex-wrap">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sort" id="gaji_tertinggi" value="gaji_tertinggi" <?= $filter['sort'] == 'gaji_tertinggi' ? 'checked' : '' ?>>
                                <label class="form-check-label badge badge-primary text-white" for="gaji_tertinggi">Gaji Tertinggi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sort" id="gaji_terendah" value="gaji_terendah" <?= $filter['sort'] == 'gaji_terendah' ? 'checked' : '' ?>>
                                <label class="form-check-label badge badge-primary text-white" for="gaji_terendah">Gaji Terendah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sort" id="pembukaan_terbaru" value="pembukaan_terbaru" <?= $filter['sort'] == 'pembukaan_terbaru' ? 'checked' : '' ?>>
                                <label class="form-check-label badge badge-primary text-white" for="pembukaan_terbaru">Pembukaan Terbaru</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sort" id="pembukaan_terlama" value="pembukaan_terlama" <?= $filter['sort'] == 'pembukaan_terlama' ? 'checked' : '' ?>>
                                <label class="form-check-label badge badge-primary text-white" for="pembukaan_terlama">Pembukaan Terlama</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sort" id="penutupan_terbaru" value="penutupan_terbaru" <?= $filter['sort'] == 'penutupan_terbaru' ? 'checked' : '' ?>>
                                <label class="form-check-label badge badge-primary text-white" for="penutupan_terbaru">Penutupan Terbaru</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sort" id="penutupan_terlama" value="penutupan_terlama" <?= $filter['sort'] == 'penutupan_terlama' ? 'checked' : '' ?>>
                                <label class="form-check-label badge badge-primary text-white" for="penutupan_terlama">Penutupan Terlama</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <!-- clear -->
                        <a href="<?= base_url('lowongan-kerja') ?>" class="btn btn-secondary">Clear</a>
                    </div>
                </form>

                <?php if (count($lowongan_pekerjaan) > 0) : ?>
                    <?php foreach ($lowongan_pekerjaan as $value) : ?>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='mb-3'>
                                    <h5 class='font-weight-semibold mb-1'>
                                        <a href='<?= base_url("lowongan-kerja/detail/{$value->job_hash}") ?>' target='_new' class='text-default'><?= $value->nama_formasi ?></a>
                                    </h5>
                                    <ul class='list-inline list-inline-dotted mb-3'>
                                        <li class='list-inline-item'>By <a href='#' class='text-muted'><?= $value->nama_perusahaan ?></a></li>
                                        <li class='list-inline-item'>- <?= $value->domisili ?></li>
                                    </ul>
                                    <p>
                                        Kisaran Gaji : Rp. <?= format_rupiah($value->kisaran_gaji_min) ?> - Rp. <?= format_rupiah($value->kisaran_gaji_max) ?>
                                    </p>
                                    <span class='text-muted'>
                                        Periode : <?= format_tanggal($value->periode_mulai) ?> - <?= format_tanggal($value->periode_selesai) ?>
                                    </span>
                                    <!-- Button Readmore -->
                                    <br>
                                    <a href='<?= base_url("lowongan-kerja/detail/{$value->job_hash}") ?>' target='_new' class='btn btn-primary btn-sm mt-3'>Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                        <div class="alert-icon">
                            <i class="flaticon2-warning"></i>
                            Lowongan pekerjaan tidak ditemukan
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (count($lowongan_pekerjaan) > 0) : ?>
                    <div class="d-flex justify-content-center mt-5" id="pagination-bottom">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?php
                            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            $range = 5;
                            $start = max(1, $current_page - floor($range / 2));
                            $end = min($pagination_count, $start + $range - 1);
                            $prev_page = $current_page > 1 ? $current_page - 1 : 1;
                            $next_page = $current_page < $pagination_count ? $current_page + 1 : $pagination_count;
                            $startRecord = ($current_page - 1) * $perPage + 1;
                            $endRecord = min($current_page * $perPage, $totalRecords);

                            // Add sorting parameter
                            $sort = $filter['sort'];

                            if ($current_page > 1) {
                                echo "<a href='" . base_url("lowongan-kerja?page=1&sort=$sort#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>First</a>";
                                echo "<a href='" . base_url("lowongan-kerja?page=$prev_page&sort=$sort#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Previous</a>";
                            }

                            for ($i = $start; $i <= $end; $i++) {
                                if ($i == $current_page) {
                                    echo "<a href='" . base_url("lowongan-kerja?page=$i&sort=$sort#pagination-bottom") . "' class='btn btn-primary font-weight-bold'>$i</a>";
                                } else {
                                    echo "<a href='" . base_url("lowongan-kerja?page=$i&sort=$sort#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>$i</a>";
                                }
                            }

                            if ($current_page < $pagination_count) {
                                echo "<a href='" . base_url("lowongan-kerja?page=$next_page&sort=$sort#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Next</a>";
                                echo "<a href='" . base_url("lowongan-kerja?page=$pagination_count&sort=$sort#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Last</a>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <?php echo "<p class='text-muted'>Tampil $startRecord ke $endRecord dari $totalRecords data</p>"; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<!-- script -->
<script>
    $(document).ready(function() {
        $('#pagination-bottom').hide();
        $('#pagination-top').hide();
        $('#pagination-bottom').show(1000);
        $('#pagination-top').show(1000);
    });

    function formatCurrency(input) {
        var value = input.value.replace(/[\D\s\._\-]+/g, "");
        value = value ? parseInt(value, 10) : 0;
        input.value = (value === 0) ? "" : "Rp. " + value.toLocaleString("id-ID");
    }
</script>

<?= view('layouts/footer.php') ?>