<?php
// ===== Log & error handling =====
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/sitemap_error.log');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Header XML
header('Content-Type: application/xml; charset=utf-8');

// Header XML Output
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

// fungsi bantu cetak URL
function printUrl($loc, $lastmod, $changefreq = 'monthly', $priority = '0.7') {
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>$changefreq</changefreq>\n";
    echo "    <priority>$priority</priority>\n";
    echo "  </url>\n";
}

// base
$base_url = 'https://infohino.com';

// Halaman daftar artikel
printUrl("$base_url/artikel.php", date('Y-m-d'), 'weekly', '0.9');

try {
    // koneksi DB (environment fallback)
    $db_host = getenv('DB_HOST') ?: 'localhost';
    $db_name = getenv('DB_NAME') ?: 'u166903321_infohinonisa';
    $db_user = getenv('DB_USER') ?: 'u166903321_infohinonisa';
    $db_pass = getenv('DB_PASS') ?: 'Inf0H1n0011@@!"';

    // FIX: variabel koneksi salah → diperbaiki
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    $conn->set_charset('utf8mb4');

    // Cek apakah tabel artikel ada
    $res = $conn->query("SHOW TABLES LIKE 'artikel'");
    if ($res && $res->num_rows > 0) {

        // Ambil slug + tanggal + ID untuk detail_artikel.php?id=XX
        $stmt = $conn->prepare("SELECT id, slug, tanggal FROM artikel ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

            $id = $row['id'];
            $slug = trim($row['slug'] ?? '');
            $lastmod = !empty($row['tanggal']) 
                ? date('Y-m-d', strtotime($row['tanggal'])) 
                : date('Y-m-d');

            // ========== 1) URL SEO berbasis slug (artikel/slug)
            if ($slug !== '') {
                $url_slug = "$base_url/artikel/$slug";
                printUrl($url_slug, $lastmod, 'monthly', '0.6');
            }

            // ========== 2) URL detail-artikel.php?id=XX  (PERMINTAAN ANDA)
            $url_detail = "$base_url/detail_artikel.php?id=$id";
            printUrl($url_detail, $lastmod, 'monthly', '0.5');
        }

        $stmt->close();
    }

    $conn->close();

} catch (Throwable $e) {
    error_log("sitemap-artikel.php caught: " . $e->getMessage());
}

echo "</urlset>\n";
exit;
