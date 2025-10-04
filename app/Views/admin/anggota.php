<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Kelola Data Anggota</h1>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline"><?= session()->getFlashdata('success') ?></span>
        </div>
    <?php endif; ?>

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
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php $no = 1; ?>
                <?php foreach ($anggota as $row) : ?>
                    <tr class="border-b">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4">
                            <?php
                                // Menggabungkan gelar dan nama menjadi satu string yang rapi
                                $namaLengkap = trim(($row['gelar_depan'] ? $row['gelar_depan'] . ' ' : '') . $row['nama_depan'] . ' ' . $row['nama_belakang'] . ($row['gelar_belakang'] ? ', ' . $row['gelar_belakang'] : ''));
                                echo esc($namaLengkap);
                            ?>
                        </td>
                        <td class="py-3 px-4"><?= esc($row['jabatan']); ?></td>
                        <td class="py-3 px-4"><?= esc($row['status_pernikahan']); ?></td>
                        <td class="py-3 px-4 text-center">
                            <a href="<?= base_url('/admin/anggota/edit/' . $row['id_anggota']) ?>" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a>
                            
                            <a href="<?= base_url('/admin/anggota/delete/' . $row['id_anggota']) ?>" class="text-red-500 hover:text-red-700 font-semibold ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($anggota)) : ?>
                    <tr>
                        <td colspan="5" class="text-center py-4">Belum ada data anggota.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>