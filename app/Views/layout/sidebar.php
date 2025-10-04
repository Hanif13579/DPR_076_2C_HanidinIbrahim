<aside class="w-64 bg-gray-800 text-white p-4">
    <div class="mb-8">
        <h2 class="text-2xl font-bold">Admin Panel</h2>
    </div>
    <nav>
        <ul>
            <li class="mb-4">
                <a href="<?= base_url('/admin/dashboard') ?>" class="block hover:bg-gray-700 p-2 rounded">
                    Dashboard
                </a>
            </li>
            <li class="mb-4">
                <a href="<?= base_url('/admin/anggota') ?>" class="block hover:bg-gray-700 p-2 rounded">
                    Kelola Anggota
                </a>
            </li>
            <li class="mb-4">
                <a href="<?= base_url('/admin/komponen-gaji') ?>" class="block hover:bg-gray-700 p-2 rounded">
                    Kelola Komponen Gaji
                </a>
            </li>
            <li class="mb-4">
                <a href="<?= base_url('/logout') ?>" class="block hover:bg-red-700 p-2 rounded">
                    Logout
                </a>
            </li>
        </ul>
    </nav>
</aside>