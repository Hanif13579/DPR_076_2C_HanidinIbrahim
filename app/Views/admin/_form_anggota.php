<?= csrf_field() ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label for="gelar_depan" class="block text-gray-700">Gelar Depan</label>
        <input type="text" name="gelar_depan" id="gelar_depan" value="<?= old('gelar_depan', $anggota['gelar_depan'] ?? '') ?>" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label for="gelar_belakang" class="block text-gray-700">Gelar Belakang</label>
        <input type="text" name="gelar_belakang" id="gelar_belakang" value="<?= old('gelar_belakang', $anggota['gelar_belakang'] ?? '') ?>" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label for="nama_depan" class="block text-gray-700">Nama Depan (Wajib)</label>
        <input type="text" name="nama_depan" id="nama_depan" value="<?= old('nama_depan', $anggota['nama_depan'] ?? '') ?>" class="w-full border rounded px-3 py-2">
        <?php if (session('errors.nama_depan')) : ?>
            <p class="text-red-500 text-sm mt-1"><?= session('errors.nama_depan') ?></p>
        <?php endif; ?>
    </div>
    <div>
        <label for="nama_belakang" class="block text-gray-700">Nama Belakang</label>
        <input type="text" name="nama_belakang" id="nama_belakang" value="<?= old('nama_belakang', $anggota['nama_belakang'] ?? '') ?>" class="w-full border rounded px-3 py-2">
    </div>
    <div>
        <label for="jabatan" class="block text-gray-700">Jabatan (Wajib)</label>
        <select name="jabatan" id="jabatan" class="w-full border rounded px-3 py-2">
            <?php foreach ($jabatan_options as $jabatan_opt) : ?>
                <option value="<?= $jabatan_opt ?>" <?= (old('jabatan', $anggota['jabatan'] ?? '') == $jabatan_opt) ? 'selected' : '' ?>>
                    <?= $jabatan_opt ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (session('errors.jabatan')) : ?>
            <p class="text-red-500 text-sm mt-1"><?= session('errors.jabatan') ?></p>
        <?php endif; ?>
    </div>
    <div>
        <label for="status_pernikahan" class="block text-gray-700">Status Pernikahan</label>
        <select name="status_pernikahan" id="status_pernikahan" class="w-full border rounded px-3 py-2">
            <option value="Kawin" <?= (old('status_pernikahan', $anggota['status_pernikahan'] ?? '') == 'Kawin') ? 'selected' : '' ?>>Kawin</option>
            <option value="Belum Kawin" <?= (old('status_pernikahan', $anggota['status_pernikahan'] ?? '') == 'Belum Kawin') ? 'selected' : '' ?>>Belum Kawin</option>
        </select>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Simpan Data</button>
    <a href="<?= base_url('/admin/anggota/list') ?>" class="ml-4 text-gray-600">Batal</a>
</div>