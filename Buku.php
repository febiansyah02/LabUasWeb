<?php
class Buku {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function tampilkanSemua($keyword = "", $start = 0, $limit = 5) {
        // Query dengan Filter Pencarian dan Pagination
        $query = "SELECT * FROM buku WHERE 
                  judul LIKE '%$keyword%' OR 
                  penulis LIKE '%$keyword%' 
                  LIMIT $start, $limit";
        return mysqli_query($this->db->conn, $query);
    }

    public function hitungTotal($keyword = "") {
        $query = "SELECT COUNT(*) as total FROM buku WHERE judul LIKE '%$keyword%'";
        $result = mysqli_query($this->db->conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}
?>