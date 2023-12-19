<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJenisKeluar;

class JenisKeluarController extends BaseController
{
    public $ModelJenisKeluar;
    public function __construct()
    {
        $this->ModelJenisKeluar = new ModelJenisKeluar();
    }
    public function index()
    {
        return view('admin/manajemen_data/jenis_keluar');
    }

    public function post_jenis_keluar()
    {
        try {
            $data = [
                'ket_keluar' => $this->request->getPost('jenis_keluar'),
            ];

            $query = $this->ModelJenisKeluar->post_jenis_keluar($data);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menambahkan data jenis keluar');
                return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data jenis keluar');
                return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menambahkan data jenis keluar');
            return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
        }
    }

    public function delete()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelJenisKeluar->delete_jenis_keluar($hapusId);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menghapus data jenis keluar');
                return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data jenis keluar');
                return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data jenis keluar');
            return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
        }
    }

    public function update()
    {
        try {
            $data = [
                'id_jns_keluar' => $this->request->getPost('editId'),
                'ket_keluar' => $this->request->getPost('editJenisKeluar'),
            ];
            $query = $this->ModelJenisKeluar->update_jenis_keluar($data);

            if ($query) {
                session()->setFlashdata('success', 'Berhasil menghapus data jenis keluar');
                return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data jenis keluar');
                return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data jenis keluar');
            return redirect()->to(base_url('admin/manajemen-data/jenis-keluar'));
        }
    }
}
