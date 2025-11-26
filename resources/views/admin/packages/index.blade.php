<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Paket Internet</title>

    <style>
        body {
            background: #eef3f7;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            display: flex;
        }

        /* WRAPPER */
        .content {
            width: 100%;
            padding: 40px;
            margin-left: 260px; /* mengikuti sidebar admin */
        }

        h1 {
            font-size: 32px;
            color: #1f3c88;
            margin-bottom: 20px;
            animation: fadeInDown .7s;
        }

        /* BUTTON TAMBAH */
        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background: #2e63ff;
            color: white;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(46, 99, 255, 0.35);
            margin-bottom: 25px;
            transition: .25s;
        }

        .btn-add:hover {
            background: #234ecc;
        }

        /* TABLE CONTAINER */
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
            text-align: left;
            background: #dfe9ff;
            color: #1f3c88;
            font-weight: 600;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e2e2e2;
        }

        .action-btn {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-size: 13px;
            margin-right: 6px;
        }

        .edit-btn {
            background: #4da0ff;
        }

        .edit-btn:hover {
            background: #2e63ff;
        }

        .delete-btn {
            background: #ff4d4d;
        }

        .delete-btn:hover {
            background: #cc0000;
        }

        /* ICON STYLE */
        .icon {
            width: 18px;
            vertical-align: middle;
            margin-right: 4px;
        }

        /* ANIMATIONS */
        @keyframes fadeInUp {
            from { transform: translateY(25px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

    </style>
</head>

<body>

    {{-- CONTENT --}}
    <div class="content">

        <h1>Kelola Paket Internet</h1>

        {{-- Button Tambah --}}
        <a href="{{ route('admin.packages.create') }}" class="btn-add">
            ➕ Tambah Paket Internet
        </a>

        {{-- LIST PAKET --}}
        <div class="table-card">

            <table>
                <tr>
                    <th>Nama Paket</th>
                    <th>Kecepatan</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>

                @foreach($packages as $package)
                <tr>
                    <td>{{ $package->name }}</td>
                    <td>{{ $package->speed }} Mbps</td>
                    <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                    <td>{{ $package->description }}</td>
                    <td>
                        {{-- Edit --}}
                        <a href="{{ route('admin.packages.edit', $package->id) }}" class="action-btn edit-btn">
                            Edit
                        </a>

                        {{-- Delete --}}
                        <a href="{{ route('admin.packages.delete', $package->id) }}" 
                           onclick="return confirm('Yakin ingin menghapus paket ini?')" 
                           class="action-btn delete-btn">
                           Hapus
                        </a>
                    </td>
                </tr>
                @endforeach

            </table>

        </div>

    </div>

</body>
</html>
