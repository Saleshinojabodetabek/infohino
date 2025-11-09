<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'admin/config.php';

// Ambil 3 artikel terbaru dari database
$sql = "SELECT a.id, a.judul, a.isi, a.gambar, a.tanggal, k.nama_kategori AS kategori
        FROM artikel a
        LEFT JOIN kategori k ON a.kategori_id = k.id
        ORDER BY a.tanggal DESC
        LIMIT 3";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $artikelData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gagal mengambil data artikel: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ✅ Judul utama -->
    <title>Dealer Hino Resmi | Info Pemesanan Hubungi 0819-1119-0933</title>

    <!-- ✅ Deskripsi SEO -->
    <meta name="description" content="Dealer Hino Tangerang Resmi — Hubungi 0819-1119-0933 untuk info harga, promo, dan pembelian truk Hino di wilayah Tangerang dan sekitarnya. Layanan cepat dan terpercaya.">
    <meta name="keywords" content="dealer hino tangerang, hino tangerang, sales hino tangerang, harga truk hino, promo hino, kredit truk hino, hino resmi tangerang">
    <meta name="author" content="Dealer Hino Tangerang">

    <!-- ✅ Canonical URL -->
    <link rel="canonical" href="https://infohino.com/" />

    <!-- ✅ Tambahkan ini agar judul 'Dealer Hino Tangerang' muncul di atas domain (seperti di Indomobil Hino) -->
    <meta name="application-name" content="Dealer Hino Tangerang">
    <meta name="apple-mobile-web-app-title" content="Dealer Hino Tangerang">

    <!-- ✅ Open Graph untuk tampilan di Google / Facebook / WhatsApp -->
    <meta property="og:site_name" content="Dealer Hino Tangerang">
    <meta property="og:title" content="Dealer Hino Tangerang | Info Pemesanan Hubungi 0819-1119-0933">
    <meta property="og:description" content="Dealer Hino Tangerang Resmi. Hubungi 0819-1119-0933 untuk promo dan harga truk Hino terbaru.">
    <meta property="og:url" content="https://infohino.com/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://infohino.com/img/hino.png">

    <!-- ✅ Favicon -->
    <link rel="icon" type="image/png" href="/img/favicon.png" />
    <link rel="apple-touch-icon" href="/img/favicon.png" />

    <!-- ✅ Fonts & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/home_css/header.css" />
    <link rel="stylesheet" href="css/home_css/about.css" />
    <link rel="stylesheet" href="css/home_css/layanan.css" />
    <link rel="stylesheet" href="css/home_css/produk.css" />
    <link rel="stylesheet" href="css/home_css/contact.css" />
    <link rel="stylesheet" href="css/home_css/blogcard.css" />

    <!-- ✅ Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8BPF492E6Z"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-8BPF492E6Z');
    </script>

    <!-- ✅ Script -->
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="container header-content navbar">
        <div class="header-title">
          <a href="https://infohino.com">
            <img src="img/logo3.png" alt="Logo Hino" style="height: 60px" />
          </a>
        </div>

        <div class="hamburger-menu">&#9776;</div>

        <nav class="nav links">
          <a href="index.php">Home</a>
          <a href="hino300.php">Hino 300 Series</a>
          <a href="hino500.php">Hino 500 Series</a>
          <a href="hinobus.php">Hino Bus Series</a>
          <a href="artikel.php">Blog & Artikel</a>
          <a href="contact.php">Contact</a>
        </nav>
      </div>
    </header>

    <!-- Hero -->
    <section class="hero">
      <div class="slider">
        <img src="img/Euro 4 Hino 300.jpeg" class="slide active" alt="Banner 1" />
        <img src="img/Euro 4 Hino 500.jpeg" class="slide" alt="Banner 2" />
        <img src="img/Euro 4 Hino Bus.jpeg" class="slide" alt="Banner 3" />
      </div>
    </section>

    <!-- About Company -->
    <section class="about-company">
      <div class="container">
        <div class="about-content">
          <div class="text">
            <h2>Dealer Hino Resmi</h2>
            <div class="divider"></div>
            <p>
            Nisa adalah <strong>sales dealer Hino Indonesia</strong> yang berpengalaman, terpercaya, dan profesional, siap menjadi mitra terbaik Anda dalam memenuhi setiap kebutuhan kendaraan niaga. Sebagai <strong>sales dealer Hino Jakarta</strong> dan wilayah sekitarnya, Nisa menyediakan berbagai pilihan truk dan bus Hino berkualitas dengan layanan cepat, ramah, serta solusi pembiayaan yang fleksibel sesuai kebutuhan bisnis Anda. Jika Anda sedang mencari <strong>dealer Hino terdekat</strong> dengan pelayanan terbaik, Nisa siap memberikan respon cepat dan penawaran harga spesial.
            </p>
            <p>
            Komitmen Nisa sebagai <strong>sales resmi dealer Hino Indonesia</strong> adalah memberikan pelayanan lebih dari sekadar penjualan. Nisa hadir untuk membangun hubungan jangka panjang melalui layanan purna jual (after-sales) yang responsif, konsultasi kebutuhan armada yang akurat, serta promo dan diskon menarik untuk pembelian truk dan bus Hino. Percayakan kebutuhan kendaraan niaga Anda kepada <strong>Nisa – Dealer Hino Jabodetabek Terpercaya</strong>, dan rasakan pengalaman membeli truk dan bus Hino yang aman, cepat, nyaman, serta menguntungkan untuk usaha Anda.
            </p>
            <p>
            Hubungi <strong>Nisa Sales Hino</strong> sekarang juga untuk mendapatkan <strong>penawaran harga Hino terbaik 2025</strong>, promo kredit ringan, dan informasi lengkap seputar <strong>truk Hino terbaru</strong>. Nisa siap membantu Anda menemukan kendaraan Hino yang paling sesuai dengan kebutuhan bisnis di Jakarta, Tangerang, Bekasi, Bogor, dan seluruh area Jabodetabek.
            </p>
            <div class="contact-buttons">
              <a href="https://wa.me/6281911190933" class="btn whatsapp-btn"><i class="fab fa-whatsapp"></i>Whatsapp</a>
              <a href="mailto:29hairun.nisa@gmail.com" class="btn email-btn"><i class="fas fa-envelope"></i>Gmail</a>
            </div>
          </div>
          <div class="image-gallery">
            <img src="img/bannerhino2.png" alt="Promo Hino" />
          </div>
          </div>
        </div>
      </section>

    <!-- BAGIAN PRODUK & LAYANAN -->
    <section class="hino-section-produk fade-element">
      <div class="hino-container">
        <div class="hino-heading">
          <h5>PRODUK & LAYANAN</h5>
          <h2>HINO TANGERANG</h2>
          <p>Kami melayani jasa penyediaan unit Truk & Bus, layanan service dan penjualan spare part merk Hino.</p>
        </div>

        <div class="hino-cards">
          <div class="hino-card">
            <img src="img/bannerpenjualan.jpg" alt="Penjualan Truk & Bis" />
            <h3>PENJUALAN TRUK & BUS</h3>
            <a href="#products-section" class="hino-btn">SELENGKAPNYA</a>
          </div>

          <div class="hino-card">
            <img src="img/bannerservice.jpg" alt="Layanan Service" />
            <h3>LAYANAN SERVICE</h3>
            <a href="contact.php" class="hino-btn">SELENGKAPNYA</a>
          </div>
          
          <div class="hino-card">
            <img src="img/bannersparepart.jpg" alt="Spare Part" />
            <h3>SPARE PART</h3>
            <a href="contact.php" class="hino-btn">SELENGKAPNYA</a>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Hino Banner Section -->
    <section id="hino-banner-section" class="hino-banner-section fade-element">
      <div class="hino-banner-container">
        <div class="hino-banner">
          <img src="img/dealer-hino-tangerang-promo1.jpg" alt="Jaringan Dealer Hino">
        </div>
        <div class="hino-banner">
          <img src="img/dealer-hino-tangerang-layanan1.jpg" alt="Layanan Purna Jual Hino">
        </div>
      </div>
    </section>

    <!-- Produk -->
    <section id="products-section" class="products-section fade-element">
      <h2 class="section-title">Produk Truk Hino Unggulan</h2>
      <div class="products">
        <div class="product">
          <img src="img/hino300produk.png" alt="Hino 300 Dutro" loading="lazy" />
          <h3>
            <a href="https://infohino.com/hino300.php" target="_blank" rel="noopener noreferrer">Hino 300 Series (Dutro)</a>
          </h3>
          <p>Truk ringan dan tangguh, cocok untuk usaha kecil dan menengah.</p>
        </div>

        <div class="product">
          <img src="img/hino500produk.png" alt="Hino 500 Ranger" loading="lazy" />
          <h3>
            <a href="https://infohino.com/hino500.php" target="_blank" rel="noopener noreferrer">Hino 500 Series (Ranger)</a>
          </h3>
          <p>Performa handal untuk pengangkutan berat dan jarak jauh.</p>
        </div>

        <div class="product">
          <img src="img/hinobusproduk.png" alt="Hino Bus Series" loading="lazy" />
          <h3>
            <a href="https://infohino.com/hinobus.php" target="_blank" rel="noopener noreferrer">Hino Bus Series</a>
          </h3>
          <p>Solusi transportasi penumpang dengan kenyamanan terbaik.</p>
        </div>
      </div>
    </section>


    <!-- Contact Section -->
    <div class="contact-container fade-element">
      <div class="contact-tabs">
        <div class="tab active">Hubungi Kami</div>
      </div>

      <div class="contact-info">
        <div class="contact-item">
          <img src="img/cssupport.png" alt="WhatsApp" />
          <div>
            <strong>Whatsapp</strong><br />
            +62 819-1119-0933
          </div>
        </div>

        <div class="divider"></div>

        <div class="contact-item">
          <img src="https://img.icons8.com/ios-filled/50/000000/phone.png" alt="Phone" />
          <div>
            <strong>Phone Call</strong><br />
            +62 819-1119-0933
          </div>
        </div>

        <div class="divider"></div>

        <div class="contact-item">
          <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" alt="Email" />
          <div>
            <strong>Email</strong><br />
            29hairun.nisa@gmail.com
          </div>
        </div>
      </div>
    </div>

    <!-- Blog Section -->
    <section class="blog-section fade-element">
      <div class="container">
        <h2>Blog & Artikel</h2>
        <p>Dapatkan informasi terbaru seputar Truk Hino, perawatan, dan promo terbaik.</p>

        <div class="blog-grid">
          <?php if (!empty($artikelData)): ?>
            <?php foreach ($artikelData as $artikel): ?>
              <div class="blog-card">
                <img 
                  src="https://infohino.com/admin/uploads/artikel/<?= htmlspecialchars($artikel['gambar']) ?>"
                  alt="<?= htmlspecialchars($artikel['judul']) ?>" 
                  loading="lazy"
                />
                <div class="blog-card-content">
                  <h3>
                    <a href="detail_artikel.php?id=<?= urlencode($artikel['id']) ?>">
                      <?= htmlspecialchars($artikel['judul']) ?>
                    </a>
                  </h3>

                  <p><?= htmlspecialchars(mb_strimwidth(strip_tags($artikel['isi']), 0, 100, '...')) ?></p>

                  <a href="detail_artikel.php?id=<?= urlencode($artikel['id']) ?>" class="read-more">
                    Baca Selengkapnya
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Tidak ada artikel ditemukan.</p>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Elfsight WhatsApp Chat | Untitled WhatsApp Chat
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <div class="elfsight-app-b334841b-ad07-411c-889b-4364272215a1" data-elfsight-app-lazy></div> -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <script>feather.replace();</script>
  </body>
</html>
