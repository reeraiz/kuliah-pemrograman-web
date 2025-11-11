<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nana's Kitchen - Beranda</title>
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
        
      </div>
    </div>
  </nav>

  <section class="min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-20 left-20 w-64 h-64 bg-pink-400 rounded-full blur-3xl animate-pulse"></div>
      <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-400 rounded-full blur-3xl animate-pulse"></div>
    </div>
    <div class="container mx-auto px-4 py-16 text-center relative z-10">
      <div>
        <img src="logo.jpg" alt="Logo Catering Nana" class="w-24 h-24 mb-6 inline-block object-cover rounded-full">
        <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-6">
          Penuhi Konsumsi,<br>
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-600 via-purple-600 to-yellow-500">Acara Anda</span>
        </h1>
        <p class="text-xl text-gray-700 mb-8 max-w-2xl mx-auto">
          Temukan produk catering terbaik dengan harga spesial!
        </p>
        <a href="/produk" class="bg-gradient-to-r from-pink-600 via-pink-500 to-yellow-500 text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
          Belanja Sekarang 🎉
        </a>
      </div>
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
        <dl class="space-y-0.5 text-sm text-gray-700">
          <div class="flex justify-between font-bold text-lg">
            <dt>Total:</dt>
            <dd id="cartTotal">Rp0</dd>
          </div>
        </dl>
        <button onclick="checkout()" class="mt-4 w-full bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg font-bold text-lg">Checkout</button>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
