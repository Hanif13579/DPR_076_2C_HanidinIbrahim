<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// app/Config/Routes.php

$routes->get('/login', 'AuthController::index');
$routes->post('/login/process', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');

// Rute untuk pengguna biasa
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

// RUTE KHUSUS UNTUK ADMIN
// Dibungkus dalam grup agar lebih rapi
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');

     // Rute untuk Anggota
    //CREATE
    $routes->get('anggota/new', 'Admin\AnggotaController::new');        // Form tambah data

    //READ
    $routes->get('anggota', 'Admin\AnggotaController::index');          // Menampilkan tabel (sudah ada)
});
