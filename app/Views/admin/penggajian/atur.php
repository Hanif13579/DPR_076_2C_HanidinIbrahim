<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h1 class="text-2xl font-bold mb-4">
    Atur Komponen Gaji untuk: <?= esc($anggota['nama_depan'] . ' ' . $anggota['nama_belakang']) ?>
</h1>

<div class="bg-white p-6 rounded shadow-md">
    <form action="<?= base_url('admin/penggajian/save/' . $anggota['id_anggota']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($semua_komponen as $komponen) : ?>
                <?php 
                    // Cek apakah komponen ini sudah dimiliki oleh anggota
                    $isChecked = in_array($komponen['id_komponen_gaji'], $komponen_terpilih);
                ?>
                <label class="flex items-center p-3 border rounded-lg hover:bg-gray-50">
                    <input type="checkbox" name="komponen_ids[]" value="<?= $komponen['id_komponen_gaji'] ?>"
                        class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                        <?= $isChecked ? 'checked' : '' ?>>
                    <span class="ml-3 text-gray-700"><?= esc($komponen['nama_komponen']) ?></span>
                </label>
            <?php endforeach; ?>
        </div>

        <div class="mt-6 border-t pt-4">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                Simpan Pengaturan
            </button>
            <a href="<?= base_url('/admin/penggajian') ?>" class="ml-4 text-gray-600">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>