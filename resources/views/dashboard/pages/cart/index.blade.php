@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | Cart')

@section('content')
    <section>
        <!-- cert table -->
        <div class="text-contentColor dark:text-contentColor-dark text-size-10 md:text-base overflow-auto">
            <table
                class="table-fixed md:table-auto leading-1.8 text-center w-150 md:w-full overflow-auto border border-borderColor dark:border-borderColor-dark box-content md:box-border">
                <thead>
                    <tr
                        class="md:text-sm text-blackColor dark:text-blackColor-dark uppercase font-medium border-b border-borderColor dark:border-borderColor-dark">
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Gambar
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Kursus
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Harga
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Total
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Hapus
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        @foreach ($cart->cartItems as $item)
                            @php
                                $course = \App\Models\Course::find($item['course_id']);
                            @endphp
                            <tr class="border-b border-borderColor dark:border-borderColor-dark"
                                id="cart-item-{{ $cart->id }}">
                                <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark"
                                    style="display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->name }}"
                                        width="60">
                                </td>
                                <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark">
                                    <a class="hover:text-primaryColor" href="product-details.html"
                                        id="course-name-{{ $cart->id }}">
                                        {{ $item['course_name'] }} <!-- Display the course name -->
                                    </a>
                                </td>
                                <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark">
                                    <span class="amount" id="price-{{ $cart->id }}">
                                        Rp {{ number_format($item['price'], 2, ',', '.') }} <!-- Display price -->
                                    </span>
                                </td>
                                <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark">
                                    <span id="total-{{ $cart->id }}">
                                        Rp
                                        {{ number_format($item['total_price'] ?? 0, 2, ',', '.') }}
                                    </span>
                                </td>
                                <td class="py-15px md:py-5">
                                    <a href="javascript:void(0)" class="delete-cart-item" data-cart-id="{{ $cart->id }}"
                                        data-course-id="{{ $item['course_id'] }}">
                                        <svg width="25" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ionicon"
                                            viewBox="0 0 512 512">
                                            <title>Trash</title>
                                            <path
                                                d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32"></path>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                                stroke-width="32" d="M80 112h352"></path>
                                            <path
                                                d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- cart action buttons -->
        <div
            class="flex flex-wrap sm:flex-nowrap justify-between items-center gap-x-5 gap-y-10px pt-22px pb-9 md:pt-30px md:pb-55px">
            <div>
                <a href="/course">
                    <button
                        class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 px-5 py-18px md:px-10 bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor">
                        Kembali ke kursus
                    </button>
                </a>
            </div>
            <div class="flex flex-wrap sm:flex-nowrap justify-between items-center gap-x-5 gap-y-10px">
                {{-- <button
                class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 px-5 py-18px md:px-10 bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor">
                UPDATE CART
            </button> --}}
                <button onclick="clearCart()"
                    class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 px-5 py-18px md:px-10 bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor">
                    Bersihkan Keranjang
                </button>
            </div>
        </div>

        <!-- cart input -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-30px" style="display: flex; justify-content: flex-end;">
            <div>
                <div
                    class="px-30px pt-45px pb-50px leading-1.8 border border-borderColor dark:border-borderColor-dark rounded-5px">
                    <div class="flex gap-x-4">
                        <h3 class="text-lg whitespace-nowrap font-medium text-blackColor dark:text-blackColor-dark mb-9">
                            <span class="leading-1.2">Total Keranjang</span>
                        </h3>
                        <div class="h-1px w-full bg-borderColor2 dark:bg-borderColor2-dark mt-2"></div>
                    </div>
                    <h4
                        class="text-sm font-bold text-blackColor dark:text-blackColor-dark mb-5 flex justify-between items-center">
                        <span class="leading-1.2">Cart Totals</span>
                        <span class="leading-1.2 text-lg font-medium cart-total-amount">
                            Rp {{ number_format($totalPrice, 2, ',', '.') }}
                        </span>
                    </h4>
                    <div>
                        <button onclick="proceedToCheckout()"
                            class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 w-full px-10px py-18px bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor">
                            CHECKOUT
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function updateTotal(cartId) {
            // Ambil harga per unit dari elemen
            let priceText = document.getElementById(`price-${cartId}`).textContent.replace('Rp ', '').replace(/\./g, '')
                .replace(',', '.');
            let price = parseFloat(priceText); // Mengonversi harga menjadi angka

            // Ambil kuantitas dari input
            let quantity = document.getElementById(`quantity-${cartId}`).value;

            // Hitung total
            let total = price * quantity;

            // Update total ke tampilan
            document.getElementById(`total-${cartId}`).textContent = `${total.toFixed(2).replace('.', ',')}`;

            // Ambil nama kursus
            let courseNameElement = document.getElementById(`course-name-${cartId}`);
            if (!courseNameElement) {
                console.error(`Nama kursus untuk cartId ${cartId} tidak ditemukan.`);
                return;
            }
            let courseName = courseNameElement.textContent;

            // Kirim data baru ke server (optional - jika Anda ingin memperbarui cart di database)
            updateCartInDatabase(cartId, quantity, total, courseName);
        }

        window.onload = function() {
            @foreach ($carts as $cart)
                updateTotal({{ $cart->id }});
            @endforeach
        }

        $(document).on('click', '.delete-cart-item', function() {
            const cartId = $(this).data('cart-id');
            const courseId = $(this).data('course-id');
            const url = `/cart/${cartId}`;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "course_id": courseId
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        $(`#cart-item-${cartId}`).remove(); // Hapus item dari tampilan
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while deleting the cart item.');
                }
            });
        });

        function clearCart() {
            if (confirm('Apakah kamu ingin menghapus semua yang ada di keranjang?')) {
                fetch('/clear-cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            action: 'clear',
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const cartItems = document.querySelectorAll('.delete-cart-item');
                            cartItems.forEach(item => {
                                const cartItemRow = item.closest('tr');
                                cartItemRow.remove();
                            });
                            alert('Keranjang Anda telah dibersihkan.');
                        } else {
                            alert('There was an error clearing the cart. Please try again.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again.');
                    });
            }
        }

        function proceedToCheckout() {
            fetch('{{ route('course-registrations.store-from-cart') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        method_pembayaran: 'Midtrans'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        window.location.href = data.redirect_url;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Gagal memproses checkout.');
                });
        }


        function updateCartTotal(newTotal) {
            document.querySelector('.cart-total-amount').textContent = `Rp ${newTotal.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 2,
        }).replace('IDR', '').trim()}`;
        }

        function removeCartItem(cartId) {
            fetch(`/cart/remove/${cartId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector(`#cart-item-${cartId}`).remove();
                        updateCartTotal(data.newTotal); // Perbarui total harga
                    } else {
                        alert('Failed to remove item.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
