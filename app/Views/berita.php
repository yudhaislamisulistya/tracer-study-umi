<?php

?>
<?= view('layouts/header.php') ?>



<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">
                    Berita Alumni
                </h3>
            </div>
            <div class="card-body">
                <!-- Form -->
                <form action="<?= base_url('berita') ?>" method="get">
                    <!-- Search -->
                    <div class="row">
                        <div class="form-group col-md-3">
                            <input type="text" id="search" class="form-control" placeholder="Search" name="search" value="<?= $filter['search'] ?>" />
                        </div>
                        <div class="form-group col">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="<?= base_url('berita') ?>" class="btn btn-secondary">Clear</a>
                        </div>
                    </div>
                </form>
                <?php
                foreach ($berita as $key => $value) {
                    // $value->gambar null 
                    $gambar = $value->gambar == null ? base_url('assets/images/default-image.png') : $value->gambar;
                    echo '<div class="row mb-17">
                                <div class="col-xxl-5 mb-11 mb-xxl-0">
                                    <!--begin::Image-->
                                    <div class="card card-custom card-stretch">
                                        <div 
                                            class="card-body p-0 rounded px-10 py-15 d-flex align-items-center justify-content-center" 
                                            style="background-color: #FFCC69; background-image: url(' . $gambar . '); background-size: cover; background-position: center center; background-repeat: no-repeat; height: 100px;"
                                            <img src="' . $gambar . '" style="transform: scale(1.6);">
                                        </div>
                                    </div>
                                    <!--end::Image-->
                                </div>
                                <div class="col-xxl-7 pl-xxl-11">
                                    <h2 class="font-weight-bolder text-dark mb-7" style="font-size: 32px;">' . $value->judul . '</h2>
                                    <div class="line-height-xl">
                                        ' . short_isi($value->isi) . '
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap mt-8">
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                            <span class="mr-4">
                                                <i class="flaticon2-calendar-3 icon-1x"></i>
                                            </span>
                                            <div class="d-flex flex-column text-dark-75">
                                                <span class="font-weight-bolder font-size-sm">' . format_tanggal($value->created_at) . '</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="' . base_url('berita/detail/' . $value->berita_hash) . '" class="btn btn-primary mt-5">Read More</a>
                                </div>
                            </div>';
                }

                if (count($berita) == 0) {
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

                if (!(count($berita) == 0)) {

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


                            if ($filter['search'] == null) {
                                $search = '';
                            } else {
                                $perusahaan = $filter['perusahaan'] == null ? '' : $filter['perusahaan'];
                                $programStudi = $filter['program_studi'];
                                $keahlian = $filter['keahlian'];
                                $periodePembukaan = $filter['periode_pembukaan'];
                                $periodePenutupan = $filter['periode_penutupan'];
                                $gajiMin = $filter['gaji_min'];
                                $gajiMax = $filter['gaji_max'];
                                $penempatan = $filter['penempatan'];
                            }




                            if ($current_page > 1) {
                                echo "<a href='" . base_url("berita?page=1&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>First</a>";
                                echo "<a href='" . base_url("berita?page=$prev_page&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Previous</a>";
                            }

                            for ($i = $start; $i <= $end; $i++) {
                                if ($i == $current_page) {
                                    echo "<a href='" . base_url("berita?page=$i&search=$search#pagination-bottom") . "' class='btn btn-primary font-weight-bold'>$i</a>";
                                } else {
                                    echo "<a href='" . base_url("berita?page=$i&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>$i</a>";
                                }
                            }

                            if (!($current_page == $pagination_count)) {
                                echo "<a href='" . base_url("berita?page=$next_page&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Next</a>";
                                echo "<a href='" . base_url("berita?page=$pagination_count&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Last</a>";
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

<?= view('layouts/footer.php') ?>