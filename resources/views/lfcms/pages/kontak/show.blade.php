@extends('lfcms.layouts.app')
@section('page_title', 'Kontak | Learn Flow CMS')
@section('content')
     <!-- Start Main Content -->
     <div class="main-content group-data-[sidebar-size=lg]:xl:ml-[calc(theme('spacing.app-menu')_+_16px)] group-data-[sidebar-size=sm]:xl:ml-[calc(theme('spacing.app-menu-sm')_+_16px)] group-data-[theme-width=box]:xl:px-0 px-3 xl:px-4 ac-transition">
       <div class="grid grid-cols-12 gap-4">

            <!-- View Email -->
            <div class="col-span-full lg:col-span-6">
                <div class="card p-0 h-auto">
                    <div class="p-4 sm:px-7 py-5 bg-gray-200/30 dark:bg-dark-card-two">
                        <a href="/lfcms/kontak" class="flex items-center gap-1">
                            <i class="ri-arrow-left-line text-2xl text-heading dark:text-dark-text"></i>
                            <h6 class="card-title dark:text-dark-text">{{ $contact->email }}</h6>
                        </a>
                    </div>
                    <!-- Email Header -->
                    <div class="px-4 py-5 sm:px-7 border-b border-gray-200 dark:border-dark-border">
                        <div class="flex-center-between flex-col-reverse sm:flex-row items-end gap-4 sm:gap-[10%]">
                            <div class="flex items-center gap-4 self-start">
                                <a href="#" class="size-12 rounded-50 relative shrink-0">
                                <img src="{{ asset('storage/emailicon/emailicon.png') }}" alt="user" class="size-full rounded-100 dk-theme-card-square">
                                <!-- Active -->
                                    <div class="absolute bottom-0.5 right-0.5 size-3 border-2 border-white dark:border-dark-border rounded-50 bg-secondary"></div>
                                </a>
                                <div>
                                    <h6 class="text-heading font-semibold line-clamp-1">
                                        <a href="#">{{ $contact->name }}</a>
                                    </h6>
                                    <div class="font-spline_sans leading-none text-heading dark:text-dark-text-two mt-1">  
                                        <span class="text-gray-500 dark:text-dark-text">{{ $contact->phone }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Email Body -->
                    <div class="font-spline_sans pt-15 pb-7 px-4 sm:px-[10%]">
                        <p class="text-gray-500 dark:text-dark-text">Topik : {{ $contact->topic }}</p>
                        <p class="mt-5 text-gray-500 dark:text-dark-text">
                            Pesan : {{ $contact->message }}
                        </p>
                        <div class="grid grid-cols-12 mt-5 mb-15">
                            <div class="col-span-3"></div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Reply Email -->
<div class="col-span-full lg:col-span-6 card">
    <div class="p-1.5">
        <h6 class="card-title">Balas Pesan</h6>
        <div class="mt-7 pt-0.5 flex flex-col gap-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Reply -->
            <form id="reply-form">
                @csrf
                <!-- Email Pengirim -->
                <input type="hidden" name="email" value="{{ $contact->email }}">

                <!-- Textarea untuk Balasan -->
                <div class="col-span-full">
                    <textarea id="reply_message" name="replyMessage" rows="8" class="summernote form-input"></textarea>
                </div>

                <!-- Tombol Kirim -->
                <div class="flex-center mt-5 !justify-end">
                    <button type="submit" class="btn b-solid btn-primary-solid px-5 dk-theme-card-square">Balas</button>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
</div>
<!-- End Main Content -->



    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/vendor/jquery.min.js"></script>
    <script src="assets/js/vendor/flowbite.min.js"></script>
    <script src="assets/js/vendor/smooth-scrollbar/smooth-scrollbar.min.js"></script>
    <script src="assets/js/component/app-menu-bar.js"></script>
    <script src="assets/js/switcher.js"></script>
    <script src="assets/js/layout.js"></script>
    <script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from template.codexshaper.com/admin/dashkit/mail-read.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Nov 2024 08:13:18 GMT -->
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('reply-form'); // Ganti ID form

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Form submitted');
            
            let formData = new FormData(form);
            
            $.ajax({
                url: "{{ route('kontak.reply', ['id' => $contact->id]) }}", // Sesuaikan rute
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    console.log('Success:', response);
                    alert('Balasan berhasil dikirim!');
                    form.reset();
                },
                error: function(error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan, silakan coba lagi.');
                }
            });
        });
    });
</script>
@endsection


