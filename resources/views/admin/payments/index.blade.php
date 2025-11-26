<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Kelola Pembayaran</title>

<style>
    body {
        background: #eef3f7;
        font-family: "Poppins", sans-serif;
        display: flex;
    }

    .content {
        width: 100%;
        padding: 40px;
        margin-left: 260px;
    }

    h1 {
        font-size: 32px;
        color: #1f3c88;
        margin-bottom: 25px;
        animation: fadeInDown .7s;
    }

    .table-card {
        background: white;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(0,0,0,.08);
        animation: fadeInUp .7s;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    th {
        padding: 14px;
        background: #dfe9ff;
        color: #1f3c88;
        font-weight: 600;
        text-align: left;
    }

    td {
        padding: 14px;
        border-bottom: 1px solid #e3e3e3;
    }

    .badge {
        padding: 6px 10px;
        border-radius: 10px;
        font-size: 12px;
        color: white;
        font-weight: bold;
    }

    .pending { background: #ff9800; }
    .approved { background: #4caf50; }
    .rejected { background: #f44336; }

    .btn {
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        display: inline-block;
    }

    .detail-btn { background: #2e63ff; color:white; }
    .detail-btn:hover { background: #234ecc; }

</style>
</head>

<body>

<div class="content">

    <h1>Kelola Pembayaran</h1>

    <div class="table-card">

        <table>
            <tr>
                <th>Pelanggan</th>
                <th>Pesanan</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->order->user->name }}</td>
                <td>{{ $payment->order->package->name }}</td>
                <td>
                    <span class="badge {{ $payment->status }}">{{ ucfirst($payment->status) }}</span>
                </td>
                <td>{{ $payment->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.payments.show', $payment->id) }}" class="btn detail-btn">Detail</a>
                </td>
            </tr>
            @endforeach

        </table>

    </div>

</div>

</body>
</html>
