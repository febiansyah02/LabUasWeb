<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok = $_POST['stok'];

    // Query Update Data
    $query = "UPDATE buku SET judul='$judul', penulis='$penulis', stok='$stok' WHERE id=$id";
    
    if (mysqli_query($db->conn, $query)) {
        header("Location: dashboard");
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>