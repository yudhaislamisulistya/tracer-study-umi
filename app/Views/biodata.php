<?php

?>
<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">
                    Biodata Pekerjaan Alumni
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
                        <label class="col-form-label col-md-2">Tahun Masuk Kuliah *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="tahun_masuk" placeholder="Tahun Masuk" id="tahun_masuk" value="<?= $data->tahun_masuk ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-angle-down"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2">Tahun Keluar Kuliah *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="tahun_keluar" placeholder="Tahun Keluar" id="tahun_keluar" value="<?= $data->tahun_keluar ?>" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-angle-up"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Alamat Domisili *</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" id="alamat" value="<?= $data->alamat ?>" />
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

                                    if ($data->negara === "") {
                                        echo '<option value="">Pilih Negara</option>';
                                    } else {
                                        echo '<option value="' . $data->negara . '">' . get_data_country_by_id($data->negara)->name . '</option>';
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
                                    if ($data->provinsi === "") {
                                        echo '<option value="">Pilih Provinsi</option>';
                                    } else {
                                        echo '<option value="' . $data->provinsi . '">' . get_data_provinsi_with_id($data->provinsi)->name . '</option>';
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
                                    if ($data->kabupaten === "") {
                                        echo '<option value="">Pilih Kabupaten</option>';
                                    } else {
                                        echo '<option value="' . $data->kabupaten . '">' . get_data_regencies_with_id($data->kabupaten)->name . '</option>';
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
                        <label class="col-form-label col-md-2">Status Pekerjaan *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <select name="status_pekerjaan" id="status_pekerjaan" class="form-control">
                                    <?php

                                    if ($data->status_pekerjaan === "0" || $data->status_pekerjaan === "") {
                                        echo '<option value="">Pilih Status Pekerjaan</option>';
                                    } else {
                                        echo '<option value="' . $data->status_pekerjaan . '">' . get_data_status_pekerjaan_by_id($data->status_pekerjaan)->status_job . '</option>';
                                    }
                                    ?>
                                    <?php
                                    echo '<option value="" disabled>====================</option>';
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
                        <label class="col-form-label col-md-2">Pekerjaan *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <select name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control">
                                    <?php
                                    if ($data->jenis_pekerjaan === "") {
                                        echo '<option value="-">Pilih Jenis Pekerjaan</option>';
                                    } else {
                                        echo '<option value="' . $data->jenis_pekerjaan . '">' . get_data_pekerjaan_by_id($data->jenis_pekerjaan)->nm_pekerjaan . '</option>';
                                    }
                                    ?>
                                    <?php
                                    foreach (get_data_pekerjaan() as $key => $value) {
                                        echo '<option value="' . $value->id_pekerjaan . '">' . $value->nm_pekerjaan . '</option>';
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="jenis_pekerjaan_hidden" id="jenis_pekerjaan_hidden" value="">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-pied-piper-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2 mt-4">Nama Instansi atau Institusi *</label>
                        <div class="col-md-4 mt-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Instansi atau Institusi" id="nama_perusahaan" value="<?= $data->nama_perusahaan ?>" />
                                <input type="hidden" name="nama_perusahaan_hidden" id="nama_perusahaan_hidden" value="<?= $data->nama_perusahaan ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-server"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2 mt-4" id="tanggal-label">Tanggal Masuk Kerja *</label>
                        <div class="col-md-4 mt-4">
                            <div class="input-group">
                                <input type="date" class="form-control" name="tanggal_masuk_kerja" placeholder="Tanggal Masuk Kerja" id="tanggal_masuk_kerja" value="<?= $data->tanggal_masuk_kerja ?>" />
                                <input type="hidden" name="tanggal_masuk_kerja_hidden" id="tanggal_masuk_kerja_hidden" value="<?= $data->tanggal_masuk_kerja ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-minus-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Email *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="email" placeholder="Email" id="email" value="<?= $data->email ?>" />
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
                                <input type="text" class="form-control" name="nomor_handphone" placeholder="Whatsapp" id="nomor_handphone" value="<?= $data->nomor_handphone ?>" />
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
    var HOST_URL = "https://alumni.umi.ac.id/"
</script>
<script>
    $('#provinsi').on('change', function() {
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

$(document).ready(function() {
        $('#status_pekerjaan').change(function() {
            var statusPekerjaan = $(this).val();
            var jenisPekerjaan = $('#jenis_pekerjaan');
            var jenisPekerjaanHidden = $('#jenis_pekerjaan_hidden');
            var namaPerusahaan = $('#nama_perusahaan');
            var namaPerusahaanHidden = $('#nama_perusahaan_hidden');
            var tanggalMasukKerja = $('#tanggal_masuk_kerja');
            var tanggalMasukKerjaHidden = $('#tanggal_masuk_kerja_hidden');
            var tanggalLabel = $('#tanggal-label');

            if (statusPekerjaan === "2") { // Belum Bekerja / Menganggur
                jenisPekerjaan.val('-').prop('disabled', true);
                jenisPekerjaanHidden.val('-');
                namaPerusahaan.val('-').prop('readonly', true);
                namaPerusahaanHidden.val('-');
                tanggalMasukKerja.val('').prop('disabled', true);
                tanggalMasukKerjaHidden.val('');
            } else if (statusPekerjaan === "3") { // Lanjut Studi
                jenisPekerjaan.val('101').prop('disabled', true);
                jenisPekerjaanHidden.val('101');
                namaPerusahaan.prop('readonly', false);
                namaPerusahaanHidden.val(namaPerusahaan.val());
                tanggalLabel.text('Tanggal Masuk Kuliah *');
                tanggalMasukKerja.prop('disabled', false);
                tanggalMasukKerjaHidden.val(tanggalMasukKerja.val());
            } else if (statusPekerjaan === "1") { // Bekerja
                jenisPekerjaan.prop('disabled', false);
                jenisPekerjaanHidden.val(jenisPekerjaan.val());
                namaPerusahaan.prop('readonly', false);
                namaPerusahaanHidden.val(namaPerusahaan.val());
                tanggalLabel.text('Tanggal Masuk Kerja *');
                tanggalMasukKerja.prop('disabled', false);
                tanggalMasukKerjaHidden.val(tanggalMasukKerja.val());
            } else {
                jenisPekerjaan.prop('disabled', false);
                jenisPekerjaanHidden.val(jenisPekerjaan.val());
                namaPerusahaan.prop('readonly', false);
                namaPerusahaanHidden.val(namaPerusahaan.val());
                tanggalLabel.text('Tanggal Masuk Kerja *');
                tanggalMasukKerja.prop('disabled', false);
                tanggalMasukKerjaHidden.val(tanggalMasukKerja.val());
            }
        });

        // Trigger the change event on page load to set the initial state correctly
        $('#status_pekerjaan').trigger('change');

        // Update hidden fields on input change
        $('#jenis_pekerjaan').on('input', function() {
            $('#jenis_pekerjaan_hidden').val($(this).val());
        });
        $('#nama_perusahaan').on('input', function() {
            $('#nama_perusahaan_hidden').val($(this).val());
        });
        $('#tanggal_masuk_kerja').on('input', function() {
            $('#tanggal_masuk_kerja_hidden').val($(this).val());
        });
    });
</script>