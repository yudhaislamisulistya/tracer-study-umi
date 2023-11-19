<?php

?>
<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-17">
                <!--begin::Hero-->
                <div class="position-relative mb-17">
                    <!--begin::Overlay-->
                    <div class="overlay overlay-show">
                        <!--begin::Image-->
                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-250px" style="background-image:url('/assets/images/company.jpg')">
                        </div>
                        <!--end::Image-->


                    </div>
                    <!--end::Overlay-->
                </div>
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row mb-17">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid me-0 me-lg-20">


                        <!--begin::Job-->
                        <div class="mb-17 ">
                            <!--begin::Description-->
                            <div class="m-0">
                                <!--begin::Title-->
                                <h2 class="fs-1 text-gray-800 w-bolder mb-0">
                                    <?= $data['lowongan_pekerjaan']->nama_perusahaan ?>
                                </h2>
                                <!-- nama formasi -->
                                <h4 class="text-gray-700 w-bolder mb-0">
                                    <?= $data['lowongan_pekerjaan']->nama_formasi ?>
                                </h4>
                                <!-- caption judul rekrutemen -->
                                <p class="text-muted mb-2">
                                    <?= $data['lowongan_pekerjaan']->judul_rekrutmen ?>
                                </p>
                                <!--end::Title-->

                                <!--begin::Text-->
                                <p class="fw-semibold fs-4 text-gray-600 mb-2">
                                    <b>Deskripsi Pekerjaan:</b> <?= $data['lowongan_pekerjaan']->deskripsi_pekerjaan ?>
                                </p>
                                <!--end::Text-->
                            </div>
                            <!--end::Description-->

                            <!--begin::Accordion-->


                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionExample7">
                                <div class="card">
                                    <div class="card-header" id="headingOne7">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne7" aria-expanded="false">
                                            <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            <div class="card-label pl-4">Pengalaman Kerja</div>
                                        </div>
                                    </div>
                                    <div id="collapseOne7" class="collapse" data-parent="#accordionExample7">
                                        <div class="card-body pl-12">
                                            <?= $data['lowongan_pekerjaan']->pengalaman_kerja ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo7">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo7">
                                            <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            <div class="card-label pl-4">Keterampilan</div>
                                        </div>
                                    </div>
                                    <div id="collapseTwo7" class="collapse" data-parent="#accordionExample7">
                                        <div class="card-body pl-12">
                                            <?= $data['lowongan_pekerjaan']->keterampilan ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree7">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree7">
                                            <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            <div class="card-label pl-4">Syarat Kerja</div>
                                        </div>
                                    </div>
                                    <div id="collapseThree7" class="collapse" data-parent="#accordionExample7">
                                        <div class="card-body pl-12">
                                            <?= $data['lowongan_pekerjaan']->syarat_kerja ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree8">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree8">
                                            <span class="svg-icon svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            <div class="card-label pl-4">Manfaat</div>
                                        </div>
                                    </div>
                                    <div id="collapseThree8" class="collapse" data-parent="#accordionExample7">
                                        <div class="card-body pl-12">
                                            <?= $data['lowongan_pekerjaan']->manfaat ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Accordion-->
                            <!--begin::Apply-->
                            <a href="<?= $data['lowongan_pekerjaan']->url_registration ?>" target="_blank" class="btn btn-sm btn-primary mt-5">Lamar Sekarang</a>
                            <!--end::Apply-->
                        </div>
                        <!--end::Job-->


                    </div>
                    <!--end::Content-->

                    <!--begin::Sidebar-->
                    <div class="flex-lg-row-auto w-100 w-lg-275px w-xxl-350px">

                        <!--begin::Careers about-->
                        <div class="card bg-light ">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Top-->
                                <div class="mb-7">
                                    <!--begin::Title-->
                                    <h2 class="fs-1 text-gray-800 w-bolder mb-6">
                                        Lebih Detail
                                    </h2>
                                    <!--end::Title-->

                                    <!--begin::Text-->
                                    <p class="fw-semibold fs-6 text-gray-600">
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="flaticon2-user"></i>
                                            Jenjang
                                        </div>
                                        <div class="col-6">
                                            : <?= $data['lowongan_pekerjaan']->jenjang ?>
                                        </div>
                                    </div>
                                    <!-- Jumlah Formasi -->
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="flaticon2-group"></i>
                                            Jumlah Formasi
                                        </div>
                                        <div class="col-6">
                                            : <?= $data['lowongan_pekerjaan']->jumlah_formasi ?>
                                        </div>
                                    </div>
                                    <!-- Penempatan -->
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="flaticon-map-location"></i>
                                            Penempatan
                                        </div>
                                        <div class="col-6">
                                            : <?= $data['lowongan_pekerjaan']->domisili ?>
                                        </div>
                                    </div>
                                    <!-- status -->
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="flaticon2-check-mark"></i>
                                            Status
                                        </div>
                                        <div class="col-6">
                                            : <?= $data['lowongan_pekerjaan']->status ?>
                                        </div>
                                    </div>
                                    <!-- Gaji Min dan Max -->
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="flaticon-coins"></i>
                                            Gaji
                                        </div>
                                        <div class="col-6">
                                            : <?= format_rupiah($data['lowongan_pekerjaan']->kisaran_gaji_min) ?> - <?= format_rupiah($data['lowongan_pekerjaan']->kisaran_gaji_max) ?>
                                        </div>
                                    </div>
                                    <!-- Periode Mulai dan Selesai -->
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="flaticon2-calendar-3"></i>
                                            Periode
                                        </div>
                                        <div class="col-6">
                                            : <?= format_tanggal($data['lowongan_pekerjaan']->periode_mulai) ?> - <?= format_tanggal($data['lowongan_pekerjaan']->periode_selesai) ?>
                                        </div>
                                    </div>
                                    <!-- Status Registrasi -->
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="flaticon2-check-mark"></i>
                                            Status Registrasi
                                        </div>
                                        <div class="col-6">
                                            : <?php
                                            $current_date = get_current_date();
                                            if ($current_date >= $data['lowongan_pekerjaan']->periode_mulai && $current_date <= $data['lowongan_pekerjaan']->periode_selesai) {
                                                echo '<span class="badge badge-success">Aktif</span>';
                                            } else {
                                                echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    </p>
                                    <!--end::Text-->
                                </div>
                                <!--end::Top-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Careers about-->

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