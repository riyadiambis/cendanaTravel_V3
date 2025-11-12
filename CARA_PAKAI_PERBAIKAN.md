# 📝 Cara Menggunakan File Perbaikan CSS

## Langkah Instalasi

### 1. Tambahkan di `index.php`
Buka file `index.php` dan tambahkan baris ini di bagian `<head>`, **setelah** `styles.css`:

```html
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="styles_perbaikan.css">  <!-- Tambahkan ini -->
```

### 2. Salin ke Halaman Lain
Lakukan hal yang sama untuk file:
- `pemesanan.php`
- `galeri.php`
- `kontak.php`
- `faq.php`

---

## 🎨 Apa yang Diperbaiki?

### 1. **Typography & Font**
- Menggunakan font **Inter** yang lebih modern dan mudah dibaca
- Ukuran font lebih jelas hierarkinya (judul besar, subjudul sedang, teks kecil)
- Line height yang lebih lega (1.7-1.8) agar tidak sesak

### 2. **Spacing (Jarak)**
- Padding section diperbesar jadi **90px** (dari sebelumnya lebih kecil)
- Margin antar elemen lebih konsisten
- Card punya ruang bernafas yang cukup

### 3. **Card & Component**
- Border radius lebih besar (14-18px) untuk kesan modern
- Box shadow lebih halus dan natural
- Hover effect yang smooth dengan `transform: translateY()`
- Border yang lebih subtle

### 4. **Warna & Kontras**
- Warna teks abu gelap (#2d3748) lebih lembut dari hitam
- Warna subtitle abu-abu (#64748b) untuk hierarki yang jelas
- Background putih bersih (#ffffff)
- Gradient biru yang lebih smooth

### 5. **Button & Interactive Elements**
- Tombol dengan gradient yang lebih menarik
- Shadow yang lebih menonjol saat hover
- Transition 0.3s untuk semua efek
- Transform translateY(-2px sampai -3px) saat hover

### 6. **Hero Section**
- Padding lebih besar (160px top, 120px bottom)
- Font title lebih besar (3.5rem)
- Stat card dengan backdrop blur untuk efek modern

### 7. **Footer**
- Padding lebih lega (60px top, 30px bottom)
- Gradient biru yang lebih smooth
- Link dengan efek slide saat hover

### 8. **Responsive Design**
- Semua ukuran disesuaikan untuk mobile
- Padding dikurangi di layar kecil
- Font size lebih kecil tapi tetap readable
- Grid otomatis jadi 1 kolom di mobile

### 9. **Dark Mode**
- Warna background dan text disesuaikan
- Border dan shadow tetap terlihat di dark mode
- Kontras yang cukup untuk readability

### 10. **Accessibility**
- Focus state yang jelas (outline biru)
- Selection color yang matching
- Smooth scroll untuk navigasi

---

## 🔍 Detail Perubahan Per Section

### Hero Section
```
- Font title: 3.5rem (lebih besar)
- Padding: 160px 0 120px (lebih lega)
- Stat card: backdrop blur + border
```

### Service Cards
```
- Padding: 42px 32px (lebih lega)
- Border radius: 16px (lebih rounded)
- Shadow: 0 4px 20px (lebih halus)
- Hover: translateY(-8px) (lebih tinggi)
```

### Transport Cards
```
- Border radius: 14px
- Shadow lebih subtle
- Hover effect smooth
```

### About & Contact
```
- Card padding: 40px 36px
- Backdrop blur: 12px
- Highlight dengan border-left accent
- Hover: translateX(8px)
```

### Maps
```
- Container padding: 40px
- Border radius: 20px
- Shadow lebih dalam
- Overlay dengan backdrop blur
```

### Footer
```
- Padding: 60px 0 30px
- Gradient 3 warna biru
- Link hover dengan padding-left
```

---

## 📱 Responsive Breakpoint

File ini menggunakan 1 breakpoint utama:
```css
@media (max-width: 768px) {
    /* Semua penyesuaian mobile di sini */
}
```

Di mobile:
- Section padding: 60px (dari 90px)
- Font title: 2rem (dari 2.8rem)
- Card padding dikurangi
- Grid jadi 1 kolom

---

## ✨ Tips Tambahan

### Jika Ingin Mengubah Warna Utama
Cari dan ganti warna ini di file:
- `#3b82f6` = Biru utama
- `#2563eb` = Biru gelap
- `#1e3a8a` = Navy blue

### Jika Ingin Mengubah Font
Ganti di bagian atas file:
```css
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
```

Ubah `Inter` dengan font pilihan kamu (misalnya `Poppins` atau `Nunito Sans`)

### Jika Ingin Shadow Lebih Halus
Kurangi nilai opacity di shadow:
```css
box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
/* Ubah 0.06 jadi 0.03 untuk lebih halus */
```

---

## 🎯 Hasil Akhir

Dengan file ini, website kamu akan:
✅ Terlihat lebih profesional dan modern
✅ Spacing yang lebih lega dan nyaman dipandang
✅ Typography yang jelas hierarkinya
✅ Hover effect yang smooth dan menarik
✅ Responsive di semua ukuran layar
✅ Tetap terlihat "manusiawi" (tidak terlalu sempurna)

---

## 🐛 Troubleshooting

### Jika Tampilan Tidak Berubah
1. Clear cache browser (Ctrl + Shift + R)
2. Pastikan file `styles_perbaikan.css` ada di folder yang sama dengan `index.php`
3. Cek apakah sudah ditambahkan di `<head>` setelah `styles.css`

### Jika Ada Konflik Style
File ini menggunakan CSS specificity yang sama, jadi akan override style lama.
Jika ada masalah, cek di browser DevTools (F12) bagian mana yang konflik.

---

## 📞 Catatan

File ini **tidak mengubah** struktur HTML atau logic PHP yang sudah ada.
Hanya menambahkan/override styling CSS untuk tampilan yang lebih baik.

Semua class dan ID tetap sama, jadi aman untuk digunakan tanpa merusak fungsi website.

---

**Dibuat dengan ❤️ untuk CV. Cendana Travel**
*Versi: 1.0 - Perbaikan Visual Profesional*
