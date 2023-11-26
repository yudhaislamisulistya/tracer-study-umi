<?=

view('layouts/header');

?>



<!--begin::Content-->
<!--begin::Subheader-->
<div class="subheader py-3 py-lg-4  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center mr-1">

            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h2 class="d-flex align-items-center  text-dark font-weight-bold my-1 mr-3">
                    Daftar Alumni
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
                            Manajemen Alumni
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= route_to('admin_alumni') ?>" class="text-muted">
                            Daftar Alumni
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
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        Daftar Alumni
                    </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Design/PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                    </g>
                                </svg><!--end::Svg Icon--></span> Export
                        </button>

                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi flex-column navi-hover py-2">
                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                    Choose an option:
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon"><i class="la la-print"></i></span>
                                        <span class="navi-text">Print</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon"><i class="la la-copy"></i></span>
                                        <span class="navi-text">Copy</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                        <span class="navi-text">Excel</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                        <span class="navi-text">CSV</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                        <span class="navi-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->

                    <!--begin::Button-->
                    <a href="#" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span> New Records (Import Excel)
                    </a>
                    <!--end::Button-->
                    <!-- Download Format -->
                    <a href="<?= base_url('assets/format/format_alumni.xlsx') ?>" class="btn btn-success font-weight-bolder ml-2">
                        <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Design/Flatten.svg--><i class="fas fa-download"></i><!--end::Svg Icon-->
                        </span> Download Format
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="mb-15">
                    <div class="row mb-6">
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>NIM:</label>
                            <input type="text" class="form-control datatable-input" placeholder="NIM" id="nimSearch" data-col-index="0" />
                        </div>
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>Program Studi:</label>
                            <select class="form-control datatable-input" id="programStudiSearch" data-col-index="1">
                                <option value="">Pilih Program Studi</option>
                                <?php
                                foreach (get_data_program_studi() as $key => $value) {
                                    echo '<option value="' . $value->C_KODE_PRODI . '">' . $value->NAMA_PRODI . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>Name:</label>
                            <input type="text" class="form-control datatable-input" placeholder="John Doe" id="nameSearch" data-col-index="2" />
                        </div>
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>Jenis Keluar:</label>
                            <select class="form-control datatable-input" id="jenisKeluarSearch" data-col-index="3">
                                <option value="">Pilih Jenis Keluar</option>
                                <?php
                                foreach (get_data_jenis_keluar() as $key => $value) {
                                    echo '<option value="' . $value->id_jns_keluar . '">' . $value->ket_keluar . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row mb-6">
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>Tanggal Keluar:</label>
                            <input type="date" class="form-control datatable-input" placeholder="Tanggal Keluar" id="tanggalKeluarSearch" data-col-index="4" />
                        </div>
                        <!-- Tahun Masuk -->
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>Tahun Masuk:</label>
                            <select class="form-control datatable-input" id="tahunMasukSearch" data-col-index="3">
                                <option value="">Pilih Tahun Masuk</option>
                                <?php
                                for ($i = 2010; $i <= date('Y'); $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Tahun Keluar -->
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>Tahun Keluar:</label>
                            <select class="form-control datatable-input" id="tahunKeluar" data-col-index="3">
                                <option value="">Pilih Tahun Keluar</option>
                                <?php
                                for ($i = 2010; $i <= date('Y'); $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Semester Keluar -->
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>Semester Keluar:</label>
                            <select class="form-control datatable-input" id="semesterKeluar" data-col-index="3">
                                <option value="">Pilih Semester Keluar</option>
                                <?php
                                for ($tahun = 2023; $tahun >= 2010; $tahun--) {
                                    $semesterGasal = $tahun . "1"; // Menyatakan semester Gasal
                                    $semesterGenap = $tahun . "2"; // Menyatakan semester Genap

                                    echo '<option value="' . $semesterGasal . '">' . $tahun . ' Gasal</option>';
                                    echo '<option value="' . $semesterGenap . '">' . $tahun . ' Genap</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-8">
                        <div class="col-lg-12">
                            <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                <span>
                                    <i class="la la-search"></i>
                                    <span>Search</span>
                                </span>
                            </button>
                            &nbsp;&nbsp;
                            <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                                <span>
                                    <i class="la la-close"></i>
                                    <span>Reset</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
                <!--begin: Datatable-->
                <table id="alumniTable" class="table table-separate table-head-custom collapsed" style="width:100%">
                    <thead>
                        <tr>
                            <th>Record ID</th>
                            <th>NIM</th>
                            <th>Nama Prodi</th>
                            <th>Nama</th>
                            <th>Jenis Keluar</th>
                            <th>Tanggal Keluar</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Keluar</th>
                            <th>Semester Keluar</th>
                            <th>SK Yudisium</th>
                            <th>Tanggal SK Yudisium</th>
                            <th>IP Kumulatif</th>
                            <th>Nomor Seri Ijazah</th>
                            <th>Judul Tugas Akhir</th>
                            <th>Pembimbing Satu</th>
                            <th>Pembimbing Dua</th>
                            <th>Pembimbing Tiga</th>
                            <th>Penguji Satu</th>
                            <th>Penguji Dua</th>
                            <th>Penguji Tiga</th>
                            <th>Nomor SK Tugas</th>
                            <th>Tanggal SK Tugas</th>
                            <th>Keterangan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->



</div>
<!--end::Entry-->
<!--end::Content-->

<?=

view('layouts/footer');

?>

<script>
    $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        var table = $('#alumniTable').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": "/api-v2/alumni",
                "data": function(d) {
                    d.page = (d.start / d.length) + 1;
                    d.perpage = d.length;
                    d.nameSearch = $('#nameSearch').val();
                    d.nimSearch = $('#nimSearch').val();
                    d.programStudiSearch = $('#programStudiSearch').val();
                    d.jenisKeluarSearch = $('#jenisKeluarSearch').val();
                    d.tanggalKeluarSearch = $('#tanggalKeluarSearch').val();
                    d.tahunMasukSearch = $('#tahunMasukSearch').val();
                    d.tahunKeluar = $('#tahunKeluar').val();
                    d.semesterKeluar = $('#semesterKeluar').val();
                },
            },
            "searching": false,
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "nim"
                },
                {
                    "data": "NAMA_PRODI"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "jenis_keluar"
                },
                {
                    "data": "tanggal_keluar"
                },
                {
                    "data": "tahun_masuk"
                },
                {
                    "data": "tahun_keluar"
                },
                {
                    "data": "semester_keluar"
                },
                {
                    "data": "sk_yudisium"
                },
                {
                    "data": "tanggal_sk_yudisium"
                },
                {
                    "data": "ip_kumulatif"
                },
                {
                    "data": "nomor_seri_ijazah"
                },
                {
                    "data": "judul_tugas_akhir"
                },
                {
                    "data": "pembimbing_satu"
                },
                {
                    "data": "pembibing_dua"
                },
                {
                    "data": "pembimbing_tiga"
                },
                {
                    "data": "penguji_satu"
                },
                {
                    "data": "penguji_dua"
                },
                {
                    "data": "penguji_tiga"
                },
                {
                    "data": "nomor_sk_tugas"
                },
                {
                    "data": "tanggal_sk_tugas"
                },
                {
                    "data": "keterangan"
                },
                {
                    "data": null,
                    "defaultContent": "",
                    "sortable": false,
                    "responsivePriority": -1,
                    "render": function(data, type, row) {
                        return `
							<a href="#" class="btn btn-sm btn-clean btn-icon btn-edit" title="Edit details">
								<i class="la la-edit"></i>
							</a>
							<a href="#" class="btn btn-sm btn-clean btn-icon btn-delete" title="Delete">
								<i class="la la-trash"></i>
							</a>
						`;
                    }
                }
            ],
            "columnDefs": [{
                "targets": 4,
                "render": function(data, type, full, meta) {
                    console.log(data);
                    var status = {
                        1: {
                            'title': 'Lulus',
                            'class': ' label-light-success'
                        },
                        2: {
                            'title': 'Mutasi',
                            'class': ' label-light-danger'
                        },
                        3: {
                            'title': 'Dikeluarkan',
                            'class': ' label-light-primary'
                        },
                        4: {
                            'title': 'Mengundurkan diri',
                            'class': ' label-light-warning'
                        },
                        5: {
                            'title': 'Putus Sekolah',
                            'class': ' label-light-info'
                        },
                        6: {
                            'title': 'Wafat',
                            'class': ' label-light-danger'
                        },
                        7: {
                            'title': 'Hilang',
                            'class': ' label-light-primary'
                        },
                        8: {
                            'title': 'Alih Fungsi',
                            'class': ' label-light-warning'
                        },
                        9: {
                            'title': 'Pensiun',
                            'class': ' label-light-info'
                        },
                        Z: {
                            'title': 'Lainnya',
                            'class': ' label-light-success'
                        },
                    };
                    if (typeof status[data] === 'undefined') {
                        return data;
                    }
                    return '<span class="label font-weight-bold label-lg ' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                }
            },
            {
                "targets": [0,1,2,3,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23],
                // render if data is null or empty or undefined or false or 0 and then replace with Data Belum Diisi
                "render": function(data, type, row, meta) {
                    if (data == null || data == "" || data == undefined || data == false || data == 0) {
                        return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                    } else {
                        return data;
                    }
                }
            }
            ],
        });

        $('#kt_search').on('click', function(e) {
            e.preventDefault();
            table.table().draw();
        });

        $('#kt_reset').on('click', function(e) {
            e.preventDefault();
            $('.datatable-input').each(function() {
                $(this).val('');
                table.column($(this).data('col-index')).search('', false, false);
            });
            table.table().draw();
        });

        // Event handler untuk tombol edit
        $('#alumniTable').on('click', '.btn-edit', function(e) {
            e.preventDefault();
            // Tampilkan toast warning
            toastr.warning('Fitur ini belum tersedia!');
        });
        // Event handler untuk tombol edit
        $('#alumniTable').on('click', '.btn-delete', function(e) {
            e.preventDefault();
            // Tampilkan toast warning
            toastr.warning('Fitur ini belum tersedia!');
        });
    });
</script>