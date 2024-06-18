<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAlumni;
use App\Models\ModelBerita;
use App\Models\ModelBiodata;
use App\Models\ModelLegalisir;
use App\Models\ModelLowonganPekerjaan;
use App\Models\ModelOtentikasi;
use App\Models\ModelPekerjaan;
use App\Models\ModelPengguna;
use App\Models\ModelProgramStudi;

class MainController extends BaseController
{
    public $ModelOtentikasi;
    public $ModelPengguna;
    public $ModelAlumni;
    public $ModelProgramStudi;
    public $ModelBiodata;
    public $ModelBerita;
    public $ModelLowonganPekerjaan;
    public $ModelLegalisir;
    public $ModelPekerjaan;
    public function __construct()
    {
        $this->ModelOtentikasi = new ModelOtentikasi();
        $this->ModelPengguna = new ModelPengguna();
        $this->ModelAlumni = new ModelAlumni();
        $this->ModelProgramStudi = new ModelProgramStudi();
        $this->ModelBiodata = new ModelBiodata();
        $this->ModelBerita = new ModelBerita();
        $this->ModelLowonganPekerjaan = new ModelLowonganPekerjaan();
        $this->ModelLegalisir = new ModelLegalisir();
        $this->ModelPekerjaan = new ModelPekerjaan();
    }
    public function index()
    {
        $biodataController = new BiodataController();
        $data = $biodataController->get_current_user();
        $data = $data["response"];

        if ($data == null) {
            return redirect()->to(base_url('/logout-v2'));
        }

        session()->set('C_STAMBUK', $data["personal"]["stambuk"]);
        session()->set('C_NAMA', $data["personal"]["nama"]);
        session()->set('C_EMAIL', $data["personal"]["email"]);
        session()->set('C_JENIS_KELAMIN', $data["personal"]["jns_kelamin"]);
        session()->set('ID_PRODI', $data["id_prodi"]);
        session()->set('NAMA_PRODI', $data["nm_prodi"]);

        return view('dashboard', compact('data'));
    }

    public function biodata()
    {
        $data = $this->ModelBiodata->get_single_biodata(session()->get('C_NPM'));
        return view('biodata', compact('data'));
    }

    public function get_regencies($code)
    {
        $results = $this->ModelOtentikasi->regencies_with_code($code);
        return $this->response->setJSON($results);
    }

    public function get_pengguna()
    {
        return view('pengguna');
    }

    public function get_pengguna_non_kesehatan()
    {
        return view('pengguna-non-kesehatan');
    }

    public function get_pengguna_kesehatan()
    {
        return view('pengguna-kesehatan');
    }

