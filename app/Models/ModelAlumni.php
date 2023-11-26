<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAlumni extends Model
{
    private $db_tracer;
    private $dbext_tracer;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
    }

    public function get_alumni_pagination($limit, $offset, $nameSearch, $nimSearch, $programStudiSearch, $jenisKeluarSearch, $tanggalKeluarSearch, $tahunMasukSearch, $tahunKeluar, $semesterKeluar)
    {
        try {
            $query = $this->db_tracer->table('alumni')
                        ->select('alumni.*, program_studi.NAMA_PRODI')
                        ->join('program_studi', 'alumni.kode_prodi = program_studi.C_KODE_PRODI')
                        ->groupStart()
                            ->like('nama', '%'.$nameSearch.'%')
                            ->like('nim', '%'.$nimSearch.'%')
                            ->like('kode_prodi', '%'.$programStudiSearch.'%')
                            ->like('jenis_keluar', '%'.$jenisKeluarSearch.'%')
                            ->like('tanggal_keluar', '%'.$tanggalKeluarSearch.'%')
                            ->like('tahun_masuk', '%'.$tahunMasukSearch.'%')
                            ->like('tahun_keluar', '%'.$tahunKeluar.'%')
                            ->like('semester_keluar', '%'.$semesterKeluar.'%')
                            // ->orLike('program_studi.nama_prodi', '%'.$nameSearch.'%')
                        ->groupEnd()
                        ->orderBy('alumni.id', 'DESC')
                        ->limit($limit, $offset)
                        ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_alumni($nameSearch, $nimSearch, $programStudiSearch, $jenisKeluarSearch, $tanggalKeluarSearch, $tahunMasukSearch, $tahunKeluar, $semesterKeluar)
    {
        try {
            $query = $this->db_tracer->table('alumni')
                        ->select('alumni.*, program_studi.NAMA_PRODI')
                        ->join('program_studi', 'alumni.kode_prodi = program_studi.C_KODE_PRODI')
                        ->groupStart()
                            ->like('nama', '%'.$nameSearch.'%')
                            ->like('nim', '%'.$nimSearch.'%')
                            ->like('kode_prodi', '%'.$programStudiSearch.'%')
                            ->like('jenis_keluar', '%'.$jenisKeluarSearch.'%')
                            ->like('tanggal_keluar', '%'.$tanggalKeluarSearch.'%')
                            ->like('tahun_masuk', '%'.$tahunMasukSearch.'%')
                            ->like('tahun_keluar', '%'.$tahunKeluar.'%')
                            ->like('semester_keluar', '%'.$semesterKeluar.'%')
                            // ->orLike('program_studi.nama_prodi', '%'.$nameSearch.'%')
                        ->groupEnd()
                        ->orderBy('alumni.id', 'DESC')
                        ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
