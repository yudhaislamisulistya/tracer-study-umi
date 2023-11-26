<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLowonganPekerjaan;

class LowonganKerjaController extends BaseController
{
    public $ModelLowonganPekerjaan;
    public function __construct() {
        $this->ModelLowonganPekerjaan = new ModelLowonganPekerjaan();
    }

    public function index()
    {
        try {
            $page = $this->request->getGet('page') ?? 1;
            $perusahaan = $this->request->getGet('perusahaan') ?? '';
            $programStudi = $this->request->getGet('program_studi') ?? '';
            $keahlian = $this->request->getGet('keahlian') ?? '';
            $periodePembukaan = $this->request->getGet('periode_pembukaan') ?? '';
            $periodePenutupan = $this->request->getGet('periode_penutupan') ?? '';
            $gajiMin = $this->request->getGet('gaji_min') ?? '';
            $gajiMin = preg_replace('/[^0-9]/', '', $gajiMin);
            $gajiMax = $this->request->getGet('gaji_max') ?? '';
            $gajiMax = preg_replace('/[^0-9]/', '', $gajiMax);
            $penempatan = $this->request->getGet('penempatan') ?? '';

            $perPage = 5; 
            $offset = ($page - 1) * $perPage;
            $data['lowongan_pekerjaan'] = $this->ModelLowonganPekerjaan->get_lowongan_pekerjaan_paginate($perPage, $offset, $perusahaan, $programStudi, $keahlian, $periodePembukaan, $periodePenutupan, $gajiMin, $gajiMax, $penempatan);
            $totalPosts = $this->ModelLowonganPekerjaan->get_all_lowongan_pekerjaan($perusahaan, $programStudi, $keahlian, $periodePembukaan, $periodePenutupan, $gajiMin, $gajiMax, $penempatan);
            $data['pagination_count'] = ceil(count($totalPosts) / $perPage);
            $data['perPage'] = $perPage;
            $data['totalRecords'] = count($totalPosts);
            $data['filter'] = [
                'perusahaan' => $perusahaan,
                'program_studi' => $programStudi,
                'keahlian' => $keahlian,
                'periode_pembukaan' => $periodePembukaan,
                'periode_penutupan' => $periodePenutupan,
                'gaji_min' => $gajiMin,
                'gaji_max' => $gajiMax,
                'penempatan' => $penempatan,
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
}
