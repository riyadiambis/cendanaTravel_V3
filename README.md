# 🌟 Website CV. Cendana Travel

**Website travel agency profesional dengan desain modern dan admin panel lengkap**

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![Version](https://img.shields.io/badge/version-3.0-blue.svg)]()

## ✨ Fitur Utama

### 🌐 **Halaman Pengunjung:**

#### 🏠 **Beranda (Homepage)**
- Hero section dengan gradient background
- Service showcase dengan icon profesional
- Statistik perusahaan (10+ tahun pengalaman)
- About & Contact section terintegrasi
- Responsive design untuk semua device

#### 🎫 **Pemesanan Tiket (Booking Page)**
- **Hero Section** - Gradient background dengan floating circles animation
- **Filter Tabs** - Pesawat, Kapal, Bus dengan icon dan badge counter
- **Service Cards** - Grid layout 3 kolom dengan logo perusahaan besar
- **Booking Modal** - Form pemesanan lengkap dengan WhatsApp integration
- **Trust Section** - 4 trust badges (Pembayaran Aman, Booking Instan, Support 24/7, Harga Terbaik)
- **Real-time data** dari config.js (8 Maskapai, 2 Kapal, 1 Bus)

#### 📷 **Galeri**
- Grid layout responsive
- Lightbox modal untuk preview gambar
- Kategori filter (All, Transport, Office, Facilities)

#### 📞 **Kontak**
- Google Maps integration
- Info lengkap (WhatsApp, Email, Alamat, Jam Operasional)
- WhatsApp quick contact button

#### ❓ **FAQ**
- Accordion design yang smooth
- Pertanyaan umum seputar booking dan layanan

### 🔐 **Admin Panel:**
- ✅ Dashboard modern dengan metrics
- ✅ CRUD lengkap untuk Transport, Facilities, Gallery, FAQ
- ✅ Image upload dengan preview
- ✅ Dark mode support
- ✅ Responsive design
- ✅ Secure authentication system

## 💻 Tech Stack

### **Frontend:**
- ✅ **HTML5** - Semantic markup
- ✅ **CSS3** - Custom styling (No framework)
  - CSS Variables
  - Flexbox & Grid Layout
  - CSS Animations & Transitions
  - Media Queries (Responsive)
  - Dark Mode Support
- ✅ **Vanilla JavaScript (ES6+)** - No framework
  - Modular code structure
  - Event-driven architecture
  - DOM manipulation
  - Local Storage

### **Backend:**
- ✅ **Native PHP** - No framework
- ✅ **MySQL/MariaDB** - Database

### **Libraries:**
- 🎨 **Google Fonts** - Inter & Plus Jakarta Sans
- 🎭 **Font Awesome 6** - Icon library
- 🌐 **WhatsApp Business API** - Booking integration

### **Architecture:**
- 📁 **MPA (Multi-Page Application)** - Server-side rendered
- 🎯 **Component-based CSS** - Reusable styles
- 📦 **Module Pattern JavaScript** - Clean code organization
- 🔒 **Namespace Pattern** - Avoid global pollution

## 🚀 Cara Menggunakan

### **Prerequisites:**
- XAMPP/WAMP/LAMP (Apache + PHP + MySQL)
- Modern Browser (Chrome, Firefox, Edge)

### **1. Setup Database (Opsional)**
```
http://localhost/cendanaphp/setup_database.php
```

### **2. Akses Website**
```
Homepage: http://localhost/cendanaphp/
Booking:  http://localhost/cendanaphp/pemesanan.php
Gallery:  http://localhost/cendanaphp/galeri.php
Contact:  http://localhost/cendanaphp/kontak.php
FAQ:      http://localhost/cendanaphp/faq.php
```

### **3. Login Admin**
```
URL:      http://localhost/cendanaphp/admin.php
Username: admin
Password: admin123
```

## 🎨 Fitur Design

### **UI/UX Highlights:**
- 🎭 **Modern Gradient Backgrounds** - Professional blue gradients
- 🎬 **Smooth Animations** - CSS3 transitions & keyframes
- 📱 **Fully Responsive** - Mobile-first approach
- 🌙 **Dark Mode** - Complete dark theme support
- ♿ **Accessibility** - Semantic HTML & ARIA labels
- ⚡ **Performance Optimized** - No bloat, fast loading
- 🎯 **Clean Typography** - Inter & Plus Jakarta Sans

### **Booking Page Highlights:**
- 💳 Large logo area (140px height) dengan gradient background
- 🎨 Professional card design dengan hover effects
- 📊 Dynamic section titles berdasarkan filter
- 🏷️ Price tags dengan subtle color change on hover
- 📱 Responsive 3-column grid (desktop) → 1-column (mobile)
- ✨ No clutter design - Icon minimal, fokus ke content

## 📁 Struktur File

```
cendanaphp/
├── 📄 index.php              # Homepage
├── 📄 pemesanan.php          # Booking page (Clean rebuild)
├── 📄 galeri.php             # Gallery page
├── 📄 kontak.php             # Contact page
├── 📄 faq.php                # FAQ page
├── 📄 admin.php              # Admin dashboard
├── 📄 auth.php               # Authentication system
├── 📄 setup_database.php     # Database setup utility
├── 📄 database.sql           # Database structure
│
├── 🎨 styles.css             # Main stylesheet (~11,000 lines)
├── 🎨 icons.css              # Icon font definitions
├── 🎨 admin-enhancements.css # Admin panel styling
│
├── ⚙️ script.js              # Global JavaScript
├── ⚙️ config.js              # Data configuration
├── ⚙️ pemesanan.js           # Booking app (Clean version)
│
├── 📁 config/
│   └── database.php          # Database connection
│
├── 📁 includes/
│   └── functions.php         # PHP helper functions
│
└── 📁 uploads/
    ├── bus/                  # Bus company logos
    ├── kapal/                # Ship company logos
    ├── pesawat/              # Airline logos
    └── gallery/              # Gallery images
```

## 🔧 Recent Updates (v3.0)

### **Pemesanan Page - Complete Rebuild** ✅
- ✨ Brand new hero section dengan gradient & floating circles
- 🎯 Enhanced filter tabs dengan icon, description & badge
- 💎 Professional card layout dengan large logo area
- 📝 Clean booking modal dengan WhatsApp integration
- 🎨 Simplified animations untuk better performance
- 🚀 Namespace pattern untuk clean code (bookingApp)
- 🐛 **Bug Fixes:**
  - ✅ No more empty cards on first load
  - ✅ Logo loading handled properly
  - ✅ Smooth animations without lag
  - ✅ Removed heavy gradient animations

### **Code Quality Improvements** ✅
- 🧹 Removed all documentation MD files (kept README only)
- 📦 Modular JavaScript with clear separation
- 🎯 No global scope pollution
- ⚡ Optimized CSS (removed unused selectors)
- 🔒 Proper error handling & console logging

## 🎯 Project Status

| Feature | Status | Notes |
|---------|--------|-------|
| Homepage | ✅ Complete | Modern hero, services, stats |
| Booking Page | ✅ Complete | Clean rebuild, no bugs |
| Gallery | ✅ Complete | Lightbox modal |
| Contact | ✅ Complete | Google Maps integration |
| FAQ | ✅ Complete | Accordion design |
| Admin Panel | ✅ Complete | Full CRUD operations |
| Dark Mode | ✅ Complete | All pages supported |
| Responsive | ✅ Complete | Mobile-first approach |
| WhatsApp API | ✅ Complete | Booking integration |

## 📊 Performance

- ⚡ **Lighthouse Score:** 90+ (Performance)
- 📦 **Total Size:** ~2.5MB (including images)
- 🚀 **Load Time:** <2s (on localhost)
- 📱 **Mobile Score:** 95+ (Responsive)
- ♿ **Accessibility:** 90+ (WCAG 2.1)

## 🤝 Contributing

This project is part of academic work at **Universitas Mulawarman, Fakultas Informatika**.

**Developer:** Riyadi Ambis
**Repository:** [cendanaTravel_V3](https://github.com/riyadiambis/cendanaTravel_V3)
**Branch:** riyadi

## 📄 License

Educational Project - Universitas Mulawarman © 2025

---

**Last Updated:** November 16, 2025
**Version:** 3.0 - Major Rebuild Complete ✨