    public function post_pengguna_non_kesehatan()
    {
        $data = array(
            'jenis_pengguna_lulusan' => $this->request->getPost('jenis_pengguna_lulusan'),
            'nama_penilai' => $this->request->getPost('nama_penilai'),
            'penilai_jen_kel' => $this->request->getPost('penilai_jen_kel'),
            'penilai_nik_nip' => $this->request->getPost('penilai_nik_nip'),
            'penilai_jabatan' => $this->request->getPost('penilai_jabatan'),
            'penilai_no_phone' => $this->request->getPost('penilai_no_phone'),
            'penilai_email' => $this->request->getPost('penilai_email'),
            'penilai_nama_kantor' => $this->request->getPost('penilai_nama_kantor'),
            'penilai_nama_pimpinan' => $this->request->getPost('penilai_nama_pimpinan'),
            'penilai_alamat_kantor' => $this->request->getPost('penilai_alamat_kantor'),
            'alumni_nama' => $this->request->getPost('alumni_nama'),
            'alumni_jen_kel' => $this->request->getPost('alumni_jen_kel'),
            'alumni_thn_kerja' => $this->request->getPost('alumni_thn_kerja'),
            'alumni_jabatan' => $this->request->getPost('alumni_jabatan'),
            'alumni_tugas_utama' => $this->request->getPost('alumni_tugas_utama'),
            'alumni_gaji_pertama' => $this->request->getPost('alumni_gaji_pertama'),
            'alumni_gaji' => $this->request->getPost('alumni_gaji'),
            'alumni_honor' => $this->request->getPost('alumni_honor'),
            'kepribadian' => $this->request->getPost('kepribadian'),
            'prestasi' => $this->request->getPost('prestasi'),
            'integritas' => $this->request->getPost('integritas'),
            'keahlian' => $this->request->getPost('keahlian'),
            'bahasa' => $this->request->getPost('bahasa'),
            'penggunaan_ti' => $this->request->getPost('penggunaan_ti'),
            'komunikasi' => $this->request->getPost('komunikasi'),
            'kerjasama' => $this->request->getPost('kerjasama'),
            'pengembangan_diri' => $this->request->getPost('pengembangan_diri'),
            'kejujuran' => $this->request->getPost('kejujuran'),
            'tanggung_jawab' => $this->request->getPost('tanggung_jawab'),
            'prakarsa' => $this->request->getPost('prakarsa'),
            'penilaian_all' => $this->request->getPost('penilaian_all'),
            'kritik_saran' => $this->request->getPost('kritik_saran'),
            'harapan' => $this->request->getPost('harapan'),
            'keabsahan' => $this->request->getPost('keabsahan'),
            'form_status' => '1',
            'form_validasi' => '2',
            'status_at' => date('Y-m-d H:i:s')
        );
        if ($this->ModelPengguna->insert_survei_pengguna($data)) {
            session()->setFlashdata('status', 'berhasil');
            return redirect()->to(base_url('pengguna-non-kesehatan'));
        } else {
            session()->setFlashdata('status', 'gagal');
            return redirect()->to(base_url('pengguna-non-kesehatan'));
        }
    }
    public function post_pengguna_kesehatan()
    {
        $data = array(
            'jenis_pengguna_lulusan' => $this->request->getPost('status'),
            'nama_penilai' => $this->request->getPost('nama_penilai'),
            'penilai_jen_kel' => $this->request->getPost('penilai_jen_kel'),
            'penilai_nik_nip' => $this->request->getPost('penilai_nik_nip'),
            'penilai_jabatan' => $this->request->getPost('penilai_jabatan'),
            'penilai_no_phone' => $this->request->getPost('penilai_no_phone'),
            'penilai_email' => $this->request->getPost('penilai_email'),
            'penilai_nama_kantor' => $this->request->getPost('penilai_nama_kantor'),
            'penilai_nama_pimpinan' => $this->request->getPost('penilai_nama_pimpinan'),
            'penilai_alamat_kantor' => $this->request->getPost('penilai_alamat_kantor'),
            'alumni_nama' => $this->request->getPost('alumni_nama'),
            'alumni_jen_kel' => $this->request->getPost('alumni_jen_kel'),
            'alumni_thn_kerja' => $this->request->getPost('alumni_thn_kerja'),
            'alumni_jabatan' => $this->request->getPost('alumni_jabatan'),
            'alumni_tugas_utama' => $this->request->getPost('alumni_tugas_utama'),
            'alumni_gaji_pertama' => $this->request->getPost('alumni_gaji_pertama'),
            'alumni_gaji' => $this->request->getPost('alumni_gaji'),
            'alumni_honor' => $this->request->getPost('alumni_honor'),
            'integritas' => $this->request->getPost('integritas'),
            'keahlian' => $this->request->getPost('keahlian'),
            'bahasa' => $this->request->getPost('bahasa'),
            'penggunaan_ti' => $this->request->getPost('penggunaan_ti'),
            'komunikasi' => $this->request->getPost('komunikasi'),
            'kerjasama' => $this->request->getPost('kerjasama'),
            'pengembangan_diri' => $this->request->getPost('pengembangan_diri'),
            'kejujuran' => $this->request->getPost('kejujuran'),
            'penilaian_all' => $this->request->getPost('penilaian_all'),
            'kritik_saran' => $this->request->getPost('kritik_saran'),
            'harapan' => $this->request->getPost('harapan'),
            'keabsahan' => $this->request->getPost('keabsahan'),
            'form_status' => '1',
            'form_validasi' => '2',
            'status_at' => date('Y-m-d H:i:s')
        );
        if ($this->ModelPengguna->insert_survei_pengguna($data)) {
            session()->setFlashdata('status', 'berhasil');
            return redirect()->to(base_url('pengguna-kesehatan'));
        } else {
            session()->setFlashdata('status', 'gagal');
            return redirect()->to(base_url('pengguna-kesehatan'));
        }
    }

