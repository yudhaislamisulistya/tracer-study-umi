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
                    <a class="btn btn-primary" href="http://alumni.fikom.umi.ac.id/alumni/legalisir/create"><i
                            class="flaticon2-checkmark mr-2"></i> Pengajuan Legalisir</a>
                </div>
            </div>
            <div class="card-footer">
                <ul class="list-inline list-inline-dotted text-muted mb-3">
                    <li class="list-inline-item">Diposting Oleh <a href="#" class="text-muted">Administrator</a></li>
                    <li class="list-inline-item">Last Updated: 31 Oktober 2021</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?= view('layouts/footer.php') ?>