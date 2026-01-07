<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "db_perpustakaan";
    public $conn;

    // Fungsi yang otomatis jalan saat Class dipanggil
    public function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        
        if (!$this->conn) {
            die("Koneksi Database Gagal: " . mysqli_connect_error());
        }
    }
}
?>