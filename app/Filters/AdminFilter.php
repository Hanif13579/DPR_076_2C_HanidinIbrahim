<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah session isLoggedIn ada DAN role-nya adalah 'admin'
        if (!session()->get('isLoggedIn') || strtolower(session()->get('role')) !== 'admin') {
            // Jika tidak, tendang keluar. Bisa ke halaman login atau halaman error.
            return redirect()->to('/login')->with('error', 'Anda tidak memiliki hak akses ke halaman ini.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa setelah request
    }
}