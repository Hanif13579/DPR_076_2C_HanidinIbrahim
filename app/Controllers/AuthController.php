<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        // Menampilkan halaman login
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari user di database
        $user = $model->getUserByUsername($username);

        // Verifikasi
        if ($user && password_verify($password, $user['password'])) {
            // Jika berhasil, siapkan data session
            $sessionData = [
                'id_pengguna'  => $user['id_pengguna'],
                'username' => $user['username'],
                'role'     => $user['role'],
                'isLoggedIn' => TRUE
            ];
            $session->set($sessionData);

            // Redirect berdasarkan role
            if (strtolower($user['role']) == 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/dashboard');
            }
        } else {
            // Jika gagal, kembali ke login dengan pesan error
            $session->setFlashdata('error', 'Username atau Password salah.');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}