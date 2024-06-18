<?=

view('layouts/header');

?>

<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class=" container ">
            <div class="row">
                <div class="col-md-12">
                    <!-- make form for select tahun lulus alumni -->
                    <form action="<?= route_to('admin_prodi_laporan_post') ?>" method="POST">
                        <div class="form-group">
                            <label for="tahun_lulus">Tahun Lulus</label>
                            <select class="form-control" id="tahun_lulus" name="tahun_lulus">
                                <?php if ($tahun_lulus === "semua") : ?>
                                    <option value="semua" selected>-- Semua Tahun Lulusan --</option>
                                <?php else : ?>
                                    <option value="semua">-- Semua Tahun Lulusan --</option>
                                    <option value="<?= $tahun_lulus ?>" selected>Tahun <?= $tahun_lulus ?></option>
                                <?php endif; ?>

                                <?php foreach (get_data_tahun_lulus() as $item) : ?>
                                    <option value="<?= $item ?>" <?= $item == $tahun_lulus ? 'selected' : '' ?>>Tahun <?= $item ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            <a href="<?= base_url('admin-prodi/kuesioner/laporan') ?>" class="btn btn-danger mt-3">Reset</a>
                        </div>

                    </form>
                </div>

                <?php

                if ($total_responden == 0) {
                    echo "<div class='col-md-12'><div class='alert alert-danger'>Data Tidak Ditemukan</div></div>";
                } else {

                ?>

                    <div class="col-md-12">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        Data Aktivitas dan Pekerjaan Lulusan
                                    </h3>
                                </div>
                                <div class="card-tools" style="align-self: center;">
                                    <button class="btn btn-tool" data-toggle="collapse" data-target="#collapseCardBody">
                                        <i class="fas fa-plus" id="collapseIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body collapse" id="collapseCardBody">
                                <!-- Table -->
                                <div class="table-responsive">
                                    <div>
                                        <p style="font-size: 16px;"><?= $content_data_aktivitas_dan_pekerjaan_lulusan ?></p>
                                    </div>
                                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Program Studi</th>
                                                <th>Jumlah Responden</th>
                                                <th>Presentase (100%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($total_responden_by_program_studi as $item) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $item->NAMA_PRODI ?></td>
                                                    <td><?= $item->total_lulusan ?></td>
                                                    <td>
                                                        <?= round($item->persentase, 2) ?>%
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <caption>
                                        <small style="color: red;">Total Responden : <?= format_ribuan($total_responden) ?></small>
                                    </caption>
                                    <div class="col-md-12" style="margin-top: 20px !important;">
                                        <h5>Data Status Pekerjaan Lulusan</h5>
                                        <hr>
                                        <div id="chart-status-pekerjaan-lulusan"></div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 20px !important;">
                                        <h5>Masa Tunggu untuk Mendapatkan Pekerjaan</h5>
                                        </hr>
                                        <div id="chart-masa-tunggu-mendapatkan-pekerjaan"></div>
                                        <h6>Masa Tunggu Dibawah 6 bulan Mendapatkan Pekerjaan setelah lulus </h6>
                                        <div id="chart-masa-tunggu-dibawah-mendapatkan-pekerjaan"></div>
                                        <h6>Masa Tunggu Diatas 6 bulan Mendapatkan Pekerjaan setelah lulus </h6>
                                        <div id="chart-masa-tunggu-diatas-mendapatkan-pekerjaan"></div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 20px !important;">
                                        <h5>Jenis Perusahaan Tempat Bekerja</h5>
                                        <hr>
                                        <div id="chart-jenis-perusahaan-tempat-bekerja"></div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 20px !important;">
                                        <h5>Tingkat Tempat Kerja</h5>
                                        <hr>
                                        <div id="chart-tingkat-tempat-bekerja"></div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 20px !important;">
                                        <h5>Pendapatan Rata-Rata Perbulan</h5>
                                        <hr>
                                        <div id="chart-pendapatan-rata-rata-perbulan"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Data Capaian Pembelajaran Lulusan
                                </h3>
                            </div>
                            <div class="card-tools" style="align-self: center;">
                                <button class="btn btn-tool" data-toggle="collapse" data-target="#collapseCardBody2">
                                    <i class="fas fa-plus" id="collapseIcon2"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse" id="collapseCardBody2">
                            <div class="col-md-12" style="margin-top: 20px !important;">
                                <h5>Hubungan Bidang Studi dan Pekerjaan</h5>
                                <hr>
                                <div id="chart-hubungan-bidang-studi-dan-pekerjaan"></div>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px !important;">
                                <h5>Tingkat Pendidikan dan Pekerjaan</h5>
                                <hr>
                                <div id="chart-tingkat-pendidikan-dan-pekerjaan"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Data Kemampuan Lulusan
                                </h3>
                            </div>
                            <div class="card-tools" style="align-self: center;">
                                <button class="btn btn-tool" data-toggle="collapse" data-target="#collapseCardBody3">
                                    <i class="fas fa-plus" id="collapseIcon3"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse" id="collapseCardBody3">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Rata-rata Kompetensi</h5>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kompetensi</th>
                                                <th>Bagian A</th>
                                                <th>Bagian B</th>
                                                <th>Perbedaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($total_analisis_likert_data_kemampuan_lulusan['per_kompetensi'] as $kompetensi => $values) : ?>
                                                <tr>
                                                    <td><?php echo $kompetensi; ?></td>
                                                    <td><?php echo $values['bagian_a']; ?></td>
                                                    <td><?php echo $values['bagian_b']; ?></td>
                                                    <td><?php echo $values['perbedaan']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td><strong>Rata-rata</strong></td>
                                                <td><strong><?php echo $total_analisis_likert_data_kemampuan_lulusan['rata_rata_bagian_a']; ?></strong></td>
                                                <td><strong><?php echo $total_analisis_likert_data_kemampuan_lulusan['rata_rata_bagian_b']; ?></strong></td>
                                                <td>#</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    <?php

                }

    ?>
    </div>

    <?=

    view('layouts/footer');

    ?>

    <script>
        var total_responden_by_aktivitas_lulusan = <?php echo json_encode($total_responden_by_aktivitas_lulusan); ?>;
        var total_responden_by_sebaran_masa_tunggu = <?php echo json_encode($total_responden_by_sebaran_masa_tunggu); ?>;
        var total_responden_by_jenis_institusi = <?php echo json_encode($total_responden_by_jenis_institusi); ?>;
        var total_responden_by_tingkat_kerja = <?php echo json_encode($total_responden_by_tingkat_kerja); ?>;
        var total_responden_cek_penghasilan = <?php echo json_encode($total_responden_cek_penghasilan); ?>;
        var total_responden_tingkat_pendidikan = <?php echo json_encode($total_responden_tingkat_pendidikan); ?>;
        var total_responden_hubungan_studi = <?php echo json_encode($total_responden_hubungan_studi); ?>;
        var chartPie;
        var chartPieJenisInstitusi;
        var chartPieTingkatKerja;
        var chartPiePenghasilanUMP;
        var chartPieTingkatPendidikan;
        var chartPieHubunganStudi;
        var chartLine;

        var total_status_pekerjaan_lulusan = <?php echo json_encode($total_status_pekerjaan_lulusan); ?>;
        var chartPieStatusPekerjaanLulusan;
        var total_total_masa_tunggu_mendapatkan_pekerjaan = <?php echo json_encode($total_masa_tunggu_mendapatkan_pekerjaan); ?>;
        var chartPieMasaTungguMendapatkanPekerjaan;
        var total_jenis_pekerjaan_tempat_bekerja = <?php echo json_encode($total_jenis_pekerjaan_tempat_bekerja); ?>;
        var chartPieJenisPekerjaanTempatBekerja;
        var total_tingkat_tempat_bekerja = <?php echo json_encode($total_tingkat_tempat_bekerja); ?>;
        var chartPieTingkatTempatBekerja;
        var total_pendapatan_rata_rata_perbulan = <?php echo json_encode($total_pendapatan_rata_rata_perbulan); ?>;
        var chartPiePendapatanRataRataPerbulan;
        var total_masa_tunggu_dibawah_6_bulan_mendaapatkan_pekerjaan = <?php echo json_encode($total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaaan); ?>;
        var chartBarMasaTungguDibawahMendapatkanPekerjaan;
        var total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan = <?php echo json_encode($total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan); ?>;
        var chartBarMasaTungguDiatasMendapatkanPekerjaan;
        var total_hubungan_bidang_studi_dan_pekerjaan = <?php echo json_encode($total_hubungan_bidang_studi_dan_pekerjaan); ?>;
        var chartPieHubunganBidangStudiDanPekerjaan;
        var total_tingkat_pendidikan_dan_pekerjaan = <?php echo json_encode($total_tingkat_pendidikan_dan_pekerjaan); ?>;
        var chartPieTingkatPendidikanDanPekerjaan;

        console.log('total_responden_by_aktivitas_lulusan:', total_masa_tunggu_dibawah_6_bulan_mendaapatkan_pekerjaan);




        $(document).ready(function() {
            updateStatistics("semua");
            $('#collapseCardBody').on('shown.bs.collapse', function() {
                $('#collapseIcon').removeClass('fa-plus').addClass('fa-minus');
            });

            $('#collapseCardBody').on('hidden.bs.collapse', function() {
                $('#collapseIcon').removeClass('fa-minus').addClass('fa-plus');
            });

            $('#collapseCardBody2').on('shown.bs.collapse', function() {
                $('#collapseIcon2').removeClass('fa-plus').addClass('fa-minus');
            });

            $('#collapseCardBody2').on('hidden.bs.collapse', function() {
                $('#collapseIcon2').removeClass('fa-minus').addClass('fa-plus');
            });

            $('#collapseCardBody3').on('shown.bs.collapse', function() {
                $('#collapseIcon3').removeClass('fa-plus').addClass('fa-minus');
            });

            $('#collapseCardBody3').on('hidden.bs.collapse', function() {
                $('#collapseIcon3').removeClass('fa-minus').addClass('fa-plus');
            });

            var totalDataSebaranMasaTunggu = prepareDataSebaranMasaTunggu(total_responden_by_sebaran_masa_tunggu, "semua");
            initSebaranMasaTungguChart(totalDataSebaranMasaTunggu);

            var totalDataJenisInstitusi = calculateTotalByJenisInstitusi(total_responden_by_jenis_institusi);
            initJenisInstitusiChart(totalDataJenisInstitusi);

            var totalDataTingkatKerja = calculateTotalByTingkatKerja(total_responden_by_tingkat_kerja);
            initTingkatKerjaChart(totalDataTingkatKerja);

            var totalDataPenghasilanUMP = calculateTotalByPenghasilanUMP(total_responden_cek_penghasilan);
            initPenghasilanUMPChart(totalDataPenghasilanUMP);

            var totalDataTingkatPendidikan = calculateTotalByTingkatPendidikan(total_responden_tingkat_pendidikan);
            initTingkatPendidikanChart(totalDataTingkatPendidikan);

            var totalDataHubunganStudi = calculateTotalByHubunganStudi(total_responden_hubungan_studi);
            initHubunganStudiChart(totalDataHubunganStudi);

            var totalDataStatusPekerjaanLulusan = calculateTotalByStatusPekerjaanLulusan(total_status_pekerjaan_lulusan);
            initStatusPekerjaanLulusanChart(totalDataStatusPekerjaanLulusan);

            var totalDataMasaTungguMendapatkanPekerjaan = calculateTotalMasaTungguMendapatkanPekerjaan(total_total_masa_tunggu_mendapatkan_pekerjaan);
            initStatusMasaTungguMendapakatkanPekerjaan(totalDataMasaTungguMendapatkanPekerjaan);

            var totalDataJenisPekerjaanTempatBekerja = calculateTotalByJenisPekerjaanTempatBekerja(total_jenis_pekerjaan_tempat_bekerja);
            initJenisPekerjaanTempatBekerjaChart(totalDataJenisPekerjaanTempatBekerja);

            var totalDataTingkatTempatBekerja = calculateTotalByTingkatPekerjaan(total_tingkat_tempat_bekerja);
            initTingkatTempatBekerjaChart(totalDataTingkatTempatBekerja);

            var totalDataPendapatanRataRataPerbulan = calculateTotalByPendapatanRataRataPerbulan(total_pendapatan_rata_rata_perbulan);
            initPendapatanRataRataPerbulanChart(totalDataPendapatanRataRataPerbulan);

            var totalDataMasaTungguDibawah6BulanMendapatkanPekerjaan = calculateTotalMasaTungguDibawah6BulanMendapatkanPekerjaan(total_masa_tunggu_dibawah_6_bulan_mendaapatkan_pekerjaan);
            initMasaTungguDibawahMendapatkanPekerjaanChart(totalDataMasaTungguDibawah6BulanMendapatkanPekerjaan);

            var totalDataMasaTungguDiatas6BulanMendapatkanPekerjaan = calculateTotalMasaTungguDiatas6BulanMendapatkanPekerjaan(total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan);
            initMasaTungguDiatasMendapatkanPekerjaanChart(totalDataMasaTungguDiatas6BulanMendapatkanPekerjaan);

            var totalDataHubunganBidangStudiDanPekerjaan = calculateTotalHubunganBidangStudiDanPekerjaan(total_hubungan_bidang_studi_dan_pekerjaan);
            initHubunganBidangStudiDanPekerjaanChart(totalDataHubunganBidangStudiDanPekerjaan);

            var totalDataTingkatPendidikanDanPekerjaan = calculateTotalByTingkatPendidikanDanPekerjaan(total_tingkat_pendidikan_dan_pekerjaan);
            initTingkatPendidikanDanPekerjaanChart(totalDataTingkatPendidikanDanPekerjaan);

            var totalData = calculateTotalByStatus(total_responden_by_aktivitas_lulusan);
            KTApexChartsDemo.init(totalData);

            var totals = calculateTotals(totalData);
            updateHtmlStats(totals);

            $('#program_studi').on('change', function() {
                var selectedProdi = $(this).val();
                updateStatistics(selectedProdi);
                var dataToDisplay;

                if (selectedProdi === "semua") {
                    // Jika pilihan adalah "Semua Program Studi", gunakan semua data.
                    dataToDisplay = calculateTotalByStatus(total_responden_by_aktivitas_lulusan);
                } else {
                    // Jika pilihan adalah program studi tertentu, filter data.
                    var filteredData = filterDataByProdi(selectedProdi);
                    dataToDisplay = calculateTotalByStatus(filteredData);
                }

                var totals = calculateTotals(dataToDisplay);
                updateHtmlStats(totals);
                KTApexChartsDemo.init(dataToDisplay); // Update pie chart with new data

                // Update line chart
                updateLineChart(total_responden_by_sebaran_masa_tunggu, selectedProdi); // Pass selectedProdi to the update function
            });
        });

        function calculateTotalByTingkatPendidikanDanPekerjaan(data) {
            var statusTotals = {
                "Sangat Sesuai": 0,
                "Sesuai": 0,
                "Cukup Sesuai": 0,
                "Kurang Sesuai": 0,
                "Tidak Sama Sekali": 0,
                "Belum Terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.kesesuaian_pendidikan)) {
                    statusTotals[item.kesesuaian_pendidikan] += parseInt(item.jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    kesesuaian_pendidikan: key,
                    jumlah: statusTotals[key]
                };
            });
        }

        function initTingkatPendidikanDanPekerjaanChart(data) {
            var categories = [];
            var series = [];
            var colors = [];

            // Warna default lainnya untuk kategori selain "Belum terdata"
            var colorMapping = {
                'Sangat Sesuai': '#00E396',
                'Sesuai': '#FEB019',
                'Cukup Sesuai': '#FF4560',
                'Kurang Sesuai': '#775DD0',
                'Tidak Sama Sekali': '#3F51B5',
                'Belum Terdata': '#FF0000' // Warna merah untuk "Belum terdata"
            };

            data.forEach(function(item, index) {
                categories.push(item.kesesuaian_pendidikan);
                series.push(item.jumlah);

                if (colorMapping.hasOwnProperty(item.kesesuaian_pendidikan)) {
                    colors.push(colorMapping[item.kesesuaian_pendidikan]);
                } else {
                    colors.push('#D3D3D3'); // Light gray sebagai default
                }
            });

            var options = {
                series: series,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
                colors: colors, // Menetapkan warna untuk setiap segmen
            };

            if (chartPieTingkatPendidikanDanPekerjaan) {
                chartPieTingkatPendidikanDanPekerjaan.destroy();
            }

            chartPieTingkatPendidikanDanPekerjaan = new ApexCharts(document.querySelector("#chart-tingkat-pendidikan-dan-pekerjaan"), options);
            chartPieTingkatPendidikanDanPekerjaan.render();
        }



        function calculateTotalHubunganBidangStudiDanPekerjaan(data) {
            var statusTotals = {
                "Sangat Erat": 0,
                "Erat": 0,
                "Cukup Erat": 0,
                "Kurang Erat": 0,
                "Tidak Sama Sekali": 0,
                "Belum Terdata": 0,
            }

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.hubungan_bidang_studi)) {
                    statusTotals[item.hubungan_bidang_studi] += parseInt(item.jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    hubungan_bidang_studi: key,
                    jumlah: statusTotals[key]
                };
            });
        }

        function initHubunganBidangStudiDanPekerjaanChart(data) {
            var categories = [];
            var series = [];
            var colors = [];

            // Warna default lainnya untuk kategori selain "Belum terdata"
            var colorMapping = {
                'Sangat Erat': '#00E396',
                'Erat': '#FEB019',
                'Cukup Erat': '#FF4560',
                'Kurang Erat': '#775DD0',
                'Tidak Sama Sekali': '#3F51B5',
                'Belum Terdata': '#FF0000' // Warna merah untuk "Belum terdata"
            };

            data.forEach(function(item) {
                categories.push(item.hubungan_bidang_studi);
                series.push(item.jumlah);

                // Menentukan warna berdasarkan pemetaan
                if (colorMapping.hasOwnProperty(item.hubungan_bidang_studi)) {
                    colors.push(colorMapping[item.hubungan_bidang_studi]);
                } else {
                    // Warna default jika kategori tidak ada dalam pemetaan
                    colors.push('#D3D3D3'); // Light gray sebagai default
                }

            });

            var options = {
                series: series,
                colors: colors,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieHubunganBidangStudiDanPekerjaan) {
                chartPieHubunganBidangStudiDanPekerjaan.destroy();
            }

            chartPieHubunganBidangStudiDanPekerjaan = new ApexCharts(document.querySelector("#chart-hubungan-bidang-studi-dan-pekerjaan"), options);
            chartPieHubunganBidangStudiDanPekerjaan.render();
        }

        function calculateTotalMasaTungguDiatas6BulanMendapatkanPekerjaan(data) {
            var statusTotals = {
                "6 Bulan": 0,
                "7 Bulan": 0,
                "8 Bulan": 0,
                "9 Bulan": 0,
                "10 Bulan": 0,
                "11 Bulan": 0,
                "12 Bulan": 0,
                "Diatas 12 Bulan": 0,
                "Belum mendapatkan pekerjaan": 0,
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.bulan_tunggu_6_plus)) {
                    statusTotals[item.bulan_tunggu_6_plus] += parseInt(item.jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    bulan_tunggu_6_plus: key,
                    jumlah: statusTotals[key]
                };
            });
        }

        function initMasaTungguDiatasMendapatkanPekerjaanChart(data) {
            var categories = [];
            var seriesData = [];

            data.forEach(function(item) {
                categories.push(item.bulan_tunggu_6_plus);
                seriesData.push(item.jumlah);
            });

            var options = {
                series: [{
                    name: 'Jumlah',
                    data: seriesData
                }],
                chart: {
                    height: 300,
                    type: 'bar'
                },
                xaxis: {
                    categories: categories
                },
                plotOptions: {
                    bar: {
                        horizontal: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                title: {
                    text: 'Masa Tunggu Mendapatkan Pekerjaan',
                    align: 'center'
                }
            };

            if (chartBarMasaTungguDiatasMendapatkanPekerjaan) {
                chartBarMasaTungguDiatasMendapatkanPekerjaan.destroy();
            }

            chartBarMasaTungguDiatasMendapatkanPekerjaan = new ApexCharts(document.querySelector("#chart-masa-tunggu-diatas-mendapatkan-pekerjaan"), options);
            chartBarMasaTungguDiatasMendapatkanPekerjaan.render();
        }

        function calculateTotalMasaTungguDibawah6BulanMendapatkanPekerjaan(data) {
            var statusTotals = {
                "0 Bulan": 0,
                "1 Bulan": 0,
                "2 Bulan": 0,
                "3 Bulan": 0,
                "4 Bulan": 0,
                "5 Bulan": 0,
                "6 Bulan": 0,
                "Belum mendapatkan pekerjaan": 0,
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.bulan_tunggu_6)) {
                    statusTotals[item.bulan_tunggu_6] += parseInt(item.jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    bulan_tunggu_6: key,
                    jumlah: statusTotals[key]
                };
            });
        }

        function initMasaTungguDibawahMendapatkanPekerjaanChart(data) {
            var categories = [];
            var seriesData = [];

            data.forEach(function(item) {
                categories.push(item.bulan_tunggu_6);
                seriesData.push(item.jumlah);
            });

            var options = {
                series: [{
                    name: 'Jumlah',
                    data: seriesData
                }],
                chart: {
                    height: 300,
                    type: 'bar'
                },
                xaxis: {
                    categories: categories
                },
                plotOptions: {
                    bar: {
                        horizontal: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                title: {
                    text: 'Masa Tunggu Mendapatkan Pekerjaan',
                    align: 'center'
                }
            };

            if (chartBarMasaTungguDibawahMendapatkanPekerjaan) {
                chartBarMasaTungguDibawahMendapatkanPekerjaan.destroy();
            }

            chartBarMasaTungguDibawahMendapatkanPekerjaan = new ApexCharts(document.querySelector("#chart-masa-tunggu-dibawah-mendapatkan-pekerjaan"), options);
            chartBarMasaTungguDibawahMendapatkanPekerjaan.render();
        }




        function calculateTotalByPendapatanRataRataPerbulan(data) {
            var statusTotals = {
                "dibawah 5.000.000": 0,
                "antara 5.000.000 - 10.000.000": 0,
                "di atas 10.000.000": 0,
                "Belum Terdata": 0
            }

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.pendapatan)) {
                    statusTotals[item.pendapatan] += parseInt(item.jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    pendapatan: key,
                    jumlah: statusTotals[key]
                };
            });

        }

        function initPendapatanRataRataPerbulanChart(data) {
            var categories = [];
            var series = [];
            var colors = [];

            var colorMapping = {
                'dibawah 5.000.000': '#00E396',
                'antara 5.000.000 - 10.000.000': '#FEB019',
                'di atas 10.000.000': '#FF4560',
                'Belum Terdata': '#FF0000'
            };

            data.forEach(function(item) {
                categories.push(item.pendapatan);
                series.push(item.jumlah);

                if (colorMapping.hasOwnProperty(item.pendapatan)) {
                    colors.push(colorMapping[item.pendapatan]);
                } else {
                    colors.push('#D3D3D3'); // Light gray sebagai default
                }
            });

            var options = {
                series: series,
                colors: colors,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPiePendapatanRataRataPerbulan) {
                chartPiePendapatanRataRataPerbulan.destroy();
            }

            chartPiePendapatanRataRataPerbulan = new ApexCharts(document.querySelector("#chart-pendapatan-rata-rata-perbulan"), options);
            chartPiePendapatanRataRataPerbulan.render();
        }

        function calculateTotalByTingkatPekerjaan(data) {
            var statusTotals = {
                "Entry Level": 0,
                "Mid-Level": 0,
                "Senior Level": 0,
                "Manajer/Supervisor": 0,
                "Direktur/Executive": 0,
                "Pemilik Usaha/Wirausaha": 0,
                "Belum Terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.tingkat_kerja)) {
                    statusTotals[item.tingkat_kerja] += parseInt(item.total_lulusan);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    tingkat_kerja: key,
                    total_lulusan: statusTotals[key]
                };
            });
        }

        function initTingkatTempatBekerjaChart(data) {
            var categories = [];
            var series = [];
            var colors = [];

            var colorMapping = {
                'Entry Level': '#00E396',
                'Mid-Level': '#FEB019',
                'Senior Level': '#FF4560',
                'Manajer/Supervisor': '#775DD0',
                'Direktur/Executive': '#3F51B5',
                'Pemilik Usaha/Wirausaha': '#D3D3D3',
                'Belum Terdata': '#FF0000'
            };

            data.forEach(function(item) {
                categories.push(item.tingkat_kerja);
                series.push(item.total_lulusan);

                if (colorMapping.hasOwnProperty(item.tingkat_kerja)) {
                    colors.push(colorMapping[item.tingkat_kerja]);
                } else {
                    colors.push('#D3D3D3'); // Light gray sebagai default
                }

            });

            var options = {
                series: series,
                colors: colors,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieTingkatTempatBekerja) {
                chartPieTingkatTempatBekerja.destroy();
            }

            chartPieTingkatTempatBekerja = new ApexCharts(document.querySelector("#chart-tingkat-tempat-bekerja"), options);
            chartPieTingkatTempatBekerja.render();
        }

        function calculateTotalByJenisPekerjaanTempatBekerja(data) {
            var statusTotals = {
                "Instansi/ Institusi pemerintah": 0,
                "BUMN/ BUMD": 0,
                "Instansi/ Institusi swasta": 0,
                "Organisasi non-profit/ Lembaga Swadaya Masyarakat": 0,
                "Wiraswasta/ Perusahaan sendiri:": 0,
                "Institusi/ Organisasi multilateral": 0,
                "Lainnya": 0,
                "Belum Terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.jenis_perusahaan)) {
                    statusTotals[item.jenis_perusahaan] += parseInt(item.total_lulusan);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    jenis_perusahaan: key,
                    total_lulusan: statusTotals[key]
                };
            });
        }

        function initJenisPekerjaanTempatBekerjaChart(data) {
            var categories = [];
            var series = [];
            var colors = [];

            var colorMapping = {
                'Instansi/ Institusi pemerintah': '#00E396',
                'BUMN/ BUMD': '#FEB019',
                'Instansi/ Institusi swasta': '#FF4560',
                'Organisasi non-profit/ Lembaga Swadaya Masyarakat': '#775DD0',
                'Wiraswasta/ Perusahaan sendiri:': '#3F51B5',
                'Institusi/ Organisasi multilateral': '#D3D3D3',
                'Lainnya': '#FF0000',
                'Belum Terdata': '#FF0000'
            };

            data.forEach(function(item) {
                categories.push(item.jenis_perusahaan);
                series.push(item.total_lulusan);

                if (colorMapping.hasOwnProperty(item.jenis_perusahaan)) {
                    colors.push(colorMapping[item.jenis_perusahaan]);
                } else {
                    colors.push('#D3D3D3'); // Light gray sebagai default
                }

            });

            var options = {
                series: series,
                colors: colors,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieJenisPekerjaanTempatBekerja) {
                chartPieJenisPekerjaanTempatBekerja.destroy();
            }

            chartPieJenisPekerjaanTempatBekerja = new ApexCharts(document.querySelector("#chart-jenis-perusahaan-tempat-bekerja"), options);
            chartPieJenisPekerjaanTempatBekerja.render();
        }

        function calculateTotalMasaTungguMendapatkanPekerjaan($data) {
            var statusTotals = {
                "Sudah mendapatkan pekerjaan sebelum lulus": 0,
                "Dibawah 6 bulan setelah lulus": 0,
                "Diatas 6 bulan setelah lulus": 0,
                "Belum mendapatkan pekerjaan": 0,
            };

            $data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.masa_tunggu)) {
                    statusTotals[item.masa_tunggu] += parseInt(item.total_lulusan);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    masa_tunggu: key,
                    total_lulusan: statusTotals[key]
                };
            });
        }

        function initStatusMasaTungguMendapakatkanPekerjaan(data) {
            var categories = [];
            var series = [];
            var colors = [];

            var colorMapping = {
                'Sudah mendapatkan pekerjaan sebelum lulus': '#00E396',
                'Dibawah 6 bulan setelah lulus': '#FEB019',
                'Diatas 6 bulan setelah lulus': '#FF4560',
                'Belum mendapatkan pekerjaan': '#FF0000',
            };

            data.forEach(function(item) {
                categories.push(item.masa_tunggu);
                series.push(item.total_lulusan);

                if (colorMapping.hasOwnProperty(item.masa_tunggu)) {
                    colors.push(colorMapping[item.masa_tunggu]);
                } else {
                    colors.push('#D3D3D3'); // Light gray sebagai default
                }
            });

            var options = {
                series: series,
                colors: colors,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieMasaTungguMendapatkanPekerjaan) {
                chartPieMasaTungguMendapatkanPekerjaan.destroy();
            }

            chartPieMasaTungguMendapatkanPekerjaan = new ApexCharts(document.querySelector("#chart-masa-tunggu-mendapatkan-pekerjaan"), options);
            chartPieMasaTungguMendapatkanPekerjaan.render();
        }

        function calculateTotalByStatusPekerjaanLulusan(data) {
            var statusTotals = {
                "Pegawai": 0,
                "Wiraswasta": 0,
                "Melanjutkan Pendidikan": 0,
                "Sedang Mencari Kerja": 0,
                "Belum Memungkinkan Bekerja": 0,
                "Belum Terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.status_pekerjaan)) {
                    statusTotals[item.status_pekerjaan] += parseInt(item.total_lulusan);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    status_pekerjaan: key,
                    total_lulusan: statusTotals[key]
                };
            });
        }

        function initStatusPekerjaanLulusanChart(data) {
            var categories = [];
            var series = [];
            var colors = [];

            var colorMapping = {
                'Pegawai': '#00E396',
                'Wiraswasta': '#FEB019',
                'Melanjutkan Pendidikan': '#FF4560',
                'Sedang Mencari Kerja': '#775DD0',
                'Belum Memungkinkan Bekerja': '#3F51B5',
                'Belum Terdata': '#FF0000'
            };

            data.forEach(function(item) {
                categories.push(item.status_pekerjaan);
                series.push(item.total_lulusan);

                if (colorMapping.hasOwnProperty(item.status_pekerjaan)) {
                    colors.push(colorMapping[item.status_pekerjaan]);
                } else {
                    colors.push('#D3D3D3'); // Light gray sebagai default
                }

            });

            var options = {
                series: series,
                colors: colors,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieStatusPekerjaanLulusan) {
                chartPieStatusPekerjaanLulusan.destroy();
            }

            chartPieStatusPekerjaanLulusan = new ApexCharts(document.querySelector("#chart-status-pekerjaan-lulusan"), options);
            chartPieStatusPekerjaanLulusan.render();
        }

        function calculateTotalByHubunganStudi(data) {
            var statusTotals = {
                "Sangat Erat": 0,
                "Erat": 0,
                "Cukup Erat": 0,
                "Kurang Erat": 0,
                "Tidak Sama Sekali": 0,
                "Tidak Terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.HubunganKerja)) {
                    statusTotals[item.HubunganKerja] += parseInt(item.Jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    HubunganKerja: key,
                    Jumlah: statusTotals[key]
                };
            });
        }

        function calculateTotalByTingkatPendidikan(data) {
            var statusTotals = {
                "Setingkat Lebih Tinggi": 0,
                "Tingkat yang Sama": 0,
                "Setingkat Lebih Rendah": 0,
                "Tidak Perlu Pendidikan Tinggi": 0,
                "Tidak Terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.TingkatPendidikan)) {
                    statusTotals[item.TingkatPendidikan] += parseInt(item.Jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    TingkatPendidikan: key,
                    Jumlah: statusTotals[key]
                };
            });
        }

        function calculateTotalByTingkatKerja(data) {
            var statusTotals = {
                "Eselon 1 - Karyawan Staff": 0,
                "Eselon 2 - Karyawan Staff": 0,
                "Eselon 3 - Karyawan Staff": 0,
                "Tidak Terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.StatusEselon)) {
                    statusTotals[item.StatusEselon] += parseInt(item.Jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    StatusEselon: key,
                    Jumlah: statusTotals[key]
                };
            });
        }

        function calculateTotalByPenghasilanUMP(data) {
            var statusTotals = {
                "Penghasilan lebih dari 3,4 UMP": 0,
                "Penghasilan sama dengan 3,4 UMP": 0,
                "Penghasilan kurang dari 3,4 UMP": 0,
                "Tidak Terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.KategoriPenghasilan)) {
                    statusTotals[item.KategoriPenghasilan] += parseInt(item.Jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    KategoriPenghasilan: key,
                    Jumlah: statusTotals[key]
                };
            });
        }

        function calculateTotalByJenisInstitusi(data) {
            var statusTotals = {
                "Instansi pemerintah": 0,
                "Organisasi non-profit/Lembaga Swadaya Masyarakat": 0,
                "Perusahaan swasta": 0,
                "Wiraswasta/perusahaan sendiri": 0,
                "Lainnya, tuliskan:": 0,
                "Institusi/Organisasi Multilateral": 0,
                "Tidak terdata": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.Status)) {
                    statusTotals[item.Status] += parseInt(item.Jumlah);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    Status: key,
                    Jumlah: statusTotals[key]
                };
            });
        }



        function getTotalResponseFor1Month(data, prodiCode) {
            console.log('getTotalResponseFor1Month data:', data);

            // Check if the "semua" option is selected
            if (prodiCode === "semua") {
                // Sum up all totals for the 1-month category across all programs
                return data.reduce((acc, item) => {
                    if (item.Bulan_Setelah_Lulus === '1') {
                        return acc + parseInt(item.total);
                    }
                    return acc;
                }, 0);
            } else {
                // Find the total for the 1-month category for a specific program
                const oneMonthData = data.find(item => item.Bulan_Setelah_Lulus === '1' && item.C_KODE_PRODI === prodiCode);
                return oneMonthData ? parseInt(oneMonthData.total) : 0;
            }
        }


        function calculateAverageWaitingTime(data) {
            let totalMonths = 0;
            let totalRespondents = 0;

            data.forEach(function(item) {
                // Pastikan bahwa item bulan > 12 tidak dihitung sebagai angka 12
                const months = (item.Bulan_Setelah_Lulus === '>12') ? 12 : parseInt(item.Bulan_Setelah_Lulus);
                totalMonths += months * parseInt(item.total);
                totalRespondents += parseInt(item.total);
            });

            if (totalRespondents === 0) return 0;
            return (totalMonths / totalRespondents).toFixed(2);
        }

        function updateStatistics(prodiCode) {
            const data = (prodiCode === "semua") ? total_responden_by_sebaran_masa_tunggu : total_responden_by_sebaran_masa_tunggu.filter(item => item.C_KODE_PRODI === prodiCode);
            const total1Month = getTotalResponseFor1Month(data, prodiCode);
            const averageWaitingTime = calculateAverageWaitingTime(data);

            $('#totalResponse1Bulan').text(total1Month);
            $('#rerataHasilTunggu').text(averageWaitingTime);
        }

        // Memperbarui statistik saat halaman dimuat
        updateStatistics("semua");

        function calculateTotals(data) {
            var totalYa = 0,
                totalMelanjutkanStudi = 0,
                totalWiraswasta = 0;

            data.forEach(function(item) {
                if (item.status_pekerjaan === "Ya") totalYa += parseInt(item.total_lulusan);
                else if (item.status_pekerjaan === "Melanjutkan Pendidikan") totalMelanjutkanStudi += parseInt(item.total_lulusan);
                else if (item.status_pekerjaan === "Wiraswasta") totalWiraswasta += parseInt(item.total_lulusan);
            });

            console.log(totalYa, totalMelanjutkanStudi, totalWiraswasta);

            return {
                totalYa,
                totalMelanjutkanStudi,
                totalWiraswasta
            };
        }

        function updateHtmlStats(totals) {
            var totalResponden = <?= ($total_responden) ?>;
            console.log(totalResponden);

            $('#totalRespondenYa').text(totals.totalYa);
            $('#persentaseRespondenYa').text(((totals.totalYa / totalResponden) * 100).toFixed(2) + '%');
            $('#persentaseRespondenMelanjutkanStudi').text(((totals.totalMelanjutkanStudi / totalResponden) * 100).toFixed(2) + '%');
            $('#persentaseRespondenWiraswasta').text(((totals.totalWiraswasta / totalResponden) * 100).toFixed(2) + '%');
        }

        function calculateTotalByStatus(data) {
            var statusTotals = {
                "Ya": 0,
                "Belum Memungkinan Bekerja": 0,
                "Wiraswasta": 0,
                "Melanjutkan Pendidikan": 0,
                "Tidak Kerja Tetapi Sedang Mencari Kerja": 0
            };

            data.forEach(function(item) {
                if (statusTotals.hasOwnProperty(item.status_pekerjaan)) {
                    statusTotals[item.status_pekerjaan] += parseInt(item.total_lulusan);
                }
            });

            return Object.keys(statusTotals).map(function(key) {
                return {
                    status_pekerjaan: key,
                    total_lulusan: statusTotals[key]
                };
            });
        }

        function filterDataByProdi(prodiCode) {
            var filtered = total_responden_by_aktivitas_lulusan.filter(function(item) {
                return item.C_KODE_PRODI === prodiCode;
            });
            return calculateTotalByStatus(filtered);
        }



        var KTApexChartsDemo = function() {
            var _demo5 = function(data) {
                var categories = [];
                var series = [];

                data.forEach(function(item) {
                    categories.push(item.status_pekerjaan);
                    series.push(item.total_lulusan);
                });

                var options = {
                    series: series,
                    chart: {
                        height: 310,
                        type: 'pie',
                    },
                    labels: categories,
                };

                if (chartPie) {
                    chartPie.destroy();
                }

                chartPie = new ApexCharts(document.querySelector("#chart-aktivitas-lulusan"), options);
                chartPie.render();
            }

            return {
                init: function(data) {
                    _demo5(data);
                }
            };
        }();

        function prepareDataSebaranMasaTunggu(data, prodiCode) {
            let categories = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '>12'];
            let seriesData = categories.map(category => {
                // Jika kode prodi adalah "semua", kita akan menghitung total dari semua program studi.
                if (prodiCode === "semua") {
                    return data.filter(item => item.Bulan_Setelah_Lulus === category)
                        .reduce((acc, item) => acc + parseInt(item.total), 0);
                }
                // Jika tidak, kita akan menghitung total berdasarkan kode prodi tertentu.
                return data.filter(item => item.Bulan_Setelah_Lulus === category && item.C_KODE_PRODI === prodiCode)
                    .reduce((acc, item) => acc + parseInt(item.total), 0);
            });

            return {
                categories: categories,
                seriesData: seriesData
            };
        }


        function getDataByProdi(prodiCode) {
            // Jika kode program studi adalah "semua", kembalikan total data.
            if (prodiCode === "semua") {
                return total_responden_by_sebaran_masa_tunggu;
            }
            // Jika tidak, filter data berdasarkan program studi yang dipilih.
            return total_responden_by_sebaran_masa_tunggu.filter(item => item.C_KODE_PRODI === prodiCode);
        }

        function updateLineChart(data, prodiCode) {
            var chartData = prepareDataSebaranMasaTunggu(data, prodiCode);
            initSebaranMasaTungguChart(chartData);
        }



        function initSebaranMasaTungguChart(chartData) {
            var options = {
                series: [{
                    name: "Total Responden",
                    data: chartData.seriesData,
                    color: "#008FFB", // Warna garis
                }],
                chart: {
                    height: 350,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    animations: {
                        enabled: true,
                        easing: 'easeinout',
                        speed: 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth', // Gaya garis menjadi lebih halus
                    width: 3
                },
                markers: {
                    size: 5,
                    colors: ["#FFFFFF"],
                    strokeColors: "#008FFB",
                    strokeWidth: 2,
                    hover: {
                        size: 7,
                    }
                },
                tooltip: {
                    enabled: true,
                    theme: 'dark'
                },
                grid: {
                    row: {
                        colors: ['#f3f4f5', 'transparent'],
                        opacity: 0.5
                    },
                    borderColor: '#e7e7e7',
                },
                xaxis: {
                    categories: chartData.categories,
                    labels: {
                        style: {
                            colors: '#333',
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Bulan Setelah Lulus',
                        style: {
                            color: '#333',
                            fontSize: '14px',
                            fontWeight: 'bold'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            color: '#333',
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Total Responden',
                        style: {
                            color: '#333',
                            fontSize: '14px',
                            fontWeight: 'bold'
                        }
                    }
                },
                title: {
                    text: 'Sebaran Masa Tunggu Kerja Lulusan (Bulan)',
                    align: 'left',
                    style: {
                        color: '#333',
                        fontSize: '16px',
                        fontWeight: 'bold'
                    }
                },
            };

            if (chartLine) {
                chartLine.destroy();
            }

            chartLine = new ApexCharts(document.querySelector("#chart-sebaran-masa-tunggu"), options);
            chartLine.render();
        }

        function initJenisInstitusiChart(data) {
            var categories = [];
            var series = [];

            data.forEach(function(item) {
                categories.push(item.Status);
                series.push(item.Jumlah);
            });

            var options = {
                series: series,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieJenisInstitusi) {
                chartPieJenisInstitusi.destroy();
            }

            chartPieJenisInstitusi = new ApexCharts(document.querySelector("#chart-jenis-institusi"), options);
            chartPieJenisInstitusi.render();
        }

        function initTingkatKerjaChart(data) {
            var categories = [];
            var series = [];

            data.forEach(function(item) {
                categories.push(item.StatusEselon);
                series.push(item.Jumlah);
            });

            var options = {
                series: series,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieTingkatKerja) {
                chartPieTingkatKerja.destroy();
            }

            chartPieTingkatKerja = new ApexCharts(document.querySelector("#chart-tingkat-kerja"), options);
            chartPieTingkatKerja.render();
        }

        function initPenghasilanUMPChart(data) {
            var categories = [];
            var series = [];

            data.forEach(function(item) {
                categories.push(item.KategoriPenghasilan);
                series.push(item.Jumlah);
            });

            var options = {
                series: series,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPiePenghasilanUMP) {
                chartPiePenghasilanUMP.destroy();
            }

            chartPiePenghasilanUMP = new ApexCharts(document.querySelector("#chart-penghasilan-ump"), options);
            chartPiePenghasilanUMP.render();
        }

        function initTingkatPendidikanChart(data) {
            var categories = [];
            var series = [];

            data.forEach(function(item) {
                categories.push(item.TingkatPendidikan);
                series.push(item.Jumlah);
            });

            var options = {
                series: series,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieTingkatPendidikan) {
                chartPieTingkatPendidikan.destroy();
            }

            chartPieTingkatPendidikan = new ApexCharts(document.querySelector("#chart-tingkat-pendidikan"), options);
            chartPieTingkatPendidikan.render();
        }

        function initHubunganStudiChart(data) {
            var categories = [];
            var series = [];

            data.forEach(function(item) {
                categories.push(item.HubunganKerja);
                series.push(item.Jumlah);
            });

            var options = {
                series: series,
                chart: {
                    height: 250,
                    type: 'pie',
                },
                labels: categories,
            };

            if (chartPieHubunganStudi) {
                chartPieHubunganStudi.destroy();
            }

            chartPieHubunganStudi = new ApexCharts(document.querySelector("#chart-hubungan-studi"), options);
            chartPieHubunganStudi.render();
        }
    </script>