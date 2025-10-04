<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Kelola Data Anggota</h1>

    <a href="<?= base_url('/admin/anggota/new') ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Tambah Anggota Baru
    </a>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">No</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama Lengkap</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Jabatan</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Status Pernikahan</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php $no = 1; ?>
                <?php foreach ($anggota as $row) : ?>
                    <tr class="border-b">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4">
                            <?php
                                // Menggabungkan nama depan dan belakang
                                $namaLengkap = trim($row['nama_depan'] . ' ' . $row['nama_belakang']);
                                echo esc($namaLengkap);
                            ?>
                        </td>
                        <td class="py-3 px-4"><?= esc($row['jabatan']); ?></td>
                        <td class="py-3 px-4"><?= esc($row['status_pernikahan']); ?></td>
                        <td class="py-3 px-4 text-center">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>