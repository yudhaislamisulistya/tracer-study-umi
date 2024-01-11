<?= view('layouts/header.php') ?>


<div class="d-flex flex-column-fluid mt-5">
    <div class="container">
        <?php
            if (check_biodata(Session()->get('C_NPM')) == 0) {
                echo '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon2-warning"></i></div>
                        <div class="alert-text">Mohon Maaf! Silahkan Lengkapi Profile atau Biodata Anda Melalui Link <a class="text-dark" href="'.base_url("biodata").'">Disini</a> Sebelum Mengisi Kuesioner</div>
                    </div>';
            }else{
                if ($status == 0) {
                    echo '<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon2-warning"></i></div>
                        <div class="alert-text">Maaf Yah!!!! Anda Belum Berhak Mengisi Kuesioner Dikarenakan Tidak Sesuainya Pengisian Tahun Lulus dan Tahun Pengisian Oleh Sistem</div>
                    </div>';
                }else{
                    echo '<div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
                        <div class="alert-text">Yuhuuuu!!!! Selamat Anda Berhak Mengisi Kuesioner, Silahkan Mengisi Melalui Form Dibawah Ini</div>
                    </div>';
                }
            }
        ?>
        <div class="alert alert-custom alert-notice alert-light-info fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text"><span class="h4">Informasi Kuesioner Tracer Study.</span><br>
                Saat ini Anda sudah dapat mengisi Kuesioner Tracer Study.<br>
                Pengisian Tracer Study hanya dapat dilakukan oleh seluruh Lulusan Yang Terdaftar Oleh Sistem Tracer Universitas Muslim Indonesia<br>
                Kami ucapkan terimakasih dan penghargaan setinggi-tingginya buat para lulusan atas partisipasi dan
                dukungan yang diberikan dalam kegiatan Tracer Study tahun 2021.</div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    </div>
</div> 

<?= view('layouts/footer.php') ?>
<script>
    var HOST_URL = "https://alumni.umi.ac.id/"
