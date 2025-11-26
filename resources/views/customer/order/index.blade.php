<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pilih Paket Internet</title>

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
            margin-bottom: 25px;
            animation: fadeInDown .7s;
        }

        /* GRID KARTU */
        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
            animation: fadeInUp .8s;
        }

        .package-card {
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,.1);
            transition: .25s;
            position: relative;
            overflow: hidden;
        }

        .package-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,.15);
        }

        .package-card::after {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 130px;
            height: 130px;
            background: #d6e4ff;
            border-radius: 50%;
            opacity: .4;
        }

        .icon {
            width: 55px;
            margin-bottom: 20px;
        }

        .package-name {
            font-size: 22px;
            font-weight: 700;
            color: #244c9c;
        }

        .speed {
            font-size: 16px;
            margin-top: 7px;
            color: #444;
        }

        .price {
            margin-top: 12px;
            font-size: 20px;
            font-weight: bold;
            color: #2e63ff;
        }

        .btn-primary {
            display: inline-block;
            margin-top: 18px;
            padding: 12px 20px;
            background: #2e63ff;
            color: #fff;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(46, 99, 255, .35);
        }

        .btn-primary:hover {
            background: #234ecc;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>

    <div class="content">

        <h1>Pilih Paket Internet</h1>

        <div class="packages-grid">

            @foreach($packages as $package)
            <div class="package-card">

                <img src="https://cdn-icons-png.flaticon.com/512/483/483947.png" class="icon">

                <div class="package-name">{{ $package->name }}</div>
                <div class="speed">Speed: <strong>{{ $package->speed }} Mbps</strong></div>
                <div class="price">Rp {{ number_format($package->price, 0, ',', '.') }}</div>

                <a href="{{ route('customer.order.create', $package->id) }}" class="btn-primary">
                    Pesan Paket Ini
                </a>
            </div>
            @endforeach

        </div>

    </div>

</body>

</html>
