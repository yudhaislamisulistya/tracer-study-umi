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
                    Daftar Lowongan Kerja
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
                        <a href="<?= route_to('admin_lowongan_kerja') ?>" class="text-muted">
                            Daftar Lowongan Kerja
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
                        Daftar Lowongan Kerja
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
                        <!-- list kolom -->
                        <!-- "lowongan_id","job_hash","nama_perusahaan","judul_rekrutmen","jenis","deskripsi_pekerjaan","nama_formasi","jumlah_formasi","jenjang","domisili","pengalaman_kerja","keterampilan","syarat_kerja","status","kisaran_gaji_min","kisaran_gaji_max","manfaat","periode_mulai","periode_selesai","url_registration","created_at","updated_at" -->
                        <tr>
                            <th>ID</th>
                            <th>Job Hash</th>
                            <th>Nama Perusahaan</th>
                            <th>Judul Rekrutmen</th>
                            <th>Jenis</th>
                            <th>Deskripsi Pekerjaan</th>
                            <th>Nama Formasi</th>
                            <th>Jumlah Formasi</th>
                            <th>Jenjang</th>
                            <th>Domisili</th>
                            <th>Pengalaman Kerja</th>
                            <th>Keterampilan</th>
                            <th>Syarat Kerja</th>
                            <th>Status</th>
                            <th>Kisaran Gaji Min</th>
                            <th>Kisaran Gaji Max</th>
                            <th>Manfaat</th>
                            <th>Periode Mulai</th>
                            <th>Periode Selesai</th>
                            <th>URL Registration</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Get Data Program Studi -->
                        <?php
                        foreach (get_data_lowongan_kerja() as $key => $value) {
                            echo '<tr>';
                            echo '<td>' . $value->lowongan_id . '</td>';
                            echo '<td>' . $value->job_hash . '</td>';
                            echo '<td>' . $value->nama_perusahaan . '</td>';
                            echo '<td>' . $value->judul_rekrutmen . '</td>';
                            echo '<td>' . $value->jenis . '</td>';
                            echo '<td>' . $value->deskripsi_pekerjaan . '</td>';
                            echo '<td>' . $value->nama_formasi . '</td>';
                            echo '<td>' . $value->jumlah_formasi . '</td>';
                            echo '<td>' . $value->jenjang . '</td>';
                            echo '<td>' . $value->domisili . '</td>';
                            echo '<td>' . $value->pengalaman_kerja . '</td>';
                            echo '<td>' . $value->keterampilan . '</td>';
                            echo '<td>' . $value->syarat_kerja . '</td>';
                            echo '<td>' . $value->status . '</td>';
                            echo '<td>' . $value->kisaran_gaji_min . '</td>';
                            echo '<td>' . $value->kisaran_gaji_max . '</td>';
                            echo '<td>' . $value->manfaat . '</td>';
                            echo '<td>' . $value->periode_mulai . '</td>';
                            echo '<td>' . $value->periode_selesai . '</td>';
                            echo '<td>' . $value->url_registration . '</td>';
                            echo '<td nowrap="nowrap">';
                            // <!-- Deskripsi Pekerjaan, Keterampilan, Syarat Kerja, Manfaat, URL Registration -->
                            echo '<a href="#" class="btn btn-sm btn-clean btn-icon mr-2 btn-edit" title="Edit details" '
                                . 'data-deskripsi="' . htmlspecialchars($value->deskripsi_pekerjaan, ENT_QUOTES) . '" '
                                . 'data-keterampilan="' . htmlspecialchars($value->keterampilan, ENT_QUOTES) . '" '
                                . 'data-syarat="' . htmlspecialchars($value->syarat_kerja, ENT_QUOTES) . '" '
                                . 'data-manfaat="' . htmlspecialchars($value->manfaat, ENT_QUOTES) . '" '
                                . '>';
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
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDataTitle">Tambah Data Lowongan Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Data -->
                <form id="formTambahData" action="<?= route_to('admin_lowongan_kerja_post') ?>" method="POST">
                    <div class="row">
                        <!-- Nama Perusahaan dan Judul Rekrutmen -->
                        <div class="col-md-6 form-group">
                            <label for="namaPerusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaPerusahaan" name="nama_perusahaan" placeholder="PT. XYZ">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="judulRekrutmen">Judul Rekrutmen</label>
                            <input type="text" class="form-control" id="judulRekrutmen" name="judul_rekrutmen" placeholder="Rekrutmen 2021">
                        </div>

                        <!-- Jenis dan Nama Formasi -->
                        <div class="col-md-6 form-group">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Magang">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="namaFormasi">Nama Formasi</label>
                            <input type="text" class="form-control" id="namaFormasi" name="nama_formasi" placeholder="Web Developer">
                        </div>

                        <!-- Jumlah Formasi dan Jenjang -->
                        <div class="col-md-6 form-group">
                            <label for="jumlahFormasi">Jumlah Formasi</label>
                            <input type="number" class="form-control" id="jumlahFormasi" name="jumlah_formasi" placeholder="1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="jenjang">Jenjang</label>
                            <input type="text" class="form-control" id="jenjang" name="jenjang" placeholder="S1 Teknik Informatika">
                        </div>

                        <!-- Domisili dan Pengalaman Kerja -->
                        <div class="col-md-6 form-group">
                            <label for="domisili">Domisili</label>
                            <input type="text" class="form-control" id="domisili" name="domisili" placeholder="Jakarta">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="pengalamanKerja">Pengalaman Kerja</label>
                            <input type="text" class="form-control" id="pengalamanKerja" name="pengalaman_kerja" placeholder="1 Tahun">
                        </div>

                        <!-- Kisaran Gaji -->
                        <div class="col-md-6 form-group">
                            <label for="kisaranGajiMin">Kisaran Gaji Minimum</label>
                            <input type="number" class="form-control" id="kisaranGajiMin" name="kisaran_gaji_min" placeholder="Rp. 3.000.000">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="kisaranGajiMax">Kisaran Gaji Maksimum</label>
                            <input type="number" class="form-control" id="kisaranGajiMax" name="kisaran_gaji_max" placeholder="Rp. 5.000.000">
                        </div>

                        <!-- Periode Mulai dan Selesai -->
                        <div class="col-md-6 form-group">
                            <label for="periodeMulai">Periode Mulai</label>
                            <input type="date" class="form-control" id="periodeMulai" name="periode_mulai" placeholder="2021-01-01">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="periodeSelesai">Periode Selesai</label>
                            <input type="date" class="form-control" id="periodeSelesai" name="periode_selesai" placeholder="2021-01-01">
                        </div>
                    </div>

                    <!-- Deskripsi Pekerjaan, Keterampilan, Syarat Kerja, Manfaat, URL Registration -->
                    <!-- Field-field ini lebih panjang, jadi saya taruh di kolom tunggal -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Kontrak">
                    </div>
                    <div class="form-group">
                        <label for="deskripsiPekerjaan">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" id="deskripsiPekerjaan" name="deskripsi_pekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="keterampilan">Keterampilan</label>
                        <textarea class="form-control" id="keterampilan" name="keterampilan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="syaratKerja">Syarat Kerja</label>
                        <textarea class="form-control" id="syaratKerja" name="syarat_kerja"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="manfaat">Manfaat</label>
                        <textarea class="form-control" id="manfaat" name="manfaat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="urlRegistration">URL Registration</label>
                        <input type="text" class="form-control" id="urlRegistration" name="url_registration" placeholder="https://example.com">
                    </div>
                    <!-- Checkbox: Lewat Periode Perndaftaarn Tidak Tampil -->
                    <div class="form-group">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="periode_tidak_tampil" id="periode_tidak_tampil"/>
                                <span></span>
                                Lewat Periode Pendaftaran Tidak Tampil
                            </label>
                        </div>
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

<!-- Modal Update Data -->
<div class="modal fade" id="modalEditData" tabindex="-1" role="dialog" aria-labelledby="modalEditDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditDataTitle">Update Data Lowongan Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Data -->
                <form id="formEditData" action="<?= route_to('admin_lowongan_kerja_update') ?>" method="POST">
                    <input type="hidden" id="editId" name="editId">
                    <div class="row">
                        <!-- Nama Perusahaan dan Judul Rekrutmen -->
                        <div class="col-md-6 form-group">
                            <label for="editNamaPerusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="editNamaPerusahaan" name="editNamaPerusahaan" placeholder="PT. XYZ">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="editJudulRekrutmen">Judul Rekrutmen</label>
                            <input type="text" class="form-control" id="editJudulRekrutmen" name="editJudulRekrutmen" placeholder="Rekrutmen 2021">
                        </div>

                        <!-- Jenis dan Nama Formasi -->
                        <div class="col-md-6 form-group">
                            <label for="editJenis">Jenis</label>
                            <input type="text" class="form-control" id="editJenis" name="editJenis" placeholder="Magang">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="editNamaFormasi">Nama Formasi</label>
                            <input type="text" class="form-control" id="editNamaFormasi" name="editNamaFormasi" placeholder="Web Developer">
                        </div>

                        <!-- Jumlah Formasi dan Jenjang -->
                        <div class="col-md-6 form-group">
                            <label for="editJumlahFormasi">Jumlah Formasi</label>
                            <input type="number" class="form-control" id="editJumlahFormasi" name="editJumlahFormasi" placeholder="1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="editJenjang">Jenjang</label>
                            <input type="text" class="form-control" id="editJenjang" name="editJenjang" placeholder="S1 Teknik Informatika">
                        </div>

                        <!-- Domisili dan Pengalaman Kerja -->
                        <div class="col-md-6 form-group">
                            <label for="editDomisili">Domisili</label>
                            <input type="text" class="form-control" id="editDomisili" name="editDomisili" placeholder="Jakarta">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="editPengalamanKerja">Pengalaman Kerja</label>
                            <input type="text" class="form-control" id="editPengalamanKerja" name="editPengalamanKerja" placeholder="1 Tahun">
                        </div>

                        <!-- Kisaran Gaji -->
                        <div class="col-md-6 form-group">
                            <label for="editKisaranGajiMin">Kisaran Gaji Minimum</label>
                            <input type="number" class="form-control" id="editKisaranGajiMin" name="editKisaranGajiMin" placeholder="Rp. 3.000.000">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="editKisaranGajiMax">Kisaran Gaji Maksimum</label>
                            <input type="number" class="form-control" id="editKisaranGajiMax" name="editKisaranGajiMax" placeholder="Rp. 5.000.000">
                        </div>

                        <!-- Periode Mulai dan Selesai -->
                        <div class="col-md-6 form-group">
                            <label for="editPeriodeMulai">Periode Mulai</label>
                            <input type="date" class="form-control" id="editPeriodeMulai" name="editPeriodeMulai" placeholder="2021-01-01">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="editPeriodeSelesai">Periode Selesai</label>
                            <input type="date" class="form-control" id="editPeriodeSelesai" name="editPeriodeSelesai" placeholder="2021-01-01">
                        </div>


                    </div>

                    <!-- Deskripsi Pekerjaan, Keterampilan, Syarat Kerja, Manfaat, URL Registration -->
                    <!-- Field-field ini lebih panjang, jadi saya taruh di kolom tunggal -->
                    <div class="form-group">
                        <label for="editStatus">Status</label>
                        <input type="text" class="form-control" id="editStatus" name="editStatus" placeholder="Kontrak">
                    </div>
                    <div class="form-group">
                        <label for="editDeskripsiPekerjaan">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" id="editDeskripsiPekerjaan" name="editDeskripsiPekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editKeterampilan">Keterampilan</label>
                        <textarea class="form-control" id="editKeterampilan" name="editKeterampilan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editSyaratKerja">Syarat Kerja</label>
                        <textarea class="form-control" id="editSyaratKerja" name="editSyaratKerja"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editManfaat">Manfaat</label>
                        <textarea class="form-control" id="editManfaat" name="editManfaat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editUrlRegistration">URL Registration</label>
                        <input type="text" class="form-control" id="editUrlRegistration" name="editUrlRegistration" placeholder="https://example.com">
                    </div>
                    <!-- Checkbox: Lewat Periode Perndaftaarn Tidak Tampil -->
                    <div class="form-group">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="editPeriodeTidakTampil" id="editPeriodeTidakTampil"/>
                                <span></span>
                                Lewat Periode Pendaftaran Tidak Tampil
                            </label>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="formEditData">Simpan Perubahaan</button>
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
                <form action="<?= route_to('admin_lowongan_kerja_delete') ?>" method="POST">
                    <input type="hidden" id="hapusId" name="hapusId">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/ig8di9cz1xxzwf89x6bwrjtfy1q368sa2l4m3dl9j0356w0c/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

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
            selector: '#deskripsiPekerjaan, #keterampilan, #syaratKerja, #manfaat, #editDeskripsiPekerjaan, #editKeterampilan, #editSyaratKerja, #editManfaat',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });

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
            var nama_perusahaan = row.find('td:eq(2)').text();
            var judul_rekrutmen = row.find('td:eq(3)').text();
            var jenis = row.find('td:eq(4)').text();

            var nama_formasi = row.find('td:eq(6)').text();
            var jumlah_formasi = row.find('td:eq(7)').text();
            var jenjang = row.find('td:eq(8)').text();
            var domisili = row.find('td:eq(9)').text();
            var pengalaman_kerja = row.find('td:eq(10)').text();


            var status = row.find('td:eq(13)').text();
            var kisaran_gaji_min = row.find('td:eq(14)').text();
            var kisaran_gaji_max = row.find('td:eq(15)').text();

            var periode_mulai = row.find('td:eq(17)').text();
            var periode_selesai = row.find('td:eq(18)').text();
            var url_registration = row.find('td:eq(19)').text();

            var deskripsiPekerjaan = $(this).data('deskripsi');
            var keterampilan = $(this).data('keterampilan');
            var syaratKerja = $(this).data('syarat');
            var manfaat = $(this).data('manfaat');

            $('#formEditData #editId').val(id);

            tinymce.get('editDeskripsiPekerjaan').setContent(deskripsiPekerjaan);
            tinymce.get('editKeterampilan').setContent(keterampilan);
            tinymce.get('editSyaratKerja').setContent(syaratKerja);
            tinymce.get('editManfaat').setContent(manfaat);

            $('#formEditData #editNamaPerusahaan').val(nama_perusahaan);
            $('#formEditData #editJudulRekrutmen').val(judul_rekrutmen);
            $('#formEditData #editJenis').val(jenis);
            $('#formEditData #editNamaFormasi').val(nama_formasi);
            $('#formEditData #editJumlahFormasi').val(jumlah_formasi);
            $('#formEditData #editJenjang').val(jenjang);
            $('#formEditData #editDomisili').val(domisili);
            $('#formEditData #editPengalamanKerja').val(pengalaman_kerja);
            $('#formEditData #editKisaranGajiMin').val(kisaran_gaji_min);
            $('#formEditData #editKisaranGajiMax').val(kisaran_gaji_max);
            $('#formEditData #editPeriodeMulai').val(periode_mulai);
            $('#formEditData #editPeriodeSelesai').val(periode_selesai);
            $('#formEditData #editUrlRegistration').val(url_registration);
            $('#formEditData #editStatus').val(status);


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