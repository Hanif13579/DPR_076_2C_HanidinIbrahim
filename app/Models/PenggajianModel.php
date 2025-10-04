<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table            = 'penggajian';
    // Karena tabel ini tidak punya primary key tunggal, kita biarkan kosong
    // dan akan menangani insert/delete secara manual.
    protected $primaryKey       = null; 
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_anggota', 'id_komponen_gaji'];

    /**
     * Mengambil semua ID komponen gaji untuk seorang anggota.
     */
    public function getKomponenByAnggota($id_anggota)
    {
        return $this->where('id_anggota', $id_anggota)
                    ->findColumn('id_komponen_gaji');
    }
}