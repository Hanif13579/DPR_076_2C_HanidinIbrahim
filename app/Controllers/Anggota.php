<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\PenggajianModel; // Kita perlukan ini untuk halaman detail nanti

class Anggota extends BaseController
{
    /**
     * Menampilkan halaman daftar anggota untuk publik.
     */
    public function index()
    {
        $anggotaModel = new AnggotaModel();
        $data['anggota'] = $anggotaModel->findAll();
        
        // Buat folder 'public' di dalam Views agar rapi
        return view('public/anggota_list', $data);
    }

    /**
     * Menampilkan halaman detail gaji per anggota untuk publik.
     */
    public function detail($id_anggota)
    {
        $anggotaModel = new AnggotaModel();
        $penggajianModel = new PenggajianModel();

        // Ambil data anggota
        $data['anggota'] = $anggotaModel->find($id_anggota);

        // Jika anggota tidak ditemukan, tampilkan error 404
        if (!$data['anggota']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anggota tidak ditemukan');
        }

        // Ambil data komponen gaji yang dimiliki anggota ini (sama seperti di admin)
        $data['komponen_dimiliki'] = $penggajianModel
            ->select('komponen_gaji.nama_komponen, komponen_gaji.kategori, komponen_gaji.nominal, komponen_gaji.satuan')
            ->join('komponen_gaji', 'komponen_gaji.id_komponen_gaji = penggajian.id_komponen_gaji')
            ->where('penggajian.id_anggota', $id_anggota)
            ->findAll();
        
        return view('public/gaji_detail', $data);
    }
}