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
                    Daftar Legalisir Dokumen
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
                            Daftar Legalisir Dokumen
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
                        Daftar Legalisir Dokumen
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
                </div>
            </div>
            <div class="card-body">
                <table id="alumniTable" class="table table-bordered table-checkable" style="width:100%">
                    <thead>
                        <tr>
                            <!-- "id","legalisir_path","nim","jenis_berkas","berkas_path","ttd_berkas_path","bahasa","jumlah","kode_pos","alamat_pengiriman","biaya_legalisasi","tarif_pengiriman","total_biaya","catatan","status","created_at","updated_at" -->
                            <th>ID</th>
                            <th>Legalisir Path</th>
                            <th>NIM</th>
                            <th>Jenis Berkas</th>
                            <th>Berkas Path</th>
                            <th>TTD Berkas Path</th>
                            <th>Bahasa</th>
                            <th>Jumlah</th>
                            <th>Kode Pos</th>
                            <th>Alamat Pengiriman</th>
                            <th>Biaya Legalisasi</th>
                            <th>Tarif Pengiriman</th>
                            <th>Total Biaya</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get Data Program Studi -->
                        <?php
                        foreach (get_data_legalisir() as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value->id . '</td>';
                            echo '<td>' . $value->legalisir_path . '</td>';
                            echo '<td>' . $value->nim . '</td>';
                            echo '<td>' . $value->jenis_berkas . '</td>';
                            echo '<td>';
                            echo '<a href="' . base_url('assets/berkas/legalisir/' . $value->berkas_path) . '" target="_blank" class="btn btn-sm btn-clean btn-icon mr-2"> <i class="fas fa-eye"></i> </a>';
                            echo '</td>';
                            echo '<td>' . $value->ttd_berkas_path . '</td>';
                            echo '<td>' . $value->bahasa . '</td>';
                            echo '<td>' . $value->jumlah . '</td>';
                            echo '<td>' . $value->kode_pos . '</td>';
                            echo '<td>' . $value->alamat_pengiriman . '</td>';
                            echo '<td>' . format_rupiah($value->biaya_legalisasi) . '</td>';
                            echo '<td>' . format_rupiah($value->tarif_pengiriman) . '</td>';
                            echo '<td>' . format_rupiah($value->total_biaya) . '</td>';
                            echo '<td>' . $value->catatan . '</td>';
                            echo '<td>' . $value->status . '</td>';
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

        var table = $('#alumniTable').DataTable({
            "responsive": true,
            "columnDefs": [{
                    "targets": -1,
                    "orderable": false,
                    "responsivePriority": 1,
                },
                {
                    "targets": [0, 2, 3, 4, 6, 7, 10, 12, 13],
                    "render": function(data, type, row) {
                        if (data == null || data == "" || data == undefined || data == false || data == 0 || data == "NULL") {
                            return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                        } else {
                            return data;
                        }
                    }
                },
                {
                    "targets": [1],
                    "visible": false,
                },
                {
                    "targets": [5],
                    // Tanda Tangan Elektronik, Berkas Diambil di Fakultas, Berkas Dikirim
                    "render": function(data, type, row) {
                        console.log(row);
                        if (data == "Tanda Tangan Elektronik") {
                            return "<span class='badge badge-info'>" + data + "</span>";
                        } else if (data == "Berkas Diambil di Fakultas") {
                            return "<span class='badge badge-primary'>" + data + "</span>";
                        } else if (data == "Berkas Dikirim") {
                            return "<span class='badge badge-success'>" + data + "</span>";
                        } else {
                            return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                        }
                    }
                },
                {
                    "targets": [8,9,11],
                    // IF TTD Berkas Path == Tanda Tangan Elektronik, then for value - at target 8,9,11
                    "render": function(data, type, row) {
                        if (row[5] == "Tanda Tangan Elektronik" || row[5] == "Berkas Diambil di Fakultas") {
                            return "<span class='badge badge-danger'>-</span>";
                        } else if (data == null || data == "" || data == undefined || data == false || data == 0 || data == "NULL") {
                            return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                        } else {
                            return data;
                        }
                    }
                },
                {
                    "targets": [14],
                    // 'Submitted','Processing','Completed','Shipped','Cancelled'
                    "render": function(data, type, row) {
                        if (data == "Submitted") {
                            return "<span class='badge badge-info'>" + data + "</span>";
                        } else if (data == "Processing") {
                            return "<span class='badge badge-primary'>" + data + "</span>";
                        } else if (data == "Completed") {
                            return "<span class='badge badge-success'>" + data + "</span>";
                        } else if (data == "Shipped") {
                            return "<span class='badge badge-info'>" + data + "</span>";
                        } else if (data == "Cancelled") {
                            return "<span class='badge badge-secondary'>" + data + "</span>";
                        } else {
                            return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                        }
                    }
                }
            ],

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