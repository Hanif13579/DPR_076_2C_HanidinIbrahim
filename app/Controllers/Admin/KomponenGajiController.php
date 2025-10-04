<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KomponenGajiModel;

class KomponenGajiController extends BaseController
{
    public function index()
    {
        $komponenGajiModel = new KomponenGajiModel();
        $data = [
            'komponen_gaji' => $komponenGajiModel->findAll()
        ];
        return view('admin/komponen_gaji/index', $data);
    }

    public function new()
    {
        // Siapkan data default untuk form
        $data['komponen_gaji'] = [
            'id_komponen_gaji' => null,
            'nama_komponen'    => '',
            'kategori'         => '',
            'nominal'          => '',
            'jabatan'          => '',
            'satuan'           => 'Bulan'
        ];

        // Siapkan pilihan untuk setiap dropdown
        $data['kategori_options'] = ['Gaji Pokok', 'Tunjangan Lain', 'Tunjangan Melekat'];
        $data['jabatan_options']  = ['Ketua', 'Wakil Ketua', 'Anggota', 'Semua'];
        $data['satuan_options']  = ['Bulan', 'Periode'];

        return view('admin/komponen_gaji/new', $data);
    }

    public function create()
    {
        // 1. Aturan validasi disesuaikan dengan pilihan di form
        $rules = [
            'nama_komponen' => 'required|max_length[100]',
            'kategori'      => 'required|in_list[Gaji Pokok,Tunjangan Lain,Tunjangan Melekat]',
            'nominal'       => 'required|numeric',
            'jabatan'       => 'required|in_list[Ketua,Wakil Ketua,Anggota,Semua]',
            'satuan'        => 'required|in_list[Bulan,Periode]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Jika berhasil, simpan SEMUA data
        $komponenGajiModel = new KomponenGajiModel();
        $komponenGajiModel->insert([
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'nominal'       => $this->request->getPost('nominal'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'satuan'       => $this->request->getPost('satuan'),
        ]);

        session()->setFlashdata('success', 'Komponen gaji berhasil ditambahkan.');
        return redirect()->to('/admin/komponen-gaji');
    }
    // ... (method index, new, create biarkan seperti sebelumnya)

    /**
     * Menampilkan form untuk mengedit data berdasarkan ID.
     */
    public function edit($id)
    {
        $komponenGajiModel = new KomponenGajiModel();
        
        $data['komponen_gaji'] = $komponenGajiModel->find($id);

        // Siapkan juga pilihan untuk semua dropdown
        $data['kategori_options'] = ['Gaji Pokok', 'Tunjangan Lain', 'Tunjangan Melekat'];
        $data['jabatan_options']  = ['Ketua', 'Wakil Ketua', 'Anggota', 'Semua'];
        $data['satuan_options']  = ['Bulan', 'Periode'];

        return view('admin/komponen_gaji/edit', $data);
    }

    /**
     * Memproses pembaruan data di database.
     */
    public function update($id)
    {
        // Aturan validasi sama seperti di method create
        $rules = [
            'nama_komponen' => 'required|max_length[100]',
            'kategori'      => 'required|in_list[Gaji Pokok,Tunjangan Lain,Tunjangan Melekat]',
            'nominal'       => 'required|numeric',
            'jabatan'       => 'required|in_list[Ketua,Wakil Ketua,Anggota,Semua]',
            'satuan'       => 'required|in_list[Bulan,Periode]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $komponenGajiModel = new KomponenGajiModel();
        $data = [
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'nominal'       => $this->request->getPost('nominal'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'satuan'       => $this->request->getPost('satuan'),
        ];

        // Gunakan method update dari model
        $komponenGajiModel->update($id, $data);

        session()->setFlashdata('success', 'Komponen gaji berhasil diubah.');
        return redirect()->to('/admin/komponen-gaji');
    }
}