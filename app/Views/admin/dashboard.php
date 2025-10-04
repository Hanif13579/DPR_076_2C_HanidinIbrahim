<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

    <h1 class="text-2xl font-bold text-red-600">INI HALAMAN DASHBOARD ADMIN</h1>
    <p class="mt-2">Selamat Datang, <?= session()->get('username') ?>!</p>
    <p>Pilih menu di samping untuk memulai.</p>
    
<?= $this->endSection() ?>