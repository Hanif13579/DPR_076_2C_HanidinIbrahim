<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;
use App\Models\PenggajianModel;

class PenggajianController extends BaseController
{
    /**
     * Menampilkan daftar semua anggota untuk dipilih.
     */
    public function index()
    {
        $anggotaModel = new AnggotaModel();
        $keyword = $this->request->getVar('keyword');

        // Panggil method baru yang sudah menangani pencarian dan kalkulasi gaji
        $data['anggota_gaji'] = $anggotaModel->getGajiAnggota($keyword);
        $data['keyword'] = $keyword;
        
        return view('admin/penggajian/index', $data);
    }

    /**
     * Menampilkan halaman untuk mengatur komponen gaji seorang anggota.
     */
    public function atur($id_anggota)
    {
        $anggotaModel = new AnggotaModel();
        $komponenGajiModel = new KomponenGajiModel();
        $penggajianModel = new PenggajianModel();

        $data = [
            'anggota'           => $anggotaModel->find($id_anggota),
            'semua_komponen'    => $komponenGajiModel->findAll(),
            'komponen_terpilih' => $penggajianModel->getKomponenByAnggota($id_anggota) ?? []
        ];

        return view('admin/penggajian/atur', $data);
    }

    /**
     * Menyimpan pengaturan komponen gaji untuk seorang anggota.
     */
    public function save($id_anggota)
    {
        $penggajianModel = new PenggajianModel();
        
        // 1. Ambil ID komponen yang dicentang dari form
        $komponenIds = $this->request->getPost('komponen_ids') ?? [];

        // 2. Hapus semua pengaturan lama untuk anggota ini
        $penggajianModel->where('id_anggota', $id_anggota)->delete();

        // 3. Masukkan pengaturan baru jika ada yang dicentang
        if (!empty($komponenIds)) {
            $dataToInsert = [];
            foreach ($komponenIds as $komponenId) {
                $dataToInsert[] = [
                    'id_anggota' => $id_anggota,
                    'id_komponen_gaji' => $komponenId
                ];
            }
            $penggajianModel->insertBatch($dataToInsert);
        }

        session()->setFlashdata('success', 'Pengaturan gaji untuk anggota berhasil diperbarui.');
        return redirect()->to('/admin/penggajian');
    }

    // ... (method index, atur, save biarkan seperti sebelumnya)

    /**
     * Menghapus (mereset) semua komponen gaji untuk seorang anggota.
     */
    public function delete($id_anggota)
    {
        $penggajianModel = new PenggajianModel();
        
        // Hapus semua data di tabel penggajian berdasarkan id_anggota
        $penggajianModel->where('id_anggota', $id_anggota)->delete();

        session()->setFlashdata('success', 'Pengaturan gaji untuk anggota berhasil direset.');
        return redirect()->to('/admin/penggajian');
    }

    /**
     * Menampilkan detail komponen gaji yang dimiliki seorang anggota.
     */
    public function detail($id_anggota)
    {
        $anggotaModel = new AnggotaModel();
        $penggajianModel = new PenggajianModel();

        // Ambil data anggota
        $data['anggota'] = $anggotaModel->find($id_anggota);

        // Ambil data komponen gaji yang dimiliki anggota ini
        // dengan menggabungkan (JOIN) tabel penggajian dan komponen_gaji
        $data['komponen_dimiliki'] = $penggajianModel
            ->select('komponen_gaji.nama_komponen, komponen_gaji.kategori, komponen_gaji.nominal, komponen_gaji.satuan')
            ->join('komponen_gaji', 'komponen_gaji.id_komponen_gaji = penggajian.id_komponen_gaji')
            ->where('penggajian.id_anggota', $id_anggota)
            ->findAll();

        return view('admin/penggajian/detail', $data);
    }

}