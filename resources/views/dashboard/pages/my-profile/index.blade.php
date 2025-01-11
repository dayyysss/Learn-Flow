@extends('dashboard.layouts.layouts')
@section('page_title', 'LearnFlow | My Profile')

@section('content')
    <!-- dashboard content -->
    <div class="lg:col-start-4 lg:col-span-9">
        <!-- profile details -->
        <div
            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
            <div class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                <h2 class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                    Profil Saya
                </h2>
            </div>

            <div>
                <ul>
                    <li
                        class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px">
                        <div class="md:col-start-1 md:col-span-4">
                            <span class="inline-block">Tanggal Registrasi</span>
                        </div>
                        <div class="md:col-start-5 md:col-span-8">
                            <span class="inline-block">{{ Auth::user()->created_at->format('d, F Y h:i A') }}</span>
                        </div>
                    </li>

                    <li
                        class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                        <div class="md:col-start-1 md:col-span-4">
                            <span class="inline-block">Nama Awal</span>
                        </div>
                        <div class="md:col-start-5 md:col-span-8">
                            <span class="inline-block">{{ Auth::user()->first_name }}</span>
                        </div>
                    </li>
                    <li
                        class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                        <div class="md:col-start-1 md:col-span-4">
                            <span class="inline-block">Nama Akhir</span>
                        </div>
                        <div class="md:col-start-5 md:col-span-8">
                            <span class="inline-block">{{ Auth::user()->last_name }}</span>
                        </div>
                    </li>

                    <li
                        class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                        <div class="md:col-start-1 md:col-span-4">
                            <span class="inline-block">Username</span>
                        </div>
                        <div class="md:col-start-5 md:col-span-8">
                            <span class="inline-block">{{ Auth::user()->name }}</span>
                        </div>
                    </li>

                    <li
                        class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                        <div class="md:col-start-1 md:col-span-4">
                            <span class="inline-block">Email</span>
                        </div>
                        <div class="md:col-start-5 md:col-span-8">
                            <span class="inline-block">{{ Auth::user()->email }}</span>
                        </div>
                    </li>

                    <li
                        class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                        <div class="md:col-start-1 md:col-span-4">
                            <span class="inline-block">Nomor Handphone</span>
                        </div>
                        <div class="md:col-start-5 md:col-span-8">
                            <span class="inline-block">{{ Auth::user()->no_telp }}</span>
                        </div>
                    </li>

                    <li
                        class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                        <div class="md:col-start-1 md:col-span-4">
                            <span class="inline-block">Keahlian/Profesi</span>
                        </div>
                        <div class="md:col-start-5 md:col-span-8">
                            <span class="inline-block">{{ Auth::user()->profesi }}</span>
                        </div>
                    </li>

                    <li
                        class="text-lg text-contentColor dark:text-contentColor-dark leading-1.67 grid grid-cols-1 md:grid-cols-12 gap-x-30px mt-15px">
                        <div class="md:col-start-1 md:col-span-4">
                            <span class="inline-block">Biografi</span>
                        </div>
                        <div class="md:col-start-5 md:col-span-8">
                            <span class="inline-block">{{ Auth::user()->bio }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
