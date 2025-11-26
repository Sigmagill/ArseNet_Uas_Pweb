<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upload Bukti Pembayaran</title>

    <style>
        body {
            background: #eef3f7;
            display: flex;
            font-family: "Poppins", sans-serif;
        }

        .content {
            margin-left: 260px;
            padding: 40px;
            width: calc(100% - 260px);
            animation: fadeIn .6s;
        }

        h1 {
            font-size: 30px;
            color: #1f3c88;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            max-width: 500px;
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
            animation: fadeInUp .7s;
        }

        label {
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        input[type=file] {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 20px;
            background: #f4f7ff;
            border-radius: 12px;
            border: 1px solid #cfd8ff;
        }

        input:focus {
            border-color: #2e63ff;
            box-shadow: 0 0 5px rgba(46, 99, 255, 0.3);
            outline: none;
        }

        .btn-primary {
            padding: 12px 20px;
            background: #2e63ff;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(46, 99, 255, .35);
        }

        .btn-primary:hover {
            background: #234ecc;
        }

        .btn-back {
            padding: 12px 20px;
            background: #dce6ff;
            border-radius: 10px;
            color: #1f3c88;
            text-decoration: none;
            font-weight: 600;
            margin-left: 10px;
        }

        .error-msg {
            color: #ff3d3d;
            font-weight: bold;
            margin-bottom: 12px;
        }

        @keyframes fadeIn {
            from { opacity:0; }
            to { opacity:1; }
        }

        @keyframes fadeInUp {
            from { opacity:0; transform: translateY(20px); }
            to { opacity:1; transform: translateY(0); }
        }

    </style>
</head>

<body>

    <div class="content">

        <h1>Upload Bukti Pembayaran</h1>

        <div class="card">

            @if($errors->any())
                @foreach($errors->all() as $e)
                    <div class="error-msg">{{ $e }}</div>
                @endforeach
            @endif

            <form action="{{ route('customer.payment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="order_id" value="{{ $order->id }}">

                <label>Upload Bukti Pembayaran:</label>
                <input type="file" name="proof_image" required>

                <button type="submit" class="btn-primary">Upload</button>
                <a href="/customer/orders" class="btn-back">Kembali</a>
            </form>

        </div>

    </div>

</body>
</html>
