<?php
header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// =============================
// KONFIGURASI DATABASE
// =============================
$host = "localhost";
$user = "u166903321_infohinonisa";
$pass = "Inf0H1n0011@@!\"";
$db   = "u166903321_infohinonisa";

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    echo "</urlset>";
    exit;
}

// =============================
// Halaman daftar artikel
// =============================
echo "  <url>\n";
echo "    <loc>https://infohino.com/artikel.php</loc>\n";
echo "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
echo "    <changefreq>weekly</changefreq>\n";
echo "    <priority>0.9</priority>\n";
echo "  </url>\n";

// =============================
// PASTI AMBIL SEMUA ARTIKEL
// =============================
$sql = "SELECT id, tanggal FROM artikel ORDER BY id DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

    $id = $row['id'];
    $lastmod = !empty($row['tanggal']) 
        ? date('Y-m-d', strtotime($row['tanggal']))
        : date('Y-m-d');

    echo "  <url>\n";
    echo "    <loc>https://infohino.com/detail_artikel.php?id=$id</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>monthly</changefreq>\n";
    echo "    <priority>0.7</priority>\n";
    echo "  </url>\n";
}

echo "</urlset>";
$conn->close();
?>
