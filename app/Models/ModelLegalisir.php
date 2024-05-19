<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLegalisir extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function get_all_legalisir_by_nim($nim)
    {
        try {
            $query = $this->dbext_tracer->table('legalisir')
                ->where('nim', $nim)
                ->orderBy('id', 'DESC')
                ->get();
            $results = $query->getResult();
            return $results;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function post_add_pengajuan($data)
    {
        try {
            $query = $this->dbext_tracer->table('legalisir')->insert($data);
            return $query;
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
            return 0;
        }
    }

    // Admin
    public function get_total_legalisir()
    {
        try {
            $kode_prodi = session()->get('C_KODE_PRODI');
            if ($kode_prodi != null) {
                $sql = "SELECT COUNT(*) AS total_legalisir FROM legalisir WHERE kode_prodi = '$kode_prodi';";
            } else {
                $sql = "SELECT COUNT(*) AS total_legalisir FROM legalisir;";
            }
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_kuesioner_pengguna_lulusan()
    {
        try {
            $kode_prodi = session()->get('C_KODE_PRODI');
            if ($kode_prodi != null) {
                $sql = "SELECT COUNT(*) AS total_kuesioner FROM lulusan_satu WHERE kdpstmsmh = '$kode_prodi';";
            } else {
                $sql = "SELECT COUNT(*) AS total_kuesioner FROM lulusan_satu;";
            }
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_legalisir_based_status()
    {
        try {
            $sql = "SELECT COUNT(*) AS total_legalisir, status FROM legalisir GROUP BY status";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_legalisir_by_ttd_berkas_path()
    {
        try {
            $sql = "SELECT COUNT(*) AS total_legalisir, ttd_berkas_path FROM legalisir GROUP BY ttd_berkas_path";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    // // Admin Prodi
    // Post Legalisir
    public function post_add_legalisir($data)
    {
        try {
            // Check if the record exists
            $existingRecord = $this->dbext_tracer->table('pengaturan_legalisir')
                ->where('kode_prodi', $data['kode_prodi']) // assuming 'kode_prodi' is the primary key or unique identifier
                ->get()
                ->getRow();

            if ($existingRecord) {
                // Record exists, update it
                $query = $this->dbext_tracer->table('pengaturan_legalisir')
                    ->where('kode_prodi', $data['kode_prodi'])
                    ->update($data);
            } else {
                // Record does not exist, insert it
                $query = $this->dbext_tracer->table('pengaturan_legalisir')->insert($data);
            }

            return $query;
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
            return 0;
        }
    }

    // Get Pengaturan Legalisir by Kode Prodi
    public function get_pengaturan_legalisir_by_kode_prodi($kode_prodi)
    {
        try {
            $query = $this->dbext_tracer->table('pengaturan_legalisir')
                ->where('kode_prodi', $kode_prodi)
                ->get();
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    // Update Status Legalisir
    public function update_status_legalisir($id, $data)
    {
        try {
            $query = $this->dbext_tracer->table('legalisir')
                ->where('id', $id)
                ->update($data);
            return $query;
        } catch (\Exception $th) {
            return 0;
        }
    }

    // Delete Pengajuan Legalisir
    public function delete_pengajuan($id)
    {
        try {
            $query = $this->dbext_tracer->table('legalisir')
                ->where('id', $id)
                ->delete();
            return $query;
        } catch (\Exception $th) {
            return 0;
        }
    }
}
