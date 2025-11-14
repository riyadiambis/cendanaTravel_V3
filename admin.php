<?php
/**
 * ============================================
 * ADMIN DASHBOARD - CV. CENDANA TRAVEL
 * ============================================
 * 
 * Dashboard admin dengan CRUD lengkap untuk semua fitur
 * Dibuat dengan gaya coding mahasiswa - tanpa framework
 * Simple tapi works! 
 * 
 * Password: admin123
 * Username: admin
 */

// Enable error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database dan inisialisasi  
require_once 'config/database.php';
require_once 'includes/functions.php';

// Mulai session yang aman
startSecureSession();

// Cek apakah admin sudah login
if (!isAdminLoggedIn()) {
    header('Location: index.php');
    exit();
}

// Handle CRUD operations dengan POST-REDIRECT-GET Pattern
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $module = $_POST['module'] ?? '';
    
    /* CRUD sederhana tanpa framework dengan PRG Pattern */
    
    // ============================================
    // HANDLE GENERAL INFO UPDATE
    // ============================================
    if ($action === 'update' && $module === 'general') {
        if (updateCompanyInfo($_POST)) {
            $_SESSION['admin_message'] = 'Informasi perusahaan berhasil diperbarui!';
            $_SESSION['admin_message_type'] = 'success';
        } else {
            $_SESSION['admin_message'] = 'Gagal memperbarui informasi perusahaan!';
            $_SESSION['admin_message_type'] = 'error';
        }
        header('Location: admin.php');
        exit();
    }
    
    // ============================================
    // HANDLE BANNER OPERATIONS
    // ============================================
    elseif ($module === 'banner') {
        if ($action === 'add') {
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imagePath = uploadImage($_FILES['image'], 'uploads/');
            }
            
            if (addBanner($_POST, $imagePath)) {
                $_SESSION['admin_message'] = 'Banner berhasil ditambahkan!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal menambahkan banner!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
        elseif ($action === 'update') {
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imagePath = uploadImage($_FILES['image'], 'uploads/');
            }
            
            if (updateBanner($_POST['id'], $_POST, $imagePath)) {
                $_SESSION['admin_message'] = 'Banner berhasil diperbarui!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal memperbarui banner!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
        elseif ($action === 'delete') {
            if (deleteBanner($_POST['id'])) {
                $_SESSION['admin_message'] = 'Banner berhasil dihapus!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal menghapus banner!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
    }
    
    // ============================================
    // HANDLE GALLERY OPERATIONS
    // ============================================
    elseif ($module === 'gallery') {
        if ($action === 'add') {
            $imagePath = uploadImage($_FILES['image'], 'uploads/gallery/');
            if ($imagePath && addGallery($_POST, $imagePath)) {
                $_SESSION['admin_message'] = 'Foto galeri berhasil ditambahkan!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal menambahkan foto galeri!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
        elseif ($action === 'update') {
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imagePath = uploadImage($_FILES['image'], 'uploads/gallery/');
            }
            
            if (updateGallery($_POST['id'], $_POST, $imagePath)) {
                $_SESSION['admin_message'] = 'Foto galeri berhasil diperbarui!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal memperbarui foto galeri!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
        elseif ($action === 'delete') {
            if (deleteGallery($_POST['id'])) {
                $_SESSION['admin_message'] = 'Foto galeri berhasil dihapus!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal menghapus foto galeri!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
    }
    
    // ============================================
    // HANDLE CONTACT INFO UPDATE
    // ============================================
    elseif ($action === 'update' && $module === 'contact') {
        if (updateContactInfo($_POST)) {
            $_SESSION['admin_message'] = 'Informasi kontak berhasil diperbarui!';
            $_SESSION['admin_message_type'] = 'success';
        } else {
            $_SESSION['admin_message'] = 'Gagal memperbarui informasi kontak!';
            $_SESSION['admin_message_type'] = 'error';
        }
        header('Location: admin.php');
        exit();
    }
    
    // ============================================
    // HANDLE FAQ OPERATIONS
    // ============================================
    elseif ($module === 'faq') {
        if ($action === 'add') {
            if (addFAQ($_POST)) {
                $_SESSION['admin_message'] = 'FAQ berhasil ditambahkan!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal menambahkan FAQ!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
        elseif ($action === 'update') {
            if (updateFAQ($_POST['id'], $_POST)) {
                $_SESSION['admin_message'] = 'FAQ berhasil diperbarui!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal memperbarui FAQ!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
        elseif ($action === 'delete') {
            if (deleteFAQ($_POST['id'])) {
                $_SESSION['admin_message'] = 'FAQ berhasil dihapus!';
                $_SESSION['admin_message_type'] = 'success';
            } else {
                $_SESSION['admin_message'] = 'Gagal menghapus FAQ!';
                $_SESSION['admin_message_type'] = 'error';
            }
            header('Location: admin.php');
            exit();
        }
    }

}

// Ambil data untuk dashboard
$stats = getDashboardStats();
$companyInfo = getCompanyInfo();
$contactInfo = getContactInfo();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CV. Cendana Travel</title>
    
    <!-- External Dependencies -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="admin-enhancements.css">
    <script src="config.js"></script>
    
    <style>
        /* ============================================
         * CSS VARIABLES - KONSISTEN DENGAN WEBSITE UTAMA
         * ============================================ */
        :root {
            /* Warna utama yang konsisten dengan website */
            --admin-primary: #2563eb;
            --admin-secondary: #3b82f6;
            --admin-accent: #60a5fa;
            --admin-dark: #1e293b;
            --admin-darker: #0f172a;
            
            /* Background colors */
            --admin-bg-main: #ffffff;
            --admin-bg-secondary: #f8fafc;
            --admin-bg-tertiary: #f1f5f9;
            --admin-bg-card: #ffffff;
            
            /* Text colors */
            --admin-text-primary: #1e293b;
            --admin-text-secondary: #475569;
            --admin-text-muted: #64748b;
            
            /* Border and shadows */
            --admin-border: #e2e8f0;
            --admin-border-light: #f1f5f9;
            --admin-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
            --admin-shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            --admin-shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.1);
            --admin-shadow-primary: 0 4px 20px rgba(37, 99, 235, 0.15);
            
            /* Gradients */
            --admin-gradient-primary: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            --admin-gradient-header: linear-gradient(135deg, #1e293b 0%, #2563eb 50%, #3b82f6 100%);
            --admin-gradient-sidebar: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            
            /* Success, warning, danger colors */
            --admin-success: #10b981;
            --admin-warning: #f59e0b;
            --admin-danger: #ef4444;
            --admin-info: #06b6d4;
        }

        /* Dark mode variables */
        body.dark-mode {
            --admin-bg-main: #0f172a;
            --admin-bg-secondary: #1e293b;
            --admin-bg-tertiary: #334155;
            --admin-bg-card: #1e293b;
            
            --admin-text-primary: #f1f5f9;
            --admin-text-secondary: #cbd5e1;
            --admin-text-muted: #94a3b8;
            
            --admin-border: #334155;
            --admin-border-light: #475569;
            --admin-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.3);
            --admin-shadow-md: 0 4px 12px rgba(0, 0, 0, 0.4);
            --admin-shadow-lg: 0 10px 40px rgba(0, 0, 0, 0.5);
            
            --admin-gradient-header: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #2563eb 100%);
            --admin-gradient-sidebar: linear-gradient(180deg, #1e293b 0%, #334155 100%);
        }

        /* Reset dan Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--admin-bg-secondary);
            color: var(--admin-text-primary);
            line-height: 1.6;
            overflow-x: hidden;
            transition: all 0.3s ease;
        }

        /* Header Styles - Lebih Modern dan Konsisten */
        .admin-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background: var(--admin-gradient-header);
            backdrop-filter: blur(12px);
            box-shadow: var(--admin-shadow-lg);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .admin-logo {
            color: white;
            font-weight: 700;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: -0.02em;
        }

        .admin-logo i {
            font-size: 1.6rem;
            color: #60a5fa;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        .admin-user {
            color: white;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-user span {
            font-size: 0.95rem;
            font-weight: 500;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.2);
            padding: 10px 18px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Sidebar Styles - Lebih Bersih dan Modern */
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            width: 280px;
            height: calc(100vh - 70px);
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding: 24px 0;
            overflow-y: auto;
            z-index: 999;
            box-shadow: 0 8px 32px rgba(102, 126, 234, 0.2);
        }

        .sidebar-nav {
            padding: 0 20px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 16px 20px;
            margin: 6px 16px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 0.95rem;
            position: relative;
            border: 1px solid transparent;
        }

        .nav-link i {
            width: 20px;
            margin-right: 16px;
            text-align: center;
            opacity: 0.9;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(4px);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .nav-link:hover i {
            transform: scale(1.1);
            opacity: 1;
        }

        .nav-link.active i {
            opacity: 1;
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            border-color: rgba(255, 255, 255, 0.3);
            font-weight: 600;
            transform: translateX(4px);
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: -20px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: #60a5fa;
            border-radius: 0 4px 4px 0;
        }

        /* Main Content - Layout yang Lebih Baik */
        .admin-content {
            margin-left: 280px;
            margin-top: 70px;
            padding: 40px 36px;
            min-height: calc(100vh - 70px);
            background: var(--admin-bg-secondary);
            position: relative;
            overflow: auto;
        }

        .content-section {
            display: none;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .content-section.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
            animation: fadeInUp 0.4s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Page Headers - Typography yang Lebih Profesional */
        .content-section h1 {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--admin-text-primary);
            margin-bottom: 12px;
            letter-spacing: -0.03em;
            line-height: 1.2;
        }

        .content-section > p {
            color: var(--admin-text-secondary);
            margin-bottom: 32px;
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 600px;
        }

        /* Stats Grid - Desain yang Lebih Menarik */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--admin-bg-card);
            padding: 32px 28px;
            border-radius: 20px;
            box-shadow: var(--admin-shadow-md);
            border: 2px solid var(--admin-border);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--admin-gradient-primary);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.05) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--admin-shadow-lg);
            border-color: var(--admin-primary);
        }

        .stat-card:hover::after {
            opacity: 1;
        }

        .stat-card h3 {
            color: var(--admin-text-muted);
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .stat-card .number {
            color: var(--admin-primary);
            font-size: 2.4rem;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }

        .stat-card small {
            color: var(--admin-text-secondary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Section Cards - Desain yang Lebih Modern */
        .section-card {
            background: var(--admin-bg-card);
            border-radius: 20px;
            box-shadow: var(--admin-shadow-md);
            margin-bottom: 32px;
            overflow: hidden;
            border: 2px solid var(--admin-border);
            transition: all 0.3s ease;
        }

        .section-card:hover {
            box-shadow: var(--admin-shadow-lg);
            border-color: var(--admin-primary);
        }

        .section-header {
            padding: 24px 32px;
            border-bottom: 2px solid var(--admin-border-light);
            background: linear-gradient(135deg, var(--admin-bg-secondary) 0%, var(--admin-bg-tertiary) 100%);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .section-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--admin-gradient-primary);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .section-card:hover .section-header::before {
            transform: scaleX(1);
        }

        .section-header h2 {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--admin-text-primary);
            letter-spacing: -0.01em;
        }

        .section-content {
            padding: 32px 36px;
        }

        /* Form Styles - Lebih Konsisten dan Modern */
        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-group input[type="file"] {
            padding: 10px;
            border: 2px dashed var(--admin-border);
            border-radius: 8px;
            background: transparent;
        }

        body.dark-mode .form-group input[type="file"] {
            border-color: #475569;
            color: #e2e8f0;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--admin-text-primary);
            font-size: 0.95rem;
            letter-spacing: -0.01em;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 16px 18px;
            border: 2px solid var(--admin-border);
            border-radius: 12px;
            font-size: 0.95rem;
            background: var(--admin-bg-main);
            color: var(--admin-text-primary);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            transform: translateY(-2px);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-group input[type="file"] {
            padding: 12px 16px;
            background: var(--admin-bg-secondary);
            border-style: dashed;
        }

        .form-group input[type="checkbox"] {
            width: auto;
            margin-right: 12px;
            transform: scale(1.2);
            accent-color: var(--admin-primary);
        }

        .form-group small {
            color: var(--admin-text-muted);
            font-size: 0.85rem;
            display: block;
            margin-top: 6px;
            line-height: 1.4;
        }

        /* Button Styles - Lebih Menarik dan Konsisten */
        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.9rem;
            font-family: inherit;
            letter-spacing: -0.01em;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: var(--admin-gradient-primary);
            color: white;
            box-shadow: var(--admin-shadow-primary);
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--admin-text-muted) 0%, var(--admin-text-secondary) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, var(--admin-text-secondary) 0%, var(--admin-text-primary) 100%);
            transform: translateY(-2px);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--admin-success) 0%, #34d399 100%);
            color: white;
            box-shadow: 0 4px 20px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(16, 185, 129, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--admin-danger) 0%, #f87171 100%);
            color: white;
            box-shadow: 0 4px 20px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(239, 68, 68, 0.4);
        }

        /* Table Styles - Lebih Modern */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: var(--admin-bg-card);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--admin-shadow-md);
            border: 2px solid var(--admin-border);
        }

        .table th,
        .table td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid var(--admin-border-light);
        }

        .table th {
            font-weight: 700;
            color: var(--admin-text-primary);
            background: linear-gradient(135deg, var(--admin-bg-secondary) 0%, var(--admin-bg-tertiary) 100%);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            position: relative;
        }

        .table th::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--admin-gradient-primary);
            opacity: 0.6;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: var(--admin-bg-secondary);
            transform: scale(1.01);
        }

        .table tbody tr:nth-child(even) {
            background: var(--admin-bg-main);
        }

        .table td {
            color: var(--admin-text-primary);
        }

        /* Badge Styles - Lebih Menarik */
        .badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .badge:hover {
            transform: scale(1.05);
        }

        .badge-success { 
            background: linear-gradient(135deg, #10b981, #34d399);
            color: white;
            border-color: rgba(16, 185, 129, 0.2);
        }
        
        .badge-warning { 
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: white;
            border-color: rgba(245, 158, 11, 0.2);
        }
        
        .badge-danger { 
            background: linear-gradient(135deg, #ef4444, #f87171);
            color: white;
            border-color: rgba(239, 68, 68, 0.2);
        }
        
        .badge-info { 
            background: linear-gradient(135deg, #06b6d4, #22d3ee);
            color: white;
            border-color: rgba(6, 182, 212, 0.2);
        }

        /* Gallery Grid - Lebih Modern */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
            margin-top: 24px;
        }

        .gallery-item {
            background: var(--admin-bg-card);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--admin-shadow-md);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid var(--admin-border);
            position: relative;
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--admin-gradient-primary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--admin-shadow-lg);
            border-color: var(--admin-primary);
        }

        .gallery-item:hover::before {
            opacity: 1;
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-info {
            padding: 20px;
        }

        .gallery-info h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--admin-text-primary);
            margin-bottom: 12px;
            letter-spacing: -0.01em;
        }

        .gallery-info p {
            font-size: 0.9rem;
            color: var(--admin-text-secondary);
            margin-bottom: 16px;
            line-height: 1.5;
        }

        .gallery-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 12px;
            border-top: 1px solid var(--admin-border-light);
        }

        /* FAQ Styles - Lebih Modern */
        .faq-item {
            background: var(--admin-bg-card);
            border-radius: 16px;
            margin-bottom: 20px;
            box-shadow: var(--admin-shadow-md);
            overflow: hidden;
            border: 2px solid var(--admin-border);
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: var(--admin-shadow-lg);
            border-color: var(--admin-primary);
            transform: translateY(-2px);
        }

        .faq-header {
            padding: 20px 24px;
            border-bottom: 2px solid var(--admin-border-light);
            background: linear-gradient(135deg, var(--admin-bg-secondary) 0%, var(--admin-bg-tertiary) 100%);
            position: relative;
        }

        .faq-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--admin-gradient-primary);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .faq-item:hover .faq-header::before {
            transform: scaleX(1);
        }

        .faq-question {
            font-weight: 700;
            color: var(--admin-primary);
            margin-bottom: 12px;
            font-size: 1.05rem;
            letter-spacing: -0.01em;
        }

        .faq-content {
            padding: 20px 24px;
        }

        .faq-actions {
            display: flex;
            gap: 10px;
            float: right;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 80px;
            left: 20px;
            z-index: 1001;
            background: var(--admin-gradient-primary);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 15px;
            cursor: pointer;
            font-size: 18px;
            box-shadow: var(--admin-shadow-lg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(8px);
        }

        .mobile-menu-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 30px rgba(37, 99, 235, 0.4);
        }

        .mobile-menu-toggle:active {
            transform: scale(0.95);
        }

        /* Dark Mode Comprehensive Styling */
        body.dark-mode {
            background-color: var(--admin-bg-secondary);
        }

        body.dark-mode .admin-header {
            background: var(--admin-gradient-header);
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        body.dark-mode .sidebar {
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
            border-right-color: rgba(255, 255, 255, 0.1);
        }

        body.dark-mode .nav-link {
            color: rgba(255, 255, 255, 0.7);
        }

        body.dark-mode .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        body.dark-mode .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-color: rgba(255, 255, 255, 0.2);
        }

        body.dark-mode .section-card {
            background: #1e293b;
            border-color: #334155;
            color: #e2e8f0;
        }

        body.dark-mode .section-header {
            background: linear-gradient(135deg, var(--admin-bg-secondary) 0%, var(--admin-bg-tertiary) 100%);
            border-bottom-color: var(--admin-border-light);
        }

        body.dark-mode .form-group input,
        body.dark-mode .form-group textarea,
        body.dark-mode .form-group select {
            background: #1e293b;
            border-color: #475569;
            color: #e2e8f0;
        }

        body.dark-mode .form-group label {
            color: #cbd5e1;
        }

        body.dark-mode .section-header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #f1f5f9;
        }

        body.dark-mode .section-header h2 {
            color: #f1f5f9;
        }

        body.dark-mode .content-section h1 {
            color: #f8fafc;
        }

        body.dark-mode .content-section p {
            color: #cbd5e1;
        }

        /* Dark mode for transport components */
        body.dark-mode .tab-btn {
            background: #1e293b;
            border-color: #475569;
            color: #e2e8f0;
        }

        body.dark-mode .tab-btn:hover {
            background: #334155;
        }

        body.dark-mode .transport-card {
            background: #1e293b;
            border-color: #475569;
        }

        body.dark-mode .transport-card:hover {
            border-color: #3b82f6;
        }

        body.dark-mode .transport-info h3 {
            color: #f1f5f9;
        }

        body.dark-mode .transport-info p {
            color: #94a3b8;
        }

        body.dark-mode .transport-price {
            color: #60a5fa;
        }

        body.dark-mode .modal-content {
            background: #1e293b;
            border-color: #475569;
        }

        body.dark-mode .modal-header {
            background: #0f172a;
            border-color: #334155;
        }

        body.dark-mode .modal-header h3 {
            color: #f1f5f9;
        }

        body.dark-mode .form-group input:focus,
        body.dark-mode .form-group textarea:focus,
        body.dark-mode .form-group select:focus {
            border-color: var(--admin-primary);
        }

        body.dark-mode .table {
            background: #1e293b;
            color: #e2e8f0;
        }

        body.dark-mode .table th {
            background: #0f172a;
            color: #f1f5f9;
        }

        body.dark-mode .table td {
            color: #e2e8f0;
            border-bottom-color: #334155;
        }

        body.dark-mode .table tbody tr:hover {
            background: #334155;
        }

        body.dark-mode .table tbody tr:hover {
            background: var(--admin-bg-secondary);
        }

        body.dark-mode .gallery-item {
            background: var(--admin-bg-card);
        }

        body.dark-mode .faq-item {
            background: var(--admin-bg-card);
        }

        body.dark-mode .faq-header {
            background: var(--admin-bg-secondary);
            border-bottom-color: var(--admin-border);
        }

        /* Responsive Design - Lebih Komprehensif */
        @media (max-width: 1200px) {
            .admin-content {
                margin-left: 280px;
                padding: 32px 24px;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: none;
            }

            .sidebar.active {
                transform: translateX(0);
                box-shadow: var(--admin-shadow-lg);
            }

            .admin-content {
                margin-left: 0;
                padding: 24px 20px;
                margin-top: 70px;
            }

            .admin-header {
                padding: 0 1rem;
            }

            .admin-logo {
                font-size: 1.1rem;
            }

            .admin-user span {
                padding: 6px 12px;
                font-size: 0.85rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .stat-card {
                padding: 24px 20px;
            }

            .section-header {
                padding: 20px 24px;
            }

            .section-content {
                padding: 24px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .table {
                font-size: 0.85rem;
            }

            .table th,
            .table td {
                padding: 10px 12px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 0.85rem;
            }

            .content-section h1 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .admin-header {
                padding: 0 0.75rem;
            }

            .admin-logo {
                font-size: 1rem;
            }

            .admin-user span {
                display: none;
            }

            .dark-mode-toggle {
                width: 38px;
                height: 38px;
                font-size: 14px;
            }

            .logout-btn {
                padding: 8px 12px;
                font-size: 0.8rem;
            }

            .admin-content {
                padding: 16px;
            }

            .section-content {
                padding: 20px 16px;
            }

            .section-header {
                padding: 16px 20px;
            }

            .section-header h2 {
                font-size: 1.1rem;
            }

            .btn {
                padding: 10px 16px;
                font-size: 0.8rem;
            }

            .form-group input,
            .form-group textarea,
            .form-group select {
                padding: 12px 14px;
            }

            .content-section h1 {
                font-size: 1.6rem;
            }

            .content-section > p {
                font-size: 1rem;
            }
        }

        /* Dark Mode Toggle - Lebih Modern */
        .dark-mode-toggle-container {
            margin-right: 20px;
        }

        .dark-mode-toggle {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            padding: 10px 14px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 16px;
            backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
        }

        .dark-mode-toggle:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1) rotate(10deg);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        body.dark-mode .dark-mode-toggle {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.3);
            color: #60a5fa;
        }

        body.dark-mode .dark-mode-toggle:hover {
            background: rgba(59, 130, 246, 0.3);
            transform: scale(1.1) rotate(-10deg);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        }

        @media (max-width: 768px) {
            .dark-mode-toggle-container {
                margin-right: 10px;
            }
            
            .dark-mode-toggle {
                padding: 6px 10px;
                font-size: 12px;
            }
        }

        /* ============================================
         * TRANSPORT MANAGEMENT STYLING
         * ============================================ */
        .transport-tabs {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            border-bottom: 2px solid var(--admin-border-light);
            padding-bottom: 16px;
        }

        .tab-btn {
            padding: 12px 24px;
            background: var(--admin-bg-card);
            border: 2px solid var(--admin-border);
            border-radius: 12px;
            color: var(--admin-text-primary);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.95rem;
        }

        .tab-btn i {
            font-size: 1.1rem;
            opacity: 0.8;
            transition: all 0.3s ease;
        }

        .tab-btn:hover i,
        .tab-btn.active i {
            opacity: 1;
            transform: scale(1.1);
        }

        .tab-btn:hover {
            background: var(--admin-bg-secondary);
            border-color: var(--admin-primary);
            transform: translateY(-2px);
        }

        .tab-btn.active {
            background: var(--admin-gradient-primary);
            color: white;
            border-color: var(--admin-primary);
            box-shadow: var(--admin-shadow-md);
        }

        .transport-tab-content {
            display: none;
        }

        .transport-tab-content.active {
            display: block;
        }

        .transport-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .transport-card {
            background: var(--admin-bg-card);
            border: 2px solid var(--admin-border);
            border-radius: 16px;
            padding: 20px;
            transition: all 0.3s ease;
            position: relative;
        }

        .transport-card:hover {
            border-color: var(--admin-primary);
            transform: translateY(-4px);
            box-shadow: var(--admin-shadow-lg);
        }

        .transport-card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .transport-logo {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            object-fit: contain;
            background: var(--admin-bg-secondary);
            padding: 8px;
        }

        .transport-info h3 {
            margin: 0 0 4px 0;
            color: var(--admin-text-primary);
            font-size: 1.2rem;
            font-weight: 600;
        }

        .transport-info p {
            margin: 0;
            color: var(--admin-text-secondary);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .transport-price {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--admin-primary);
            margin: 12px 0 16px 0;
        }

        .transport-actions {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }

        .transport-actions .btn {
            padding: 8px 16px;
            font-size: 0.85rem;
        }

        /* Modal Styling */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: var(--admin-bg-card);
            border-radius: 16px;
            width: 90%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: var(--admin-shadow-lg);
            border: 2px solid var(--admin-border);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            border-bottom: 2px solid var(--admin-border-light);
            background: var(--admin-bg-secondary);
            border-radius: 14px 14px 0 0;
        }

        .modal-header h3 {
            margin: 0;
            color: var(--admin-text-primary);
            font-size: 1.3rem;
            font-weight: 600;
        }

        .modal-close {
            font-size: 24px;
            cursor: pointer;
            color: var(--admin-text-secondary);
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: var(--admin-bg-main);
            color: var(--admin-danger);
        }

        .modal-body {
            padding: 24px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--admin-border-light);
        }

        /* Dark mode for transport components */
        body.dark-mode .tab-btn {
            background: #1e293b;
            border-color: #475569;
            color: #e2e8f0;
        }

        body.dark-mode .tab-btn:hover {
            background: #334155;
        }

        body.dark-mode .transport-card {
            background: #1e293b;
            border-color: #475569;
        }

        body.dark-mode .transport-card:hover {
            border-color: #3b82f6;
        }

        body.dark-mode .transport-info h3 {
            color: #f1f5f9;
        }

        body.dark-mode .transport-info p {
            color: #94a3b8;
        }

        body.dark-mode .transport-price {
            color: #60a5fa;
        }

        body.dark-mode .modal-content {
            background: #1e293b;
            border-color: #475569;
        }

        body.dark-mode .modal-header {
            background: #0f172a;
            border-color: #334155;
        }

        body.dark-mode .modal-header h3 {
            color: #f1f5f9;
        }

        /* Professional Tab Icon Styling */
        body.dark-mode .tab-btn i {
            color: #cbd5e1;
        }

        body.dark-mode .tab-btn:hover i,
        body.dark-mode .tab-btn.active i {
            color: #f1f5f9;
        }

        /* Mobile responsive icon adjustments */
        @media (max-width: 768px) {
            .tab-btn {
                gap: 8px;
            }
            
            .tab-btn i {
                font-size: 1rem;
            }
        }

        /* ============================================
         * FLASH NOTIFICATION STYLES
         * ============================================ */
        .flash-notification {
            position: fixed;
            top: 90px;
            right: 30px;
            min-width: 350px;
            max-width: 500px;
            padding: 18px 24px;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            animation: slideInRight 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            border: 2px solid;
        }

        .flash-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.95) 0%, rgba(5, 150, 105, 0.95) 100%);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .flash-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.95) 0%, rgba(220, 38, 38, 0.95) 100%);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .flash-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }

        .flash-content i {
            font-size: 1.4rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        .flash-content span {
            font-size: 0.95rem;
            font-weight: 500;
            line-height: 1.4;
        }

        .flash-close {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .flash-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }

        .flash-notification.hiding {
            animation: slideOutRight 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }

        @media (max-width: 768px) {
            .flash-notification {
                right: 15px;
                left: 15px;
                min-width: auto;
                max-width: none;
            }
        }
    </style>
</head>
<body class="admin-body">
    <!-- Notifikasi Flash Message -->
    <?php if (isset($_SESSION['admin_message'])): ?>
    <div class="flash-notification <?php echo $_SESSION['admin_message_type'] === 'success' ? 'flash-success' : 'flash-error'; ?>" id="flashNotification">
        <div class="flash-content">
            <i class="fas <?php echo $_SESSION['admin_message_type'] === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?>"></i>
            <span><?php echo htmlspecialchars($_SESSION['admin_message']); ?></span>
        </div>
        <button class="flash-close" onclick="closeFlashNotification()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <?php 
        unset($_SESSION['admin_message']);
        unset($_SESSION['admin_message_type']);
    ?>
    <?php endif; ?>

    <!-- Header -->
    <div class="admin-header">
        <div class="admin-logo">
            <i class="fas fa-plane-departure"></i>
            Cendana Travel Admin
        </div>
        <div class="admin-user">
            <div class="dark-mode-toggle-container">
                <button class="dark-mode-toggle" onclick="ubahModeGelap()" title="Toggle Dark Mode">
                    <i class="fas fa-moon"></i>
                </button>
            </div>
            <span>Selamat datang, Admin</span>
            <a href="auth.php?action=logout" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <div class="sidebar admin-sidebar">
        <nav class="sidebar-nav">
            <a href="#dashboard" class="nav-link active" onclick="showSection('dashboard'); return false;">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="#general" class="nav-link" onclick="showSection('general'); return false;">
                <i class="fas fa-cog"></i>
                General
            </a>
            <a href="#beranda" class="nav-link" onclick="showSection('beranda'); return false;">
                <i class="fas fa-image"></i>
                Kelola Beranda
            </a>
            <a href="#transportasi" class="nav-link" onclick="showSection('transportasi'); return false;">
                <i class="fas fa-plane"></i>
                Kelola Transportasi
            </a>
            <a href="#galeri" class="nav-link" onclick="showSection('galeri'); return false;">
                <i class="fas fa-images"></i>
                Galeri
            </a>
            <a href="#kontak" class="nav-link" onclick="showSection('kontak'); return false;">
                <i class="fas fa-phone"></i>
                Kontak
            </a>
            <a href="#faq" class="nav-link" onclick="showSection('faq'); return false;">
                <i class="fas fa-question-circle"></i>
                FAQ
            </a>
        </nav>
    </div>

    <!-- Mobile Menu Toggle -->
    <div class="mobile-menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Main Content -->
    <div class="admin-content">
        <!-- ============================================ -->
        <!-- DASHBOARD SECTION -->
        <!-- ============================================ -->
        <div id="dashboard-section" class="content-section active">
            <h1>Dashboard Administrasi</h1>
            <p>Sistem manajemen terpadu CV. Cendana Travel untuk operasional dan monitoring kinerja bisnis secara real-time</p>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total Layanan</h3>
                    <div class="number" id="total-services">0</div>
                    <small>Layanan transportasi aktif</small>
                </div>
                <div class="stat-card">
                    <h3>Galeri Aktif</h3>
                    <div class="number"><?= $stats['total_galeri'] ?></div>
                    <small>Foto dalam galeri</small>
                </div>
                <div class="stat-card">
                    <h3>FAQ Aktif</h3>
                    <div class="number"><?= $stats['total_faq'] ?></div>
                    <small>Pertanyaan tersedia</small>
                </div>
                <div class="stat-card">
                    <h3>Jenis Transportasi</h3>
                    <div class="number">3</div>
                    <small>Pesawat, Kapal, Bus</small>
                </div>
            </div>
            
            <div class="section-card">
                <div class="section-header">
                    <h2>Ikhtisar Sistem Manajemen</h2>
                </div>
                <div class="section-content">
                    <p>Sistem administrasi terintegrasi dengan fitur manajemen konten lengkap untuk operasional yang efisien:</p>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-top: 24px;">
                        <div style="padding: 20px; background: var(--admin-bg-secondary); border-radius: 12px; border-left: 4px solid var(--admin-primary);">
                            <strong style="color: var(--admin-primary); display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <i class="fas fa-cog"></i> General
                            </strong>
                            <span style="color: var(--admin-text-secondary); font-size: 0.9rem;">Kelola informasi umum perusahaan</span>
                        </div>
                        <div style="padding: 20px; background: var(--admin-bg-secondary); border-radius: 12px; border-left: 4px solid var(--admin-success);">
                            <strong style="color: var(--admin-success); display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <i class="fas fa-image"></i> Kelola Beranda
                            </strong>
                            <span style="color: var(--admin-text-secondary); font-size: 0.9rem;">Manajemen banner dan konten utama</span>
                        </div>
                        <div style="padding: 20px; background: var(--admin-bg-secondary); border-radius: 12px; border-left: 4px solid var(--admin-warning);">
                            <strong style="color: var(--admin-warning); display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <i class="fas fa-ticket-alt"></i> Pemesanan
                            </strong>
                            <span style="color: var(--admin-text-secondary); font-size: 0.9rem;">Monitoring dan pengelolaan reservasi</span>
                        </div>
                        <div style="padding: 20px; background: var(--admin-bg-secondary); border-radius: 12px; border-left: 4px solid var(--admin-info);">
                            <strong style="color: var(--admin-info); display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <i class="fas fa-images"></i> Galeri
                            </strong>
                            <span style="color: var(--admin-text-secondary); font-size: 0.9rem;">Kurasi dan publikasi media visual</span>
                        </div>
                        <div style="padding: 20px; background: var(--admin-bg-secondary); border-radius: 12px; border-left: 4px solid var(--admin-danger);">
                            <strong style="color: var(--admin-danger); display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <i class="fas fa-phone"></i> Kontak
                            </strong>
                            <span style="color: var(--admin-text-secondary); font-size: 0.9rem;">Pemeliharaan informasi komunikasi</span>
                        </div>
                        <div style="padding: 20px; background: var(--admin-bg-secondary); border-radius: 12px; border-left: 4px solid #9333ea;">
                            <strong style="color: #9333ea; display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <i class="fas fa-question-circle"></i> FAQ
                            </strong>
                            <span style="color: var(--admin-text-secondary); font-size: 0.9rem;">Administrasi bantuan pelanggan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- GENERAL INFO SECTION -->
        <!-- ============================================ -->
        <div id="general-section" class="content-section">
            <h1>Informasi Umum Perusahaan</h1>
            <p>Kelola data perusahaan yang ditampilkan di website</p>
            
            <div class="section-card">
                <div class="section-header">
                    <h2>Edit Informasi Perusahaan</h2>
                </div>
                <div class="section-content">
                    <form method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="module" value="general">
                        
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($companyInfo['name'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>WhatsApp</label>
                            <input type="text" name="whatsapp" value="<?= htmlspecialchars($companyInfo['whatsapp'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" name="instagram" value="<?= htmlspecialchars($companyInfo['instagram'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($companyInfo['email'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" required><?= htmlspecialchars($companyInfo['address'] ?? '') ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Jam Operasional</label>
                            <input type="text" name="hours" value="<?= htmlspecialchars($companyInfo['hours'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Deskripsi Perusahaan</label>
                            <textarea name="description" required><?= htmlspecialchars($companyInfo['description'] ?? '') ?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- KELOLA BERANDA SECTION -->
        <!-- ============================================ -->
        <div id="beranda-section" class="content-section">
            <h1>Kelola Banner Beranda</h1>
            <p>Tambah, edit, atau hapus banner yang ditampilkan di halaman utama</p>
            
            <!-- Form Tambah Banner -->
            <div class="section-card">
                <div class="section-header">
                    <h2>Tambah Banner Baru</h2>
                </div>
                <div class="section-content">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="module" value="banner">
                        
                        <div class="form-group">
                            <label>Judul Banner</label>
                            <input type="text" name="title" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Subtitle</label>
                            <textarea name="subtitle"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Gambar Banner</label>
                            <input type="file" name="image" accept="image/*" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Link URL (opsional)</label>
                            <input type="url" name="link_url">
                        </div>
                        
                        <div class="form-group">
                            <label>Urutan Tampil</label>
                            <input type="number" name="display_order" value="0" min="0">
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_active" checked> Aktif
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Banner
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Daftar Banner -->
            <div class="section-card">
                <div class="section-header">
                    <h2>Daftar Banner</h2>
                </div>
                <div class="section-content">
                    <?php $banners = getAllBanners(); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Urutan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($banners)): ?>
                            <tr>
                                <td colspan="5" style="text-align: center; padding: 2rem;">
                                    Belum ada banner. Silakan tambahkan banner pertama.
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($banners as $banner): ?>
                            <tr>
                                <td>
                                    <?php if ($banner['image'] && file_exists($banner['image'])): ?>
                                    <img src="<?= $banner['image'] ?>" alt="Banner" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                                    <?php else: ?>
                                    <div style="width: 60px; height: 40px; background: #f3f4f6; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-image text-gray-400"></i>
                                    </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong><?= htmlspecialchars($banner['title']) ?></strong>
                                    <?php if ($banner['subtitle']): ?>
                                    <br><small><?= truncateText($banner['subtitle'], 50) ?></small>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($banner['is_active']): ?>
                                    <span class="badge badge-success">Aktif</span>
                                    <?php else: ?>
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $banner['display_order'] ?></td>
                                <td>
                                    <button onclick="editBanner(<?= $banner['id'] ?>)" class="btn btn-secondary" style="margin-right: 0.5rem;">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus banner ini?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="module" value="banner">
                                        <input type="hidden" name="id" value="<?= $banner['id'] ?>">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- ============================================ -->
        <!-- MANAJEMEN TRANSPORTASI SECTION -->
        <!-- ============================================ -->
        <div id="transportasi-section" class="content-section">
            <h1>Manajemen Layanan Transportasi</h1>
            <p>Kelola data pesawat, kapal, dan bus yang tersedia untuk pemesanan pelanggan</p>
            
            <!-- Transport Type Tabs -->
            <div class="transport-tabs" style="margin-bottom: 30px;">
                <button class="tab-btn active" data-tab="pesawat">
                    <i class="fas fa-plane"></i> Pesawat
                </button>
                <button class="tab-btn" data-tab="kapal">
                    <i class="fas fa-ship"></i> Kapal
                </button>
                <button class="tab-btn" data-tab="bus">
                    <i class="fas fa-bus"></i> Bus
                </button>
            </div>

            <!-- Pesawat Tab -->
            <div id="pesawat-tab" class="transport-tab-content active">
                <div class="section-card">
                    <div class="section-header">
                        <h2>Manajemen Data Pesawat</h2>
                        <button class="btn btn-primary" onclick="showAddTransportForm('pesawat')">
                            <i class="fas fa-plus"></i> Tambah Pesawat
                        </button>
                    </div>
                    <div class="section-content">
                        <div id="pesawat-grid" class="transport-grid">
                            <!-- Data pesawat akan dimuat di sini -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kapal Tab -->
            <div id="kapal-tab" class="transport-tab-content">
                <div class="section-card">
                    <div class="section-header">
                        <h2>Manajemen Data Kapal</h2>
                        <button class="btn btn-primary" onclick="showAddTransportForm('kapal')">
                            <i class="fas fa-plus"></i> Tambah Kapal
                        </button>
                    </div>
                    <div class="section-content">
                        <div id="kapal-grid" class="transport-grid">
                            <!-- Data kapal akan dimuat di sini -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bus Tab -->
            <div id="bus-tab" class="transport-tab-content">
                <div class="section-card">
                    <div class="section-header">
                        <h2>Manajemen Data Bus</h2>
                        <button class="btn btn-primary" onclick="showAddTransportForm('bus')">
                            <i class="fas fa-plus"></i> Tambah Bus
                        </button>
                    </div>
                    <div class="section-content">
                        <div id="bus-grid" class="transport-grid">
                            <!-- Data bus akan dimuat di sini -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Modal untuk Tambah/Edit Transport -->
            <div id="transport-modal" class="modal" style="display: none;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 id="modal-title">Tambah Data Transportasi</h3>
                        <span class="modal-close" onclick="closeTransportModal()">&times;</span>
                    </div>
                    <div class="modal-body">
                        <form id="transport-form">
                            <input type="hidden" id="transport-id">
                            <input type="hidden" id="transport-type">
                            
                            <div class="form-group">
                                <label for="transport-name">Nama Transportasi</label>
                                <input type="text" id="transport-name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="transport-route">Deskripsi/Rute</label>
                                <textarea id="transport-route" name="route" rows="3" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="transport-price">Harga</label>
                                <input type="text" id="transport-price" name="price" placeholder="Contoh: Rp 450.000 - Rp 850.000" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="transport-logo">Logo/Gambar</label>
                                <input type="file" id="transport-logo" name="logo" accept="image/*">
                                <div id="current-logo" style="margin-top: 10px;"></div>
                            </div>
                            
                            <div class="form-actions">
                                <button type="button" class="btn btn-secondary" onclick="closeTransportModal()">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- GALERI SECTION -->
        <!-- ============================================ -->
        <div id="galeri-section" class="content-section">
            <h1>Kelola Galeri</h1>
            <p>Tambah, edit, atau hapus foto dalam galeri website</p>
            
            <!-- Form Tambah Galeri -->
            <div class="section-card">
                <div class="section-header">
                    <h2>Tambah Foto Baru</h2>
                </div>
                <div class="section-content">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="module" value="gallery">
                        
                        <div class="form-group">
                            <label>Judul Foto</label>
                            <input type="text" name="title" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>File Gambar</label>
                            <input type="file" name="image" accept="image/*" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category">
                                <option value="Umum">Umum</option>
                                <option value="Kantor">Kantor</option>
                                <option value="Fasilitas">Fasilitas</option>
                                <option value="Transportasi">Transportasi</option>
                                <option value="Tim">Tim</option>
                                <option value="Layanan">Layanan</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Urutan Tampil</label>
                            <input type="number" name="display_order" value="0" min="0">
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_featured"> Foto Unggulan
                            </label>
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_active" checked> Aktif
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Foto
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Daftar Galeri -->
            <div class="section-card">
                <div class="section-header">
                    <h2>Daftar Foto Galeri</h2>
                </div>
                <div class="section-content">
                    <?php $galleries = getAllGallery(); ?>
                    <div class="gallery-grid">
                        <?php if (empty($galleries)): ?>
                        <div style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: #6c757d;">
                            <i class="fas fa-images" style="font-size: 3rem; margin-bottom: 15px; display: block; color: #dee2e6;"></i>
                            Belum ada foto di galeri. Silakan tambahkan foto pertama.
                        </div>
                        <?php else: ?>
                        <?php foreach ($galleries as $gallery): ?>
                        <div class="gallery-item">
                            <div style="position: relative;">
                                <?php if ($gallery['image'] && file_exists($gallery['image'])): ?>
                                <img src="<?= $gallery['image'] ?>" alt="<?= htmlspecialchars($gallery['title']) ?>">
                                <?php else: ?>
                                <div style="width: 100%; height: 180px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image" style="font-size: 2.5rem; color: #dee2e6;"></i>
                                </div>
                                <?php endif; ?>
                                
                                <?php if ($gallery['is_featured']): ?>
                                <span class="badge badge-warning" style="position: absolute; top: 10px; right: 10px;">
                                    <i class="fas fa-star"></i> Unggulan
                                </span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="gallery-info">
                                <h4><?= htmlspecialchars($gallery['title']) ?></h4>
                                
                                <?php if ($gallery['description']): ?>
                                <p><?= truncateText($gallery['description'], 85) ?></p>
                                <?php endif; ?>
                                
                                <div class="gallery-actions">
                                    <div>
                                        <span class="badge badge-info"><?= $gallery['category'] ?></span>
                                        <?php if (!$gallery['is_active']): ?>
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div style="display: flex; gap: 5px;">
                                        <button onclick="editGallery(<?= $gallery['id'] ?>)" class="btn btn-secondary" 
                                                style="padding: 6px 10px; font-size: 0.75rem;">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form method="POST" style="display: inline;" 
                                              onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="module" value="gallery">
                                            <input type="hidden" name="id" value="<?= $gallery['id'] ?>">
                                            <button type="submit" class="btn btn-danger" style="padding: 6px 10px; font-size: 0.75rem;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- KONTAK SECTION -->
        <!-- ============================================ -->
        <div id="kontak-section" class="content-section">
            <h1>Informasi Kontak</h1>
            <p>Kelola informasi kontak yang ditampilkan di website</p>
            
            <div class="section-card">
                <div class="section-header">
                    <h2>Edit Informasi Kontak</h2>
                </div>
                <div class="section-content">
                    <form method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="module" value="contact">
                        
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="phone" value="<?= htmlspecialchars($contactInfo['phone'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>WhatsApp</label>
                            <input type="text" name="whatsapp" value="<?= htmlspecialchars($contactInfo['whatsapp'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($contactInfo['email'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="address" required><?= htmlspecialchars($contactInfo['address'] ?? '') ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Embed Google Maps (iframe)</label>
                            <textarea name="maps_embed" style="min-height: 120px;"><?= htmlspecialchars($contactInfo['maps_embed'] ?? '') ?></textarea>
                            <small>Paste kode embed iframe dari Google Maps</small>
                        </div>
                        
                        <div class="form-group">
                            <label>Jam Operasional</label>
                            <input type="text" name="office_hours" value="<?= htmlspecialchars($contactInfo['office_hours'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Facebook (opsional)</label>
                            <input type="url" name="facebook" value="<?= htmlspecialchars($contactInfo['facebook'] ?? '') ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" name="instagram" value="<?= htmlspecialchars($contactInfo['instagram'] ?? '') ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Twitter (opsional)</label>
                            <input type="text" name="twitter" value="<?= htmlspecialchars($contactInfo['twitter'] ?? '') ?>">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- FAQ SECTION -->
        <!-- ============================================ -->
        <div id="faq-section" class="content-section">
            <h1>Kelola FAQ</h1>
            <p>Tambah, edit, atau hapus pertanyaan yang sering ditanyakan</p>
            
            <!-- Form Tambah FAQ -->
            <div class="section-card">
                <div class="section-header">
                    <h2>Tambah FAQ Baru</h2>
                </div>
                <div class="section-content">
                    <form method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="module" value="faq">
                        
                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <textarea name="question" required placeholder="Tulis pertanyaan di sini..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Jawaban</label>
                            <textarea name="answer" required style="min-height: 120px;" placeholder="Tulis jawaban lengkap di sini..."></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category">
                                <option value="Umum">Umum</option>
                                <option value="Pemesanan">Pemesanan</option>
                                <option value="Pembayaran">Pembayaran</option>
                                <option value="Pembatalan">Pembatalan</option>
                                <option value="Layanan">Layanan</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Urutan Tampil</label>
                            <input type="number" name="display_order" value="0" min="0">
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="is_active" checked> Aktif
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah FAQ
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Daftar FAQ -->
            <div class="section-card">
                <div class="section-header">
                    <h2>Daftar FAQ</h2>
                </div>
                <div class="section-content">
                    <?php $faqs = getAllFAQ(); ?>
                    <?php if (empty($faqs)): ?>
                    <div style="text-align: center; padding: 3rem; color: #6c757d;">
                        <i class="fas fa-question-circle" style="font-size: 3rem; margin-bottom: 15px; display: block; color: #dee2e6;"></i>
                        Belum ada FAQ. Silakan tambahkan pertanyaan pertama.
                    </div>
                    <?php else: ?>
                    <?php foreach ($faqs as $faq): ?>
                    <div class="faq-item">
                        <div class="faq-header">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                <div style="flex: 1;">
                                    <div class="faq-question">
                                        <i class="fas fa-question-circle"></i>
                                        <?= htmlspecialchars($faq['question']) ?>
                                    </div>
                                    <span class="badge badge-info"><?= $faq['category'] ?></span>
                                </div>
                                
                                <div class="faq-actions">
                                    <button onclick="editFAQ(<?= $faq['id'] ?>)" class="btn btn-secondary" style="padding: 6px 10px; font-size: 0.75rem;">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form method="POST" style="display: inline;" 
                                          onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="module" value="faq">
                                        <input type="hidden" name="id" value="<?= $faq['id'] ?>">
                                        <button type="submit" class="btn btn-danger" style="padding: 6px 10px; font-size: 0.75rem;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="faq-content">
                            <p style="margin: 0; color: #495057; line-height: 1.6;">
                                <i class="fas fa-reply" style="color: #667eea; margin-right: 8px;"></i>
                                <?= nl2br(htmlspecialchars($faq['answer'])) ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Mobile Menu Toggle -->
    <div class="mobile-menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>

    <script>
        // ============================================
        // JAVASCRIPT UNTUK ADMIN DASHBOARD
        // ============================================
        
        /* Enhanced Navigation Functions */
        
        // Function untuk toggle sidebar mobile
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Function untuk edit banner (placeholder)
        function editBanner(id) {
            // Untuk sementara pakai prompt, nanti bisa dibikin modal
            alert('Edit banner ID: ' + id + '\nFitur edit akan dibuat di form terpisah.');
        }
        
        // Function untuk edit gallery
        function editGallery(id) {
            alert('Edit galeri ID: ' + id + '\nFitur edit akan dibuat di form terpisah.');
        }
        
        // Function untuk edit FAQ
        function editFAQ(id) {
            alert('Edit FAQ ID: ' + id + '\nFitur edit akan dibuat di form terpisah.');
        }
        
        // Enhanced Mobile Menu with Overlay
        const overlay = document.createElement('div');
        overlay.className = 'mobile-overlay';
        overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(8px);
        `;
        document.body.appendChild(overlay);

        // Enhanced Mobile Menu Toggle
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const isActive = sidebar.classList.contains('active');
            
            if (!isActive) {
                sidebar.classList.add('active');
                overlay.style.opacity = '1';
                overlay.style.visibility = 'visible';
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.remove('active');
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
                document.body.style.overflow = '';
            }
        }

        // Close mobile menu when clicking overlay
        overlay.addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.remove('active');
            overlay.style.opacity = '0';
            overlay.style.visibility = 'hidden';
            document.body.style.overflow = '';
        });

        // Close mobile menu when clicking nav links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                const sidebar = document.querySelector('.sidebar');
                sidebar.classList.remove('active');
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
                document.body.style.overflow = '';
            });
        });

        // Enhanced Auto-hide alerts with better animation
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transform = 'translateX(400px)';
                alert.style.opacity = '0';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 500);
            });
        }, 4000);

        // Enhanced Dark Mode Functions
        function ubahModeGelap() {
            const body = document.body;
            const html = document.documentElement;
            const toggleBtn = document.querySelector('.dark-mode-toggle');
            const isCurrentlyDark = body.classList.contains('dark-mode');
            
            // Add loading animation
            toggleBtn.style.transform = 'scale(0.8)';
            toggleBtn.style.opacity = '0.7';
            
            // Smooth transition
            body.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
            
            setTimeout(() => {
                if (isCurrentlyDark) {
                    // Switch to light mode
                    body.classList.remove('dark-mode');
                    html.classList.remove('dark-mode');
                    localStorage.setItem('darkMode', 'false');
                    
                    const toggleIcon = document.querySelector('.dark-mode-toggle i');
                    if (toggleIcon) {
                        toggleIcon.className = 'fas fa-moon';
                    }
                } else {
                    // Switch to dark mode
                    body.classList.add('dark-mode');
                    html.classList.add('dark-mode');
                    localStorage.setItem('darkMode', 'true');
                    
                    const toggleIcon = document.querySelector('.dark-mode-toggle i');
                    if (toggleIcon) {
                        toggleIcon.className = 'fas fa-sun';
                    }
                }
                
                // Reset button animation
                setTimeout(() => {
                    toggleBtn.style.transform = 'scale(1)';
                    toggleBtn.style.opacity = '1';
                    body.style.transition = '';
                }, 100);
            }, 150);
        }

        // Enhanced Dark Mode Initialization
        function aturModeGelapSaatDimuat() {
            const savedDarkMode = localStorage.getItem('darkMode');
            const systemDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const body = document.body;
            const html = document.documentElement;
            
            // Use saved preference or system preference
            const shouldBeDark = savedDarkMode === 'true' || (savedDarkMode === null && systemDarkMode);
            
            if (shouldBeDark) {
                body.classList.add('dark-mode');
                html.classList.add('dark-mode');
                
                const toggleIcon = document.querySelector('.dark-mode-toggle i');
                if (toggleIcon) {
                    toggleIcon.className = 'fas fa-sun';
                }
            } else {
                body.classList.remove('dark-mode');
                html.classList.remove('dark-mode');
                
                const toggleIcon = document.querySelector('.dark-mode-toggle i');
                if (toggleIcon) {
                    toggleIcon.className = 'fas fa-moon';
                }
            }
        }

        // Enhanced Section Navigation with Smooth Transitions
        function showSection(sectionName) {
            const currentSection = document.querySelector('.content-section.active');
            const targetSection = document.getElementById(sectionName + '-section');
            const allNavLinks = document.querySelectorAll('.nav-link');
            
            if (!targetSection) {
                console.error('Section not found:', sectionName + '-section');
                return;
            }
            
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show target section
            targetSection.classList.add('active');
            
            // Update navigation active state - perbaiki bug active state
            allNavLinks.forEach(link => link.classList.remove('active'));
            
            // Find and activate the correct nav link
            const activeNav = document.querySelector(`[onclick*="showSection('${sectionName}')"]`);
            if (activeNav) {
                activeNav.classList.add('active');
            }
        }

        // Add Ripple Effect to Interactive Elements
        function addRippleEffect(element) {
            element.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const ripple = document.createElement('span');
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(255, 255, 255, 0.4);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple-effect 0.8s ease-out;
                    pointer-events: none;
                    z-index: 1;
                `;
                
                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);
                
                setTimeout(() => {
                    if (ripple.parentNode) {
                        ripple.remove();
                    }
                }, 800);
            });
        }

        // Enhanced Initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize dark mode
            aturModeGelapSaatDimuat();
            
            // Ensure dashboard is active by default
            const dashboardSection = document.getElementById('dashboard-section');
            const dashboardNav = document.querySelector('[onclick*="showSection(\'dashboard\')"]');
            
            if (dashboardSection && !document.querySelector('.content-section.active')) {
                dashboardSection.classList.add('active');
            }
            
            if (dashboardNav && !document.querySelector('.nav-link.active')) {
                dashboardNav.classList.add('active');
            }
            
            // Add ripple effects
            document.querySelectorAll('.btn, .nav-link, .dark-mode-toggle').forEach(addRippleEffect);
            
            // Smooth page load
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });

        // Handle window resize for responsive behavior
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                const sidebar = document.querySelector('.sidebar');
                sidebar.classList.remove('active');
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
                document.body.style.overflow = '';
            }
        });

        // Add CSS for enhanced animations
        const enhancedStyles = document.createElement('style');
        enhancedStyles.textContent = `
            @keyframes ripple-effect {
                0% { transform: scale(0); opacity: 1; }
                100% { transform: scale(2); opacity: 0; }
            }
            
            body {
                opacity: 0;
                transition: opacity 0.6s ease, background-color 0.4s ease;
            }
            
            .alert {
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .sidebar {
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            }
        `;
        document.head.appendChild(enhancedStyles);

        // Initialize immediately
        aturModeGelapSaatDimuat();

        /* ============================================
         * TRANSPORT MANAGEMENT FUNCTIONS
         * ============================================ */

        // Load transport data from config.js
        let transportData = {
            pesawat: [],
            kapal: [],
            bus: []
        };

        // Load default transport data
        function loadDefaultTransportData() {
            if (typeof DATA_TRANSPORTASI_DEFAULT !== 'undefined') {
                transportData = DATA_TRANSPORTASI_DEFAULT;
            } else {
                // Fallback data if config.js not loaded
                transportData = {
                    pesawat: [
                        {
                            id: 1,
                            name: 'Lion Air',
                            logo: 'uploads/pesawat/Lionair.png',
                            route: 'Penerbangan domestik terpercaya',
                            price: 'Rp 450.000 - Rp 850.000',
                            transportType: 'pesawat'
                        },
                        {
                            id: 2,
                            name: 'Garuda Indonesia',
                            logo: 'uploads/pesawat/Garuda.png',
                            route: 'Maskapai nasional Indonesia',
                            price: 'Rp 500.000 - Rp 1.200.000',
                            transportType: 'pesawat'
                        },
                        {
                            id: 3,
                            name: 'Batik Air',
                            logo: 'uploads/pesawat/Batik.png',
                            route: 'Layanan premium dengan harga terjangkau',
                            price: 'Rp 500.000 - Rp 950.000',
                            transportType: 'pesawat'
                        }
                    ],
                    kapal: [
                        {
                            id: 9,
                            name: 'KM. Kelud',
                            logo: 'uploads/kapal/kapallaut.png',
                            route: 'Kapal penumpang antar pulau',
                            price: 'Rp 250.000 - Rp 450.000',
                            transportType: 'kapal'
                        }
                    ],
                    bus: [
                        {
                            id: 11,
                            name: 'Bus Pariwisata',
                            logo: 'uploads/bus/bus.png',
                            route: 'Bus pariwisata dengan fasilitas lengkap',
                            price: 'Rp 100.000 - Rp 250.000',
                            transportType: 'bus'
                        }
                    ]
                };
            }
        }

        // Tab switching functionality
        function switchTab(tabName) {
            // Remove active from all tabs and content
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.transport-tab-content').forEach(content => content.classList.remove('active'));
            
            // Add active to clicked tab and content
            document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');
            document.getElementById(`${tabName}-tab`).classList.add('active');
            
            // Load data for the tab
            loadTransportData(tabName);
        }

        // Load transport data for specific type
        function loadTransportData(type) {
            const grid = document.getElementById(`${type}-grid`);
            const data = transportData[type] || [];
            
            if (data.length === 0) {
                grid.innerHTML = `
                    <div style="grid-column: 1/-1; text-align: center; padding: 3rem; color: var(--admin-text-secondary);">
                        <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                        <p>Belum ada data ${type}.</p>
                        <button class="btn btn-primary" onclick="showAddTransportForm('${type}')">
                            <i class="fas fa-plus"></i> Tambah ${type.charAt(0).toUpperCase() + type.slice(1)}
                        </button>
                    </div>
                `;
                return;
            }
            
            grid.innerHTML = data.map(item => `
                <div class="transport-card">
                    <div class="transport-card-header">
                        <img src="${item.logo}" alt="${item.name}" class="transport-logo" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIGZpbGw9IiNjY2MiIHZpZXdCb3g9IjAgMCAyNCAyNCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJjNS41MjIgMCAxMCA0LjQ3NyAxMCAxMHMtNC40NzggMTAtMTAgMTAtMTAtNC40NzctMTAtMTAgNC40NzgtMTAgMTAtMTB6bTAgMThhOCA4IDAgMSAwIDAtMTYgOCA4IDAgMCAwIDAgMTZ6bS0xLTEzaDJ2NmgtMnptMCA4aDJ2MmgtMnoiLz4KPHN2Zz4='">
                        <div class="transport-info">
                            <h3>${item.name}</h3>
                            <p>${item.route}</p>
                        </div>
                    </div>
                    <div class="transport-price">${item.price}</div>
                    <div class="transport-actions">
                        <button class="btn btn-sm btn-primary" onclick="editTransport('${type}', ${item.id})">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteTransport('${type}', ${item.id})">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            `).join('');
        }

        // Show add/edit form
        function showAddTransportForm(type, item = null) {
            document.getElementById('transport-modal').style.display = 'flex';
            document.getElementById('transport-type').value = type;
            document.getElementById('modal-title').textContent = 
                item ? `Edit ${type.charAt(0).toUpperCase() + type.slice(1)}` : `Tambah ${type.charAt(0).toUpperCase() + type.slice(1)}`;
            
            if (item) {
                document.getElementById('transport-id').value = item.id;
                document.getElementById('transport-name').value = item.name;
                document.getElementById('transport-route').value = item.route;
                document.getElementById('transport-price').value = item.price;
                
                if (item.logo) {
                    document.getElementById('current-logo').innerHTML = `
                        <label style="font-size: 0.85rem; color: var(--admin-text-secondary);">Logo saat ini:</label>
                        <br><img src="${item.logo}" alt="Current logo" style="max-width: 100px; max-height: 60px; border-radius: 8px; margin-top: 5px;">
                    `;
                }
            } else {
                document.getElementById('transport-form').reset();
                document.getElementById('transport-id').value = '';
                document.getElementById('current-logo').innerHTML = '';
            }
        }

        // Edit transport
        function editTransport(type, id) {
            const item = transportData[type].find(item => item.id == id);
            if (item) {
                showAddTransportForm(type, item);
            }
        }

        // Delete transport
        function deleteTransport(type, id) {
            if (confirm(`Yakin ingin menghapus ${type} ini?`)) {
                transportData[type] = transportData[type].filter(item => item.id != id);
                loadTransportData(type);
                
                // Here you would save to database/localStorage
                saveTransportData();
                
                alert(`${type.charAt(0).toUpperCase() + type.slice(1)} berhasil dihapus!`);
            }
        }

        // Close modal
        function closeTransportModal() {
            document.getElementById('transport-modal').style.display = 'none';
            document.getElementById('transport-form').reset();
        }

        // Save transport data (placeholder - implement with actual backend)
        function saveTransportData() {
            // Here you would implement saving to database or localStorage
            localStorage.setItem('transportData', JSON.stringify(transportData));
            
            // Update dashboard stats
            updateDashboardStats();
        }

        // Update dashboard statistics
        function updateDashboardStats() {
            const totalServices = (transportData.pesawat?.length || 0) + 
                                (transportData.kapal?.length || 0) + 
                                (transportData.bus?.length || 0);
            
            const totalElement = document.getElementById('total-services');
            if (totalElement) {
                totalElement.textContent = totalServices;
            }
        }

        // Load transport data from storage
        function loadTransportDataFromStorage() {
            const saved = localStorage.getItem('transportData');
            if (saved) {
                transportData = JSON.parse(saved);
            } else {
                loadDefaultTransportData();
            }
        }

        // Handle form submission
        document.addEventListener('DOMContentLoaded', function() {
            // Load transport data
            loadTransportDataFromStorage();
            
            // Setup tab click handlers
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    switchTab(btn.dataset.tab);
                });
            });
            
            // Load default tab (pesawat)
            loadTransportData('pesawat');
            
            // Update dashboard stats
            updateDashboardStats();
            
            // Handle form submission
            document.getElementById('transport-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const type = document.getElementById('transport-type').value;
                const id = document.getElementById('transport-id').value;
                const name = document.getElementById('transport-name').value;
                const route = document.getElementById('transport-route').value;
                const price = document.getElementById('transport-price').value;
                const logoFile = document.getElementById('transport-logo').files[0];
                
                // Create or update item
                const item = {
                    id: id || Date.now(),
                    name: name,
                    route: route,
                    price: price,
                    transportType: type,
                    logo: logoFile ? `uploads/${type}/${logoFile.name}` : (id ? transportData[type].find(i => i.id == id)?.logo : `uploads/${type}/default.png`),
                    dateAdded: id ? transportData[type].find(i => i.id == id)?.dateAdded : new Date().toISOString().split('T')[0]
                };
                
                if (id) {
                    // Update existing
                    const index = transportData[type].findIndex(i => i.id == id);
                    if (index >= 0) {
                        transportData[type][index] = item;
                    }
                } else {
                    // Add new
                    transportData[type].push(item);
                }
                
                // Save and reload
                saveTransportData();
                loadTransportData(type);
                closeTransportModal();
                
                alert(`${type.charAt(0).toUpperCase() + type.slice(1)} berhasil ${id ? 'diperbarui' : 'ditambahkan'}!`);
            });
            
            // Close modal when clicking outside
            document.getElementById('transport-modal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeTransportModal();
                }
            });
        });

        /**
         * ============================================
         * FLASH NOTIFICATION FUNCTIONS
         * ============================================
         */
        function closeFlashNotification() {
            const notification = document.getElementById('flashNotification');
            if (notification) {
                notification.classList.add('hiding');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }
        }

        // Auto close notification after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('flashNotification');
            if (notification) {
                setTimeout(() => {
                    closeFlashNotification();
                }, 5000);
            }
        });
    </script>
</body>
</html>