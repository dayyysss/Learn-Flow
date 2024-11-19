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
                            Image
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Product
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Price
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Quantity
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Total
                        </th>
                        <th class="pt-13px pb-9px md:py-22px px-5 md:px-25px leading-1.8 max-w-25 whitespace-nowrap">
                            Remove
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $cart)
                        <tr class="border-b border-borderColor dark:border-borderColor-dark"
                            id="cart-item-{{ $cart->id }}">
                            <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark">
                                <a href="#">
                                    <img loading="lazy" src="{{ asset('storage/' . $cart->course->thumbnail) }}"
                                        alt="product-1" class="max-w-20 w-full">
                                </a>
                            </td>
                            <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark">
                                <a class="hover:text-primaryColor" href="product-details.html"
                                    id="course-name-{{ $cart->id }}">{{ $cart->course->name }}</a>
                            </td>
                            <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark">
                                <span class="amount" id="price-{{ $cart->id }}">
                                    {{ number_format($cart->course->harga, 2, ',', '.') }}
                                </span>
                            </td>
                            <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark">
                                <div
                                    class="count-container max-w-150px h-55px leading-55px border-2 border-borderColor2 dark:border-borderColor2-dark relative overflow-hidden inline-block">
                                    <input type="number" id="quantity-{{ $cart->id }}"
                                        value="{{ $cart->quantity ?: 1 }}"
                                        class="w-full rounded-full focus:outline-none bg-transparent text-center"
                                        oninput="updateTotal({{ $cart->id }})" min="1" />
                                </div>
                            </td>
                            <td class="py-15px md:py-5 border-r border-borderColor dark:border-borderColor-dark">
                                <span id="total-{{ $cart->id }}">Rp
                                    {{ number_format($cart->price, 2, ',', '.') }}</span>
                            </td>
                            <td class="py-15px md:py-5">
                                <a href="javascript:void(0)" class="delete-cart-item" data-cart-id="{{ $cart->id }}">
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
                        CONTINUE SHOPPING
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
                    CLEAR CART
                </button>
            </div>
        </div>

        <!-- cart input -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-30px">
            <div>
                <div
                    class="px-30px pt-45px pb-50px leading-1.8 border border-borderColor dark:border-borderColor-dark rounded-5px">
                    <!-- heading -->
                    <div class="flex gap-x-4">
                        <h3 class="text-lg whitespace-nowrap font-medium text-blackColor dark:text-blackColor-dark mb-22px">
                            <span class="leading-1.2">Estimate Shipping And Tax</span>
                        </h3>
                        <div class="h-1px w-full bg-borderColor2 dark:bg-borderColor2-dark mt-2"></div>
                    </div>
                    <p class="text-contentColor dark:text-contentColor-dark mb-15px">
                        Enter your destination to get a shipping estimate.
                    </p>
                    <!-- form -->
                    <form>
                        <div class="mb-5">
                            <label class="text-blackColor dark:text-blackColor-dark">* Country</label>
                            <select
                                class="text-xs text-blackColor py-9px px-15px w-full rounded box-border border border-blackColor dark:border-blackColor-dark">
                                <option value="USA" selected="">USA</option>
                                <option value=" UK">UK</option>
                                <option value="Canada">Canada</option>
                                <option value="Russia">Russia</option>
                                <option value="price-ascending">China</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label class="text-blackColor dark:text-blackColor-dark" for="zip">* Zip/Postal
                                Code</label>
                            <input type="text" placeholder="Zip/Postal Code" id="zip"
                                class="text-xs text-blackColor py-11px px-15px w-full rounded box-border border border-borderColor dark:border-borderColor-dark focus:outline-none placeholder:text-placeholder placeholder:opacity-55">
                        </div>
                        <div>
                            <a href="create-course.html"
                                class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor rounded group text-nowrap">
                                Calculate shipping
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <div
                    class="px-30px pt-45px pb-50px leading-1.8 border border-borderColor dark:border-borderColor-dark rounded-5px">
                    <!-- heading -->
                    <div class="flex gap-x-4">
                        <h3 class="text-lg whitespace-nowrap font-medium text-blackColor dark:text-blackColor-dark mb-22px">
                            <span class="leading-1.2">Cart Note</span>
                        </h3>
                        <div class="h-1px w-full bg-borderColor2 dark:bg-borderColor2-dark mt-2"></div>
                    </div>
                    <p class="text-contentColor dark:text-contentColor-dark mb-15px">
                        Special instructions for seller
                    </p>
                    <!-- form -->
                    <form>
                        <div class="mb-5">
                            <textarea
                                class="text-xs text-blackColor py-11px px-15px w-full rounded box-border border border-borderColor2 dark:border-borderColor2-dark"
                                cols="30" rows="4"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <div
                    class="px-30px pt-45px pb-50px leading-1.8 border border-borderColor dark:border-borderColor-dark rounded-5px">
                    <!-- heading -->
                    <div class="flex gap-x-4">
                        <h3 class="text-lg whitespace-nowrap font-medium text-blackColor dark:text-blackColor-dark mb-9">
                            <span class="leading-1.2">Cart Total</span>
                        </h3>
                        <div class="h-1px w-full bg-borderColor2 dark:bg-borderColor2-dark mt-2"></div>
                    </div>
                    <h4
                        class="text-sm font-bold text-blackColor dark:text-blackColor-dark mb-5 flex justify-between items-center">
                        <span class="leading-1.2">Cart Totals</span>
                        <span class="leading-1.2 text-lg font-medium cart-total-amount">0</span>
                    </h4>
                    <div>
                        <button onclick="proceedToCheckout()"
                            class="text-size-13 text-whiteColor dark:text-whiteColor-dark dark:hover:text-whiteColor leading-1 w-full px-10px py-18px bg-blackColor dark:bg-blackColor-dark hover:bg-primaryColor dark:hover:bg-primaryColor">
                            PROCEED TO CHECKOUT
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




        function updateCartInDatabase(cartId, quantity, total, courseName) {
            // Membuat objek data JSON
            const data = {
                cartId: cartId,
                quantity: quantity,
                total: total,
                courseName: courseName 
            };

            // Mengirimkan data ke server menggunakan fetch
            fetch('/cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Data berhasil diperbarui:', data);
                    // Anda bisa melakukan sesuatu setelah berhasil memperbarui data, misalnya memperbarui total keseluruhan keranjang
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }




        function increaseQuantity(cartId) {
            let quantityInput = document.getElementById(`quantity-${cartId}`);
            let quantity = parseInt(quantityInput.value);

            // Tambahkan 1 ke quantity
            quantity += 1;

            // Update input quantity
            quantityInput.value = quantity;

            // Perbarui total harga setelah quantity bertambah
            updateTotal(cartId);
        }


        function decreaseQuantity(cartId) {
            let quantityInput = document.getElementById(`quantity-${cartId}`);
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) { // Jangan biarkan quantity kurang dari 1
                quantity -= 1; // Kurangi 1 dari quantity
                quantityInput.value = quantity; // Update input quantity
                updateTotal(cartId); // Perbarui total harga
            }
        }

        function updateCartTotal() {
            let totalCart = 0;

            // Loop untuk semua item di cart
            let cartItems = document.querySelectorAll('tr[id^="cart-item-"]');
            cartItems.forEach(item => {
                let cartId = item.id.split('-')[2]; // Mendapatkan ID dari cart item
                let itemTotalText = document.getElementById(`total-${cartId}`).textContent.replace('Rp ', '')
                    .replace(/\./g, '').replace(',', '.');
                let itemTotal = parseFloat(itemTotalText); // Menghitung total item

                totalCart += itemTotal; // Menambahkan total item ke total cart
            });

            // Menampilkan total cart di elemen dengan class cart-total-amount
            document.querySelector('.cart-total-amount').textContent = "Rp " + totalCart.toLocaleString('id-ID');
        }

        // Fungsi untuk inisialisasi total saat halaman dimuat
        window.onload = function() {
            @foreach ($cartItems as $cart)
                updateTotal({{ $cart->id }});
            @endforeach
        }

        $(document).on('click', '.delete-cart-item', function() {
            const cartId = $(this).data('cart-id'); // pastikan kamu memberikan ID cart ke elemen tombol
            const url = `/cart/${cartId}`;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}", // jangan lupa sertakan token CSRF
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        window.location.href = response.redirect_url; // Redirect ke halaman cart
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
            if (confirm('Are you sure you want to clear the cart?')) {
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
                            alert('Your cart has been cleared.');
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
            // Ambil semua kursus di cart untuk user saat ini (misalnya, dari server atau dari data yang ada di halaman)
            let coursesInCart = [];

            // Misalnya, jika kursus disimpan dalam elemen yang ada di halaman (Anda bisa menyesuaikan ini dengan cara Anda menampilkan kursus)
            @foreach ($cartItems as $cart)
                coursesInCart.push({
                    id: {{ $cart->course->id }},
                    name: "{{ $cart->course->name }}",
                    harga: "{{ number_format($cart->course->harga, 0, ',', '.') }}",
                    gambar: "{{ $cart->course->gambar }}"
                });
            @endforeach

            // Simpan data cart di LocalStorage
            localStorage.setItem('cartItems', JSON.stringify(coursesInCart));

            // Arahkan pengguna ke halaman checkout
            window.location.href = "/course-registrations/create";
        }



        // // Ambil data cart yang disimpan di LocalStorage
        // let cartItems = JSON.parse(localStorage.getItem('cartItems'));

        // // Kirim data cart ke server menggunakan AJAX atau tampilkan di halaman
        // if (cartItems) {
        //     // Misalnya, kirim data menggunakan AJAX
        //     $.ajax({
        //         url: '/course-registrations/store-from-cart',
        //         method: 'POST',
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //             courses: cartItems
        //         },
        //         success: function(response) {
        //             // Tanggapan sukses dari server
        //             alert('Kursus berhasil didaftarkan!');
        //         },
        //         error: function(response) {
        //             alert('Terjadi kesalahan!');
        //         }
        //     });
        // }
    </script>
@endsection
