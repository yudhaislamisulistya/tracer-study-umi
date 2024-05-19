<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAlumni;

class AlumniController extends BaseController
{

    public $ModelAlumni;
    public function __construct()
    {
        $this->ModelAlumni = new ModelAlumni();
    }

    public function index()
    {
        return view('admin/alumni/list');
    }

    // For API or Return JSON
    public function get_alumni_json()
    {
        try {
            $page = $this->request->getVar('page') ?? 1;
            $perPage = $this->request->getVar('perpage') ?? 10;
            $offset = ($page - 1) * $perPage;
            $limit = $perPage;
            $nameSearch = $this->request->getVar('nameSearch') ?? '';
            $nimSearch = $this->request->getVar('nimSearch') ?? '';
            $programStudiSearch = $this->request->getVar('programStudiSearch') ?? '';
            $jenisKeluarSearch = $this->request->getVar('jenisKeluarSearch') ?? '';
            $tanggalKeluarSearch = $this->request->getVar('tanggalKeluarSearch') ?? '';
            $tahunMasukSearch = $this->request->getVar('tahunMasukSearch') ?? '';
            $tahunKeluar = $this->request->getVar('tahunKeluar') ?? '';
            $semesterKeluar = $this->request->getVar('semesterKeluar') ?? '';


            $data['data'] = $this->ModelAlumni->get_alumni_pagination($limit, $offset, $nameSearch, $nimSearch, $programStudiSearch, $jenisKeluarSearch, $tanggalKeluarSearch, $tahunMasukSearch, $tahunKeluar, $semesterKeluar);
            $totalRecord = count($this->ModelAlumni->get_alumni($nameSearch, $nimSearch, $programStudiSearch, $jenisKeluarSearch, $tanggalKeluarSearch, $tahunMasukSearch, $tahunKeluar, $semesterKeluar));
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

    public function get_alumniv2_json()
    {
        try {
            $page = $this->request->getVar('page') ?? 1;
            $perPage = $this->request->getVar('perpage') ?? 10;
            $offset = ($page - 1) * $perPage;
            $limit = $perPage;
            $nameSearch = $this->request->getVar('nameSearch') ?? '';
            $nimSearch = $this->request->getVar('nimSearch') ?? '';
            $programStudiSearch = $this->request->getVar('programStudiSearch') ?? '';
            $jenisKeluarSearch = $this->request->getVar('jenisKeluarSearch') ?? '';
            $tahunMasukSearch = $this->request->getVar('tahunMasukSearch') ?? '';

            $data['data'] = $this->ModelAlumni->get_alumni_v2_pagiadmin_prodi_perusahaan_alumnination($limit, $offset, $nameSearch, $nimSearch, $programStudiSearch, $jenisKeluarSearch, $tahunMasukSearch);
            $totalRecord = $this->ModelAlumni->get_alumni_v2($nameSearch, $nimSearch, $programStudiSearch, $jenisKeluarSearch, $tahunMasukSearch);
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
            return json_encode($th->getMessage());
        }
    }

    // Admin
    public function admin_perusahaan_alumni()
    {
        $data['alumni'] = $this->ModelAlumni->get_perusahaan_alumni();
        return view('admin/karir_dan_pekerjaan/daftar_perusahaan_alumni', $data);
    }

    // // Admin Prodi
    // Admin Prodi Alumni View
    public function admin_prodi_daftar_alumni()
    {
        $C_KODE_PRODI = session()->get('C_KODE_PRODI');
        return view('admin-prodi/alumni/daftar_alumni');
    }

    // Admin Prodi Daftar Perusahaan Pengguna Alumni
    public function admin_prodi_perusahaan_alumni()
    {
        $C_KODE_PRODI = session()->get('C_KODE_PRODI');
        $data['alumni'] = $this->ModelAlumni->get_perusahaan_alumni_prodi($C_KODE_PRODI);
        return view('admin-prodi/karir_dan_pekerjaan/daftar_perusahaan_alumni', $data);
    }
}
