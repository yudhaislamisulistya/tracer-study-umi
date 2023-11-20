<?php

?>
<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <h3 class="card-title">
                    Prosuder Legalisir
                </h3>

            </div>
            <div class="card-body">

                <div class="mb-3">
                    <p> Layanan <strong>Legalisir Online</strong> diberikan kepada para alumni Fakultas Ilmu Komputer
                        UMI untuk memudahkan dalam melegalisir ijazah dan transkrip nilai. Bagi alumni yang bertempat
                        tinggal jauh dari Kota Makassar akan mendapatkan layanan kirim ijazah hasil legalisir.
                        Prosedur permintaan legalisir akan dilayani online dengan memanfaatkan fasilitas FIKOM APPS.
                        Namun layanan ini hanya berlaku bagi Alumni yang melakukan aktivasi pada portal alumni.
                    </p>
                    <p>Alumni cukup mengirimkan file dokumen yang akan dilegalisir dan mengimkan bukti pembayaran.</p>
                    <p>Seluruh pengajuan legalisir ijazah akan memanfaatkan aplikasi Portal Alumni, sedangkan untuk
                        pengambilan dapat dilakukan di Fakultas atau dikirimkan sesuai alamat pengajuan dengan menambah
                        biaya pengiriman yang dapat dicek di <a href="https://cektarif.com/">https://cektarif.com</a>
                    </p>
                    <p>Adapun besar biaya administrasi legalisir adalah sebagai berikut:<br />
                    <ul>
                        <li>Paket lejalisir ijazah dan transkrip nilai (masing-masing 10 lembar) : Rp. 40.000</li>
                        <li>Kelebihan akan dikenakan sebesar Rp. 2.000 per lembar untuk Ijazah, dan Rp. 2.000 per
                            lembar untuk transkrip nilai.</li>
                    </ul>
                    </p>
                    <p>Transfer biaya layanan sebesar biaya total hasil perhitungan ke Rekening BNI Syariah a.n. Fak
                        Ilmu Komputer UMI No. Rek. 0420366581 (dengan format pesan: LEGALISIR-NIM-NAMA ALUMNI)</p>
                    <a class="btn btn-primary" href="<?= base_url('legalisir/pengajuan') ?>"><i class="flaticon2-checkmark mr-2"></i> Pengajuan Legalisir</a>
                    <!-- Konfirmasi Hubungi Via Whatsapp -->
                    <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=6281340000000&text=Halo%20Admin%20Saya%20Mau%20Konfirmasi%20Pengajuan%20Legalisir"><i class="flaticon2-phone mr-2"></i> Konfirmasi Pengajuan</a>

                </div>
            </div>
            <div class="card-footer">
                <ul class="list-inline list-inline-dotted text-muted mb-3">
                    <li class="list-inline-item">Diposting Oleh <a href="#" class="text-muted">Administrator</a></li>
                    <li class="list-inline-item">Last Updated: 31 Oktober 2021</li>
                </ul>
            </div>
        </div>

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        Legalisasi Jarak Jauh / Distanced Legalization
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Search Form-->
                <!--begin::Search Form-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-xl-8">
                            <div class="row align-items-center">
                                <div class="col-md-12 my-2 my-md-0">
                                    <div class="input-icon">
                                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                            <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
                                Search
                            </a>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->
                <!--end: Search Form-->

                <!--begin: Datatable-->
                <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable_legalisir">
                    <thead>
                        <tr>
                            <th title="Field #1">ID</th>
                            <th title="Field #11">Status</th>
                            <th title="Field #2">Jenis Berkas</th>
                            <th title="Field #3">Jenis TTD Berkas</th>
                            <th title="Field #4">Bahasa</th>
                            <th title="Field #5">Jumlah</th>
                            <th title="Field #6">Alamat Pengiriman</th>
                            <th title="Field #7">Biaya Legalisir</th>
                            <th title="Field #8">Biaya Pengiriman</th>
                            <th title="Field #9">Total Biaya</th>
                            <th title="Field #10">Catatan</th>
                            <th title="Field #12">Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        foreach ($data_legalisir as $key => $value) {

                            // 'Submitted','Processing','Completed','Shipped','Cancelled'
                            if ($value->status == 'Submitted') {
                                $value->status = '<span class="label font-weight-bold label-lg label-light-warning label-inline">Submitted</span>';
                            } elseif ($value->status == 'Processing') {
                                $value->status = '<span class="label font-weight-bold label-lg label-light-primary label-inline">Processing</span>';
                            } elseif ($value->status == 'Completed') {
                                $value->status = '<span class="label font-weight-bold label-lg label-light-success label-inline">Completed</span>';
                            } elseif ($value->status == 'Shipped') {
                                $value->status = '<span class="label font-weight-bold label-lg label-light-info label-inline">Shipped</span>';
                            } elseif ($value->status == 'Cancelled') {
                                $value->status = '<span class="label font-weight-bold label-lg label-light-danger label-inline">Cancelled</span>';
                            }

                            if ($value->alamat_pengiriman == ''){
                                $value->alamat_pengiriman = '-';
                            }

                            if ($value->catatan == ''){
                                $value->catatan = '-';
                            }

                            $no = $key + 1;
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>";
                            echo "<span style='width: 108px;'>";
                            echo " " . $value->status . " ";
                            echo "</span>";
                            echo "</td>";
                            echo "<td>" . $value->jenis_berkas . "</td>";
                            echo "<td>" . $value->ttd_berkas_path . "</td>";
                            echo "<td>" . $value->bahasa . "</td>";
                            echo "<td>" . $value->jumlah . "</td>";
                            echo "<td>" . $value->alamat_pengiriman . "</td>";
                            echo "<td> Rp. " . format_rupiah($value->biaya_legalisasi) . "</td>";
                            echo "<td> Rp. " . format_rupiah($value->tarif_pengiriman) . "</td>";
                            echo "<td> Rp. " . format_rupiah($value->total_biaya) . "</td>";
                            echo "<td>" . $value->catatan . "</td>";
                            echo "<td>";
                            echo "<a target='_blank' href='" . base_url('assets/berkas/legalisir/' . $value->berkas_path) . "' class='btn btn-sm btn-clean btn-icon mr-2' title='Edit details'><i class='flaticon2-download text-primary'></i></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        
                        ?>
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
</div>

<?= view('layouts/footer.php') ?>