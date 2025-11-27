<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan {{ $package->name }}</title>

    <style>
        body {
            background: #eef3f7;
            font-family: "Poppins", sans-serif;
            display: flex;
        }

        .content {
            margin-left: 260px;
            padding: 40px;
            width: calc(100% - 260px);
            animation: fadeIn .6s;
        }

        h1 {
            font-size: 30px;
            color: #1f3c88;
            margin-bottom: 25px;
        }

        .order-card {
            background: linear-gradient(135deg, #2e63ff, #0055d4);
            color: white;
            padding: 30px;
            border-radius: 20px;
            max-width: 600px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, .2);
            animation: fadeInUp .7s;
        }

        .pkg-name {
            font-size: 22px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(255,255,255,.4);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: none;
            font-size: 14px;
            margin-bottom: 15px;
        }

        textarea {
            height: 100px;
        }

        input:focus, textarea:focus {
            outline: none;
            box-shadow: 0 0 8px rgba(255,255,255,.6);
        }

        .btn-submit {
            background: #ffffff;
            color: #1f3c88;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 6px 20px rgba(255,255,255,.4);
        }

        .btn-submit:hover {
            background: #e6eeff;
        }

        .btn-back {
            text-decoration: none;
            color: #fff;
            margin-left: 10px;
            font-weight: 600;
        }

        .error-msg {
            color: #ffcccc;
            margin-bottom: 10px;
        }

        @keyframes fadeIn {
            from { opacity:0; }
            to   { opacity:1; }
        }

        @keyframes fadeInUp {
            from { opacity:0; transform: translateY(20px); }
            to   { opacity:1; transform: translateY(0); }
        }
    </style>

</head>

<body>

<div class="content">

    <h1>Form Pemesanan Paket Internet</h1>

    <div class="order-card">

        <div class="pkg-name">
            Paket Dipilih: {{ $package->name }}  
            <span style="font-size:14px; opacity:.8; display:block;">
                Speed: <strong>{{ $package->speed }} Mbps</strong> • 
                Harga: Rp {{ number_format($package->price, 0, ',', '.') }}
            </span>
        </div>

        @if($errors->any())
            @foreach($errors->all() as $e)
                <div class="error-msg">⚠ {{ $e }}</div>
            @endforeach
        @endif

        <form action="{{ route('customer.order.store') }}" method="POST">
            @csrf

            <input type="hidden" name="package_id" value="{{ $package->id }}">

            <label>Nama Pelanggan</label>
            <input type="text" name="customer_name" value="{{ $user->name }}" required>

            <label>No HP</label>
            <input type="text" name="customer_phone" value="{{ $user->phone }}" required>

            <label>Alamat Pemasangan</label>
            <input type="text" name="installation_address" value="{{ $user->address }}" required>

            <label>Catatan (Opsional)</label>
            <textarea name="notes" placeholder="Contoh: Pasang dekat ruang tamu"></textarea>

            <button type="submit" class="btn-submit">Kirim Pesanan</button>
            <a href="/customer/order" class="btn-back">Kembali</a>
            <a href="{{ route('customer.dashboard') }}" class="btn-back">Kembali ke Dashboard</a>

        </form>
    </div>

</div>

</body>
</html>
