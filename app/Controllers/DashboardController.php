<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        // Tampilkan halaman dashboard
        return view('dashboard'); // Pastikan view-nya bernama 'dashboard.php'
    }
}