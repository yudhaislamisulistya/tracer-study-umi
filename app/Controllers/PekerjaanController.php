<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PekerjaanController extends BaseController
{
    public function index()
    {
        return view('admin/manajemen_data/pekerjaan');
    }
}
