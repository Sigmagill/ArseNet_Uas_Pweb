<h2>Laporan Pembayaran</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Paket</th>
        <th>Status</th>
        <th>Tanggal</th>
    </tr>

    @foreach($payments as $p)
    <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->order->user->name }}</td>
        <td>{{ $p->order->package->name }}</td>
        <td>{{ ucfirst($p->status) }}</td>
        <td>{{ $p->created_at->format('d-m-Y') }}</td>
    </tr>
    @endforeach
</table>
