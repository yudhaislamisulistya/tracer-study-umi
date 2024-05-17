<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLowonganPekerjaan;

class LowonganKerjaController extends BaseController
{
    public $ModelLowonganPekerjaan;
    public function __construct()
    {
        $this->ModelLowonganPekerjaan = new ModelLowonganPekerjaan();
    }

    // public function index()
    // {
    //     try {
    //         $page = $this->request->getGet('page') ?? 1;
    //         $perusahaan = $this->request->getGet('perusahaan') ?? '';
    //         $programStudi = $this->request->getGet('program_studi') ?? '';
    //         $keahlian = $this->request->getGet('keahlian') ?? '';
    //         $periodePembukaan = $this->request->getGet('periode_pembukaan') ?? '';
    //         $periodePenutupan = $this->request->getGet('periode_penutupan') ?? '';
    //         $gajiMin = $this->request->getGet('gaji_min') ?? '';
    //         $gajiMin = preg_replace('/[^0-9]/', '', $gajiMin);
    //         $gajiMax = $this->request->getGet('gaji_max') ?? '';
    //         $gajiMax = preg_replace('/[^0-9]/', '', $gajiMax);
    //         $penempatan = $this->request->getGet('penempatan') ?? '';

    //         $perPage = 5;
    //         $offset = ($page - 1) * $perPage;
    //         $data['lowongan_pekerjaan'] = $this->ModelLowonganPekerjaan->get_lowongan_pekerjaan_paginate($perPage, $offset, $perusahaan, $programStudi, $keahlian, $periodePembukaan, $periodePenutupan, $gajiMin, $gajiMax, $penempatan);
    //         $totalPosts = $this->ModelLowonganPekerjaan->get_all_lowongan_pekerjaan($perusahaan, $programStudi, $keahlian, $periodePembukaan, $periodePenutupan, $gajiMin, $gajiMax, $penempatan);
    //         $data['pagination_count'] = ceil(count($totalPosts) / $perPage);
    //         $data['perPage'] = $perPage;
    //         $data['totalRecords'] = count($totalPosts);
    //         $data['filter'] = [
    //             'perusahaan' => $perusahaan,
    //             'program_studi' => $programStudi,
    //             'keahlian' => $keahlian,
    //             'periode_pembukaan' => $periodePembukaan,
    //             'periode_penutupan' => $periodePenutupan,
    //             'gaji_min' => $gajiMin,
    //             'gaji_max' => $gajiMax,
    //             'penempatan' => $penempatan,
    //         ];
    //         return view('lowongan-kerja', $data);
    //     } catch (\Exception $th) {
    //         return redirect()->to(base_url('lowongan-kerja'));
    //     }
    // }

    public function index()
    {
        try {
            $page = $this->request->getGet('page') ?? 1;
            $sort = $this->request->getGet('sort') ?? '';
            $perPage = 5;
            $offset = ($page - 1) * $perPage;

            $data['lowongan_pekerjaan'] = $this->ModelLowonganPekerjaan->get_lowongan_pekerjaan_paginate($perPage, $offset, $sort);
            $totalPosts = $this->ModelLowonganPekerjaan->get_all_lowongan_pekerjaan($sort);

            $data['pagination_count'] = ceil(count($totalPosts) / $perPage);
            $data['perPage'] = $perPage;
            $data['totalRecords'] = count($totalPosts);
            $data['filter'] = [
                'sort' => $sort,
            ];

            return view('lowongan-kerja', $data);
        } catch (\Exception $th) {
            return redirect()->to(base_url('lowongan-kerja'));
        }
    }


    public function detail($job_hash)
    {
        try {
            $data['lowongan_pekerjaan'] = $this->ModelLowonganPekerjaan->get_detail_lowongan_pekerjaan($job_hash);

            if (empty($data['lowongan_pekerjaan'])) {
                return redirect()->to(base_url('lowongan-kerja'));
            }

            return view('detail-lowongan-kerja', compact('data'));
        } catch (\Exception $th) {
            return redirect()->to(base_url('detail-lowongan-kerja.php'));
        }
    }

    // Admin

    public function admin_lowongan_kerja()
    {
        return view('admin/karir_dan_pekerjaan/daftar_lowongan_kerja');
    }

