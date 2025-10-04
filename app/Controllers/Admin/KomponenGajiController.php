<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KomponenGajiModel;

class KomponenGajiController extends BaseController
{
    /**
     * Menampilkan halaman utama dengan tabel data komponen gaji.
     */
    public function index()
    {
        $komponenGajiModel = new KomponenGajiModel();
        
        $data = [
            'komponen_gaji' => $komponenGajiModel->findAll()
        ];
        
        return view('admin/komponen_gaji/index', $data);
    }

    /**
     * Menampilkan form untuk menambah data baru.
     */
    public function new()
    {
        return view('admin/komponen_gaji/new');
    }

    /**
     * Memproses penyimpanan data baru ke database.
     */
    public function create()
    {
        // 1. Aturan validasi
        $rules = [
            'nama_komponen'  => 'required|max_length[100]',
            'jenis_komponen' => 'required|in_list[Tunjangan,Potongan]'
        ];

        // 2. Lakukan validasi
        if (!$this->validate($rules)) {
            // Jika gagal, kembali ke form dengan error dan input lama
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 3. Jika berhasil, simpan data
        $komponenGajiModel = new KomponenGajiModel();
        $komponenGajiModel->insert([
            'nama_komponen'  => $this->request->getPost('nama_komponen'),
            'jenis_komponen' => $this->request->getPost('jenis_komponen'),
        ]);

        // 4. Set pesan sukses dan redirect
        session()->setFlashdata('success', 'Komponen gaji berhasil ditambahkan.');
        return redirect()->to('/admin/komponen-gaji');
    }
}