<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil Admin</title>

    <style>
        body {
            background: #eef3f7;
            font-family: "Poppins", sans-serif;
            display: flex;
        }

        .content {
            margin-left: 260px; /* menyesuaikan sidebar admin */
            padding: 40px;
            width: calc(100% - 260px);
        }

        h1 {
            font-size: 32px;
            color: #1f3c88;
            margin-bottom: 25px;
            animation: fadeInDown .6s;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
            animation: fadeInUp .7s;
            max-width: 550px;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #d3d3d3;
            margin-top: 6px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        input:focus {
            border-color: #2e63ff;
            outline: none;
            box-shadow: 0 0 5px rgba(46, 99, 255, 0.4);
        }

        .btn-primary {
            padding: 12px 20px;
            background: #2e63ff;
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 5px 18px rgba(46, 99, 255, .35);
            transition: .25s;
            font-size: 14px;
        }

        .btn-primary:hover {
            background: #234ecc;
        }

        .btn-back {
            padding: 12px 20px;
            background: #d3e4ff;
            color: #1f3c88;
            border-radius: 10px;
            text-decoration: none;
            margin-left: 10px;
            font-weight: 600;
        }

        .success {
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .error {
            color: #d32f2f;
            margin-bottom: 8px;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

    </style>

</head>

<body>

    <div class="content">

        <h1>Edit Profil Admin</h1>

        <div class="card">

            @if (session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            @endif

            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf

                <label>Nama</label>
                <input type="text" name="name" required value="{{ old('name', $user->name) }}">

                <label>Email (tidak bisa diubah)</label>
                <input type="email" value="{{ $user->email }}" disabled>

                <label>Nomor HP</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">

                <label>Alamat</label>
                <input type="text" name="address" value="{{ old('address', $user->address) }}">

                <hr style="margin: 20px 0;">

                <h3 style="color:#1f3c88; margin-bottom:10px;">Ganti Password (Opsional)</h3>

                <label>Password Lama</label>
                <input type="password" name="current_password">

                <label>Password Baru</label>
                <input type="password" name="password">

                <label>Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation">

                <button type="submit" class="btn-primary">Simpan Perubahan</button>
                <a href="/admin/dashboard" class="btn-back">Kembali</a>
            </form>

        </div>

    </div>

</body>
</html>
