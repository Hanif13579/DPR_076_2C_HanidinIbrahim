<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?? 'Halaman Publik' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-gray-800">
                Aplikasi Perhitungan dan Transparansi Gaji DPR Berbasis WEB
            </div>
            <div class="flex items-center">
                <span class="text-gray-700 mr-4">
                    Selamat datang, <?= esc(session()->get('username')) ?>!
                </span>
                <a href="<?= base_url('/logout') ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Logout
                </a>
            </div>
        </nav>
    </header>

    <main class="container mx-auto p-8">
        <?= $this->renderSection('content') ?>
    </main>

</body>
</html>