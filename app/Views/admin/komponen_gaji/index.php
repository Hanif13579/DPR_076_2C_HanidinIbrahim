<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Kelola Komponen Gaji</h1>

    <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Tambah Komponen Baru
    </a>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">No</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nama Komponen</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Kategori</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Jabatan</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Nominal</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Satuan</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php $no = 1; ?>
                <?php foreach ($komponen_gaji as $kg) : ?>
                    <tr class="border-b">
                        <td class="py-3 px-4"><?= $no++; ?></td>
                        <td class="py-3 px-4"><?= esc($kg['nama_komponen']); ?></td>
                        <td class="py-3 px-4"><?= esc($kg['kategori']); ?></td>
                        <td class="py-3 px-4"><?= esc($kg['jabatan']); ?></td>
                        <td class="py-3 px-4"><?= esc($kg['nominal']); ?></td>
                        <td class="py-3 px-4"><?= esc($kg['satuan']); ?></td>

                        <td class="py-3 px-4 text-center">
                        </td>
                    </tr>
                <?php endforeach; ?>
                
                <?php if (empty($komponen_gaji)) : ?>
                    <tr>
                        <td colspan="4" class="text-center py-4">Belum ada data komponen gaji.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>