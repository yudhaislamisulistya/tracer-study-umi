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
                    Daftar Jenis Keluar
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
                            Manajemen Data
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= route_to('admin_jenis_keluar') ?>" class="text-muted">
                            Jenis Keluar
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
            
            <div class="card-body">
                <table id="alumniTable" class="table table-bordered table-checkable" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Jenis Keluar</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get Data Jenis Keluar -->
                        <?php
                        foreach (get_data_jenis_keluar() as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value->id_jns_keluar . '</td>';
                            echo '<td>' . $value->ket_keluar . '</td>';
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataTitle">Tambah Data Jenis Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Data -->
                <form id="formTambahData" action="<?= route_to('admin_jenis_keluar_alumni_post') ?>" method="POST">
                    <div class="form-group">
                        <label for="jenis_keluar">Jenis Keluar</label>
                        <input type="text" class="form-control" id="jenis_keluar" name="jenis_keluar" required>
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
                <h5 class="modal-title" id="modalEditDataTitle">Edit Data Jenis Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Data -->
                <form id="formEditData" action="<?= route_to('admin_jenis_keluar_alumni_update') ?>" method="POST">
                    <input type="hidden" id="editId" name="editId">
                    <div class="form-group">
                        <label for="editJenisKeluar">Jenis Keluar</label>
                        <input type="text" class="form-control" id="editJenisKeluar" name="editJenisKeluar" required>
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
                <form action="<?= route_to('admin_jenis_keluar_alumni_delete') ?>" method="POST">
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
            var jenisKeluar = row.find('td:eq(1)').text();

            $('#formEditData #editId').val(id);
            $('#formEditData #editJenisKeluar').val(jenisKeluar);

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