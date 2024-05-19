<?=

view('layouts/header');

?>


<!--begin::Subheader-->
<div class="subheader py-3 py-lg-4  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center mr-1">

            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h2 class="d-flex align-items-center  text-dark font-weight-bold my-1 mr-3">
                    Daftar Kuesioner
                </h2>
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= route_to('admin_prodi_dashboard') ?>" class="text-muted">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= route_to('admin_prodi_kuesioner_prodi') ?>" class="text-muted">
                            Kuesioner
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted">
                            Detail Chart Kuesioner
                        </a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Subheader-->

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-body">
                <!-- Check  $data['pertanyaan'] is null or not -->
                <?php if (empty($data['pertanyaan'])) : ?>
                    <div class="text-center">
                        <h2 class="text-center">Belum ada pertanyaan, silahkan tambahkan pertanyaan untuk menampilkan chart pada kuesioner ini</h2>
                    </div>
                <?php endif; ?>
                <?php foreach ($data['pertanyaan'] as $pertanyaan) : ?>
                    <div class="pertanyaan-item mb-3">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <a href="#" class="card-title-link" data-toggle="collapse" data-target="#pertanyaan-<?= $pertanyaan->pertanyaan_id ?>">
                                        <?= $pertanyaan->teks_pertanyaan ?>
                                    </a>
                                </h5>
                            </div>
                            <div class="collapse" id="pertanyaan-<?= $pertanyaan->pertanyaan_id ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <?php

                                        if ($pertanyaan->tipe_pertanyaan != 'text') {

                                        ?>
                                            <div class="col-md-12">
                                                <label for="chartTypeField_<?= $pertanyaan->pertanyaan_id ?>">Pilih Tipe Chart</label>
                                                <select class="form-control" id="chartTypeField_<?= $pertanyaan->pertanyaan_id ?>" data-id="<?= $pertanyaan->pertanyaan_id ?>" onchange="updateChartType(this)">
                                                    <option value="table">Table Chart</option>
                                                    <option value="pie">Pie Chart</option>
                                                    <option value="bar">Bar Chart</option>
                                                </select>
                                            </div>

                                        <?php } ?>
                                        <div class="col-md-12 chart-container">
                                            <div id="chart-pertanyaan-<?= $pertanyaan->pertanyaan_id ?>"></div>
                                        </div>
                                    </div>
                                    <div id='choicePertanyaan-<?= $pertanyaan->pertanyaan_id ?>' class="mt-3" style="text-align: -webkit-center;">
                                        <?php if ($pertanyaan->tipe_pertanyaan != 'text') : ?>
                                            <?php if ($pertanyaan->tipe_pertanyaan == 'checkbox') : ?>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Pilihan Jawaban</th>
                                                            <th>Jumlah Jawaban</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $jawabanPilihan = array();
                                                        foreach ($pertanyaan->pilihan_jawaban as $pilihan) :
                                                            $jawabanPilihan[$pilihan->teks_pilihan] = 0;
                                                        endforeach;

                                                        foreach ($data['jawaban'] as $jawaban) :
                                                            if ($jawaban->pertanyaan_id == $pertanyaan->pertanyaan_id) {
                                                                $pilihanJawaban = explode(",", $jawaban->jawaban_text);
                                                                foreach ($pilihanJawaban as $pilihan) {
                                                                    $jawabanPilihan[$pilihan]++;
                                                                }
                                                            }
                                                        endforeach;

                                                        foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                            <tr>
                                                                <td><?= $pilihan->teks_pilihan ?></td>
                                                                <td><?= $jawabanPilihan[$pilihan->teks_pilihan] ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php elseif ($pertanyaan->tipe_pertanyaan == 'radio') : ?>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Pilihan Jawaban</th>
                                                            <th>Jumlah Jawaban</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $jawabanPilihan = array();
                                                        foreach ($pertanyaan->pilihan_jawaban as $pilihan) :
                                                            $jawabanPilihan[$pilihan->teks_pilihan] = 0;
                                                        endforeach;

                                                        foreach ($data['jawaban'] as $jawaban) :
                                                            if ($jawaban->pertanyaan_id == $pertanyaan->pertanyaan_id) {
                                                                $jawabanPilihan[$jawaban->jawaban_text]++;
                                                            }
                                                        endforeach;

                                                        foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                            <tr>
                                                                <td><?= $pilihan->teks_pilihan ?></td>
                                                                <td><?= $jawabanPilihan[$pilihan->teks_pilihan] ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php elseif ($pertanyaan->tipe_pertanyaan == 'option') : ?>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Pilihan Jawaban</th>
                                                            <th>Jumlah Jawaban</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $jawabanPilihan = array();
                                                        foreach ($pertanyaan->pilihan_jawaban as $pilihan) :
                                                            $jawabanPilihan[$pilihan->teks_pilihan] = 0;
                                                        endforeach;

                                                        foreach ($data['jawaban'] as $jawaban) :
                                                            if ($jawaban->pertanyaan_id == $pertanyaan->pertanyaan_id) {
                                                                $jawabanPilihan[$jawaban->jawaban_text]++;
                                                            }
                                                        endforeach;

                                                        foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                            <tr>
                                                                <td><?= $pilihan->teks_pilihan ?></td>
                                                                <td><?= $jawabanPilihan[$pilihan->teks_pilihan] ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <div class="mt-3">
                                                <ul class="list-group">
                                                    <?php foreach ($data['jawaban'] as $jawaban) : ?>
                                                        <?php if ($jawaban->pertanyaan_id == $pertanyaan->pertanyaan_id) : ?>
                                                            <li class="list-group-item">
                                                                <?= $jawaban->jawaban_text ?>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>




