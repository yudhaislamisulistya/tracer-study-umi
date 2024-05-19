<?= view('layouts/header.php') ?>

<?php

?>

<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <?php
            if (check_biodata(Session()->get('C_NPM')) == 0) {
                echo '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon2-warning"></i></div>
                        <div class="alert-text">Selamat Datang! Silahkan Lengkapi Profile atau Biodata Anda Melalui Link <a class="text-dark" href="'.base_url("biodata").'">Disini</a></div>
                    </div>';
            }else{
                echo '<div class="alert alert-custom alert-light-info fade show mb-5" role="alert">
                    <div class="alert-icon"><i class="flaticon2-warning"></i></div>
                    <div class="alert-text">Yuhuuuu!!!! Selamat Biodata Alumni Anda Sudah Lengkap. Silahkan Lengkapi Data Kuisoner</div>
                </div>';
            }
        
        ?>
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <!--begin::Details-->
                <div class="d-flex mb-9">
                    <!--begin: Pic-->
                    <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                        <div class="symbol symbol-50 symbol-lg-120">
                            <img src="assets/media/users/default.jpg" alt="image" />
                        </div>

                        <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                            <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                        </div>
                    </div>
                    <!--end::Pic-->

                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between flex-wrap mt-1">
                            <div class="d-flex mr-3">
                                <a href="#"
                                    class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3"><?= '<span class="text-danger">' . $data["personal"]["nama"] . '</span>' ?></a>
                                <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a>
                            </div>

                            <div class="my-lg-0 my-3">
                                <a href="#"
                                    class="btn btn-sm btn-success font-weight-bolder text-uppercase mr-3 mb-3"><?= '<span class="text-white">' . $data["nm_jenjang_prodi"] . ' - ' . $data["nm_prodi"] . '</span>' ?></a>
                                <a href="#"
                                    class="btn btn-sm btn-info font-weight-bolder text-uppercase mb-3"><?= '<span class="text-white">' . $data["nm_fakultas"] . '</span>' ?></a>
                            </div>
                        </div>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <div class="d-flex flex-wrap justify-content-between mt-1">
                            <div class="d-flex flex-column flex-grow-1 pr-8">
                                <div class="d-flex flex-wrap mb-4">
                                    <a href="#"
                                        class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="flaticon2-new-email mr-2 font-size-lg"></i><?= '<span class="text-danger">' . $data["personal"]["email"] . '</span>' ?></a>
                                    </a>
                                    <a href="#"
                                        class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i><?= '<span class="text-danger">' . $data["personal"]["stambuk"] . '</span>' ?></a>
                                    </a>
                                    <a href="#"
                                        class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="flaticon2-placeholder mr-2 font-size-lg"></i><?= '<span class="text-danger">' . $data["personal"]["tempat_lahir"] . '</span>' ?>
                                    </a> 
                                    <a href="#"
                                        class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="flaticon2-placeholder mr-2 font-size-lg"></i><?= '<span class="text-danger">' . format_date_indonesian($data["personal"]["tgl_lahir"]) . '</span>' ?>
                                    </a> 
                                    <a href="#"
                                        class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <i class="flaticon2-placeholder mr-2 font-size-lg"></i><?= '<span class="text-danger">' . $data["personal"]["jns_kelamin"] . '</span>' ?>
                                    </a> 
                                </div>

                                <div class="d-flex align-item-center flex-wrap mt-2">
                                    <div class="d-flex align-items-center flex-lg-fill mr-3 mb-2 mt-2">
                                        <span class="mr-4">
                                            <i class="flaticon2-arrow-down display-4 text-muted font-weight-bold"></i>
                                        </span>
                                        <div class="d-flex flex-column text-dark-75">
                                            <span class="font-weight-bolder font-size-sm">Keterangan</span>
                                            <span
                                                class="font-weight-bolder font-size-h5"><?= '<span class="text-danger">' . $data["personal"]["ket_sts_aktif"] . '</span>' ?></span>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->

                <div class="separator separator-solid"></div>
                <!--begin::Items-->
                <div class="d-flex align-items-center flex-wrap mt-8">
                    <!--begin::Item-->


                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-3 mb-2 mt-5">
                        <span class="mr-4">
                            <i class="flaticon2-placeholder display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Negara</span>
                            <span
                                class="font-weight-bolder font-size-h5"><?= get_data_country_by_id(get_data_biodata(Session()->get('C_NPM'))->negara)->name ?? '<span class="text-danger">Belum Ada Data</span>' ?></span>
                        </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-3 mb-2 mt-5">
                        <span class="mr-4">
                            <i class="flaticon2-rocket-1 display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Provinsi</span>
                            <span
                                class="font-weight-bolder font-size-h5"><?=  get_data_provinsi_with_id(get_data_biodata(Session()->get('C_NPM'))->provinsi)->name ?? '<span class="text-danger">Belum Ada Data</span>' ?></span>
                        </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-3 mb-2 mt-5">
                        <span class="mr-4">
                            <i class="flaticon2-contract display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Kab/Kota</span>
                            <span
                                class="font-weight-bolder font-size-h5"><?= get_data_regencies_with_id(get_data_biodata(Session()->get('C_NPM'))->kabupaten)->name ?? '<span class="text-danger">Belum Ada Data</span>' ?></span>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-3 mb-2 mt-5">
                        <span class="mr-4">
                            <i class="flaticon-network display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Jenis Pekerjaan Pengguna Alumni</span>
                            <span
                                class="font-weight-bolder font-size-h5"><?= get_data_pekerjaan_by_id(get_data_biodata(Session()->get('C_NPM'))->jenis_pekerjaan)->nm_pekerjaan ?? '<span class="text-danger">Belum Ada Data</span>' ?></span>
                        </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-3 mb-2 mt-5">
                        <span class="mr-4">
                            <i class="flaticon-bus-stop display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Nama Kantor/Perusahaan</span>
                            <span
                                class="font-weight-bolder font-size-h5"><?= get_data_biodata(Session()->get('C_NPM'))->nama_perusahaan ?? '<span class="text-danger">Belum Ada Data</span>' ?></span>
                        </div>
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-3 mb-2 mt-5">
                        <span class="mr-4">
                            <i class="flaticon-clock-1 display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Tanggal Masuk Kerja</span>
                            <span
                                class="font-weight-bolder font-size-h5"><?= get_data_biodata(Session()->get('C_NPM'))->tanggal_masuk_kerja ?? '<span class="text-danger">Belum Ada Data</span>' ?></span>
                        </div>
                    </div>
                    <!--end::Item-->
                </div>
                <!--begin::Items-->
            </div>
        </div>
        <!--end::Card-->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-8">
                    <div class="card-body">
                        <div class="p-6">
                            <h2 class="text-dark mb-8">Tanya Tentang Tracer Study</h2>
                            <!--begin::Accordion-->
                            <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle"
                                id="accordionExample1">
                                <!--begin::Item-->
                                <div class="card">
                                    <!--begin::Header-->
                                    <div class="card-header" id="headingOne1">
                                        <div class="card-title" data-toggle="collapse" data-target="#collapseOne1"
                                            aria-expanded="true" aria-controls="collapseOne1" role="button">
                                            <span class="svg-icon svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <path
                                                            d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                            transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon--></span>
                                            <div class="card-label text-dark pl-4">Bagaimana Cara Alumni Mendaftar
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne1"
                                        data-parent="#accordionExample1">
                                        <div class="card-body text-dark-50 font-size-lg pl-12">
                                            Untuk Cara Pendaftaran Tracer Study Dapat Mendownload Panduan di Pojok Kanan
                                            Bawah
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="card border-top-0">
                                    <!--begin::Header-->
                                    <div class="card-header" id="headingTwo1">
                                        <div class="card-title collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo1" aria-expanded="false"
                                            aria-controls="collapseTwo1" role="button">
                                            <span class="svg-icon svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <path
                                                            d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                            transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon--></span>
                                            <div class="card-label text-dark pl-4">Panduan Penggunaan Tracer Study
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo1"
                                        data-parent="#accordionExample1">
                                        <div class="card-body text-dark-50 font-size-lg pl-12">
                                            Panduan Pelaksanaan KKN Covid-19 Dapat Didownload Melalui Link Ini <a
                                                href="http://students.umi.ac.id/uploads/manual_book_kkn_2021.pdf">Download</a>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="card">
                                    <!--begin::Header-->
                                    <div class="card-header" id="headingThree1">
                                        <div class="card-title collapsed" data-toggle="collapse"
                                            data-target="#collapseThree1" aria-expanded="false"
                                            aria-controls="collapseThree1" role="button">
                                            <span class="svg-icon svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path
                                                            d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <path
                                                            d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                            transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon--></span>
                                            <div class="card-label text-dark pl-4">Helpesk?</div>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div id="collapseThree1" class="collapse" aria-labelledby="headingThree1"
                                        data-parent="#accordionExample1">
                                        <div class="card-body text-dark-50 font-size-lg pl-12">
                                            Ada Kendala Dalam Proses Penggunaan Aplikasi Tracer Study <a
                                                href="https://api.whatsapp.com/send?phone=6285340472927&text=Halo Nama Saya dengan NIM Ingin Bertanya Mengenai Informasi Tracer Study">Nomor
                                                Whatsapp Ini</a>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Accordion-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layouts/footer.php') ?>