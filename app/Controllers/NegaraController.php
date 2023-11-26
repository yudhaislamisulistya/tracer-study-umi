<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NegaraController extends BaseController
{
    public function index()
    {
        return view('admin/manajemen_data/negara');
    }
}
