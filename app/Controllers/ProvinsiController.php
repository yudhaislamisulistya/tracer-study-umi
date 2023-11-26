<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProvinsiController extends BaseController
{
    public function index()
    {
        return view('admin/manajemen_data/provinsi');
    }
}
