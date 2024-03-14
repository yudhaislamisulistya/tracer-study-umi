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
                                    Distribusi Alumni per Program Studi
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart1">
                            </div>
                            <caption>
                                Total Alumni: <?= format_ribuan($total_alumni) ?>
                            </caption>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Capaian Alumni berdasarkan IP Kumulatif
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart3">
                            </div>
                            <caption>
                                Total Alumni: <?= format_ribuan($total_alumni) ?>
                            </caption>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Tren Lulusan per Tahun
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart2">
                            </div>
                            <caption>
                                Total Alumni: <?= format_ribuan($total_alumni) ?>
                            </caption>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Legalisir berdasarkan Status
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart4">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Legalisir berdasarkan TTD Berkas
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart5">
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
    var total_alumni_by_program_studi = <?= json_encode($total_alumni_by_program_studi) ?>;
    var total_alumni_based_jumlah_lulusan = <?= json_encode($total_alumni_based_jumlah_lulusan) ?>;
    var total_status_ip_kumulatif = <?= json_encode($total_status_ip_kumulatif) ?>;
    var total_legalisir_based_status = <?= json_encode($total_legalisir_based_status) ?>;
    var total_legalisir_by_ttd_berkas_path = <?= json_encode($total_legalisir_by_ttd_berkas_path) ?>;
    var KTApexChartsDemo = function() {
        var _demo1 = function() {
            var categories = [];
            var series = [];

            total_alumni_by_program_studi.forEach(function(item) {
                categories.push(item.NAMA_PRODI);
                series.push(item.jumlah_alumni);
            });

            var options = {
                series: [{
                    name: 'Alumni',
                    data: series
                }],
                chart: {
                    height: 500,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        distributed: true,
                        borderRadius: 10,
                        columnWidth: '50%',
                        enableShades: false,
                        endingShape: 'rounded',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                // remove legend
                legend: {
                    show: false,
                },
                stroke: {
                    width: 2
                },
                xaxis: {
                    labels: {
                        rotate: -90,
                        style: {
                            fontSize: '8px'
                        }
                    },
                    categories: categories,
                    tickPlacement: 'on'
                    // change font

                },
                yaxis: {
                    title: {
                        text: 'Total Alumni',
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart1"), options);
            chart.render();
        }

        var _demo2 = function() {
            var categories = [];
            var series = [];

            total_alumni_based_jumlah_lulusan.forEach(function(item) {
                categories.push(item.tahun_lulus);
                series.push(item.jumlah_lulusan);
            });

            var options = {
                series: [{
                    name: 'Alumni',
                    data: series
                }],
                chart: {
                    height: 300,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        distributed: true,
                        borderRadius: 10,
                        columnWidth: '50%',
                        enableShades: false,
                        endingShape: 'rounded',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                // remove legend
                legend: {
                    show: false,
                },
                stroke: {
                    width: 2
                },
                xaxis: {
                    labels: {
                        rotate: -90,
                        style: {
                            fontSize: '8px'
                        }
                    },
                    categories: categories,
                    tickPlacement: 'on'
                    // change font

                },
                yaxis: {
                    title: {
                        text: 'Total Alumni',
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart2"), options);
            chart.render();
        }

        // Make pie chart from total_status_ip_kumulatif
        var _demo3 = function() {
            var categories = [];
            var series = [];

            total_status_ip_kumulatif.forEach(function(item) {
                categories.push(item.Status_IPK);
                series.push(parseInt(item.Jumlah));
            });


            var options = {
                series: series,
                chart: {
                    height: 310,
                    type: 'pie',
                },
                labels: categories,
            };

            var chart = new ApexCharts(document.querySelector("#chart3"), options);
            chart.render();
        }

        // Make pir chart from total_legalisir_based_status
        var _demo4 = function() {
            var categories = [];
            var series = [];

            total_legalisir_based_status.forEach(function(item) {
                categories.push(item.status);
                series.push(parseInt(item.total_legalisir));
            });

            var options = {
                series: series,
                chart: {
                    height: 310,
                    type: 'pie',
                },
                labels: categories,
            };

            var chart = new ApexCharts(document.querySelector("#chart4"), options);
            chart.render();
        }

        // Make pir chart from total_legalisir_by_ttd_berkas_path
        var _demo5 = function() {
            var categories = [];
            var series = [];

            total_legalisir_by_ttd_berkas_path.forEach(function(item) {
                categories.push(item.ttd_berkas_path);
                series.push(parseInt(item.total_legalisir));
            });

            var options = {
                series: series,
                chart: {
                    height: 310,
                    type: 'pie',
                },
                labels: categories,
            };

            var chart = new ApexCharts(document.querySelector("#chart5"), options);
            chart.render();
        }



        return {
            init: function() {
                _demo1();
                _demo2();
                _demo3();
                _demo4();
                _demo5();

            }
        };
    }();

    jQuery(document).ready(function() {
        KTApexChartsDemo.init();
    });
</script>