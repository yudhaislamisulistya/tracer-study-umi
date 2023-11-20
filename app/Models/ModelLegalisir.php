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
}
