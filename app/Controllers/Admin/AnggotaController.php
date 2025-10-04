<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnggotaModel; // Pastikan model sudah dipanggil

class AnggotaController extends BaseController
{
    /**
     * Method untuk menampilkan halaman utama Kelola Anggota (Read).
     * Method ini mengambil semua data anggota dan menampilkannya dalam sebuah tabel.
     */
    public function index()
    {
        $anggotaModel = new AnggotaModel();
        $data['anggota'] = $anggotaModel->findAll(); // Ambil semua data
        return view('admin/anggota', $data); // Kirim data ke view
    }

    // Method untuk menampilkan form tambah anggota baru
    public function new()
    {
        $data['anggota'] = [
            'id_anggota'        => null,
            'nama_depan'        => '',
            'nama_belakang'     => '',
            'gelar_depan'       => '', // Ditambahkan
            'gelar_belakang'    => '', // Ditambahkan
            'jabatan'           => '',
            'status_pernikahan' => 'Belum Kawin'
        ];
        $data['jabatan_options'] = ['Ketua', 'Wakil Ketua', 'Anggota', 'Sekretaris', 'Bendahara'];
        
        return view('admin/anggota_new', $data);
    }

    // Method untuk memproses penyimpanan data anggota baru
    public function create()
    {
        $rules = [
            'nama_depan' => 'required|alpha_space|max_length[100]',
            'jabatan'    => 'required|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $anggotaModel = new AnggotaModel();
        $data = [
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'gelar_depan'       => $this->request->getPost('gelar_depan'), // Ditambahkan
            'gelar_belakang'    => $this->request->getPost('gelar_belakang'), // Ditambahkan
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
        ];

        $anggotaModel->insert($data);

        session()->setFlashdata('success', 'Data anggota berhasil ditambahkan.');
        return redirect()->to('/admin/anggota/list');
    }

    // Method untuk menampilkan form edit data anggota
    public function edit($id)
    {
        $anggotaModel = new AnggotaModel();
        $data['anggota'] = $anggotaModel->find($id);
        $data['jabatan_options'] = ['Ketua', 'Wakil Ketua', 'Anggota', 'Sekretaris', 'Bendahara'];
        
        return view('admin/anggota_edit', $data);
    }

    // Method untuk memproses pembaruan data anggota
    public function update($id)
    {
        $rules = [
            'nama_depan' => 'required|alpha_space|max_length[100]',
            'jabatan'    => 'required|max_length[50]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $anggotaModel = new AnggotaModel();
        $data = [
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'gelar_depan'       => $this->request->getPost('gelar_depan'), // Ditambahkan
            'gelar_belakang'    => $this->request->getPost('gelar_belakang'), // Ditambahkan
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
        ];

        $anggotaModel->update($id, $data);

        session()->setFlashdata('success', 'Data anggota berhasil diubah.');
        return redirect()->to('/admin/anggota');
    }

    /**
     * Method untuk menghapus data anggota dari database (Delete).
     */
    public function delete($id)
    {
        $anggotaModel = new AnggotaModel();
        $anggotaModel->delete($id); // Hapus data berdasarkan ID
        return redirect()->to('/admin/anggota'); // Arahkan kembali
    }
}