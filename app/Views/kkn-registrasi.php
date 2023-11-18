<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Students Access - KKN Registrasi - Universitas Muslim Indonesia</title>
    <meta name="description" content="Portal Layanan Mahasiswa Terintegrasi Universitas Muslim Indonesia" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->


    <!--begin::Page Custom Styles(used by this page)-->
    <link href="<?= base_url() ?>/assets/css/pages/login/classic/login-2.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url() ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/media/logos/umi.png" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white"
            id="kt_login">
            <!--begin::Aside-->
            <div
                class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
                <!--begin: Aside Container-->
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
                        <!-- <a href="#" class="mb-15 text-center">
                            <img src="<?= base_url() ?>/assets/media/logos/logo-letter-1.png" class="max-h-75px"
                                alt="" />
                        </a> -->

                        <!--begin::Signin-->
                        <div class="my-3 mr-2">
                            <a class="btn btn-info" href="<?= base_url('dashboard') ?>" id="kt_login_signup"
                                class="font-weight-bold">
                                <i class="flaticon-reply"></i>Student Access
                            </a>
                        </div>
                        <div class="text-center mb-10 mb-lg-20">
                            <!--begin::Aside header-->
<a href="<?= base_url() ?>/#" class="login-logo text-center pb-10">
    <img src="<?= base_url('../assets_kkn/media/logos/umi.png') ?>" class="max-h-100px" alt="" />
