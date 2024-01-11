<?=

view('layouts/header');

?>

<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="d-flex flex-column-fluid">
        <div class=" container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Responden Tracer Study berdasarkan Program Studi
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
                                    <p style="font-size: 16px;">Pengumpulan data Tracer Study dilakukan melalui kuesioner online di https://alumni.umi.ac.id/. Pengumpulan data dilakukan dari bulan awal Maret sampai dengan pertengahan Desember 2023 , diperoleh <b><?= format_ribuan($total_responden) ?></b> alumni yang merespon survei dari <b><?= format_ribuan($total_alumni_by_tahun_lulus) ?></b> target responden. Persentase response rate <b>Tracer Study UMI 2021 (Lulusan tahun 2020)</b> jenjang, Diploma, Sarjana, Magister, dan Doktor serta Profesi adalah <b><?= round($total_responden / $total_alumni_by_tahun_lulus * 100, 2) ?>%</b>.</p>
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
                                    <h3>Total Responden : <?= format_ribuan($total_responden) ?></h3>
                                </caption>

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
                                    Aktivitas Lulusan Semua Jenjang Program Studi
                                </h3>
                            </div>
                            <div class="card-tools" style="align-self: center;">
                                <button class="btn btn-tool" data-toggle="collapse" data-target="#collapseCardBody2">
                                    <i class="fas fa-plus" id="collapseIcon2"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse" id="collapseCardBody2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="program_studi">Program Studi</label>
                                        <select class="form-control" id="program_studi">
                                            <option value="semua">-- Semua Program Studi --</option>
                                            <?php
                                            foreach (get_data_program_studi() as $item) {
                                            ?>
                                                <option value="<?= $item->C_KODE_PRODI ?>"><?= $item->NAMA_PRODI ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div id="chart-aktivitas-lulusan"></div>
                                </div>
                                <div class="col-md-6" style="align-self: center; text-align: justify;">
                                    <p style="font-size: 16px;">Alumni jenjang, Diploma, Sarjana, Magister, dan Doktor serta Profesi memiliki beragam aktivitas. Alumni yang bekerja sebanyak <b id="totalRespondenYa"> 2.035</b> atau sebesar <b id="persentaseRespondenYa">57,7%</b> dari total responden <b><?= format_ribuan($total_responden) ?></b>. Selain itu, alumni yang melanjutkan studi cukup besar yakni sebesar <b id="persentaseRespondenMelanjutkanStudi">27,7%</b> dan alumni yang memilih menjadi wiraswasta sebesar <b id="persentaseRespondenWiraswasta">8,9%</b>​</p>

                                    <p style="font-size: 16px;">Alumni jenjang, Diploma, Sarjana, Magister, dan Doktor serta Profesi memiliki waktu cukup singkat memperoleh pekerjaan setelah lulus. Masa tunggu paling banyak di waktu 1 bulan setelah lulus dengan total <b id="totalResponse1Bulan">970 alumni</b>. Rata-rata masa tunggu alumni jenjang, Diploma, Sarjana, Magister, dan Doktor serta Profesi dalam memperoleh pekerjaan setelah lulus sebesar <b id="rerataHasilTunggu">2,86</b> <b>Bulan</b></p>
                                </div>
                                <div class="col-md-12">
                                    <div id="chart-sebaran-masa-tunggu"></div>
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
                                    Pekerjaan dan aktivitas saat ini
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
                                <div class="col-md-6">
                                    <h4>Jenis Institusi tempat alumni bekerja</h4>
                                    <div id="chart-jenis-institusi"></div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Tingkat kerja atau posisi alumni saat ini</h4>
                                    <div id="chart-tingkat-kerja"></div>
                                </div>
                                <div class="col-md-6 mt-5" style="margin-top: 50px !important;">
                                    <h4>Status penghasilan berdasarkan UMP Sulawei selatan</h4>
                                    <div id="chart-penghasilan-ump"></div>
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
                                    Capaian Pembelajaran Lulusan
                                </h3>
                            </div>
                            <div class="card-tools" style="align-self: center;">
                                <button class="btn btn-tool" data-toggle="collapse" data-target="#collapseCardBody4">
                                    <i class="fas fa-plus" id="collapseIcon4"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body collapse" id="collapseCardBody4">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Kesesuaian tingkat pendidikan dengan pekerjaan saat ini</h4>
                                    <div id="chart-tingkat-pendidikan"></div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Tingkat kerja atau posisi alumni saat ini</h4>
                                    <div id="chart-hubungan-studi"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

            $('#collapseCardBody4').on('shown.bs.collapse', function() {
                $('#collapseIcon4').removeClass('fa-plus').addClass('fa-minus');
            });

            $('#collapseCardBody4').on('hidden.bs.collapse', function() {
                $('#collapseIcon4').removeClass('fa-minus').addClass('fa-plus');
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