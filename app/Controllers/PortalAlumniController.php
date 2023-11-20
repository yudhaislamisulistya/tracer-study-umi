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

            $perPage = 12;
            $offset = ($page - 1) * $perPage;
            $data['alumni'] = $this->ModelPortalAlumni->get_alumni_pagination($perPage, $offset, $search);
            $totalPosts = $this->ModelPortalAlumni->get_all_alumni_by_search($search);
            $data['pagination_count'] = ceil(count($totalPosts) / $perPage);
            $data['perPage'] = $perPage;
            $data['totalRecords'] = count($totalPosts);
            $data['filter'] = [
                'search' => $search,
            ];

            return view('portal-alumni', $data);
        } catch (\Exception $th) {
            return redirect()->to(base_url('portal-alumni'));
        }
    }
}
