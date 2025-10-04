<?php

namespace App\Models;

use CodeIgniter\Model;

class KomponenGajiModel extends Model
{
    protected $table            = 'komponen_gaji';
    protected $primaryKey       = 'id_komponen_gaji';
    protected $returnType       = 'array';

    protected $allowedFields    = ['nama_komponen', 'kategori', 'jabatan', 'nominal', 'satuan'];

    public function search($keyword)
    {
        $builder = $this->builder();

        if (!empty($keyword)) {
            $escapedKeyword = $this->db->escapeLikeString($keyword);
            
            $builder->groupStart();

            $builder->like('nama_komponen', $keyword);

            $builder->orWhere("CAST(kategori AS TEXT) ILIKE '%{$escapedKeyword}%'");
            $builder->orWhere("CAST(jabatan AS TEXT) ILIKE '%{$escapedKeyword}%'");
            $builder->orWhere("CAST(satuan AS TEXT) ILIKE '%{$escapedKeyword}%'");

            if (is_numeric($keyword)) {
                $builder->orWhere('nominal', (int)$keyword);
                $builder->orWhere('id_komponen_gaji', (int)$keyword);
            }

            $builder->groupEnd();
        }

        return $builder;
    }
}