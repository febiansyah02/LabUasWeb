<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #e9ecef; }
        .login-card { border: none; border-radius: 1rem; }
        .btn-login { border-radius: 0.5rem; padding: 0.6rem; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card login-card shadow-lg p-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-primary">Login</h2>
                    <p class="text-muted">Sistem Informasi Perpustakaan</p>
                </div>
                <form action="proses_login" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-login">Masuk ke Sistem</button>
                    </div>
                </form>
            </div>
            <p class="text-center mt-4 text-muted small">&copy; 2026 Projek UAS Pemrograman Web</p>
        </div>
    </div>
</div>

</body>
</html>