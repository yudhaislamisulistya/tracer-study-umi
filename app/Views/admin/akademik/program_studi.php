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
                    Daftar Program Studi
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
                            Akademik
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= route_to('admin_program_studi') ?>" class="text-muted">
                            Daftar Program Studi
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
                        Daftar Program Studi
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
                    </div>
                    <!--end::Dropdown-->
                </div>
            </div>
            <div class="card-body">
                <table id="alumniTable" class="table table-bordered table-checkable" style="width:100%">
                    <thead>
                        <tr>
                            <th>C_KODE_PRODI</th>
                            <th>NAMA_PRODI</th>
                            <th>NAMA_PRODI_ENGLISH</th>
                            <th>C_KODE_JENJANG_STUDI</th>
                            <th>NOMOR_SK</th>
                            <th>TGL_SK</th>
                            <th>TGL_AKHIR_SK</th>
                            <th>JML_SKS_LULUS_PRODI</th>
                            <th>TGL_PENDIRIAN_PRODI</th>
                            <th>TGL_SK_IJIN_OPR</th>
                            <th>NOMOR_SK_IJIN_OPR</th>
                            <th>C_KODE_FREKUENSI_PK</th>
                            <th>C_KODE_PELAKSANAAN_PK</th>
                            <th>VISI_PRODI</th>
                            <th>MISI_PRODI</th>
                            <th>TUJUAN_PRODI</th>
                            <th>ALAMAT_PRODI</th>
                            <th>TELEPHONE_PRODI</th>
                            <th>FAKSIMIL_PRODI</th>
                            <th>EMAIL_PRODI</th>
                            <th>C_KODE_STATUS_PRODI</th>
                            <th>THN_SEMESTER_HAPUS</th>
                            <th>F_AKTIF</th>
                            <th>F_IS_C</th>
                            <th>F_IS_U</th>
                            <th>F_IS_D</th>
                            <th>F_CHANGE_LOG</th>
                            <th>C_USER</th>
                            <th>C_DATE</th>
                            <th>U_USER</th>
                            <th>U_DATE</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get Data Program Studi -->
                        <?php
                        foreach (get_data_program_studi() as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value->C_KODE_PRODI . '</td>';
                            echo '<td>' . $value->NAMA_PRODI . '</td>';
                            echo '<td>' . $value->NAMA_PRODI_ENGLISH . '</td>';
                            echo '<td>' . $value->C_KODE_JENJANG_STUDI . '</td>';
                            echo '<td>' . $value->NOMOR_SK . '</td>';
                            echo '<td>' . $value->TGL_SK . '</td>';
                            echo '<td>' . $value->TGL_AKHIR_SK . '</td>';
                            echo '<td>' . $value->JML_SKS_LULUS_PRODI . '</td>';
                            echo '<td>' . $value->TGL_PENDIRIAN_PRODI . '</td>';
                            echo '<td>' . $value->TGL_SK_IJIN_OPR . '</td>';
                            echo '<td>' . $value->NOMOR_SK_IJIN_OPR . '</td>';
                            echo '<td>' . $value->C_KODE_FREKUENSI_PK . '</td>';
                            echo '<td>' . $value->C_KODE_PELAKSANAAN_PK . '</td>';
                            echo '<td>' . $value->VISI_PRODI . '</td>';
                            echo '<td>' . $value->MISI_PRODI . '</td>';
                            echo '<td>' . $value->TUJUAN_PRODI . '</td>';
                            echo '<td>' . $value->ALAMAT_PRODI . '</td>';
                            echo '<td>' . $value->TELEPHONE_PRODI . '</td>';
                            echo '<td>' . $value->FAKSIMIL_PRODI . '</td>';
                            echo '<td>' . $value->EMAIL_PRODI . '</td>';
                            echo '<td>' . $value->C_KODE_STATUS_PRODI . '</td>';
                            echo '<td>' . $value->THN_SEMESTER_HAPUS . '</td>';
                            echo '<td>' . $value->F_AKTIF . '</td>';
                            echo '<td>' . $value->F_IS_C . '</td>';
                            echo '<td>' . $value->F_IS_U . '</td>';
                            echo '<td>' . $value->F_IS_D . '</td>';
                            echo '<td>' . $value->F_CHANGE_LOG . '</td>';
                            echo '<td>' . $value->C_USER . '</td>';
                            echo '<td>' . $value->C_DATE . '</td>';
                            echo '<td>' . $value->U_USER . '</td>';
                            echo '<td>' . $value->U_DATE . '</td>';
                            echo '<td nowrap="nowrap">';
                            echo '<a href="#" class="btn btn-sm btn-clean btn-icon mr-2 btn-edit" title="Edit details">';
                            echo '<i class="fas fa-edit"></i>';
                            echo '</span>';
                            echo '</a>';
                            echo '<a href="#" class="btn btn-sm btn-clean btn-icon btn-delete" title="Delete">';
                            echo '<i class="fas fa-trash"></i>';
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