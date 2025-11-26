<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Kelola Pelanggan</title>

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

    .btn {
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
    }

    .edit-btn {
        background: #4da0ff;
        color: white;
    }

    .edit-btn:hover { background: #2e63ff; }

    .delete-btn {
        background: #ff5c5c;
        color: white;
        margin-left: 6px;
    }

    .delete-btn:hover { background: #c40000; }

    @keyframes fadeInUp {
        from { transform: translateY(25px); opacity:0; }
        to { transform: translateY(0); opacity:1; }
    }

    @keyframes fadeInDown {
        from { transform: translateY(-25px); opacity:0; }
        to { transform: translateY(0); opacity:1; }
    }
</style>

</head>
<body>

<div class="content">

    <h1>Kelola Pelanggan</h1>

    <div class="table-card">

        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone ?? '-' }}</td>
                <td>{{ $customer->address ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn edit-btn">Edit</a>
                    <a href="{{ route('admin.customers.delete', $customer->id) }}" class="btn delete-btn"
                        onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</a>
                </td>
            </tr>
            @endforeach

        </table>

    </div>

</div>

</body>
</html>
