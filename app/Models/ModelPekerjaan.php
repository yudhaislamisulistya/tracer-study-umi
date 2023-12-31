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

    public function post_pekerjaan($data)
    {
        try {
            $query = $this->dbext_tracer->table('pekerjaan')->insert($data);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $th) {
            return false;
        }
    }

    public function delete_pekerjaan($hapusId)
    {
        try {
            $query = $this->dbext_tracer->table('pekerjaan')->delete(['id_pekerjaan' => $hapusId]);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $th) {
            return false;
        }
    }

    public function update_pekerjaan($data)
    {
        try {
            $query = $this->dbext_tracer->table('pekerjaan')->update($data, ['id_pekerjaan' => $data['id_pekerjaan']]);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $th) {
            return false;
        }
    }
}
