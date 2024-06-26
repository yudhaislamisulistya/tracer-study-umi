<?=

view('layouts/header');

?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Load jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- jQuery UI CSS -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<style>
    .ml-auto {
        position: relative;
    }

    #jenisPertanyaanDropdown {
        position: absolute;
        left: 0;
        top: 100%;
        /* Posisi dropdown tepat di bawah tombol */
    }


    .pertanyaan-item>div {
        flex: 1;
        margin-right: 10px;
    }

    .checkbox-group,
    .radio-group,
    .form-control {
        margin-top: 5px;
    }

    .handle {
        cursor: move;
        margin-right: 10px;
        display: inline-block;
    }

    .ui-state-highlight {
        height: 50px;
        background-color: #fafafa;
        border: 1px dashed #ccc;
        margin-bottom: 5px;
        width: 100%;
        padding: 30px !important;
    }
</style>


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
                        <a href="<?= route_to('admin_prodi_dashboard') ?>" class="text-muted">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= route_to('admin_prodi_kuesioner_prodi') ?>" class="text-muted">
                            Kuesioner
                        </a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted">
                            Detail Kuesioner
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
                    <h3 class="card-label">Daftar Kuesioner - <?= $data["kuesioner"]->nama_kuesioner ?></h3>
                </div>
                <div class="ml-auto">
                    <button id="btnTambah" class="btn btn-primary mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tambah</button>
                    <div id="jenisPertanyaanDropdown" class="dropdown-menu" aria-labelledby="btnTambah">
                        <a class="dropdown-item" href="#" data-jenis="checkbox">Checkbox</a>
                        <a class="dropdown-item" href="#" data-jenis="radio">Radio</a>
                        <a class="dropdown-item" href="#" data-jenis="option">Option</a>
                        <a class="dropdown-item" href="#" data-jenis="text">Text</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <span id="kuesionerId" style="display: none;"><?= $data["kuesioner"]->kuesioner_id ?></span>
                <?php if (!empty($data['pertanyaan'])) : ?>
                    <div id="daftarPertanyaan" class="sortableList">
                        <?php foreach ($data['pertanyaan'] as $pertanyaan) : ?>
                            <div class="pertanyaan-item mb-3">
                                <div class="row">
                                    <div class="col-md-5" style="align-self: center;">
                                        <h5><?= esc($pertanyaan->teks_pertanyaan) ?></h5>
                                    </div>
                                    <div class="col-md-6" style="align-self: center;">
                                        <?php if ($pertanyaan->tipe_pertanyaan != 'text' && !empty($pertanyaan->pilihan_jawaban)) : ?>
                                            <?php if ($pertanyaan->tipe_pertanyaan == 'checkbox') : ?>
                                                <div class="checkbox-group">
                                                    <?php foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                        <label class="checkbox-label">
                                                            <input type="checkbox" disabled> <?= esc($pilihan->teks_pilihan) ?>
                                                        </label>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php elseif ($pertanyaan->tipe_pertanyaan == 'radio') : ?>
                                                <div class="radio-group">
                                                    <?php foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                        <label class="radio-label">
                                                            <input type="radio" name="radio_<?= $pertanyaan->pertanyaan_id ?>" disabled> <?= esc($pilihan->teks_pilihan) ?>
                                                        </label>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php elseif ($pertanyaan->tipe_pertanyaan == 'option') : ?>
                                                <select class="form-control">
                                                    <?php foreach ($pertanyaan->pilihan_jawaban as $pilihan) : ?>
                                                        <option><?= esc($pilihan->teks_pilihan) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            <?php endif; ?>
                                        <?php elseif ($pertanyaan->tipe_pertanyaan == 'text') : ?>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= esc($pertanyaan->teks_pertanyaan) ?>" disabled>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-1" style="align-self: center;">
                                        <!-- Tombol Delete -->
                                        <button class="btn btn-danger btn-sm btnHapusPertanyaan" data-pertanyaan-id="<?= $pertanyaan->pertanyaan_id ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div id="pesanKosong" class="text-center">
                        <h2 class="text-center">Belum ada pertanyaan, silahkan tambahkan pertanyaan</h2>
                    </div>
                <?php endif; ?>
                <div id="daftarPertanyaan"></div>
                <button id="btnSimpanSemua" class="btn btn-success mt-3" style="display: none;">Simpan Semua</button>
                <a href="<?= route_to('admin_prodi_kuesioner_prodi_detail', $data["kuesioner"]->kuesioner_id) ?>" class="btn btn-primary mt-3" style="display: none;" id="btnShowPertanyaan">Show Pertanyaan</a>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->



</div>

<!-- Loading Indicator -->
<div id="loadingIndicator" class="modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p>Mohon tunggu, data sedang diproses...</p>
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>


<?=

view('layouts/footer');

?>

