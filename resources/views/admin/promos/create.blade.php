<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Promo</title>

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
        }

        h1 {
            font-size: 32px;
            color: #1f3c88;
            margin-bottom: 20px;
            animation: fadeIn .7s;
        }

        .promo-card {
            background: linear-gradient(135deg, #2e63ff, #0055d4);
            padding: 35px;
            border-radius: 20px;
            color: white;
            max-width: 650px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .25);
            animation: fadeInUp .7s;
        }

        label {
            font-weight: bold;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: none;
            margin-bottom: 18px;
            font-size: 14px;
        }

        textarea {
            height: 110px;
        }

        .btn-save {
            background: white;
            color: #1f3c88;
            padding: 12px 20px;
            font-weight: bold;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(255, 255, 255, .4);
        }

        .btn-save:hover {
            background: #dbe6ff;
        }

        .btn-back {
            text-decoration: none;
            margin-left: 10px;
            color: white;
            padding: 12px 18px;
            font-weight: bold;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</head>

<body>

    <div class="content">

        <h1>Tambah Promo</h1>

        <div class="promo-card">

            @if ($errors->any())
                @foreach ($errors->all() as $e)
                    <p style="color: #ffdddd; margin-bottom: 8px;">⚠ {{ $e }}</p>
                @endforeach
            @endif

            <form action="{{ route('admin.promos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Judul Promo</label>
                <input type="text" name="title" required>

                <label>Jenis Promo</label>
                <select name="type" required>
                    <option value="pemasangan">Diskon Pemasangan</option>
                    <option value="bulan_pertama">Diskon Tagihan Bulan Pertama</option>
                    <option value="paket_baru">Promo Paket Baru</option>
                </select>

                <label>Diskon (%) - Opsional</label>
                <input type="number" name="discount" placeholder="Contoh: 10">

                <label>Deskripsi Promo</label>
                <textarea name="description"></textarea>

                <label>Banner / Gambar Promo</label>
                <input type="file" name="banner_image" accept="image/*">

                <label>Tanggal Mulai</label>
                <input type="date" name="start_date" required>

                <label>Tanggal Berakhir</label>
                <input type="date" name="end_date" required>

                <button type="submit" class="btn-save">Simpan Promo</button>
                <a href="{{ route('admin.promos.index') }}" class="btn-back">Kembali</a>
            </form>

        </div>

    </div>

</body>

</html>
