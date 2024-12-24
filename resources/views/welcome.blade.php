<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tencom</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }
        .login-box h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-box input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-box button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #6a11cb;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .login-box button:hover {
            background-color: #2575fc;
        }
        .login-box a {
            color: #6a11cb;
            text-decoration: none;
            margin-left: 5px;
        }
        .login-box a:hover {
            text-decoration: underline;
        }
        .login-box p {
            color: #000;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box .form-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 90%;
            margin: 10px auto;
        }
        .login-box label {
            margin-bottom: 5px;
            color: #000;
        }
        .login-box input {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="login-box">
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
        <p class="mt-3">Tidak punya akun?<a href="{{ route('register') }}">Registrasi di sini!</a></p>
    </div>
</body>
</html>