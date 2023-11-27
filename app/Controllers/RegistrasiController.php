<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRegistrasi;

class RegistrasiController extends BaseController
{
    public $ModelRegistrasi;

    public function __construct()
    {
        $this->ModelRegistrasi = new ModelRegistrasi();
    }
    public function index()
    {
        return view('admin/akademik/registrasi_alumni');
    }

    public function get_registrasi_json()
    {
        try {
            $page = $this->request->getVar('page') ?? 1;
            $perPage = $this->request->getVar('perpage') ?? 10;
            $offset = ($page - 1) * $perPage;
            $limit = $perPage;
            $nameSearch = $this->request->getVar('nameSearch');
            $nimSearch = $this->request->getVar('nimSearch');

            $data['data'] = $this->ModelRegistrasi->get_registrasi_pagination($limit, $offset, $nameSearch, $nimSearch);
            $totalRecord = count($this->ModelRegistrasi->get_registrasi($nameSearch, $nimSearch));
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
