<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Pesanan</title>

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
            animation: fadeInDown .7s;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.08);
            margin-bottom: 25px;
            animation: fadeInUp .8s;
        }

        .card h3 {
            color: #244a9f;
            margin-bottom: 12px;
        }

        p {
            font-size: 15px;
            color: #555;
            margin: 6px 0;
        }

        .badge {
            padding: 8px 12px;
            font-size: 13px;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            display: inline-block;
        }

        .pending { background: #ff9800; }
        .processing { background: #2196f3; }
        .completed { background: #4caf50; }
        .cancelled { background: #f44336; }

        select {
            padding: 10px;
            font-size: 14px;
            width: 250px;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin-top: 8px;
            margin-bottom: 14px;
        }

        select:focus {
            border-color: #2e63ff;
            box-shadow: 0 0 5px rgba(46, 99, 255, 0.3);
            outline: none;
        }

        .btn-primary {
            padding: 12px 18px;
            background: #2e63ff;
            color: white;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(46, 99, 255, .35);
        }

        .btn-primary:hover {
            background: #234ecc;
        }

        .btn-back {
            padding: 12px 18px;
            background: #dce6ff;
            color: #1f3c88;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            margin-left: 10px;
        }

        .success-msg {
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 15px;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(25px); }
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

        <h1>Detail Pesanan #{{ $order->id }}</h1>

        @if (session('success'))
            <div class="success-msg">{{ session('success') }}</div>
        @endif

        {{-- INFORMASI CUSTOMER --}}
        <div class="card">
            <h3>Informasi Customer</h3>
            <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
            <p><strong>No HP:</strong> {{ $order->customer_phone }}</p>
            <p><strong>Alamat Pemasangan:</strong> {{ $order->installation_address }}</p>
            @if ($order->note)
                <p><strong>Catatan:</strong> {{ $order->note }}</p>
            @endif
        </div>

        {{-- INFORMASI PAKET --}}
        <div class="card">
            <h3>Informasi Paket Internet</h3>
            <p><strong>Paket:</strong> {{ $order->package->name }}</p>
            <p><strong>Speed:</strong> {{ $order->package->speed }} Mbps</p>
            <p><strong>Harga:</strong> Rp {{ number_format($order->package->price, 0, ',', '.') }}</p>
        </div>

        {{-- STATUS --}}
        <div class="card">
            <h3>Status Pesanan</h3>

            <p>
                Status Saat Ini:
                <span class="badge {{ $order->status }}">
                    {{ ucfirst($order->status) }}
                </span>
            </p>

            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf

                <label>Ubah Status:</label><br>
                <select name="status" required>
                    <option value="pending"    {{ $order->status=='pending' ? 'selected':'' }}>Pending</option>
                    <option value="processing" {{ $order->status=='processing' ? 'selected':'' }}>Diproses</option>
                    <option value="completed"  {{ $order->status=='completed' ? 'selected':'' }}>Selesai</option>
                    <option value="cancelled"  {{ $order->status=='cancelled' ? 'selected':'' }}>Dibatalkan</option>
                </select>

                <br>

                <button type="submit" class="btn-primary">Update Status</button>
                <a href="{{ route('admin.orders.index') }}" class="btn-back">Kembali</a>
            </form>
        </div>

    </div>

</body>
</html>
