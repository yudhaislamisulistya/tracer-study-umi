<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRegistrasi extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function get_registrasi_pagination($limit, $offset, $nameSearch, $nimSearch)
    {
        try {
            $query = $this->dbext_tracer->table('ref_registrasi')
                        ->groupStart()
                            ->like('nama', '%'.$nameSearch.'%')
                            ->like('nim', '%'.$nimSearch.'%')
                            // ->like('program_studi', '%'.$programStudiSearch.'%')
                            // ->like('tahun_masuk', '%'.$tahunMasukSearch.'%')
                            // ->like('tahun_keluar', '%'.$tahunKeluarSearch.'%')
                            // ->orLike('program_studi.nama_prodi', '%'.$nameSearch.'%')
                        ->groupEnd()
                        ->limit($limit, $offset)
                        ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_registrasi($nameSearch, $nimSearch)
    {
        try {
            $query = $this->dbext_tracer->table('ref_registrasi')
                        ->groupStart()
                            ->like('nama', '%'.$nameSearch.'%')
                            ->like('nim', '%'.$nimSearch.'%')
                            // ->like('program_studi', '%'.$programStudiSearch.'%')
                            // ->like('tahun_masuk', '%'.$tahunMasukSearch.'%')
                            // ->like('tahun_keluar', '%'.$tahunKeluarSearch.'%')
                            // ->orLike('program_studi.nama_prodi', '%'.$nameSearch.'%')
                        ->groupEnd()
                        ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
