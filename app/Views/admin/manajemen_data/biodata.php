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
                    Daftar Biodata
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
                            Manajemen Biodata
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= route_to('admin_alumni') ?>" class="text-muted">
                            Daftar Biodata
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
                        Daftar Biodata
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
                        <!--end::Dropdown-->
                    </div>
                    <!--end::Dropdown-->

                    <!--begin::Button-->
                    <!--begin::Button-->
                    <a id="btnNewRecord" href="#" class="btn btn-primary font-weight-bolder">
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
                    <!--end::Button-->
                    <!-- Download Format -->
                    <a href="<?= base_url('assets/format/FORMAT EXCEL BIODATA 2024.xlsx') ?>" class="btn btn-success font-weight-bolder ml-2">
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
                        <!-- Tahun Lulus -->
                        <div class="col-md-3 mb-lg-0 mb-6">
                            <label>Tahun Lulus:</label>
                            <select class="form-control datatable-input" id="tahunKeluarSearch" data-col-index="3">
                                <option value="">Pilih Tahun Lulus</option>
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
                        <!-- "nama_lengkap","jenis_kelamin","tempat_lahir","tanggal_lahir","nim","program_studi","tahun_masuk","tahun_keluar","alamat","negara","provinsi","kabupaten","jenis_pekerjaan","nama_perusahaan","tanggal_masuk_kerja","status_pekerjaan","email","nomor_handphone","created_at","updated_at" -->
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Lulus</th>
                            <th>Alamat</th>
                            <th>Negara</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Tanggal Masuk Kerja</th>
                            <th>Status Pekerjaan</th>
                            <th>Email</th>
                            <th>Nomor Handphone</th>
                            <th>Action</th>
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataTitle">Import File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahData" action="<?= route_to('admin_import_biodata') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="jenis_keluar">File</label>
                        <input type="file" class="form-control" id="file" name="file" placeholder="File" required>
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
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataTitle">Update Data Biodata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditData" action="<?= route_to('admin_biodata_update') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Nama Lengkap *</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="editNamaLengkap" placeholder="Nama Lengkap" id="editNamaLengkap" required />
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Jenis Kelamin *</label>
                        <div class="col-md-10">
                            <select name="editJenisKelamin" id="editJenisKelamin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tempat Lahir -->
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Tempat Lahir *</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="editTempatLahir" placeholder="Tempat Lahir" id="editTempatLahir" required />
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Tanggal Lahir *</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="editTanggalLahir" id="editTanggalLahir" required />
                        </div>
                    </div>

                    <!-- NIM -->
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">NIM *</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="editNim" placeholder="NIM" id="editNim" required />
                        </div>
                    </div>

                    <!-- Program Studi -->
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Program Studi *</label>
                        <div class="col-md-10">
                            <select name="editProgramStudi" id="editProgramStudi" class="form-control" required>
                                <option value="programStudiTerpilih" id="programStudiTerpilih">Pilih Program Studi</option>
                                <option value="" disabled>====================</option>
                                <?php
                                foreach (get_data_program_studi() as $key => $value) {
                                    echo '<option value="' . $value->C_KODE_PRODI . '">' . $value->NAMA_PRODI . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Tahun Masuk Kuliah *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="editTahunMasuk" placeholder="Tahun Masuk" id="editTahunMasuk" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-angle-down"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2">Tahun Lulus Kuliah *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="editTahunKeluar" placeholder="Tahun Lulus" id="editTahunKeluar" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-angle-up"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Alamat *</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                <input type="text" class="form-control" name="editAlamat" placeholder="Alamat Lengkap" id="editAlamat" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-institution"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-1">Negara *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="editNegara" id="editNegara" class="form-control">
                                    <option id="negaraTerpilih" value="">Pilih Negara</option>
                                    <option value="" disabled>====================</option>
                                    <?php

                                    // if ($data->negara === "") {
                                    //     echo '<option value="">Pilih Negara</option>';
                                    // } else {
                                    //     echo '<option value="' . $data->negara . '">' . get_data_country_by_id($data->negara)->name . '</option>';
                                    // }

                                    ?>
                                    <?php
                                    foreach (get_data_country() as $key => $value) {
                                        echo '<option value="' . $value->id . '">' . $value->name . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-lightbulb-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Provinsi *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="editProvinsi" id="editProvinsi" class="form-control">
                                    <option id="provinsiTerpilih" value="">Pilih Provinsi</option>
                                    <option value="" disabled>====================</option>
                                    <?php
                                    foreach (get_data_provinces() as $key => $value) {
                                        echo '<option value="' . $value->id . '">' . $value->name . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-meanpath"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Kabupaten *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="editKabupaten" id="editKabupaten" class="form-control">
                                    <option id="kabupatenTerpilih" value="">Pilih Kabupaten</option>
                                    <option value="" disabled>====================</option>
                                    <?php
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-mouse-pointer"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-md-1">Pekerjaan *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="editJenisPekerjaan" id="editJenisPekerjaan" class="form-control">
                                    <option id="jenisPekerjaanTerpilih" value="">Pilih Jenis Pekerjaan</option>
                                    <option value="" disabled>====================</option>
                                    <?php
                                    // if ($data->jenis_pekerjaan === "") {
                                    //     echo '<option value="">Pilih Jenis Pekerjaan</option>';
                                    // } else {
                                    //     echo '<option value="' . $data->jenis_pekerjaan . '">' . get_data_pekerjaan_by_id($data->jenis_pekerjaan)->nm_pekerjaan . '</option>';
                                    // }
                                    ?>
                                    <?php
                                    foreach (get_data_pekerjaan() as $key => $value) {
                                        echo '<option value="' . $value->id_pekerjaan . '">' . $value->nm_pekerjaan . '</option>';
                                    }
                                    ?>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-pied-piper-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Nama Kantor*</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="editNamaPerusahaan" placeholder="Nama Kantor atau Perusahaan" id="editNamaPerusahaan" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-server"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-1">Tanggal Masuk Kerja *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="date" class="form-control" name="editTanggalMasukKerja" placeholder="Tanggal Masuk Kerja" id="editTanggalMasukKerja" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-minus-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <label class="col-form-label col-md-1">Status Pekerjaan *</label>
                        <div class="col-md-3">
                            <div class="input-group">
                                <select name="editStatusPekerjaan" id="editStatusPekerjaan" class="form-control">
                                    <option id="statusPekerjaanTerpilih" value="">Pilih Status Pekerjaan</option>
                                    <option value="" disabled>====================</option>
                                    <?php

                                    // if ($data->status_pekerjaan === "0" || $data->status_pekerjaan === "") {
                                    //     echo '<option value="">Pilih Status Pekerjaan</option>';
                                    // } else {
                                    //     echo '<option value="' . $data->status_pekerjaan . '">' . get_data_status_pekerjaan_by_id($data->status_pekerjaan)->status_job . '</option>';
                                    // }
                                    ?>
                                    <?php
                                    foreach (get_data_status_pekerjaan() as $key => $value) {
                                        echo '<option value="' . $value->id_job . '">' . $value->status_job . '</option>';
                                    }
                                    ?>

                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-asterisk"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Email *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="editEmail" placeholder="Email" id="editEmail" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-google"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label col-md-2">Nohp/Whatsapp *</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" name="editNomorHandphone" placeholder="Whatsapp" id="editNomorHandphone" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-mobile-phone"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
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
                <form action="<?= route_to('admin_biodata_delete') ?>" method="POST">
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
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": "/api-v2/biodata",
                "data": function(d) {
                    d.page = (d.start / d.length) + 1;
                    d.perpage = d.length;
                    d.nameSearch = $('#nameSearch').val();
                    d.nimSearch = $('#nimSearch').val();
                    d.programStudiSearch = $('#programStudiSearch').val();
                    d.tahunMasukSearch = $('#tahunMasukSearch').val();
                    d.tahunKeluarSearch = $('#tahunKeluarSearch').val();
                },
            },
            "searching": false,
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
            "columns": [{
                    "data": "nama_lengkap"
                },
                {
                    "data": "jenis_kelamin"
                },
                {
                    "data": "tempat_lahir"
                },
                {
                    "data": "tanggal_lahir"
                },
                {
                    "data": "nim"
                },
                {
                    "data": "NAMA_PRODI"
                },
                {
                    "data": "tahun_masuk"
                },
                {
                    "data": "tahun_keluar"
                },
                {
                    "data": "alamat"
                },
                {
                    "data": "NAMA_NEGARA"
                },
                {
                    "data": "NAMA_PROVINSI"
                },
                {
                    "data": "NAMA_KABUPATEN"
                },
                {
                    "data": "NAMA_PEKERJAAN"
                },
                {
                    "data": "nama_perusahaan"
                },
                {
                    "data": "tanggal_masuk_kerja"
                },
                {
                    "data": "NAMA_STATUS_PEKERJAAN"
                },
                {
                    "data": "email"
                },
                {
                    "data": "nomor_handphone"
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
                    "targets": [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
                    // render if data is null or empty or undefined or false or 0 and then replace with Data Belum Diisi
                    "render": function(data, type, row) {
                        if (data == null || data == "" || data == undefined || data == false || data == 0 || data == "NULL") {
                            return "<span class='badge badge-danger'>Data Belum Diisi</span>";
                        } else {
                            return data;
                        }
                    }
                },
                {
                    "targets": 1,
                    "render": function(data, type, row) {
                        if (data == "L") {
                            return "<span class='badge badge-info'>Laki-laki</span>";
                        } else if (data == "P") {
                            return "<span class='badge badge-success'>Perempuan</span>";
                        } else if (data == null || data == "" || data == undefined || data == false || data == 0 || data == "NULL") {
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
            var nama_lengkap = row.find('td:eq(0)').text();
            var jenis_kelamin = row.find('td:eq(1)').text();
            var tempat_lahir = row.find('td:eq(2)').text();
            var tanggal_lahir = row.find('td:eq(3)').text();
            var nim = row.find('td:eq(4)').text();
            var program_studi = row.find('td:eq(5)').text();
            var tahun_masuk = row.find('td:eq(6)').text();
            var tahun_keluar = row.find('td:eq(7)').text();
            var alamat = row.find('td:eq(8)').text();
            var negara = row.find('td:eq(9)').text();
            var provinsi = row.find('td:eq(10)').text();
            var kabupaten = row.find('td:eq(11)').text();
            var jenis_pekerjaan = row.find('td:eq(12)').text();
            var nama_perusahaan = row.find('td:eq(13)').text();
            var tanggal_masuk_kerja = row.find('td:eq(14)').text();
            var status_pekerjaan = row.find('td:eq(15)').text();
            var email = row.find('td:eq(16)').text();
            var nomor_handphone = row.find('td:eq(17)').text();
            console.log(provinsi);

            $('#negaraTerpilih').text(negara).val(negara).prop('selected', true);
            $('#provinsiTerpilih').text(provinsi).val(provinsi).prop('selected', true);
            $('#kabupatenTerpilih').text(kabupaten).val(kabupaten).prop('selected', true);
            $('#programStudiTerpilih').text(program_studi).val(program_studi).prop('selected', true);
            $('#jenisPekerjaanTerpilih').text(jenis_pekerjaan).val(jenis_pekerjaan).prop('selected', true);
            $('#statusPekerjaanTerpilih').text(status_pekerjaan).val(status_pekerjaan).prop('selected', true);


            $('#formEditData #editId').val(nim);
            $('#formEditData #editNamaLengkap').val(nama_lengkap);
            $('#formEditData #editJenisKelamin').val(jenis_kelamin);
            $('#formEditData #editTempatLahir').val(tempat_lahir);
            $('#formEditData #editTanggalLahir').val(tanggal_lahir);
            $('#formEditData #editNim').val(nim);
            $('#formEditData #editProgramStudi').val(program_studi);
            $('#formEditData #editTahunMasuk').val(tahun_masuk);
            $('#formEditData #editTahunKeluar').val(tahun_keluar);
            $('#formEditData #editAlamat').val(alamat);
            $('#formEditData #editNegara').val(negara);
            $('#formEditData #editProvinsi').val(provinsi);
            $('#formEditData #editKabupaten').val(kabupaten);
            $('#formEditData #editJenisPekerjaan').val(jenis_pekerjaan);
            $('#formEditData #editNamaPerusahaan').val(nama_perusahaan);
            $('#formEditData #editTanggalMasukKerja').val(tanggal_masuk_kerja);
            $('#formEditData #editStatusPekerjaan').val(status_pekerjaan);
            $('#formEditData #editEmail').val(email);
            $('#formEditData #editNomorHandphone').val(nomor_handphone);

            $('#modalEditData').modal('show');
        });

        // Event handler untuk tombol edit
        $('#alumniTable').on('click', '.btn-delete', function(e) {
            e.preventDefault();

            var row = $(this).closest('tr');
            var id = row.find('td:eq(4)').text();

            $('#modalHapusData #hapusId').val(id);
            $('#modalHapusData').modal('show');
        });
    });
</script>
<script>
    var HOST_URL = "https://alumni.umi.ac.id/"
</script>
<script>
    $('#editProvinsi').on('change', function() {
        $('#editKabupaten').html('');
        console.log("Selamat Datang");
        var code = $('#editProvinsi').val();
        console.log('Ini Adalah Code : ' + code);
        $.ajax({
            type: "GET",
            url: HOST_URL + "/get_regencies/" + code,
            dataType: "json",
            success: function(response) {
                $.each(response.data, function(i, v) {
                    $('#editKabupaten').append('<option value="' + v.id + '">' + v.name + '</option>');
                });
            }
        });
    });
</script>