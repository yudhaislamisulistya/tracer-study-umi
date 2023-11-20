<?php

?>
<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <!-- add alert from setFlashdata success and error -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-custom alert-notice alert-light-success fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-tea-cup"></i></div>
                <div class="alert-text">
                    <b><p><?= session()->getFlashdata('success') ?></p></b>
                    <!-- SIlahkan Lakukan Konfrimasi -->
                    <p>Silahkan Lakukan Konfirmasi Pembayaran, Kembali ke <a href="/legalisir">Halaman Legalisir</a></p>
                </div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
        <?php elseif (session()->getFlashdata('error')) : ?>
            <div class="alert alert-custom alert-notice alert-light-error fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text"><?= session()->getFlashdata('error') ?></div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">
                    Tambah Pengajuan Legalisir
                </h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url('legalisir/store') ?>" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Jenis Berkas <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <select class="form-control" name="jenis_berkas" id="jenis_berkas_value" required oninput="setBiayaLegalisirDetault(this)">
                                <option selected disabled>Pilih Jenis Berkas</option>
                                <option value="Transkrip Nilai">Transkrip Nilai</option>
                                <option value="Ijazah">Ijazah</option>
                                <option value="Ijazah dan Transkrip Nilai">Ijazah dan Transkrip Nilai</option>
                            </select>
                        </div>
                    </div>
                    <!-- Unggah Berkas -->
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Unggah Berkas <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="berkas" required>
                                <label for="customFile" class="custom-file-label">Pilih Berkas</label>
                            </div>
                        </div>
                    </div>
                    <!-- Jenis TTD Berkas, Radion Button Tanda Tangan Elektronik, TTD Bahas di Ambil, TTD Basah Dikirim -->
                    <div class="form-group row">
                        <!-- Label -->
                        <label class="col-2 col-form-label">TTD Berkas <i style="color: red;">*</i></label>
                        <div class="col-10 col-form-label">
                            <div class="radio-inline">
                                <label class="radio">
                                    <input type="radio" name="ttd_berkas" id="customRadio1" value="Tanda Tangan Elektronik" required>
                                    <span></span>
                                    Tanda Tangan Elektronik
                                </label>
                                <label class="radio">
                                    <input type="radio" name="ttd_berkas" id="customRadio2" value="Berkas Diambil di Fakultas" required>
                                    <span></span>
                                    Berkas Diambil di Fakultas
                                </label>
                                <label class="radio">
                                    <input type="radio" name="ttd_berkas" id="customRadio3" value="Berkas Dikirim" required>
                                    <span></span>
                                    Berkas Dikirim
                                </label>
                            </div>
                            <span class="form-text text-muted">Pilih salah satu</span>
                        </div>
                    </div>
                    <!-- Bahasa -->
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Bahasa <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <select class="form-control" id="exampleSelect1" name="bahasa" required>
                                <!-- default pilih bahasa -->
                                <option selected disabled>Pilih Bahasa</option>
                                <option>Indonesia</option>
                            </select>
                        </div>
                    </div>
                    <!-- Jumlah Berkas Minimal 10 -->
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Jumlah Berkas <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <input class="form-control" type="number" value="10" id="jumlah_berkas_value" name="jumlah_berkas" oninput="setBiayaLegalisir(this)" required>
                        </div>
                    </div>
                    <!-- Kode Pos -->
                    <div class="form-group row" id="kodepos" style="display: none;">
                        <label for="example-text-input" class="col-2 col-form-label">Kode Pos <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="kode_pos" oninput="postConstViaApiRajaOngkir(90231, this)">
                        </div>
                    </div>
                    <!-- Alamat Pengiriman -->
                    <div class="form-group row" id="alamat" style="display: none;">
                        <label for="example-text-input" class="col-2 col-form-label">Alamat Pengiriman <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <textarea class="form-control" id="exampleTextarea" name="alamat_pengiriman" rows="3"></textarea>
                        </div>
                    </div>
                    <hr>
                    <!-- Biaya Legalisir -->
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Biaya Legalisir <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <input class="form-control" type="number" value="" name="biaya_legalisir" id="biaya_legalisir_value" readonly>
                        </div>
                    </div>
                    <!-- Biaya Pengiriman -->
                    <div class="form-group row" id="biaya_pengiriman" style="display: none;">
                        <label for="example-text-input" class="col-2 col-form-label">Biaya Pengiriman <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="biaya_pengiriman" id="biaya_pengiriman_value" readonly>
                        </div>
                    </div>
                    <!-- Set Button Total Biaya -->
                    <div class="form-group row" id="total_biaya_button" style="display: none;">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <button type="button" class="btn btn-primary" onclick="setTotalBiaya()">Total Biaya</button>
                        </div>
                    </div>
                    <!-- Total Biaya -->
                    <div class="form-group row" id="total_biaya" style="display: none;">
                        <label for="example-text-input" class="col-2 col-form-label">Total Biaya <i style="color: red;">*</i></label>
                        <div class="col-10">
                            <input class="form-control" type="number" name="total_biaya" id="total_biaya_value" readonly>
                        </div>
                    </div>
                    <!-- Catatan -->
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Catatan</label>
                        <div class="col-10">
                            <textarea class="form-control" id="exampleTextarea" name="catatan" rows="3"></textarea>
                        </div>
                    </div>
                    <!-- Buat Tombol Kembali Sebelah Kirim dan Kirim Sebalah Kanan -->
                    <div class="form-group row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <input type="submit" class="btn btn-primary mr-2" value="Kirim">
                            <a href="/legalisir" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= view('layouts/footer.php') ?>

