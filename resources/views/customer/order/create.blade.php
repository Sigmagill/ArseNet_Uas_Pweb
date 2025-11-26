<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan</title>
</head>
<body>

<h2>Form Pemesanan Paket: {{ $package->name }}</h2>

@if($errors->any())
    @foreach($errors->all() as $e)
        <p style="color:red;">{{ $e }}</p>
    @endforeach
@endif

<form action="{{ route('customer.order.store') }}" method="POST">
    @csrf

    <input type="hidden" name="package_id" value="{{ $package->id }}">

    <label>Nama Pelanggan:</label><br>
    <input type="text" name="customer_name" value="{{ $user->name }}" required><br><br>

    <label>No HP:</label><br>
    <input type="text" name="customer_phone" value="{{ $user->phone }}" required><br><br>

    <label>Alamat Pemasangan:</label><br>
    <input type="text" name="installation_address" value="{{ $user->address }}" required><br><br>

    <label>Catatan (Opsional):</label><br>
    <textarea name="notes"></textarea><br><br>

    <button type="submit">Kirim Pesanan</button>
</form>

<p><a href="/customer/order">Kembali</a></p>

</body>
</html>
