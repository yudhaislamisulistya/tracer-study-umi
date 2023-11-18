<?php

function get_tahun_akademik_by_tahun($tahun_akademik)
{
	$tahun_akademik = substr($tahun_akademik,0, 4);
	$status = '';
	if($tahun_akademik == '2020'){
        $status = '2020-2021';
    }else if ($tahun_akademik == '2021') {
		$status = '2021-2022';
	}else if ($tahun_akademik == '2022'){
		$status = '2022-2023';
	}else if ($tahun_akademik == '2023'){
		$status = '2023-2024';
	}else if ($tahun_akademik == '2024'){
		$status = '2024-2025';
	}else if ($tahun_akademik == '2025'){
		$status = '2025-2026';
	}
    return $status;
}

function get_semester_by_tahun($tahun_akademik)
{
	$tahun_akademik = substr($tahun_akademik,-1);

	// $semester = '';
	// if ($tahun_akademik == '1') {
	// 	$semester = 'Ganjil';
	// }else{
	// 	$semester = 'Genap';
	// }
    return $tahun_akademik;
}

function get_username()
{
    return Session()->get('C_USERNAME');
}

function get_data_mahasiswa_gamelan(){
    $db = \Config\Database::connect('gamelan');
    $query = $db->table('t_mst_mahasiswa')->where('C_NPM', Session()->get('C_USERNAME'))->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_prodi_gamelan(){
    $db = \Config\Database::connect('gamelan');
    $query = $db->table('t_mst_prodi')->where('C_KODE_PRODI', get_data_mahasiswa_gamelan()->C_KODE_PRODI)->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_fakultas_gamelan(){
    $db = \Config\Database::connect('gamelan');
    $query = $db->table('t_mst_fakultas')->where('C_KODE_FAKULTAS', get_data_mahasiswa_gamelan()->C_KODE_FAKULTAS)->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_kkn()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('set_kkn')->where('is_active', 1)->get();
    $results = $query->getResult();
    return $results;
}

function get_data_registrasi()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_registrasi')->where('nim', Session()->get('C_USERNAME'))->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_pembayaran()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_pembayaran')->where('nim', Session()->get('C_USERNAME'))->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_konfirmasi_pembayaran()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_konfirmasi_pembayaran')->where('nim', Session()->get('C_USERNAME'))->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_registrasi_kkn(){
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_registrasi')->join('set_kkn', 'fr_registrasi.periode_kkn = set_kkn.id_set_kkn')->where('fr_registrasi.nim', Session()->get('C_USERNAME'))->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_supervisi()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_supervisi')->join('set_supervisi', 'fr_supervisi.nidn = set_supervisi.nidn')->where('fr_supervisi.nim', Session()->get('C_USERNAME'))->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_lokasi()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_lokasi')->where('nim', Session()->get('C_USERNAME'))->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_scope_supervisi()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_supervisi')->where('nidn', get_data_supervisi()->nidn)->get();
    $results = $query->getResult();
    return $results;
}

function get_data_laporan()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_laporan')->where('lokasi', get_data_lokasi()->lokasi)->where('periode_kkn', get_data_registrasi()->periode_kkn)->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_nilai()
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('fr_nilai')->where('nim', Session()->get('C_USERNAME'))->where('periode_kkn', get_data_registrasi()->periode_kkn)->get();
    $results = $query->getUnbufferedRow();
    return $results;
}

function get_data_kelompok($id_set_kelompok)
{
    $db = \Config\Database::connect('kkn');
    $query = $db->table('set_kelompok')->where('id_set_kelompok', $id_set_kelompok)->get();
    $results = $query->getUnbufferedRow();
    return $results;
}


function check_registration_kkn($nim){
    // Tahun Akademik dan Kode Semester di Ambil Dari Periode Aktif KKN
    $tahun_akademik = get_tahun_akademik_by_tahun("20211");
    $kode_semester = get_semester_by_tahun("20211");
    $kode_prodi = get_data_mahasiswa_gamelan()->C_KODE_PRODI;
    $db = \Config\Database::connect('gamelan');
    $query_step_one = $db->table('smk_t_tra_mhs_status_registrasi')
        ->where('C_NPM', Session()->get('C_USERNAME'))
        ->where('C_TAHUN_AKADEMIK', $tahun_akademik)
        ->where('C_KODE_SEMESTER', $kode_semester)
        ->where('C_KODE_STATUS_REGISTRASI >=', 4)
        ->get();
    $hasil_step_one = $query_step_one->getUnbufferedRow();
    if ($hasil_step_one) {
        $query_step_two = $db->table('smk_t_tra_mhs_ambil_mk')
        ->select('C_KODE_KURIKULUM')
        ->where('C_NPM', Session()->get('C_USERNAME'))
        ->where('C_TAHUN_AKADEMIK', $tahun_akademik)
        ->where('C_KODE_SEMESTER', $kode_semester)
        ->get();
        $hasil_step_two = $query_step_two->getUnbufferedRow();
        if ($hasil_step_two) {
            $query_step_three = $db->table('t_par_matakuliah_magang')
            ->select('C_KODE_MK')
            ->where('C_KODE_PRODI', $kode_prodi)
            ->where('C_KODE_KURIKULUM', $hasil_step_two->C_KODE_KURIKULUM)
            ->get();
            $hasil_step_three = $query_step_three->getUnbufferedRow();
            if ($hasil_step_three) {
                $query_step_four = $db->table('smk_t_tra_mhs_ambil_mk')
                ->where('C_NPM ', $nim)
                ->where('C_TAHUN_AKADEMIK', $tahun_akademik)
                ->where('C_KODE_SEMESTER', $kode_semester)
                ->where('C_KODE_MK', $hasil_step_three->C_KODE_MK)
                ->get();
                $hasil_step_four = $query_step_four->getUnbufferedRow();
                if ($hasil_step_four) {
                    return 1;
                }else{
                    return 96;
                }
            }else{
                return 97;
            }
        }else{
            return 98;
        }
    }else{
        return 99;
    }
}

?>