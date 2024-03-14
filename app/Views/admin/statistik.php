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
                                    Distribusi Alumni Berdasarkan Tahun Masuk
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart1">
                            </div>
                            <caption>
                            </caption>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Distribusi Alumni Berdasarkan Program Studi</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart2">
                            </div>
                            <caption>
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
                                <h3 class="card-label">Distribusi Alumni Berdasarkan Jenjang Pendidikan</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart3">
                            </div>
                            <caption>
                            </caption>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Distribusi Alumni Berdasarkan Jenis Kelamin</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart4">
                            </div>
                            <caption>
                            </caption>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom gutter-b">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Distribusi Alumni Berdasarkan Fakultas</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart5">
                            </div>
                            <caption>
                            </caption>
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
    var total_alumni_by_tahun_masuk = <?= json_encode($total_alumni_by_tahun_masuk) ?>;
    var total_alumni_by_program_studi = <?= json_encode($total_alumni_by_program_studi) ?>;
    var total_alumni_by_jenjang_pendidikan = <?= json_encode($total_alumni_by_jenjang_pendidikan) ?>;
    var total_alumni_by_jenis_kelamin = <?= json_encode($total_alumni_by_jenis_kelamin) ?>;
    var total_alumni_by_fakultas = <?= json_encode($total_alumni_by_fakultas) ?>;
    var KTApexChartsDemo = function() {
        var _demo1 = function() {
            var categories = [];
            var series = [];

            total_alumni_by_tahun_masuk.forEach(function(item) {
                categories.push(item.thn_masuk);
                series.push(item.jumlah_alumni);
            });

            var options = {
                series: [{
                    name: 'Alumni',
                    data: series
                }],
                chart: {
                    height: 500,
                    type: 'line',
                },
                plotOptions: {
                    line: {
                        distributed: true,
                        borderRadius: 10,
                        columnWidth: '50%',
                        enableShades: false,
                        endingShape: 'rounded',
                    }
                },

                dataLabels: {
                    enabled: true, // Mengaktifkan data labels
                    offsetX: 0,
                    offsetY: -5,
                    style: {
                        fontSize: '8px',
                        colors: ['#000'] // Warna dari text label, ubah sesuai kebutuhan
                    },
                    background: {
                        enabled: true, // Opsi untuk menambahkan background pada label
                        foreColor: '#fff', // Warna foreground dari background label
                        padding: 4,
                        borderRadius: 2,
                        borderWidth: 1,
                        borderColor: '#fff',
                        opacity: 0.9, // Atur transparansi background label
                        dropShadow: {
                            enabled: false
                        }
                    },
                    formatter: function(value) {
                        return value; // Format nilai yang ditampilkan pada label, bisa disesuaikan
                    }
                },
                // remove legend
                legend: {
                    show: false,
                },
                stroke: {
                    width: 2,
                    curve: 'smooth' // Menambahkan garis yang halus
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

            total_alumni_by_program_studi.forEach(function(item) {
                categories.push(item.nm_prodi);
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
                    enabled: true, // Mengaktifkan data labels
                    offsetX: 0,
                    offsetY: -5,
                    style: {
                        fontSize: '8px',
                        colors: ['#000'] // Warna dari text label, ubah sesuai kebutuhan
                    },
                    background: {
                        enabled: true, // Opsi untuk menambahkan background pada label
                        foreColor: '#fff', // Warna foreground dari background label
                        padding: 4,
                        borderRadius: 2,
                        borderWidth: 1,
                        borderColor: '#fff',
                        opacity: 0.9, // Atur transparansi background label
                        dropShadow: {
                            enabled: false
                        }
                    },
                    formatter: function(value) {
                        return value; // Format nilai yang ditampilkan pada label, bisa disesuaikan
                    }
                },
                // remove legend
                legend: {
                    show: false,
                },
                stroke: {
                    width: 2,
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

        // Pie Chart 
        var _demo3 = function() {
            var categories = [];
            var series = [];

            total_alumni_by_jenjang_pendidikan.forEach(function(item) {
                categories.push(item.nm_jenjang_prodi);
                series.push(parseInt(item.jumlah_alumni));
            });

            var options = {
                series: series,
                chart: {
                    width: 380,
                    height: 380,
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

            var chart = new ApexCharts(document.querySelector("#chart3"), options);
            chart.render();
        }

        var _demo4 = function() {
            var categories = [];
            var series = [];

            total_alumni_by_jenis_kelamin.forEach(function(item) {
                categories.push(item.jns_kelamin);
                series.push(parseInt(item.jumlah_alumni));
            });

            var options = {
                series: series,
                chart: {
                    width: 380,
                    height: 380,
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

            var chart = new ApexCharts(document.querySelector("#chart4"), options);
            chart.render();
        }

        // Bar Chart total_alumni_by_fakultas
        var _demo5 = function() {
            var categories = [];
            var series = [];

            total_alumni_by_fakultas.forEach(function(item) {
                categories.push(item.nm_fakultas);
                series.push(parseInt(item.jumlah_alumni));
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
                    enabled: true, // Mengaktifkan data labels
                    offsetX: 0,
                    offsetY: -5,
                    style: {
                        fontSize: '8px',
                        colors: ['#000'] // Warna dari text label, ubah sesuai kebutuhan
                    },
                    background: {
                        enabled: true, // Opsi untuk menambahkan background pada label
                        foreColor: '#fff', // Warna foreground dari background label
                        padding: 4,
                        borderRadius: 2,
                        borderWidth: 1,
                        borderColor: '#fff',
                        opacity: 0.9, // Atur transparansi background label
                        dropShadow: {
                            enabled: false
                        }
                    },
                    formatter: function(value) {
                        return value; // Format nilai yang ditampilkan pada label, bisa disesuaikan
                    }
                },
                // remove legend
                legend: {
                    show: false,
                },
                stroke: {
                    width: 2,
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
                },
                yaxis: {
                    title: {
                        text: 'Total Alumni',
                    },
                },
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