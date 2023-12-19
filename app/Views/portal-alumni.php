<?php

?>
<?= view('layouts/header.php') ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-transparent " id="kt_subheader">
    <div class="container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Data Alumni </h5>
            <!--end::Title-->

            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->

            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <form class="pr-1" action="<?= base_url('portal-alumni') ?>" method="get">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group input-group-sm input-group-solid" style="max-width: 250px">
                                <input type="text" class="form-control" id="kt_subheader_search_form" name="search" placeholder="Nama/Program Studi" value="<?= $filter['search'] ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <span class="svg-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex align-items-center" id="kt_subheader_search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary mr-2">Search</button>
                                    <a href="<?= base_url('portal-alumni') ?>" class="btn btn-secondary">Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Search Form-->
        </div>
        <!--end::Details-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="#" class="">

            </a>
            <!--end::Button-->


        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->

<div class="d-flex flex-column-fluid mt-5">

    <div class="container">
        <div class="row justify-content-center">
            <?php
            foreach ($alumni as $key => $value) {
                echo '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-custom gutter-b card-stretch">
                    <div class="card-body text-center pt-4">
                        <div class="mt-7">
                            <div class="symbol symbol-circle symbol-lg-75">
                                <img src="assets/media/users/default.jpg" alt="image" />
                            </div>
                            <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                <span class="font-size-h3 font-weight-boldest">JB</span>
                            </div>
                        </div>
                        <div class="my-2">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">' . $value->personal->nama . '</a>
                        </div>
                        <span class="label label-inline label-lg label-light-warning btn-sm font-weight-bold">Keterangan: ' . $value->personal->ket_sts_aktif . '</span>
                        <div class="my-2">
                            <span href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">' . $value->nm_prodi . '</span>
                        </div>
                    </div>
                </div>
            </div>';
            }

            if (count($alumni) == 0) {
                echo "<div class='card mb-5'>
                        <div class='card-body'>
                            <div class='mb-3 text-center'>
                                <img src='" . base_url('assets/svg/data-not-found.svg') . "' class='img-fluid' alt='empty' height='400' width='400'>
                                <h5 class='font-weight-semibold mb-1 text-center'>
                                    Data Alumni Tidak Tersedia
                                </h5>
                            </div>
                        </div>
                    </div>";
            }
            ?>
        </div>
        <?php

        if (!(count($alumni) == 0)) {

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

                    $search = $filter['search'];

                    if ($current_page > 1) {
                        echo "<a href='" . base_url("portal-alumni?page=1&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>First</a>";
                        echo "<a href='" . base_url("portal-alumni?page=$prev_page&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Previous</a>";
                    }

                    for ($i = $start; $i <= $end; $i++) {
                        if ($i == $current_page) {
                            echo "<a href='" . base_url("portal-alumni?page=$i&search=$search#pagination-bottom") . "' class='btn btn-primary font-weight-bold'>$i</a>";
                        } else {
                            echo "<a href='" . base_url("portal-alumni?page=$i&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>$i</a>";
                        }
                    }

                    if (!($current_page == $pagination_count)) {
                        echo "<a href='" . base_url("portal-alumni?page=$next_page&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Next</a>";
                        echo "<a href='" . base_url("portal-alumni?page=$pagination_count&search=$search#pagination-bottom") . "' class='btn btn-light-primary font-weight-bold'>Last</a>";
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

<?= view('layouts/footer.php') ?>