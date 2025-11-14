<?php
require_once 'config/database.php';

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
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - <?php echo htmlspecialchars($companyInfoData['name']); ?></title>
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
                    <li><a href="kontak.php" class="active">Kontak</a></li>
                    <li><a href="faq.php">FAQ</a></li>
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

    <section class="page-header">
        <div class="container">
            <h1>Hubungi Kami</h1>
            <p>Kami siap membantu Anda dengan segala kebutuhan perjalanan</p>
        </div>
    </section>

    <!-- Bagian Kontak Utama dengan Layout Dua Kolom -->
    <section class="contact-main-section">
        <div class="container">
            <div class="contact-grid">
                
                <!-- Kolom Kiri: Informasi Kontak -->
                <div class="contact-info-box">
                    <div class="contact-info-header">
                        <h2>Informasi Kontak</h2>
                        <p>Hubungi kami untuk konsultasi dan pemesanan layanan travel terbaik</p>
                    </div>
                    
                    <div class="contact-items">
                        <!-- WhatsApp -->
                        <div class="contact-item">
                            <div class="contact-item-icon whatsapp-bg">
                                <i class="icon icon-whatsapp"></i>
                            </div>
                            <div class="contact-item-text">
                                <h4>WhatsApp</h4>
                                <p><?php echo htmlspecialchars($companyInfoData['whatsapp']); ?></p>
                                <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" class="contact-link" target="_blank">
                                    <i class="icon icon-whatsapp"></i> Chat Sekarang
                                </a>
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="contact-item">
                            <div class="contact-item-icon email-bg">
                                <i class="icon icon-email"></i>
                            </div>
                            <div class="contact-item-text">
                                <h4>Email</h4>
                                <p><?php echo htmlspecialchars($companyInfoData['email']); ?></p>
                            </div>
                        </div>
                        
                        <!-- Alamat -->
                        <div class="contact-item">
                            <div class="contact-item-icon address-bg">
                                <i class="icon icon-route"></i>
                            </div>
                            <div class="contact-item-text">
                                <h4>Alamat Kantor</h4>
                                <p><?php echo nl2br(htmlspecialchars(str_replace('<br>', "\n", $companyInfoData['address']))); ?></p>
                            </div>
                        </div>
                        
                        <!-- Jam Operasional -->
                        <div class="contact-item">
                            <div class="contact-item-icon hours-bg">
                                <i class="icon icon-clock"></i>
                            </div>
                            <div class="contact-item-text">
                                <h4>Jam Operasional</h4>
                                <p><?php echo htmlspecialchars($companyInfoData['hours']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Kolom Kanan: Form Permintaan -->
                <div class="contact-form-box">
                    <div class="form-card">
                        <div class="form-header">
                            <h2>Kirim Permintaan</h2>
                            <p>Isi form di bawah untuk mengirim pertanyaan atau permintaan khusus</p>
                        </div>
                        
                        <form id="contactRequestForm" class="request-form">
                            <div class="input-group">
                                <label for="request-name">Nama Lengkap <span class="req">*</span></label>
                                <input type="text" id="request-name" name="name" required placeholder="Masukkan nama lengkap Anda">
                            </div>
                            
                            <div class="input-group">
                                <label for="request-message">Pesan atau Pertanyaan <span class="req">*</span></label>
                                <textarea id="request-message" name="message" required rows="5" placeholder="Tuliskan pesan, pertanyaan, atau kebutuhan perjalanan Anda..."></textarea>
                            </div>
                            
                            <button type="submit" class="submit-btn">
                                <i class="icon icon-send"></i>
                                <span>Kirim Permintaan</span>
                            </button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Bagian Peta Lokasi -->
    <section class="map-section">
        <div class="container">
            <div class="map-header">
                <h2>Lokasi Kami</h2>
                <p>Kunjungi kantor kami untuk konsultasi langsung</p>
            </div>
            
            <div class="map-wrapper">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6734!2d117.1476!3d-0.5022!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwMzAnMDcuOSJTIDExN8KwMDgnNTEuNCJF!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
                <div class="map-info-box">
                    <div class="map-info-content">
                        <h4><i class="icon icon-route"></i> Alamat Lengkap</h4>
                        <p><?php echo nl2br(htmlspecialchars(str_replace('<br>', "\n", $companyInfoData['address']))); ?></p>
                        <a href="https://maps.app.goo.gl/4db4sKFHgc3W8gg99" target="_blank" class="map-btn">
                            <i class="icon icon-route"></i> Buka di Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php echo htmlspecialchars($companyInfoData['name']); ?></h3>
                    <p><?php echo htmlspecialchars($companyInfoData['description']); ?></p>
                </div>
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <p><i class="icon icon-whatsapp"></i> <?php echo htmlspecialchars($companyInfoData['whatsapp']); ?></p>
                    <p><i class="icon icon-email"></i> <?php echo htmlspecialchars($companyInfoData['email']); ?></p>
                    <p><i class="icon icon-route"></i> <?php echo nl2br(htmlspecialchars(str_replace('<br>', "\n", $companyInfoData['address']))); ?></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 <?php echo htmlspecialchars($companyInfoData['name']); ?>. All rights reserved.</p>
                <!-- Ikon Kunci Admin (Tersembunyi di Footer) -->
                <div class="admin-access" onclick="showAdminLogin()" title="Akses Admin">
                    <i class="icon icon-sign-in"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <div class="wa-float">
        <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" target="_blank">
            <i class="icon icon-whatsapp"></i>
        </a>
    </div>

    <!-- Admin Login Modal -->
    <div class="admin-login-overlay" id="adminLoginOverlay" style="display: none;">
        <div class="admin-login-modal">
            <div class="admin-login-header">
                <h3>🔐 Admin Access</h3>
                <button class="close-modal" onclick="closeAdminLogin()">
                    <i class="icon icon-times"></i>
                </button>
            </div>
            <div class="admin-login-body">
                <p>Masukkan password untuk mengakses dashboard admin</p>
                <div class="password-input-group">
                    <input type="password" id="adminPassword" placeholder="Password" maxlength="50">
                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility()">
                        <i class="icon icon-eye" id="passwordToggleIcon"></i>
                    </button>
                </div>
                <div class="admin-login-actions">
                    <button class="btn-admin-login" onclick="attemptAdminLogin()">
                        <i class="icon icon-sign-in"></i> Login
                    </button>
                    <button class="btn-admin-cancel" onclick="closeAdminLogin()">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Data dari PHP untuk JavaScript -->
    <script>
        const phpCompanyInfoData = <?php echo json_encode($companyInfoData); ?>;
        
        if (phpCompanyInfoData && Object.keys(phpCompanyInfoData).length > 0) {
            if (typeof companyInfoData !== 'undefined') {
                companyInfoData = phpCompanyInfoData;
            }
        }
    </script>

    <script src="config.js"></script>
    <script src="script.js"></script>
    <script src="kontak.js"></script>
</body>
</html>
<?php
if (isset($conn)) {
    $conn->close();
}
?>