    // Admin
    function admin_dashboard()
    {
        $data['total_alumni'] = 56744;
        $data['total_program_studi'] = $this->ModelProgramStudi->get_total_program_studi()->total_program_studi;
        $data['total_biodata'] = $this->ModelBiodata->get_total_biodata()->total_biodata;
        $data['total_berita'] = $this->ModelBerita->get_total_berita()->total_berita;
        $data['total_lowongan_pekerjaan'] = $this->ModelLowonganPekerjaan->get_total_lowongan_pekerjaan()->total_lowongan_pekerjaan;
        $data['total_legalisir'] = $this->ModelLegalisir->get_total_legalisir()->total_legalisir;
        $data['total_pekerjaan'] = $this->ModelPekerjaan->get_total_pekerjaan()->total_pekerjaan;
        return view('admin/dashboard', $data);
    }

    function admin_statistik()
    {
        $data['total_alumni_by_tahun_masuk'] = $this->ModelAlumni->get_total_alumni_by_tahun_masuk();
        $data['total_alumni_by_program_studi'] = $this->ModelAlumni->get_total_alumni_by_program_studi_new();
        $data['total_alumni_by_jenjang_pendidikan'] = $this->ModelAlumni->get_total_alumni_by_jenjang_pendidikan();
        $data['total_alumni_by_jenis_kelamin'] = $this->ModelAlumni->get_total_alumni_by_jenis_kelamin();
        $data['total_alumni_by_fakultas'] = $this->ModelAlumni->get_total_alumni_by_fakultas();
        // return $this->response->setJSON($data['total_alumni_by_jenjang_pendidikan']);
        return view('admin/statistik', $data);
    }

    function admin_laporan()
    {

        $data['tahun_lulus'] = "semua";
        $data['program_studi'] = "semua";
        $data['total_responden_by_program_studi'] = $this->ModelAlumni->get_total_responden_by_program_studi();
        $data['total_responden'] = $this->ModelAlumni->get_total_responden()->total_responden;
        $data['total_alumni_by_tahun_lulus'] = $this->ModelAlumni->get_total_alumni_by_tahun_lulus()->total_alumni;
        $data['total_responden_by_aktivitas_lulusan'] = $this->ModelAlumni->get_total_responden_by_aktivitas_lulusan();
        $data['total_responden_by_sebaran_masa_tunggu'] = $this->ModelAlumni->get_total_responden_by_sebaran_masa_tunggu();
        $data['total_responden_by_jenis_institusi'] = $this->ModelAlumni->get_total_responden_by_jenis_institusi();
        $data['total_responden_by_tingkat_kerja'] = $this->ModelAlumni->get_total_responden_by_tingkat_kerja();
        $data['total_responden_cek_penghasilan'] = $this->ModelAlumni->get_total_responden_cek_penghasilan();
        $data['total_responden_tingkat_pendidikan'] = $this->ModelAlumni->get_total_responden_tingkat_pendidikan();
        $data['total_responden_hubungan_studi'] = $this->ModelAlumni->get_total_responden_hubungan_studi();

        $data['total_status_pekerjaan_lulusan'] = $this->ModelAlumni->get_total_status_pekerjaan_lulusan();
        $data['total_masa_tunggu_mendapatkan_pekerjaan'] = $this->ModelAlumni->get_total_masa_tunggu_mendapatkan_pekerjaan();
        $data['total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaaan'] = $this->ModelAlumni->get_total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaan();
        $data['total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan'] = $this->ModelAlumni->get_total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan();
        $data['total_jenis_pekerjaan_tempat_bekerja'] = $this->ModelAlumni->get_total_jenis_pekerjaan_tempat_bekerja();
        $data['total_tingkat_tempat_bekerja'] = $this->ModelAlumni->get_total_tingkat_tempat_bekerja();
        $data['total_pendapatan_rata_rata_perbulan'] = $this->ModelAlumni->get_total_rata_rata_pendapatan_per_bulan();
        $data['total_hubungan_bidang_studi_dan_pekerjaan'] = $this->ModelAlumni->get_total_hubungan_bidang_studi_dan_pekerjaan();
        $data['total_tingkat_pendidikan_dan_pekerjaan'] = $this->ModelAlumni->get_total_tingkat_pendidikan_dan_pekerjaan();
        $data['total_kemampuan_lulusan'] = $this->ModelAlumni->get_total_kemampuan_lulusan();
        $data['total_analisis_likert_data_kemampuan_lulusan'] = $this->analisis_likert_data_kemampuan_lulusan($data['total_kemampuan_lulusan']);

        if ($data['total_alumni_by_tahun_lulus'] > 0) {
            $response_rate = round(($data['total_responden'] / $data['total_alumni_by_tahun_lulus']) * 100, 2);
        } else {
            $response_rate = 0;
        }

        $data['content_data_aktivitas_dan_pekerjaan_lulusan'] = "Pengumpulan data Tracer Study dilakukan melalui kuesioner online di https://alumni.umi.ac.id/. diperoleh <b>" . format_ribuan($data['total_responden']) . "</b> alumni yang merespon survei dari <b>" . format_ribuan($data['total_alumni_by_tahun_lulus']) . "</b> target responden. Persentase response rate Tracer Study UMI jenjang, Diploma, Sarjana, Magister, dan Doktor serta Profesi adalah <b>" . $response_rate . "%.</b>";

        return view('admin/report', $data);
    }

