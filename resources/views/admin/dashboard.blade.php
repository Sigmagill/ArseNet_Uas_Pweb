<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <style>
        /* ======= RESET ======= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #eef3f7;
            display: flex;
            min-height: 100vh;
        }

        /* ======= SIDEBAR ======= */
        .sidebar {
            width: 260px;
            background: #ffffff;
            height: 100vh;
            padding: 25px 18px;
            box-shadow: 6px 0 20px rgba(0, 0, 0, 0.05);
            position: fixed;
            transition: 0.3s;
        }

        .sidebar h2 {
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: bold;
            color: #0059d6;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 10px;
            border-radius: 10px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: 0.25s;
        }

        .menu-item:hover {
            background: #e3efff;
            transform: translateX(5px);
        }

        .menu-item a {
            text-decoration: none;
            margin-left: 10px;
            color: #333;
            font-size: 16px;
            font-weight: 600;
        }

        /* ===== ICON STYLE ===== */
        .menu-icon {
            width: 22px;
            opacity: 0.7;
        }

        /* BADGE NOTIF */
        .badge {
            background: #e53935;
            color: white;
            font-size: 11px;
            padding: 2px 7px;
            border-radius: 999px;
            margin-left: auto;
            font-weight: bold;
        }

        /* TOGGLE BUTTON */
        .toggle-btn {
            background: #0059d6;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 20px;
            width: 100%;
            font-weight: 600;
        }

        .toggle-btn:hover {
            background: #0047a8;
        }

        /* COLLAPSED SIDEBAR */
        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed h2 {
            display: none;
        }

        .sidebar.collapsed .toggle-btn {
            font-size: 0;
            padding: 8px;
        }

        .sidebar.collapsed .toggle-btn::after {
            content: "☰";
            font-size: 18px;
        }

        .sidebar.collapsed .menu-item {
            justify-content: center;
        }

        .sidebar.collapsed .menu-item a,
        .sidebar.collapsed .badge {
            display: none;
        }

        /* ======= MAIN CONTENT ======= */
        .content {
            margin-left: 280px;
            padding: 35px;
            width: calc(100% - 280px);
            transition: 0.3s;
        }

        .content.collapsed {
            margin-left: 100px;
            width: calc(100% - 100px);
        }

        .title {
            font-size: 32px;
            margin-bottom: 25px;
            animation: fadeInDown 0.8s ease;
            color: #222;
        }

        /* ======= CARDS ======= */
        .cards {
            display: flex;
            gap: 22px;
            margin-bottom: 35px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            width: 30%;
            min-width: 250px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: space-between;
            animation: fadeInUp 0.9s ease;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-7px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .card h2 {
            font-size: 32px;
            color: #0059d6;
            margin-bottom: 5px;
        }

        .card p {
            color: #555;
            font-size: 15px;
        }

        /* ======= TABLE ======= */
        .table-card {
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.6s ease;
        }

        .table-card h3 {
            margin-bottom: 15px;
            font-size: 22px;
        }

        table {
            width: 100%;
            margin-top: 12px;
            border-collapse: collapse;
        }

        table th {
            background: #eaf1ff;
            padding: 12px;
            text-align: left;
            font-size: 15px;
        }

        table td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
        }

        .status {
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 8px;
            color: white;
            font-size: 13px;
        }

        .pending {
            background: #ff9800;
        }

        .processing {
            background: #2196f3;
        }

        .completed {
            background: #4caf50;
        }

        .cancelled {
            background: #f44336;
        }

        /* ===== REPORT SECTION ===== */
        .report-card {
            margin-top: 30px;
            padding: 25px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 0.9s ease;
        }

        .report-card h3 {
            margin-bottom: 15px;
            font-size: 22px;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 10px;
            background: #dceafe;
            color: #0059d6;
            font-weight: bold;
            text-decoration: none;
            border: 1px solid #8ab4ff;
            transition: 0.25s;
            margin-right: 10px;
        }

        .btn:hover {
            background: #0059d6;
            color: white;
        }

        /* ======= ANIMATIONS ======= */
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

        /* ===== REPORT GRID (LAPORAN) ===== */
        .reports-container {
            margin-top: 40px;
            animation: fadeInUp 0.8s ease;
        }

        .report-title {
            font-size: 26px;
            margin-bottom: 18px;
            color: #222;
        }

        .report-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 22px;
        }

        .report-box {
            background: white;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);
            text-align: center;
            transition: 0.3s;
            animation: fadeInUp 0.9s ease;
        }

        .report-box:hover {
            transform: translateY(-7px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .report-box h4 {
            margin: 12px 0 18px;
            font-size: 20px;
        }

        .report-icon img {
            width: 55px;
            opacity: 0.9;
        }

        .report-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .report-box .btn {
            padding: 10px 16px;
            font-size: 14px;
            border-radius: 10px;
            background: #dceafe;
            border: 1px solid #8ab4ff;
            color: #0059d6;
            font-weight: bold;
            transition: 0.25s;
        }

        .report-box .btn:hover {
            background: #0059d6;
            color: white;
        }
    </style>

</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">
        <h2>PugerWifi Admin</h2>

        <button type="button" class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/684/684908.png" class="menu-icon">
            <a href="/admin/packages">Kelola Paket Internet</a>
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077063.png" class="menu-icon">
            <a href="/admin/customers">Kelola Pelanggan</a>
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png" class="menu-icon">
            <a href="/admin/orders">Kelola Pesanan</a>
            @if($pendingOrders > 0)
            <span class="badge">{{ $pendingOrders }}</span>
            @endif
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/4436/4436481.png" class="menu-icon">
            <a href="/admin/payments">Kelola Pembayaran</a>
            @if($pendingPayments > 0)
            <span class="badge">{{ $pendingPayments }}</span>
            @endif
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/929/929430.png" class="menu-icon">
            <a href="/admin/promos">Kelola Promo</a>
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828911.png" class="menu-icon">
            <a href="/admin/profile">Edit Profil Admin</a>
        </div>

        <div class="menu-item">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828479.png" class="menu-icon">
            <a href="/logout">Logout</a>
        </div>
    </div>


    {{-- MAIN CONTENT --}}
    <div class="content">

        <h1 class="title">Dashboard Admin</h1>

        {{-- CARDS --}}
        <div class="cards">

            <div class="card">
                <div>
                    <h2>{{ $totalCustomers }}</h2>
                    <p>Total Pelanggan</p>
                </div>
            </div>

            <div class="card">
                <div>
                    <h2>{{ $totalPackages }}</h2>
                    <p>Total Paket</p>
                </div>
            </div>

            <div class="card">
                <div>
                    <h2>{{ $totalOrders }}</h2>
                    <p>Total Pesanan</p>
                </div>
            </div>

        </div>

        {{-- PESANAN TERBARU --}}
        <div class="table-card">
            <h3>Pesanan Terbaru</h3>

            <table>
                <tr>
                    <th>Pelanggan</th>
                    <th>Paket</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>

                @foreach($latestOrders as $order)
                <tr>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->package->name }}</td>
                    <td>
                        <span class="status {{ $order->status }}">{{ ucfirst($order->status) }}</span>
                    </td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach

            </table>
        </div>

        {{-- LAPORAN --}}
        <div class="reports-container">

            <h3 class="report-title">Laporan Data</h3>

            <div class="report-grid">

                {{-- Laporan Pelanggan --}}
                <div class="report-box">
                    <div class="report-icon">
                        <img src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png">
                    </div>
                    <h4>Pelanggan</h4>
                    <div class="report-actions">
                        <a class="btn" href="{{ route('admin.reports.customers.pdf') }}">📄 PDF</a>
                        <a class="btn" href="{{ route('admin.reports.customers.excel') }}">📊 Excel</a>
                    </div>
                </div>

                {{-- Laporan Pesanan --}}
                <div class="report-box">
                    <div class="report-icon">
                        <img src="https://cdn-icons-png.flaticon.com/512/1250/1250689.png">
                    </div>
                    <h4>Pesanan</h4>
                    <div class="report-actions">
                        <a class="btn" href="{{ route('admin.reports.orders.pdf') }}">📄 PDF</a>
                        <a class="btn" href="{{ route('admin.reports.orders.excel') }}">📊 Excel</a>
                    </div>
                </div>

                {{-- Laporan Pembayaran --}}
                <div class="report-box">
                    <div class="report-icon">
                        <img src="https://cdn-icons-png.flaticon.com/512/2830/2830288.png">
                    </div>
                    <h4>Pembayaran</h4>
                    <div class="report-actions">
                        <a class="btn" href="{{ route('admin.reports.payments.pdf') }}">📄 PDF</a>
                        <a class="btn" href="{{ route('admin.reports.payments.excel') }}">📊 Excel</a>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');

            const collapsed = sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed', collapsed);

            localStorage.setItem('sidebarCollapsed', collapsed ? '1' : '0');
        }

        window.addEventListener('load', function() {
            const collapsed = localStorage.getItem('sidebarCollapsed') === '1';
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');

            if (collapsed) {
                sidebar.classList.add('collapsed');
                content.classList.add('collapsed');
            }
        });
    </script>

</body>

</html>