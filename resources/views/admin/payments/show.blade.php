<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Pembayaran</title>

    <style>
        body {
            background: #eef3f7;
            font-family: "Poppins", sans-serif;
            display: flex;
        }

        .content {
            padding: 40px;
            margin-left: 260px;
            width: calc(100% - 260px);
        }

        h1 {
            font-size: 32px;
            color: #1f3c88;
            margin-bottom: 22px;
            animation: fadeInDown .7s;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0,0,0,.08);
            margin-bottom: 25px;
            animation: fadeInUp .7s;
        }

        .card h3 {
            margin-bottom: 10px;
            color: #254292;
        }

        p {
            font-size: 15px;
            color: #444;
            margin: 8px 0;
        }

        img {
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,.15);
        }

        .badge {
            padding: 7px 12px;
            border-radius: 10px;
            font-size: 13px;
            color: #fff;
            font-weight: 700;
        }

        .pending { background: #ff9800; }
        .accepted { background: #4caf50; }
        .rejected { background: #f44336; }

        select {
            padding: 12px;
            width: 260px;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin-top: 8px;
            margin-bottom: 14px;
            font-size: 14px;
        }

        select:focus {
            border-color: #2e63ff;
            box-shadow: 0 0 6px rgba(46, 99, 255, .3);
        }

        .btn-primary {
            padding: 12px 20px;
            border-radius: 10px;
            background: #2e63ff;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.25s;
            box-shadow: 0 8px 20px rgba(46, 99, 255, .4);
        }

        .btn-primary:hover {
            background: #234ecc;
        }

        .btn-back {
            display: inline-block;
            padding: 12px 20px;
            background: #dce6ff;
            color: #1f3c88;
            font-weight: 600;
            text-decoration: none;
            border-radius: 10px;
            margin-left: 10px;
        }

        .success-msg {
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 15px;
        }

        @keyframes fadeInUp {
            from { opacity:0; transform:translateY(25px); }
            to { opacity:1; transform:translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity:0; transform:translateY(-20px); }
            to { opacity:1; transform:translateY(0); }
        }
    </style>

</head>

<body>

    <div class="content">

        <h1>Detail Pembayaran #{{ $payment->id }}</h1>

        @if(session('success'))
            <div class="success-msg">{{ session('success') }}</div>
        @endif

        {{-- INFORMASI CUSTOMER --}}
        <div class="card">
            <h3>Informasi Customer</h3>
            <p><strong>Nama:</strong> {{ $payment->order->user->name }}</p>
            <p><strong>No HP:</strong> {{ $payment->order->customer_phone }}</p>
            <p><strong>Alamat Pemasangan:</strong> {{ $payment->order->installation_address }}</p>
        </div>

        {{-- INFORMASI PAKET --}}
        <div class="card">
            <h3>Paket Internet</h3>
            <p><strong>Paket:</strong> {{ $payment->order->package->name }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($payment->order->package->price, 0, ',', '.') }}</p>
        </div>

        {{-- BUKTI PEMBAYARAN --}}
        <div class="card">
            <h3>Bukti Pembayaran</h3>
            <img src="/uploads/payments/{{ $payment->proof_image }}" width="350">
        </div>

        {{-- VERIFIKASI --}}
        <div class="card">
            <h3>Verifikasi Pembayaran</h3>

            <p>Status Saat Ini:
                <span class="badge {{ $payment->status }}">
                    {{ ucfirst($payment->status) }}
                </span>
            </p>

            <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
                @csrf

                <label>Ubah Status:</label><br>
                <select name="status" required>
                    <option value="pending"  {{ $payment->status == 'pending' ? 'selected':'' }}>Pending</option>
                    <option value="accepted" {{ $payment->status == 'accepted' ? 'selected':'' }}>Diterima</option>
                    <option value="rejected" {{ $payment->status == 'rejected' ? 'selected':'' }}>Ditolak</option>
                </select>

                <br>

                <button type="submit" class="btn-primary">Update Status</button>
                <a href="{{ route('admin.payments.index') }}" class="btn-back">Kembali</a>
            </form>
        </div>

    </div>

</body>

</html>
