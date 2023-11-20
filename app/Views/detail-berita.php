<?php

?>
<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-20 pb-lg-0">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid me-xl-15">
                        <!--begin::Post content-->
                        <div class="mb-17">
                            <!--begin::Wrapper-->
                            <div class="mb-8">
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap mb-6">
                                    <!--begin::Item-->
                                    <div class="mr-5">
                                        <!--begin::Icon-->
                                        <i class="flaticon-calendar text-info"></i>
                                        <!--begin::Label-->
                                        <span style="color: #7E8299;"><?= format_tanggal($berita->created_at) ?></span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->
                                    <div class="mr-5">
                                        <!--begin::Icon-->
                                        <i class="flaticon2-open-text-book text-info"></i>
                                        <!--begin::Label-->
                                        <span style="color: #7E8299;">Berita Alumni</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Title-->
                                <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                    <?= $berita->judul ?>
                                </a>
                                <!--end::Title-->

                                <?php

                                // check gambar is null
                                $gambar = $berita->gambar == null ? base_url('assets/images/default-image.png') : $berita->gambar;

                                ?>

                                <!--begin::Container-->
                                <div class="overlay mt-8">
                                    <img src="<?= $gambar ?>" style="width: 95%; height: 100%; border-radius: 10px;" alt="">
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Description-->
                            <div class="fs-5 fw-semibold text-gray-600">
                                <p class="mb-8 text-justify">
                                    <?= $berita->isi ?>
                                </p>
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Post content-->

                        <!-- Make Button Back atau Kembali -->
                        <div class="d-flex justify-content-center">
                            <a href="<?= base_url('berita') ?>" class="btn btn-secondary">Kembali</a>
                        </div>

                    </div>
                    <!--end::Content-->

                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">

                        <!--begin::Recent posts-->
                        <div class="m-0">
                            <h4 class="text-gray-900 mb-7">Postingan Terbaru</h4>
                            <!--begin::Item-->
                            <?php
                            foreach ($all_berita as $key => $value) {

                                // check gambar is null
                                $gambar = $value->gambar == null ? base_url('assets/images/default-image.png') : $value->gambar;

                                echo '<div class="d-flex flex-stack mb-7">
                                    <div class="symbol symbol-60px symbol-2by3 mr-4">
                                        <div class="symbol-label" style="background-image: url(' . $gambar . ')"></div>
                                    </div>
                                    <div class="m-0">
                                        <a href="' . base_url('berita/detail/' . $value->berita_hash) . '" class="text-gray-900 fw-bold text-hover-primary fs-6">' . $value->judul . '</a>
                                        <span class="text-gray-600 fw-semibold d-block pt-1 fs-7">' . short_isi_limit($value->isi, 30) . '</span>
                                    </div>
                                </div>';
                            }
                            ?>
                        </div>
                        <!--end::Recent posts-->
                    </div>
                    <!--end::Sidebar-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>

<?= view('layouts/footer.php') ?>