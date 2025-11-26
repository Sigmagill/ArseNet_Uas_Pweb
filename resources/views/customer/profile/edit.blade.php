<x-layouts.main title="Edit Profil Saya">

    <style>
        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            max-width: 550px;
            margin: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            animation: fadeInUp .7s;
        }

        h2 {
            font-size: 26px;
            color: #1f3c88;
            margin-bottom: 18px;
            text-align: center;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 12px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: .25s;
        }

        input:focus {
            border-color: #2e63ff;
            box-shadow: 0 0 5px rgba(46, 99, 255, 0.35);
            outline: none;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-bottom: 1px solid #eee;
        }

        .btn-primary {
            background: #2e63ff;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(46, 99, 255, .3);
        }

        .btn-primary:hover {
            background: #234ecc;
        }

        .btn-back {
            background: #dce6ff;
            color: #1f3c88;
            padding: 12px 20px;
            margin-left: 10px;
            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
        }

        .success-msg {
            color: #2e7d32;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
        }

        .error-msg {
            color: #d32f2f;
            margin-bottom: 10px;
            font-weight: bold;
        }

        @keyframes fadeInUp {
            from { opacity:0; transform: translateY(20px); }
            to { opacity:1; transform: translateY(0); }
        }

    </style>

    <div class="profile-card">

        <h2>Edit Profil Saya</h2>

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="success-msg">{{ session('success') }}</div>
        @endif

        {{-- ERROR --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="error-msg">{{ $error }}</div>
            @endforeach
        @endif

        <form action="{{ route('customer.profile.update') }}" method="POST">
            @csrf

            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

            <label>Email (tidak bisa diubah)</label>
            <input type="email" value="{{ $user->email }}" disabled>

            <label>No HP</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">

            <label>Alamat</label>
            <input type="text" name="address" value="{{ old('address', $user->address) }}">

            <hr>

            <h3 style="color:#1f3c88; margin-bottom:10px;">Ganti Password (Opsional)</h3>

            <label>Password Lama</label>
            <input type="password" name="current_password">

            <label>Password Baru</label>
            <input type="password" name="password">

            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation">

            <button type="submit" class="btn-primary">Simpan Perubahan</button>
            <a href="/customer/dashboard" class="btn-back">Kembali</a>

        </form>

    </div>

</x-layouts.main>
