<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold mb-4">Tambah Komponen Gaji Baru</h1>
    
    <div class="bg-white p-6 rounded shadow-md">
        <form action="<?= base_url('/admin/komponen-gaji/create') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label for="nama_komponen" class="block text-gray-700">Nama Komponen (Wajib)</label>
                <input type="text" name="nama_komponen" id="nama_komponen" value="<?= old('nama_komponen', $komponen_gaji['nama_komponen']) ?>" class="w-full border rounded px-3 py-2">
                <?php if (session('errors.nama_komponen')) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= session('errors.nama_komponen') ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-gray-700">Jenis Komponen (Wajib)</label>
                <select name="kategori" id="kategori" class="w-full border rounded px-3 py-2">
                    <option value="Tunjangan" <?= (old('kategori', $komponen_gaji['kategori']) == 'Tunjangan') ? 'selected' : '' ?>>Tunjangan</option>
                    <option value="Potongan" <?= (old('kategori', $komponen_gaji['kategori']) == 'Potongan') ? 'selected' : '' ?>>Potongan</option>
                </select>
                 <?php if (session('errors.kategori')) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= session('errors.kategori') ?></p>
                <?php endif; ?>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Simpan Komponen</button>
                <a href="<?= base_url('/admin/komponen-gaji') ?>" class="ml-4 text-gray-600">Batal</a>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>