    public function admin_lowongan_kerja_post()
    {
        try {
            $data = [
                'job_hash' => md5(date('Y-m-d H:i:s')),
                'nama_perusahaan' => $this->request->getPost('nama_perusahaan'),
                'judul_rekrutmen' => $this->request->getPost('judul_rekrutmen'),
                'jenis' => $this->request->getPost('jenis'),
                'deskripsi_pekerjaan' => $this->request->getPost('deskripsi_pekerjaan'),
                'nama_formasi' => $this->request->getPost('nama_formasi'),
                'jumlah_formasi' => $this->request->getPost('jumlah_formasi'),
                'jenjang' => $this->request->getPost('jenjang'),
                'domisili' => $this->request->getPost('domisili'),
                'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
                'keterampilan' => $this->request->getPost('keterampilan'),
                'syarat_kerja' => $this->request->getPost('syarat_kerja'),
                'status' => $this->request->getPost('status'),
                'kisaran_gaji_min' => $this->request->getPost('kisaran_gaji_min'),
                'kisaran_gaji_max' => $this->request->getPost('kisaran_gaji_max'),
                'manfaat' => $this->request->getPost('manfaat'),
                'periode_mulai' => $this->request->getPost('periode_mulai'),
                'periode_selesai' => $this->request->getPost('periode_selesai'),
                'url_registration' => $this->request->getPost('url_registration'),
                'tampilkan_berdasarkan_periode' => $this->request->getPost('periode_tidak_tampil') == 'on' ? 0 : 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $query = $this->ModelLowonganPekerjaan->insert_data($data);

            if (!$query) {
                session()->setFlashdata('error', 'Gagal menambahkan lowongan kerja');
                return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
            } else {
                session()->setFlashdata('success', 'Berhasil menambahkan lowongan kerja');
                return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
            }
        } catch (\Exception $th) {
            var_dump($th->getMessage());
            die();
            session()->setFlashdata('error', 'Gagal menghapus data lowongan kerja');
            return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
        }
    }

    public function delete()
    {
        try {
            $hapusId = $this->request->getPost('hapusId');
            $query = $this->ModelLowonganPekerjaan->delete_data($hapusId);

            if (!$query) {
                session()->setFlashdata('error', 'Gagal menghapus data lowongan kerja');
                return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
            } else {
                session()->setFlashdata('success', 'Berhasil menghapus data lowongan kerja');
                return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal menghapus data lowongan kerja');
            return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
        }
    }

    public function update()
    {
        try {
            $data = [
                'nama_perusahaan' => $this->request->getPost('editNamaPerusahaan'),
                'judul_rekrutmen' => $this->request->getPost('editJudulRekrutmen'),
                'jenis' => $this->request->getPost('editJenis'),
                'deskripsi_pekerjaan' => $this->request->getPost('editDeskripsiPekerjaan'),
                'nama_formasi' => $this->request->getPost('editNamaFormasi'),
                'jumlah_formasi' => $this->request->getPost('editJumlahFormasi'),
                'jenjang' => $this->request->getPost('editJenjang'),
                'domisili' => $this->request->getPost('editDomisili'),
                'pengalaman_kerja' => $this->request->getPost('editPengalamanKerja'),
                'keterampilan' => $this->request->getPost('editKeterampilan'),
                'syarat_kerja' => $this->request->getPost('editSyaratKerja'),
                'status' => $this->request->getPost('editStatus'),
                'kisaran_gaji_min' => $this->request->getPost('editKisaranGajiMin'),
                'kisaran_gaji_max' => $this->request->getPost('editKisaranGajiMax'),
                'manfaat' => $this->request->getPost('editManfaat'),
                'periode_mulai' => $this->request->getPost('editPeriodeMulai'),
                'periode_selesai' => $this->request->getPost('editPeriodeSelesai'),
                'url_registration' => $this->request->getPost('editUrlRegistration'),
                'tampilkan_berdasarkan_periode' => $this->request->getPost('editPeriodeTidakTampil') == 'on' ? 0 : 1,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $query = $this->ModelLowonganPekerjaan->update_data($data, $this->request->getPost('editId'));
            if ($query) {
                session()->setFlashdata('success', 'Berhasil update data lowongan perkejaan');
                return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
            } else {
                session()->setFlashdata('error', 'Gagal update data lowongan perkejaan');
                return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
            }
        } catch (\Exception $th) {
            session()->setFlashdata('error', 'Gagal update data lowongan kerja');
            return redirect()->to(base_url('admin/karir-dan-pekerjaan/lowongan-kerja'));
        }
    }
}
