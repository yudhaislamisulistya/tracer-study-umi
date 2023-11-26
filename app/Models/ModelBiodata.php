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

    public function get_biodata_pagination($limit, $offset, $nameSearch, $nimSearch, $programStudiSearch, $tahunMasukSearch, $tahunKeluarSearch)
    {
        try {
            $query = $this->dbext_tracer->table('ref_biodata')
                        ->select('ref_biodata.*, program_studi.NAMA_PRODI, ifnull(country.name, "NULL") AS NAMA_NEGARA, ifnull(provinces.name, "NULL") AS NAMA_PROVINSI, ifnull(regencies.name, "NULL") AS NAMA_KABUPATEN, ifnull(pekerjaan.nm_pekerjaan, "NULL") AS NAMA_PEKERJAAN, ifnull(status_pekerjaan.status_job, "NULL") AS NAMA_STATUS_PEKERJAAN')
                        ->join('program_studi', 'ref_biodata.program_studi = program_studi.C_KODE_PRODI')
                        ->join('country', 'ref_biodata.negara = country.id', 'left')
                        ->join('provinces', 'ref_biodata.provinsi = provinces.id', 'left')
                        ->join('regencies', 'ref_biodata.kabupaten = regencies.id', 'left')
                        ->join('pekerjaan', 'ref_biodata.jenis_pekerjaan = pekerjaan.id_pekerjaan', 'left')
                        ->join('status_pekerjaan', 'ref_biodata.status_pekerjaan = status_pekerjaan.id_job', 'left')
                        ->groupStart()
                            ->like('nama_lengkap', '%'.$nameSearch.'%')
                            ->like('nim', '%'.$nimSearch.'%')
                            ->like('program_studi', '%'.$programStudiSearch.'%')
                            ->like('tahun_masuk', '%'.$tahunMasukSearch.'%')
                            ->like('tahun_keluar', '%'.$tahunKeluarSearch.'%')
                            // ->orLike('program_studi.nama_prodi', '%'.$nameSearch.'%')
                        ->groupEnd()
                        ->limit($limit, $offset)
                        ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_biodata($nameSearch, $nimSearch, $programStudiSearch, $tahunMasukSearch, $tahunKeluarSearch)
    {
        try {
            $query = $this->dbext_tracer->table('ref_biodata')
                        ->select('ref_biodata.*, program_studi.NAMA_PRODI, ifnull(country.name, "NULL") AS NAMA_NEGARA, ifnull(provinces.name, "NULL") AS NAMA_PROVINSI, ifnull(regencies.name, "NULL") AS NAMA_KABUPATEN, ifnull(pekerjaan.nm_pekerjaan, "NULL") AS NAMA_PEKERJAAN, ifnull(status_pekerjaan.status_job, "NULL") AS NAMA_STATUS_PEKERJAAN')
                        ->join('program_studi', 'ref_biodata.program_studi = program_studi.C_KODE_PRODI')
                        ->join('country', 'ref_biodata.negara = country.id', 'left')
                        ->join('provinces', 'ref_biodata.provinsi = provinces.id', 'left')
                        ->join('regencies', 'ref_biodata.kabupaten = regencies.id', 'left')
                        ->join('pekerjaan', 'ref_biodata.jenis_pekerjaan = pekerjaan.id_pekerjaan', 'left')
                        ->join('status_pekerjaan', 'ref_biodata.status_pekerjaan = status_pekerjaan.id_job', 'left')
                        ->groupStart()
                            ->like('nama_lengkap', '%'.$nameSearch.'%')
                            ->like('nim', '%'.$nimSearch.'%')
                            ->like('program_studi', '%'.$programStudiSearch.'%')
                            ->like('tahun_masuk', '%'.$tahunMasukSearch.'%')
                            ->like('tahun_keluar', '%'.$tahunKeluarSearch.'%')
                            // ->orLike('program_studi.nama_prodi', '%'.$nameSearch.'%')
                        ->groupEnd()
                        ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function update_biodata($nama_lengkap, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $nim, $program_studi, $tahun_masuk, $tahun_keluar, $alamat, $negara, $provinsi, $kabupaten, $jenis_pekerjaan, $nama_perusahaan, $tanggal_masuk_kerja, $status_pekerjaan, $email, $nomor_handphone)
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
                    "status_pekerjaan" => $status_pekerjaan,
                    "email" => $email,
                    "nomor_handphone" => $nomor_handphone,
                ]);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }
}
