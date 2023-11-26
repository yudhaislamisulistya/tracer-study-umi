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
}
