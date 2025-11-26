<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Customer</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f1f6ff;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* BACKGROUND GRADIENT */
        body::before {
            content: "";
            position: fixed;
            top: -80px;
            left: -120px;
            width: 500px;
            height: 500px;
            background: #c3d8ff;
            border-radius: 50%;
            filter: blur(100px);
            opacity: .55;
            z-index: -1;
        }

        body::after {
            content: "";
            position: fixed;
            bottom: -120px;
            right: -100px;
            width: 600px;
            height: 600px;
            background: #d2e4ff;
            border-radius: 50%;
            filter: blur(120px);
            opacity: .65;
            z-index: -1;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: white;
            padding: 30px 20px;
            box-shadow: 5px 0 25px rgba(0, 0, 0, 0.08);
            border-radius: 0 30px 30px 0;
            position: fixed;
        }

        .sidebar h2 {
            color: #2e4da7;
            margin-bottom: 30px;
            font-size: 20px;
            font-weight: 700;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 12px;
            cursor: pointer;
            transition: .25s;
        }

        .menu-item:hover {
            background: #d9e6ff;
            transform: translateX(5px);
        }

        .menu-item.active {
            background: #e8f1ff;
            border-left: 4px solid #2e63ff;
        }

        .menu-item img {
            width: 22px;
            opacity: .8;
        }

        .menu-item a {
            margin-left: 12px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        /* CONTENT */
        .content {
            margin-left: 260px;
            padding: 40px 45px;
            width: calc(100% - 260px);
        }

        .title {
            font-size: 32px;
            color: #1f3c88;
            margin-bottom: 8px;
            animation: fadeInDown .7s;
        }

        .welcome {
            margin-bottom: 28px;
            font-size: 14px;
            color: #667;
        }

        .welcome span {
            font-weight: 600;
            color: #1f3c88;
        }

        /* CARDS UTAMA */
        .cards {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .card {
            flex: 1;
            min-width: 270px;
            background: linear-gradient(135deg, #2e63ff, #4da0ff);
            padding: 25px;
            border-radius: 20px;
            color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            animation: fadeInUp .7s;
            position: relative;
            overflow: hidden;
        }

        .card::after {
            content: "";
            position: absolute;
            top: -20px;
            right: -20px;
            width: 110px;
            height: 110px;
            background: rgba(255, 255, 255, .25);
            border-radius: 50%;
            filter: blur(2px);
        }

        .icon-circle {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, .25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .icon-circle img {
            width: 22px;
        }

        .card h3 {
            font-size: 22px;
            font-weight: 700;
        }

        .card p {
            margin-top: 5px;
            opacity: .9;
            font-size: 14px;
        }

        /* GRID BAWAH (USAGE + TAGIHAN / CTA + TRACKING) */
        .bottom-grid {
            display: grid;
            grid-template-columns: 2fr 1.5fr;
            grid-gap: 25px;
            margin-top: 10px;
        }

        .panel {
            background: white;
            border-radius: 18px;
            padding: 20px 22px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            animation: fadeInUp .8s;
        }

        .panel-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: #2b3f8f;
            font-weight: 600;
        }

        .panel-sub {
            font-size: 13px;
            color: #777;
            margin-bottom: 18px;
        }

        /* SIMPLE BAR CHART */
        .usage-chart {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            height: 180px;
            padding: 10px 0 0;
        }

        .bar {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 12px;
            color: #555;
        }

        .bar-value {
            width: 100%;
            border-radius: 10px 10px 4px 4px;
            background: linear-gradient(180deg, #4da0ff, #2e63ff);
            box-shadow: 0 4px 10px rgba(46, 99, 255, 0.4);
        }

        .bar-label {
            margin-top: 6px;
        }

        /* TAGIHAN / CTA BOX */
        .bill-box {
            background: #f5f8ff;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 12px;
        }

        .bill-box p {
            font-size: 14px;
            color: #444;
        }

        .bill-badge {
            display: inline-block;
            padding: 3px 9px;
            border-radius: 999px;
            font-size: 11px;
            margin-left: 6px;
        }

        .bill-badge.pending {
            background: #ffefc6;
            color: #b58300;
        }

        .bill-badge.clear {
            background: #c8f5d2;
            color: #1b7a40;
        }

        .btn-primary {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 18px;
            background: #2e63ff;
            color: white;
            border-radius: 999px;
            font-size: 13px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(46, 99, 255, 0.4);
            transition: .25s;
        }

        .btn-primary:hover {
            background: #254fcc;
        }

        .promo-box {
            margin-top: 18px;
            background: linear-gradient(135deg, #ffb64c, #ff8b3d);
            color: white;
            border-radius: 16px;
            padding: 16px 18px;
            box-shadow: 0 7px 18px rgba(255, 140, 60, 0.45);
            font-size: 14px;
        }

        .promo-title {
            font-weight: 700;
            margin-bottom: 4px;
        }

        /* TRACKING ORDER / PROGRESS */
        .steps {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: 10px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #555;
        }

        .step-circle {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #c4d2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: #c4d2ff;
        }

        .step.active .step-circle {
            background: #2e63ff;
            border-color: #2e63ff;
            color: #fff;
        }

        .step.active span.step-label {
            color: #2e3a8f;
            font-weight: 600;
        }

        .step-line {
            width: 2px;
            height: 20px;
            background: #c4d2ff;
            margin: -4px 0 -4px 8px;
        }

        .status-text {
            margin-top: 10px;
            font-size: 13px;
            color: #666;
        }

        .status-text b {
            color: #2e3a8f;
        }

        /* ANIMATIONS */
        @keyframes fadeInUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>

</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">
        <h2>Menu Customer</h2>

        <div class="menu-item active">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828765.png">
            <a href="/customer/dashboard">Dashboard</a>
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png">
            <a href="/customer/order">Pesan Paket Internet</a>
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png">
            <a href="/customer/orders">Riwayat Pesanan</a>
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/3596/3596094.png">
            <a href="/customer/profile">Edit Profil</a>
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828479.png">
            <a href="/logout">Logout</a>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="content">

        <h1 class="title">Dashboard Customer</h1>
        <p class="welcome">
            Halo, <span>{{ $user->name }}</span> 👋 — selamat datang kembali di PugerWifi.
        </p>

        {{-- CARDS UTAMA --}}
        <div class="cards">

            {{-- Nama --}}
            <div class="card">
                <div class="icon-circle">
                    <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png">
                </div>
                <h3>{{ $user->name }}</h3>
                <p>Nama Lengkap</p>
            </div>

            {{-- Tanggal bergabung --}}
            <div class="card">
                <div class="icon-circle">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png">
                </div>
                <h3>{{ $user->created_at->format('d M Y') }}</h3>
                <p>Tanggal Bergabung</p>
            </div>

            {{-- Status pesanan terakhir --}}
            <div class="card">
                <div class="icon-circle">
                    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828640.png">
                </div>
                <h3>{{ $lastOrder ? ucfirst($lastOrder->status) : 'Belum Ada' }}</h3>
                <p>Status Pesanan Terakhir</p>
            </div>

        </div>

        {{-- GRID BAWAH --}}
        <div class="bottom-grid">

            {{-- PANEL KIRI: GRAFIK PENGGUNAAN INTERNET --}}
            <div class="panel">
                <div class="panel-title">Grafik Penggunaan Internet</div>
                <div class="panel-sub">Perkiraan penggunaan mingguan (GB)</div>

                <div class="usage-chart">
                    @foreach($usageValues as $idx => $val)
                    @php
                    $height = ($maxUsage > 0) ? ($val / $maxUsage) * 100 : 0;
                    @endphp
                    <div class="bar">
                        <div class="bar-value" style="height: {{ $height }}%;"></div>
                        <div class="bar-label">{{ $usageLabels[$idx] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- PANEL KANAN: TAGIHAN + CTA + PROMO --}}
            <div class="panel">
                <div class="panel-title">Tagihan & Paket Aktif</div>
                <div class="panel-sub">Informasi singkat seputar paket & pembayaran.</div>

                {{-- Tagihan --}}
                <div class="bill-box">
                    @if($pendingPayments > 0)
                    <p>
                        Anda memiliki <b>{{ $pendingPayments }}</b> pembayaran yang belum diselesaikan.
                        <span class="bill-badge pending">Belum Lunas</span>
                    </p>
                    <a href="/customer/orders" class="btn-primary">Lihat & Upload Pembayaran</a>
                    @else
                    <p>
                        Tidak ada tagihan tertunda untuk saat ini.
                        <span class="bill-badge clear">Lunas</span>
                    </p>
                    @endif
                </div>

                {{-- Paket aktif --}}
                <div class="bill-box">
                    @if($activePackage)
                    <p>
                        Paket aktif: <b>{{ $activePackage->name }}</b><br>
                        Kecepatan: <b>{{ $activePackage->speed ?? '-' }} Mbps</b><br>
                        Harga: <b>Rp {{ number_format($activePackage->price ?? 0, 0, ',', '.') }}/bulan</b>
                    </p>
                    @else
                    <p>Belum ada paket aktif. Yuk pesan paket internet sekarang!</p>
                    @endif
                </div>

                {{-- CTA Upgrade --}}
                <a href="/customer/order" class="btn-primary">
                    🚀 Upgrade / Pesan Paket Internet
                </a>

                {{-- PROMO --}}
                <div class="promo-box">
                    <div class="promo-title">Promo Spesial Bulan Ini 🎉</div>
                    <div>
                        Upgrade ke paket 50 Mbps dan dapatkan <b>diskon 20%</b> untuk 3 bulan pertama!
                        Hubungi admin untuk info lebih lanjut.
                    </div>
                </div>
            </div>

        </div>

        {{-- TRACKING PEMASANGAN / STATUS ORDER --}}
        <div style="margin-top: 30px;" class="panel">
            <div class="panel-title">Tracking Pemasangan</div>
            <div class="panel-sub">Lihat progres pesanan pemasangan internet Anda.</div>

            @if($lastOrder)
            @php
            $status = $lastOrder->status;
            $step1 = in_array($status, ['pending','processing','completed']);
            $step2 = in_array($status, ['processing','completed']);
            $step3 = ($status === 'completed');
            @endphp

            <ul class="steps">
                <li class="step {{ $step1 ? 'active' : '' }}">
                    <div class="step-circle">{{ $step1 ? '✓' : '1' }}</div>
                    <span class="step-label">Order Diterima</span>
                </li>
                <div class="step-line"></div>
                <li class="step {{ $step2 ? 'active' : '' }}">
                    <div class="step-circle">{{ $step2 ? '✓' : '2' }}</div>
                    <span class="step-label">Proses Survey / Persiapan</span>
                </li>
                <div class="step-line"></div>
                <li class="step {{ $step3 ? 'active' : '' }}">
                    <div class="step-circle">{{ $step3 ? '✓' : '3' }}</div>
                    <span class="step-label">Pemasangan Selesai & Aktif</span>
                </li>
            </ul>

            <p class="status-text">
                Status pesanan terakhir Anda saat ini: <b>{{ ucfirst($status) }}</b>.
            </p>
            @else
            <p class="status-text">
                Anda belum memiliki pesanan. Mulai dengan memesan paket internet terlebih dahulu 😊
            </p>
            @endif
        </div>

    </div>

    <!-- PROMO POPUP -->
    @if($activePromos->count() > 0)
    <div id="promoPopup"
        style="position: fixed; top:0; left:0; width:100%; height:100%; 
            background: rgba(0,0,0,0.55); backdrop-filter: blur(3px);
            display:flex; align-items:center; justify-content:center;
            z-index:9999; animation: fadeIn .4s ease;">

        <div style="background:white; width:400px; border-radius:20px; 
                box-shadow:0 10px 25px rgba(0,0,0,.3); overflow:hidden; 
                animation: popupZoom .4s ease;">

            @php $promo = $activePromos->first(); @endphp

            @if($promo->banner_image)
            <img src="/uploads/promos/{{ $promo->banner_image }}"
                style="width:100%; height:200px; object-fit:cover;">
            @endif

            <div style="padding:20px;">
                <h2 style="margin:0; font-size:22px; color:#1f3c88;">
                    {{ $promo->title }}
                </h2>

                <p style="color:#555; margin-top:8px;">
                    {{ $promo->description }}
                </p>

                <p style="font-size:13px; color:#1f3c88; font-weight:bold;">
                    Berlaku hingga: {{ date('d M Y', strtotime($promo->end_date)) }}
                </p>

                <div style="text-align:right; margin-top:15px;">
                    <button onclick="closePromo()"
                        style="padding:10px 18px; background:#2e63ff; color:white;
                               border:none; border-radius:10px;
                               cursor:pointer; font-weight:bold">
                        Tutup
                    </button>
                </div>
            </div>

        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes popupZoom {
            from {
                transform: scale(0.7);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>

    <script>
        function closePromo() {
            document.getElementById('promoPopup').style.display = 'none';
        }
    </script>

    @endif
</body>

</html>