<?= $this->extend('layout/public_template') ?>

<?php $this->section('title') ?>Daftar Anggota<?php $this->endSection() ?>

<?= $this->section('content') ?>

    <h1 class="text-3xl font-bold mb-6 text-center">Daftar Anggota</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama Lengkap</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Jabatan</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php foreach ($anggota as $row) : ?>
                    <tr class="border-b">
                        <td class="py-3 px-4">
                            <?php
                                $namaLengkap = trim(($row['gelar_depan'] ? $row['gelar_depan'] . ' ' : '') . $row['nama_depan'] . ' ' . $row['nama_belakang'] . ($row['gelar_belakang'] ? ', ' . $row['gelar_belakang'] : ''));
                                echo esc($namaLengkap);
                            ?>
                        </td>
                        <td class="py-3 px-4"><?= esc($row['jabatan']); ?></td>
                        <td class="py-3 px-4 text-center">
                            <a href="<?= base_url('anggota/detail/' . $row['id_anggota']) ?>" class="text-indigo-600 hover:underline font-semibold">
                                Lihat Detail Gaji
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?= $this->endSection() ?>