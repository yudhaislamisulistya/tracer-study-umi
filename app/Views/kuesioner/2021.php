<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <?php
        if (check_biodata(Session()->get('C_NPM')) == 0) {
            echo '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon2-warning"></i></div>
                        <div class="alert-text">Mohon Maaf! Silahkan Lengkapi Profile atau Biodata Anda Melalui Link <a class="text-dark" href="' . base_url("biodata") . '">Disini</a> Sebelum Mengisi Kuesioner</div>
                    </div>';
        } else {
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
                Pengisian Tracer Study hanya dapat dilakukan oleh seluruh Lulusan Universitas Muslim Indonesia<br>
                Kami ucapkan terimakasih dan penghargaan setinggi-tingginya buat para lulusan atas partisipasi dan
                dukungan yang diberikan dalam kegiatan Tracer Study tahun 2024</div>
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
                } else if (Session()->getFlashData('status') == "gagal") {
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
                <div class="card-header" style="width: 100%">
                    <h3 class="card-title">
                        Mengisi Data Kuesioner
                    </h3>
                </div>
                <div class="card-body">
                    <!--begin::Form-->
                    <form class="form" id="kt_form" action="<?= base_url('kuesioner_2021/store') ?>" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="jenis_kuesioner" value="kue_2021">

                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kuesioner-wajib">Kuesioner Wajib</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kuesioner-optional">Kuesioner Optional (Program Studi)</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <!-- Indentiftas Alumni -->
                            <input type="hidden" readonly name="nim" value="<?= Session()->get('C_NPM') ?>" class="form-control" readonly>
                            <input type="hidden" readonly value="091002 - Universitas Muslim Indonesia" class="form-control" readonly>
                            <input type="hidden" readonly value="091002" name="kode_pt" class="form-control" type="hidden">
                            <input type="hidden" readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->tahun_masuk ?>" name="tahun_masuk" class="form-control">
                            <input type="hidden" readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->tahun_keluar ?>" name="tahun_lulus" class="form-control">
                            <input type="hidden" readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->program_studi ?>" name="kode_prodi" class="form-control">
                            <input type="hidden" readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->program_studi ?>" name="program_studi" class="form-control">
                            <input type="hidden" readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->nama_lengkap ?>" name="nama_lengkap" class="form-control">
                            <input type="hidden" readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->nomor_handphone ?>" name="nomor_handphone" class="form-control">
                            <input type="hidden" readonly required="" value="<?= get_data_biodata(Session()->get('C_NPM'))->email ?>" name="email" class="form-control">
                            <input type="hidden" required="" value="<?= get_data_lulusan(Session()->get('C_NPM'))->nikmsmh ?>" name="nik" class="form-control">
                            <input type="hidden" required="" value="<?= get_data_lulusan(Session()->get('C_NPM'))->npwpmsmh ?>" name="npwp" class="form-control">
                            <div class="tab-pane active" id="kuesioner-wajib">
                                <legend class="text-uppercase font-size-sm font-weight-bold mt-5">Data Aktivitas dan Pekerjaan Lulusan</legend>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-md-4" style="font-size: 14px; font-weight: bold">1. Status Anda Saat Ini?</label>
                                    <div class="col-md-8">
                                        <label><input type="radio" name="status_pekerjaan" value="Pegawai" id="status_pekerjaan_pegawai" <?php echo ($data->status_pekerjaan == 'Pegawai') ? 'checked' : ''; ?>> a. Pegawai</label><br>
                                        <label><input type="radio" name="status_pekerjaan" value="Wiraswasta" id="status_pekerjaan_wiraswasta" <?php echo ($data->status_pekerjaan == 'Wiraswasta') ? 'checked' : ''; ?>> b. Wiraswasta</label><br>
                                        <label><input type="radio" name="status_pekerjaan" value="Melanjutkan Pendidikan" id="status_pekerjaan_pendidikan" <?php echo ($data->status_pekerjaan == 'Melanjutkan Pendidikan') ? 'checked' : ''; ?>> c. Melanjutkan Pendidikan</label><br>
                                        <label><input type="radio" name="status_pekerjaan" value="Sedang Mencari Kerja" id="status_pekerjaan_cari" <?php echo ($data->status_pekerjaan == 'Sedang Mencari Kerja') ? 'checked' : ''; ?>> d. Sedang Mencari Kerja</label><br>
                                        <label><input type="radio" name="status_pekerjaan" value="Belum Memungkinkan Bekerja" id="status_pekerjaan_tidak" <?php echo ($data->status_pekerjaan == 'Belum Memungkinkan Bekerja') ? 'checked' : ''; ?>> e. Belum Memungkinkan Bekerja</label><br>
                                        <span class="form-text text-muted">Pilih status pekerjaan Anda saat ini.</span>
                                    </div>
                                </div>

                                <div id="additional_questions" style="display: none;">
                                    <div class="form-group row">
                                        <label class="col-md-4" style="font-size: 14px; font-weight: bold">2. Apabila Anda telah bekerja, berapa lama masa tunggu untuk mendapatkan pekerjaan?</label>
                                        <div class="col-md-8">
                                            <label><input type="radio" name="masa_tunggu" value="Sudah mendapatkan pekerjaan sebelum lulus" <?php echo ($data->masa_tunggu == 'Sudah mendapatkan pekerjaan sebelum lulus') ? 'checked' : ''; ?>> a. Sudah mendapatkan pekerjaan sebelum lulus</label><br>
                                            <label><input type="radio" name="masa_tunggu" value="Dibawah 6 bulan setelah lulus" <?php echo ($data->masa_tunggu == 'Dibawah 6 bulan setelah lulus') ? 'checked' : ''; ?>> b. Mendapat pekerjaan dibawah 6 bulan setelah lulus, masa tunggu <input type="number" class="form-control input" name="bulan_tunggu_6" value="<?php echo $data->bulan_tunggu_6; ?>" placeholder="bulan"></label><br>
                                            <label><input type="radio" name="masa_tunggu" value="Diatas 6 bulan setelah lulus" <?php echo ($data->masa_tunggu == 'Diatas 6 bulan setelah lulus') ? 'checked' : ''; ?>> c. Mendapat pekerjaan diatas 6 bulan setelah lulus, masa tunggu <input type="number" class="form-control input" name="bulan_tunggu_6_plus" value="<?php echo $data->bulan_tunggu_6_plus; ?>" placeholder="bulan"></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4" style="font-size: 14px; font-weight: bold">3. Jenis perusahaan/ instansi/ institusi tempat anda bekerja sekarang?</label>
                                        <div class="col-md-8">
                                            <label><input type="radio" name="jenis_perusahaan" value="Instansi/ Institusi pemerintah" <?php echo ($data->jenis_perusahaan == 'Instansi/ Institusi pemerintah') ? 'checked' : ''; ?>> a. Instansi/ Institusi pemerintah</label><br>
                                            <label><input type="radio" name="jenis_perusahaan" value="BUMN/ BUMD" <?php echo ($data->jenis_perusahaan == 'BUMN/ BUMD') ? 'checked' : ''; ?>> b. BUMN/ BUMD</label><br>
                                            <label><input type="radio" name="jenis_perusahaan" value="Instansi/ Institusi swasta" <?php echo ($data->jenis_perusahaan == 'Instansi/ Institusi swasta') ? 'checked' : ''; ?>> c. Instansi/ Institusi swasta</label><br>
                                            <label><input type="radio" name="jenis_perusahaan" value="Organisasi non-profit/ Lembaga Swadaya Masyarakat" <?php echo ($data->jenis_perusahaan == 'Organisasi non-profit/ Lembaga Swadaya Masyarakat') ? 'checked' : ''; ?>> d. Organisasi non-profit/ Lembaga Swadaya Masyarakat</label><br>
                                            <label><input type="radio" name="jenis_perusahaan" value="Wiraswasta/ Perusahaan sendiri" <?php echo ($data->jenis_perusahaan == 'Wiraswasta/ Perusahaan sendiri') ? 'checked' : ''; ?>> e. Wiraswasta/ Perusahaan sendiri</label><br>
                                            <label><input type="radio" name="jenis_perusahaan" value="Institusi/ Organisasi multilateral" <?php echo ($data->jenis_perusahaan == 'Institusi/ Organisasi multilateral') ? 'checked' : ''; ?>> f. Institusi/ Organisasi multilateral</label><br>
                                            <label><input type="radio" name="jenis_perusahaan" value="Lainnya" <?php echo ($data->jenis_perusahaan == 'Lainnya') ? 'checked' : ''; ?>> g. Lainnya <input type="text" class="form-control input" name="jenis_perusahaan_lainnya" value="<?php echo $data->jenis_perusahaan_lainnya; ?>" placeholder="Koperasi, Lembaga Internasional, dll"></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4" style="font-size: 14px; font-weight: bold">4. Nama perusahaan/ instansi/ institusi tempat anda bekerja</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $data->nama_perusahaan; ?>" placeholder="Rektorat Universitas Muslim Indonesia">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4" style="font-size: 14px; font-weight: bold">5. Tingkat tempat kerja anda</label>
                                        <div class="col-md-8">
                                            <label><input type="radio" name="tingkat_kerja" value="Entry Level" <?php echo ($data->tingkat_kerja == 'Entry Level') ? 'checked' : ''; ?>> a. Entry Level (Posisi Pemula)</label><br>
                                            <label><input type="radio" name="tingkat_kerja" value="Mid-Level" <?php echo ($data->tingkat_kerja == 'Mid-Level') ? 'checked' : ''; ?>> b. Mid-Level (Posisi Menengah)</label><br>
                                            <label><input type="radio" name="tingkat_kerja" value="Senior Level" <?php echo ($data->tingkat_kerja == 'Senior Level') ? 'checked' : ''; ?>> c. Senior Level (Posisi Senior)</label><br>
                                            <label><input type="radio" name="tingkat_kerja" value="Manajer/Supervisor" <?php echo ($data->tingkat_kerja == 'Manajer/Supervisor') ? 'checked' : ''; ?>> d. Manajer/Supervisor</label><br>
                                            <label><input type="radio" name="tingkat_kerja" value="Direktur/Executive" <?php echo ($data->tingkat_kerja == 'Direktur/Executive') ? 'checked' : ''; ?>> e. Direktur/Executive</label><br>
                                            <label><input type="radio" name="tingkat_kerja" value="Pemilik Usaha/Wirausaha" <?php echo ($data->tingkat_kerja == 'Pemilik Usaha/Wirausaha') ? 'checked' : ''; ?>> f. Pemilik Usaha/Wirausaha</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4" style="font-size: 14px; font-weight: bold">6. Dimana lokasi perusahaan/ instansi/ institusi tempat anda bekerja</label>
                                        <div class="col-md-8">
                                            <label>Negara</label>
                                            <select name="negara" id="negara" class="form-control">
                                                <?php
                                                foreach (get_data_country() as $key => $value) {
                                                    $selected = ($value->id == $data->negara) ? 'selected' : '';
                                                    echo '<option value="' . $value->id . '" ' . $selected . '>' . $value->name . '</option>';
                                                }
                                                ?>
                                            </select><br>

                                            <label>Provinsi</label>
                                            <select name="provinsi" id="provinsi" class="form-control">
                                                <?php
                                                foreach (get_data_provinces() as $key => $value) {
                                                    $selected = ($value->id == $data->provinsi) ? 'selected' : '';
                                                    echo '<option value="' . $value->id . '" ' . $selected . '>' . $value->name . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <label>Kota/Kabupaten</label>
                                            <select name="kabupaten" id="kabupaten" class="form-control">
                                                <!-- Options for cities will be populated dynamically -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4" style="font-size: 14px; font-weight: bold">7. Berapa rata-rata pendapatan anda perbulan?</label>
                                        <div class="col-md-8">
                                            <label><input type="radio" name="pendapatan" value="dibawah 5.000.000" <?php echo ($data->pendapatan == 'dibawah 5.000.000') ? 'checked' : ''; ?>> a. di bawah 5.000.000</label><br>
                                            <label><input type="radio" name="pendapatan" value="antara 5.000.000 - 10.000.000" <?php echo ($data->pendapatan == 'antara 5.000.000 - 10.000.000') ? 'checked' : ''; ?>> b. antara 5.000.000 - 10.000.000</label><br>
                                            <label><input type="radio" name="pendapatan" value="di atas 10.000.000" <?php echo ($data->pendapatan == 'di atas 10.000.000') ? 'checked' : ''; ?>> c. di atas 10.000.000</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="data_aktivitas_pekerjaan" style="display: none;">
                                    <legend class="text-uppercase font-size-sm font-weight-bold mt-5">Data Capaian Pembelajaran Lulusan</legend>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-md-4" style="font-size: 14px; font-weight: bold">8. Seberapa erat hubungan antara bidang studi dengan pekerjaan anda saat ini?</label>
                                        <div class="col-md-8">
                                            <label><input type="radio" name="hubungan_bidang_studi" value="Sangat erat" <?php echo ($data->hubungan_bidang_studi == 'Sangat erat') ? 'checked' : ''; ?>> a. Sangat erat</label><br>
                                            <label><input type="radio" name="hubungan_bidang_studi" value="Erat" <?php echo ($data->hubungan_bidang_studi == 'Erat') ? 'checked' : ''; ?>> b. Erat</label><br>
                                            <label><input type="radio" name="hubungan_bidang_studi" value="Cukup erat" <?php echo ($data->hubungan_bidang_studi == 'Cukup erat') ? 'checked' : ''; ?>> c. Cukup erat</label><br>
                                            <label><input type="radio" name="hubungan_bidang_studi" value="Kurang erat" <?php echo ($data->hubungan_bidang_studi == 'Kurang erat') ? 'checked' : ''; ?>> d. Kurang erat</label><br>
                                            <label><input type="radio" name="hubungan_bidang_studi" value="Tidak sama sekali" <?php echo ($data->hubungan_bidang_studi == 'Tidak sama sekali') ? 'checked' : ''; ?>> e. Tidak sama sekali</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4" style="font-size: 14px; font-weight: bold">9. Seberapa sesuai tingkat pendidikan anda dengan pekerjaan anda saat ini?</label>
                                        <div class="col-md-8">
                                            <label><input type="radio" name="kesesuaian_pendidikan" value="Sangat sesuai" <?php echo ($data->kesesuaian_pendidikan == 'Sangat sesuai') ? 'checked' : ''; ?>> a. Sangat sesuai</label><br>
                                            <label><input type="radio" name="kesesuaian_pendidikan" value="Sesuai" <?php echo ($data->kesesuaian_pendidikan == 'Sesuai') ? 'checked' : ''; ?>> b. Sesuai</label><br>
                                            <label><input type="radio" name="kesesuaian_pendidikan" value="Cukup sesuai" <?php echo ($data->kesesuaian_pendidikan == 'Cukup sesuai') ? 'checked' : ''; ?>> c. Cukup sesuai</label><br>
                                            <label><input type="radio" name="kesesuaian_pendidikan" value="Kurang sesuai" <?php echo ($data->kesesuaian_pendidikan == 'Kurang sesuai') ? 'checked' : ''; ?>> d. Kurang Sesuai</label><br>
                                            <label><input type="radio" name="kesesuaian_pendidikan" value="Tidak sesuai sama sekali" <?php echo ($data->kesesuaian_pendidikan == 'Tidak sesuai sama sekali') ? 'checked' : ''; ?>> e. Tidak sesuai sama sekali</label>
                                        </div>
                                    </div>
                                </div>

                                <legend class="text-uppercase font-size-sm font-weight-bold mt-5">Data Kemampuan Lulusan</legend>
                                <hr />
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-sm-4">
                                            Pada saat lulus, pada tingkat mana kompetensi di bawah ini anda kuasai? (<b>Bagian A</b>) <br>
                                            Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan? (<b>Bagian B</b>)<br><br>
                                            <small style="color: red;">Bagian B adalah kompetensi yang diperlukan dalam pekerjaan saat ini, jika memilih status pekerjaan "Pegawai" atau "Wiraswasta"</small>
                                            <small style="font-weight: bold;">1 = Kurang</small><br>
                                            <small style="font-weight: bold;">2 = Cukup</small><br>
                                            <small style="font-weight: bold;">3 = Baik</small><br>
                                            <small style="font-weight: bold;">4 = Sangat Baik</small><br>
                                        </label>
                                        <div class="col-sm-8">
                                            <table class="table table-striped table-responsive likert-scale">
                                                <tbody>
                                                    <tr>
                                                        <th colspan="4" style="text-align:center;">Bagian A</th>
                                                        <th>&nbsp;</th>
                                                        <th style="text-align:center;" colspan="4">Bagian B</th>
                                                    </tr>
                                                    <tr>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                        <th>&nbsp;</th>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                    </tr>
                                                    <!-- Repeat this block for each competency -->
                                                    <tr>
                                                        <td><input name="etika_a" value="1" type="radio" <?php echo ($data->etika_a == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="etika_a" value="2" type="radio" <?php echo ($data->etika_a == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="etika_a" value="3" type="radio" <?php echo ($data->etika_a == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="etika_a" value="4" type="radio" <?php echo ($data->etika_a == '4') ? 'checked' : ''; ?>></td>
                                                        <td>Etika</td>
                                                        <td><input name="etika_b" value="1" type="radio" class="bagian_b" <?php echo ($data->etika_b == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="etika_b" value="2" type="radio" class="bagian_b" <?php echo ($data->etika_b == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="etika_b" value="3" type="radio" class="bagian_b" <?php echo ($data->etika_b == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="etika_b" value="4" type="radio" class="bagian_b" <?php echo ($data->etika_b == '4') ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="keahlian_a" value="1" type="radio" <?php echo ($data->keahlian_a == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="keahlian_a" value="2" type="radio" <?php echo ($data->keahlian_a == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="keahlian_a" value="3" type="radio" <?php echo ($data->keahlian_a == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="keahlian_a" value="4" type="radio" <?php echo ($data->keahlian_a == '4') ? 'checked' : ''; ?>></td>
                                                        <td>Keahlian pada bidang ilmu (kompetensi utama)</td>
                                                        <td><input name="keahlian_b" value="1" type="radio" class="bagian_b" <?php echo ($data->keahlian_b == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="keahlian_b" value="2" type="radio" class="bagian_b" <?php echo ($data->keahlian_b == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="keahlian_b" value="3" type="radio" class="bagian_b" <?php echo ($data->keahlian_b == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="keahlian_b" value="4" type="radio" class="bagian_b" <?php echo ($data->keahlian_b == '4') ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="bahasa_asing_a" value="1" type="radio" <?php echo ($data->bahasa_asing_a == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="bahasa_asing_a" value="2" type="radio" <?php echo ($data->bahasa_asing_a == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="bahasa_asing_a" value="3" type="radio" <?php echo ($data->bahasa_asing_a == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="bahasa_asing_a" value="4" type="radio" <?php echo ($data->bahasa_asing_a == '4') ? 'checked' : ''; ?>></td>
                                                        <td>Kemampuan berbahasa asing</td>
                                                        <td><input name="bahasa_asing_b" value="1" type="radio" class="bagian_b" <?php echo ($data->bahasa_asing_b == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="bahasa_asing_b" value="2" type="radio" class="bagian_b" <?php echo ($data->bahasa_asing_b == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="bahasa_asing_b" value="3" type="radio" class="bagian_b" <?php echo ($data->bahasa_asing_b == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="bahasa_asing_b" value="4" type="radio" class="bagian_b" <?php echo ($data->bahasa_asing_b == '4') ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="teknologi_a" value="1" type="radio" <?php echo ($data->teknologi_a == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="teknologi_a" value="2" type="radio" <?php echo ($data->teknologi_a == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="teknologi_a" value="3" type="radio" <?php echo ($data->teknologi_a == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="teknologi_a" value="4" type="radio" <?php echo ($data->teknologi_a == '4') ? 'checked' : ''; ?>></td>
                                                        <td>Penggunaan teknologi informasi</td>
                                                        <td><input name="teknologi_b" value="1" type="radio" class="bagian_b" <?php echo ($data->teknologi_b == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="teknologi_b" value="2" type="radio" class="bagian_b" <?php echo ($data->teknologi_b == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="teknologi_b" value="3" type="radio" class="bagian_b" <?php echo ($data->teknologi_b == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="teknologi_b" value="4" type="radio" class="bagian_b" <?php echo ($data->teknologi_b == '4') ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="komunikasi_a" value="1" type="radio" <?php echo ($data->komunikasi_a == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="komunikasi_a" value="2" type="radio" <?php echo ($data->komunikasi_a == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="komunikasi_a" value="3" type="radio" <?php echo ($data->komunikasi_a == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="komunikasi_a" value="4" type="radio" <?php echo ($data->komunikasi_a == '4') ? 'checked' : ''; ?>></td>
                                                        <td>Kemampuan berkomunikasi</td>
                                                        <td><input name="komunikasi_b" value="1" type="radio" class="bagian_b" <?php echo ($data->komunikasi_b == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="komunikasi_b" value="2" type="radio" class="bagian_b" <?php echo ($data->komunikasi_b == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="komunikasi_b" value="3" type="radio" class="bagian_b" <?php echo ($data->komunikasi_b == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="komunikasi_b" value="4" type="radio" class="bagian_b" <?php echo ($data->komunikasi_b == '4') ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="kerjasama_a" value="1" type="radio" <?php echo ($data->kerjasama_a == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kerjasama_a" value="2" type="radio" <?php echo ($data->kerjasama_a == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kerjasama_a" value="3" type="radio" <?php echo ($data->kerjasama_a == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kerjasama_a" value="4" type="radio" <?php echo ($data->kerjasama_a == '4') ? 'checked' : ''; ?>></td>
                                                        <td>Kerjasama</td>
                                                        <td><input name="kerjasama_b" value="1" type="radio" class="bagian_b" <?php echo ($data->kerjasama_b == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kerjasama_b" value="2" type="radio" class="bagian_b" <?php echo ($data->kerjasama_b == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kerjasama_b" value="3" type="radio" class="bagian_b" <?php echo ($data->kerjasama_b == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kerjasama_b" value="4" type="radio" class="bagian_b" <?php echo ($data->kerjasama_b == '4') ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="pengembangan_diri_a" value="1" type="radio" <?php echo ($data->pengembangan_diri_a == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="pengembangan_diri_a" value="2" type="radio" <?php echo ($data->pengembangan_diri_a == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="pengembangan_diri_a" value="3" type="radio" <?php echo ($data->pengembangan_diri_a == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="pengembangan_diri_a" value="4" type="radio" <?php echo ($data->pengembangan_diri_a == '4') ? 'checked' : ''; ?>></td>
                                                        <td>Pengembangan diri</td>
                                                        <td><input name="pengembangan_diri_b" value="1" type="radio" class="bagian_b" <?php echo ($data->pengembangan_diri_b == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="pengembangan_diri_b" value="2" type="radio" class="bagian_b" <?php echo ($data->pengembangan_diri_b == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="pengembangan_diri_b" value="3" type="radio" class="bagian_b" <?php echo ($data->pengembangan_diri_b == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="pengembangan_diri_b" value="4" type="radio" class="bagian_b" <?php echo ($data->pengembangan_diri_b == '4') ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input name="kepemimpinan_a" value="1" type="radio" <?php echo ($data->kepemimpinan_a == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kepemimpinan_a" value="2" type="radio" <?php echo ($data->kepemimpinan_a == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kepemimpinan_a" value="3" type="radio" <?php echo ($data->kepemimpinan_a == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kepemimpinan_a" value="4" type="radio" <?php echo ($data->kepemimpinan_a == '4') ? 'checked' : ''; ?>></td>
                                                        <td>Kepemimpinan</td>
                                                        <td><input name="kepemimpinan_b" value="1" type="radio" class="bagian_b" <?php echo ($data->kepemimpinan_b == '1') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kepemimpinan_b" value="2" type="radio" class="bagian_b" <?php echo ($data->kepemimpinan_b == '2') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kepemimpinan_b" value="3" type="radio" class="bagian_b" <?php echo ($data->kepemimpinan_b == '3') ? 'checked' : ''; ?>></td>
                                                        <td><input name="kepemimpinan_b" value="4" type="radio" class="bagian_b" <?php echo ($data->kepemimpinan_b == '4') ? 'checked' : ''; ?>></td>
                                                    </tr>
                                                    <!-- End repeat block -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kuesioner-optional">
                                <!-- Kuesioner Optional -->
                                <?php

                                $prodi = session()->get('NAMA_PRODI');
                                $kuesioner_id = check_exist_data_kuesioner_optional_by_prodi($prodi);

                                ?>

                                <div class="card-body">
                                    <?php if (!empty(get_data_pertanyaan_by_kuesioner_id($kuesioner_id)["pertanyaan"])) : ?>
                                        <legend class="text-uppercase font-size-sm font-weight-bold">Kuesioner Optional (Program Studi)</legend>
                                        <hr />
                                        <input type="hidden" name="kuesionerId" value="<?= $kuesioner_id ?>">
                                        <?php foreach (get_data_pertanyaan_by_kuesioner_id($kuesioner_id)["pertanyaan"] as $pertanyaan) : ?>
                                            <div class="pertanyaan-item mb-3">
                                                <div class="row">
                                                    <div class="col-md-6" style="align-self: center;">
                                                        <p><?= esc($pertanyaan->teks_pertanyaan) ?></p>
                                                    </div>
                                                    <div class="col-md-6" style="align-self: center;">
                                                        <?php
                                                        $jawaban = get_data_kuesioner_jawaban($pertanyaan->pertanyaan_id);

                                                        if ($pertanyaan->tipe_pertanyaan != 'text' && !empty($pertanyaan->pilihan_jawaban)) : ?>
                                                            <?php if ($pertanyaan->tipe_pertanyaan == 'checkbox') : ?>
                                                                <div class="checkbox-group">
                                                                    <?php foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                                        <label class="checkbox-label">
                                                                            <input type="checkbox" name="checkbox_<?= $pertanyaan->pertanyaan_id ?>[]" value="<?= esc($pilihan->teks_pilihan) ?>" <?php if (isset($jawaban) && in_array($pilihan->teks_pilihan, explode(",", $jawaban->jawaban_text))) echo "checked"; ?>> <?= esc($pilihan->teks_pilihan) ?>
                                                                        </label>
                                                                        <br />
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            <?php elseif ($pertanyaan->tipe_pertanyaan == 'radio') : ?>
                                                                <div class="radio-group">
                                                                    <?php foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                                        <label class="radio-label">
                                                                            <input type="radio" name="radio_<?= $pertanyaan->pertanyaan_id ?>" value="<?= esc($pilihan->teks_pilihan) ?>" <?php if (isset($jawaban) && $jawaban->jawaban_text == $pilihan->teks_pilihan) echo "checked"; ?>> <?= esc($pilihan->teks_pilihan) ?>
                                                                        </label>
                                                                        <br />
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            <?php elseif ($pertanyaan->tipe_pertanyaan == 'option') : ?>
                                                                <select class="form-control" name="select_<?= $pertanyaan->pertanyaan_id ?>">
                                                                    <?php foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                                        <option value="<?= esc($pilihan->teks_pilihan) ?>" <?php if (isset($jawaban) && $jawaban->jawaban_text == $pilihan->teks_pilihan) echo "selected"; ?>><?= esc($pilihan->teks_pilihan) ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            <?php endif; ?>
                                                        <?php elseif ($pertanyaan->tipe_pertanyaan == 'text') : ?>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="text_<?= $pertanyaan->pertanyaan_id ?>" value="<?php if (isset($jawaban)) echo $jawaban->jawaban_text; ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="alert alert-info">
                                            <p class="mb-0">Tidak ada kuesioner optional yang tersedia.</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" name="button" value="simpan" class="btn btn-primary" id="checkBtn">Simpan Data</button>
                            <button type="button" id="btn-reset" class="btn btn-info" onClick='window.history.back()'>Batal</button>
                        </div>
                        <!--begin::Scrolltop and Save Button Container-->
                        <div id="kt_scrolltop_container" style="position: fixed; bottom: 20px; right: 20px; display: flex; align-items: center; gap: 10px;">
                            <button type="submit" name="button" value="simpan" class="btn btn-info" id="checkBtn">
                                <span style="color: white; font-weight: bold;">
                                    Simpan Sementara
                                </span>
                            </button>
                            <div id="kt_scrolltop" class="scrolltop">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24" />
                                            <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                                            <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                        </div>
                        <!--end::Scrolltop and Save Button Container-->
                    </form>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</div>



<style>
    #kt_scrolltop_container {
        position: fixed;
        bottom: 20px;
        left: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        /* Space between buttons */
    }

    #save_button {
        background-color: #007bff;
        /* Bootstrap primary color */
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    #save_button:hover {
        background-color: #0056b3;
        /* Darker shade on hover */
    }
</style>


<?= view('layouts/footer.php') ?>
<script>
    var HOST_URL = "http://localhost:8080"
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

    $('#f5a1').on('click', function() {
        $('#f5a2').html('');
        console.log("Selamat Datang");
        var code = $('#f5a1').val();
        console.log('Ini Adalah Code : ' + code);
        $.ajax({
            type: "GET",
            url: HOST_URL + "/get_regencies/" + code,
            dataType: "json",
            success: function(response) {
                $.each(response.data, function(i, v) {
                    $('#f5a2').append('<option value="' + v.id + '">' + v.name + '</option>');
                });
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var negaraSelect = document.getElementById('negara');
        var provinsiSelect = document.getElementById('provinsi');
        var kabupatenSelect = document.getElementById('kabupaten');

        function toggleProvinceCity() {
            if (negaraSelect.options[negaraSelect.selectedIndex].text !== 'INDONESIA') {
                provinsiSelect.disabled = true;
                kabupatenSelect.disabled = true;
            } else {
                provinsiSelect.disabled = false;
                kabupatenSelect.disabled = false;
            }
        }

        negaraSelect.addEventListener('change', toggleProvinceCity);

        // Initial check on page load
        toggleProvinceCity();
    });
</script>
<script>
    document.querySelectorAll('input[name="status_pekerjaan"]').forEach(function(elem) {
        elem.addEventListener('change', function() {
            var value = this.value;
            var additionalQuestions = document.getElementById('additional_questions');
            if (value === 'Pegawai' || value === 'Wiraswasta') {
                additionalQuestions.style.display = 'block';
            } else {
                additionalQuestions.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="status_pekerjaan"]').forEach(function(elem) {
        elem.addEventListener('change', function() {
            var value = this.value;
            var dataAktivitasPekerjaan = document.getElementById('data_aktivitas_pekerjaan');
            if (value === 'Pegawai' || value === 'Wiraswasta') {
                dataAktivitasPekerjaan.style.display = 'block';
            } else {
                dataAktivitasPekerjaan.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="status_pekerjaan"]').forEach(function(elem) {
        elem.addEventListener('change', function() {
            var value = this.value;
            var dataKemampuanLulusan = document.getElementById('data_kemampuan_lulusan');
            if (value === 'Pegawai' || value === 'Wiraswasta') {
                dataKemampuanLulusan.style.display = 'block';
            } else {
                dataKemampuanLulusan.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('input[name="status_pekerjaan"]').forEach(function(elem) {
        elem.addEventListener('change', function() {
            var value = this.value;
            var bagianB = document.querySelectorAll('.bagian_b');
            if (value === 'Pegawai' || value === 'Wiraswasta') {
                bagianB.forEach(function(el) {
                    el.disabled = false;
                });
            } else {
                bagianB.forEach(function(el) {
                    el.disabled = true;
                    el.checked = false;
                });
            }
        });
    });

    // Initial check to disable bagian B if no status is selected
    window.addEventListener('load', function() {
        var statusChecked = document.querySelector('input[name="status_pekerjaan"]:checked');
        var bagianB = document.querySelectorAll('.bagian_b');
        if (!statusChecked || (statusChecked.value !== 'Pegawai' && statusChecked.value !== 'Wiraswasta')) {
            bagianB.forEach(function(el) {
                el.disabled = true;
                el.checked = false;
            });
        }
    });
</script>