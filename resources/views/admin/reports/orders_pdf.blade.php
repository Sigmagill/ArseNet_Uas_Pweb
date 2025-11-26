<h2>Laporan Pesanan</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Paket</th>
        <th>Status</th>
        <th>Tanggal</th>
    </tr>

    @foreach($orders as $o)
    <tr>
        <td>{{ $o->id }}</td>
        <td>{{ $o->user->name }}</td>
        <td>{{ $o->package->name }}</td>
        <td>{{ ucfirst($o->status) }}</td>
        <td>{{ $o->created_at->format('d-m-Y') }}</td>
    </tr>
    @endforeach
</table>
