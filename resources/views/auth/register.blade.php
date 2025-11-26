<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

<style>
    body {
        background: #eef3f7;
        font-family: "Poppins", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        width: 420px;
        background: #fff;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #0059d6;
    }

    input {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    button {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        background: #0059d6;
        border: none;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background: #003b91;
    }

    .link {
        text-align: center;
        margin-top: 12px;
    }
</style>
</head>

<body>

<div class="card">
    <h2>Register</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <input type="text" name="name" placeholder="Nama Lengkap" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

        <button>Daftar</button>

        <p class="link">Sudah punya akun? <a href="{{ route('login.form') }}">Login</a></p>
    </form>
</div>

</body>
</html>
