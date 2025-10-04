<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AnggotaModel; // Pastikan model sudah dipanggil

class AnggotaController extends BaseController
{
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
            'jabatan_anggota'   => '',
            'status_pernikahan' => 'Belum Kawin' // Nilai default untuk dropdown
        ];
        
        return view('admin/anggota_new', $data);
    }
}