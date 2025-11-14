<?php
// Data default untuk menghindari error database
$companyInfoData = [
    'name' => 'CV. Cendana Travel',
    'whatsapp' => '6285821841529',
    'instagram' => '@cendanatravel_official',
    'email' => 'info@cendanatravel.com',
    'address' => 'Jl. Cendana No.8, Tlk. Lerong Ulu, Kec. Sungai Kunjang<br>Kota Samarinda, Kalimantan Timur 75127',
    'hours' => 'Senin - Minggu: 08.00 - 22.00 WIB',
    'description' => 'Kami adalah penyedia layanan travel terpercaya dengan pengalaman lebih dari 10 tahun dalam melayani perjalanan Anda.'
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($companyInfoData['name']); ?> - Website Travel Terpercaya</title>
    <!-- File CSS kita sendiri -->
    <link rel="stylesheet" href="styles.css">
    <!-- Custom Icons CSS (pengganti FontAwesome) -->
    <link rel="stylesheet" href="icons.css">
</head>

<body>
    <!-- ============================================ -->
    <!-- HEADER / NAVIGASI ATAS -->
    <!-- ============================================ -->
    <!-- Header yang tetap di atas saat scroll -->
    <header>
        <div class="container header-container">
            <!-- Logo Perusahaan -->
            <a href="#" class="logo"><?php echo htmlspecialchars($companyInfoData['name']); ?></a>
            
            <!-- Menu Navigasi -->
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php" class="active">Beranda</a></li>
                    <li><a href="pemesanan.php">Pemesanan</a></li>
                    <li><a href="galeri.php">Galeri</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </nav>
            
            <!-- Kontrol Header (WhatsApp, Mode Gelap & Menu Mobile) -->
            <div class="header-controls">
                <!-- Tombol WhatsApp di header -->
                <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" class="wa-header-btn" target="_blank" title="Hubungi via WhatsApp">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="wa-icon">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.488"/>
                    </svg>
                    <span>WhatsApp</span>
                </a>
                <!-- Tombol untuk mengubah mode gelap/terang -->
                <button class="dark-mode-toggle" onclick="ubahModeGelap()" title="Ubah Mode Gelap/Terang">
                    <i class="icon icon-moon"></i>
                </button>
                <!-- Menu untuk mobile (hamburger menu) -->
                <div class="mobile-menu" title="Menu">
                    <i class="icon icon-menu"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- ============================================ -->
    <!-- BAGIAN HERO / BANNER UTAMA -->
    <!-- ============================================ -->
    <!-- Bagian pertama yang terlihat saat halaman dibuka -->
    <section class="hero" id="home">
        <div class="hero-overlay">
            <div class="container">
                <div class="hero-content">
                    <!-- Heading Utama -->
                    <h1 class="hero-title">
                        Perjalanan Terpercaya<br>
                        <span class="hero-company">Cendana Travel</span>
                    </h1>
                    
                    <!-- Deskripsi/Tagline -->
                    <p class="hero-description">
                        Layanan travel profesional dengan pengalaman lebih dari 10 tahun. Kami mengutamakan kenyamanan dan keamanan perjalanan Anda.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-cta">
                        <a href="pemesanan.php" class="btn-hero btn-hero-primary">Lihat Layanan</a>
                        <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" class="btn-hero btn-hero-secondary" target="_blank">Hubungi Kami</a>
                    </div>
                    
                    <!-- Statistik/Fitur Highlights -->
                    <div class="hero-stats">
                        <div class="stat-card">
                            <div class="stat-number">10+</div>
                            <div class="stat-label">Tahun Pengalaman</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">150+</div>
                            <div class="stat-label">Pelanggan Puas</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">4.9/5</div>
                            <div class="stat-label">Rating Pelanggan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- BAGIAN LAYANAN PROFESIONAL -->
    <!-- ============================================ -->
    <!-- Menampilkan 3 card layanan profesional -->
    <section class="professional-services" id="professional-services">
        <div class="container">
            <div class="section-header-professional">
                <h2 class="section-title-professional">
                    Layanan Profesional
                </h2>
                <p class="section-description-professional">
                    Kami berkomitmen memberikan layanan travel berkualitas tinggi dengan standar profesional internasional, 
                    memastikan setiap perjalanan Anda menjadi pengalaman yang berkesan dan tak terlupakan.
                </p>
                <div class="section-divider-professional"></div>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="icon icon-check"></i>
                    </div>
                    <h3>Legal & Terpercaya</h3>
                    <p>Perusahaan travel resmi dengan izin operasional lengkap. Semua transaksi aman dan terjamin.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="icon icon-phone"></i>
                    </div>
                    <h3>Layanan Pelanggan</h3>
                    <p>Tim customer service siap membantu Anda. Respon cepat untuk semua pertanyaan dan kebutuhan perjalanan.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="icon icon-star"></i>
                    </div>
                    <h3>Paket Fleksibel</h3>
                    <p>Paket travel yang dapat disesuaikan dengan kebutuhan dan budget Anda untuk individu atau grup.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- ============================================ -->
    <!-- BAGIAN SHOWCASE LAYANAN UNGGULAN -->
    <!-- ============================================ -->
    <!-- Menampilkan keunggulan perusahaan dengan foto dan narasi -->
    <section class="service-showcase" id="service-showcase">
        <div class="showcase-overlay">
            <div class="container">
                <div class="showcase-content">
                    <!-- Kolom kiri: Foto unggulan -->
                    <div class="showcase-images">
                        <div class="showcase-image-main">
                            <img src="cendana/showcase-main.jpg" alt="Layanan Profesional Cendana Travel" 
                                 onerror="this.src='https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'">
                        </div>
                        <div class="showcase-image-grid">
                            <div class="showcase-image-small">
                                <img src="cendana/showcase-office.jpg" alt="Kantor Cendana Travel" 
                                     onerror="this.src='https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80'">
                            </div>
                            <div class="showcase-image-small">
                                <img src="cendana/showcase-service.jpg" alt="Pelayanan Pelanggan" 
                                     onerror="this.src='https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80'">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kolom kanan: Narasi keunggulan -->
                    <div class="showcase-text">
                        <h2 class="showcase-title">Mengapa Memilih Cendana Travel?</h2>
                        
                        <div class="showcase-features">
                            <div class="feature-item">
                                <h3>Layanan Profesional dan Terpercaya</h3>
                                <p>Dengan izin resmi dan pengalaman bertahun-tahun, kami memberikan layanan travel yang dapat diandalkan untuk setiap perjalanan Anda.</p>
                            </div>
                            
                            <div class="feature-item">
                                <h3>Pengalaman Lebih dari 10 Tahun</h3>
                                <p>Sejak 2014, kami telah melayani ribuan pelanggan dengan dedikasi tinggi dan komitmen untuk memberikan pengalaman perjalanan terbaik.</p>
                            </div>
                            
                            <div class="feature-item">
                                <h3>Siap Melayani Ke Mana Pun Tujuan Anda</h3>
                                <p>Dari perjalanan domestik hingga internasional, kami siap mengatur semua kebutuhan transportasi dan akomodasi Anda.</p>
                            </div>
                        </div>
                        
                        <div class="showcase-cta">
                            <a href="galeri.php" class="btn-showcase">Lihat Galeri Kami</a>
                            <a href="pemesanan.php" class="btn-showcase-order">
                                <i class="icon icon-ticket"></i> Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- BAGIAN TENTANG & KONTAK -->
    <!-- ============================================ -->
    <!-- Menampilkan informasi perusahaan dan kontak dengan efek menarik -->
    <section class="about-contact" id="about-contact">
        <!-- Background dengan efek animasi -->
        <div class="contact-background">
            <div class="floating-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
            </div>
        </div>
        
        <div class="container">
            <h2 class="section-title-white">Tentang & Kontak</h2>
            
            <div class="about-contact-content">
                <!-- Kolom kiri: Tentang perusahaan -->
                <div class="about-info">
                    <div class="info-card">
                        <h3>Tentang <?php echo str_replace('Cv.', 'CV.', htmlspecialchars($companyInfoData['name'])); ?></h3>
                        <p>Kami adalah penyedia layanan travel terpercaya dengan pengalaman lebih dari 10 tahun. Berawal dari lokasi sederhana, kini kami telah berkembang menjadi perusahaan travel profesional yang siap melayani perjalanan Anda.</p>
                        
                        <!-- Highlight keunggulan dengan efek hover -->
                        <div class="about-highlights">
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="icon icon-money"></i>
                                </div>
                                <div class="highlight-content">
                                    <strong>Harga Terjangkau</strong>
                                    <span>Paket perjalanan dengan harga kompetitif</span>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="icon icon-star"></i>
                                </div>
                                <div class="highlight-content">
                                    <strong>Pelayanan Cepat</strong>
                                    <span>Respon dan layanan yang responsif</span>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="icon icon-check"></i>
                                </div>
                                <div class="highlight-content">
                                    <strong>Terpercaya</strong>
                                    <span>Izin resmi dan pengalaman bertahun-tahun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Kolom kanan: Informasi kontak -->
                <div class="contact-info-simple">
                    <div class="contact-card">
                        <h3>Hubungi Kami</h3>
                        <p class="contact-intro">Kami siap melayani Anda dengan sepenuh hati untuk kebutuhan perjalanan Anda.</p>
                        
                        <div class="contact-details">
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="wa-icon-contact">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.488"/>
                                    </svg>
                                </div>
                                <div class="contact-content">
                                    <strong>WhatsApp</strong>
                                    <p><?php echo htmlspecialchars($companyInfoData['whatsapp']); ?></p>
                                    <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" class="btn-contact-wa" target="_blank">Chat Sekarang</a>
                                </div>
                            </div>
                            
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="icon icon-route"></i>
                                </div>
                                <div class="contact-content">
                                    <strong>Alamat Kantor</strong>
                                    <p><?php echo nl2br(htmlspecialchars(str_replace('<br>', "\n", $companyInfoData['address']))); ?></p>
                                </div>
                            </div>
                            
                            <div class="contact-detail">
                                <div class="contact-icon">
                                    <i class="icon icon-info"></i>
                                </div>
                                <div class="contact-content">
                                    <strong>Jam Operasional</strong>
                                    <p><?php echo htmlspecialchars($companyInfoData['hours']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Google Maps yang lebih lebar -->
            <div class="google-maps-section">
                <div class="maps-container">
                    <h3 class="maps-title">Lokasi Kantor Kami</h3>
                    <div class="maps-wrapper">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6562087240447!2d117.14234731475394!3d-0.4942499995249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f8c8b8b8b8b%3A0x8b8b8b8b8b8b8b8b!2sJl.%20Cendana%20No.8%2C%20Tlk.%20Lerong%20Ulu%2C%20Kec.%20Sungai%20Kunjang%2C%20Kota%20Samarinda%2C%20Kalimantan%20Timur%2075127!5e0!3m2!1sid!2sid!4v1635000000000!5m2!1sid!2sid" 
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <div class="maps-overlay">
                            <div class="maps-info">
                                <h4><i class="icon icon-route"></i> CV. Cendana Travel</h4>
                                <p>Jl. Cendana No.8, Tlk. Lerong Ulu, Kec. Sungai Kunjang</p>
                                <a href="https://maps.app.goo.gl/4db4sKFHgc3W8gg99" target="_blank" class="btn-maps-direction">
                                    <i class="icon icon-route"></i> Petunjuk Arah
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================ -->
    <!-- FOOTER / BAGIAN BAWAH -->
    <!-- ============================================ -->
    <!-- Footer berisi informasi lengkap tentang perusahaan -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <!-- Section 1: Tentang Perusahaan -->
                <div class="footer-section">
                    <h3><?php echo htmlspecialchars($companyInfoData['name']); ?></h3>
                    <p><?php echo htmlspecialchars($companyInfoData['description']); ?></p>
                    
                    <!-- Statistik Perusahaan -->
                    <div class="footer-stats">
                        <div class="stat-item">
                            <strong>10+</strong>
                            <span>Tahun Pengalaman</span>
                        </div>
                        <div class="stat-item">
                            <strong>1000+</strong>
                            <span>Pelanggan Puas</span>
                        </div>
                    </div>
                </div>
                
                <!-- Section 2: Menu -->
                <div class="footer-section">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="index.php"><i class="icon icon-home"></i> Beranda</a></li>
                        <li><a href="pemesanan.php"><i class="icon icon-ticket"></i> Pemesanan</a></li>
                        <li><a href="galeri.php"><i class="icon icon-camera"></i> Galeri</a></li>
                        <li><a href="kontak.php"><i class="icon icon-phone"></i> Kontak</a></li>
                        <li><a href="faq.php"><i class="icon icon-question"></i> FAQ</a></li>
                    </ul>
                </div>
                
                <!-- Section 3: Layanan -->
                <div class="footer-section">
                    <h3>Layanan Kami</h3>
                    <ul>
                        <li><a href="pemesanan.php"><i class="icon icon-plane"></i> Tiket Pesawat</a></li>
                        <li><a href="pemesanan.php"><i class="icon icon-ship"></i> Tiket Kapal</a></li>
                        <li><a href="pemesanan.php"><i class="icon icon-bus"></i> Tiket Bus</a></li>
                    </ul>
                </div>
                
                <!-- Section 4: Kontak & Social Media -->
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <div class="contact-info">
                        <p><i class="icon icon-whatsapp"></i> <?php echo htmlspecialchars($companyInfoData['whatsapp']); ?></p>
                        <p><i class="icon icon-email"></i> <?php echo htmlspecialchars($companyInfoData['email']); ?></p>
                        <p><i class="icon icon-route"></i> <?php echo nl2br(htmlspecialchars(str_replace('<br>', "\n", $companyInfoData['address']))); ?></p>
                        <p><i class="icon icon-info"></i> <?php echo htmlspecialchars($companyInfoData['hours']); ?></p>
                    </div>
                    
                    <!-- Media Sosial -->
                    <div class="social-media">
                        <h4>Ikuti Kami</h4>
                        <div class="social-links">
                            <a href="https://wa.me/<?php echo htmlspecialchars($companyInfoData['whatsapp']); ?>" class="social-link" target="_blank" title="WhatsApp"><i class="icon icon-whatsapp"></i></a>
                            <a href="https://instagram.com/<?php echo htmlspecialchars(str_replace('@', '', $companyInfoData['instagram'])); ?>" class="social-link" target="_blank" title="Instagram"><i class="icon icon-camera"></i></a>
                            <a href="mailto:<?php echo htmlspecialchars($companyInfoData['email']); ?>" class="social-link" title="Email"><i class="icon icon-email"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom: Copyright & Info -->
            <div class="footer-bottom">
                <p>&copy; 2024 <?php echo htmlspecialchars($companyInfoData['name']); ?>. All rights reserved.</p>
                <p style="margin-top: 10px; font-size: 0.9rem; opacity: 0.8;">
                    <i class="icon icon-graduation-cap"></i>
                    Website ini dibuat oleh Mahasiswa Informatika Universitas Mulawarman
                    sebagai syarat mata kuliah Pemrograman Web
                </p>
                
                <!-- Ikon Kunci Admin (Floating Button) -->
                <!-- Klik ikon kunci untuk akses admin atau gunakan Ctrl+Shift+A -->
                <div class="admin-access" onclick="showAdminLogin()" title="Admin Login (Ctrl+Shift+A)">
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
                    <button class="btn-admin-cancel" onclick="closeAdminLogin()">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- JAVASCRIPT DATA -->
    <!-- ============================================ -->

    <!-- ============================================ -->
    <!-- LOAD SCRIPT JAVASCRIPT -->
    <!-- ============================================ -->
    <script src="config.js"></script>
    <script src="script.js"></script>
</body>

</html>
<?php

?>