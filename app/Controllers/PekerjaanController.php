<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPekerjaan;

class PekerjaanController extends BaseController
{
    public $ModelPekerjaan;
    public function __construct()
    {
        $this->ModelPekerjaan = new ModelPekerjaan();
    }
    public function index()
    {
        return view('admin/manajemen_data/pekerjaan');
    }

    public function index2()
    {
        return view('admin/karir_dan_pekerjaan/daftar_pekerjaan_alumni');
    }

    public function post_pekerjaan()
    {
        try {
            $data = [
                'nm_pekerjaan' => $this->request->getPost('pekerjaan'),
            ];

            $query = $this->ModelPekerjaan->post_pekerjaan($data);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menambahkan data pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menambahkan data pekerjaan');
            return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
        }
    }

    public function delete()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelPekerjaan->delete_pekerjaan($hapusId);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menghapus data pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data pekerjaan');
            return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
        }
    }

    public function update()
    {
        try {
            $data = [
                'id_pekerjaan' => $this->request->getPost('editId'),
                'nm_pekerjaan' => $this->request->getPost('editPekerjaan'),
            ];
            $query = $this->ModelPekerjaan->update_pekerjaan($data);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menghapus data pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data pekerjaan');
            return redirect()->to(base_url('admin/manajemen-data/pekerjaan'));
        }
    }
}
