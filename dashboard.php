<?php
require_once 'app/Buku.php';
$bukuObj = new Buku($db);

// Logika Pagination & Pencarian
$keyword = isset($_GET['cari']) ? $_GET['cari'] : "";
$halaman = isset($_GET['h']) ? (int)$_GET['h'] : 1;

// MENGUBAH LIMIT MENJADI 5 BUKU PER HALAMAN
$limit = 5; 

$start = ($halaman > 1) ? ($halaman * $limit) - $limit : 0;

$daftar_buku = $bukuObj->tampilkanSemua($keyword, $start, $limit);
$total_data = $bukuObj->hitungTotal($keyword);
$total_halaman = ceil($total_data / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card { border-radius: 15px; border: none; }
        .table thead { background-color: #0d6efd; color: white; }
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="dashboard">PERPUS ONLINE</a>
        <div class="navbar-nav ms-auto">
            <span class="nav-link text-white me-3">Halo, <?= $_SESSION['username']; ?> (<?= $_SESSION['role']; ?>)</span>
            <a class="btn btn-light btn-sm fw-bold text-primary" href="logout">Keluar</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Daftar Koleksi Buku</h3>
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <a href="tambah_buku" class="btn btn-success shadow-sm">+ Tambah Buku Baru</a>
            <?php endif; ?>
        </div>

        <form action="dashboard" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="cari" class="form-control" placeholder="Cari berdasarkan judul atau penulis..." value="<?= $keyword ?>">
                <button type="submit" class="btn btn-primary px-4">Cari Buku</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th width="100">Stok</th>
                        <?php if ($_SESSION['role'] == 'admin') : ?>
                            <th width="150">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = $start + 1;
                    if(mysqli_num_rows($daftar_buku) > 0) :
                        while($row = mysqli_fetch_assoc($daftar_buku)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td class="fw-bold"><?= $row['judul']; ?></td>
                            <td><?= $row['penulis']; ?></td>
                            <td><span class="badge bg-info text-dark"><?= $row['stok']; ?></span></td>
                            <?php if ($_SESSION['role'] == 'admin') : ?>
                                <td>
                                    <a href="edit_buku?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus_buku?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <?php endwhile; 
                    else: ?>
                        <tr><td colspan="5" class="text-center">Data tidak ditemukan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                <?php for($i=1; $i<=$total_halaman; $i++) : ?>
                    <li class="page-item <?= ($i == $halaman) ? 'active' : '' ?>">
                        <a class="page-link" href="?cari=<?= $keyword ?>&h=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

</body>
</html>