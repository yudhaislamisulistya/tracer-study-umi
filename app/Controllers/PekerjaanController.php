<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PekerjaanController extends BaseController
{
    public function index()
    {
        return view('admin/manajemen_data/pekerjaan');
    }

    public function index2(){
        return view('admin/karir_dan_pekerjaan/daftar_pekerjaan_alumni');
    }
}
