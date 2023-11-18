<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PortalAlumniController extends BaseController
{
    public function index()
    {
        return view('portal-alumni');
    }
}