<script>
    $(document).ready(function() {
        // Fungsi untuk menginisialisasi sortable
        function initializeSortable() {
            $("#daftarPertanyaan").sortable({
                placeholder: "ui-state-highlight",
                handle: ".handle",
                cursor: "move",
            }).disableSelection();
        }

        // Inisialisasi sortable untuk pertama kali
        initializeSortable();

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

        // Event ketika tombol Tambah diklik
        $('#btnTambah').on('click', function(e) {
            e.preventDefault();
            $('#jenisPertanyaanDropdown').toggle();
        });

        function perbaruiDaftarPertanyaan() {
            if ($('#daftarPertanyaan .pertanyaan-item').length === 0) {
                // Tidak ada pertanyaan, tampilkan pesan
                $('#pesanKosong').show();
            } else {
                // Ada pertanyaan, sembunyikan pesan
                $('#pesanKosong').hide();
            }
        }

        $('#jenisPertanyaanDropdown .dropdown-item').on('click', function() {
            var jenisPertanyaan = $(this).data('jenis');
            tambahPertanyaan(jenisPertanyaan);
            $('#jenisPertanyaanDropdown').hide();
            $('#btnSimpanSemua').show();
            perbaruiDaftarPertanyaan();
        });

        function tambahPertanyaan(jenis) {
            var jumlahPertanyaan = $('#daftarPertanyaan .pertanyaan-item').length;
            var nomorPertanyaan = jumlahPertanyaan + 1;
            var teksNomor = 'Pertanyaan ' + nomorPertanyaan;

            var idPertanyaan = 'pertanyaan-' + Date.now();
            var html = '<div style="padding: 10px;" class="pertanyaan-item mb-3 ui-state-default" id="' + idPertanyaan + '" data-tipe="' + jenis + '">';
            html += '<div class="handle">☰</div>'; // Tambahkan handle untuk drag dan drop



            html += '<label>' + teksNomor + '</label>';
            html += '<input type="text" class="form-control mb-2 inputTeksPertanyaan" placeholder="Pertanyaan (' + jenis.toUpperCase() + ')">';


            if (jenis !== 'text') {
                html += '<div class="opsi-container"></div>';
                html += '<button type="button" class="btn btn-secondary btnTambahOpsi mb-2 mr-2"><i class="fas fa-plus-circle"></i></button>';
            }

            html += '<button type="button" class="btn btn-danger btnHapus mb-2"><i class="fas fa-trash-alt"></i></button>';
            html += '</div>';

            $('#daftarPertanyaan').append(html);
            initializeSortable();
        }

        $('#daftarPertanyaan').on('click', '.btnTambahOpsi', function() {
            var container = $(this).prev('.opsi-container');
            var idOpsi = 'opsi-' + Date.now();
            var opsiHtml = '<div class="opsi-item row mb-2" id="' + idOpsi + '">';
            opsiHtml += '<div class="col-10">';
            opsiHtml += '<input type="text" class="form-control inputOpsi" placeholder="Opsi">';
            opsiHtml += '</div>'; // Tutup col-10
            opsiHtml += '<div class="col-2">';
            opsiHtml += '<button type="button" class="btn btn-info btnHapusOpsi"><i class="fas fa-trash-alt"></i></button>';
            opsiHtml += '</div>'; // Tutup col-2
            opsiHtml += '</div>'; // Tutup row

            container.append(opsiHtml);
        });

        $('#daftarPertanyaan').on('click', '.btnHapus', function() {
            $(this).closest('.pertanyaan-item').remove();
            perbaruiDaftarPertanyaan();
        });

        $('#daftarPertanyaan').on('click', '.btnHapusOpsi', function() {
            $(this).closest('.opsi-item').remove();
        });

        $('#btnTambahPilihan').on('click', function() {
            var pilihan = $('<input type="text" class="form-control mt-2" placeholder="Pilihan Jawaban">');
            $('#pilihanJawaban').append(pilihan);
        });

        $('#btnSimpanSemua').on('click', function() {
            var semuaPertanyaan = [];

            $('#loadingIndicator').modal('show');

            $('#daftarPertanyaan .pertanyaan-item').each(function() {
                var tipePertanyaan = $(this).data('tipe');

                var pertanyaan = {
                    kuesioner_id: $('#kuesionerId').text(),
                    teks_pertanyaan: $(this).find('.inputTeksPertanyaan').val(),
                    tipe_pertanyaan: tipePertanyaan,
                    pilihan_jawaban: $(this).find('.opsi-container .inputOpsi').map(function() {
                        return $(this).val();
                    }).get()
                };

                semuaPertanyaan.push(pertanyaan);
            });

            console.log(semuaPertanyaan);

            $.ajax({
                url: '/api-v2/kuesioner-prodi/save_all_questions',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(semuaPertanyaan),
                success: function(response) {
                    console.log('Data berhasil disimpan', response);
                    toastr.success('Data berhasil disimpan dan akan direfresh dalam 2 detik');
                    $('#btnShowPertanyaan').show();
                },
                error: function(xhr, status, error) {
                    console.error('Error Response:', xhr.responseText);
                    toastr.error('Gagal menyimpan data pertanyaan dan direfresh dalam 2 detik');
                },
                complete: function() {
                    // Sembunyikan loading indicator
                    $('#loadingIndicator').modal('hide');
                    // btnSimpanSemua.hide();
                    $('#btnSimpanSemua').hide();
                    // refresh halaman setelah 2 detik
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        });

        // Handler untuk tombol hapus pertanyaan
        $('.btnHapusPertanyaan').on('click', function() {
            var pertanyaanId = $(this).data('pertanyaan-id');
            if (confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')) {
                // Menghapus pertanyaan menggunakan AJAX
                $.ajax({
                    url: '/api-v2/kuesioner-prodi/delete_question', // Ganti dengan URL endpoint penghapusan pertanyaan Anda
                    type: 'POST',
                    data: {
                        id: pertanyaanId
                    },
                    success: function(response) {
                        // Menampilkan toast dengan pesan bahwa halaman akan di-reload dalam 2 detik
                        toastr.success(`Pertanyaan berhasil dihapus. Reloading dalam 2 detik...`);

                        // Mengatur timeout untuk reload halaman setelah 2 detik
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000); // 2000 milidetik = 2 detik
                    },
                    error: function(xhr, status, error) {
                        // Logika untuk menghandle error
                        toastr.error('Gagal menghapus pertanyaan.');
                    }
                });
            }
        });

        $(document).on('click', function(event) {
            if (!$(event.target).closest('#btnTambah, #jenisPertanyaanDropdown').length) {
                $('#jenisPertanyaanDropdown').hide();
            }
        });

        perbaruiDaftarPertanyaan();
    });
</script>