<?=

view('layouts/footer');

?>

<script>
    var jawabanData = <?= json_encode($data['jawaban']) ?>;
    var pertanyaanData = <?= json_encode($data['pertanyaan']) ?>;

    function updateChartType(e) {
        var id = $(e).data('id');
        var chartType = $(e).val();
        var tipePertanyaan = pertanyaanData.find(pertanyaan => pertanyaan.pertanyaan_id == id).tipe_pertanyaan;

        // Remove existing chart container
        $('#chart-pertanyaan-' + id).remove();

        if (chartType !== 'table') {
            // Create a new container for the chart
            var newChartContainer = '<div id="chart-pertanyaan-' + id + '"></div>';

            // Append the new container to the right place
            $('#choicePertanyaan-' + id).html(newChartContainer);
        }

        if (tipePertanyaan == 'checkbox' || tipePertanyaan == 'radio' || tipePertanyaan == 'option') {
            if (chartType == 'table') {
                // Handle table chart
                var table = '<table class="table table-bordered">';
                table += '<thead>';
                table += '<tr>';
                table += '<th>Pilihan Jawaban</th>';
                table += '<th>Jumlah Jawaban</th>';
                table += '</tr>';
                table += '</thead>';
                table += '<tbody>';
                var jawabanPilihan = {};
                pertanyaanData.find(pertanyaan => pertanyaan.pertanyaan_id == id).pilihan_jawaban.forEach(pilihan => {
                    jawabanPilihan[pilihan.teks_pilihan] = 0;
                });
                jawabanData.forEach(jawaban => {
                    if (jawaban.pertanyaan_id == id) {
                        var pilihanJawaban = jawaban.jawaban_text.split(',');
                        pilihanJawaban.forEach(pilihan => {
                            jawabanPilihan[pilihan]++;
                        });
                    }
                });
                pertanyaanData.find(pertanyaan => pertanyaan.pertanyaan_id == id).pilihan_jawaban.forEach(pilihan => {
                    table += '<tr>';
                    table += '<td>' + pilihan.teks_pilihan + '</td>';
                    table += '<td>' + jawabanPilihan[pilihan.teks_pilihan] + '</td>';
                    table += '</tr>';
                });
                table += '</tbody>';
                table += '</table>';
                $('#choicePertanyaan-' + id).html(table);
            } else {
                // Handle pie chart or bar chart
                var chartData = [];
                var jawabanPilihan = {};
                pertanyaanData.find(pertanyaan => pertanyaan.pertanyaan_id == id).pilihan_jawaban.forEach(pilihan => {
                    jawabanPilihan[pilihan.teks_pilihan] = 0;
                });
                jawabanData.forEach(jawaban => {
                    if (jawaban.pertanyaan_id == id) {
                        var pilihanJawaban = jawaban.jawaban_text.split(',');
                        pilihanJawaban.forEach(pilihan => {
                            jawabanPilihan[pilihan]++;
                        });
                    }
                });
                pertanyaanData.find(pertanyaan => pertanyaan.pertanyaan_id == id).pilihan_jawaban.forEach(pilihan => {
                    chartData.push({
                        category: pilihan.teks_pilihan,
                        value: jawabanPilihan[pilihan.teks_pilihan]
                    });
                });

                var categories = [];
                var series = [];

                for (var key in jawabanPilihan) {
                    categories.push(key);
                    series.push(jawabanPilihan[key]);
                }


                // Initialize chart
                if (chartType == 'pie') {
                    var options = {
                        series: series,
                        chart: {
                            width: 600,
                            type: 'pie',
                        },
                        labels: categories,
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };
                } else if (chartType == 'bar') {
                    var options = {
                        series: [{
                            data: series
                        }],
                        chart: {
                            type: 'bar',
                            height: 600
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                endingShape: 'rounded',
                                floating: false // Add this line to remove the float property
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: categories,
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val
                                }
                            }
                        }
                    };
                }

                var chart = new ApexCharts(document.querySelector("#chart-pertanyaan-" + id), options);
                chart.render();
            }
        }
    }
</script>