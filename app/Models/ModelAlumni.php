<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAlumni extends Model
{
    private $db_tracer;
    private $dbext_tracer;
    private $db_alumni;

    public function __construct()
    {
        $this->db_tracer = db_connect("acc_tracer");
        $this->dbext_tracer = db_connect("accext_tracer");
        $this->db_alumni = db_connect("db_alumni");
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

    public function get_total_alumni_based_jumlah_lulusan()
    {
        try {
            $sql = "SELECT tahun_keluar AS tahun_lulus, COUNT(*) AS jumlah_lulusan FROM alumni WHERE tahun_keluar IS NOT NULL GROUP BY tahun_keluar ORDER BY tahun_keluar;";
            $query = $this->db_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_status_ip_kumulatif()
    {
        try {
            $sql = "SELECT CASE WHEN ip_kumulatif IS NULL OR ip_kumulatif = '' OR ip_kumulatif = 0 THEN 'Tidak terdata' WHEN ip_kumulatif < 2 THEN 'Kurang Cukup' WHEN ip_kumulatif BETWEEN 2 AND 2.75 THEN 'Cukup' WHEN ip_kumulatif BETWEEN 2.76 AND 3 THEN 'Memuaskan' WHEN ip_kumulatif BETWEEN 3.01 AND 3.50 THEN 'Sangat Memuaskan' WHEN ip_kumulatif >= 3.51 THEN 'Pujian (cumlaude)' END AS Status_IPK, COUNT(*) AS Jumlah FROM alumni GROUP BY Status_IPK ORDER BY CASE WHEN Status_IPK = 'Kurang Cukup' THEN 1 WHEN Status_IPK = 'Cukup' THEN 2 WHEN Status_IPK = 'Memuaskan' THEN 3 WHEN Status_IPK = 'Sangat Memuaskan' THEN 4 WHEN Status_IPK = 'Pujian (cumlaude)' THEN 5 ELSE 6 END;";
            $query = $this->db_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    // Kuesioner
    public function get_total_responden_by_program_studi()
    {
        try {
            $sql = "SELECT ps.NAMA_PRODI, COUNT(ls.lulusan_id) AS total_lulusan, (COUNT(ls.lulusan_id) / total.total_lulusan_all * 100) AS persentase FROM program_studi ps LEFT JOIN lulusan_satu ls ON ps.C_KODE_PRODI = ls.kdpstmsmh CROSS JOIN (SELECT COUNT(lulusan_id) AS total_lulusan_all FROM lulusan_satu) total GROUP BY ps.NAMA_PRODI ORDER BY total_lulusan DESC, ps.NAMA_PRODI";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_responden()
    {
        try {
            $sql = "SELECT COUNT(lulusan_id) AS total_responden FROM lulusan_satu;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_alumni_by_tahun_lulus($tahun_lulus)
    {
        try {
            $sql = "SELECT COUNT(*) AS total_alumni FROM alumni WHERE tahun_keluar = '$tahun_lulus';";
            $query = $this->db_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_responden_by_aktivitas_lulusan()
    {
        try {
            $sql = "SELECT ps.C_KODE_PRODI, ps.NAMA_PRODI, status.status_pekerjaan, COALESCE(COUNT(ls.lulusan_id), 0) AS total_lulusan FROM (SELECT '1' AS f8, 'Ya' AS status_pekerjaan UNION ALL SELECT '2', 'Belum Memungkinan Bekerja' UNION ALL SELECT '3', 'Wiraswasta' UNION ALL SELECT '4', 'Melanjutkan Pendidikan' UNION ALL SELECT '5', 'Tidak Kerja Tetapi Sedang Mencari Kerja') status CROSS JOIN program_studi ps LEFT JOIN lulusan_satu ls ON ps.C_KODE_PRODI = ls.kdpstmsmh AND status.f8 = ls.f8 GROUP BY ps.C_KODE_PRODI, ps.NAMA_PRODI, status.status_pekerjaan ORDER BY ps.C_KODE_PRODI, ps.NAMA_PRODI, status.f8;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_responden_by_sebaran_masa_tunggu()
    {
        try {
            $sql = "SELECT ps.C_KODE_PRODI, ps.NAMA_PRODI, COALESCE(bulan.Bulan_Setelah_Lulus, '>12') AS Bulan_Setelah_Lulus, COALESCE(ls.total, 0) AS total FROM (SELECT '0' AS Bulan_Setelah_Lulus UNION SELECT '1' UNION SELECT '2' UNION SELECT '3' UNION SELECT '4' UNION SELECT '5' UNION SELECT '6' UNION SELECT '7' UNION SELECT '8' UNION SELECT '9' UNION SELECT '10' UNION SELECT '11' UNION SELECT '12' UNION SELECT '>12') AS bulan CROSS JOIN program_studi ps LEFT JOIN (SELECT kdpstmsmh, CASE WHEN total_months <= 12 THEN CAST(total_months AS CHAR) WHEN total_months > 12 THEN '>12' END AS Bulan_Setelah_Lulus, COUNT(*) AS total FROM (SELECT kdpstmsmh, COALESCE(CAST(f502 AS UNSIGNED), 0) + COALESCE(CAST(f506 AS UNSIGNED), 0) AS total_months FROM lulusan_satu WHERE (f502 REGEXP '^[0-9]+$' OR f502 IS NULL OR f502 = '') AND (f506 REGEXP '^[0-9]+$' OR f506 IS NULL OR f506 = '') ) AS months GROUP BY kdpstmsmh, Bulan_Setelah_Lulus ) AS ls ON ps.C_KODE_PRODI = ls.kdpstmsmh AND bulan.Bulan_Setelah_Lulus = ls.Bulan_Setelah_Lulus GROUP BY ps.NAMA_PRODI, bulan.Bulan_Setelah_Lulus ORDER BY ps.NAMA_PRODI, CASE WHEN bulan.Bulan_Setelah_Lulus = '>12' THEN 13 ELSE CAST(bulan.Bulan_Setelah_Lulus AS UNSIGNED) END;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_responden_by_jenis_institusi()
    {
        try {
            $sql = "SELECT CASE WHEN f1101 = 1 THEN 'Instansi pemerintah' WHEN f1101 = 6 THEN 'BUMN/BUMD' WHEN f1101 = 7 THEN 'Institusi/Organisasi Multilateral' WHEN f1101 = 2 THEN 'Organisasi non-profit/Lembaga Swadaya Masyarakat' WHEN f1101 = 3 THEN 'Perusahaan swasta' WHEN f1101 = 4 THEN 'Wiraswasta/perusahaan sendiri' WHEN f1101 = 5 THEN 'Lainnya, tuliskan:' ELSE 'Tidak terdata' END AS Status, COUNT(DISTINCT lulusan_id) AS Jumlah, CASE WHEN f1101 IN (1, 2, 3, 4, 5, 6, 7) THEN f1101 ELSE 8 END AS OrderColumn FROM lulusan_satu GROUP BY Status, OrderColumn ORDER BY OrderColumn;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_responden_by_tingkat_kerja()
    {
        try {
            $sql = "SELECT CASE WHEN f5d = 1 THEN 'Eselon 1 - Karyawan Staff' WHEN f5d = 2 THEN 'Eselon 2 - Karyawan Staff' WHEN f5d = 3 THEN 'Eselon 3 - Karyawan Staff' ELSE 'Tidak Terdata' END AS StatusEselon, COUNT(DISTINCT lulusan_id) AS Jumlah FROM lulusan_satu GROUP BY StatusEselon ORDER BY CASE WHEN f5d IN (1, 2, 3) THEN f5d ELSE 4 END;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_responden_cek_penghasilan()
    {
        try {
            $sql = "SELECT CASE WHEN f505 > 3400000 THEN 'Penghasilan lebih dari 3,4 UMP' WHEN f505 = 3400000 THEN 'Penghasilan sama dengan 3,4 UMP' WHEN f505 < 3400000 THEN 'Penghasilan kurang dari 3,4 UMP' ELSE 'Tidak Terdata' END AS KategoriPenghasilan, COUNT(DISTINCT lulusan_id) AS Jumlah FROM lulusan_satu GROUP BY KategoriPenghasilan ORDER BY CASE WHEN f505 > 3400000 THEN 1 WHEN f505 = 3400000 THEN 2 WHEN f505 < 3400000 THEN 3 ELSE 4 END;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_responden_tingkat_pendidikan()
    {
        try {
            $sql = "SELECT CASE WHEN f15 = 1 THEN 'Setingkat Lebih Tinggi' WHEN f15 = 2 THEN 'Tingkat yang Sama' WHEN f15 = 3 THEN 'Setingkat Lebih Rendah' WHEN f15 = 4 THEN 'Tidak Perlu Pendidikan Tinggi' ELSE 'Tidak Terdata' END AS TingkatPendidikan, COUNT(DISTINCT lulusan_id) AS Jumlah FROM lulusan_satu GROUP BY TingkatPendidikan ORDER BY CASE WHEN f15 = 1 THEN 1 WHEN f15 = 2 THEN 2 WHEN f15 = 3 THEN 3 WHEN f15 = 4 THEN 4 ELSE 5 END;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_responden_hubungan_studi()
    {
        try {
            $sql = "SELECT CASE WHEN f14 = 1 THEN 'Sangat Erat' WHEN f14 = 2 THEN 'Erat' WHEN f14 = 3 THEN 'Cukup Erat' WHEN f14 = 4 THEN 'Kurang Erat' WHEN f14 = 5 THEN 'Tidak Sama Sekali' ELSE 'Tidak Terdata' END AS HubunganKerja, COUNT(DISTINCT lulusan_id) AS Jumlah FROM lulusan_satu GROUP BY HubunganKerja ORDER BY CASE WHEN f14 = 1 THEN 1 WHEN f14 = 2 THEN 2 WHEN f14 = 3 THEN 3 WHEN f14 = 4 THEN 4 WHEN f14 = 5 THEN 5 ELSE 6 END;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    // Get Alumni v2
    // SELECT * FROM db_simpeg.vwDetailMahasiswa WHERE kode_level = 'Alumni' LIMIT 50;
        public function get_alumni_v2($nameSearch, $nimSearch, $programStudiSearch, $jenisKeluarSearch, $tahunMasukSearch)
    {
        try {
            $conditions = []; // Array untuk menyimpan kondisi pencarian

            if (!empty($nameSearch)) {
                $conditions[] = "nama LIKE '%" . $this->db_alumni->escapeLikeString($nameSearch) . "%'";
            }

            if (!empty($nimSearch)) {
                $conditions[] = "stambuk LIKE '%" . $this->db_alumni->escapeLikeString($nimSearch) . "%'";
            }

            if (!empty($programStudiSearch)) {
                $conditions[] = "id_prodi LIKE '%" . $this->db_alumni->escapeLikeString($programStudiSearch) . "%'";
            }

            if (!empty($jenisKeluarSearch)) {
                $conditions[] = "ket_sts LIKE '%" . $this->db_alumni->escapeLikeString($jenisKeluarSearch) . "%'";
            }

            if (!empty($tahunMasukSearch)) {
                $conditions[] = "thn_masuk LIKE '%" . $this->db_alumni->escapeLikeString($tahunMasukSearch) . "%'";
            }

            $conditions[] = "kode_level = 'ALUMNI'";

            $sql = "SELECT * FROM vwDetailMahasiswa";

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(' AND ', $conditions);
            }
            $sql .= " AND kode_level = 'ALUMNI'";
            $query = $this->db_alumni->query($sql);

            $count = $query->getNumRows();

            return $count;
        } catch (\Exception $th) {
            return 0;
        }
    }
    // End Alumni v2
    public function get_alumni_v2_pagination($limit, $offset, $nameSearch, $nimSearch, $programStudiSearch, $jenisKeluarSearch, $tahunMasukSearch)
    {
        try {
            $conditions = []; // Array untuk menyimpan kondisi pencarian

            if (!empty($nameSearch)) {
                $conditions[] = "nama LIKE '%" . $this->db_alumni->escapeLikeString($nameSearch) . "%'";
            }
            if (!empty($nimSearch)) {
                $conditions[] = "stambuk LIKE '%" . $this->db_alumni->escapeLikeString($nimSearch) . "%'";
            }
            if (!empty($programStudiSearch)) {
                $conditions[] = "id_prodi LIKE '%" . $this->db_alumni->escapeLikeString($programStudiSearch) . "%'";
            }
            if (!empty($jenisKeluarSearch)) {
                $conditions[] = "ket_sts LIKE '%" . $this->db_alumni->escapeLikeString($jenisKeluarSearch) . "%'";
            }
            if (!empty($tahunMasukSearch)) {
                $conditions[] = "thn_masuk LIKE '%" . $this->db_alumni->escapeLikeString($tahunMasukSearch) . "%'";
            }

            $conditions[] = "kode_level = 'ALUMNI'";

            $sql = "SELECT * FROM vwDetailMahasiswa";

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(' AND ', $conditions);
            }

            $sql .= " LIMIT " . $limit . " OFFSET " . $offset;

            $query = $this->db_alumni->query($sql);

            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
