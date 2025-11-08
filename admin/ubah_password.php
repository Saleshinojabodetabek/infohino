<?php
// ====== RESET PASSWORD ADMIN MENGGUNAKAN PDO ======
// File ini harus dihapus setelah digunakan demi keamanan.

require_once "config.php"; // pastikan path benar

// Siapkan password baru (MD5)
$passwordBaru = md5("Inf0H1n0011@@");

// Ganti sesuai nama tabel dan kolom Anda
$tabelAdmin = "admin";      // contoh: admin
$kolomUser  = "username";   // contoh: username
$kolomPass  = "password";   // contoh: password
$username   = "admin";      // username target yang mau direset

try {
    $sql = "UPDATE {$tabelAdmin} SET {$kolomPass} = :pass WHERE {$kolomUser} = :user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":pass" => $passwordBaru,
        ":user" => $username
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Password admin berhasil diubah menjadi <b>Inf0H1n0011@@</b><br>";
        echo "SEGERA HAPUS file ini (ubah_password.php) dari server!";
    } else {
        echo "Password tidak berubah. Periksa nama tabel dan kolom.<br>";
        echo "Tabel: {$tabelAdmin}, Kolom username: {$kolomUser}, Kolom password: {$kolomPass}";
    }
} catch (Exception $e) {
    echo "Terjadi error: " . $e->getMessage();
}
?>
