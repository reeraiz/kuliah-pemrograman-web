<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Keranjang - Nana's Kitchen</title>
</head>
<body class="bg-pink-50 font-sans">

  <nav class="bg-pink-500 text-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <h1 class="text-2xl font-bold">Nana's Kitchen</h1>
      <a href="/produk" class="hover:text-gray-200 transition">Kembali</a>
    </div>
  </nav>

  <section class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold text-pink-600 mb-6">Keranjang Belanja</h2>
    <div id="cartItems" class="bg-white rounded-xl shadow p-6"></div>

    <div class="mt-6 flex justify-between items-center">
      <h3 class="text-xl font-bold">Total: Rp <span id="cartTotal">0</span></h3>
      <button onclick="checkoutWhatsApp()" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition">
        Checkout via WhatsApp
      </button>
    </div>
  </section>

  <script>
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    function renderCart() {
      const container = document.getElementById("cartItems");
      container.innerHTML = "";

      if (cart.length === 0) {
        container.innerHTML = "<p class='text-gray-600'>Keranjang kosong.</p>";
        document.getElementById("cartTotal").textContent = 0;
        return;
      }

      let total = 0;
      cart.forEach((item, index) => {
        const itemTotal = item.price * item.qty;
        total += itemTotal;
        container.innerHTML += `
          <div class="flex justify-between items-center border-b py-3">
            <div>
              <p class="font-semibold">${item.name}</p>
              <p class="text-sm text-gray-500">Rp ${item.price} x ${item.qty}</p>
            </div>
            <span class="font-semibold">Rp ${itemTotal.toLocaleString()}</span>
            <button onclick="removeItem(${index})" class="text-red-500 hover:underline ml-4">Hapus</button>
          </div>
        `;
      });
      document.getElementById("cartTotal").textContent = total.toLocaleString();
    }

    function removeItem(index) {
      cart.splice(index, 1);
      localStorage.setItem("cart", JSON.stringify(cart));
      renderCart();
    }

    function checkoutWhatsApp() {
      if (cart.length === 0) {
        alert("Keranjang masih kosong!");
        return;
      }

      let text = "Halo, saya ingin melakukan pemesanan:%0A%0A";
      let total = 0;

      cart.forEach(item => {
        const itemTotal = item.price * item.qty;
        total += itemTotal;
        text += `• ${item.name} (Rp ${item.price.toLocaleString()} x ${item.qty}) = Rp ${itemTotal.toLocaleString()}%0A`;
      });

      text += `%0ATotal Keseluruhan: *Rp ${total.toLocaleString()}*%0A%0ATerima kasih 🙏`;

      const phone = "6281355876911";
      const url = `https://wa.me/${phone}?text=${text}`;
      window.open(url, "_blank");
    }

    renderCart();
  </script>
</body>
</html>
