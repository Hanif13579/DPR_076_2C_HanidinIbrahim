<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Kelola Data Anggota</h1>

    <div class="mb-4">
        <form action="<?= base_url('admin/anggota/list') ?>" method="get" class="flex">
            <input type="search" name="keyword" class="w-full border rounded-l px-3 py-2" placeholder="Cari berdasarkan ID, Nama, atau Jabatan..." value="<?= esc($keyword ?? '') ?>">
            <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded-r">Cari</button>
        </form>
    </div>
    <a href="<?= base_url('/admin/anggota/new') ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        + Tambah Anggota Baru
    </a>