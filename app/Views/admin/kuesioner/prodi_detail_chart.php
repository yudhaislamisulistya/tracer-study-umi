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
                        <a href="<?= route_to('admin_dashboard') ?>" class="text-muted">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted">
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
                                        <div class="col-md-4">
                                            <label for="chartTypeField_<?= $pertanyaan->pertanyaan_id ?>">Pilih Tipe Chart</label>
                                            <select class="form-control" id="chartTypeField_<?= $pertanyaan->pertanyaan_id ?>">
                                                <option value="table">Table Chart</option>
                                                <option value="pie">Pie Chart</option>
                                                <option value="bar">Bar Chart</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 chart-container">
                                            <div id="chart-pertanyaan-<?= $pertanyaan->pertanyaan_id ?>"></div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
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
                                    </div>
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
    var KTApexCharts = function() {
        var _demo1 = function() {
            var options = {
                series: [],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: [],
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-pertanyaan-<?= $pertanyaan->pertanyaan_id ?>"), options);
            chart.render();
        }

        return {
            init: function() {
                _demo1();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTApexCharts.init();
    });
</script>