<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Pesanan Saya</title>

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
            font-size: 32px;
            color: #1f3c88;
            margin-bottom: 20px;
        }

        .table-card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
            animation: fadeInUp .7s;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #dfe9ff;
            padding: 14px;
            text-align: left;
            color: #1f3c88;
            font-weight: 600;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e3e3e3;
            font-size: 14px;
        }

        tr:hover {
            background: #f5f8ff;
            transition: .2s;
        }

        .badge {
            padding: 6px 12px;
            border-radius: 10px;
            font-weight: 600;
            color: white;
            font-size: 12px;
        }

        .pending { background: #f4a100; }
        .processing { background: #2196f3; }
        .completed { background: #4caf50; }
        .cancelled { background: #f44336; }

        .accepted { background: #4caf50; }
        .rejected { background: #e53935; }

        .btn {
            padding: 8px 14px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 5px;
        }

        .btn-primary {
            background: #2e63ff;
            color: white;
        }

        .btn-primary:hover {
            background: #234ecc;
        }

        .btn-warning {
            background: #ff9800;
            color: white;
        }

        .btn-warning:hover {
            background: #e68900;
        }

        @keyframes fadeIn {
            from { opacity:0; }
            to { opacity:1; }
        }

        @keyframes fadeInUp {
            from { opacity:0; transform: translateY(25px); }
            to { opacity:1; transform: translateY(0); }
        }
    </style>
</head>

<body>

    <div class="content">

        <h1>Riwayat Pesanan Saya</h1>

        <div class="table-card">

            @if (session('success'))
                <p style="color:green; font-weight:bold;">{{ session('success') }}</p>
            @endif

            <table>
                <tr>
                    <th>ID</th>
                    <th>Paket</th>
                    <th>Status Pesanan</th>
                    <th>Pembayaran</th>
                    <th>Tanggal</th>
                </tr>

                @forelse($orders as $o)
                <tr>
                    <td>{{ $o->id }}</td>
                    <td>{{ $o->package->name }}</td>

                    <td>
                        <span class="badge {{ $o->status }}">
                            {{ ucfirst($o->status) }}
                        </span>
                    </td>

                    <td>
                        @if($o->payment)

                            <span class="badge {{ $o->payment->status }}">
                                {{ ucfirst($o->payment->status) }}
                            </span>

                            @if($o->payment->status == 'rejected')
                                <br>
                                <a class="btn btn-warning"
                                   href="{{ route('customer.payment.create', $o->id) }}">
                                    Upload Ulang
                                </a>
                            @endif

                        @else
                            <a class="btn btn-primary"
                               href="{{ route('customer.payment.create', $o->id) }}">
                                Upload Bukti Pembayaran
                            </a>
                        @endif
                    </td>

                    <td>{{ $o->created_at->format('d M Y') }}</td>
                </tr>

                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:20px;">
                        Belum ada pesanan.
                    </td>
                </tr>
                @endforelse

            </table>
        </div>

    </div>

</body>
</html>
