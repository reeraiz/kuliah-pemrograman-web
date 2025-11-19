<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Nana's Kitchen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-pink-50 font-sans">

    <!-- NAVBAR -->
    <nav class="bg-pink-500 text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <h1 class="text-2xl font-bold">Nana's Kitchen</h1>
            <a href="/produk" class="hover:text-gray-200 transition">Kembali</a>
        </div>
    </nav>

    <!-- CONTENT -->
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-pink-600 mb-6">Keranjang Belanja</h2>

        @if(count($cart) === 0)
            <p class="text-gray-600">Keranjang kosong.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Produk</th>
                            <th class="p-3 border">Harga</th>
                            <th class="p-3 border">Qty</th>
                            <th class="p-3 border">Subtotal</th>
                            <th class="p-3 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <tr class="text-center">
                            <td class="p-3 border">{{ $item['name'] ?? $item['nama_menu'] }}</td>
                            <td class="p-3 border">Rp {{ number_format($item['price'] ?? $item['harga'],0,',','.') }}</td>
                            <td class="p-3 border">
                                <form action="{{ route('cart.update') }}" method="POST" class="flex justify-center items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="border px-2 py-1 w-16 text-center">
                                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition">Update</button>
                                </form>
                            </td>
                            <td class="p-3 border">
                                Rp {{ number_format(($item['price'] ?? $item['harga']) * $item['qty'],0,',','.') }}
                            </td>
                            <td class="p-3 border">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xl font-bold">Total: Rp {{ number_format($total,0,',','.') }}</p>
                @if(count($cart) > 0)
                <button id="whatsappCheckout" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition font-bold">
                    Checkout via WhatsApp
                </button>
                @endif
            </div>
        @endif
    </section>

    @if(count($cart) > 0)
    <script>
    document.getElementById('whatsappCheckout').addEventListener('click', function() {
        let cartItems = @json($cart);
        let total = {{ $total }};
        
        if (!cartItems || cartItems.length === 0) {
            alert('Keranjang kosong! Silakan tambahkan produk terlebih dahulu.');
            return;
        }

        let message = "Halo, saya ingin melakukan pemesanan:%0A%0A";
        message += "*== NANA'S KITCHEN ==*%0A%0A";

        cartItems.forEach((item, index) => {
            let name = item.name ?? item.nama_menu;
            let price = item.price ?? item.harga;
            let subtotal = price * item.qty;
            message += `${index + 1}. ${name}%0A`;
            message += `   Harga: Rp ${price.toLocaleString('id-ID')} x ${item.qty}%0A`;
            message += `   Subtotal: Rp ${subtotal.toLocaleString('id-ID')}%0A%0A`;
        });

        message += `*Total Keseluruhan: Rp ${total.toLocaleString('id-ID')}*%0A%0A`;
        message += "Terima kasih! 🙏";

        let phone = "6281355876911"; // ganti dengan nomor WA tujuan
        window.open(`https://wa.me/${phone}?text=${message}`, '_blank');
    });
    </script>
    @endif

</body>
</html>
