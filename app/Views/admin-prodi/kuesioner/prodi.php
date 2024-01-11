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
                        <a href="<?= route_to('admin_kuesioner_prodi') ?>" class="text-muted">
                            Prodi
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
        <?php
        if (Session()->getFlashData('success')) {
            echo '<div class="alert alert-custom alert-success fade show" role="alert">
                            <div class="alert-text">' . Session()->getFlashData('success') . '</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                </button>
                            </div>
                        </div>';
        } elseif (Session()->getFlashData('error')) {
            echo '<div class="alert alert-custom alert-danger fade show" role="alert">
                            <div class="alert-text">' . Session()->getFlashData('error') . '</div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                </button>
                            </div>
                        </div>';
        }
        ?>
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        Daftar Kuesioner
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

                    <!--begin::Button-->
                    <a id="btnNewRecord" href="#" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span> New Records
                    </a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <table id="alumniTable" class="table table-bordered table-checkable" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kuesioner</th>
                            <th>Nama Prodi</th>
                            <th>Periode Mulai</th>
                            <th>Periode Berakhir</th>
                            <th>Status</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get Data Kuesioner -->
                        <?php
                        $prodiIdSession = session()->get('ID_PRODI');
                        foreach (get_data_kuesioner_by_nama_prodi(get_data_nama_prodi_with_kode($prodiIdSession)->NAMA_PRODI) as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value->kuesioner_id . '</td>';
                            echo '<td>' . $value->nama_kuesioner . '</td>';
                            echo '<td>' . $value->nama_prodi . '</td>';
                            echo '<td>' . $value->periode_mulai . '</td>';
                            echo '<td>' . $value->periode_selesai . '</td>';
                            echo '<td>' . $value->status . '</td>';
                            echo '<td nowrap="nowrap">';
                            echo '<a href="#" class="btn btn-sm btn-clean btn-icon mr-2 btn-edit" title="Edit details">';
                            echo '<i class="fas fa-edit"></i>';
                            echo '</span>';
                            echo '</a>';
                            echo '<a href="#" class="btn btn-sm btn-clean btn-icon btn-delete mr-2" title="Delete">';
                            echo '<i class="fas fa-trash"></i>';
                            echo '</a>';
                            // add detail button here for add question and answer for each kuesioner
                            echo '<a href="' . route_to('admin_kuesioner_prodi_detail', $value->kuesioner_id) . '" class="btn btn-sm btn-clean btn-icon btn-detail " title="Detail">';
                            echo '<i class="fas fa-eye"></i>';
                            echo '</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->



</div>
<!--end::Entry-->
<!--end::Content-->

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataTitle">Tambah Data Kuesioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Data -->
                <form id="formTambahData" action="<?= route_to('admin_kuesioner_prodi_post') ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_kuesioner">Kuesioner</label>
                        <input type="text" class="form-control" id="nama_kuesioner" name="nama_kuesioner" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_prodi">Prodi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?= get_data_nama_prodi_with_kode($prodiIdSession)->NAMA_PRODI ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="periode_mulai">Periode Mulai</label>
                        <input type="date" class="form-control" id="periode_mulai" name="periode_mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="periode_selesai">Periode Selesai</label>
                        <input type="date" class="form-control" id="periode_selesai" name="periode_selesai" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="formTambahData">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="modalEditData" tabindex="-1" role="dialog" aria-labelledby="modalEditDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataTitle">Edit Data Kuesioner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditData" action="<?= route_to('admin_kuesioner_prodi_update') ?>" method="POST">
                    <input type="hidden" id="editId" name="editId">
                    <div class="form-group">
                        <label for="editNamaKuesioner">Kuesioner</label>
                        <input type="text" class="form-control" id="editNamaKuesioner" name="editNamaKuesioner" required>
                    </div>
                    <div class="form-group">
                        <label for="editNamaProdi">Prodi</label>
                        <input type="text" class="form-control" id="editNamaProdi" name="editNamaProdi" value="<?= get_data_nama_prodi_with_kode($prodiIdSession)->NAMA_PRODI ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editPeriodeMulai">Periode Mulai</label>
                        <input type="date" class="form-control" id="editPeriodeMulai" name="editPeriodeMulai" required>
                    </div>
                    <div class="form-group">
                        <label for="editPeriodeSelesai">Periode Selesai</label>
                        <input type="date" class="form-control" id="editPeriodeSelesai" name="editPeriodeSelesai" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="formEditData">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Data -->
<div class="modal fade" id="modalHapusData" tabindex="-1" role="dialog" aria-labelledby="modalHapusDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusDataTitle">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <form action="<?= route_to('admin_kuesioner_prodi_delete') ?>" method="POST">
                    <input type="hidden" id="hapusId" name="hapusId">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>

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
            "responsive": true,
            "columnDefs": [{
                "targets": -1,
                "orderable": false,
                "responsivePriority": 1,
            }],
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

        $('#btnNewRecord').click(function() {
            $('#formTambahData')[0].reset();
            $('#modalTambahData').modal('show');
        });


        $('#alumniTable').on('click', '.btn-edit', function(e) {
            e.preventDefault();

            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text();
            var namaKuesioner = row.find('td:eq(1)').text();
            var namaProdi = row.find('td:eq(2)').text();
            console.log(namaProdi);
            var periodeMulai = row.find('td:eq(3)').text();
            var periodeSelesai = row.find('td:eq(4)').text();

            $('#pilihanNamaProdi').text(namaProdi).val(namaProdi).prop('selected', true);
            $('#formEditData #editId').val(id);
            $('#formEditData #editNamaKuesioner').val(namaKuesioner);
            $('#formEditData #editPeriodeMulai').val(periodeMulai);
            $('#formEditData #editPeriodeSelesai').val(periodeSelesai);

            $('#modalEditData').modal('show');
        });

        $('#alumniTable').on('click', '.btn-delete', function(e) {
            e.preventDefault();

            var row = $(this).closest('tr');
            var id = row.find('td:eq(0)').text();

            $('#modalHapusData #hapusId').val(id);
            $('#modalHapusData').modal('show');

        });
    });
</script>