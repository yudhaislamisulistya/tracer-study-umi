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

    public function get_total_alumni_by_kode_prodi()
    {
        try {
            $kode_prodi = session()->get('C_KODE_PRODI');
            if ($kode_prodi != null) {
                $sql = 'SELECT COUNT(*) AS jumlah_alumni FROM vwDetailMahasiswa WHERE kode_level = "ALUMNI" AND id_prodi = "' . $kode_prodi . '" GROUP BY nm_prodi';
            } else {
                $sql = "SELECT COUNT(*) AS jumlah_alumni FROM vwDetailMahasiswa WHERE kode_level = 'ALUMNI' GROUP BY nm_prodi";
            }
            $query = $this->db_alumni->query($sql);
            return $query->getRow();
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
    public function get_total_responden_by_program_studi($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                ps.NAMA_PRODI, 
                COUNT(ls.lulusan_id) AS total_lulusan, 
                (COUNT(ls.lulusan_id) / total.total_lulusan_all * 100) AS persentase 
            FROM 
                program_studi ps 
                LEFT JOIN lulusan_satu ls ON ps.C_KODE_PRODI = ls.kdpstmsmh 
                CROSS JOIN (SELECT COUNT(lulusan_id) AS total_lulusan_all FROM lulusan_satu";

            // Conditions array for the subquery
            $subquery_conditions = [];

            // Conditions array for the main query
            $conditions = [];

            // Add conditions based on provided parameters
            if ($tahun_lulus !== 'semua') {
                $conditions[] = "ls.tahun_lulus = '$tahun_lulus'";
                $subquery_conditions[] = "tahun_lulus = '$tahun_lulus'";
            }
            if ($program_studi !== 'semua') {
                $conditions[] = "ls.kdpstmsmh = '$program_studi'";
                $subquery_conditions[] = "kdpstmsmh = '$program_studi'";
            }

            // Add conditions to the subquery
            if (!empty($subquery_conditions)) {
                $sql .= " WHERE " . implode(" AND ", $subquery_conditions);
            }

            $sql .= ") total";

            // Add conditions to the main query
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            $sql .= " GROUP BY ps.NAMA_PRODI ORDER BY total_lulusan DESC, ps.NAMA_PRODI";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_total_responden($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            $sql = "SELECT COUNT(lulusan_id) AS total_responden FROM lulusan_satu";

            $conditions = [];

            if ($tahun_lulus !== 'semua') {
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
            }

            if ($program_studi !== 'semua') {
                $conditions[] = "kdpstmsmh = '$program_studi'";
            }

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            $sql .= ";";

            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_total_alumni_by_tahun_lulus($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            $sql = "SELECT COUNT(*) AS total_alumni FROM alumni";

            $conditions = [];

            if ($tahun_lulus !== 'semua') {
                $conditions[] = "tahun_keluar = '$tahun_lulus'";
            }

            if ($program_studi !== 'semua') {
                $conditions[] = "kode_prodi = '$program_studi'";
            }

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            $sql .= ";";

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
    public function get_alumni_v2($nameSearch = null, $nimSearch = null, $programStudiSearch = null, $jenisKeluarSearch = null, $tahunMasukSearch = null)
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

            // Check if session value exists and add condition
            $kodeProdi = session()->get('C_KODE_PRODI');
            if (!empty($kodeProdi)) {
                $conditions[] = "id_prodi = '" . $this->db_alumni->escapeString($kodeProdi) . "'";
            }

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

            // Check if session value exists and add condition
            $kodeProdi = session()->get('C_KODE_PRODI');
            if (!empty($kodeProdi)) {
                $conditions[] = "id_prodi = '" . $this->db_alumni->escapeString($kodeProdi) . "'";
            }

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

    public function get_total_alumni_by_tahun_masuk()
    {
        try {
            $sql = "SELECT thn_masuk, COUNT(*) AS jumlah_alumni FROM vwDetailMahasiswa WHERE kode_level = 'ALUMNI' GROUP BY thn_masuk ORDER BY thn_masuk";
            $query = $this->db_alumni->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_alumni_by_program_studi_new()
    {
        try {
            $sql = "SELECT nm_prodi, COUNT(*) AS jumlah_alumni FROM vwDetailMahasiswa WHERE kode_level = 'ALUMNI' GROUP BY nm_prodi ORDER BY jumlah_alumni DESC";
            $query = $this->db_alumni->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_alumni_by_jenjang_pendidikan()
    {
        try {
            $sql = "SELECT nm_jenjang_prodi, COUNT(*) AS jumlah_alumni FROM vwDetailMahasiswa WHERE kode_level = 'ALUMNI' GROUP BY nm_jenjang_prodi ORDER BY nm_jenjang_prodi";
            $query = $this->db_alumni->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_alumni_by_fakultas()
    {
        try {
            $sql = "SELECT nm_fakultas, COUNT(*) AS jumlah_alumni FROM vwDetailMahasiswa WHERE kode_level = 'ALUMNI' GROUP BY nm_fakultas ORDER BY jumlah_alumni DESC";
            $query = $this->db_alumni->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_alumni_by_jenis_kelamin()
    {
        try {
            $sql = "SELECT jns_kelamin, COUNT(*) AS jumlah_alumni FROM vwDetailMahasiswa WHERE kode_level = 'ALUMNI' GROUP BY jns_kelamin ORDER BY jns_kelamin";
            $query = $this->db_alumni->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    // // Admin Prodi
    // Get Data Daftar Perusahaan Pengguna Alumni by Kode Prodi
    public function get_perusahaan_alumni_prodi($kodeProdi)
    {
        try {
            $sql = "SELECT ROW_NUMBER() OVER (ORDER BY COUNT(*) DESC) AS no, CASE WHEN nama_perusahaan IS NULL OR nama_perusahaan = '' THEN 'Belum Terdata' ELSE nama_perusahaan END AS nama_perusahaan, COUNT(*) AS jumlah_alumni FROM ref_biodata WHERE kode_prodi = '" . $kodeProdi . "' GROUP BY CASE WHEN nama_perusahaan IS NULL OR nama_perusahaan = '' THEN 'Belum Terdata' ELSE nama_perusahaan END ORDER BY COUNT(*) DESC;";
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_status_pekerjaan_lulusan($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                COALESCE(status_pekerjaan, 'Belum Terdata') AS status_pekerjaan, 
                COUNT(*) AS total_lulusan 
            FROM lulusan_satu
        ";

            // Add WHERE conditions based on the provided parameters
            $conditions = [];

            if ($tahun_lulus !== 'semua' && $program_studi !== 'semua') {
                // Both parameters are provided and not 'semua', use AND
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
                $conditions[] = "kdpstmsmh = '$program_studi'";
                $sql .= " WHERE " . implode(" AND ", $conditions);
            } elseif ($tahun_lulus !== 'semua') {
                // Only tahun_lulus is provided and not 'semua'
                $sql .= " WHERE tahun_lulus = '$tahun_lulus'";
            } elseif ($program_studi !== 'semua') {
                // Only program_studi is provided and not 'semua'
                $sql .= " WHERE kdpstmsmh = '$program_studi'";
            }

            // Add GROUP BY and ORDER BY clauses
            $sql .= " GROUP BY status_pekerjaan ORDER BY status_pekerjaan";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_masa_tunggu_mendapatkan_pekerjaan($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                COALESCE(masa_tunggu, 'Belum mendapatkan pekerjaan') AS masa_tunggu,
                COUNT(*) AS total_lulusan
            FROM lulusan_satu
        ";

            // Add WHERE conditions based on the provided parameters
            $conditions = [];

            if ($tahun_lulus !== 'semua' && $program_studi !== 'semua') {
                // Both parameters are provided and not 'semua', use AND
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
                $conditions[] = "kdpstmsmh = '$program_studi'";
                $sql .= " WHERE " . implode(" AND ", $conditions);
            } elseif ($tahun_lulus !== 'semua') {
                // Only tahun_lulus is provided and not 'semua'
                $sql .= " WHERE tahun_lulus = '$tahun_lulus'";
            } elseif ($program_studi !== 'semua') {
                // Only program_studi is provided and not 'semua'
                $sql .= " WHERE kdpstmsmh = '$program_studi'";
            }

            // Add GROUP BY and ORDER BY clauses
            $sql .= " GROUP BY masa_tunggu ORDER BY masa_tunggu";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_total_jenis_pekerjaan_tempat_bekerja($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                COALESCE(jenis_perusahaan, 'Belum Terdata') AS jenis_perusahaan,
                COUNT(*) AS total_lulusan
            FROM lulusan_satu
        ";

            // Add WHERE conditions based on the provided parameters
            $conditions = [];

            if ($tahun_lulus !== 'semua' && $program_studi !== 'semua') {
                // Both parameters are provided and not 'semua', use AND
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
                $conditions[] = "kdpstmsmh = '$program_studi'";
                $sql .= " WHERE " . implode(" AND ", $conditions);
            } elseif ($tahun_lulus !== 'semua') {
                // Only tahun_lulus is provided and not 'semua'
                $sql .= " WHERE tahun_lulus = '$tahun_lulus'";
            } elseif ($program_studi !== 'semua') {
                // Only program_studi is provided and not 'semua'
                $sql .= " WHERE kdpstmsmh = '$program_studi'";
            }

            // Add GROUP BY and ORDER BY clauses
            $sql .= " GROUP BY jenis_perusahaan ORDER BY jenis_perusahaan";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_total_tingkat_tempat_bekerja($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                COALESCE(tingkat_kerja, 'Belum Terdata') AS tingkat_kerja,
                COUNT(*) AS total_lulusan
            FROM lulusan_satu
        ";

            // Add WHERE conditions based on the provided parameters
            $conditions = [];

            if ($tahun_lulus !== 'semua' && $program_studi !== 'semua') {
                // Both parameters are provided and not 'semua', use AND
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
                $conditions[] = "kdpstmsmh = '$program_studi'";
                $sql .= " WHERE " . implode(" AND ", $conditions);
            } elseif ($tahun_lulus !== 'semua') {
                // Only tahun_lulus is provided and not 'semua'
                $sql .= " WHERE tahun_lulus = '$tahun_lulus'";
            } elseif ($program_studi !== 'semua') {
                // Only program_studi is provided and not 'semua'
                $sql .= " WHERE kdpstmsmh = '$program_studi'";
            }

            // Add GROUP BY and ORDER BY clauses
            $sql .= " GROUP BY tingkat_kerja ORDER BY tingkat_kerja";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_total_rata_rata_pendapatan_per_bulan($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                COALESCE(pendapatan, 'Belum Terdata') AS pendapatan,
                COUNT(*) AS jumlah
            FROM lulusan_satu
        ";

            // Add WHERE conditions based on the provided parameters
            $conditions = [];

            if ($tahun_lulus !== 'semua' && $program_studi !== 'semua') {
                // Both parameters are provided and not 'semua', use AND
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
                $conditions[] = "kdpstmsmh = '$program_studi'";
                $sql .= " WHERE " . implode(" AND ", $conditions);
            } elseif ($tahun_lulus !== 'semua') {
                // Only tahun_lulus is provided and not 'semua'
                $sql .= " WHERE tahun_lulus = '$tahun_lulus'";
            } elseif ($program_studi !== 'semua') {
                // Only program_studi is provided and not 'semua'
                $sql .= " WHERE kdpstmsmh = '$program_studi'";
            }

            // Add GROUP BY and ORDER BY clauses
            $sql .= " GROUP BY pendapatan ORDER BY pendapatan";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaan($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT
                CASE 
                    WHEN bulan_tunggu_6 IS NULL THEN 'Belum mendapatkan pekerjaan'
                    WHEN bulan_tunggu_6 = 0 THEN '0 Bulan'
                    WHEN bulan_tunggu_6 = 1 THEN '1 Bulan'
                    WHEN bulan_tunggu_6 = 2 THEN '2 Bulan'
                    WHEN bulan_tunggu_6 = 3 THEN '3 Bulan'
                    WHEN bulan_tunggu_6 = 4 THEN '4 Bulan'
                    WHEN bulan_tunggu_6 = 5 THEN '5 Bulan'
                    WHEN bulan_tunggu_6 = 6 THEN '6 Bulan'
                    ELSE 'Other'
                END AS bulan_tunggu_6,
                COUNT(*) AS jumlah 
            FROM lulusan_satu 
        ";

            // Conditions array
            $conditions = [];

            // Add conditions based on provided parameters
            if ($tahun_lulus !== 'semua') {
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
            }
            if ($program_studi !== 'semua') {
                $conditions[] = "kdpstmsmh = '$program_studi'";
            }
            $conditions[] = "bulan_tunggu_6 IS NULL OR bulan_tunggu_6 <= 6";

            // Add conditions to SQL
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            // Group by and order by
            $sql .= " GROUP BY bulan_tunggu_6 ORDER BY bulan_tunggu_6";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function get_total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT
                CASE 
                    WHEN bulan_tunggu_6_plus IS NULL THEN 'Belum mendapatkan pekerjaan'
                    WHEN bulan_tunggu_6_plus = 0 THEN '6 Bulan'
                    WHEN bulan_tunggu_6_plus = 7 THEN '7 Bulan'
                    WHEN bulan_tunggu_6_plus = 8 THEN '8 Bulan'
                    WHEN bulan_tunggu_6_plus = 9 THEN '9 Bulan'
                    WHEN bulan_tunggu_6_plus = 10 THEN '10 Bulan'
                    WHEN bulan_tunggu_6_plus = 11 THEN '11 Bulan'
                    WHEN bulan_tunggu_6_plus = 12 THEN '12 Bulan'
                    ELSE 'Diatas 12 Bulan'
                END AS bulan_tunggu_6_plus,
                COUNT(*) AS jumlah 
            FROM lulusan_satu 
        ";

            // Conditions array
            $conditions = [];

            // Add conditions based on provided parameters
            if ($tahun_lulus !== 'semua') {
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
            }
            if ($program_studi !== 'semua') {
                $conditions[] = "kdpstmsmh = '$program_studi'";
            }
            $conditions[] = "bulan_tunggu_6_plus IS NULL OR bulan_tunggu_6_plus >= 6";

            // Add conditions to SQL
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            // Group by and order by
            $sql .= " GROUP BY bulan_tunggu_6_plus ORDER BY bulan_tunggu_6_plus";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }



    public function get_total_hubungan_bidang_studi_dan_pekerjaan($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                COALESCE(hubungan_bidang_studi, 'Belum Terdata') AS hubungan_bidang_studi,
                COUNT(*) AS jumlah
            FROM lulusan_satu
        ";

            // Conditions array
            $conditions = [];

            // Add conditions based on provided parameters
            if ($tahun_lulus !== 'semua') {
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
            }
            if ($program_studi !== 'semua') {
                $conditions[] = "kdpstmsmh = '$program_studi'";
            }

            // Add conditions to SQL
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            // Add GROUP BY and ORDER BY clauses
            $sql .= " GROUP BY hubungan_bidang_studi ORDER BY hubungan_bidang_studi";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_total_tingkat_pendidikan_dan_pekerjaan($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                COALESCE(kesesuaian_pendidikan, 'Belum Terdata') AS kesesuaian_pendidikan,
                COUNT(*) AS jumlah
            FROM lulusan_satu
        ";

            // Conditions array
            $conditions = [];

            // Add conditions based on provided parameters
            if ($tahun_lulus !== 'semua') {
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
            }
            if ($program_studi !== 'semua') {
                $conditions[] = "kdpstmsmh = '$program_studi'";
            }

            // Add conditions to SQL
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            // Add GROUP BY and ORDER BY clauses
            $sql .= " GROUP BY kesesuaian_pendidikan ORDER BY kesesuaian_pendidikan";

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getResult();
        } catch (\Exception $th) {
            return 0;
        }
    }


    public function get_total_kemampuan_lulusan($tahun_lulus = 'semua', $program_studi = 'semua')
    {
        try {
            // Base SQL
            $sql = "
            SELECT 
                SUM(etika_a) AS etika_a,
                SUM(etika_b) AS etika_b,
                SUM(keahlian_a) AS keahlian_a,
                SUM(keahlian_b) AS keahlian_b,
                SUM(bahasa_asing_a) AS bahasa_asing_a,
                SUM(bahasa_asing_b) AS bahasa_asing_b,
                SUM(teknologi_a) AS teknologi_a,
                SUM(teknologi_b) AS teknologi_b,
                SUM(komunikasi_a) AS komunikasi_a,
                SUM(komunikasi_b) AS komunikasi_b,
                SUM(kerjasama_a) AS kerjasama_a,
                SUM(kerjasama_b) AS kerjasama_b,
                SUM(pengembangan_diri_a) AS pengembangan_diri_a,
                SUM(pengembangan_diri_b) AS pengembangan_diri_b,
                SUM(kepemimpinan_a) AS kepemimpinan_a,
                SUM(kepemimpinan_b) AS kepemimpinan_b
            FROM lulusan_satu
        ";

            // Conditions array
            $conditions = [];

            // Add conditions based on provided parameters
            if ($tahun_lulus !== 'semua') {
                $conditions[] = "tahun_lulus = '$tahun_lulus'";
            }
            if ($program_studi !== 'semua') {
                $conditions[] = "kdpstmsmh = '$program_studi'";
            }

            // Add conditions to SQL
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            // Execute query
            $query = $this->dbext_tracer->query($sql);
            return $query->getRow();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
