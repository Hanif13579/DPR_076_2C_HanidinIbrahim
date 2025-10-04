<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        // Cukup tampilkan file view untuk dashboard
        return view('admin/dashboard');
    }
}