    function admin_prodi_laporan()
    {

        $data['tahun_lulus'] = "semua";
        $data['program_studi'] = session()->get('C_KODE_PRODI');
        $data['total_responden_by_program_studi'] = $this->ModelAlumni->get_total_responden_by_program_studi($data['tahun_lulus'], $data['program_studi']);
        $data['total_responden'] = $this->ModelAlumni->get_total_responden($data['tahun_lulus'], $data['program_studi'])->total_responden;
        $data['total_alumni_by_tahun_lulus'] = $this->ModelAlumni->get_total_alumni_by_tahun_lulus($data['tahun_lulus'], $data['program_studi'])->total_alumni;
        $data['total_responden_by_aktivitas_lulusan'] = $this->ModelAlumni->get_total_responden_by_aktivitas_lulusan();
        $data['total_responden_by_sebaran_masa_tunggu'] = $this->ModelAlumni->get_total_responden_by_sebaran_masa_tunggu();
        $data['total_responden_by_jenis_institusi'] = $this->ModelAlumni->get_total_responden_by_jenis_institusi();
        $data['total_responden_by_tingkat_kerja'] = $this->ModelAlumni->get_total_responden_by_tingkat_kerja();
        $data['total_responden_cek_penghasilan'] = $this->ModelAlumni->get_total_responden_cek_penghasilan();
        $data['total_responden_tingkat_pendidikan'] = $this->ModelAlumni->get_total_responden_tingkat_pendidikan();
        $data['total_responden_hubungan_studi'] = $this->ModelAlumni->get_total_responden_hubungan_studi();

        $data['total_status_pekerjaan_lulusan'] = $this->ModelAlumni->get_total_status_pekerjaan_lulusan($data['tahun_lulus'], $data['program_studi']);
        $data['total_masa_tunggu_mendapatkan_pekerjaan'] = $this->ModelAlumni->get_total_masa_tunggu_mendapatkan_pekerjaan($data['tahun_lulus'], $data['program_studi']);
        $data['total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaaan'] = $this->ModelAlumni->get_total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaan($data['tahun_lulus'], $data['program_studi']);
        $data['total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan'] = $this->ModelAlumni->get_total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan($data['tahun_lulus'], $data['program_studi']);
        $data['total_jenis_pekerjaan_tempat_bekerja'] = $this->ModelAlumni->get_total_jenis_pekerjaan_tempat_bekerja($data['tahun_lulus'], $data['program_studi']);
        $data['total_tingkat_tempat_bekerja'] = $this->ModelAlumni->get_total_tingkat_tempat_bekerja($data['tahun_lulus'], $data['program_studi']);
        $data['total_pendapatan_rata_rata_perbulan'] = $this->ModelAlumni->get_total_rata_rata_pendapatan_per_bulan($data['tahun_lulus'], $data['program_studi']);
        $data['total_hubungan_bidang_studi_dan_pekerjaan'] = $this->ModelAlumni->get_total_hubungan_bidang_studi_dan_pekerjaan($data['tahun_lulus'], $data['program_studi']);
        $data['total_tingkat_pendidikan_dan_pekerjaan'] = $this->ModelAlumni->get_total_tingkat_pendidikan_dan_pekerjaan($data['tahun_lulus'], $data['program_studi']);
        $data['total_kemampuan_lulusan'] = $this->ModelAlumni->get_total_kemampuan_lulusan();
        $data['total_analisis_likert_data_kemampuan_lulusan'] = $this->analisis_likert_data_kemampuan_lulusan($data['total_kemampuan_lulusan']);


        // Calculate the response rate and avoid division by zero
        if ($data['total_alumni_by_tahun_lulus'] > 0) {
            $response_rate = round(($data['total_responden'] / $data['total_alumni_by_tahun_lulus']) * 100, 2);
        } else {
            $response_rate = 0;
        }

        $data['content_data_aktivitas_dan_pekerjaan_lulusan'] = "Pengumpulan data Tracer Study dilakukan melalui kuesioner online di https://alumni.umi.ac.id/. diperoleh <b>" . format_ribuan($data['total_responden']) . "</b> alumni yang merespon survei dari <b>" . format_ribuan($data['total_alumni_by_tahun_lulus']) . "</b> target responden. Persentase response rate Tracer Study UMI jenjang, Diploma, Sarjana, Magister, dan Doktor serta Profesi adalah <b>" . $response_rate . "%.</b>";

        return view('admin-prodi/report', $data);
    }

