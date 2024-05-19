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
        $data['pengaturan_legalisir'] = $this->ModelLegalisir->get_pengaturan_legalisir_by_kode_prodi(session()->get('id_prodi'));

        return view('legalisir', $data);
    }

    public function pengajuan()
    {
        try {

            $data = [
                'pengaturan_legalisir' => $this->ModelLegalisir->get_pengaturan_legalisir_by_kode_prodi(session()->get('id_prodi')),
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
                'kode_prodi' => session()->get('id_prodi'),
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

    // Admin
    public function admin_legalisir_dokumen()
    {
        try {
            return view('admin/akademik/legalisir_dokumen');
        } catch (\Exception $th) {
            throw $th;
        }
    }

    // // Admin Prodi
    // Admin Prodi Legalisir View
    public function admin_prodi_legalisir()
    {
        try {

            $C_KODE_PRODI = session()->get('C_KODE_PRODI');
            $data = [
                'data_legalisir' => $this->ModelLegalisir->get_pengaturan_legalisir_by_kode_prodi($C_KODE_PRODI),
            ];

            return view('admin-prodi/legalisir/daftar_legalisir', $data);
        } catch (\Exception $th) {
            throw $th;
        }
    }

    // Admin Prodi Legalisir Post
    public function admin_prodi_legalisir_post()
    {
        try {
            $post = $this->request->getPost();
            $C_KODE_PRODI = session()->get('C_KODE_PRODI');

            // if $post['whatsapp'] starts with 0, remove it and replace with 62, and start with 8, add 62
            if (substr($post['whatsapp'], 0, 1) == '0') {
                $post['whatsapp'] = '62' . substr($post['whatsapp'], 1);
            } elseif (substr($post['whatsapp'], 0, 1) == '8') {
                $post['whatsapp'] = '62' . $post['whatsapp'];
            }

            $data = [
                'kode_prodi' => $C_KODE_PRODI,
                'catatan' => $post['catatan'],
                'extra_ongkir' => $post['extraOngkir'],
                'biaya_legalisir_ijazah' => $post['hargaLegalisirIjazah'],
                'biaya_transkrip_nilai' => $post['hargaTranskripNilai'],
                'whatsapp' => $post['whatsapp'],
            ];

            $this->ModelLegalisir->post_add_legalisir($data);

            return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menambahkan atau mengupdate pengaturan legalisir');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menambahkan atau mengupdate pengaturan legalisir');
        }
    }

    // Admin Prodi Update Status
    public function admin_prodi_update_status_legalisir()
    {
        try {
            $post = $this->request->getPost();
            $data = [
                'status' => $post['status'],
            ];

            $this->ModelLegalisir->update_status_legalisir($post['id'], $data);

            return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil mengupdate status legalisir');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal mengupdate status legalisir');
        }
    }

    // Admin Delete Pengajuan Legalisil
    public function delete_pengajuan(){
        try {
            $post = $this->request->getPost();
            $this->ModelLegalisir->delete_pengajuan($post['id']);

            return redirect()->back()->with('status', 'berhasil')->with('message', 'Berhasil menghapus pengajuan legalisir');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'gagal')->with('message', 'Gagal menghapus pengajuan legalisir');
        }
    }
}
