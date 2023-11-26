<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StatusPekerjaanController extends BaseController
{
    public function index()
    {
        return view('admin/manajemen_data/status_pekerjaan');
    }

    public function index2(){
        return view('admin/karir_dan_pekerjaan/status_pekerjaan_alumni');
    }
}
