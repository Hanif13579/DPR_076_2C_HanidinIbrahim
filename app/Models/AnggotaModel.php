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
    /**
     * Mengambil data anggota beserta total gaji (take home pay)
     * dan mengimplementasikan fungsionalitas pencarian.
     */
    public function getGajiAnggota($keyword = null)
    {
        // 1. Buat Subquery untuk menghitung Take Home Pay
        //    Ini akan menjadi seperti "tabel virtual" sementara.
        $subquery = $this->db->table('anggota a')
            ->select("a.id_anggota, a.nama_depan, a.nama_belakang, a.gelar_depan, a.gelar_belakang, a.jabatan, COALESCE(SUM(kg.nominal), 0) as take_home_pay")
            ->join('penggajian p', 'a.id_anggota = p.id_anggota', 'left')
            ->join('komponen_gaji kg', 'p.id_komponen_gaji = kg.id_komponen_gaji', 'left')
            ->groupBy('a.id_anggota');

        // 2. Buat Query Utama yang mengambil data DARI Subquery
        //    Perhatikan 'fromSubquery', kita menggunakan hasil subquery sebagai tabel utama.
        $builder = $this->db->newQuery()->fromSubquery($subquery, 'hasil_gaji');

        // 3. Lakukan pencarian di Query Utama
        if (!empty($keyword)) {
            $escapedKeyword = $this->db->escapeLikeString($keyword);
            $numericKeyword = preg_replace('/[^0-9]/', '', $keyword);

            $builder->groupStart();

            // Sekarang semua pencarian ada di level yang sama (WHERE)
            $builder->like('nama_depan', $keyword);
            $builder->orLike('nama_belakang', $keyword);
            $builder->orWhere("CAST(jabatan AS TEXT) ILIKE '%{$escapedKeyword}%'");
            
            if (!empty($numericKeyword)) {
                $builder->orWhere('id_anggota', (int)$numericKeyword);
                // 'take_home_pay' sekarang adalah kolom biasa, jadi bisa pakai 'orWhere'
                $builder->orWhere('take_home_pay', (int)$numericKeyword);
            }
            
            $builder->groupEnd();
        }

        $builder->orderBy('nama_depan', 'ASC');

        return $builder->get()->getResultArray();
    }
}