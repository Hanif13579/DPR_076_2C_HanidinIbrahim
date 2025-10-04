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

    /**
     * Method untuk menampilkan form tambah anggota baru (Create).
     * PENTING: Method ini juga mengirimkan struktur array kosong
     * agar tidak terjadi error "Undefined array key" di view form.
     */
    public function new()
    {
        // Siapkan data default (kosong) untuk dikirim ke view
        $data['anggota'] = [
            'id_anggota'        => null,
            'nama_depan'        => '',
            'nama_belakang'     => '',
            'gelar_depan'       => '',
            'gelar_belakang'    => '',
            'jabatan'   => '',
            'status_pernikahan' => 'Belum Kawin' // Nilai default untuk dropdown
        ];

        $data['jabatan_options'] = ['Ketua', 'Wakil Ketua', 'Anggota'];
        
        return view('admin/anggota_new', $data);
    }

    /**
     * Method untuk memproses penyimpanan data anggota baru ke database (Create).
     */
    public function create()
    {
        $anggotaModel = new AnggotaModel();
        
        // Ambil data dari form input
        $data = [
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
        ];

        // Simpan data ke database
        $anggotaModel->insert($data);

        session()->setFlashdata('success', 'Data anggota berhasil ditambahkan.');
        // Arahkan kembali ke halaman utama kelola anggota
        return redirect()->to('/admin/anggota');
    }

    /**
     * Method untuk menampilkan form edit data anggota (Update).
     * Method ini mengambil data spesifik berdasarkan ID.
     */
    public function edit($id)
    {
        $anggotaModel = new AnggotaModel();
        $data['anggota'] = $anggotaModel->find($id); // Cari data berdasarkan ID
        $data['jabatan_options'] = ['Ketua', 'Wakil Ketua', 'Anggota'];
        return view('admin/anggota_edit', $data); // Kirim data yang ditemukan ke view
    }

    /**
     * Method untuk memproses pembaruan data anggota di database (Update).
     */
    public function update($id)
    {
        $anggotaModel = new AnggotaModel();

        // Ambil data dari form input
        $data = [
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
        ];

        // Update data di database berdasarkan ID
        $anggotaModel->update($id, $data);

        // Arahkan kembali ke halaman utama kelola anggota
        return redirect()->to('/admin/anggota');
    }
}