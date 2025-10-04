// app/Views/admin/penggajian/index.php
<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="text-2xl font-bold mb-4">Pengaturan Gaji Anggota</h1>
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
                    <a href="#" class="bg-gray-400 text-white py-1 px-3 rounded cursor-not-allowed">
                        Atur Gaji
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>