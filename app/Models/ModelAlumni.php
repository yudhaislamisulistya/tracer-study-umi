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
                ->like('nama', '%' . $nameSearch . '%')
                ->like('nim', '%' . $nimSearch . '%')
                ->like('kode_prodi', '%' . $programStudiSearch . '%')
                ->like('jenis_keluar', '%' . $jenisKeluarSearch . '%')
                ->like('tanggal_keluar', '%' . $tanggalKeluarSearch . '%')
                ->like('tahun_masuk', '%' . $tahunMasukSearch . '%')
                ->like('tahun_keluar', '%' . $tahunKeluar . '%')
                ->like('semester_keluar', '%' . $semesterKeluar . '%')
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
                ->like('nama', '%' . $nameSearch . '%')
                ->like('nim', '%' . $nimSearch . '%')
                ->like('kode_prodi', '%' . $programStudiSearch . '%')
                ->like('jenis_keluar', '%' . $jenisKeluarSearch . '%')
                ->like('tanggal_keluar', '%' . $tanggalKeluarSearch . '%')
                ->like('tahun_masuk', '%' . $tahunMasukSearch . '%')
                ->like('tahun_keluar', '%' . $tahunKeluar . '%')
                ->like('semester_keluar', '%' . $semesterKeluar . '%')
                // ->orLike('program_studi.nama_prodi', '%'.$nameSearch.'%')
                ->groupEnd()
                ->orderBy('alumni.id', 'DESC')
                ->get();
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    // Admin
    public function get_perusahaan_alumni()
    {
        try {
            $sql = "SELECT ROW_NUMBER() OVER (ORDER BY COUNT(*) DESC) AS no, CASE WHEN nama_perusahaan IS NULL OR nama_perusahaan = '' THEN 'Belum Terdata' ELSE nama_perusahaan END AS nama_perusahaan, COUNT(*) AS jumlah_alumni FROM ref_biodata GROUP BY CASE WHEN nama_perusahaan IS NULL OR nama_perusahaan = '' THEN 'Belum Terdata' ELSE nama_perusahaan END ORDER BY COUNT(*) DESC;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
