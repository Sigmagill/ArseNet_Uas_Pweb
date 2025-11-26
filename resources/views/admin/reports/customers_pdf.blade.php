<h2>Laporan Pelanggan</h2>

<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Tanggal Daftar</th>
    </tr>

    @foreach($customers as $c)
    <tr>
        <td>{{ $c->id }}</td>
        <td>{{ $c->name }}</td>
        <td>{{ $c->email }}</td>
        <td>{{ $c->phone }}</td>
        <td>{{ $c->address }}</td>
        <td>{{ $c->created_at->format('d-m-Y') }}</td>
    </tr>
    @endforeach
</table>
