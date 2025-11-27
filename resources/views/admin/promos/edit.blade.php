<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Promo</title>

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
        }

        .promo-card {
            background: linear-gradient(135deg, #0055d4, #2e63ff);
            padding: 35px;
            border-radius: 20px;
            color: white;
            max-width: 650px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .25);
            animation: fadeInUp .6s;
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
    </style>

</head>

<body>

    <div class="content">

        <h1>Edit Promo</h1>

        <div class="promo-card">

            @if ($errors->any())
            @foreach ($errors->all() as $e)
            <p style="color: #ffdddd;">⚠ {{ $e }}</p>
            @endforeach
            @endif

            <form action="{{ route('admin.promos.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label>Judul Promo</label>
                <input type="text" name="title" value="{{ $promo->title }}" required>

                <label>Jenis Promo</label>
                <select name="type" required>
                    <option value="pemasangan" {{ $promo->type == 'pemasangan' ? 'selected':'' }}>Diskon Pemasangan</option>
                    <option value="bulan_pertama" {{ $promo->type == 'bulan_pertama' ? 'selected':'' }}>Diskon Tagihan Bulan Pertama</option>
                    <option value="paket_baru" {{ $promo->type == 'paket_baru' ? 'selected':'' }}>Promo Paket Baru</option>
                </select>

                <label>Diskon (%)</label>
                <input type="number" name="discount" value="{{ $promo->discount }}">

                <label>Deskripsi</label>
                <textarea name="description">{{ $promo->description }}</textarea>

                <label>Banner Promo</label>
                <input type="file" name="banner_image" accept="image/*">

                @if($promo->banner_image)
                <p style="margin: 10px 0;">Banner saat ini:</p>
                <img src="/uploads/promos/{{ $promo->banner_image }}" width="250" style="border-radius: 10px;">
                @endif

                <label>Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ $promo->start_date }}" required>

                <label>Tanggal Berakhir</label>
                <input type="date" name="end_date" value="{{ $promo->end_date }}" required>

                <button type="submit" class="btn-save">Update Promo</button>
                <a href="{{ route('admin.promos.index') }}" class="btn-back">Kembali</a>
                <a href="{{ route('admin.dashboard') }}" class="btn-back">Kembali ke Dashboard</a>

            </form>

        </div>

    </div>

</body>

</html>