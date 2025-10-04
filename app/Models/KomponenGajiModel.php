<?php

namespace App\Models;

use CodeIgniter\Model;

class KomponenGajiModel extends Model
{
    protected $table            = 'komponen_gaji';
    protected $primaryKey       = 'id_komponen_gaji';
    protected $returnType       = 'array';

    // Sesuaikan dengan kolom di tabel komponen_gaji kamu
    protected $allowedFields    = ['nama_komponen', 'jenis_komponen', 'jumlah'];
}