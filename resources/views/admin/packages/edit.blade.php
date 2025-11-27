<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Paket Internet</title>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #eef3f7;
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
            margin-bottom: 22px;
            animation: fadeInDown .7s;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            max-width: 550px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            animation: fadeInUp .7s;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            transition: .2s;
        }

        input:focus, textarea:focus {
            border-color: #2e63ff;
            box-shadow: 0 0 5px rgba(46, 99, 255, .3);
            outline: none;
        }

        textarea {
            height: 110px;
        }

        .btn-primary {
            padding: 12px 25px;
            background: #2e63ff;
            color: white;
            border-radius: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(46, 99, 255, .35);
            transition: .25s;
        }

        .btn-primary:hover {
            background: #234ecc;
        }

        .btn-back {
            display: inline-block;
            padding: 12px 22px;
            background: #dce6ff;
            color: #1f3c88;
            border-radius: 10px;
            text-decoration: none;
            margin-left: 10px;
            font-weight: 600;
        }

        .error-msg {
            color: #ff3d3d;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 600;
        }

    </style>

</head>

<body>

    <div class="content">

        <h1>Edit Paket Internet</h1>

        <div class="card">

            @if($errors->any())
                @foreach($errors->all() as $e)
                    <div class="error-msg">{{ $e }}</div>
                @endforeach
            @endif

            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
                @csrf

                <label>Nama Paket</label>
                <input type="text" name="name" value="{{ $package->name }}" required>

                <label>Speed (Mbps)</label>
                <input type="number" name="speed" value="{{ $package->speed }}" required>

                <label>Harga (Rp)</label>
                <input type="number" name="price" value="{{ $package->price }}" required>

                <label>Deskripsi</label>
                <textarea name="description">{{ $package->description }}</textarea>

                <button type="submit" class="btn-primary">Update Paket</button>
                <a href="{{ route('admin.packages.index') }}" class="btn-back">Kembali</a>
                <a href="{{ route('admin.dashboard') }}" class="btn-back">Kembali ke Dashboard</a>

            </form>

        </div>

    </div>

</body>

</html>
