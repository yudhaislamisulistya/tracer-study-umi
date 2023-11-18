<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBiodata extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function update_biodata($nama_lengkap, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $nim, $program_studi, $tahun_masuk, $tahun_keluar, $alamat, $negara, $provinsi, $kabupaten, $jenis_pekerjaan, $nama_perusahaan, $tanggal_masuk_kerja,$email, $nomor_handphone)
    {
        try {
            $this->dbext_tracer->table('ref_biodata')
                ->replace([
                    "nama_lengkap" => $nama_lengkap,
                    "jenis_kelamin" => $jenis_kelamin,
                    "tempat_lahir" => $tempat_lahir,
                    "tanggal_lahir" => $tanggal_lahir,
                    "nim" => $nim,
                    "program_studi" => $program_studi,
                    "tahun_masuk" => $tahun_masuk,
                    "tahun_keluar" => $tahun_keluar,
                    "alamat" => $alamat,
                    "negara" => $negara,
                    "provinsi" => $provinsi,
                    "kabupaten" => $kabupaten,
                    "jenis_pekerjaan" => $jenis_pekerjaan,
                    "nama_perusahaan" => $nama_perusahaan,
                    "tanggal_masuk_kerja" => $tanggal_masuk_kerja,
                    "email" => $email,
                    "nomor_handphone" => $nomor_handphone,
                ]);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

}
