<?php
// ====== RESET PASSWORD ADMIN (HAPUS SETELAH DIGUNAKAN) ======

include "config.php"; // pastikan path benar, jika config.php berada di folder lain sesuaikan

// PASSWORD BARU (MD5)
$passwordBaru = md5("Inf0H1n0011@@");

// Ubah username admin jika perlu (default: admin)
$username = "nisahino";

// Update password
$sql = "UPDATE admin SET password='$passwordBaru' WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    echo "Password admin berhasil diubah menjadi: <b>Inf0H1n0011@@</b><br>";
    echo "SEGERA HAPUS file ubah_password.php dari server!";
} else {
    echo "Gagal mengubah password: " . $conn->error;
}

$conn->close();
?>
