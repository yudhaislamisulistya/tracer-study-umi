<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelStatusPekerjaan;

class StatusPekerjaanController extends BaseController
{
    public $ModelStatusPekerjaan;
    public function __construct()
    {
        $this->ModelStatusPekerjaan = new ModelStatusPekerjaan();
    }
    public function index()
    {
        return view('admin/manajemen_data/status_pekerjaan');
    }

    public function index2()
    {
        return view('admin/karir_dan_pekerjaan/status_pekerjaan_alumni');
    }

    public function post_status_pekerjaan()
    {
        try {
            $data = [
                'status_job' => $this->request->getPost('status_pekerjaan'),
            ];

            $query = $this->ModelStatusPekerjaan->post_status_pekerjaan($data);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menambahkan data status pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data status pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menambahkan data status pekerjaan');
            return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
        }
    }

    public function delete()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelStatusPekerjaan->delete_status_pekerjaan($hapusId);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menghapus data status pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data status pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data status pekerjaan');
            return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
        }
    }

    public function update()
    {
        try {
            $data = [
                'id_job' => $this->request->getPost('editId'),
                'status_job' => $this->request->getPost('editStatusPekerjaan'),
            ];
            $query = $this->ModelStatusPekerjaan->update_status_pekerjaan($data);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menghapus data status pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data status pekerjaan');
                return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data status pekerjaan');
            return redirect()->to(base_url('admin/manajemen-data/status-pekerjaan'));
        }
    }
}
