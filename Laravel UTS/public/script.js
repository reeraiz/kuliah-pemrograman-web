const products = [
  { id: 1, name: "Snack A", price: 17500, image: "Produk A.jpg", description: "Teh kotak kecil, lemper ayam dan cake siram agar2 jeruk." },
  { id: 2, name: "Snack B", price: 17500, image: "Produk B.jpg", description: "Teh botol sosro, bolu gula merah dan brownies." },
  { id: 3, name: "Snack C", price: 17500, image: "Produk C.jpg", description: "Teh kotak, roti coklat dan lemper ayam." },
  { id: 4, name: "Snack D", price: 15000, image: "Produk D.jpg", description: "Risoles, cake sakura gula merah dan air gelas." },
];

function getCart() {
  return JSON.parse(localStorage.getItem("cart")) || [];
}

function saveCart(cart) {
  localStorage.setItem("cart", JSON.stringify(cart));
}

function addToCart(id) {
  let cart = getCart();
  const product = products.find(p => p.id === id);
  const existing = cart.find(item => item.id === id);
  if (existing) {
    existing.qty++;
  } else {
    cart.push({ ...product, qty: 1 });
  }
  saveCart(cart);
  updateCart();
}

function removeFromCart(id) {
  let cart = getCart();
  cart = cart.filter(item => item.id !== id);
  saveCart(cart);
  updateCart();
}

function updateCart() {
  const cart = getCart();
  const cartItems = document.getElementById("cartItems");
  const cartCount = document.getElementById("cartCount");
  const cartTotal = document.getElementById("cartTotal");

  let total = 0;
  if (cartItems) cartItems.innerHTML = "";

  cart.forEach(item => {
    total += item.price * item.qty;
    if (cartItems) {
      const li = document.createElement("li");
      li.className = "flex justify-between items-center border-b pb-2";
      li.innerHTML = `
        <div>
          <p class="font-bold">${item.name}</p>
          <p class="text-sm text-gray-600">Rp${item.price.toLocaleString()} x ${item.qty}</p>
        </div>
        <button onclick="removeFromCart(${item.id})" class="text-red-600 hover:underline">Hapus</button>
      `;
      cartItems.appendChild(li);
    }
  });

  if (cartCount) cartCount.textContent = cart.reduce((a, c) => a + c.qty, 0);
  if (cartTotal) cartTotal.textContent = `Rp${total.toLocaleString()}`;
}

function toggleCart() {
  document.getElementById("cartModal").classList.toggle("hidden");
}

const productContainer = document.getElementById("productContainer");
if (productContainer) {
  products.forEach(p => {
    const el = document.createElement("div");
    el.className = "bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition";

    el.innerHTML = `
      <div class="relative group">
        <img src="${p.image}" alt="${p.name}" class="w-full h-48 object-contain bg-gray-100">
        <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 flex justify-center items-center text-white text-center p-3 transition">
          <p>${p.description}</p>
        </div>
      </div>
      <div class="p-4">
        <h3 class="text-lg font-bold mb-2">${p.name}</h3>
        <p class="text-pink-600 font-semibold mb-3">Rp${p.price.toLocaleString()}</p>
        <button onclick="addToCart(${p.id})" class="bg-pink-600 hover:bg-pink-700 text-white w-full py-2 rounded-lg font-bold">
          Tambah ke Keranjang
        </button>
      </div>
    `;
    productContainer.appendChild(el);
  });
}


updateCart();