<script>
    $(document).ready(function() {
        console.log("ready!");
        $("#kodepos").hide();
        $("#alamat").hide();
        $("#biaya_pengiriman").hide();
        $("#total_biaya").hide();
        $("#total_biaya_button").hide();
        $('input[type="radio"]').click(function() {
            if ($(this).attr("id") == "customRadio1") {
                $("#kodepos").hide();
                $("#alamat").hide();
                $("#biaya_pengiriman").hide();
                $("#total_biaya").hide();
                $("#total_biaya_button").hide();
            }
            if ($(this).attr("id") == "customRadio2") {
                $("#kodepos").hide();
                $("#alamat").hide();
                $("#biaya_pengiriman").hide();
                $("#total_biaya").hide();
                $("#total_biaya_button").hide();
            }
            if ($(this).attr("id") == "customRadio3") {
                console.log("kirim");
                $("#kodepos").show();
                $("#alamat").show();
                $("#biaya_pengiriman").show();
                $("#total_biaya").show();
                $("#total_biaya_button").show();
            }
        });

    });

    function postConstViaApiRajaOngkir(kode_pos_asal, kode_pos_tujuan) {
        console.log(kode_pos_asal);
        console.log(kode_pos_tujuan.value);
        var origin = kode_pos_asal;
        var destination = kode_pos_tujuan.value;
        var weight = 1000;
        var courier = "jne";
        $.ajax({
            url: "<?= base_url('legalisir/raja_ongkir_cost') ?>/" + origin + "/" + destination + "/" + weight + "/" + courier,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                biaya_pengiriman_value.value = data.rajaongkir.results[0].costs[0].cost[0].value;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function setBiayaLegalisir(jumlah_berkas) {
        // check berkas
        $jenisBerkas = $("#jenis_berkas_value").val();
        $hargaPerLembar = 0;
        if ($jenisBerkas == "Transkrip Nilai") {
            $hargaPerLembar = 2000;
        } else if ($jenisBerkas == "Ijazah") {
            $hargaPerLembar = 2000;
        } else if ($jenisBerkas == "Ijazah dan Transkrip Nilai") {
            $hargaPerLembar = 4000;
        }

        // set biaya legalisir
        $biayaLegalisir = jumlah_berkas.value * $hargaPerLembar;
        biaya_legalisir_value.value = $biayaLegalisir;
    }

    function setBiayaLegalisirDetault(jenis_berkas) {
        $jumlahBerkas = $("#jumlah_berkas_value").val();

        if (jenis_berkas.value == "Transkrip Nilai") {
            $hargaPerLembar = 2000;
        } else if (jenis_berkas.value == "Ijazah") {
            $hargaPerLembar = 2000;
        } else if (jenis_berkas.value == "Ijazah dan Transkrip Nilai") {
            $hargaPerLembar = 4000;
        }

        // set biaya legalisir
        $biayaLegalisir = $jumlahBerkas * $hargaPerLembar;
        biaya_legalisir_value.value = $biayaLegalisir;
    }

    function setTotalBiaya() {
        $biayaLegalisir = $("#biaya_legalisir_value").val();
        $biayaPengiriman = $("#biaya_pengiriman_value").val();
        $totalBiaya = parseInt($biayaLegalisir) + parseInt($biayaPengiriman);
        $("#total_biaya_value").val($totalBiaya);
    }
</script>