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
    public function __construct() {
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

        session()->set('C_STAMBUK', $data["personal"]["stambuk"]);
        session()->set('C_NAMA', $data["personal"]["nama"]);
        session()->set('C_EMAIL', $data["personal"]["email"]);
        session()->set('C_JENIS_KELAMIN', $data["personal"]["jns_kelamin"]);

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
        }else{
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
        }else{
            session()->setFlashdata('status', 'gagal');
            return redirect()->to(base_url('pengguna-kesehatan'));
        }
    }

    // Admin
    function admin_dashboard(){
        $data['total_alumni'] = $this->ModelAlumni->get_total_alumni()->total_alumni;
        $data['total_program_studi'] = $this->ModelProgramStudi->get_total_program_studi()->total_program_studi;
        $data['total_biodata'] = $this->ModelBiodata->get_total_biodata()->total_biodata;
        $data['total_berita'] = $this->ModelBerita->get_total_berita()->total_berita;
        $data['total_lowongan_pekerjaan'] = $this->ModelLowonganPekerjaan->get_total_lowongan_pekerjaan()->total_lowongan_pekerjaan;
        $data['total_legalisir'] = $this->ModelLegalisir->get_total_legalisir()->total_legalisir;
        $data['total_pekerjaan'] = $this->ModelPekerjaan->get_total_pekerjaan()->total_pekerjaan;
        return view('admin/dashboard', $data);
    }

    function admin_statistik(){
        $data['total_alumni_by_program_studi'] = $this->ModelAlumni->get_total_alumni_by_program_studi();
        $data['total_alumni_based_jumlah_lulusan'] = $this->ModelAlumni->get_total_alumni_based_jumlah_lulusan();
        $data['total_status_ip_kumulatif'] = $this->ModelAlumni->get_total_status_ip_kumulatif();
        $data['total_alumni'] = $this->ModelAlumni->get_total_alumni()->total_alumni;
        $data['total_legalisir_based_status'] = $this->ModelLegalisir->get_total_legalisir_based_status();
        $data['total_legalisir_by_ttd_berkas_path'] = $this->ModelLegalisir->get_total_legalisir_by_ttd_berkas_path();
        return view('admin/statistik', $data);
    }
}
