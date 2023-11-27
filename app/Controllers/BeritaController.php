<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBerita;

class BeritaController extends BaseController
{
    public $ModelBerita;
    public function __construct()
    {
        $this->ModelBerita = new ModelBerita();
    }

    public function index()
    {
        try {
            $page = $this->request->getGet('page') ?? 1;
            $search = $this->request->getGet('search') ?? '';

            $perPage = 5;
            $offset = ($page - 1) * $perPage;
            $data['berita'] = $this->ModelBerita->get_berita_pagination($perPage, $offset, $search);
            $totalPosts = $this->ModelBerita->get_all_berita_by_search($search);
            $data['pagination_count'] = ceil(count($totalPosts) / $perPage);
            $data['perPage'] = $perPage;
            $data['totalRecords'] = count($totalPosts);
            $data['filter'] = [
                'search' => $search,
            ];
            return view('berita', $data);
        } catch (\Exception $th) {
            return redirect()->to(base_url('berita'));
        }
    }

    public function detail($berita_hash){
        try {
            $data['berita'] = $this->ModelBerita->get_detail_berita($berita_hash);
            $data['all_berita'] = $this->ModelBerita->get_all_berita();
            return view('detail-berita', $data);
        } catch (\Exception $th) {
            return redirect()->to(base_url('berita'));
        }
    }

    // Admin
    public function admin_berita(){
        return view('admin/informasi_dan_berita/berita');
    }

    public function admin_artikel(){
        return view('admin/informasi_dan_berita/artikel');
    }

    public function admin_event(){
        return view('admin/informasi_dan_berita/event');
    }
}