    function analisis_likert_data_kemampuan_lulusan($data)
    {
        // Fungsi untuk menghitung rata-rata
        function calculate_mean($values)
        {
            $total = array_sum($values);
            $count = count($values);
            return $count > 0 ? $total / $count : 0;
        }

        // Mengelompokkan data untuk bagian A dan B dengan handling nilai null
        $bagian_a = [
            'Etika' => intval($data->etika_a ?? 0),
            'Keahlian pada bidang ilmu' => intval($data->keahlian_a ?? 0),
            'Kemampuan berbahasa asing' => intval($data->bahasa_asing_a ?? 0),
            'Penggunaan teknologi informasi' => intval($data->teknologi_a ?? 0),
            'Kemampuan berkomunikasi' => intval($data->komunikasi_a ?? 0),
            'Kerjasama' => intval($data->kerjasama_a ?? 0),
            'Pengembangan diri' => intval($data->pengembangan_diri_a ?? 0),
            'Kepemimpinan' => intval($data->kepemimpinan_a ?? 0)
        ];

        $bagian_b = [
            'Etika' => intval($data->etika_b ?? 0),
            'Keahlian pada bidang ilmu' => intval($data->keahlian_b ?? 0),
            'Kemampuan berbahasa asing' => intval($data->bahasa_asing_b ?? 0),
            'Penggunaan teknologi informasi' => intval($data->teknologi_b ?? 0),
            'Kemampuan berkomunikasi' => intval($data->komunikasi_b ?? 0),
            'Kerjasama' => intval($data->kerjasama_b ?? 0),
            'Pengembangan diri' => intval($data->pengembangan_diri_b ?? 0),
            'Kepemimpinan' => intval($data->kepemimpinan_b ?? 0)
        ];

        // Menghitung rata-rata tiap bagian
        $mean_a = calculate_mean(array_values($bagian_a));
        $mean_b_values = array_filter($bagian_b, function ($value) {
            return $value !== 0;
        });
        $mean_b = calculate_mean(array_values($mean_b_values));

        // Analisis per kompetensi
        $analisis = [
            'rata_rata_bagian_a' => $mean_a,
            'rata_rata_bagian_b' => $mean_b,
            'per_kompetensi' => []
        ];

        foreach ($bagian_a as $name => $a_value) {
            $b_value = $bagian_b[$name];
            $b_text = ($b_value === 0 || is_null($b_value)) ? 'Belum Memiliki Pekerjaan' : $b_value;

            $analisis['per_kompetensi'][$name] = [
                'bagian_a' => $a_value,
                'bagian_b' => $b_text,
                'perbedaan' => ($b_value === 0 || is_null($b_value)) ? 'Belum Memiliki Pekerjaan' : $b_value - $a_value
            ];
        }

        return $analisis;
    }

