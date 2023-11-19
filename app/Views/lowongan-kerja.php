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
                <input type="hidden" name="page" value="1"/>
                    <div class="row">
                        <div class="form-group col">
                            <label for="perusahaan">Perusahaan</label>
                            <input type="text" id="perusahaan" class="form-control" placeholder="Nama Perusahaan" name="perusahaan" value="<?= $filter['perusahaan'] ?>"/>
                        </div>
                        <div class="form-group col">
                            <label for="program_studi">Program Studi</label>
                            <input type="text" id="program_studi" class="form-control" placeholder="Program Studi" name="program_studi" value="<?= $filter['program_studi'] ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keahlian">Keahlian/Kualifikasi</label>
                        <input type="text" id="keahlian" class="form-control form-control-transparent" placeholder="Keahlian/Kualifikasi" name="keahlian" value="<?= $filter['keahlian'] ?>"/>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="periode_pembukaan">Periode Pembukaan</label>
                            <input type="date" id="periode_pembukaan" class="form-control" placeholder="Periode Pembukaan" name="periode_pembukaan" value="<?= $filter['periode_pembukaan'] ?>"/>
                        </div>
                        <div class="form-group col">
                            <label for="periode_penutupan">Periode Penutupan</label>
                            <input type="date" id="periode_penutupan" class="form-control" placeholder="Periode Penutupan" name="periode_penutupan" value="<?= $filter['periode_penutupan'] ?>"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="gaji_min">Gaji Minimum</label>
                            <input type="text" id="gaji_min" class="form-control form-control-transparent" placeholder="Gaji Minimum" name="gaji_min" value="<?= $filter['gaji_min'] ?>" oninput="formatCurrency(this)"/>
                        </div>
                        <div class="form-group col">
                            <label for="gaji_max">Gaji Maksimum</label>
                            <input type="text" id="gaji_max" class="form-control" placeholder="Gaji Maksimum" name="gaji_max" value="<?= $filter['gaji_max'] ?>" oninput="formatCurrency(this)"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="penempatan">Penempatan</label>
                        <input type="text" id="penempatan" class="form-control" placeholder="Penempatan" name="penempatan" value="<?= $filter['penempatan'] ?>"/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <!-- clear -->
                        <a href="<?= base_url('lowongan-kerja') ?>" class="btn btn-secondary">Clear</a>
                    </div>
                </form>
                <?php
                foreach ($lowongan_pekerjaan as $key => $value) {
                    echo "<div class='card mb-5'>
                    <div class='card-body'>
                        <div class='mb-3'>
                            <h5 class='font-weight-semibold mb-1'>
                                <a href='" . base_url("lowongan-kerja/detail/$value->job_hash") . "'
                                    target='new' class='text-default'>$value->nama_formasi</a>
                            </h5>
                            <ul class='list-inline list-inline-dotted mb-3'>
                                <li class='list-inline-item'>By 
                                <a href='#' class='text-muted'>$value->nama_perusahaan</a>
                                </li>
                                <li class='list-inline-item'>- $value->domisili</li>
                            </ul>
                            <p>
                                Kisaran Gaji : Rp. ". format_rupiah($value->kisaran_gaji_min) ." - Rp. ". format_rupiah($value->kisaran_gaji_max) ."
                            </p>
                            <span class='text-muted'>
                                Periode : ". format_tanggal($value->periode_mulai) ." - ". format_tanggal($value->periode_selesai) ."
                            </span>

                        </div>
                    </div>
                </div>";
                }

                if (count($lowongan_pekerjaan) == 0) {
                    echo "<div class='card mb-5'>
                        <div class='card-body'>
                            <div class='mb-3 text-center'>
                                <img src='" . base_url('assets/svg/data-not-found.svg') . "' class='img-fluid' alt='empty' height='400' width='400'>
                                <h5 class='font-weight-semibold mb-1 text-center'>
                                    Lowongan Pekerjaan Tidak Ditemukan
                                </h5>
                            </div>
                        </div>
                    </div>";
                }
                
                ?>

                <?php
                
                if (!(count($lowongan_pekerjaan) == 0)) {
                
                ?>

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

                            $perusahaan = $filter['perusahaan'];
                            $programStudi = $filter['program_studi'];
                            $keahlian = $filter['keahlian'];
                            $periodePembukaan = $filter['periode_pembukaan'];
                            $periodePenutupan = $filter['periode_penutupan'];
                            $gajiMin = $filter['gaji_min'];
                            $gajiMax = $filter['gaji_max'];
                            $penempatan = $filter['penempatan'];


                            if ($current_page > 1) {
                                echo "<a href='" . base_url("lowongan-kerja?page=1&perusahaan=$perusahaan&program_studi=$programStudi&keahlian=$keahlian&periode_pembukaan=$periodePembukaan&periode_penutupan=$periodePenutupan&gaji_min=$gajiMin&gaji_max=$gajiMax&penempatan=$penempatan#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>First</a>";
                                echo "<a href='" . base_url("lowongan-kerja?page=$prev_page&perusahaan=$perusahaan&program_studi=$programStudi&keahlian=$keahlian&periode_pembukaan=$periodePembukaan&periode_penutupan=$periodePenutupan&gaji_min=$gajiMin&gaji_max=$gajiMax&penempatan=$penempatan#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Previous</a>";
                            }

                            for ($i = $start; $i <= $end; $i++) {
                                if ($i == $current_page) {
                                    // Highlight the current page number with a different color
                                    echo "<a href='" . base_url("lowongan-kerja?page=$i&perusahaan=$perusahaan&program_studi=$programStudi&keahlian=$keahlian&periode_pembukaan=$periodePembukaan&periode_penutupan=$periodePenutupan&gaji_min=$gajiMin&gaji_max=$gajiMax&penempatan=$penempatan#pagination-bottom") . "' class='btn btn-primary font-weight-bold'>$i</a>";
                                } else {
                                    echo "<a href='" . base_url("lowongan-kerja?page=$i&perusahaan=$perusahaan&program_studi=$programStudi&keahlian=$keahlian&periode_pembukaan=$periodePembukaan&periode_penutupan=$periodePenutupan&gaji_min=$gajiMin&gaji_max=$gajiMax&penempatan=$penempatan#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>$i</a>";
                                }
                            }

                            if (!($current_page == $pagination_count)) {
                                echo "<a href='" . base_url("lowongan-kerja?page=$next_page&perusahaan=$perusahaan&program_studi=$programStudi&keahlian=$keahlian&periode_pembukaan=$periodePembukaan&periode_penutupan=$periodePenutupan&gaji_min=$gajiMin&gaji_max=$gajiMax&penempatan=$penempatan#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Next</a>";
                                echo "<a href='" . base_url("lowongan-kerja?page=$pagination_count&perusahaan=$perusahaan&program_studi=$programStudi&keahlian=$keahlian&periode_pembukaan=$periodePembukaan&periode_penutupan=$periodePenutupan&gaji_min=$gajiMin&gaji_max=$gajiMax&penempatan=$penempatan#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Last</a>";
                            }
                        ?>
                    </div>
                    <!-- Total  -->
                </div>
                <div class="text-center ">
                    <?php
                        echo "<p class='text-muted'>Tampil $startRecord ke $endRecord dari $totalRecords data</p>";
                    ?>
                </div> 
                <?php
                }
                ?>
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

