<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStatusPekerjaan extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    // Admin
    public function post_status_pekerjaan($data)
    {
        try {
            $query = $this->dbext_tracer->table('status_pekerjaan')->insert($data);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $th) {
            return false;
        }
    }

    public function delete_status_pekerjaan($hapusId)
    {
        try {
            $query = $this->dbext_tracer->table('status_pekerjaan')->delete(['id_job' => $hapusId]);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $th) {
            return false;
        }
    }

    public function update_status_pekerjaan($data){
        try {
            $query = $this->dbext_tracer->table('status_pekerjaan')->update($data, ['id_job' => $data['id_job']]);
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
