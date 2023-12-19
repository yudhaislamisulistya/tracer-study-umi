<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPortalAlumni;

class PortalAlumniController extends BaseController
{
    public $ModelPortalAlumni;
    public function __construct()
    {
        $this->ModelPortalAlumni = new ModelPortalAlumni();
    }

    public function index()
    {
        try {
            $page = $this->request->getGet('page') ?? 1;
            $search = $this->request->getGet('search') ?? '';

            $data = [];

            $paginationData = $this->ModelPortalAlumni->get_alumni_pagination($page, 20, $search);


            $data['alumni'] = $paginationData->items;
            $data['pagination_count'] = $paginationData->total_pages - 1;
            $data['perPage'] = $paginationData->size;
            $data['totalRecords'] = $paginationData->total;
            $data['filter'] = [
                'search' => $search,
            ];

            return view('portal-alumni', $data);
        } catch (\Exception $th) {
            return redirect()->to(base_url('portal-alumni'));
        }
    }
}
