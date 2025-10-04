<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $returnType = 'array';
    
    // Sesuaikan dengan kolom di tabel anggotamu
    protected $allowedFields = [
        'nama_depan', 
        'nama_belakang', 
        'gelar_depan', 
        'gelar_belakang', 
        'jabatan', 
        'status_pernikahan'
    ];

    public function search($keyword)
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $escapedKeyword = $this->db->escapeLikeString($keyword);
            
            $builder->groupStart();

            // 1. Cari di nama depan 
            $builder->like('nama_depan', $keyword);

            // 2. Cari di nama belakang 
            $builder->orLike('nama_belakang', $keyword);

            $fullName = "nama_depan || ' ' || nama_belakang";
            $builder->orWhere("{$fullName} ILIKE '%{$escapedKeyword}%'");

            // 4. Cari di Jabatan 
            $builder->orWhere("CAST(jabatan AS TEXT) ILIKE '%{$escapedKeyword}%'");

            // 5. Cari berdasarkan ID 
            if (is_numeric($keyword)) {
                $builder->orWhere('id_anggota', (int)$keyword);
            }

            $builder->groupEnd();
        }

        return $builder;
    }

}