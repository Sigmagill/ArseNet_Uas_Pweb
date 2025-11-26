<!DOCTYPE html>
<html>

<head>
    <title>{{ $title ?? 'PugerWifi App' }}</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f5f5f5;
        }

        header {
            background: #1e88e5;
            padding: 15px;
            color: white;
            font-size: 20px;
        }

        .container {
            width: 95%;
            max-width: 1100px;
            margin: 25px auto;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
        }

        .btn-primary {
            background: #1976d2;
        }

        .btn-success {
            background: #2e7d32;
        }

        .btn-info {
            background: #0097a7;
        }

        .btn-danger {
            background: #c62828;
        }

        .btn-warning {
            background: #f9a825;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #eee;
        }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }

        .pending {
            background: #f9a825;
        }

        .processing {
            background: #0288d1;
        }

        .completed {
            background: #2e7d32;
        }

        .cancelled {
            background: #c62828;
        }
    </style>
</head>

<body>

    <header>
        PugerWifi – {{ $title ?? '' }}
    </header>

    <div class="container">
        {{ $slot }}
    </div>

</body>

</html>