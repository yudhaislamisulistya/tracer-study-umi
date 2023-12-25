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

    public function get_kuesioner()
    {
        try {
            $data = $this->dbext_tracer->table('lulusan_satu')->get()->getResult();
            return $data;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_kuesioner_batch($offset, $limit)
    {
        try {
            $data = $this->dbext_tracer->table('lulusan_satu')
                ->limit($limit, $offset)
                ->get()->getResult();
            return $data;
        } catch (\Exception $th) {
            return 0;
        }
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

    public function insert_data($data)
    {
        try {
            $this->dbext_tracer->table('kuesioner')
                ->insert($data);
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function update_data($data)
    {
        try {
            $this->dbext_tracer->table('kuesioner')
                ->where('kuesioner_id', $data['kuesioner_id'])
                ->update($data);
            return 1;
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return 0;
        }
    }

    public function delete_data($id)
    {
        try {
            $this->dbext_tracer->table('kuesioner')
                ->where('kuesioner_id', $id)
                ->delete();
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_kuesioner_prodi_detail($id)
    {
        try {
            $data = $this->dbext_tracer->table('kuesioner')
                ->where('kuesioner_id', $id)
                ->get()->getRow();
            return $data;
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return 0;
        }
    }

    public function get_pertanyaan_by_kuesioner($id)
    {
        try {
            $data = $this->dbext_tracer->table('kuesioner_pertanyaan')
                ->where('kuesioner_id', $id)
                ->get()->getResult();
            return $data;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_pilihan_jawaban_by_pertanyaan($id)
    {
        try {
            $data = $this->dbext_tracer->table('kuesioner_pilihan_jawaban')
                ->where('pertanyaan_id', $id)
                ->get()->getResult();
            return $data;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function insert_question($data)
    {
        try {
            $query = $this->dbext_tracer->table('kuesioner_pertanyaan')
                ->where('teks_pertanyaan', $data['teks_pertanyaan'])
                ->where('kuesioner_id', $data['kuesioner_id'])
                ->get();

            if ($query->getRow()) {
                // Jika pertanyaan sudah ada, kembalikan ID-nya
                return $query->getRow()->id;
            } else {
                // Jika belum ada, masukkan pertanyaan baru
                $this->dbext_tracer->table('kuesioner_pertanyaan')->insert($data);
                return $this->dbext_tracer->insertID(); // Mengembalikan ID yang baru disimpan
            }
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function insert_option($data)
    {
        try {
            $query = $this->dbext_tracer->table('kuesioner_pilihan_jawaban')
                ->where('teks_pilihan', $data['teks_pilihan'])
                ->where('pertanyaan_id', $data['pertanyaan_id'])
                ->get();

            if (!$query->getRow()) {
                $this->dbext_tracer->table('kuesioner_pilihan_jawaban')->insert($data);
            }
            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    
}
