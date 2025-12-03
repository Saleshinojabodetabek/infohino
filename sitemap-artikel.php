<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/sitemap_error.log');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

header('Content-Type: application/xml; charset=utf-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// fungsi output sitemap
function printUrl($loc, $lastmod, $changefreq = 'monthly', $priority = '0.7') {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>$changefreq</changefreq>\n";
    echo "    <priority>$priority</priority>\n";
    echo "  </url>\n";
}

$base_url = 'https://infohino.com';

// halaman utama daftar artikel
printUrl("$base_url/artikel.php", date('Y-m-d'), 'weekly', '0.9');

// koneksi database
try {
    $conn = new mysqli(
        getenv('DB_HOST') ?: 'localhost',
        getenv('DB_USER') ?: 'u166903321_infohinonisa',
        getenv('DB_PASS') ?: 'Inf0H1n0011@@!"',
        getenv('DB_NAME') ?: 'u166903321_infohinonisa'
    );
    $conn->set_charset('utf8mb4');

    // cek tabel ada
    $res = $conn->query("SHOW TABLES LIKE 'artikel'");
    if ($res && $res->num_rows > 0) {

        // ambil seluruh id + tanggal (tanpa slug)
        $stmt = $conn->prepare("SELECT id, tanggal FROM artikel ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];
            $lastmod = !empty($row['tanggal'])
                ? date('Y-m-d', strtotime($row['tanggal']))
                : date('Y-m-d');

            // URL detail artikel berbasis ID
            $url_detail = "$base_url/detail_artikel.php?id=$id";
            printUrl($url_detail, $lastmod, 'monthly', '0.7');
        }

        $stmt->close();
    }

    $conn->close();

} catch (Throwable $e) {
    error_log("sitemap-artikel.php caught: " . $e->getMessage());
}

echo "</urlset>\n";
exit;
