<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKuesioner extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function update_biodata($data)
    {
        try {
            $nim = session()->get('C_NPM');
            $this->dbext_tracer->table('lulusan_satu')
                ->where('nimhsmsmh', $nim)
                ->update($data);
            return 1;
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return 0;
        }
    }

    public function insert_or_update_kuesioner()
    {
        try {
            $nim = session()->get('C_NPM');
            $data_lulusan_satu = [
                'nimhsmsmh' => $nim,
            ];
            $existingRecord = $this->dbext_tracer->table('lulusan_satu')
                ->where('nimhsmsmh', $nim)
                ->countAllResults();

            if ($existingRecord > 0) {
                $this->dbext_tracer->table('lulusan_satu')
                    ->where('nimhsmsmh', $nim)
                    ->update($data_lulusan_satu);
            } else {
                $this->dbext_tracer->table('lulusan_satu')
                    ->insert($data_lulusan_satu);
            }
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }
}
