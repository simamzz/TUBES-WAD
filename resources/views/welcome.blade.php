<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="icon" href="{{ asset('public\favicon.ico') }}" type="image/x-icon"> <!-- Ganti dengan favicon Anda -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-8">
                <div class="d-flex align-items-center" style="height: 100vh;">
                    <div>
                        <h1>Selamat Datang di Website Kami</h1>
                        <p>Ini adalah deskripsi singkat tentang website kami. Kami menyediakan berbagai layanan dan informasi yang bermanfaat untuk Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-4 bg-light">
                <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
                    <h2>Login</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>

                    <p class="mt-3">Tidak punya akun? <a href="{{ route('register') }}">Registrasi di sini!</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>