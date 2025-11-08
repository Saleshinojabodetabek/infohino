<?php
// ============= RESET PASSWORD ADMIN (HAPUS SETELAH DIGUNAKAN) ============= //

require_once "config.php"; // sesuaikan lokasi jika perlu

// Password baru dengan bcrypt
$passwordBaru = password_hash("Inf0H1n0011@@", PASSWORD_BCRYPT);

// Nama tabel dan kolom
$tabel = "users";
$kolomUser = "username";
$kolomPass = "password";
$username = "admin";

try {
    $sql = "UPDATE {$tabel} SET {$kolomPass} = :pass WHERE {$kolomUser} = :user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":pass" => $passwordBaru,
        ":user" => $username
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Password admin berhasil diubah menjadi <b>Inf0H1n0011@@</b><br>";
        echo "SEGERA hapus file ini (ubah_password.php) dari server!";
    } else {
        echo "Password TIDAK berubah. Periksa apakah username sudah benar (admin).";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
