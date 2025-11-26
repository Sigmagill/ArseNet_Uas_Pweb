<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pesanan</title>
    <style>
        body { font-family: Arial; margin:20px; }
        table { width:100%; border-collapse: collapse; margin-top:15px; }
        th, td { padding:10px; border:1px solid #ddd; }
        th { background:#f5f5f5; }
        .status {
            padding:5px 10px;
            border-radius:5px;
            color:white;
        }
        .pending { background:orange; }
        .processing { background:blue; }
        .completed { background:green; }
        .cancelled { background:red; }
    </style>
</head>
<body>

<h2>Riwayat Pesanan Saya</h2>

@if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table>
    <tr>
        <th>ID</th>
        <th>Paket</th>
        <th>Status</th>
        <th>Tanggal</th>
    </tr>

    @foreach($orders as $o)
    <tr>
        <td>{{ $o->id }}</td>
        <td>{{ $o->package->name }}</td>
        <td>
            <span class="status {{ $o->status }}">
                {{ ucfirst($o->status) }}
            </span>
        </td>
        <td>{{ $o->created_at->format('d M Y') }}</td>
    </tr>
    @endforeach

    @if($orders->count() == 0)
    <tr>
        <td colspan="4" style="text-align:center;">Belum ada pesanan.</td>
    </tr>
    @endif
</table>

<p><a href="/customer/dashboard">Kembali</a></p>

</body>
</html>
