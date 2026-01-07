<?php
session_start();
require_once 'config/Database.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk cek user
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db->conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Jika data ditemukan, simpan data ke Session
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // Menyimpan role (admin/user) [cite: 9]

        // Arahkan ke halaman dashboard
        header("Location: dashboard");
    } else {
        // Jika gagal, balik ke login dengan pesan error
        echo "<script>alert('Username atau Password Salah!'); window.location='login';</script>";
    }
}
?>