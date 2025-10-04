<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-4">Pengaturan Gaji Anggota</h1>

<?php if (session()->getFlashdata('success')) : ?>
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">Sukses!</strong>
    <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
</div>
<?php endif; ?>

<form action="" method="get" class="mb-4">
    <div class="flex">
        <input type="text" name="keyword" class="w-full border rounded-l px-3 py-2" placeholder="Cari berdasarkan nama, jabatan, ID, atau take home pay..." value="<?= esc($keyword ?? '') ?>">
        <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded-r">Cari</button>
    </div>
</form>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama Anggota</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Jabatan</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-right">Take Home Pay</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php foreach ($anggota_gaji as $row) : ?>
            <tr class="border-b">
                <td class="py-3 px-4"><?= esc($row['nama_depan'] . ' ' . $row['nama_belakang']) ?></td>
                <td class="py-3 px-4"><?= esc($row['jabatan']) ?></td>
                <td class="py-3 px-4 text-right">
                    <?= 'Rp ' . number_format($row['take_home_pay'] ?? 0, 0, ',', '.'); ?>
                </td>
                <td class="py-3 px-4 text-center">
                    <a href="<?= base_url('admin/penggajian/detail/' . $row['id_anggota']) ?>" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">
                        Detail
                    </a>
                    <a href="<?= base_url('admin/penggajian/atur/' . $row['id_anggota']) ?>" class="bg-indigo-500 text-white py-1 px-3 rounded hover:bg-indigo-600 ml-2">
                        Atur Gaji
                    </a>
                    <a href="<?= base_url('admin/penggajian/delete/' . $row['id_anggota']) ?>" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 ml-2" onclick="return confirm('Anda yakin ingin mereset semua komponen gaji untuk anggota ini?');">
                        Reset
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>

            <?php if (empty($anggota_gaji)) : ?>
                <tr>
                    <td colspan="4" class="text-center py-4">Data tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>