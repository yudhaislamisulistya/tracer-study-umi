<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LowonganKerjaController extends BaseController
{
    public function index()
    {
        return view('lowongan-kerja');
    }
}
