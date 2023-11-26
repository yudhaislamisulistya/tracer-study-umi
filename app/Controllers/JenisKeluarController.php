<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JenisKeluarController extends BaseController
{
    public function index()
    {
        return view('admin/manajemen_data/jenis_keluar');
    }
}
