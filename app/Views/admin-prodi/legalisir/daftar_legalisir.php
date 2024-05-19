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

<!--  -->
<!--begin::Entry-->

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
        <?php if (session()->getFlashdata('status')) : ?>
            <div class="alert alert-<?= session()->getFlashdata('status') == 'berhasil' ? 'success' : 'danger' ?>">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
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
                            <span class="svg-icon svg-icon-md">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                    </g>
                                </svg>
                            </span>
                            Export
                        </button>
                        <!-- Button Pengaturan Legalisir -->
                        <button id="addModalPengaturanLegalisir" type="button" class="btn btn-light-info font-weight-bolder" data-toggle="modal" data-target="#legalisirModal" data-isi='<?= htmlspecialchars($data_legalisir->catatan ?? '') ?>'>
                            <span>
                                <i class="fas fa-cog"></i>
                                Pengaturan Legalisir
                            </span>
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
                            <th>No</th>
                            <th>Legalisir Path</th>
                            <th>NIM</th>
                            <th>Nama</th>
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
                        foreach (get_data_legalisir(session()->get('C_KODE_PRODI')) as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value->id . '</td>';
                            echo '<td>' . ($key + 1) . '</td>';
                            echo '<td>' . $value->legalisir_path . '</td>';
                            echo '<td>' . $value->nim . '</td>';
                            echo '<td>' . get_data_biodata($value->nim)->nama_lengkap . '</td>';
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
                            echo '<td>';
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

<!-- Modal -->
<div class="modal fade" id="legalisirModal" tabindex="-1" aria-labelledby="legalisirModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="legalisirModalLabel">Pengaturan Legalisir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="legalisirForm" action="<?= route_to('admin_prodi_legalisir_post') ?>" method="post">
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan" rows="3" value="<?= $data_legalisir->catatan ?? '' ?>"></textarea>
                        <small id="catatanHelp" class="form-text text-muted">Catatan ini akan muncul pada halaman legalisir yang ada pada bagian alumni.</small>
                    </div>
                    <div class="form-group">
                        <label for="extraOngkir">Harga Extra Ongkir</label>
                        <input type="number" class="form-control" id="extraOngkir" name="extraOngkir" value="<?= $data_legalisir->extra_ongkir ?? '' ?>">
                        <small id="extraOngkirHelp" class="form-text text-muted">Harga extra ongkir merupakan extra biaya pengiriman yang akan ditambahkan pada total biaya legalisir.</small>
                    </div>
                    <div class="form-group">
                        <label for="hargaLegalisirIjazah">Harga Legalisir Ijazah</label>
                        <input type="number" class="form-control" id="hargaLegalisirIjazah" name="hargaLegalisirIjazah" value="<?= $data_legalisir->biaya_legalisir_ijazah ?? '' ?>">
                        <small id="hargaLegalisirIjazahHelp" class="form-text text-muted">Harga legalisir ijazah merupakan biaya legalisir ijazah yang akan dikenakan pada alumni per satu dokumen legalisir ijazah.</small>
                    </div>
                    <div class="form-group">
                        <label for="hargaTranskripNilai">Harga Transkrip Nilai</label>
                        <input type="number" class="form-control" id="hargaTranskripNilai" name="hargaTranskripNilai" value="<?= $data_legalisir->biaya_transkrip_nilai ?? '' ?>">
                        <small id="hargaTranskripNilaiHelp" class="form-text text-muted">Harga transkrip nilai merupakan biaya legalisir transkrip nilai yang akan dikenakan pada alumni per satu dokumen legalisir transkrip nilai.</small>
                    </div>
                    <!-- whatsapp -->
                    <div class="form-group">
                        <label for="whatsapp">Whatsapp</label>
                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= $data_legalisir->whatsapp ?? '' ?>">
                        <small id="whatsappHelp" class="form-text text-muted">Whatsapp ini akan muncul pada halaman legalisir yang ada pada bagian alumni.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="legalisirForm">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Edit Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="statusForm" action="<?= route_to('admin_prodi_update_status_legalisir') ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="statusSelect">Status</label>
                        <select class="form-control" id="statusSelect" name="status">
                            <option value="Submitted">Submitted</option>
                            <option value="Processing">Processing</option>
                            <option value="Completed">Completed</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <small id="statusHelp" class="form-text text-muted">
                            <span class="badge badge-danger">Submitted </span> adalah status ketika legalisir baru saja diinputkan<br>
                            <span class="badge badge-primary">Processing </span> adalah status ketika legalisir sedang diproses<br>
                            <span class="badge badge-success">Completed </span> adalah status ketika legalisir telah selesai diproses<br>
                            <span class="badge badge-info">Shipped </span> adalah status ketika legalisir telah dikirim<br>
                            <span class="badge badge-secondary">Cancelled </span> adalah status ketika legalisir dibatalkan
                        </small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveStatusBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                <form id="deleteForm" action="<?= route_to('admin_prodi_delete_pengajuan') ?>" method="post">
                    <input type="hidden" name="id" id="deleteId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" form="deleteForm">Hapus</button>
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

        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });

        var table = $('#alumniTable').DataTable({
            "responsive": true,
            "order": [
                [1, "desc"]
            ],
            "columnDefs": [{
                    "targets": -1,
                    "orderable": false,
                    "responsivePriority": 1,
                },
                {
                    "targets": [0],
                    "visible": false,
                },
                {
                    "targets": [1, 4, 5, 6, 8, 9, 12, 14, 15],
                    "render": function(data, type, row) {
                        if (data == null || data == "" || data == undefined || data == false || data == 0 || data == "NULL") {
                            return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                        } else {
                            return data;
                        }
                    }
                },
                {
                    "targets": [2],
                    "visible": false,
                },
                {
                    "targets": [7],
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
                    "targets": [10, 11, 13],
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
                    "targets": [16],
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

        // Event handler for edit button
        $('#alumniTable').on('click', '.btn-edit', function(e) {
            e.preventDefault();
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var id = data[0]; // Assuming the ID column index is 0
            var currentStatus = data[15]; // Assuming the status column index is 15
            $('#statusSelect').val(currentStatus);
            $('#id').val(id);
            $('#statusModal').modal('show');
        });


        // Event handler for delete button
        $('#alumniTable').on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var id = data[0]; // Assuming the ID column index is 0
            $('#deleteId').val(id);
            $('#deleteModal').modal('show');
        });


        $('#saveStatusBtn').on('click', function() {
            $('#statusForm').submit();
        });

        $('#legalisirForm').on('submit', function(e) {
            tinymce.triggerSave();
            var content = tinymce.get('catatan').getContent();
            if (content.length === 0) {
                e.preventDefault();
            }
        });

        $('#addModalPengaturanLegalisir').on('click', function(e) {
            e.preventDefault();
            var isi = $(this).data('isi');
            tinymce.get('catatan').setContent(isi);
        });
    });
</script>