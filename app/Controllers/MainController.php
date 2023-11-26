<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelOtentikasi;
use App\Models\ModelPengguna;

class MainController extends BaseController
{
    public $ModelOtentikasi;
    public $ModelPengguna;
    public function __construct() {
        $this->ModelOtentikasi = new ModelOtentikasi();
        $this->ModelPengguna = new ModelPengguna();
    }
    public function index()
    {
        return view('dashboard');
    }

    public function biodata()
    {
        return view('biodata');
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
        return view('admin/dashboard');
    }
}
