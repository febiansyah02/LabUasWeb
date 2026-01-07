<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM buku WHERE id = $id";
    
    if (mysqli_query($db->conn, $query)) {
        header("Location: dashboard");
    } else {
        echo "Gagal menghapus data.";
    }
}
?>