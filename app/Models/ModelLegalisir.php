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
            $sql = "SELECT COUNT(*) AS total_legalisir FROM legalisir";
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_legalisir_based_status(){
        try {
            $sql = "SELECT COUNT(*) AS total_legalisir, status FROM legalisir GROUP BY status";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_legalisir_by_ttd_berkas_path(){
        try {
            $sql = "SELECT COUNT(*) AS total_legalisir, ttd_berkas_path FROM legalisir GROUP BY ttd_berkas_path";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
