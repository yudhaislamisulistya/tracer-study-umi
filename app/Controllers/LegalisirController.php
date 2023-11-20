<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLegalisir;

class LegalisirController extends BaseController
{
    public $ModelLegalisir;
    public function __construct()
    {
        $this->ModelLegalisir = new ModelLegalisir();
    }

    public function index()
    {
        $data['data_legalisir'] = $this->ModelLegalisir->get_all_legalisir_by_nim(session()->get('C_NPM'));

        return view('legalisir', $data);
    }

    public function pengajuan()
    {
        try {
            $data = [
                'title' => 'Pengajuan Legalisir',
                'menu' => 'legalisir',
                'sub_menu' => 'pengajuan',
            ];


            return view('pengajuan-legalisir', $data);
        } catch (\Exception $th) {
            throw $th;
        }
    }

    public function post_add_pengajuan()
    {
        try {
            $data = [
                'title' => 'Pengajuan Legalisir',
                'menu' => 'legalisir',
                'sub_menu' => 'pengajuan',
            ];

            $post = $this->request->getPost();
            $file = $this->request->getFile('berkas');
            $fileName = generateRandomString(20);
            $fileName .= '.' . $file->getExtension();

            if ($post['biaya_pengiriman'] == '') {
                $post['total_biaya'] = $post['biaya_legalisir'];
            }

            $data = [
                'legalisir_path' => generateRandomString(20),
                'nim' => session()->get('C_NPM'),
                'jenis_berkas' => $post['jenis_berkas'],
                'berkas_path' => $fileName,
                'ttd_berkas_path' => $post['ttd_berkas'],
                'bahasa' => $post['bahasa'],
                'jumlah' => $post['jumlah_berkas'],
                'kode_pos' => $post['kode_pos'],
                'alamat_pengiriman' => $post['alamat_pengiriman'],
                'biaya_legalisasi' => $post['biaya_legalisir'],
                'tarif_pengiriman' => $post['biaya_pengiriman'],
                'total_biaya' => $post['total_biaya'],
                'catatan' => $post['catatan'],
                'status' => 'Submitted',
            ];

            $query = $this->ModelLegalisir->post_add_pengajuan($data);

            if ($file && $file->isValid()) {
                if ($query) {
                    $file->move('assets/berkas/legalisir/', $fileName);
                    session()->setFlashdata('success', 'Pengajuan Legalisir Berhasil');
                } else {
                    session()->setFlashdata('error', 'Pengajuan Legalisir Gagal');
                }
            } else {
                session()->setFlashdata('error', 'No file uploaded or invalid file');
            }

            return redirect()->to(base_url('legalisir/pengajuan'));
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
            session()->setFlashdata('error', 'Pengajuan Legalisir Gagal');
            return redirect()->to(base_url('legalisir/pengajuan'));
        }
    }

    public function raja_ongkir_cost($origin, $destination, $weight, $courier)
    {
        $apiKey = getenv('API_KEY_RAJA_ONGKIR');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $this->response->setJSON($response);
    }
}