    function post_admin_laporan()
    {
        // Request Post
        $tahun_lulus = $this->request->getPost('tahun_lulus');
        $program_studi = $this->request->getPost('program_studi');

        $data['tahun_lulus'] = $tahun_lulus;
        $data['program_studi'] = $program_studi;

        $data['total_responden_by_program_studi'] = $this->ModelAlumni->get_total_responden_by_program_studi($tahun_lulus, $program_studi);
        $data['total_responden'] = $this->ModelAlumni->get_total_responden($tahun_lulus, $program_studi)->total_responden;
        $data['total_alumni_by_tahun_lulus'] = $this->ModelAlumni->get_total_alumni_by_tahun_lulus($tahun_lulus, $program_studi)->total_alumni;
        $data['total_responden_by_aktivitas_lulusan'] = $this->ModelAlumni->get_total_responden_by_aktivitas_lulusan();
        $data['total_responden_by_sebaran_masa_tunggu'] = $this->ModelAlumni->get_total_responden_by_sebaran_masa_tunggu();
        $data['total_responden_by_jenis_institusi'] = $this->ModelAlumni->get_total_responden_by_jenis_institusi();
        $data['total_responden_by_tingkat_kerja'] = $this->ModelAlumni->get_total_responden_by_tingkat_kerja();
        $data['total_responden_cek_penghasilan'] = $this->ModelAlumni->get_total_responden_cek_penghasilan();
        $data['total_responden_tingkat_pendidikan'] = $this->ModelAlumni->get_total_responden_tingkat_pendidikan();
        $data['total_responden_hubungan_studi'] = $this->ModelAlumni->get_total_responden_hubungan_studi();

        $data['total_status_pekerjaan_lulusan'] = $this->ModelAlumni->get_total_status_pekerjaan_lulusan($tahun_lulus, $program_studi);
        $data['total_masa_tunggu_mendapatkan_pekerjaan'] = $this->ModelAlumni->get_total_masa_tunggu_mendapatkan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaaan'] = $this->ModelAlumni->get_total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan'] = $this->ModelAlumni->get_total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_jenis_pekerjaan_tempat_bekerja'] = $this->ModelAlumni->get_total_jenis_pekerjaan_tempat_bekerja($tahun_lulus, $program_studi);
        $data['total_tingkat_tempat_bekerja'] = $this->ModelAlumni->get_total_tingkat_tempat_bekerja($tahun_lulus, $program_studi);
        $data['total_pendapatan_rata_rata_perbulan'] = $this->ModelAlumni->get_total_rata_rata_pendapatan_per_bulan($tahun_lulus, $program_studi);
        $data['total_hubungan_bidang_studi_dan_pekerjaan'] = $this->ModelAlumni->get_total_hubungan_bidang_studi_dan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_tingkat_pendidikan_dan_pekerjaan'] = $this->ModelAlumni->get_total_tingkat_pendidikan_dan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_kemampuan_lulusan'] = $this->ModelAlumni->get_total_kemampuan_lulusan();
        $data['total_analisis_likert_data_kemampuan_lulusan'] = $this->analisis_likert_data_kemampuan_lulusan($data['total_kemampuan_lulusan']);

        if ($data['total_alumni_by_tahun_lulus'] > 0) {
            $response_rate = round(($data['total_responden'] / $data['total_alumni_by_tahun_lulus']) * 100, 2);
        } else {
            $response_rate = 0;
        }

        $data['content_data_aktivitas_dan_pekerjaan_lulusan'] = "Pengumpulan data Tracer Study dilakukan melalui kuesioner online di https://alumni.umi.ac.id/. diperoleh <b>" . format_ribuan($data['total_responden']) . "</b> alumni yang merespon survei dari <b>" . format_ribuan($data['total_alumni_by_tahun_lulus']) . "</b> target responden. Persentase response rate Tracer Study UMI jenjang, Diploma, Sarjana, Magister, dan Doktor serta Profesi adalah <b>" . $response_rate . "%.</b>";

        return view('admin/report', $data);
    }

    function post_admin_prodi_laporan()
    {
        // Request Post
        $tahun_lulus = $this->request->getPost('tahun_lulus');
        $program_studi = session()->get('C_KODE_PRODI');

        $data['tahun_lulus'] = $tahun_lulus;
        $data['program_studi'] = $program_studi;

        $data['total_responden_by_program_studi'] = $this->ModelAlumni->get_total_responden_by_program_studi($tahun_lulus, $program_studi);
        $data['total_responden'] = $this->ModelAlumni->get_total_responden($tahun_lulus, $program_studi)->total_responden;
        $data['total_alumni_by_tahun_lulus'] = $this->ModelAlumni->get_total_alumni_by_tahun_lulus($tahun_lulus, $program_studi)->total_alumni;
        $data['total_responden_by_aktivitas_lulusan'] = $this->ModelAlumni->get_total_responden_by_aktivitas_lulusan();
        $data['total_responden_by_sebaran_masa_tunggu'] = $this->ModelAlumni->get_total_responden_by_sebaran_masa_tunggu();
        $data['total_responden_by_jenis_institusi'] = $this->ModelAlumni->get_total_responden_by_jenis_institusi();
        $data['total_responden_by_tingkat_kerja'] = $this->ModelAlumni->get_total_responden_by_tingkat_kerja();
        $data['total_responden_cek_penghasilan'] = $this->ModelAlumni->get_total_responden_cek_penghasilan();
        $data['total_responden_tingkat_pendidikan'] = $this->ModelAlumni->get_total_responden_tingkat_pendidikan();
        $data['total_responden_hubungan_studi'] = $this->ModelAlumni->get_total_responden_hubungan_studi();

        $data['total_status_pekerjaan_lulusan'] = $this->ModelAlumni->get_total_status_pekerjaan_lulusan($tahun_lulus, $program_studi);
        $data['total_masa_tunggu_mendapatkan_pekerjaan'] = $this->ModelAlumni->get_total_masa_tunggu_mendapatkan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaaan'] = $this->ModelAlumni->get_total_masa_tunggu_dibawah_6_bulan_mendapatkan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan'] = $this->ModelAlumni->get_total_masa_tunggu_diatas_6_bulan_mendapatkan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_jenis_pekerjaan_tempat_bekerja'] = $this->ModelAlumni->get_total_jenis_pekerjaan_tempat_bekerja($tahun_lulus, $program_studi);
        $data['total_tingkat_tempat_bekerja'] = $this->ModelAlumni->get_total_tingkat_tempat_bekerja($tahun_lulus, $program_studi);
        $data['total_pendapatan_rata_rata_perbulan'] = $this->ModelAlumni->get_total_rata_rata_pendapatan_per_bulan($tahun_lulus, $program_studi);
        $data['total_hubungan_bidang_studi_dan_pekerjaan'] = $this->ModelAlumni->get_total_hubungan_bidang_studi_dan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_tingkat_pendidikan_dan_pekerjaan'] = $this->ModelAlumni->get_total_tingkat_pendidikan_dan_pekerjaan($tahun_lulus, $program_studi);
        $data['total_kemampuan_lulusan'] = $this->ModelAlumni->get_total_kemampuan_lulusan();
        $data['total_analisis_likert_data_kemampuan_lulusan'] = $this->analisis_likert_data_kemampuan_lulusan($data['total_kemampuan_lulusan']);

        if ($data['total_alumni_by_tahun_lulus'] > 0) {
            $response_rate = round(($data['total_responden'] / $data['total_alumni_by_tahun_lulus']) * 100, 2);
        } else {
            $response_rate = 0;
        }

        $data['content_data_aktivitas_dan_pekerjaan_lulusan'] = "Pengumpulan data Tracer Study dilakukan melalui kuesioner online di https://alumni.umi.ac.id/. diperoleh <b>" . format_ribuan($data['total_responden']) . "</b> alumni yang merespon survei dari <b>" . format_ribuan($data['total_alumni_by_tahun_lulus']) . "</b> target responden. Persentase response rate Tracer Study UMI jenjang, Diploma, Sarjana, Magister, dan Doktor serta Profesi adalah <b>" . $response_rate . "%.</b>";

        return view('admin-prodi/report', $data);
    }

    // Admin Prodi
    function admin_prodi_dashboard()
    {
        $data['total_alumni'] = $this->ModelAlumni->get_total_alumni_by_kode_prodi()->jumlah_alumni;
        $data['total_biodata'] = $this->ModelBiodata->get_total_biodata()->total_biodata;
        $data['total_berita'] = $this->ModelBerita->get_total_berita()->total_berita;
        $data['total_lowongan_pekerjaan'] = $this->ModelLowonganPekerjaan->get_total_lowongan_pekerjaan()->total_lowongan_pekerjaan;
        $data['total_legalisir'] = $this->ModelLegalisir->get_total_legalisir()->total_legalisir;
        $data['total_kuesioner'] = $this->ModelLegalisir->get_total_kuesioner_pengguna_lulusan()->total_kuesioner;
        return view('admin-prodi/dashboard', $data);
    }
}
