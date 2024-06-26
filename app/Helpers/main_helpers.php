<?php


function get_data_kuesioner_jawaban($pertanyaan_id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('kuesioner_jawaban')
        ->where('nimhsmsmh', session()->get('C_NPM'))
        ->where('pertanyaan_id', $pertanyaan_id)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_kuesioner_by_nama_prodi($nama_prodi)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('kuesioner')
        ->where('nama_prodi', $nama_prodi)
        ->orderBy('kuesioner_id', 'DESC')
        ->get();
    $results = $query->getResult();
    return $results;
}

function get_data_berita_by_kategori($kategori)
{
    $db = \Config\Database::connect('accext_tracer');
    $kode_prodi = session()->get('C_KODE_PRODI');
    if ($kode_prodi != null) {
        $query = $db->table('berita')
            ->where('kategori', $kategori)
            ->where('kode_prodi', $kode_prodi)
            ->orderBy('id', 'DESC')
            ->get();
    } else {
        $query = $db->table('berita')
            ->where('kategori', $kategori)
            ->orderBy('id', 'DESC')
            ->get();
    }

    $results = $query->getResult();
    return $results;
}

function get_data_legalisir($kode_prodi)
{
    $db = \Config\Database::connect('accext_tracer');
    if ($kode_prodi == "" || $kode_prodi == null) {
        $query = $db->table('legalisir')
            ->orderBy('id', 'DESC')
            ->get();
    } else {
        $query = $db->table('legalisir')
            ->where('kode_prodi', $kode_prodi)
            ->orderBy('id', 'DESC')
            ->get();
    }
    $results = $query->getResult();
    return $results;
}

function get_data_lowongan_kerja($C_KODE_PRODI = null)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('lowongan_kerja')
        ->where('kode_prodi', $C_KODE_PRODI)
        ->orderBy('lowongan_id', 'desc')
        ->get();
    $results = $query->getResult();
    return $results;
}

