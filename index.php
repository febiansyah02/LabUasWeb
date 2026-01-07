<?php
// 1. Memulai Session untuk menyimpan status login
session_start();

// 2. Memanggil Koneksi Database (Konsep OOP)
require_once 'config/Database.php';
$db = new Database();

// 3. Menentukan halaman yang diakses (Routing dari .htaccess)
// Jika URL kosong, otomatis ke halaman 'login'
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

// 4. LOGIKA ROUTING APLIKASI
switch ($page) {
    
    // --- HALAMAN LOGIN ---
    case 'login':
        include 'views/login.php';
        break;

    case 'proses_login':
        include 'proses_login.php';
        break;

    case 'logout':
        session_destroy();
        header("Location: login");
        break;

    // --- HALAMAN DASHBOARD (READ, FILTER, PAGINATION) ---
    case 'dashboard':
        // Keamanan: Cek apakah sudah login
        if (!isset($_SESSION['username'])) {
            header("Location: login");
            exit();
        }
        include 'views/dashboard.php';
        break;

    // --- FITUR TAMBAH BUKU (CREATE) ---
    case 'tambah_buku':
        // Keamanan: Hanya admin yang bisa akses
        if ($_SESSION['role'] != 'admin') {
            echo "<script>alert('Akses Ditolak! Hanya Admin yang boleh menambah data.'); window.location='dashboard';</script>";
            exit();
        }
        include 'views/tambah_buku.php';
        break;

    case 'proses_tambah':
        include 'proses_tambah.php';
        break;

    // --- FITUR EDIT BUKU (UPDATE) ---
    case 'edit_buku':
        if ($_SESSION['role'] != 'admin') {
            echo "<script>alert('Akses Ditolak!'); window.location='dashboard';</script>";
            exit();
        }
        include 'views/edit_buku.php';
        break;

    case 'proses_edit':
        include 'proses_edit.php';
        break;

    // --- FITUR HAPUS BUKU (DELETE) ---
    case 'hapus_buku':
        if ($_SESSION['role'] != 'admin') {
            echo "<script>alert('Akses Ditolak!'); window.location='dashboard';</script>";
            exit();
        }
        include 'proses_hapus.php';
        break;

    // --- HALAMAN JIKA TIDAK DITEMUKAN (404) ---
    default:
        echo "<div style='text-align:center; margin-top:50px;'>";
        echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
        echo "<a href='dashboard'>Kembali ke Dashboard</a>";
        echo "</div>";
        break;
}