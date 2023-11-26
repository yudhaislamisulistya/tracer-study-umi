<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProgramStudiController extends BaseController
{
    public function index()
    {
        return view('admin/akademik/program_studi');
    }
}
