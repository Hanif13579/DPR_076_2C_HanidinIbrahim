<?= $this->extend('layout/public_template') ?>

<?php $this->section('title') ?>Detail Gaji: <?= esc($anggota['nama_depan']) ?><?php $this->endSection() ?>

<?= $this->section('content') ?>

    <h1 class="text-3xl font-bold mb-1 text-center">
        Detail Gaji: <?= esc($anggota['nama_depan'] . ' ' . $anggota['nama_belakang']) ?>
    </h1>
    <p class="text-gray-600 mb-6 text-center">Jabatan: <?= esc($anggota['jabatan']) ?></p>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama Komponen</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Kategori</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Nominal</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php if (empty($komponen_dimiliki)) : ?>
                    <tr><td colspan="3" class="text-center py-4">Anggota ini belum memiliki komponen gaji.</td></tr>
                <?php else : ?>
                    <?php $total = 0; ?>
                    <?php foreach ($komponen_dimiliki as $komponen) : ?>
                    <tr class="border-b">
                        <td class="py-3 px-4"><?= esc($komponen['nama_komponen']) ?></td>
                        <td class="py-3 px-4"><?= esc($komponen['kategori']) ?></td>
                        <td class="py-3 px-4 text-right">
                            <?php
                                $nominal = floatval($komponen['nominal']);
                                echo 'Rp ' . number_format($nominal, 0, ',', '.');
                                $total += $nominal;
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="bg-gray-100 font-bold">
                        <td colspan="2" class="py-3 px-4 text-right">TOTAL GAJI KOTOR</td>
                        <td class="py-3 px-4 text-right"><?= 'Rp ' . number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-center">
        <a href="<?= base_url('/anggota') ?>" class="text-indigo-600 hover:underline">
            &larr; Kembali ke Daftar Anggota
        </a>
    </div>

<?= $this->endSection() ?>