# CV. Cendana Travel - Website Travel Agency

Website travel agency profesional dengan sistem pemesanan tiket dan admin panel lengkap.

## Fitur Utama

### Halaman Pengunjung

**Homepage**
- Hero section dengan gradient background
- Service showcase dan statistik perusahaan
- About section dan contact information
- Responsive design untuk semua device

**Halaman Pemesanan**
- Hero section dengan gradient background
- Filter tabs untuk Pesawat, Kapal, dan Bus
- Service cards dengan logo perusahaan
- Booking modal dengan WhatsApp integration
- Trust section untuk kepercayaan pelanggan

**Halaman Galeri**
- Grid layout responsive dengan lightbox modal
- Filter kategori (All, Transport, Office, Facilities)

**Halaman Kontak**
- Google Maps integration
- Informasi lengkap (WhatsApp, Email, Alamat, Jam Operasional)

**Halaman FAQ**
- Accordion design
- Pertanyaan umum seputar booking dan layanan

### Admin Panel
- Dashboard dengan metrics
- CRUD lengkap untuk Transport, Facilities, Gallery, FAQ
- Image upload dengan preview
- Dark mode support
- Secure authentication system

## Tech Stack

**Frontend:**
- HTML5 dengan semantic markup
- CSS3 custom styling (CSS Variables, Flexbox, Grid, Animations, Dark Mode)
- Vanilla JavaScript ES6+ (Modular, Event-driven)

**Backend:**
- Native PHP
- MySQL/MariaDB

**Libraries:**
- Google Fonts (Inter, Plus Jakarta Sans)
- Font Awesome 6
- WhatsApp Business API

**Architecture:**
- Multi-Page Application (MPA) dengan server-side rendering
- Component-based CSS untuk reusable styles
- Module pattern dan namespace pattern untuk clean code

## Instalasi

**Prerequisites:**
- XAMPP/WAMP/LAMP (Apache + PHP + MySQL)
- Modern Browser

**Setup Database:**
```
http://localhost/cendanaphp/setup_database.php
```

**Akses Website:**
- Homepage: `http://localhost/cendanaphp/`
- Booking: `http://localhost/cendanaphp/pemesanan.php`
- Admin Panel: `http://localhost/cendanaphp/admin.php`

**Login Admin:**
- Username: `admin`
- Password: `admin123`

## Design Highlights

**UI/UX:**
- Modern gradient backgrounds dengan warna profesional
- Smooth animations menggunakan CSS3 transitions
- Fully responsive dengan mobile-first approach
- Dark mode support untuk semua halaman
- Clean typography dengan Inter & Plus Jakarta Sans

**Booking Page:**
- Professional card design dengan large logo area
- Dynamic section titles berdasarkan filter aktif
- Responsive grid layout (3 kolom desktop, 1 kolom mobile)
- Clean design dengan fokus pada content

## Struktur File

```
cendanaphp/
├── index.php              # Homepage
├── pemesanan.php          # Booking page
├── galeri.php             # Gallery page
├── kontak.php             # Contact page
├── faq.php                # FAQ page
├── admin.php              # Admin dashboard
├── auth.php               # Authentication system
├── setup_database.php     # Database setup utility
├── database.sql           # Database structure
├── styles.css             # Main stylesheet (~11,000 lines)
├── icons.css              # Icon font definitions
├── admin-enhancements.css # Admin panel styling
├── script.js              # Global JavaScript
├── config.js              # Data configuration
├── pemesanan.js           # Booking app JavaScript
├── config/
│   └── database.php       # Database connection
├── includes/
│   └── functions.php      # PHP helper functions
└── uploads/
    ├── bus/               # Bus company logos
    ├── kapal/             # Ship company logos
    ├── pesawat/           # Airline logos
    └── gallery/           # Gallery images
```

## Recent Updates (v3.0)

**Pemesanan Page - Complete Rebuild:**
- Hero section dengan gradient background dan floating circles
- Enhanced filter tabs dengan icon dan badge counter
- Professional card layout dengan large logo area
- Booking modal dengan WhatsApp integration
- Simplified animations untuk better performance
- Namespace pattern untuk clean code (bookingApp)

**Bug Fixes:**
- Fixed empty cards on first load
- Fixed logo loading issues
- Removed heavy gradient animations
- Optimized smooth animations

**Code Quality:**
- Modular JavaScript dengan clear separation
- No global scope pollution
- Optimized CSS (removed unused selectors)
- Proper error handling dan console logging

## Project Status

| Feature | Status |
|---------|--------|
| Homepage | Complete |
| Booking Page | Complete |
| Gallery | Complete |
| Contact | Complete |
| FAQ | Complete |
| Admin Panel | Complete |
| Dark Mode | Complete |
| Responsive Design | Complete |
| WhatsApp Integration | Complete |

## Performance

- Lighthouse Score: 90+ (Performance)
- Total Size: ~2.5MB (including images)
- Load Time: <2s (on localhost)
- Mobile Score: 95+ (Responsive)
- Accessibility: 90+ (WCAG 2.1)

## Informasi Proyek

Proyek ini merupakan bagian dari tugas akademik **Universitas Mulawarman, Fakultas Informatika**.

**Developer:** Riyadi Ambis  
**Repository:** [cendanaTravel_V3](https://github.com/riyadiambis/cendanaTravel_V3)  
**Branch:** riyadi  
**Version:** 3.0  
**Last Updated:** November 16, 2025

## License

Educational Project - Universitas Mulawarman © 2025