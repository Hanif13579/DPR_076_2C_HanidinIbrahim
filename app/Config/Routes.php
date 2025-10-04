<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// app/Config/Routes.php

$routes->get('/login', 'AuthController::index');
$routes->post('/login/process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

// RUTE UNTUK USER YANG SUDAH LOGIN (TAPI BUKAN ADMIN)
$routes->group('', ['filter' => 'login'], static function ($routes) {
    $routes->get('/anggota', 'Anggota::index');
    $routes->get('/anggota/detail/(:num)', 'Anggota::detail/$1');
});

// RUTE KHUSUS UNTUK ADMIN
// Dibungkus dalam grup agar lebih rapi
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');

     // Rute untuk Anggota
    //CREATE
    $routes->get('anggota/new', 'Admin\AnggotaController::new');        // Form tambah data
    $routes->post('anggota/create', 'Admin\AnggotaController::create'); // Proses simpan data baru
    
    //READ
    $routes->get('anggota', 'Admin\AnggotaController::index');          // Menampilkan tabel (sudah ada)

    //UPDATE
    $routes->get('anggota/edit/(:num)', 'Admin\AnggotaController::edit/$1'); // Form edit data
    $routes->post('anggota/update/(:num)', 'Admin\AnggotaController::update/$1'); // Proses update data
    
    //DELETE
    $routes->get('anggota/delete/(:num)', 'Admin\AnggotaController::delete/$1'); // Proses hapus data

    // RUTE UNTUK KOMPONEN GAJI
    //CREATE
    $routes->get('komponen-gaji/new', 'Admin\KomponenGajiController::new');      // <-- Rute untuk menampilkan form
    $routes->post('komponen-gaji/create', 'Admin\KomponenGajiController::create'); // <-- Rute untuk proses simpan

    //READ
    $routes->get('komponen-gaji', 'Admin\KomponenGajiController::index');

    //UPDATE
    $routes->get('komponen-gaji/edit/(:num)', 'Admin\KomponenGajiController::edit/$1');    // Form edit
    $routes->post('komponen-gaji/update/(:num)', 'Admin\KomponenGajiController::update/$1'); // Proses update

    //DELETE
    $routes->get('komponen-gaji/delete/(:num)', 'Admin\KomponenGajiController::delete/$1'); // Proses hapus

    // RUTE BARU UNTUK PENGGAJIAN
    $routes->get('penggajian', 'Admin\PenggajianController::index');
    $routes->get('penggajian/atur/(:num)', 'Admin\PenggajianController::atur/$1');
    $routes->post('penggajian/save/(:num)', 'Admin\PenggajianController::save/$1');

    $routes->get('penggajian/delete/(:num)', 'Admin\PenggajianController::delete/$1'); // Proses hapus/reset
    $routes->get('penggajian/detail/(:num)', 'Admin\PenggajianController::detail/$1'); // Halaman detail

});
