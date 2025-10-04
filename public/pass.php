<?php

// 1. Tulis password yang ingin kamu hash di sini
$passwordAsli = 'gktaulupa';

// 2. Gunakan fungsi password_hash()
// PASSWORD_BCRYPT adalah algoritma hashing yang kuat dan umum digunakan
$hash = password_hash($passwordAsli, PASSWORD_BCRYPT);

// 3. Tampilkan hasilnya
echo "Password Asli: " . $passwordAsli . "<br>";
echo "Hasil Hash: " . $hash;

// Contoh output hash: $2y$10$fW.g0.WwR.j2Y8Q5ykP16.e4pQ/2K1Y5z5F3jO3j.l3K9G8sR7c0i
// Hash yang dihasilkan akan selalu berbeda setiap kali dijalankan, dan itu normal!

// 1. Tulis password yang ingin kamu hash di sini
$passwordAsli = 'udahgklupa';

// 2. Gunakan fungsi password_hash()
// PASSWORD_BCRYPT adalah algoritma hashing yang kuat dan umum digunakan
$hash = password_hash($passwordAsli, PASSWORD_BCRYPT);

// 3. Tampilkan hasilnya
echo "Password Asli: " . $passwordAsli . "<br>";
echo "Hasil Hash: " . $hash;

// Contoh output hash: $2y$10$fW.g0.WwR.j2Y8Q5ykP16.e4pQ/2K1Y5z5F3jO3j.l3K9G8sR7c0i
// Hash yang dihasilkan akan selalu berbeda setiap kali dijalankan, dan itu normal!
?>