function get_data_kode_prodi_with_name($name)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('program_studi')
        ->where('NAMA_PRODI', $name)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_nama_prodi_with_kode($kode)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('program_studi')
        ->where('C_KODE_PRODI', $kode)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_country_by_id($id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('country')
        ->where('id', $id)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_regencies()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('regencies')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_regencies_with_id($id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('regencies')
        ->where('id', $id)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_jenis_keluar()
{
    $db = \Config\Database::connect('acc_tracer');
    $query = $db->table('jenis_keluar')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_kuesioner()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('kuesioner')->orderBy('kuesioner_id', 'DESC')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_provinsi_with_id($id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('provinces')
        ->where('id', $id)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_pekerjaan()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('pekerjaan')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_pekerjaan_by_id($id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('pekerjaan')
        ->where('id_pekerjaan', $id)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_status_pekerjaan()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('status_pekerjaan')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_status_pekerjaan_by_id($id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('status_pekerjaan')
        ->where('id_job', $id)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_lulusan($nim)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('lulusan_satu')
        ->where('nimhsmsmh', $nim)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}
function get_data_alumni_by_nim($nim)
{
    $db = \Config\Database::connect('acc_tracer');
    $query = $db->table('alumni')
        ->where('nim', $nim)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_registrasi($nim)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_registrasi')
        ->where('nim', $nim)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function check_status_activation($activation_code)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_registrasi')
        ->where('activation', $activation_code)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function check_permission_user()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('fr_registrasi')
        ->where('nim', Session()->get('C_NPM'))
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_all_data_biodata()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_biodata')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_biodata($nim)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_biodata')
        ->where('nim', $nim)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_country()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('country')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_provinces()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('provinces')->get();
    $results = $query->getResult();
    return $results;
}

function check_biodata($nim)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_biodata')
        ->where('nim', $nim)
        ->get();
    $results = $query->getUnbufferedRow();
    // if ($results == null) {
    //     return 0;
    // }else{
    //     return 1;
    // }
    if ($results->nama_lengkap == '' || $results->jenis_kelamin == '' || $results->tempat_lahir == '' || $results->tanggal_lahir == '' || $results->nim == '' || $results->program_studi == '' || $results->tahun_masuk == '' || $results->tahun_keluar == '' || $results->alamat == '' || $results->negara == '' || $results->provinsi == '' || $results->kabupaten == '' || $results->email == '' || $results->nomor_handphone == '') {
        return 0;
    } else {
        return 1;
    }
}


function get_email_with_activation_code($activation_code)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_registrasi')
        ->where('activation', $activation_code)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_program_studi()
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('program_studi')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_setup_ts_with_tahun_keluar($tahun_keluar)
{
    $db = \Config\Database::connect('acc_tracer');
    $query = $db->table('setup_ts')
        ->where('tahun_lulusan', $tahun_keluar)
        ->where('is_active', 1)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}


// Random Alphanumeric
function generateRandomString($length = 20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Format Rupiah
function format_rupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return $rupiah;
}

// Format Tanggal Misalnya 20 November 2023
function format_tanggal($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

// Get Current Date
function get_current_date()
{
    $date = date('Y-m-d');
    return $date;
}

// Short Isi Content
function short_isi($isi)
{
    $isi = strip_tags($isi);
    if (strlen($isi) > 300) {
        $isi = substr($isi, 0, 300) . '...';
    }
    return $isi;
}

// shor isi conten with limit
function short_isi_limit($isi, $limit)
{
    $isi = strip_tags($isi);
    if (strlen($isi) > $limit) {
        $isi = substr($isi, 0, $limit) . '...';
    }
    return $isi;
}

// format ribuan, misalnya 1000 menjadi 1.000
function format_ribuan($angka)
{
    $ribuan = number_format($angka, 0, ',', '.');
    return $ribuan;
}
function format_date_indonesian($dateString)
{
    $date = new DateTime($dateString);
    // Uncomment the next line if you need to set a specific timezone
    // $date->setTimezone(new DateTimeZone('Your/Timezone'));

    $monthNames = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    ];

    $formattedDate = $date->format('d F Y');
    foreach ($monthNames as $english => $indonesian) {
        $formattedDate = str_replace($english, $indonesian, $formattedDate);
    }

    return $formattedDate;
}

function check_exist_data_kuesioner_optional_by_prodi($prodi)
{
    $db = \Config\Database::connect('accext_tracer');
    $dateNow = date('Y-m-d');

    $query = $db->table('kuesioner')
        ->like('nama_prodi', $prodi)
        ->where('periode_mulai <=', $dateNow)
        ->where('periode_selesai >=', $dateNow)
        ->limit(1)
        ->get();

    $results = $query->getUnbufferedRow();

    if ($results == null) {
        return 0;
    } else {
        return $results->kuesioner_id;
    }
}

function get_data_pertanyaan_by_kuesioner_id($id)
{
    $ModelKuesioner = new \App\Models\ModelKuesioner();
    $data['kuesioner'] = $ModelKuesioner->get_kuesioner_prodi_detail($id);
    $data['pertanyaan'] = $ModelKuesioner->get_pertanyaan_by_kuesioner($id);

    foreach ($data['pertanyaan'] as $key => $pertanyaan) {
        $data['pertanyaan'][$key]->pilihan_jawaban = $ModelKuesioner->get_pilihan_jawaban_by_pertanyaan($pertanyaan->pertanyaan_id);
    }

    return $data;
}

function get_data_tahun_lulus()
{
    $tahun = date('Y');
    $tahun_lulus = [];
    for ($i = 2010; $i <= $tahun; $i++) {
        $tahun_lulus[] = $i;
    }
    return $tahun_lulus;
}

function get_data_prodi($kode_prodi){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('program_studi')
        ->where('C_KODE_PRODI', $kode_prodi)
        ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}
