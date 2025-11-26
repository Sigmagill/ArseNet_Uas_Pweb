<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #eef3f7;
            display: flex;
        }

        .content {
            margin-left: 260px; /* mengikuti sidebar admin */
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

        input {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            transition: .2s;
        }

        input:focus {
            border-color: #2e63ff;
            box-shadow: 0 0 5px rgba(46, 99, 255, .3);
            outline: none;
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
            font-weight: bold;
            margin-bottom: 10px;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-25px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

</head>

<body>

    <div class="content">

        <h1>Edit Data Customer</h1>

        <div class="card">

            {{-- ERROR MESSAGE --}}
            @if($errors->any())
                @foreach($errors->all() as $e)
                    <div class="error-msg">{{ $e }}</div>
                @endforeach
            @endif

            <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                @csrf

                <label>Nama</label>
                <input type="text" name="name" value="{{ $customer->name }}" required>

                <label>Email</label>
                <input type="email" name="email" value="{{ $customer->email }}" required>

                <label>No HP</label>
                <input type="text" name="phone" value="{{ $customer->phone }}">

                <label>Alamat</label>
                <input type="text" name="address" value="{{ $customer->address }}">

                <button type="submit" class="btn-primary">Update Customer</button>
                <a href="{{ route('admin.customers.index') }}" class="btn-back">Kembali</a>

            </form>

        </div>

    </div>

</body>

</html>
