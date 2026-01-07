<?php
// Mengambil data buku berdasarkan ID yang dikirim melalui URL
$id = $_GET['id'];
$query = mysqli_query($db->conn, "SELECT * FROM buku WHERE id = $id");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-warning text-dark py-3">
                    <h5 class="mb-0">Edit Data Buku</h5>
                </div>
                <div class="card-body p-4">
                    <form action="proses_edit" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Buku</label>
                            <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Penulis</label>
                            <input type="text" name="penulis" class="form-control" value="<?= $data['penulis'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Stok Tersedia</label>
                            <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <a href="dashboard" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-warning px-4 text-dark fw-bold">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>