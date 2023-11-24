<?php

?>
<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">
                    Biodata Alumni
                </h3>
            </div>
            <!--begin::Form-->
            <div class="card-body">
                <?php
                if (Session()->getFlashData('status')) {
                    if (Session()->getFlashData('status') == "berhasil") {
                        echo '<div class="alert alert-custom alert-info fade show" role="alert">
                                    <div class="alert-text">Pembaharuan Biodata Berhasil</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>';
                    } else if (Session()->getFlashData('status') == "gagal") {
                        echo '<div class="alert alert-custom alert-danger fade show" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">Pembaharuan Biodata Gagal</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>';
                    }
                }
                ?>
                <form class="form" id="kt_form" action="<?= base_url('biodata/store') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <div class="alert alert-light-primary d-none mb-15" role="alert" id="kt_form_msg">
                            <div class="alert-icon">
                                <i class="la la-warning"></i>
                            </div>
                            <div class="alert-text font-weight-bold">
                                Silahkan masukkan informasi untuk mengaktifkan Akun ALUMNI FIKOM UMI.
                            </div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span><i class="ki ki-close "></i></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Nama Lengkap *</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" id="nama_lengkap" value="<?= get_data_registrasi(Session()->get('C_NPM'))->nama ?>" readonly />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Jenis Kelamin *</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-genderless"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Tempat Lahir *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" id="tempat_lahir" value="<?= get_data_biodata(Session()->get('C_NPM'))->tempat_lahir ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-map-pin"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2">Tanggal Lahir *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" id="tanggal_lahir" value="<?= get_data_biodata(Session()->get('C_NPM'))->tanggal_lahir ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">NIM *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nim" placeholder="NIM" id="nim" value="<?= get_data_registrasi(Session()->get('C_NPM'))->nim ?>" readonly />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-certificate"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2">Program Studi *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <select name="program_studi" id="program_studi" class="form-control">
                                    <?php
                                    if (get_data_biodata(Session()->get('C_NPM'))->program_studi == '') {
                                        echo '<option value="">--Pilih Program Studi--</option>';
                                    } else {
                                        echo '<option value="' . get_data_nama_prodi_with_kode(get_data_biodata(Session()->get('C_NPM'))->program_studi)->C_KODE_PRODI . '">' . get_data_nama_prodi_with_kode(get_data_biodata(Session()->get('C_NPM'))->program_studi)->NAMA_PRODI . '</option>';
                                        echo '<option value="">--Pilih Program Studi--</option>';
                                    }
                                    ?>
                                    <?php
                                    foreach (get_data_program_studi() as $key => $value) {
                                        echo '<option value="' . $value->C_KODE_PRODI . '">' . $value->NAMA_PRODI . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-ge"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Tahun Masuk *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="tahun_masuk" placeholder="Tahun Masuk" id="tahun_masuk" value="<?= get_data_biodata(Session()->get('C_NPM'))->tahun_masuk ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-angle-down"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2">Tahun Keluar *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="tahun_keluar" placeholder="Tahun Keluar" id="tahun_keluar" value="<?= get_data_biodata(Session()->get('C_NPM'))->tahun_keluar ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-angle-up"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Alamat *</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" id="alamat" value="<?= get_data_biodata(Session()->get('C_NPM'))->alamat ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-institution"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-1">Negara *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="negara" id="negara" class="form-control">
                                    <?php
                                    if (get_data_biodata(Session()->get('C_NPM'))->negara == '') {
                                        echo '<option value="">--Pilih Negara--</option>';
                                    } else {
                                        echo '<option value="' . get_data_country_by_id(get_data_biodata(Session()->get('C_NPM'))->negara)->id . '">' . get_data_country_by_id(get_data_biodata(Session()->get('C_NPM'))->negara)->name . '</option>';
                                        echo '<option value="">--Pilih Negara--</option>';
                                    }
                                    ?>
                                    <?php
                                    foreach (get_data_country() as $key => $value) {
                                        echo '<option value="' . $value->id . '">' . $value->name . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-lightbulb-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Provinsi *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <?php
                                    if (get_data_biodata(Session()->get('C_NPM'))->provinsi == '') {
                                        echo '<option value="">--Pilih Provinsi--</option>';
                                    } else {
                                        echo '<option value="' . get_data_biodata(Session()->get('C_NPM'))->provinsi . '">' . get_data_provinsi_with_id(get_data_biodata(Session()->get('C_NPM'))->provinsi)->name . '</option>';
                                        echo '<option value="">--Pilih Provinsi--</option>';
                                    }
                                    ?>
                                    <?php
                                    foreach (get_data_provinces() as $key => $value) {
                                        echo '<option value="' . $value->id . '">' . $value->name . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-meanpath"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Kabupaten *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="kabupaten" id="kabupaten" class="form-control">
                                    <?php
                                    if (get_data_biodata(Session()->get('C_NPM'))->kabupaten == '') {
                                        echo '<option value="">--Pilih Kabupaten--</option>';
                                    } else {
                                        echo '<option value="' . get_data_regencies_with_id(get_data_biodata(Session()->get('C_NPM'))->kabupaten)->id . '">' . get_data_regencies_with_id(get_data_biodata(Session()->get('C_NPM'))->kabupaten)->name . '</option>';
                                        echo '<option value="">--Pilih Kabupaten--</option>';
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-mouse-pointer"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-1">Pekerjaan *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control">
                                    <?php
                                    if (get_data_biodata(Session()->get('C_NPM'))->jenis_pekerjaan == '') {
                                        echo '<option value="">--Pilih Jenis Pekerjaan--</option>';
                                    } else {
                                        echo '<option value="' . get_data_pekerjaan_by_id(get_data_biodata(Session()->get('C_NPM'))->jenis_pekerjaan)->id_pekerjaan . '">' . get_data_pekerjaan_by_id(get_data_biodata(Session()->get('C_NPM'))->jenis_pekerjaan)->nm_pekerjaan . '</option>';
                                        echo '<option value="">--Pilih Jenis Pekerjaan--</option>';
                                    }
                                    ?>
                                    <?php
                                    foreach (get_data_pekerjaan() as $key => $value) {
                                        echo '<option value="' . $value->id_pekerjaan . '">' . $value->nm_pekerjaan . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-pied-piper-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Nama Kantor/Perusahaan *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Kantor atau Perusahaan" id="nama_perusahaan" value="<?= get_data_biodata(Session()->get('C_NPM'))->nama_perusahaan ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-server"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Tanggal Masuk Kerja *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal_masuk_kerja" placeholder="Tanggal Masuk Kerja" id="tanggal_masuk_kerja" value="<?= get_data_biodata(Session()->get('C_NPM'))->tanggal_masuk_kerja ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-minus-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Status Pekerjaan *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="status_pekerjaan" id="status_pekerjaan" class="form-control">
                                    <?php
                                    if (get_data_biodata(Session()->get('C_NPM'))->status_pekerjaan == '' || get_data_biodata(Session()->get('C_NPM'))->status_pekerjaan == 0) {
                                        echo '<option value="">--Pilih Status Pekerjaan--</option>';
                                    } else {
                                        echo '<option value="' . get_data_status_pekerjaan_by_id(get_data_biodata(Session()->get('C_NPM'))->status_pekerjaan)->id_job . '">' . get_data_status_pekerjaan_by_id(get_data_biodata(Session()->get('C_NPM'))->status_pekerjaan)->status_job . '</option>';
                                        echo '<option value="">--Pilih Status Pekerjaan--</option>';
                                    }
                                    ?>
                                    <?php
                                    
                                    foreach (get_data_status_pekerjaan() as $key => $value) {
                                        echo '<option value="' . $value->id_job . '">' . $value->status_job . '</option>';
                                    }
                                    
                                    ?>

                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-asterisk"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Email *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" id="email" value="<?= get_data_registrasi(Session()->get('C_NPM'))->email ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-google"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2">Nohp/Whatsapp *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nomor_handphone" placeholder="Whatsapp" id="nomor_handphone" value="<?= get_data_registrasi(Session()->get('C_NPM'))->nomor_handphone ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-mobile-phone"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 ml-lg-auto">
                            <button type="submit" class="btn btn-primary mr-2">Proses</button>
                            <button type="reset" class="btn btn-light-primary">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('layouts/footer.php') ?>
<script>
    var HOST_URL = "http://localhost:8080"
</script>
<script>
    $('#provinsi').on('click', function() {
        $('#kabupaten').html('');
        console.log("Selamat Datang");
        var code = $('#provinsi').val();
        console.log('Ini Adalah Code : ' + code);
        $.ajax({
            type: "GET",
            url: HOST_URL + "/get_regencies/" + code,
            dataType: "json",
            success: function(response) {
                $.each(response.data, function(i, v) {
                    $('#kabupaten').append('<option value="' + v.id + '">' + v.name + '</option>');
                });
            }
        });
    });
</script>