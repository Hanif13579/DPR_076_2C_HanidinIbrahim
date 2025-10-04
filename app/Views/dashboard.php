<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-blue-600">HALAMAN DASHBOARD PENGGUNA</h1>
        <p class="mt-2">Selamat Datang, <?= session()->get('username') ?>!</p>
        <p>Ini adalah halaman profilmu.</p>
        <a href="<?= base_url('/logout') ?>" class="mt-4 inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Logout
        </a>
    </div>
</body>
</html>