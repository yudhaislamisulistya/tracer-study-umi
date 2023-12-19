<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJenisKeluar extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }
    public function post_jenis_keluar($data)
    {
        try {
            $query = $this->db_tracer->table('jenis_keluar')->insert($data);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $th) {
            return false;
        }
    }

    public function delete_jenis_keluar($hapusId)
    {
        try {
            $query = $this->db_tracer->table('jenis_keluar')->delete(['id_jns_keluar' => $hapusId]);
            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $th) {
            return false;
        }
    }

    public function update_jenis_keluar($data)
    {
        try {
            $query = $this->db_tracer->table('jenis_keluar')->update($data, ['id_jns_keluar' => $data['id_jns_keluar']]);
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
