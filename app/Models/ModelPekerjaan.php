<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPekerjaan extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    // Admin
    public function get_total_pekerjaan()
    {
        try {
            $sql = "SELECT COUNT(*) AS total_pekerjaan FROM pekerjaan";
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
