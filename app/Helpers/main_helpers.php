<?php

function get_data_kuesioner_by_nama_prodi($nama_prodi)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('kuesioner')
            ->where('nama_prodi',$nama_prodi)
            ->get();
    $results = $query->getResult();
    return $results;
}

function get_data_berita_by_kategori($kategori)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('berita')
            ->where('kategori',$kategori)
            ->get();
    $results = $query->getResult();
    return $results;
}

function get_data_legalisir(){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('legalisir')->get();
    $results = $query->getResult();
    return $results;

}

function get_data_lowongan_kerja(){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('lowongan_kerja')->get();
    $results = $query->getResult();
    return $results;

}

function get_data_kode_prodi_with_name($name)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('program_studi')
            ->where('NAMA_PRODI',$name)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_nama_prodi_with_kode($kode)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('program_studi')
            ->where('C_KODE_PRODI',$kode)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_country_by_id($id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('country')
            ->where('id',$id)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_regencies(){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('regencies')->get();
    $results = $query->getResult();
    return $results;


}

function get_data_regencies_with_id($id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('regencies')
            ->where('id',$id)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_jenis_keluar(){
    $db = \Config\Database::connect('acc_tracer');
    $query = $db->table('jenis_keluar')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_kuesioner(){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('kuesioner')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_provinsi_with_id($id)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('provinces')
            ->where('id',$id)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_pekerjaan(){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('pekerjaan')->get();
    $results = $query->getResult();
    return $results;

}

function get_data_pekerjaan_by_id($id){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('pekerjaan')
            ->where('id_pekerjaan',$id)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_status_pekerjaan(){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('status_pekerjaan')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_status_pekerjaan_by_id($id){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('status_pekerjaan')
            ->where('id_job',$id)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_lulusan($nim){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('lulusan_satu')
            ->where('nimhsmsmh',$nim)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}
function get_data_alumni_by_nim($nim){
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

function get_all_data_biodata(){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_biodata')->get();
    $results = $query->getResult();
    return $results;

}

function get_data_biodata($nim)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_biodata')
            ->where('nim',$nim)
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

function check_biodata($nim){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_biodata')
            ->where('nim',$nim)
            ->get();
    $results = $query->getUnbufferedRow();
    // if ($results == null) {
    //     return 0;
    // }else{
    //     return 1;
    // }
    if ($results->nama_lengkap == '' || $results->jenis_kelamin == '' || $results->tempat_lahir == '' || $results->tanggal_lahir == '' || $results->nim == '' || $results->program_studi == '' || $results->tahun_masuk == '' || $results->tahun_keluar == '' || $results->alamat == '' || $results->negara == '' || $results->provinsi == '' || $results->kabupaten == '' || $results->jenis_pekerjaan == '' || $results->nama_perusahaan == '' || $results->tanggal_masuk_kerja == '' || $results->email == '' || $results->nomor_handphone == '') {
        return 0;
    }else{
        return 1;
    }
}


function get_email_with_activation_code($activation_code)
{
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('ref_registrasi')
            ->where('activation',$activation_code)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_program_studi(){
    $db = \Config\Database::connect('accext_tracer');
    $query = $db->table('program_studi')->get();
    $results = $query->getResult();
    return $results;
}

function get_data_setup_ts_with_tahun_keluar($tahun_keluar)
{
    $db = \Config\Database::connect('acc_tracer');
    $query = $db->table('setup_ts')
            ->where('tahun_lulusan',$tahun_keluar)
            ->where('is_active',1)
            ->get();
    $results = $query->getUnbufferedRow();
    return $results;
}


// Random Alphanumeric
function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Format Rupiah
function format_rupiah($angka){
    $rupiah = number_format($angka,0,',','.');
    return $rupiah;
}

// Format Tanggal Misalnya 20 November 2023
function format_tanggal($tanggal){
    $bulan = array (
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
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

// Get Current Date
function get_current_date(){
    $date = date('Y-m-d');
    return $date;
}

// Short Isi Content
function short_isi($isi){
    $isi = strip_tags($isi);
    if (strlen($isi) > 300) {
        $isi = substr($isi, 0, 300) . '...';
    }
    return $isi;
}

// shor isi conten with limit
function short_isi_limit($isi, $limit){
    $isi = strip_tags($isi);
    if (strlen($isi) > $limit) {
        $isi = substr($isi, 0, $limit) . '...';
    }
    return $isi;
}

// format ribuan, misalnya 1000 menjadi 1.000
function format_ribuan($angka){
    $ribuan = number_format($angka,0,',','.');
    return $ribuan;
}
function format_date_indonesian($dateString) {
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


?>