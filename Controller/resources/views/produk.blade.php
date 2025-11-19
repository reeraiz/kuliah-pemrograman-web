<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nana's Kitchen - Produk</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-50 via-purple-50 to-yellow-50 font-sans">

<nav class="bg-gradient-to-r from-pink-600 via-pink-500 to-yellow-500 text-white shadow-lg sticky top-0 z-50">
<div class="container mx-auto flex justify-between items-center py-4 px-6">
<h1 class="text-3xl font-bold flex items-center gap-2">
<img src="logo.jpg" alt="Logo Catering Nana" class="w-10 h-10 object-cover rounded-full">
<span>Nana's Kitchen</span>
</h1>
<div class="flex items-center space-x-6">
<a href="/" class="hover:text-yellow-200 font-medium">Home</a>
<a href="/produk" class="hover:text-yellow-200 font-medium">Produk</a>
<a href="/kontak" class="hover:text-yellow-200 font-medium">Kontak</a>
<a href="{{ route('cart.index') }}" class="relative hover:text-yellow-200">
<span class="text-2xl">🛒</span>
<span id="cartCount" class="absolute -top-2 -right-2 bg-white text-pink-600 text-xs font-bold px-2 py-0.5 rounded-full">{{ count(session('cart', [])) }}</span>
</a>
</div>
</div>
</nav>

<section class="py-20">
<div class="container mx-auto px-4">
<div class="text-center mb-16">
<h2 class="text-4xl font-bold text-gray-900 mb-4">Koleksi <span class="text-pink-600">Produk</span></h2>
<p class="text-xl text-gray-600">Pilihan terbaik untuk kebutuhan catering Anda</p>
</div>

<div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
@foreach ($menus as $menu)
<div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
<img src="{{ $menu['gambar'] }}" alt="{{ $menu['nama_menu'] }}" class="w-full h-48 object-cover">
<div class="p-4">
<h3 class="text-xl font-bold">{{ $menu['nama_menu'] }}</h3>
<p class="text-pink-600 font-semibold mt-2">Rp{{ number_format($menu['harga'],0,',','.') }}</p>
<p class="text-gray-500 mt-2">{{ $menu['deskripsi'] }}</p>

<!-- Form POST ke CartController -->
<form action="{{ route('cart.add') }}" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="id" value="{{ $menu['id'] }}">
    <input type="hidden" name="name" value="{{ $menu['nama_menu'] }}">
    <input type="hidden" name="price" value="{{ $menu['harga'] }}">
    <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2 rounded-lg font-bold">
        Tambah ke Keranjang
    </button>
</form>

</div>
</div>
@endforeach
</div>

</div>
</section>

</body>
</html>
