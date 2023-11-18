<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengguna extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function insert_survei_pengguna($data)
    {
        try {
            $this->dbext_tracer->table('pengguna_lulusan')
                ->insert($data);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }
}
