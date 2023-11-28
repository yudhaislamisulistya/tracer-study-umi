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

    public function get_total_alumni()
    {
        try {
            $sql = "SELECT COUNT(*) AS total_alumni FROM alumni;";
            $query = $this->db_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_alumni_by_program_studi()
    {
        try {
            // ex TEKNIK INFROMATIKA 20, FARMASI 230, etc
            $sql = "SELECT program_studi.NAMA_PRODI, COUNT(*) AS jumlah_alumni FROM alumni INNER JOIN program_studi ON alumni.kode_prodi = program_studi.C_KODE_PRODI GROUP BY program_studi.NAMA_PRODI ORDER BY COUNT(*)";
            $query = $this->db_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_alumni_based_jumlah_lulusan(){
        try {
            $sql = "SELECT tahun_keluar AS tahun_lulus, COUNT(*) AS jumlah_lulusan FROM alumni WHERE tahun_keluar IS NOT NULL GROUP BY tahun_keluar ORDER BY tahun_keluar;";
            $query = $this->db_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_status_ip_kumulatif(){
        try {
            $sql = "SELECT CASE WHEN ip_kumulatif IS NULL OR ip_kumulatif = '' OR ip_kumulatif = 0 THEN 'Tidak terdata' WHEN ip_kumulatif < 2 THEN 'Kurang Cukup' WHEN ip_kumulatif BETWEEN 2 AND 2.75 THEN 'Cukup' WHEN ip_kumulatif BETWEEN 2.76 AND 3 THEN 'Memuaskan' WHEN ip_kumulatif BETWEEN 3.01 AND 3.50 THEN 'Sangat Memuaskan' WHEN ip_kumulatif >= 3.51 THEN 'Pujian (cumlaude)' END AS Status_IPK, COUNT(*) AS Jumlah FROM alumni GROUP BY Status_IPK ORDER BY CASE WHEN Status_IPK = 'Kurang Cukup' THEN 1 WHEN Status_IPK = 'Cukup' THEN 2 WHEN Status_IPK = 'Memuaskan' THEN 3 WHEN Status_IPK = 'Sangat Memuaskan' THEN 4 WHEN Status_IPK = 'Pujian (cumlaude)' THEN 5 ELSE 6 END;";
            $query = $this->db_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
