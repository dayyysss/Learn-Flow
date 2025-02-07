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
                        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="inline-block">
                            <!-- Icon SVG -->
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
                    <div class="text-gray-700">Diskon:</div>
                    <div class="text-lg font-semibold" id="discount-amount">Rp 0</div>
                </div>

                <div class="text-right mt-2 text-sm text-green-500" id="cashback-info">
                    <div class="text-gray-700">Cashback:</div>
                    <div class="text-lg font-semibold" id="cashback-amount">Rp 0</div>
                </div>
            </div>


            <!-- Total Harga -->
            <div class="bg-white rounded-lg p-4 mb-6 border border-gray-300">
                <div class="font-semibold text-lg flex justify-between mb-3">
                    <div>Total Pembayaran</div>
                    <div id="price-to-charge" class="text-lg text-gray-600"
                        data-original-price="{{ $totalHargaAkhir }}">
                        Rp {{ number_format($totalHargaAkhir, 0, ',', '.') }}
                    </div>
                </div>
                <button type="button" id="pay-button"
                    class="w-full bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-200">
                    Bayar
                </button>
            </div>
        </form>

        <!-- Modal Daftar Promo -->
        <div id="modal-for-promos" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center">
            <div class="bg-white p-6 rounded-lg w-96 max-h-[80vh] overflow-hidden">
                <h2 class="text-xl font-semibold mb-4">Daftar Promo</h2>
                <div id="promo-list" class="space-y-4 max-h-60 overflow-y-auto pr-2">
                    <!-- Daftar promo akan ditampilkan di sini -->
                </div>
                <div class="mt-4 text-right">
                    <button id="close-modal"
                        class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Tutup</button>
                </div>
            </div>
        </div>


        <!-- Status Pembayaran -->
        <p id="payment-status" class="text-center text-lg mt-4 font-semibold"></p>

    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            fetch("/payment/generate-snap-token", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status !== "success") {
                        alert("Gagal mendapatkan token pembayaran.");
                        return;
                    }

                    let snapToken = data.snap_token;
                    let newOrderId = data.order_id; // Dapatkan order_id baru dari backend

                    snap.pay(snapToken, {
                        onSuccess: function(result) {
                            console.log("Pembayaran sukses:", result);

                            let formData = new FormData();
                            formData.append("order_id", newOrderId); // Kirim order_id baru ke backend
                            formData.append("status_pembayaran", result.transaction_status);
                            formData.append("method_pembayaran", result.payment_type);

                            fetch("/payment/update-method", {
                                    method: "POST",
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log("Response dari server:", data);
                                    if (data.status === 'redirect') {
                                        window.location.href = data.url;
                                    } else if (data.status === 'success') {
                                        document.getElementById('method-pembayaran').innerText =
                                            data.method_pembayaran;
                                        document.getElementById('registration-status').innerText =
                                            data.registration_status;
                                    } else {
                                        alert(data.message);
                                    }
                                })
                                .catch(error => console.error("Error saat update pembayaran:", error));
                        },
                        onPending: function(result) {
                            alert("Pembayaran pending.");
                            console.log("Status Pending:", result);
                        },
                        onError: function(result) {
                            alert("Pembayaran gagal.");
                            console.log("Error Pembayaran:", result);
                        },
                    });
                })
                .catch(error => {
                    console.error("Error saat generate Snap Token:", error);
                    alert("Terjadi kesalahan saat memproses pembayaran.");
                });
        };

        document.getElementById("apply-promo-code").addEventListener("click", function() {
            let promoCode = document.getElementById("promo-code").value.trim();

            if (!promoCode) {
                alert("Masukkan kode promo terlebih dahulu!");
                return;
            }

            fetch(`/lfcms/apply-promo/${promoCode}`, {
                    method: "POST", // Ubah ke POST agar lebih aman
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}" // Tambahkan CSRF token agar Laravel menerima request
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        alert(data.message);
                        return;
                    }

                    // Update elemen UI dengan harga setelah diskon
                    document.getElementById("discount-amount").innerText = `Rp ${data.discountAmount}`;
                    document.getElementById("cashback-amount").innerText = `Rp ${data.cashbackAmount}`;
                    document.getElementById("price-to-charge").innerText = `Rp ${data.newTotalPrice}`;
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat menerapkan kode promo.");
                });
        });


        // Event listener untuk membuka modal
        document.querySelector('a[href="#modal-for-promos"]').addEventListener('click', function(e) {
            e.preventDefault();
            fetch('/lfcms/get-promo-list')
                .then(response => response.json())
                .then(data => {
                    const promoList = document.getElementById('promo-list');
                    promoList.innerHTML = '';

                    if (!data.promos || data.promos.length === 0) {
                        promoList.innerHTML = '<p>Tidak ada promo tersedia saat ini.</p>';
                    } else {
                        data.promos.forEach(promo => {
                            const promoItem = document.createElement('div');
                            promoItem.classList.add('bg-gray-100', 'p-4', 'rounded-lg', 'border',
                                'border-gray-300');

                            // Pastikan nilai tidak undefined dan format lebih rapi
                            const discountCode = promo.discount_code || 'Tanpa Kode';
                            const discountAmount = promo.discount_amount ?
                                `Rp ${parseInt(promo.discount_amount).toLocaleString('id-ID')}` :
                                'Rp 0';

                            // Format tanggal ke "03 Februari 2025"
                            const formatTanggal = (tanggal) => {
                                if (!tanggal) return '-';
                                const date = new Date(tanggal);
                                return date.toLocaleDateString('id-ID', {
                                    day: '2-digit',
                                    month: 'long',
                                    year: 'numeric'
                                });
                            };

                            const startDate = formatTanggal(promo.start_date);
                            const endDate = formatTanggal(promo.end_date);

                            promoItem.innerHTML = `
                        <div class="font-semibold">${discountCode}</div>
                        <div>Diskon: ${discountAmount}</div>
                        <div>Tanggal Berlaku: ${startDate} - ${endDate}</div>
                    `;

                            promoList.appendChild(promoItem);
                        });
                    }

                    // Tampilkan modal
                    document.getElementById('modal-for-promos').style.display = 'flex';
                })
                .catch(error => {
                    console.error('Error fetching promo list:', error);
                    alert('Gagal mengambil daftar promo.');
                });
        });

        // Event listener untuk menutup modal
        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('modal-for-promos').style.display = 'none';
        });
    </script>

</body>

</html>
