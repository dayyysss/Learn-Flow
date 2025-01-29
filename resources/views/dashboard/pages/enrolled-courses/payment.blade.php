<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">
    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-lg max-w-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Pembayaran untuk Pembelian Kursus</h1>

        <form method="POST" action="" accept-charset="UTF-8" role="form" id="form-purchase">
            @csrf <!-- Token CSRF untuk keamanan -->

            <!-- Daftar Kursus yang Dibeli -->
            <div class="bg-gray-100 rounded-lg p-4 mb-4">
                <div class="font-semibold text-lg">Kursus yang Dibeli</div>

                @if ($isSinglePurchase)
                    <!-- Tampilan untuk pembelian satu kursus -->
                    <div class="flex justify-between py-3 border-t border-gray-300">
                        <div>{{ $registrations->first()->course->name }}</div>
                        <div class="text-lg text-gray-600">
                            Rp {{ number_format($registrations->first()->hargaAkhir, 0, ',', '.') }}
                        </div>
                    </div>
                @else
                    <!-- Tampilan untuk checkout dari keranjang -->
                    @foreach ($registrations as $registration)
                        <div class="flex justify-between py-3 border-t border-gray-300">
                            <div>{{ $registration->course->name }}</div>
                            <div class="text-lg text-gray-600">
                                Rp {{ number_format($registration->hargaAkhir, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Promo Code Section -->
            <div class="bg-white rounded-lg p-4 mb-4 border border-gray-300">
                <div class="flex justify-between items-center mb-3">
                    <label for="promo-code" class="block text-sm font-semibold">Kode Promo</label>
                    <span class="text-gray-500" data-toggle="popover" data-placement="right" data-trigger="hover"
                        data-content="Kode promo bisa Anda dapatkan dari penawaran melalui email, sosial media, dsb.">
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block">
                            <path
                                d="M10 11C10 10.4477 10.4477 10 11 10H12C12.5523 10 13 10.4477 13 11V15C13.5523 15 14 15.4477 14 16C14 16.5523 13.5523 17 13 17H12C11.4477 17 11 16.5523 11 16V12C10.4477 12 10 11.5523 10 11Z"
                                fill="#3F3F46"></path>
                            <path
                                d="M12 9C12.5523 9 13 8.55229 13 8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8C11 8.55229 11.4477 9 12 9Z"
                                fill="#3F3F46"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4Z"
                                fill="#3F3F46"></path>
                        </svg>
                    </span>
                </div>

                <input type="text" class="w-full p-3 border border-gray-300 rounded-md mb-3" id="promo-code"
                    placeholder="Masukkan kode promo" name="promo_code">

                <div class="flex justify-between items-center">
                    <button class="bg-gray-200 text-gray-700 px-6 py-2 rounded-md" type="button"
                        id="apply-promo-code">Terapkan</button>
                    <a href="#modal-for-promos" class="text-blue-500 font-medium">Lihat daftar promo</a>
                </div>

                <!-- Discount & Cashback -->
                <div class="text-right mt-2 text-sm text-green-500" id="discount-info">
                    <div class="text-lg" id="discount-amount">Rp 0</div>
                </div>
                <div class="text-right mt-2 text-sm text-green-500" id="cashback-info">
                    <div class="text-lg" id="cashback-amount">Rp 0</div>
                </div>
            </div>

            <!-- Total Harga -->
            <div class="bg-white rounded-lg p-4 mb-6 border border-gray-300">
                <div class="font-semibold text-lg flex justify-between mb-3">
                    <div>Total Pembayaran</div>
                    <div id="price-to-charge" class="text-lg text-gray-600">Rp
                        {{ number_format($totalHargaAkhir, 0, ',', '.') }}
                    </div>
                </div>
                <button type="button" id="pay-button"
                    class="w-full bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
                    Bayar
                </button>
            </div>
        </form>

        <!-- Status Pembayaran -->
        <p id="payment-status" class="text-center text-lg mt-4 font-semibold"></p>

    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay("{{ $snapToken }}", {
                onSuccess: function (result) {
                    document.getElementById('payment-status').innerText = 'Pembayaran berhasil!';

                    // Kirim data ke backend
                    var formData = new FormData();
                    formData.append('method_pembayaran', result.payment_type); // Metode pembayaran
                    formData.append('order_id', result.order_id); // ID pesanan
                    formData.append('status_pembayaran', result.transaction_status); // Status transaksi

                    fetch("/payment/update-method", {
                        method: "POST",
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'redirect') {
                                // Redirect ke halaman kursus
                                window.location.href = data.url;
                            } else if (data.status === 'success') {
                                // Update UI dengan status pembayaran
                                document.getElementById('method-pembayaran').innerText = data
                                    .method_pembayaran;
                                document.getElementById('registration-status').innerText = data
                                    .registration_status;
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => console.error("Error:", error));
                },
                onPending: function (result) {
                    alert("Pembayaran pending.");
                    document.getElementById('payment-status').innerText = 'Pembayaran pending.';
                    console.log(result);
                },
                onError: function (result) {
                    alert("Pembayaran gagal.");
                    document.getElementById('payment-status').innerText = 'Pembayaran gagal.';
                    console.log(result);
                },
            });
        };
    </script>

</body>

</html>