<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelola Promo</title>

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
            animation: fadeIn .7s;
        }

        .btn-add {
            background: #2e63ff;
            padding: 12px 20px;
            color: white;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(46, 99, 255, 0.3);
        }

        .btn-add:hover {
            background: #234ecc;
        }

        .promo-grid {
            margin-top: 25px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .promo-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 7px 22px rgba(0, 0, 0, .1);
            overflow: hidden;
            transition: .25s;
            animation: fadeInUp .6s;
        }

        .promo-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, .15);
        }

        .promo-banner {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .promo-body {
            padding: 18px;
        }

        .promo-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .promo-type {
            display: inline-block;
            padding: 4px 10px;
            background: #dfe9ff;
            color: #1f3c88;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .promo-date {
            color: #666;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .promo-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 10px;
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .active {
            background: #4caf50;
        }

        .expired {
            background: #f44336;
        }

        .promo-actions {
            text-align: right;
            margin-top: 12px;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 10px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            margin-left: 5px;
        }

        .btn-edit {
            background: #ffb300;
            color: white;
        }

        .btn-delete {
            background: #e53935;
            color: white;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="content">

        <h1>Kelola Promo</h1>

        <a href="{{ route('admin.promos.create') }}" class="btn-add">+ Tambah Promo</a>

        <div class="promo-grid">

            @foreach($promos as $promo)
            <div class="promo-card">

                @if($promo->banner_image)
                <img class="promo-banner"
                    src="/uploads/promos/{{ $promo->banner_image }}">
                @else
                <img class="promo-banner"
                    src="https://via.placeholder.com/400x200?text=Promo+PugerWifi">
                @endif

                <div class="promo-body">

                    <div class="promo-title">{{ $promo->title }}</div>

                    <span class="promo-type">
                        {{ ucfirst(str_replace('_', ' ', $promo->type)) }}
                    </span>

                    <a href="{{ route('admin.promos.create') }}" class="btn-add">+ Tambah Promo</a>
                    <div class="promo-date">
                        {{ date('d M Y', strtotime($promo->start_date)) }} -
                        {{ date('d M Y', strtotime($promo->end_date)) }}
                    </div>

                    <span class="promo-status {{ $promo->isActive() ? 'active' : 'expired' }}">
                        {{ $promo->isActive() ? 'Aktif' : 'Expired' }}
                    </span>

                    <div class="promo-actions">
                        <a class="btn-edit"
                            href="{{ route('admin.promos.edit', $promo->id) }}">Edit</a>

                        <a class="btn-delete"
                            href="{{ route('admin.promos.delete', $promo->id) }}"
                            onclick="return confirm('Hapus promo ini?')">
                            Hapus
                        </a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </div>

</body>

</html>