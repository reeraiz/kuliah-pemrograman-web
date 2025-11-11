<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nana's Kitchen - Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css">
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
        <button onclick="toggleCart()" class="relative hover:text-yellow-200">
          <span class="text-2xl">🛒</span>
          <span id="cartCount" class="absolute -top-2 -right-2 bg-white text-pink-600 text-xs font-bold px-2 py-0.5 rounded-full">0</span>
        </button>
      </div>
    </div>
  </nav>

  <section class="py-20">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">
          Koleksi <span class="text-pink-600">Produk</span>
        </h2>
        <p class="text-xl text-gray-600">Pilihan terbaik untuk kebutuhan catering Anda</p>
      </div>
      <div id="productContainer" class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4"></div>
    </div>
  </section>

  <div id="cartModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full overflow-hidden">
      <div class="bg-gradient-to-r from-pink-600 via-pink-500 to-yellow-500 text-white p-6 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Keranjang Belanja</h2>
        <button onclick="toggleCart()" class="text-3xl">&times;</button>
      </div>
      <div class="p-6 max-h-[60vh] overflow-y-auto">
        <ul id="cartItems" class="space-y-4"></ul>
      </div>
      <div class="p-6 border-t border-gray-100">
        <div class="flex justify-between font-bold text-lg">
          <span>Total:</span>
          <span id="cartTotal">Rp0</span>
        </div>
        <a href="/cart" class="mt-4 block text-center bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-bold text-lg">
          Checkout
        </a>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