</a>
                            <h1 class="font-weight-bold">KKN</h1>
                    <!--end::Aside header-->
                            <h3>Universitas Muslim Indonesia</h3>
                        </div>
                        <?php
                        if(check_registration_kkn(Session()->get('C_USERNAME')) == 99){
                            echo '<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">Anda Belum Melakukan Registrasi KRS di Tahun Akademik (1.1)</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>';
                        }else if(check_registration_kkn(Session()->get('C_USERNAME')) == 98){
                            echo '<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">Anda Belum Melakukan Registrasi KRS di Tahun Akademik (1.3)</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>';

                        }else if(check_registration_kkn(Session()->get('C_USERNAME')) == 97){
                            echo '<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">Terjadi Kesalahan Pada Saat Pengambilan Mata Kuliah KKN, Silahkan Hubungi Operator Akademik di Fakultas Anda</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>';

                        }else if(check_registration_kkn(Session()->get('C_USERNAME')) == 96){
                            echo '<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">Anda Belum Registrasi Mata Kuliah KKN di KRS</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>';
                        }else{
                        ?>
                            <div class="login-form login-signin">
                            <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">Anda Wajib Melengkapi Berkas-Berkas di Fakultas, Jika Berkas Terpenuhi,  Anda Boleh Melakukan Registrasi KKN di students.umi.ac.id</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>

                            <?php
                                if(!get_data_registrasi()){
                                    echo '<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">Silahkan periksa Data Anda. Jika ada yang tidak lengkap, segera
                                            hubungi pihak UPT. Pembalajaran Daring untuk melengkapinya.</br></br>
                                            Kelengkapan data berpengaruh pada proses pendaftaran KKN.</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>';
                                }
                            ?>

                            <?php
                                if(get_data_registrasi()->akses == 1){
                                    echo '<div class="alert alert-custom alert-warning fade show" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">Akun Dalam Proses Validasi.. Mohon Menunggu..</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>';
                                }
                            ?>

                            <?php

                            

                                if (Session()->getFlashData('status')) {
                                    if (Session()->getFlashData('status') == "berhasil") {
                                        echo '<div class="alert alert-custom alert-primary fade show" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                <div class="alert-text">Registrasi Berhasil</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>';
                                    }else if(Session()->getFlashData('status') == "gagal_registrasi"){
                                        echo '<div class="alert alert-custom alert-danger fade show" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                <div class="alert-text">Registrasi Gagal</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>';

                                    }else if(Session()->getFlashData('status') == "gagal"){
                                        echo '<div class="alert alert-custom alert-danger fade show" role="alert">
                                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                <div class="alert-text">Berkas Bermasalah! Silahkan Cek Extensi File atau Ukuran File</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>';
                                    }
                                }
                            ?>

                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" method="POST"
                                action="<?= base_url('kkn/store') ?>" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-group py-3 m-0">
                                    <label for="">NIM</label>
                                    <input name="nim" class="form-control h-auto border-0 px-0 placeholder-dark-75"
                                        type="text" value="<?= get_data_mahasiswa_gamelan()->C_NPM ?>"
                                        readonly />
                                </div>
                                <div class="form-group py-3 m-0">
                                    <label for="">Nama Mahasiswa</label>
                                    <input name="nama" class="form-control h-auto border-0 px-0 placeholder-dark-75"
                                        type="text"
                                        value="<?= get_data_mahasiswa_gamelan()->NAMA_MAHASISWA ?>" readonly />
                                </div>
                                <div class="form-group py-3 m-0">
                                    <label for="">Jenis Kelamin</label>
                                    <input name="jenis_kelamin" class="form-control h-auto border-0 px-0 placeholder-dark-75"
                                        type="text"
                                        value="<?= get_data_mahasiswa_gamelan()->JENIS_KELAMIN ?>" readonly />
                                </div>
                                <div class="form-group py-3 m-0">
                                    <label for="">Program Studi</label>
                                    <input name="program_studi"
                                        class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Email" 
                                        value="<?= get_data_prodi_gamelan()->NAMA_PRODI ?>" readonly />
                                </div>
                                <div class="form-group py-3 m-0">
                                    <label for="">Fakultas</label>
                                    <input name="fakultas" class="form-control h-auto border-0 px-0 placeholder-dark-75"
                                        type="Email"
                                        value="<?= get_data_fakultas_gamelan()->NAMA_FAKULTAS ?>" readonly />
                                </div>
                                <div class="form-group py-3 m-0">
                                    <label for="">Nohp</label>
                                    <input type="text" name="nohp" class="form-control h-auto" value="<?= get_data_registrasi()->nohp ?>" placeholder="085340472927" required>
                                </div>
                                <div class="form-group py-3 m-0">
                                    <label for="">Ukuran Jaket</label>

                                    <select name="ukuran_jaket" id=""
                                        class="form-control h-auto">
                                        <?php
                                        if (get_data_registrasi()->ukuran_jaket) {
                                                echo '<option value="'.get_data_registrasi()->ukuran_jaket.'">'.get_data_registrasi()->ukuran_jaket.'</option>';
                                            }
                                        ?>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                        <option value="XXXXL">XXXXL</option>
                                    </select>
                                </div>
                                <div class="form-group py-3 m-0">
                                    <label for="">Jenis Pendaftaran</label>
                                    <select name="jenis_pendaftaran" id=""
                                        class="form-control h-auto">
                                        <option value="BARU">Baru</option>
                                        <option value="MENGULANG">Mengulang</option>
                                    </select>
                                </div>
                                <div class="form-group py-3 m-0">
                                    <label for="">Periode KKN</label>
                                    <select name="periode_kkn" id=""
                                        class="form-control h-auto">
                                        <?php
                                        
                                            foreach (get_data_kkn() as $key => $value) {
                                        ?>
                                        <option value="<?= $value->id_set_kkn ?>">Periode : <?= $value->periode ?> -
                                            <?= $value->jenis_kkn ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div
                                    class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">

                                    <?php
                                            if (!get_data_registrasi()) {
                                                echo '<button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Registrasi</button>';
                                            }else if(get_data_registrasi()->akses == 1){
                                                echo '<button disabled class="btn btn-secondary disabled font-weight-bold px-9 py-4 my-3">Proses Validasi Oleh LPKM</button>';
                                            }else if(get_data_registrasi()->akses == 2){
                                                echo '<button disabled class="btn btn-secondary disabled font-weight-bold px-9 py-4 my-3">Akun Anda Sudah Aktif...</button>';
                                            }
                                    ?>

                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <?php
                        }
                        ?>
                        <!--end::Signin-->
                    </div>
                    <!--end::Aside body-->

                    <!--begin: Aside footer for desktop-->
                    <div class="d-flex flex-column-auto justify-content-between mt-15">
                        <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                            &copy; 2021 UPT. Pembejalaran Daring Universitas Muslim Indonesia
                        </div>
                    </div>
                    <!--end: Aside footer for desktop-->
                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->

            <!--begin::Content-->
            <div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7"
                style="background-image: url(<?= base_url() ?>/assets/media/bg/bg-4.jpg);">
                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-lg-center">
                    <div class="d-flex flex-column justify-content-center">
                        <h3 class="display-3 font-weight-bold my-7 text-white">KKN REGISTRASI</h3>
                        <p class="font-weight-bold font-size-lg text-white opacity-80">
                            Layanan Pendaftaran KKN Universitas Muslim Indonesia
                        </p>
                    </div>
                    <div class="ml-3 card card-custom bg-success">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <span class="card-icon">
                                    <i class="flaticon2-chat-1 text-white"></i>
                                </span>
                                <h3 class="card-label text-white">
                                    Informasi KKN
                                </h3>
                            </div>
                        </div>
                        <div class="separator separator-solid separator-white opacity-20"></div>
                        <div class="card-body text-white">
                            <?php
                            foreach (get_data_kkn() as $key => $value) {
                            ?>
                            Periode <b><?= $value->periode ?></b> </br>
                            Jenis KKN : <b><?= $value->jenis_kkn ?></b> </br>
                            Tanggal Pendafataran Awal : <b><?= $value->tanggal_daftar_awal ?></b> </br>
                            Tanggal Pendafataran Akhir : <b><?= $value->tanggal_daftar_akhir ?></b> </br>
                            Tanggal Pembekalan : <b><?=  $value->tanggal_pembekalan ?></b></br><br>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="https://api.whatsapp.com/send?phone=6285342774769&text=Halo%20Saya%20Ingin%20Bertanya%20Seputar%20KKN" class="btn btn-light-primary font-weight-bold">Helpdesk 085342774769</a>
                        </div>
                    </div>
                </div>

                <!--end::Content body-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->


    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#663259",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#F4E1F0",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="<?= base_url() ?>/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->


    <!--begin::Page Scripts(used by this page)-->
    <script src="<?= base_url() ?>/assets/js/pages/custom/login/login-general.js"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>