<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KabupatenKotaController extends BaseController
{
    public function index()
    {
        return view('admin/manajemen_data/kabupaten_kota');
    }
}
