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
                ->select('ref_biodata.*, ref_biodata.PROGRAM_STUDI as NAMA_PRODI, ifnull(country.name, "NULL") AS NAMA_NEGARA, ifnull(provinces.name, "NULL") AS NAMA_PROVINSI, ifnull(regencies.name, "NULL") AS NAMA_KABUPATEN, ifnull(pekerjaan.nm_pekerjaan, "NULL") AS NAMA_PEKERJAAN, ifnull(status_pekerjaan.status_job, "NULL") AS NAMA_STATUS_PEKERJAAN')
                ->join('country', 'ref_biodata.negara = country.id', 'left')
                ->join('provinces', 'ref_biodata.provinsi = provinces.id', 'left')
                ->join('regencies', 'ref_biodata.kabupaten = regencies.id', 'left')
                ->join('pekerjaan', 'ref_biodata.jenis_pekerjaan = pekerjaan.id_pekerjaan', 'left')
                ->join('status_pekerjaan', 'ref_biodata.status_pekerjaan = status_pekerjaan.id_job', 'left')
                ->groupStart()
                ->like('nama_lengkap', '%' . $nameSearch . '%')
                ->like('nim', '%' . $nimSearch . '%')
                ->like('tahun_masuk', '%' . $tahunMasukSearch . '%')
                ->like('tahun_keluar', '%' . $tahunKeluarSearch . '%')
                ->like('kode_prodi', '%' . $programStudiSearch . '%')
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
                ->select('ref_biodata.*, ref_biodata.PROGRAM_STUDI as NAMA_PRODI, ifnull(country.name, "NULL") AS NAMA_NEGARA, ifnull(provinces.name, "NULL") AS NAMA_PROVINSI, ifnull(regencies.name, "NULL") AS NAMA_KABUPATEN, ifnull(pekerjaan.nm_pekerjaan, "NULL") AS NAMA_PEKERJAAN, ifnull(status_pekerjaan.status_job, "NULL") AS NAMA_STATUS_PEKERJAAN')
                ->join('country', 'ref_biodata.negara = country.id', 'left')
                ->join('provinces', 'ref_biodata.provinsi = provinces.id', 'left')
                ->join('regencies', 'ref_biodata.kabupaten = regencies.id', 'left')
                ->join('pekerjaan', 'ref_biodata.jenis_pekerjaan = pekerjaan.id_pekerjaan', 'left')
                ->join('status_pekerjaan', 'ref_biodata.status_pekerjaan = status_pekerjaan.id_job', 'left')
                ->groupStart()
                ->like('nama_lengkap', '%' . $nameSearch . '%')
                ->like('nim', '%' . $nimSearch . '%')
                ->like('tahun_masuk', '%' . $tahunMasukSearch . '%')
                ->like('tahun_keluar', '%' . $tahunKeluarSearch . '%')
                ->like('kode_prodi', '%' . $programStudiSearch . '%')
                ->groupEnd()
                ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_single_biodata($nim)
    {
        try {
            $query = $this->dbext_tracer->table('ref_biodata')
                ->select()
                ->where('nim', $nim)
                ->get();
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function update_biodata($nim, $tahun_masuk, $tahun_keluar, $alamat, $negara, $provinsi, $kabupaten, $jenis_pekerjaan, $nama_perusahaan, $tanggal_masuk_kerja, $status_pekerjaan, $email, $nomor_handphone)
    {
        try {
            $this->dbext_tracer->table('ref_biodata')
                ->where('nim', $nim)
                ->update([
                    "tahun_masuk" => $tahun_masuk == "" ? "" : $tahun_masuk,
                    "tahun_keluar" => $tahun_keluar == "" ? "" : $tahun_keluar,
                    "alamat" => $alamat == "" ? "" : $alamat,
                    "negara" => $negara == "" ? "" : $negara,
                    "provinsi" => $provinsi == "" ? "" : $provinsi,
                    "kabupaten" => $kabupaten == "" ? "" : $kabupaten,
                    "jenis_pekerjaan" => $jenis_pekerjaan == "" ? "" : $jenis_pekerjaan,
                    "nama_perusahaan" => $nama_perusahaan == "" ? "" : $nama_perusahaan,
                    "tanggal_masuk_kerja" => $tanggal_masuk_kerja == "" ? "" : $tanggal_masuk_kerja,
                    "status_pekerjaan" => $status_pekerjaan == "" ? "" : $status_pekerjaan,
                    "email" => $email == "" ? "" : $email,
                    "nomor_handphone" => $nomor_handphone == "" ? "" : $nomor_handphone,
                ]);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }


    // Check Data by NIM
    public function check_data($nim)
    {
        try {
            $sql = "SELECT COUNT(*) AS total_biodata FROM ref_biodata WHERE nim = '$nim';";
            $query = $this->dbext_tracer->query($sql);

            if ($query->getRow()->total_biodata > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function insert_data_default($kode_prodi, $nim, $nama_lengkap, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $program_studi)
    {
        try {
            $this->dbext_tracer->table('ref_biodata')
                ->insert([
                    'kode_prodi' => $kode_prodi,
                    "nim" => $nim,
                    "nama_lengkap" => $nama_lengkap,
                    "jenis_kelamin" => $jenis_kelamin,
                    "tempat_lahir" => $tempat_lahir,
                    "tanggal_lahir" => $tanggal_lahir,
                    "program_studi" => $program_studi,
                    "tahun_masuk" => "",
                    "tahun_keluar" => "",
                    "alamat" => "",
                    "negara" => "",
                    "provinsi" => "",
                    "kabupaten" => "",
                    "jenis_pekerjaan" => "",
                    "nama_perusahaan" => "",
                    "tanggal_masuk_kerja" => "",
                    "email" => "",
                    "nomor_handphone" => "",
                ]);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    // Admin
    public function get_total_biodata()
    {
        try {
            $kode_prodi = session()->get('C_KODE_PRODI');
            if ($kode_prodi != null) {
                $sql = "SELECT COUNT(*) AS total_biodata FROM ref_biodata WHERE kode_prodi = '$kode_prodi';";
            }else{
                $sql = "SELECT COUNT(*) AS total_biodata FROM ref_biodata;";
            }
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function import_biodata($data)
    {
        try {
            $this->dbext_tracer->table('ref_biodata')
                ->insert($data);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function delete_biodata($nim)
    {
        try {
            $this->dbext_tracer->table('ref_biodata')
                ->where('nim', $nim)
                ->delete();
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function update_biodata_with_nim($nim, $data)
    {
        try {
            $this->dbext_tracer->table('ref_biodata')
                ->where('nim', $nim)
                ->update($data);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_biodata_by_nim($nim)
    {
        try {
            $query = $this->dbext_tracer->table('ref_biodata')
                ->select()
                ->where('nim', $nim)
                ->get();
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
