<?php
require_once 'config/database.php';
require_once 'includes/faq_data.php';

function getCompanyInfo($conn) {
    $company = [];
    $stmt = $conn->prepare("SELECT * FROM company_info WHERE id = 1");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $company = $result->fetch_assoc();
    }
    $stmt->close();
    return $company;
}

$companyInfoData = getCompanyInfo($conn);

if (empty($companyInfoData)) {
    $companyInfoData = [
        'name' => 'Cv. Cendana Travel',
        'whatsapp' => '6285821841529',
        'instagram' => '@cendanatravel_official',
        'email' => 'info@cendanatravel.com',
        'address' => 'Jl. Cendana No.8, Tlk. Lerong Ulu, Kec. Sungai Kunjang<br>Kota Samarinda, Kalimantan Timur 75127',
        'hours' => 'Senin - Minggu: 08.00 - 22.00 WIB',
        'description' => 'Kami adalah penyedia layanan travel terpercaya dengan pengalaman lebih dari 10 tahun dalam melayani perjalanan Anda.'
    ];
}

// Get FAQ data from centralized source
$faqData = getFaqData();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - <?php echo htmlspecialchars($companyInfoData['name']); ?></title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="icons.css">
</head>
<body>
    <header>
        <div class="container header-container">
            <a href="index.php" class="logo"><?php echo htmlspecialchars($companyInfoData['name']); ?></a>
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="pemesanan.php">Pemesanan</a></li>
                    <li><a href="galeri.php">Galeri</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                    <li><a href="faq.php" class="active">FAQ</a></li>
                </ul>
            </nav>
            <div class="header-controls">
                <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" class="wa-header-btn" target="_blank" title="Hubungi via WhatsApp">
                    <i class="icon icon-whatsapp"></i>
                    <span>WhatsApp</span>
                </a>
                <button class="dark-mode-toggle" onclick="ubahModeGelap()" title="Ubah Mode Gelap/Terang">
                    <i class="icon icon-moon"></i>
                </button>
                <div class="mobile-menu" title="Menu">
                    <i class="icon icon-menu"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Pertanyaan yang Sering Diajukan</h1>
            <p>Temukan jawaban untuk pertanyaan umum tentang layanan dan pemesanan di Cendana Travel</p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <!-- Category Filter -->
            <div class="faq-categories">
                <?php 
                $isFirst = true;
                foreach ($faqData as $category): 
                ?>
                    <button class="faq-category-btn <?php echo $isFirst ? 'active' : ''; ?>" data-category="<?php echo strtolower(str_replace(' ', '-', $category['category'])); ?>">
                        <?php echo htmlspecialchars($category['category']); ?>
                    </button>
                <?php 
                    $isFirst = false;
                endforeach; 
                ?>
            </div>

            <!-- FAQ Accordion -->
            <div class="faq-accordion" id="faqAccordion">
                <?php foreach ($faqData as $category): ?>
                    <div class="faq-category-group" data-category="<?php echo strtolower(str_replace(' ', '-', $category['category'])); ?>">
                        <h2 class="faq-category-title">
                            <i class="icon icon-info"></i>
                            <?php echo htmlspecialchars($category['category']); ?>
                        </h2>
                        <?php foreach ($category['items'] as $index => $item): ?>
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span class="faq-question-text">
                                        <i class="icon icon-question-circle"></i>
                                        <?php echo htmlspecialchars($item['question']); ?>
                                    </span>
                                    <i class="icon icon-chevron-down faq-chevron"></i>
                                </button>
                                <div class="faq-answer">
                                    <div class="faq-answer-content">
                                        <i class="icon icon-check"></i>
                                        <p><?php echo $item['answer']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Contact CTA -->
            <div class="faq-contact-cta">
                <h3>Masih ada pertanyaan?</h3>
                <p>Tim customer service kami siap membantu Anda 24/7</p>
                <div class="faq-cta-buttons">
                    <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" class="btn-faq-wa" target="_blank">
                        <i class="icon icon-whatsapp"></i> Chat WhatsApp
                    </a>
                    <a href="kontak.php" class="btn-faq-contact">
                        <i class="icon icon-phone"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php echo htmlspecialchars($companyInfoData['name']); ?></h3>
                    <p><?php echo htmlspecialchars($companyInfoData['description']); ?></p>
                </div>
                <div class="footer-section">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="pemesanan.php">Pemesanan</a></li>
                        <li><a href="galeri.php">Galeri</a></li>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <p><i class="icon icon-whatsapp"></i> <?php echo htmlspecialchars($companyInfoData['whatsapp']); ?></p>
                    <p><i class="icon icon-email"></i> <?php echo htmlspecialchars($companyInfoData['email']); ?></p>
                    <p><i class="icon icon-map-marker-alt"></i> <?php echo $companyInfoData['address']; ?></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 <?php echo htmlspecialchars($companyInfoData['name']); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <div class="wa-float">
        <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" target="_blank">
            <i class="icon icon-whatsapp"></i>
        </a>
    </div>

    <script src="config.js"></script>
    <script src="script.js"></script>
</body>
</html>

