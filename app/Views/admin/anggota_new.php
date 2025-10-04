<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold mb-4">Tambah Data Anggota Baru</h1>
    <div class="bg-white p-6 rounded shadow-md">
        <form action="<?= base_url('/admin/anggota/create') ?>" method="post">
            <?= csrf_field() ?>
            <?= $this->include('admin/_form_anggota') ?>
        </form>
    </div>
<?= $this->endSection() ?>