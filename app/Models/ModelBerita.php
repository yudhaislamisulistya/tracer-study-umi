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
            $query = $this->dbext_tracer->table('berita')
                ->groupStart()
                    ->like('judul', '%' . $search . '%')
                    ->orLike('isi', '%' . $search . '%')
                ->groupEnd()
                ->where('berita.status', 'Published')
                ->orderBy('berita.id', 'DESC')
                ->limit($limit, $start)
                ->get();

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
}
