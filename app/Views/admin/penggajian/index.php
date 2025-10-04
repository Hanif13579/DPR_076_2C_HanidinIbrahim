<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-4">Pengaturan Gaji Anggota</h1>

<?php if (session()->getFlashdata('success')) : ?>
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">Sukses!</strong>
    <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
</div>
<?php endif; ?>

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama Anggota</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <?php foreach ($anggota as $row) : ?>
            <tr class="border-b">
                <td class="py-3 px-4"><?= esc($row['nama_depan'] . ' ' . $row['nama_belakang']) ?></td>
                <td class="py-3 px-4 text-center">
                    <a href="<?= base_url('admin/penggajian/atur/' . $row['id_anggota']) ?>" class="bg-indigo-500 text-white py-1 px-3 rounded hover:bg-indigo-600">
                        Atur Gaji
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>