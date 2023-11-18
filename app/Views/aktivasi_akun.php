<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>/../../../../">
    <meta charset="utf-8" />
    <title>Tracer Study - Univeristas Muslim Indonsia</title>
    <meta name="description"
        content="Tracer Study merupakan salah satu metode yang digunakan oleh beberapa perguruan tinggi, khususnya di Indonesia untuk memperoleh umpan balik dari alumni" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="<?= base_url() ?>/https://keenthemes.com/metronic" />
    <link rel="stylesheet"
        href="<?= base_url() ?>/https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="<?= base_url() ?>/assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/media/logos/favicon.ico" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                style="background-image: url('assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="<?= base_url() ?>/#">
                            <img src="<?= base_url() ?>/assets/media/logos/logo-orange.png" class="max-h-75px" alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->
                    <?php
                        if (check_status_activation($this->data['activationCode'])->status == 1) {
                            if ($this->data['statusCode'] == 200) {
                                echo '<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">Akun Alumni Anda Berhasil Diaktivasi, Silahkan Ke Halaman Login</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                        <div class="alert-icon"><i class="flaticon-seondary"></i></div>
                                        <div class="alert-text">Halaman Secara Otomatis Redirect Selama 3 Detik Ke Halaman Login</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>';
                            }else{
                                echo '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                        <div class="alert-text">Akun Alumni Anda Gagal Diaktivasi</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                        <div class="alert-icon"><i class="flaticon-seondary"></i></div>
                                        <div class="alert-text">Halaman Secara Otomatis Redirect Selama 3 Detik Ke Halaman Login</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                            </button>
                                        </div>
                                    </div>';
                            }
                        }else{
                            echo '<div class="alert alert-custom alert-light-info fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">Link Aktivasi Sudah Digunakan, Silahkan Login Yah :)</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                    <div class="alert-icon"><i class="flaticon-seondary"></i></div>
                                    <div class="alert-text">Halaman Secara Otomatis Redirect Selama 3 Detik Ke Halaman Login</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>';
                        }

                    ?>
                    <span>Silahkan Login <a href="<?= base_url('/') ?>">Disini</a></span>
                    <span>Terkendala Dalam Aktivasi Akun Alumni, Silahkan Hubungi Admin Tracer <a href="https://api.whatsapp.com/send?phone=6285340472927&text=Halo%20Admin%20Tracer,%20Saya%20Terkendala%20Dalam%20Aktivasi%20Akun.%20Mohon%20Bantuannya%20:)">Disini</a></span>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="<?= base_url() ?>/assets/js/scripts.bundle.js"></script>
    <script>
        setTimeout(() => {
            window.location = '<?= base_url('/get_password/'.$this->data['activationCode'].'') ?>'
        }, 3000);
    </script>
</body>

</html>