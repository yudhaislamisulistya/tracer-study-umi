<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPortalAlumni extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function get_alumni_pagination($limit, $start, $search)
    {
        try {
            $query = $this->db_tracer->table('alumni')
                ->select('alumni.nama, alumni.tahun_keluar, program_studi.NAMA_PRODI')
                ->join('program_studi', 'alumni.kode_prodi = program_studi.C_KODE_PRODI')
                ->groupStart()
                    ->like('nama', '%' . $search . '%')
                    ->orLike('program_studi.nama_prodi', '%' . $search . '%')
                ->groupEnd()
                ->orderBy('alumni.id', 'DESC')
                ->limit($limit, $start)
                ->get();

            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_all_alumni_by_search($search)
    {
        try {
            $query = $this->db_tracer->table('alumni')
                ->select('alumni.nama, alumni.tahun_keluar, program_studi.NAMA_PRODI')
                ->join('program_studi', 'alumni.kode_prodi = program_studi.C_KODE_PRODI')
                ->groupStart()
                    ->like('nama', '%' . $search . '%')
                    ->orLike('program_studi.nama_prodi', '%' . $search . '%')
                ->groupEnd()
                ->orderBy('alumni.id', 'DESC')
                ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
