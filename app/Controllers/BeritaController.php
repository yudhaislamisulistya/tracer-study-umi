<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BeritaController extends BaseController
{
    public function index()
    {
        return view('berita');
    }
}
