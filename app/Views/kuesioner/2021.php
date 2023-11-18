<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <?php
            if (check_biodata(Session()->get('C_NPM')) == 0) {
                echo '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon2-warning"></i></div>
                        <div class="alert-text">Mohon Maaf! Silahkan Lengkapi Profile atau Biodata Anda Melalui Link <a class="text-dark" href="'.base_url("biodata").'">Disini</a> Sebelum Mengisi Kuesioner</div>
                    </div>';
            }else{
                echo '<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                    <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
                    <div class="alert-text">Yuhuuuu!!!! Selamat Anda Berhak Mengisi Kuesioner, Silahkan Mengisi Melalui Form Dibawah Ini</div>
                </div>';
            }
        ?>
        <div class="alert alert-custom alert-notice alert-light-info fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text"><span class="h4">Informasi Kuesioner Tracer Study.</span><br>
                Saat ini Anda sudah dapat mengisi Kuesioner Tracer Study.<br>
                Pengisian Tracer Study hanya dapat dilakukan oleh seluruh Lulusan Universitas Muslim Indonesia tahun
                2019.<br>
                Kami ucapkan terimakasih dan penghargaan setinggi-tingginya buat para lulusan atas partisipasi dan
                dukungan yang diberikan dalam kegiatan Tracer Study tahun 2021.</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
        
        <?php
        
        if (check_biodata(Session()->get('C_NPM')) != 0) { ?>
                <?php
                    if (Session()->getFlashData('status')) {
                        if (Session()->getFlashData('status') == "berhasil") {
                            echo '<div class="alert alert-custom alert-info fade show" role="alert">
                                    <div class="alert-text">Selamat Anda Berhasil Mengisi Data Kuesioner</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                        </button>
                                    </div>
                                </div>';
                        }else if(Session()->getFlashData('status') == "gagal"){
                            echo '<div class="alert alert-custom alert-danger fade show" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">Mohon Maaf Anda Gagal Mengisi Data Kuesioner :(</div>
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
                    Mengisi Data Kuesioner
                </h3>
            </div>
            <!--begin::Form-->
            <div class="card-body">
                <form class="form" id="kt_form" action="<?= base_url('kuesioner_2021/store') ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="jenis_kuesioner" value="kue_2021">
                    <legend class="text-uppercase font-size-sm font-weight-bold">Identitas Alumni</legend>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-1">( f1 )</label>
                        <label class="col-form-label col-lg-2">Nomor Induk Mahasiswa :</label>
                        <div class="col-lg-9">
                            <input readonly name="nim" value="<?= Session()->get('C_NPM') ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">Kode PT :</label>
                            </div>
                            <div class="col-lg-9">
                                <input readonly value="091002 - Universitas Muslim Indonesia" class="form-control" readonly>
                                <input readonly  value="091002" name="kode_pt" class="form-control" type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label"> Tahun Masuk :</label>
                            </div>
                            <div class="col-lg-9">
                                <input readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->tahun_masuk ?>" name="tahun_masuk" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label"> Tahun Lulus :</label>
                            </div>
                            <div class="col-lg-9">
                                <input readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->tahun_keluar ?>" name="tahun_lulus" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">Program Studi :</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="hidden" readonly required="" value="<?= get_data_kode_prodi_with_name(get_data_biodata(Session()->get('C_NPM'))->program_studi)->C_KODE_PRODI ?>" name="kode_prodi" class="form-control">
                                <input readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->program_studi ?>" name="program_studi" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">Nama Lengkap :</label>
                            </div>
                            <div class="col-lg-9">
                                <input readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->nama_lengkap ?>" name="nama_lengkap" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">Nomor Telepon/HP :</label>
                            </div>
                            <div class="col-lg-9">
                                <input readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->nomor_handphone ?>" name="nomor_handphone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">Alamat Email :</label>
                            </div>
                            <div class="col-lg-9">
                                <input readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->email ?>" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">NIK :</label>
                            </div>
                            <div class="col-lg-9">
                                <input required="" value="<?= get_data_lulusan(Session()->get('C_NPM'))->nikmsmh ?>" name="nik" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="control-label"></label>
                            </div>
                            <div class="col-lg-2">
                                <label class="control-label">NPWP :</label>
                            </div>
                            <div class="col-lg-9">
                                <input required="" value="<?= get_data_lulusan(Session()->get('C_NPM'))->npwpmsmh ?>" name="npwp" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- panel tracer start-->
                    <legend class="text-uppercase font-size-sm font-weight-bold">Kuesioner Wajib</legend>
                        <div class="card-body">
                            <div id="f8" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1 red-text">( f8 )</label>
                                    <label class="control-label col-sm-4">Jelaskan Status Anda Saat Ini? </label>
                                    <div class="col-sm-7">
                                        <input value="1" name="f8" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f8)) == '1') {
                                                                        echo "checked";
                                                                    } ?> valuetable="" table-striped="" table-responsive="1" onclick="hideF8()" type="radio"> [1] Ya <br>
                                        <input value="3" name="f8" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f8)) == '3') {
                                                                        echo "checked";
                                                                    } ?> valuetable="" table-striped="" table-responsive="1" onclick="showF5C()" type="radio"> [3] Wiraswasta <br>
                                        <input value="4" name="f8" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f8)) == '4') {
                                                                        echo "checked";
                                                                    } ?> valuetable="" table-striped="" table-responsive="1" onclick="showF18()" type="radio"> [4] Melanjutkan Pendidikan <br>
                                        <input value="5" name="f8" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f8)) == '5') {
                                                                        echo "checked";
                                                                    } ?> valuetable="" table-striped="" table-responsive="1" onclick="hideF8()" type="radio"> [5] Tidak Kerja Tetapi Sedang Mencari Kerja <br>
                                        <input name="f8" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f8)) == '2') {
                                                                echo "checked";
                                                            } ?> value="2" onclick="hideF8()" type="radio"> [2] Belum Memungkinan Bekerja
                                    </div>
                                </div>
                            </div>
                            <div id="f504" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1 red-text">( f504 )</label>
                                    <label class="control-label col-sm-4">Apakah anda telah mendapatkan pekerjaan <= 6 bulan / termasuk kerja sebelum lulus?</i></label>
                                    <div class="col-sm-7">
                                        <input name="f504" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f504)) == '1') {
                                                                echo "checked";
                                                            } ?> value="1" required type="radio">[1] Dalam Berapa Bulan Anda Mendapatkan Pekerjaan <input name="f502" size="5" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f502; ?>" class="width40" type="text"><small>(f5-02)</small><br /><br />
                                        <input name="f504" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f504)) == '2') {
                                                                echo "checked";
                                                            } ?> value="2" required type="radio">&nbsp;[2] Dalam Berapa Bulan Anda Mendapatkan Pekerjaan <input class="width40" name="f506" size="5" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f506; ?>" type="text"><small>(f5-06)</small><br>

                                                            <br><br>&nbsp;Berapa Rata-Rata Pendapatan Anda Perbulan? (take home pay) <input class="width40" name="f505" size="5" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f505; ?>" type="text"><small>(f5-05)</small><br>
                                    </div>
                                </div>
                            </div>
                            <div id="f504" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1 red-text">( f510 )</label>
                                    <label class="control-label col-sm-4">Dimana Lokasi Tempat Bekerja Anda?</i></label>
                                    <div class="col-sm-7">
                                            <select name="f5a1" id="f5a1" class="form-control">
                                                <?php
                                                if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f5a1)) == '') {
                                                    echo '<option value="">--Pilih Provinsi--</option>';
                                                }else{
                                                    echo '<option value="'.(trim(get_data_lulusan(Session()->get('C_NPM'))->f5a1)).'">'.get_data_provinsi_with_id((trim(get_data_lulusan(Session()->get('C_NPM'))->f5a1)))->name.'</option>';
                                                    echo '<option value="">--Pilih Provinsi--</option>';
                                                }
                                                ?>
                                                <?php
                                                    foreach (get_data_provinces() as $key => $value) {
                                                        echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                                    }
                                                ?>
                                            </select><small>(f5a1)</small><br>
                                            <select name="f5a2" id="f5a2" class="form-control">
                                                <?php
                                                if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f5a2)) == '') {
                                                    echo '<option value="">--Pilih Kabupaten--</option>';
                                                }else{
                                                    echo '<option value="'.(trim(get_data_lulusan(Session()->get('C_NPM'))->f5a2)).'">'.get_data_biodata((trim(get_data_lulusan(Session()->get('C_NPM'))->f5a2)))->name.'</option>';
                                                    echo '<option value="">--Pilih Kabupaten--</option>';
                                                }
                                                ?>
                                            </select><small>(f5a2)</small><br>
                                    </div>
                                </div>
                            </div>
                            <div id="f11" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1">( f11 )</label>
                                    <label class="control-label col-sm-4">Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</label>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input name="f1101" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1101)) == '1') {
                                                                        echo "checked";
                                                                    } ?> value="1" type="radio"> [1] Instansi pemerintah<br>
                                                <input name="f1101" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1101)) == '1') {
                                                                        echo "checked";
                                                                    } ?> value="6" type="radio"> [6] BUMN/BUMD<br>
                                                <input name="f1101" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1101)) == '1') {
                                                                        echo "checked";
                                                                    } ?> value="7" type="radio"> [7] Institusi/Organisasi Multilateral<br>
                                                <input name="f1101" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1101)) == '2') {
                                                                        echo "checked";
                                                                    } ?> value="2" type="radio"> [2] Organisasi non-profit/Lembaga Swadaya Masyarakat<br>
                                                <input name="f1101" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1101)) == '3') {
                                                                        echo "checked";
                                                                    } ?> value="3" type="radio"> [3] Perusahaan swasta<br>
                                                <input name="f1101" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1101)) == '4') {
                                                                        echo "checked";
                                                                    } ?> value="4" type="radio"> [4] Wiraswasta/perusahaan sendiri<br>
                                                <input name="f1101" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f11)) == '5') {
                                                                        echo "checked";
                                                                    } ?> value="5" type="radio"> [5] Lainnya, tuliskan:
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input class="form-control" name="f1102" size="60" maxlength="80" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f1102; ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="f5b" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1">( f5b )</label>
                                    <label class="control-label col-sm-4">Apa Nama Perusahaan/Kantor Anda Bekerja?</label>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input class="form-control" name="f5b" size="60" maxlength="80" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f5b; ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="f5c" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1">( f5c )</label>
                                    <label class="control-label col-sm-4">Bila Berwiraswasta, apa posisi atau jabatan Anda Saat Ini?</label>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input class="form-control" name="f5c" size="60" maxlength="80" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f5c; ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="f5d" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1">( f5d )</label>
                                    <label class="control-label col-sm-4">Apa Tingkat Tempat Kerja Anda ?</label>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input class="form-control" name="f5d" size="60" maxlength="80" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f5d; ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="f18" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1">( f18 )</label>
                                    <label class="control-label col-sm-4">Pertanyaan Studi Lanjut?</label>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                Pilih Sumber Biaya <input class="width40" name="f18a" size="15" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f18a; ?>" type="text"><small>(f18a)</small><br>
                                                Perguruan Tinggi <input class="width40" name="f18b" size="30" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f18b; ?>" type="text"><small>(f18b)</small><br>
                                                Program Studi <input class="width40" name="f18c" size="30" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f18c; ?>" type="text"><small>(f18c)</small><br>
                                                Tahun Masuk <input class="width40" name="f18d" size="30" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f18d; ?>" type="date"><small>(f18d)</small><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                function showF5C() {
                                    document.getElementById('f5c').style.display = "";
                                    document.getElementById('f18').style.display = "none";

                                }

                                function showF18() {
                                    document.getElementById('f18').style.display = "";
                                    document.getElementById('f5c').style.display = "none";
                                }

                                function hideF8() {
                                    document.getElementById('f5c').style.display = "none";
                                    document.getElementById('f18').style.display = "none";
                                }

                                hideF8();
                            </script>

                            <div id="f12" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1 red-text">( f12 )</label>
                                    <label class="control-label col-sm-4">Sebutkan sumberdana dalam pembiayaan kuliah?</label>
                                    <div class="col-sm-7">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input name="f1201" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1201)) == '1') {
                                                                        echo "checked";
                                                                    } ?> value="1" type="radio"> [1] Biaya Sendiri / Keluarga<br>
                                                <input name="f1201" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1201)) == '2') {
                                                                        echo "checked";
                                                                    } ?> value="2" type="radio"> [2] Beasiswa ADIK<br>
                                                <input name="f1201" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1201)) == '3') {
                                                                        echo "checked";
                                                                    } ?> value="3" type="radio"> [3] Beasiswa BIDIKMISI<br>
                                                <input name="f1201" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1201)) == '4') {
                                                                        echo "checked";
                                                                    } ?> value="4" type="radio"> [4] Beasiswa PPA<br>
                                                <input name="f1201" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1201)) == '5') {
                                                                        echo "checked";
                                                                    } ?> value="5" type="radio"> [5] Beasiswa AFIRMASI<br>
                                                <input name="f1201" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1201)) == '6') {
                                                                        echo "checked";
                                                                    } ?> value="6" type="radio"> [6] Beasiswa Perusahaan/Swasta<br>
                                                <input name="f1201" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1201)) == '7') {
                                                                        echo "checked";
                                                                    } ?> value="7" type="radio"> [7] Lainnya, tuliskan:
                                            </div>
                                            <div class="col-sm-2">
                                                <small>f12-01</small>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-10">
                                                <input class="form-control" name="f1202" size="60" maxlength="80" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f1202; ?>" type="text">
                                            </div>
                                            <div class="col-sm-2">
                                                <small> f12-02</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div id="f14" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1 red-text">( f14 )</label>
                                    <label class="control-label col-sm-4"> Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?</label>
                                    <div class="col-sm-7">
                                        <span>
                                            <input name="f14" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f14)) == '1') {
                                                                    echo "checked";
                                                                } ?> value="1" type="radio"> [1] Sangat Erat<br>
                                            <input name="f14" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f14)) == '2') {
                                                                    echo "checked";
                                                                } ?> value="2" type="radio"> [2] Erat<br>
                                            <input name="f14" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f14)) == '3') {
                                                                    echo "checked";
                                                                } ?> value="3" type="radio"> [3] Cukup Erat<br>
                                            <input name="f14" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f14)) == '4') {
                                                                    echo "checked";
                                                                } ?> value="4" type="radio"> [4] Kurang Erat<br>
                                            <input name="f14" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f14)) == '5') {
                                                                    echo "checked";
                                                                } ?> value="5" type="radio"> [5] Tidak Sama Sekali <br>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div id="f15" class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-1 red-text">( f15 )</label>
                                    <label class="control-label col-sm-4"> Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?</label>
                                    <div class="col-sm-7">
                                        <span>
                                            <input name="f15" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f15)) == '1') {
                                                                    echo "checked";
                                                                } ?> value="1" type="radio"> [1] Setingkat Lebih Tinggi<br>
                                            <input name="f15" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f15)) == '2') {
                                                                    echo "checked";
                                                                } ?> value="2" type="radio"> [2] Tingkat yang Sama<br>
                                            <input name="f15" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f15)) == '3') {
                                                                    echo "checked";
                                                                } ?> value="3" type="radio"> [3] Setingkat Lebih Rendah<br>
                                            <input name="f15" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f15)) == '4') {
                                                                    echo "checked";
                                                                } ?> value="4" type="radio"> [4] Tidak Perlu Pendidikan Tinggi<br>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <legend class="text-uppercase font-size-sm font-weight-bold">Kuesioner Optional</legend>
                                        <div class="card-body">
                                            <div id="f2" class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <label class="control-label ">( f2 )</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="control-label ">Menurut anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi anda?</label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <label>Perkuliahan (f21)</label>
                                                        <br />
                                                        <input name="f21" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f21)) == '1') {
                                                                                echo "checked";
                                                                            } ?> <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f21)) == '1') {
                                                                                        echo "checked";
                                                                                    } ?> value="1" type="radio"> [1] Sangat Besar<br>
                                                        <input name="f21" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f21)) == '2') {
                                                                                echo "checked";
                                                                            } ?> value="2" type="radio"> [2] Besar<br>
                                                        <input name="f21" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f21)) == '3') {
                                                                                echo "checked";
                                                                            } ?> value="3" type="radio"> [3] Cukup Besar<br>
                                                        <input name="f21" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f21)) == '4') {
                                                                                echo "checked";
                                                                            } ?> value="4" type="radio"> [4] Kurang<br>
                                                        <input name="f21" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f21)) == '5') {
                                                                                echo "checked";
                                                                            } ?> value="5" type="radio"> [5] Tidak Sama Sekali<br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5"></div>
                                                    <div class="col-sm-7">
                                                        <label>Demonstrasi (f22)</label>
                                                        <br />
                                                        <input name="f22" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f22)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="radio"> [1] Sangat Besar<br>
                                                        <input name="f22" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f22)) == '2') {
                                                                                echo "checked";
                                                                            } ?> value="2" type="radio"> [2] Besar<br>
                                                        <input name="f22" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f22)) == '3') {
                                                                                echo "checked";
                                                                            } ?> value="3" type="radio"> [3] Cukup Besar<br>
                                                        <input name="f22" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f22)) == '4') {
                                                                                echo "checked";
                                                                            } ?> value="4" type="radio"> [4] Kurang<br>
                                                        <input name="f22" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f22)) == '5') {
                                                                                echo "checked";
                                                                            } ?> value="5" type="radio"> [5] Tidak Sama Sekali<br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5"></div>
                                                    <div class="col-sm-7">
                                                        <label>Partisipasi dalam proyek riset (f23)</label>
                                                        <br />
                                                        <input name="f23" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f23)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="radio"> [1] Sangat Besar<br>
                                                        <input name="f23" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f23)) == '2') {
                                                                                echo "checked";
                                                                            } ?> value="2" type="radio"> [2] Besar<br>
                                                        <input name="f23" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f23)) == '3') {
                                                                                echo "checked";
                                                                            } ?> value="3" type="radio"> [3] Cukup Besar<br>
                                                        <input name="f23" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f23)) == '4') {
                                                                                echo "checked";
                                                                            } ?> value="4" type="radio"> [4] Kurang<br>
                                                        <input name="f23" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f23)) == '5') {
                                                                                echo "checked";
                                                                            } ?> value="5" type="radio"> [5] Tidak Sama Sekali<br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5"></div>
                                                    <div class="col-sm-7">
                                                        <label>Magang (f24)</label>
                                                        <br />
                                                        <input name="f24" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f24)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="radio"> [1] Sangat Besar<br>
                                                        <input name="f24" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f24)) == '2') {
                                                                                echo "checked";
                                                                            } ?> value="2" type="radio"> [2] Besar<br>
                                                        <input name="f24" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f24)) == '3') {
                                                                                echo "checked";
                                                                            } ?> value="3" type="radio"> [3] Cukup Besar<br>
                                                        <input name="f24" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f24)) == '4') {
                                                                                echo "checked";
                                                                            } ?> value="4" type="radio"> [4] Kurang<br>
                                                        <input name="f24" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f24)) == '5') {
                                                                                echo "checked";
                                                                            } ?> value="5" type="radio"> [5] Tidak Sama Sekali<br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5"></div>
                                                    <div class="col-sm-7">
                                                        <label>Praktikum (f25)</label>
                                                        <br />
                                                        <input name="f25" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f25)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="radio"> [1] Sangat Besar<br>
                                                        <input name="f25" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f25)) == '2') {
                                                                                echo "checked";
                                                                            } ?> value="2" type="radio"> [2] Besar<br>
                                                        <input name="f25" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f25)) == '3') {
                                                                                echo "checked";
                                                                            } ?> value="3" type="radio"> [3] Cukup Besar<br>
                                                        <input name="f25" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f25)) == '4') {
                                                                                echo "checked";
                                                                            } ?> value="4" type="radio"> [4] Kurang<br>
                                                        <input name="f25" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f25)) == '5') {
                                                                                echo "checked";
                                                                            } ?> value="5" type="radio"> [5] Tidak Sama Sekali<br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5"></div>
                                                    <div class="col-sm-7">
                                                        <label>Kerja Lapangan (f26)</label>
                                                        <br />
                                                        <input name="f26" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f26)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="radio"> [1] Sangat Besar<br>
                                                        <input name="f26" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f26)) == '2') {
                                                                                echo "checked";
                                                                            } ?> value="2" type="radio"> [2] Besar<br>
                                                        <input name="f26" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f26)) == '3') {
                                                                                echo "checked";
                                                                            } ?> value="3" type="radio"> [3] Cukup Besar<br>
                                                        <input name="f26" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f26)) == '4') {
                                                                                echo "checked";
                                                                            } ?> value="4" type="radio"> [4] Kurang<br>
                                                        <input name="f26" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f26)) == '5') {
                                                                                echo "checked";
                                                                            } ?> value="5" type="radio"> [5] Tidak Sama Sekali<br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-5"></div>
                                                    <div class="col-sm-7">
                                                        <label>Diskusi (f27)</label>
                                                        <br />
                                                        <input name="f27" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f27)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="radio"> [1] Sangat Besar<br>
                                                        <input name="f27" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f27)) == '2') {
                                                                                echo "checked";
                                                                            } ?> value="2" type="radio"> [2] Besar<br>
                                                        <input name="f27" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f27)) == '3') {
                                                                                echo "checked";
                                                                            } ?> value="3" type="radio"> [3] Cukup Besar<br>
                                                        <input name="f27" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f27)) == '4') {
                                                                                echo "checked";
                                                                            } ?> value="4" type="radio"> [4] Kurang<br>
                                                        <input name="f27" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f27)) == '5') {
                                                                                echo "checked";
                                                                            } ?> value="5" type="radio"> [5] Tidak Sama Sekali<br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="f3" class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <label class="control-label">( f3 )</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label class="control-label">Kapan anda mulai mencari pekerjaan? <i>Mohon pekerjaan sambilan tidak dimasukkan</i></label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <label>Perkuliahan (f21)</label>
                                                        <br />
                                                        <small> f301 &nbsp;</small><input id="f301" name="f301" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f301)) == '1') {
                                                                                                                    echo "checked";
                                                                                                                } ?> value="1" onclick="show3()" type="radio"> [1] Kira-kira <input name="f302" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f302; ?>" size="5" type="text" class="width40"> &nbsp;bulan sebelum lulus &nbsp;&nbsp;<small>f302</small><br /><br />
                                                        <small>f301</small>&nbsp;&nbsp;<input id="f301" name="f301" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f301)) == '2') {
                                                                                                                        echo "checked";
                                                                                                                    } ?> value="2" onclick="show3()" type="radio"> [2] Kira-kira <input name="f303" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f303; ?>" size="5" type="text" class="width40"> &nbsp;bulan sesudah lulus &nbsp;&nbsp;<small>f303</small><br /><br />
                                                        <small>f301</small>&nbsp;&nbsp;<input id="f301" name="f301" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f301)) == '3') {
                                                                                                                        echo "checked";
                                                                                                                    } ?> value="3" onclick="hide3()" type="radio"> [3] Saya tidak mencari kerja (<i>Langsung ke pertanyaan f7a</i>)<br>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                function show3() {
                                                    document.getElementById('f4').style.display = "";
                                                    document.getElementById('f5').style.display = "";
                                                    document.getElementById('f6').style.display = "";
                                                    document.getElementById('f7').style.display = "";
                                                    document.getElementById('f7a').style.display = "";
                                                    document.getElementById('f8').style.display = "";
                                                }

                                                function hide3() {
                                                    document.getElementById('f4').style.display = "none";
                                                    document.getElementById('f5').style.display = "none";
                                                    document.getElementById('f6').style.display = "none";
                                                    document.getElementById('f7').style.display = "none";
                                                    document.getElementById('f7a').style.display = "none";
                                                    document.getElementById('f8').style.display = "none";
                                                }
                                            </script>

                                            <div id="f4" class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-sm-1">( f4 )</label>
                                                    <label class="control-label col-sm-4">Bagaimana anda mencari pekerjaan tersebut?
                                                        <i>Jawaban bisa lebih dari satu</i></label>
                                                    <div class="col-sm-7">
                                                        <input name="f401" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f401)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Melalui iklan di koran/majalah, brosur <small>&nbsp;&nbsp;f4-01</small><br>
                                                        <input name="f402" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f402)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Melamar ke perusahaan tanpa mengetahui lowongan yang ada <small>&nbsp;&nbsp;f4-02</small><br>
                                                        <input name="f403" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f403)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Pergi ke bursa/pameran kerja <small>&nbsp;&nbsp;f4-03</small><br>
                                                        <input name="f404" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f404)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Mencari lewat internet/iklan online/milis <small>&nbsp;&nbsp;f4-04</small><br>
                                                        <input name="f405" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f405)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Dihubungi oleh perusahaan<small>&nbsp;&nbsp;f4-05</small><br>
                                                        <input name="f406" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f406)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Menghubungi Kemenakertrans<small>&nbsp;&nbsp;f4-06</small><br>
                                                        <input name="f407" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f407)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Menghubungi agen tenaga kerja komersial/swasta<small>&nbsp;&nbsp;f4-07</small><br>
                                                        <input name="f408" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f408)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas <small>&nbsp;&nbsp;f4-08</small><br>
                                                        <input name="f409" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f409)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Menghubungi kantor kemahasiswaan/hubungan alumni <small>&nbsp;&nbsp;f4-09</small><br>
                                                        <input name="f410" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f410)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Membangun jejaring (<i>network</i>) sejak masih kuliah <small>&nbsp;&nbsp;f4-10</small><br>
                                                        <input name="f411" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f411)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)<small>&nbsp;&nbsp;f4-11</small><br>
                                                        <input name="f412" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f412)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Membangun bisnis sendiri<small>&nbsp;&nbsp;f4-12</small><br>
                                                        <input name="f413" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f413)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Melalui penempatan kerja atau magang<small>&nbsp;&nbsp;f4-13</small><br>
                                                        <input name="f414" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f414)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Bekerja di tempat yang sama dengan tempat kerja semasa kuliah <small>&nbsp;&nbsp;f4-14</small><br>
                                                        <input name="f415" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f415)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Lainnya: <small>&nbsp;&nbsp;f4-15</small><br>
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <input size="40" name="f416" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f416; ?>" type="text" class="form-control">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                f4-16
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div id="f6" class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-sm-1">( f6 )</label>
                                                    <label class="control-label col-sm-4">Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?</label>
                                                    <div class="col-sm-7">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <input class="form-control" name="f6" size="5" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f6; ?>" type="text">
                                                            </div>
                                                            <div class="col-sm-10">
                                                                perusahaan/instansi/institusi
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="f7" class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-sm-1">( f7 )</label>
                                                    <label class="control-label col-sm-4">Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda? </label>
                                                    <div class="col-sm-7">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <input class="form-control" name="f7" size="5" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f7; ?>" type="text">
                                                            </div>
                                                            <div class="col-sm-10">
                                                                perusahaan/instansi/institusi
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-sm-1">( f7a )</label>
                                                    <label class="control-label col-sm-4">Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara? </label>
                                                    <div class="col-sm-7">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <input class="form-control" name="f7a" size="5" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f7a; ?>" type="text">
                                                            </div>
                                                            <div class="col-sm-10">
                                                                perusahaan/instansi/institusi
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <script type="text/javascript">
                                                function show1() {
                                                    document.getElementById('f9').style.display = "";
                                                    document.getElementById('f10').style.display = "";
                                                }

                                                function hide1() {
                                                    document.getElementById('f9').style.display = "none";
                                                    document.getElementById('f10').style.display = "none";
                                                }
                                            </script>

                                            <div id="f9" class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-sm-1">( f9 )</label>
                                                    <label class="control-label col-sm-4">Bagaimana anda menggambarkan situasi anda saat ini? <i> Jawaban bisa lebih dari satu</i> </label>
                                                    <div class="col-sm-7">
                                                        <input name="f901" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f901)) == '1') {
                                                                                echo "checked";
                                                                            } ?> value="1" type="checkbox"> [1] Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana <small>f9-01</small><br>
                                                        <input name="f902" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f902)) == '2') {
                                                                                echo "checked";
                                                                            } ?> value="2" type="checkbox"> [2] Saya menikah <small>f9-02</small><br>
                                                        <input name="f903" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f903)) == '3') {
                                                                                echo "checked";
                                                                            } ?> value="3" type="checkbox"> [3] Saya sibuk dengan keluarga dan anak-anak <small>f9-03</small><br>
                                                        <input name="f904" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f904)) == '4') {
                                                                                echo "checked";
                                                                            } ?> value="4" type="checkbox"> [4] Saya sekarang sedang mencari pekerjaan <small>f9-04</small><br>
                                                        <input name="f905" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f905)) == '5') {
                                                                                echo "checked";
                                                                            } ?> value="5" type="checkbox"> [5] Lainnya <small>f9-05</small><br>
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" name="f906" size="60" maxlength="80" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f906; ?>" type="text">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                f9-06
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="f10" class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-sm-1">( f10 )</label>
                                                    <label class="control-label col-sm-4">Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? <i> Pilihlah Satu Jawaban. KEMUDIAN LANJUT KE f17 </i> </label>
                                                    <div class="col-sm-7">
                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <input name="f1001" value="1" onclick="hide2()" type="radio"> [1] Tidak<br>
                                                                <input name="f1001" value="2" type="radio"> [2] Tidak, tapi saya sedang menunggu hasil lamaran kerja<br>
                                                                <input name="f1001" value="3" type="radio"> [3] Ya, saya akan mulai bekerja dalam 2 minggu ke depan<br>
                                                                <input name="f1001" value="4" type="radio"> [4] Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan<br>
                                                                <input name="f1001" value="5" type="radio"> [5] Lainnya
                                                                <!-- <input name="f1001" value="2" onclick="hide2()" type="radio"> [2] Tidak, tapi saya sedang menunggu hasil lamaran kerja<br>
                                                                <input name="f1001" value="3" onclick="hide2()" type="radio"> [3] Ya, saya akan mulai bekerja dalam 2 minggu ke depan<br>
                                                                <input name="f1001" value="4" onclick="hide2()" type="radio"> [4] Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan<br>
                                                                <input name="f1001" value="5" onclick="hide2()" type="radio"> [5] Lainnya -->
                                                            </div>
                                                            <div class="col-sm-2">
                                                                f10-01
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-10">
                                                                <input class="form-control" name="f1002" size="60" maxlength="80" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f1002; ?>" type="text">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                f10-02
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                function hide2() {
                                                    document.getElementById('f11').style.display = "none";
                                                    document.getElementById('f13').style.display = "none";
                                                    document.getElementById('f14').style.display = "none";
                                                    document.getElementById('f15').style.display = "none";
                                                    document.getElementById('f16').style.display = "none";


                                                }
                                            </script>







                                            <div id="f16" class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-sm-1">( f16 )</label>
                                                    <label class="control-label col-sm-4"> Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu</label>
                                                    <div class="col-sm-7">
                                                        <span>
                                                            <input name="f1601" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1601)) == '1') {
                                                                                    echo "checked";
                                                                                } ?> value="1" type="checkbox"> [1] Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya. <small>f16-01</small><br>
                                                            <input name="f1602" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1602)) == '2') {
                                                                                    echo "checked";
                                                                                } ?> value="2" type="checkbox"> [2] Saya belum mendapatkan pekerjaan yang lebih sesuai.<small>f16-02</small><br>
                                                            <input name="f1603" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1603)) == '3') {
                                                                                    echo "checked";
                                                                                } ?> value="3" type="checkbox"> [3] Di pekerjaan ini saya memeroleh prospek karir yang baik. <small>f16-03</small><br>
                                                            <input name="f1604" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1604)) == '4') {
                                                                                    echo "checked";
                                                                                } ?> value="4" type="checkbox"> [4] Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya. <small>f16-04</small><br>
                                                            <input name="f1605" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1605)) == '5') {
                                                                                    echo "checked";
                                                                                } ?> value="5" type="checkbox"> [5] Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.<small>f16-05</small><br>
                                                            <input name="f1606" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1606)) == '6') {
                                                                                    echo "checked";
                                                                                } ?> value="6" type="checkbox"> [6] Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini. <small>f16-06</small><br>
                                                            <input name="f1607" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1607)) == '7') {
                                                                                    echo "checked";
                                                                                } ?> value="7" type="checkbox"> [7] Pekerjaan saya saat ini lebih aman/terjamin/secure <small>f16-07</small><br>
                                                            <input name="f1608" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1608)) == '8') {
                                                                                    echo "checked";
                                                                                } ?> value="8" type="checkbox"> [8] Pekerjaan saya saat ini lebih menarik <small>f16-08</small><br>
                                                            <input name="f1609" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1609)) == '9') {
                                                                                    echo "checked";
                                                                                } ?> value="9" type="checkbox"> [9] Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.<small>f16-09</small><br>
                                                            <input name="f1610" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1610)) == '10') {
                                                                                    echo "checked";
                                                                                } ?> value="10" type="checkbox"> [10] Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya. <small>f16-10</small><br>
                                                            <input name="f1611" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1611)) == '11') {
                                                                                    echo "checked";
                                                                                } ?> value="11" type="checkbox"> [11] Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya. <small>f16-11</small><br>
                                                            <input name="f1612" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1612)) == '12') {
                                                                                    echo "checked";
                                                                                } ?> value="12" type="checkbox"> [12] Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya. <small>f16-12</small><br>
                                                            <input name="f1613" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1613)) == '13') {
                                                                                    echo "checked";
                                                                                } ?> value="13" type="checkbox"> [13] Lainnya: <small>f16-13</small><br>
                                                            <div class="row">
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" name="f1614" size="60" value="<?= get_data_lulusan(Session()->get('C_NPM'))->f1614; ?>" maxlength="80" type="text">
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    f16-14
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="f17" class="form-group">
                                                <div class="row">
                                                    <label class="control-label col-sm-1">( f17 )</label>
                                                    <label class="control-label col-sm-4"> Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai? (<b>Bagian A</b>) <br>
                                                        Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan? (<b>Bagian B</b>)</label>
                                                    <div class="col-sm-7">
                                                        <table class="table table-striped table-responsive">
                                                            <tbody>
                                                                <tr>
                                                                    <th colspan="5" style="text-align:center;">Bagian A</th>
                                                                    <th>&nbsp;</th>
                                                                    <th style="text-align:center;" colspan="5">Bagian B</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="2">Sangat Rendah</th>
                                                                    <th>&nbsp;</th>
                                                                    <th colspan="2">Sangat Tinggi</th>
                                                                    <th>&nbsp;</th>
                                                                    <th colspan="2">Sangat Rendah</th>
                                                                    <th>&nbsp;</th>
                                                                    <th colspan="2">Sangat Tinggi</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>1</th>
                                                                    <th>2</th>
                                                                    <th>3</th>
                                                                    <th>4</th>
                                                                    <th>5</th>
                                                                    <th>&nbsp;</th>
                                                                    <th>1</th>
                                                                    <th>2</th>
                                                                    <th>3</th>
                                                                    <th>4</th>
                                                                    <th>5</th>
                                                                </tr>
                                                                <tr>
                                                                    <td><input name="f1701" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1701)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1701" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1701)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1701" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1701)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1701" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1701)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1701" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1701)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Pengetahuan di bidang atau disiplin ilmu anda <small>f17-1 f17-2b</small></td>
                                                                    <td><input name="f1702b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1702b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1702b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1702b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1702b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1702b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1702b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1702b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1702b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1702b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1703" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1703)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1703" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1703)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1703" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1703)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1703" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1703)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1703" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1703)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Pengetahuan di luar bidang atau disiplin ilmu anda <small>f17-3 f17-4b</small></td>
                                                                    <td><input name="f1704b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1704b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1704b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1704b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1704b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1704b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1704b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1704b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1704b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1704b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1705" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1705" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1705" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1705" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1705" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>

                                                                    <td>Pengetahuan umum <small>f17-5 f17-6b</small></td>

                                                                    <td><input name="f1706b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1706b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1706b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1706b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1706b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1705a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705a)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1705a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705a)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1705a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705a)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1705a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705a)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1705a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1705a)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                    <td>Bahasa Inggris <small>f17-5a f17-6ba</small></td>
                                                                    <td><input name="f1706ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706ba)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1706ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706ba)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1706ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706ba)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1706ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706ba)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1706ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1706ba)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>


                                                                <tr>
                                                                    <td><input name="f1707" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1707)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1707" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1707)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1707" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1707)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1707" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1707)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1707" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1707)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Ketrampilan internet <small>f17-7 f17-8b</small> </td>
                                                                    <td><input name="f1708b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1708b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1708b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1708b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1708b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1708b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1708b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1708b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1708b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1708b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1709" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1709)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1709" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1709)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1709" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1709)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1709" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1709)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1709" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1709)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Ketrampilan komputer <small>f17-9 f17-10b</small>
                                                                    </td>
                                                                    <td><input name="f1710b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1710b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1710b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1710b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1710b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1710b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1710b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1710b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1710b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1710b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>


                                                                <tr>
                                                                    <td><input name="f1711" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1711)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1711" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1711)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1711" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1711)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1711" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1711)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1711" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1711)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Berpikir kritis <small>f17-11 f17-12b</small></td>
                                                                    <td><input name="f1712b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1712b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1712b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1712b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1712b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1712b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1712b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1712b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1712b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1712b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>


                                                                <tr>
                                                                    <td><input name="f1713" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1713)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1713" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1713)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1713" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1713)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1713" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1713)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1713" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1713)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Ketrampilan riset <small>f17-13 f17-14b</small> </td>
                                                                    <td><input name="f1714b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1714b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1714b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1714b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1714b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1714b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1714b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1714b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1714b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1714b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1715" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1715)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1715" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1715)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1715" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1715)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1715" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1715)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1715" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1715)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan belajar <small>f17-15 f17-16b</small></td>
                                                                    <td><input name="f1716b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1716b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1716b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1716b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1716b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1716b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1716b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1716b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1716b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1716b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1717" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1717)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1717" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1717)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1717" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1717)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1717" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1717)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1717" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1717)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan berkomunikasi <small>f17-17 f17-18b</small></td>
                                                                    <td><input name="f1718b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1718b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1718b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1718b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1718b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1718b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1718b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1718b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1718b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1718b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1719" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1719)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1719" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1719)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1719" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1719)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1719" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1719)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1719" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1719)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Bekerja di bawah tekanan <small>f17-19 f17-20b</small></td>
                                                                    <td><input name="f1720b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1720b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1720b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1720b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1720b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1720b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1720b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1720b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1720b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1720b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1721" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1721)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1721" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1721)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1721" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1721)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1721" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1721)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1721" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1721)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Manajemen waktu <small>f17-21 f17-22b</small></td>
                                                                    <td><input name="f1722b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1722b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1722b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1722b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1722b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1722b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1722b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1722b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1722b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1722b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1723" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1723)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1723" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1723)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1723" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1723)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1723" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1723)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1723" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1723)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Bekerja secara mandiri <small>f17-23 f17-24b</small></td>
                                                                    <td><input name="f1724b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1724b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1724b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1724b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1724b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1724b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1724b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1724b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1724b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1724b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1725" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1725)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1725" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1725)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1725" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1725)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1725" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1725)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1725" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1725)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Bekerja dalam tim/bekerjasama dengan orang lain <small>f17-25 f17-26b</small></td>
                                                                    <td><input name="f1726b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1726b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1726b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1726b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1726b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1726b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1726b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1726b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1726b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1726b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1727" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1727)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1727" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1727)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1727" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1727)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1727" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1727)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1727" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1727)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan dalam memecahkan masalah <small>f17-27 f17-28b</small></td>
                                                                    <td><input name="f1728b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1728b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1728b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1728b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1728b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1728b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1728b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1728b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1728b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1728b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1729" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1729)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1729" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1729)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1729" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1729)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1729" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1729)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1729" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1729)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Negosiasi <small>f17-29 f17-30b</small></td>
                                                                    <td><input name="f1730b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1730b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1730b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1730b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1730b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1730b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1730b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1730b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1730b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1730b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1731" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1731)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1731" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1731)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1731" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1731)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1731" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1731)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1731" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1731)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan analisis <small>f17-31 f17-32b</small></td>
                                                                    <td><input name="f1732b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1732b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1732b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1732b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1732b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1732b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1732b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1732b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1732b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1732b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1733" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1733)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1733" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1733)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1733" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1733)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1733" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1733)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1733" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1733)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Toleransi <small>f17-33 f17-34b</small></td>
                                                                    <td><input name="f1734b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1734b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1734b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1734b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1734b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1734b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1734b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1734b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1734b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1734b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1735" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1735)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1735" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1735)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1735" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1735)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1735" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1735)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1735" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1735)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan adaptasi <small>f17-35 f17-36b</small></td>
                                                                    <td><input name="f1736b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1736b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1736b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1736b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1736b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1736b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1736b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1736b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1736b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1736b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1737" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1737" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1737" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1737" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1737" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Loyalitas<small>f17-37 f17-38b</small></td>
                                                                    <td><input name="f1738b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> required value="1" type="radio"></td>
                                                                    <td><input name="f1738b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> required value="2" type="radio"></td>
                                                                    <td><input name="f1738b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> required value="3" type="radio"></td>
                                                                    <td><input name="f1738b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> required value="4" type="radio"></td>
                                                                    <td><input name="f1738b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> required value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1737a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737a)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1737a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737a)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1737a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737a)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1737a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737a)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1737a" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1737a)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                    <td>Integritas <small>f17-37A f17-38ba</small></td>
                                                                    <td><input name="f1738ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738ba)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1738ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738ba)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1738ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738ba)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1738ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738ba)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1738ba" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1738ba)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1739" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1739)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1739" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1739)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1739" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1739)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1739" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1739)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1739" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1739)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Bekerja dengan orang yang berbeda budaya maupun latar belakang <small>f17-39 f17-40b</small></td>
                                                                    <td><input name="f1740b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1740b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1740b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1740b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1740b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1740b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1740b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1740b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1740b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1740b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1741" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1741)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1741" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1741)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1741" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1741)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1741" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1741)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1741" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1741)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kepemimpinan <small>f17-41 f17-42b</small></td>
                                                                    <td><input name="f1742b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1742b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1742b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1742b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1742b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1742b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1742b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1742b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1742b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1742b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1743" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1743)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1743" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1743)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1743" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1743)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1743" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1743)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1743" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1743)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan dalam memegang tanggungjawab <small>f17-43 f17-44b</small></td>
                                                                    <td><input name="f1744b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1744b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1744b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1744b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1744b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1744b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1744b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1744b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1744b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1744b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1745" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1745)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1745" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1745)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1745" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1745)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1745" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1745)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1745" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1745)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Inisiatif <small>f17-45 f17-46b</small></td>
                                                                    <td><input name="f1746b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1746b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1746b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1746b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1746b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1746b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1746b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1746b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1746b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1746b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1747" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1747)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1747" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1747)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1747" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1747)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1747" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1747)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1747" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1747)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Manajemen proyek/program <small>f17-47 f17-48b</small></td>
                                                                    <td><input name="f1748b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1748b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1748b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1748b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1748b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1748b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1748b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1748b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1748b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1748b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1749" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1749)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1749" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1749)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1749" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1749)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1749" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1749)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1749" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1749)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan untuk memresentasikan ide/produk/laporan <small>f17-49 f17-50b</small></td>
                                                                    <td><input name="f1750b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1750b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1750b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1750b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1750b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1750b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1750b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1750b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1750b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1750b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1751" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1751)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1751" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1751)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1751" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1751)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1751" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1751)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1751" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1751)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan dalam menulis laporan, memo dan dokumen <small>f17-51 f17-52b</small></td>
                                                                    <td><input name="f1752b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1752b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1752b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1752b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1752b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1752b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1752b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1752b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1752b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1752b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input name="f1753" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1753)) == '1') {
                                                                                                echo "checked";
                                                                                            } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1753" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1753)) == '2') {
                                                                                                echo "checked";
                                                                                            } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1753" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1753)) == '3') {
                                                                                                echo "checked";
                                                                                            } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1753" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1753)) == '4') {
                                                                                                echo "checked";
                                                                                            } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1753" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1753)) == '5') {
                                                                                                echo "checked";
                                                                                            } ?> value="5" type="radio"></td>
                                                                    <td>Kemampuan untuk terus belajar sepanjang hayat <small>f17-53 f17-54b</small></td>
                                                                    <td><input name="f1754b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1754b)) == '1') {
                                                                                                    echo "checked";
                                                                                                } ?> value="1" type="radio"></td>
                                                                    <td><input name="f1754b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1754b)) == '2') {
                                                                                                    echo "checked";
                                                                                                } ?> value="2" type="radio"></td>
                                                                    <td><input name="f1754b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1754b)) == '3') {
                                                                                                    echo "checked";
                                                                                                } ?> value="3" type="radio"></td>
                                                                    <td><input name="f1754b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1754b)) == '4') {
                                                                                                    echo "checked";
                                                                                                } ?> value="4" type="radio"></td>
                                                                    <td><input name="f1754b" <?php if ((trim(get_data_lulusan(Session()->get('C_NPM'))->f1754b)) == '5') {
                                                                                                    echo "checked";
                                                                                                } ?> value="5" type="radio"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" name="button" value="simpan" class="btn btn-primary" id="checkBtn">Simpan Data</button>
                                                <button type="button" id="btn-reset" class="btn btn-info" onClick='window.history.back()'>Batal</button>
                                            </div>
                                            <!-- <center>
                                                <button class="btn blue darken-2" type="submit" name="update" value="update">Simpan data</button>
                                            </center> -->
                                        </div>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>

<?= view('layouts/footer.php') ?>
<script>
    var HOST_URL = "http://localhost:8080"
</script>
<script>
    $('#f5a1').on('click', function () {
        $('#f5a2').html('');
        console.log("Selamat Datang");
        var code = $('#f5a1').val();
        console.log('Ini Adalah Code : ' + code);
        $.ajax({
            type: "GET",
            url: HOST_URL + "/get_regencies/" + code,
            dataType: "json",
            success: function (response) {
                $.each(response.data, function (i, v) { 
                    $('#f5a2').append('<option value="'+v.name+'">'+v.name+'</option>');
                });
            }
        });
    });
</script>