<?php
/**
 * ============================================
 * HALAMAN PEMESANAN - CV. CENDANA TRAVEL
 * ============================================
 */

// Data default tanpa database untuk menghindari error
$companyInfoData = [
    'name' => 'CV. Cendana Travel',
    'whatsapp' => '6285821841529',
    'instagram' => '@cendanatravel_official',
    'email' => 'info@cendanatravel.com',
    'address' => 'Jl. Cendana No.8, Tlk. Lerong Ulu, Kec. Sungai Kunjang<br>Kota Samarinda, Kalimantan Timur 75127',
    'hours' => 'Senin - Minggu: 08.00 - 22.00 WIB',
    'description' => 'Kami adalah penyedia layanan travel terpercaya dengan pengalaman lebih dari 10 tahun dalam melayani perjalanan Anda.'
];

// Data transportasi default (akan dimuat dari config.js)
$dataTransportasi = [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan - <?php echo htmlspecialchars($companyInfoData['name']); ?></title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="icons.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="index.php" class="logo"><?php echo htmlspecialchars($companyInfoData['name']); ?></a>
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="pemesanan.php" class="active">Pemesanan</a></li>
                    <li><a href="galeri.php">Galeri</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
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

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Pemesanan Tiket</h1>
            <p>Pilih layanan transportasi terbaik untuk perjalanan Anda</p>
        </div>
    </section>

    <!-- Filter Kategori -->
    <section class="booking-filter-section">
        <div class="container">
            <div class="filter-tabs">
                <button class="filter-tab active" data-filter="semua" onclick="filterTransportasi('semua')">
                    Semua
                </button>
                <button class="filter-tab" data-filter="pesawat" onclick="filterTransportasi('pesawat')">
                    <i class="icon icon-plane"></i> Pesawat
                </button>
                <button class="filter-tab" data-filter="kapal" onclick="filterTransportasi('kapal')">
                    <i class="icon icon-ship"></i> Kapal
                </button>
                <button class="filter-tab" data-filter="bus" onclick="filterTransportasi('bus')">
                    <i class="icon icon-bus"></i> Bus
                </button>
            </div>
        </div>
    </section>

    <!-- Daftar Transportasi -->
    <section class="booking-list-section">
        <div class="container">
            <div class="transport-cards-grid" id="transport-cards-grid">
                <!-- Card transportasi akan dimuat di sini menggunakan JavaScript -->
            </div>
        </div>
    </section>

    <!-- Modal Form Pemesanan -->
    <div class="booking-modal-overlay" id="bookingModal">
        <div class="booking-modal">
            <div class="booking-modal-header">
                <h3>Form Pemesanan</h3>
                <button class="close-modal-btn" onclick="tutupModalPemesanan()">
                    <i class="icon icon-times"></i>
                </button>
            </div>
            <div class="booking-modal-body">
                <form id="bookingForm" onsubmit="kirimPemesanan(event)">
                    <input type="hidden" id="booking-transport-type" name="transport_type">
                    <input type="hidden" id="booking-service-name" name="service_name">
                    
                    <div class="form-group">
                        <label for="booking-transport-type-display">Jenis Layanan</label>
                        <input type="text" id="booking-transport-type-display" readonly 
                               placeholder="Akan terisi otomatis sesuai layanan yang dipilih">
                    </div>
                    
                    <div class="form-group">
                        <label for="customer-name">Nama <span class="required">*</span></label>
                        <input type="text" id="customer-name" name="customer_name" required 
                               placeholder="Masukkan nama lengkap Anda">
                    </div>
                    
                    <div class="form-group">
                        <label for="origin">Lokasi Saat Ini <span class="required">*</span></label>
                        <input type="text" id="origin" name="origin" required 
                               placeholder="Contoh: Jakarta, Surabaya, dll">
                    </div>
                    
                    <div class="form-group">
                        <label for="destination">Lokasi Tujuan <span class="required">*</span></label>
                        <input type="text" id="destination" name="destination" required 
                               placeholder="Contoh: Bali, Lombok, dll">
                    </div>
                    
                    <div class="form-group">
                        <label for="passengers">Jumlah Orang</label>
                        <input type="number" id="passengers" name="passengers" min="1" value="1" 
                               placeholder="Jumlah penumpang">
                    </div>
                    
                    <div class="form-group">
                        <label for="travel-date">Tanggal Berangkat (Opsional)</label>
                        <input type="date" id="travel-date" name="travel_date" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="additional-message">Pesan Tambahan (Opsional)</label>
                        <textarea id="additional-message" name="additional_message" rows="3" 
                                  placeholder="Tambahkan pesan khusus atau permintaan lainnya..."></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn-cancel" onclick="tutupModalPemesanan()">Batal</button>
                        <button type="submit" class="btn-submit">
                            <i class="icon icon-whatsapp"></i> Kirim via WhatsApp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><?php echo htmlspecialchars($companyInfoData['name']); ?></h3>
                    <p><?php echo htmlspecialchars($companyInfoData['description']); ?></p>
                </div>
                <div class="footer-section">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="pemesanan.php">Pemesanan Tiket</a></li>
                        <li><a href="galeri.php">Galeri</a></li>
                        <li><a href="kontak.php">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <p><i class="icon icon-whatsapp"></i> <?php echo htmlspecialchars($companyInfoData['whatsapp']); ?></p>
                    <p><i class="icon icon-email"></i> <?php echo htmlspecialchars($companyInfoData['email']); ?></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 <?php echo htmlspecialchars($companyInfoData['name']); ?>. All rights reserved.</p>
                <!-- Ikon kunci admin (tersembunyi) -->
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

    <!-- JavaScript Data dan Konfigurasi -->
    <script>
        // Data akan dimuat dari config.js dan pemesanan.js
        // Ensure global variables are available
        window.dataTransportasi = window.dataTransportasi || {};
        window.KONFIGURASI_PERUSAHAAN = window.KONFIGURASI_PERUSAHAAN || {
            whatsapp: '<?php echo htmlspecialchars($companyInfoData["whatsapp"]); ?>'
        };
    </script>

    <script src="config.js"></script>
    <script src="script.js"></script>
    <script src="pemesanan.js"></script>
    
    <script>
        // Pastikan fungsi tersedia setelah semua script dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Jika dataTransportasi kosong, gunakan data default
            if (!window.dataTransportasi || Object.keys(window.dataTransportasi).length === 0) {
                window.dataTransportasi = DATA_TRANSPORTASI_DEFAULT;
            }
            
            // Render cards setelah data siap
            if (typeof renderTransportCards === 'function') {
                renderTransportCards('semua');
            }
        });
    </script>
</body>
</html>


