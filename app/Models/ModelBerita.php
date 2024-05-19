<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function get_berita_pagination($limit, $start, $search)
    {
        try {
            $kode_prodi = session()->get('id_prodi');
            if ($kode_prodi != null){
                $query = $this->dbext_tracer->table('berita')
                ->groupStart()
                    ->like('judul', '%' . $search . '%')
                    ->orLike('isi', '%' . $search . '%')
                ->groupEnd()
                ->where('berita.status', 'Published')
                ->where('berita.kode_prodi', $kode_prodi)
                ->orderBy('berita.id', 'DESC')
                ->limit($limit, $start)
                ->get();
            }else{
                $query = $this->dbext_tracer->table('berita')
                ->groupStart()
                    ->like('judul', '%' . $search . '%')
                    ->orLike('isi', '%' . $search . '%')
                ->groupEnd()
                ->where('berita.status', 'Published')
                ->orderBy('berita.id', 'DESC')
                ->limit($limit, $start)
                ->get();
            }

            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_all_berita_by_search($search)
    {
        try {
            $query = $this->dbext_tracer->table('berita')
                ->groupStart()
                    ->like('judul', '%' . $search . '%')
                    ->orLike('isi', '%' . $search . '%')
                ->groupEnd()
                ->where('berita.status', 'Published')
                ->orderBy('berita.id', 'DESC')
                ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_all_berita()
    {
        try {
            $query = $this->dbext_tracer->table('berita')
                ->where('berita.status', 'Published')
                ->orderBy('berita.id', 'DESC')
                ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_detail_berita($berita_hash)
    {
        try {
            $query = $this->dbext_tracer->table('berita')
                ->where('berita_hash', $berita_hash)
                ->get();

            return $query->getUnbufferedRow();
        } catch (\Exception $th) {
            return 0;
        }
    }
    
    // Admin
    public function get_total_berita()
    {
        try {
            $sql = "SELECT COUNT(*) AS total_berita FROM berita";
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function insert_data($data){
        try {
            $this->dbext_tracer->table('berita')->insert($data);
            return true;
        } catch (\Exception $th) {
            return false;
        }
    }

    public function update_data($data, $id){
        try {
            $this->dbext_tracer->table('berita')->update($data, ['id' => $id]);
            return true;
        } catch (\Exception $th) {
            return false;
        }
    }

    public function delete_data($id){
        try {
            $this->dbext_tracer->table('berita')->delete(['id' => $id]);
            return true;
        } catch (\Exception $th) {
            return false;
        }
    }

    public function get_detail_berita_by_id($id){
        try {
            $query = $this->dbext_tracer->table('berita')
                ->where('id', $id)
                ->get();

            return $query->getUnbufferedRow();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
