<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Kelola Pesanan</title>

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
    .processing { background: #2196f3; }
    .completed { background: #4caf50; }
    .cancelled { background: #f44336; }

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

    .delete-btn { background: #ff5c5c; color:white; }
    .delete-btn:hover { background: #c40000; }

</style>
</head>

<body>

<div class="content">

    <h1>Kelola Pesanan</h1>

    <div class="table-card">

        <table>
            <tr>
                <th>Pelanggan</th>
                <th>Paket</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            @foreach($orders as $order)
            <tr>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->package->name }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td>
                    <span class="badge {{ $order->status }}">{{ ucfirst($order->status) }}</span>
                </td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn detail-btn">Detail</a>
                    <a href="{{ route('admin.orders.delete', $order->id) }}" class="btn delete-btn"
                        onclick="return confirm('Hapus pesanan ini?')">Hapus</a>
                </td>
            </tr>
            @endforeach

        </table>

    </div>

</div>

</body>
</html>
