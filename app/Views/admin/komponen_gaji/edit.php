<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold mb-4">Edit Komponen Gaji</h1>
    
    <div class="bg-white p-6 rounded shadow-md">
        <form action="<?= base_url('/admin/komponen-gaji/update/' . $komponen_gaji['id_komponen_gaji']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label for="nama_komponen" class="block text-gray-700 font-semibold mb-2">Nama Komponen (Wajib)</label>
                        <input type="text" name="nama_komponen" id="nama_komponen" value="<?= old('nama_komponen', $komponen_gaji['nama_komponen']) ?>" class="w-full border rounded px-3 py-2">
                        <?php if (session('errors.nama_komponen')) : ?>
                            <p class="text-red-500 text-sm mt-1"><?= session('errors.nama_komponen') ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="kategori" class="block text-gray-700 font-semibold mb-2">Kategori (Wajib)</label>
                        <select name="kategori" id="kategori" class="w-full border rounded px-3 py-2">
                            <?php foreach ($kategori_options as $kategori) : ?>
                                <option value="<?= $kategori ?>" <?= (old('kategori', $komponen_gaji['kategori']) == $kategori) ? 'selected' : '' ?>>
                                    <?= $kategori ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (session('errors.kategori')) : ?>
                            <p class="text-red-500 text-sm mt-1"><?= session('errors.kategori') ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="nominal" class="block text-gray-700 font-semibold mb-2">Nominal (Wajib)</label>
                        <input type="number" name="nominal" id="nominal" value="<?= old('nominal', $komponen_gaji['nominal']) ?>" class="w-full border rounded px-3 py-2">
                        <?php if (session('errors.nominal')) : ?>
                            <p class="text-red-500 text-sm mt-1"><?= session('errors.nominal') ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <div class="mb-4">
                        <label for="jabatan" class="block text-gray-700 font-semibold mb-2">Berlaku untuk Jabatan (Wajib)</label>
                        <select name="jabatan" id="jabatan" class="w-full border rounded px-3 py-2">
                            <?php foreach ($jabatan_options as $jabatan) : ?>
                                <option value="<?= $jabatan ?>" <?= (old('jabatan', $komponen_gaji['jabatan']) == $jabatan) ? 'selected' : '' ?>>
                                    <?= $jabatan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (session('errors.jabatan')) : ?>
                            <p class="text-red-500 text-sm mt-1"><?= session('errors.jabatan') ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4">
                        <label for="satuan" class="block text-gray-700 font-semibold mb-2">satuan Pembayaran (Wajib)</label>
                        <select name="satuan" id="satuan" class="w-full border rounded px-3 py-2">
                            <?php foreach ($satuan_options as $satuan) : ?>
                                <option value="<?= $satuan ?>" <?= (old('satuan', $komponen_gaji['satuan']) == $satuan) ? 'selected' : '' ?>>
                                    <?= $satuan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                         <?php if (session('errors.satuan')) : ?>
                            <p class="text-red-500 text-sm mt-1"><?= session('errors.satuan') ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 border-t pt-4">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Update Komponen</button>
                <a href="<?= base_url('/admin/komponen-gaji') ?>" class="ml-4 text-gray-600">Batal</a>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>