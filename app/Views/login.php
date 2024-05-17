<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="<?= base_url() ?>/../../../../">
    <meta charset="utf-8" />
    <title>Tracer Study - Univeristas Muslim Indonsia</title>
    <meta name="description" content="Tracer Study merupakan salah satu metode yang digunakan oleh beberapa perguruan tinggi, khususnya di Indonesia untuk memperoleh umpan balik dari alumni" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="<?= base_url() ?>/https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="<?= base_url() ?>/https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="<?= base_url() ?>/assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url() ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="<?= base_url() ?>/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/media/logos/favicon.ico" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="<?= base_url() ?>/#">
                            <img src="<?= base_url() ?>/assets/media/logos/logo-orange.png" class="max-h-75px" alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->

                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>Sign In To Alumni</h3>
                            <div class="text-muted font-weight-bold">Masukkan Email dan Password Yang Sudah di Aktivasi:
                            </div>
                        </div>
                        <?php
                        if (session()->getFlashData('status')) {
                        ?>
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <?= session()->getFlashData('status') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        }

                        ?>

                        <?php if (isset($_GET['status'])) : ?>
                            <div class="alert alert-info">
                                <?php echo esc($_GET['status']); ?>
                            </div>
                        <?php endif; ?>

                        <form class="form" method="POST" action="<?= base_url() ?>/login/store" id="kt_login_signin_form">
                            <?= csrf_field() ?>
                            <div class="form-group mb-5">
                                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="NIM" name="nim" />
                            </div>
                            <div class="form-group mb-5">
                                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                            </div>
                            <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
                        </form>
                        <!-- <div class="mt-2">
                            <span class="opacity-70 mr-4">
                                Anda Belum Memiliki Akun ?
                            </span>
                            <a href="<?= base_url() ?>/javascript:;" id="kt_login_forgot"
                                class="btn btn-light-primary">Aktivasi Sekarang</a>
                        </div>
                        <div class="mt-2">
                            <span class="opacity-70 mr-4">
                                Bingung Aktivasi Akun Alumni ?
                            </span>
                            <a href="<?= base_url() ?>/assets/Panduan Aktivasi Akun Tracer Study TS.UMI.AC.ID 2021.pdf" id="kt_login_forgot"
                                class="btn btn-light-success">Download Panduan Sekarang</a>
                        </div> -->
                    </div>
                    <!--end::Login Sign in form-->

                    <!--begin::Login Sign up form-->
                    <div class="login-signup">
                        <form class="form" id="kt_login_signup_form">
                        </form>
                    </div>
                    <!--end::Login Sign up form-->

                    <!--begin::Login forgot password form-->
                    <div class="login-forgot">

                        <div class="mb-20">
                            <h3>Aktivasi Akun Anda</h3>
                            <div class="text-muted font-weight-bold">Masukkan NIM, Nama, Email dan Nomor Whatsapp Aktif</div>
                        </div>
                        <form class="form" id="kt_login_forgot_form" action="#">
                            <div class="form-group mb-10">
                                <input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="NIM" name="nim" id="nim" />
                            </div>
                            <div class="form-group mb-10">
                                <input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Isikan Nama Lengkap Tanpa Gelar" name="nama" id="nama" />
                            </div>
                            <div class="form-group mb-10">
                                <input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" id="email" />
                            </div>
                            <div class="form-group mb-10">
                                <input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Nomor Handphone" name="nohp" id="nohp" />
                                <small class="text-muted">* Format Nomor Handphone : 085340472927 atau
                                    85340472927</small>
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center mt-10">
                                <button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
                                <button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                            </div>
                        </form>
                        <span>Terkendala Dalam Aktivasi Akun Alumni, Silahkan Hubungi Admin Tracer <a href="#">Disini</a></span></br>
                        <span>Untuk Email Aktivasi, Silahkan Cek di Spam Email Jika Tidak Masuk di Email Utama.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var HOST_URL = "https://alumni.umi.ac.id/"
    </script>
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#ff7e46",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
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
                        "secondary": "#3F4254",
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
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>

    <script src="<?= base_url() ?>/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/js/scripts.bundle.js"></script>


    <script src="<?= base_url() ?>/assets/js/pages/custom/login/login-general.js"></script>
</body>

</html>