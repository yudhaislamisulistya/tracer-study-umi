<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBiodata;

class BiodataController extends BaseController
{
    protected $ModelBiodata;
    public function __construct()
    {
        $this->ModelBiodata = new ModelBiodata();
    }

    public function post_biodata()
    {
        $nim = session()->get('C_NPM');
        $tahun_masuk = $this->request->getPost('tahun_masuk');
        $tahun_keluar = $this->request->getPost('tahun_keluar');
        $alamat = $this->request->getPost('alamat');
        $negara = $this->request->getPost('negara');
        $provinsi = $this->request->getPost('provinsi');
        $kabupaten = $this->request->getPost('kabupaten');
        $jenis_pekerjaan = $this->request->getPost('jenis_pekerjaan');
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $tanggal_masuk_kerja = $this->request->getPost('tanggal_masuk_kerja');
        $status_pekerjaan = $this->request->getPost('status_pekerjaan');
        $email = $this->request->getPost('email');
        $nomor_handphone = $this->request->getPost('nomor_handphone');
        if ($this->ModelBiodata->update_biodata($nim, $tahun_masuk, $tahun_keluar, $alamat, $negara, $provinsi, $kabupaten, $jenis_pekerjaan, $nama_perusahaan, $tanggal_masuk_kerja, $status_pekerjaan, $email, $nomor_handphone)) {
            session()->setFlashdata('status', 'berhasil');
            return redirect()->to(base_url('biodata'));
        } else {
            session()->setFlashdata('status', 'gagal');
            return redirect()->to(base_url('biodata'));
        }
    }

    // Admin
    public function admin_biodata()
    {
        return view('admin/manajemen_data/biodata');
    }

    // For API or Return JSON
    public function get_biodata_json()
    {
        try {
            $page = $this->request->getVar('page') ?? 1;
            $perPage = $this->request->getVar('perpage') ?? 10;
            $offset = ($page - 1) * $perPage;
            $limit = $perPage;
            $nameSearch = $this->request->getVar('nameSearch');
            $nimSearch = $this->request->getVar('nimSearch');
            $programStudiSearch = $this->request->getVar('programStudiSearch');
            $tahunMasukSearch = $this->request->getVar('tahunMasukSearch');
            $tahunKeluarSearch = $this->request->getVar('tahunKeluarSearch');


            $data['data'] = $this->ModelBiodata->get_biodata_pagination($limit, $offset, $nameSearch, $nimSearch, $programStudiSearch, $tahunMasukSearch, $tahunKeluarSearch);
            $totalRecord = count($this->ModelBiodata->get_biodata($nameSearch, $nimSearch, $programStudiSearch, $tahunMasukSearch, $tahunKeluarSearch));
            $pages = ceil(count($data['data']) / $perPage);
            $data['draw'] = $this->request->getVar('draw') ?? 1;
            $data['recordsTotal'] = $totalRecord;
            $data['recordsFiltered'] = $totalRecord;
            $data['meta'] = [
                'page' => $page,
                'pages' => $pages,
                'perpage' => $perPage,
                'total' => $totalRecord,
            ];
            return $this->response->setJSON($data);
        } catch (\Exception $th) {
            return json_encode(0);
        }
    }

    public function get_current_user()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => getenv('app.endpointGateway') . 'alumni/bycurrentuser',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'accept: application/json',
                'operator: web',
                'appversion: 1.0.1',
                'Authorization: Bearer ' . session()->get('TOKEN')
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }
}
