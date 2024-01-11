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
    <base href="">
    <meta charset="utf-8" />
    <title>Tracer Study - Universitas Muslim Indonesia</title>
    <meta name="description" content="Tracer Study Universitas Muslim Indonesia" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="assets/media/logos/umi.png" />

</head>
<!--end::Head-->

<body id="kt_body"
    class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">

    <div class="d-flex flex-column-fluid mt-5">
        <div class="container">
            <div class="alert alert-custom alert-light-info fade show mb-5" role="alert">
                <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
                <div class="alert-text">
                    <span class="lead" style="font-weight: bold;">KUESIONER TRACER STUDY BAGI STAKEHOLDERS</span><br>
                    Yang terhormat user/pengguna lulusan, <br><br>

                    Dalam rangka meningktakan mutu lulusan agar memiliki kompetensi yang handal dan profesional di bidangnya Masing-Masing. Untuk itu kami mengharapkan umpan balik/feedback dari stakeholders/pengguna/user terkait kinerja lulusan kami selama di instansi/perusahaan Bapak/Ibu dan kompetensi yang diharapkan dari tiap mahasiswa. <br><br>

                    Survey ini digunakan sebagai bahan evaluasi kinerja lulusan serta wujud nyata untuk meningkatkan mutu lulusan nantinya. Segala hal dalam kuesioner ini bersifat terbatas dan hanya digunakan sebagai bahan evaluasi internal Fakultas Ilmu Komputer Universitas Muslim Indonesia. <br><br>
                    <hr>
                    <span class="text-muted">Koresponden adalah pihak yang berkepentingan/menggunakan jasa Alumni Universitas Muslim Indonesia</span>
                </div> 
            </div>

            <?php
                if (Session()->getFlashData('status')) {
                    if (Session()->getFlashData('status') == "berhasil") {
                        echo '<div class="alert alert-custom alert-info fade show" role="alert">
                                <div class="alert-text">Selamat Anda Berhasil Mengisi Data Survei Pengguna Lulusan</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>';
                    }else if(Session()->getFlashData('status') == "gagal"){
                        echo '<div class="alert alert-custom alert-danger fade show" role="alert">
                                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                <div class="alert-text">Mohon Maaf Anda Gagal Mengisi Data Survei Pengguna Lulusan :(</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>';
                    }
                }
            ?>
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <h3 class="card-title">
                        Survei - Pengguna Lulusan
                    </h3>
                </div>

                <div class="card-body">
                            <form class="form-validate-jquery" action="<?= base_url('pengguna-kesehatan/store') ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="status" value="Kesehatan">
                            <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">A. IDENTITAS PIHAK PENGGUNA</legend>
                                    <p><span class="text-info">*)</span> Pihak Pengguna adalah instansi/perusahaan yang menggunakan jasa alumni Universitas Muslim Indonesia</p>

                                    <!-- Basic text input -->
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Nama Penilai <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" value="" name="nama_penilai" class="form-control" required placeholder="Nama Penilai">
                                        </div>
                                    </div>
                                    <!-- /basic text input -->

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" value="1" class="form-check-input" name="penilai_jen_kel" required>
                                                    Laki-laki
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" value="2" class="form-check-input" name="penilai_jen_kel">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">NIK / NIP <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="penilai_nik_nip" class="form-control" required placeholder="NIK / NIP">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Jabatan <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="penilai_jabatan" class="form-control" required placeholder="Jabatan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Nomor HP/WA <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="penilai_no_phone" class="form-control" required placeholder="Nomor HP/WA">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Email <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="email" name="penilai_email" class="form-control" required placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Nama Kantor / Instansi <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="penilai_nama_kantor" class="form-control" required placeholder="Nama Kantor / Instansi">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Nama Pimpinan <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="penilai_nama_pimpinan" class="form-control" required placeholder="Nama Pimpinan">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Alamat Kantor / Instansi <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="penilai_alamat_kantor" class="form-control" required placeholder="Alamat Kantor / Instansi">
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">B. ALUMNI YANG DINILAI</legend>
                                    <p><span class="text-info">*)</span> Alumni yang dinilai adalah lulusanUniversitas Muslim Indonesia</p>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Nama <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="alumni_nama" class="form-control" required placeholder="Mohon memasukkan Nama Lengkap tanpa gelar alumni yang dinilai">
                                        </div>
                                    </div>
                                    <!-- /basic text input -->

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" value="1" class="form-check-input" name="alumni_jen_kel" required>
                                                    Laki-laki
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" value="2" class="form-check-input" name="alumni_jen_kel">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Tahun Terdaftar di Instansi <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="number" name="alumni_thn_kerja" class="form-control" required placeholder="Tahun mulai kerja atau bergabung dengan instansi. Contoh Format: 2020">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Jabatan/Posisi Alumni <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="alumni_jabatan" class="form-control" required placeholder="Jabatan/Posisi Alumni Saat Ini">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Tugas Utama Alumni <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="alumni_tugas_utama" class="form-control" required placeholder="Tugas Utama Alumni Saat Ini">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Gaji Pertama Masuk Kerja <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" value="1" class="form-check-input" name="alumni_gaji_pertama" required>
                                                    Rp. 1 - Rp. 1.999.999
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" value="2" class="form-check-input" name="alumni_gaji_pertama">
                                                    Rp. 2.000.000 - Rp. 2.999.999
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" value="3" class="form-check-input" name="alumni_gaji_pertama">
                                                    > Rp. 3.000.000
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Gaji Pokok Alumni Perbulan Saat Ini <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="number" name="alumni_gaji" class="form-control" required placeholder="Gaji Pokok Alumni Perbulan Saat Ini. Contoh: 2500000">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Honor/Bonus Rata-Rata Alumni Perbulan (Jika Ada)</label>
                                        <div class="col-lg-9">
                                            <input type="number" name="alumni_honor" class="form-control" placeholder="Silahkan dimasukkan jika ada. Contoh: 2500000">
                                        </div>
                                    </div>

                                    <!-- Input with icons -->

                                </fieldset>
                                <!-- /input with icons -->
                                <fieldset class="mb-3">
                                    <legend class="text-uppercase font-size-sm font-weight-bold">C. TANGGAPAN PIHAK PENGGUNA TERHADAP KINERJA ALUMNI</legend>
                                    <p><span class="text-info">*)</span> Petunjuk
                                        <ul>
                                            <li>
                                                Untuk setiap nomor kriteria, berilah nilai yang sesuai dengan melingkari salah satu skor yang sesuai
                                            </li>
                                            <li>
                                                Berikut adalah penjelasan mengenai definisi dan intepetrasi skor:
                                                <ol>
                                                    <li>
                                                        Kurang
                                                    </li>
                                                    <li>
                                                        Cukup
                                                    </li>
                                                    <li>
                                                        Baik
                                                    </li>
                                                    <li>
                                                        Sangat Baik
                                                    </li>
                                                </ol>
                                            </li>
                                        </ul>
                                    </p>
                                    <legend class="text-capitalize font-size-sm font-weight-bold">Jenis Kemampuan & Tanggapan Pengguna</legend>


                                    <!-- 3 -->
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Integritas (etika dan moral) <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="integritas" required>
                                                    Kurang
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="2" name="integritas">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="3" name="integritas">
                                                    Baik
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="4" name="integritas">
                                                    Sangat Baik
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 4 -->
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Keahlian berdasarkan bidang ilmu (Profesionalisme) <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="keahlian" required>
                                                    Kurang
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="2" name="keahlian">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="3" name="keahlian">
                                                    Baik
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="4" name="keahlian">
                                                    Sangat Baik
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 5 -->
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Bahasa Inggris <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="bahasa" required>
                                                    Kurang
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="2" name="bahasa">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="3" name="bahasa">
                                                    Baik
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="4" name="bahasa">
                                                    Sangat Baik
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Penggunaan Teknologi Informasi <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="penggunaan_ti" required>
                                                    Kurang
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="2" name="penggunaan_ti">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="3" name="penggunaan_ti">
                                                    Baik
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="4" name="penggunaan_ti">
                                                    Sangat Baik
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Komunikasi <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="komunikasi" required>
                                                    Kurang
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="2" name="komunikasi">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="3" name="komunikasi">
                                                    Baik
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="4" name="komunikasi">
                                                    Sangat Baik
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kerjasama Tim <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="kerjasama" required>
                                                    Kurang
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="2" name="kerjasama">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="3" name="kerjasama">
                                                    Baik
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="4" name="kerjasama">
                                                    Sangat Baik
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Pengembangan Diri <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="pengembangan_diri" required>
                                                    Kurang
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="2" name="pengembangan_diri">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="3" name="pengembangan_diri">
                                                    Baik
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="4" name="pengembangan_diri">
                                                    Sangat Baik
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kesiapan terjun di masyarakat <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="kejujuran" required>
                                                    Kurang
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="2" name="kejujuran">
                                                    Cukup
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="3" name="kejujuran">
                                                    Baik
                                                </label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="4" name="kejujuran">
                                                    Sangat Baik
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Penilaian Pihak Pengguna Terhadap Kinerja Alumni (Secara Keseluruhan) <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea rows="3" cols="5" name="penilaian_all" class="form-control" required placeholder="Silahkan masukkan penilaian secara keseluruhan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Kritikan dan Saran Pihak Pengguna Terhadap Universitas Muslim Indonesia <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea rows="3" cols="5" name="kritik_saran" class="form-control" required placeholder="Kritikan dan Saran Pihak Pengguna Terhadap Universitas Muslim Indonesia"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-lg-3">Harapan Pihak Pengguna Terhadap Universitas Muslim Indonesia <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <textarea rows="3" cols="5" name="harapan" class="form-control" required placeholder="Harapan Pihak Pengguna Terhadap Universitas Muslim Indonesia"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-left"><div class="g-recaptcha" data-sitekey="6LfHwwcaAAAAAOQOIECmEcQnE39vypBtGZe9OkGk" data-theme="light" data-type="image" ></div></div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="1" name="keabsahan" required>
                                                    Dengan ini menyatakan bahwa Form Survey Pengguna Alumni diisi sesuai dengan keadaan yang sebenarnya
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="reset" class="btn btn-light" onClick="window.history.back()" id="reset">Kembali <i class="icon-reload-alt ml-2"></i></button>
                                    <button type="submit" class="btn btn-primary ml-3">Submit <i class="la la-file ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form validation -->
            </div>
        </div>
    </div>

    <script>
        var HOST_URL = "https://alumni.umi.ac.id/";
    </script>
    <!--begin::Footer-->
    <!--doc: add "bg-white" class to have footer with solod background color-->
    <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
        <!--begin::Container-->
        <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">2021&copy;</span>
                <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Crafted
                    with love by IT Team Development</a>
            </div>
            <!--end::Copyright-->

            <!--begin::Nav-->
            <div class="nav nav-dark order-1 order-md-2">
                <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-3 pr-0">Manual Book</a>
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Main-->



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
                        "primary": "#1BC5BD",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#6993FF",
                        "warning": "#FFA800",
                        "danger": "#ff7e46",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#1BC5BD",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#E1E9FF",
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
    <script src="http://localhost:8080/assets/plugins/global/plugins.bundle.js"></script>
    <script src="http://localhost:8080/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="http://localhost:8080/assets/js/scripts.bundle.js"></script>
    <script src="http://localhost:8080/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="http://localhost:8080/assets/js/pages/widgets.js"></script>
    <script src="http://localhost:8080/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="http://localhost:8080/assets/js/pages/crud/ktdatatable/api/methods.js"></script>
    <script src="http://localhost:8080/assets/js/sweetalert2.init.js"></script>
    <script src="http://localhost:8080/assets/js/pages/crud/forms/validation/form-widgets.js"></script>
    <script>
        var HOST_URL = "https://alumni.umi.ac.id/"
    </script>