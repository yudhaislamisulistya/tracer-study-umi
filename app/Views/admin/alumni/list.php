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
                                    <a href="#" class="navi-link" id="printButton">
                                        <span class="navi-icon"><i class="la la-print"></i></span>
                                        <span class="navi-text">Print</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="copyButton">
                                        <span class="navi-icon"><i class="la la-copy"></i></span>
                                        <span class="navi-text">Copy</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="excelButton">
                                        <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                        <span class="navi-text">Excel</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="csvButton">
                                        <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                        <span class="navi-text">CSV</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" id="pdfButton">
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
                                <option value="Lulus">Lulus</option>
                                <option value="Keluar">Keluar</option>
                            </select>
                        </div>

                    </div>
                    <div class="row mb-6">
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
                            <th>Nama</th>
                            <th>Jenjang Pendidikan</th>
                            <th>Nama Prodi</th>
                            <th>Nama Fakultas</th>
                            <th>Tahun Masuk</th>
                            <th>Keterangan Status</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Email</th>
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
        var title = document.getElementsByClassName('card-label')[0].innerText
        var table = $('#alumniTable').DataTable({
            "buttons": [{
                    extend: 'copy',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    },
                    filename: function() {
                        return title + ' ' + moment().format("DD MMMM YYYY HH:mm:ss");
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    },
                    filename: function() {
                        return title + ' ' + moment().format("DD MMMM YYYY HH:mm:ss");
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    },
                    filename: function() {
                        return title + ' ' + moment().format("DD MMMM YYYY HH:mm:ss");
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    },
                    filename: function() {
                        return title + ' ' + moment().format("DD MMMM YYYY HH:mm:ss");
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    },
                    filename: function() {
                        return title + ' ' + moment().format("DD MMMM YYYY HH:mm:ss");
                    }
                }
            ],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": "/api-v2/alumniv2",
                "data": function(d) {
                    d.page = (d.start / d.length) + 1;
                    d.perpage = d.length;
                    d.nameSearch = $('#nameSearch').val();
                    d.nimSearch = $('#nimSearch').val();
                    d.programStudiSearch = $('#programStudiSearch').val();
                    d.jenisKeluarSearch = $('#jenisKeluarSearch').val();
                    d.tahunMasukSearch = $('#tahunMasukSearch').val();
                },
            },
            "searching": false,
            "columns": [
                //                 <th>Record ID</th>
                // <th>NIM</th>
                // <th>Nama</th>
                // <th>Jenjang Pendidikan</th>
                // <th>Nama Prodi</th>
                // <th>Nama Fakultas</th>
                // <th>Tahun Masuk</th>
                // <th>Keterangan Status</th>
                // <th>Jenis Kelamin</th>
                // <th>Tempat Lahir</th>
                // <th>Tanggal Lahir</th>
                // <th>Telepon</th>
                // <th>Alamat</th>
                // <th>Email</th>
                {
                    "data": "id_profil"
                },
                {
                    "data": "stambuk"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "nm_jenjang_prodi"
                },
                {
                    "data": "nm_prodi"
                },
                {
                    "data": "nm_fakultas"
                },
                {
                    "data": "thn_masuk"
                },
                {
                    "data": "ket_sts",
                    'render': function(data, type, row) {
                        if (data == "Lulus") {
                            return '<span class="badge badge-success">Lulus</span>';
                        } else if (data == "Keluar") {
                            return '<span class="badge badge-danger">Keluar</span>';
                        } else {
                            return '<span class="badge badge-warning">Belum Lulus</span>';
                        }
                    }
                },
                {
                    "data": "jns_kelamin"
                },
                {
                    "data": "tempat_lahir"
                },
                {
                    "data": "tgl_lahir"
                },
                {
                    "data": "telp",
                    'render': function(data, type, row) {
                        if (data == null || data == "" || data == undefined || data == false || data == 0) {
                            return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                        } else {
                            return '<a href="tel:' + data + '">' + data + '</a>';
                        }
                    }
                },
                {
                    "data": "alamat"
                },
                {
                    "data": "email"
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
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
                // render if data is null or empty or undefined or false or 0 and then replace with Data Belum Diisi
                "render": function(data, type, row, meta) {
                    if (data == null || data == "" || data == undefined || data == false || data == 0) {
                        return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                    } else {
                        return data;
                    }
                }
            }],
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

        $('#printButton').on('click', function() {
            $('#alumniTable').DataTable().button('4').trigger();
        });

        $('#copyButton').on('click', function() {
            $('#alumniTable').DataTable().button('0').trigger();
        });

        $('#csvButton').on('click', function() {
            $('#alumniTable').DataTable().button('1').trigger();
        });

        $('#excelButton').on('click', function() {
            $('#alumniTable').DataTable().button('2').trigger();
        });

        $('#pdfButton').on('click', function() {
            $('#alumniTable').DataTable().button('3').trigger();
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